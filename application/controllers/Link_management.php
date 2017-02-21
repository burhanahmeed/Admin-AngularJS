<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Link_management extends CI_Controller
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
            $this->load->model('Link_model');

        }

    public function index()
    {
        
    }

    public function list_links(){
        $data = $this->Link_model->get_all_link();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_edit_data($id){
        $res = $this->Link_model->show_link_id($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
    public function edit_link($id){
        $this->form_validation->set_rules('short_url','Custom URL','min_length[2]|trim|is_unique[urls.short_url]|callback_no_space_func');
        $this->form_validation->set_message('is_unique','%s has been taken');
        $data = $this->input->post('short_url');
        $_POST = json_decode(file_get_contents('php://input'), true);

        $cstm = array( 'short_url' => $_POST['short_url']);
        if ($this->form_validation->run() == false) {
            $page_data['error'] = validation_errors();
        } else {
            
            if ($edit_cstm = $this->Link_model->editLink($id,$cstm) == FALSE) {
                    $page_data['success'] = 'Custom Link successfully updated' ;
                } else{
                    $page_data['error'] = 'error';
                }
        }

        if (isset($page_data['success'])) {
            echo json_encode(array('msg'=>'success', 'isi' => $page_data['success'], 'base'=> base_url()));
        } else if (isset($page_data['error'])) {
            echo json_encode(array('msg'=>'err', 'isi' => $page_data['error'], 'base'=> base_url()));
        }
    }
    function no_space_func($str)
    {
        if (preg_match("/[^a-z_0-9]/i", $str)) {
            $this->form_validation->set_message('no_space_func', 'Bad custom URL format');
            return false;
        } else{
            return true;
        }
    }

    function deleteLink($id){
        $this->Link_model->deleteLink($id);
    }

    function delMultiple(){
        // $id = $this->input->post('linkid');
        $_POST = json_decode(file_get_contents('php://input'),true);
        // $post = file_get_contents('php://input');
        $list = $_POST['id'];
        foreach ( $list as $linkid) {
            $this->Link_model->deleteLink($linkid);
            
            // if ($this->Link_model->deleteLink($linkid)) {
            // echo "Successfully deleted {$linkid}" ;
            // } else{
            //     echo "Gagal {$linkid}";
            // }
        }
        // printf($id);
        // echo $list;
        // var_dump($_POST);

        // echo $id;
    }
}
