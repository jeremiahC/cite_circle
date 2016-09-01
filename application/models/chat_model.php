<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model {  
  	//INSERT A CHAT FROM GLOBAL CHAT
	function add_message($message, $id){
		$data = array(
			'message'	=> (string) $message,
			'user_id'	=> (string) $id,
			'timestamp'	=> time(),
		);
		$this->db->insert('messages', $data);
	}
	//GET CHAT MESSAGES FROM DB WHERE TIME > NOW
	function get_messages($timestamp){
		$this->db->from ( 'messages' );
		$this->db->where('timestamp >', $timestamp);
		$this->db->join ( 'aauth_user_profile', 'aauth_user_profile.user_id = messages.user_id' , 'left' );
		$this->db->join ( 'aauth_users', 'aauth_users.id = aauth_user_profile.user_id' , 'left' );
		$this->db->order_by('timestamp', 'DESC');
		$this->db->limit(10); 
		$query = $this->db->get();
		return array_reverse($query->result_array());
	}

}