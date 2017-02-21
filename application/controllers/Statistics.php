<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {

	// construct
	function __construct() {
        parent::__construct();
            $this->load->model('Stat_model');
        }

	public function index()
	{
		
	}

	function count_all_links(){
		$table = 'urls';
		$res = $this->Stat_model->count_link($table);
		echo $res;
	}
	function link_clicked(){
		$res = $this->Stat_model->total_link_clicked();
		echo $res;
	}
	function get_top_view(){
		$res = $this->Stat_model->get_top();
		echo json_encode($res);
	}
}