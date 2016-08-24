<?php
class Admin_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	// public function show_all_users(){
	// 	$query = $this->db->get('aauth_users');
	// 	return $query->result();
	// }

	// public function show_user($id){
	// 	$query = $this->db->get_where('aauth_user_profile', array('user_id' => $id));
	// 	return $query->result();
	// }
}
?>