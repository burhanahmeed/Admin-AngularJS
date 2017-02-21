<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Link_model extends CI_Model {
    
    // protected $table_name;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_all_link(){
    	$table_name = 'urls';
    	return $this->db->from($table_name)->get()->result_array();
    }
    function editLink($id,$data){
    	$this->db->where('id',$id);
    	$this->db->update('urls',$data);
    }
    function show_link_id($id){
		$query = $this->db->get_where('urls', array('id' => $id));
		$result = $query->row();
		return $result;
	}
    function deleteLink($id){
        $this->db->where('id',$id);
        $this->db->delete('urls');
    }
}