<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     *
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
      public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('Login_model');
    }

    public function index()
    {
        $email = $this->input->post('inputEmail');
        $pass = $this->input->post('inputPassword');
        $this->form_validation->set_rules('inputEmail', 'Email ID', 'trim|required');
        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required');
        if ($this->form_validation->run()==False) {
            if (isset($this->session->userdata['logged'])) {
                redirect('dashboard');
            } else {
                $this->load->view('login/login');
            }
        } else {
            //get credential
            $data = array('email'=>$email,
                            'password'=>md5($pass),);
            $res = $this->Login_model->auth_login($data);
            if ($res == true) {
                $res = $this->Login_model->user_info($data);
                if ($res != false) {
                    $session = array(
                        'id'=>$res[0]->uid,
                        'name' => $res[0]->name,
                        'email'=>$res[0]->email,
                        'role' =>$res[0]->role,
                        'time' =>$res[0]->created);
                    //add user session
                    $this->session->set_userdata('logged',$session);
                    redirect('dashboard');
                }
            } else {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Wrong Email or Password.</div>');
                $this->load->view('login/login');
            }
        }
        
    }

    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

    function register(){
         //set validation rules
        $this->form_validation->set_rules('inputName', 'Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('inputEmail', 'Email ID', 'trim|required|valid_email|is_unique[user_auth.email]');
        $this->form_validation->set_rules('inputPassword', 'Password', 'trim|required|matches[CPassword]');
        $this->form_validation->set_rules('CPassword', 'Confirm Password', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('login/signup');
        }
        else
        {
            //insert the user registration details into database
            $data = array(
                'name' => $this->input->post('inputName'),
                'email' => $this->input->post('inputEmail'),
                'password' => md5($this->input->post('inputPassword')),
                'role' => 'user', //this is login for registered user
            );
            
            // insert form data into database
            if ($this->Login_model->addUser($data))
            {
                // send email
                if ($this->Login_model->sendEmail($this->input->post('inputEmail')))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('login/register');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                    redirect('login/register');
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('login/register');
            }
        }
    }

    function verify($hash=NULL)
    {
        if ($this->Login_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('login');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('login/register');
        }
    }

    function register_view(){
        $this->load->view('login/signup');
    }
}
