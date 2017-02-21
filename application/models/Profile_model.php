<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Profile_model extends CI_Model {
    
    // protected $table_name;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_all_data(){
    	$table_name = 'user_auth';
    	return $this->db->from($table_name)->get()->result_array();
    }
    function editProfile($id,$data){
    	$this->db->where('uid',$id);
    	$this->db->update('user_auth',$data);
    }
    function show_user_id($id){
		// $query = $this->db->get_where('user_auth', array('uid' => $id));
        $this->db->select('uid,name,email,role,created')
                ->from('user_auth')
                ->where(array('uid' => $id));
        $query = $this->db->get();
		$result = $query->row();
		return $result;
	}
    function deleteLink($id){
        $this->db->where('id',$id);
        $this->db->delete('urls');
    }
}