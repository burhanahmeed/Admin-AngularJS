<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Stat_model extends CI_Model {
    
    // protected $table_name;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function count_link($table){
    	// $table_name = 'urls';
    	$query = $this->db->query('Select * From urls');
        return $query->num_rows();
    }
    function total_link_clicked(){
        $this->db->select_sum('url_views','views');
        $query = $this->db->from('urls');
        return $this->db->get()->row()->views;
    }
    function get_top(){
		$query = $this->db->select('*')
                ->from('urls')
                ->order_By('url_views','desc')
                ->limit(6)
                ->get()->result_array();
        return $query;
	}
    function deleteLink($id){
        $this->db->where('id',$id);
        $this->db->delete('urls');
    }
}