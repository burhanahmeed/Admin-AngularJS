<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		if (!$this->session->userdata('logged')) {
			redirect('login');
		} else{
			$data['title'] = 'Dashboard';
			$data['name'] = $this->session->userdata('logged')['name'];
			$this->load->view('admin/layout',$data);
		}
	}

	function home(){
		$this->load->view('admin/home');
	}

	function links_management(){
		$this->load->view('admin/links_m');
	}
	function link_stats(){
		$this->load->view('admin/view_m');	
	}
	function profile(){
		$this->load->view('admin/profile_v');
	}
}
