<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
    function __construct() {
        parent::__construct();
            $this->load->helper(array('form', 'url','string'));
            $this->load->library('form_validation');
            $this->load->model('Profile_model');

        }

        function get_all_data(){

        }
        function show_user_based_id(){
            $session = $this->session->userdata('logged');
            $id = $session['id'];
            if ($res = $this->Profile_model->show_user_id($id)) {
                $data = $res; 
            }
            echo json_encode($data);
        }
        function submitEdit($id){
                $_POST = json_decode(file_get_contents('php://input'),true);
                $data = array('name' => $_POST['name'],);
                
                if ($this->Profile_model->editProfile($id,$data)) {
                    $result['res'] = "Error input";
                } else{
                    $result['res'] = "Berhasil";
                }
            
            echo json_encode($result);
        }

        function changePass($id){
            $this->form_validation->set_rules('password', 'Password', 'trim|matches[cpassword]|required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
             $_POST = json_decode(file_get_contents('php://input'),true);
             $pass = $this->input->post('password');
             $cpass = $this->input->post('cpassword');

            if ($this->form_validation->run()==false) {
                $result['err'] = validation_errors();
            } else{
               
                $data = array('password' => md5($_POST['password']),);
                if ($this->Profile_model->editProfile($id,$data)) {
                    $result['err'] = "Error input";
                } else{
                    $result['res'] = "Berhasil";
                }
            }
             if (isset($result['err'])) {
                 echo json_encode(array("id"=>"err","res"=>$result['err']));
             } 
             if (isset($result['res'])) {
                 echo json_encode(array("id"=>"res","res"=>$result['res']));
             }
        }
}