<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Profile_Model extends CI_Model
{
	
	public function getUserInfo()
	{
		$this->db->select('*');
		$this->db->from('aauth_users');
		$this->db->join('aauth_user_profile', 'aauth_user_profile.user_id = aauth_users.id');
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateUserInfo($data){
	
		extract($data);
		
		
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		$this->db->update('aauth_user_profile',$data);
		
		
		return true;
	}
	
	
	//update their usernames,passwords, and emails.
	public function updateAccountInfo($data){
	
		extract($data);
	
		$user_id = $this->session->userdata('id');
		$this->db->where('id', $user_id);
		$this->db->update('aauth_users',$data);
	
		return true;
	}
}
