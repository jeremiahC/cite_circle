<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Profile_Model extends CI_Model
{
	
	
	public function getUserInfo()
	{
		$this->db->select('*');
		$this->db->from('aauth_users');
		$this->db->join('user_profile', 'user_profile.user_id = aauth_users.id');
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function insertUserInfo($data){
	
		extract($data);
		$this->db->insert('user_profile',$data);
		return true;
	}

	
	
	public function updateUserInfo($data){
	
		extract($data);
		
		
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id', $user_id);
		$this->db->update('user_profile',$data);
		
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
	
	
	//check if the username(which is to be update) is exist.
	public function check_user_exist($username)
	{
		$this->db->where("name",$username);
		$query=$this->db->get("aauth_users");
		if($query->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	//check if the password(which is to be update) is exist.
	public function check_pass_exist($password)
	{
		$this->db->where("pass", $password);
		$query=$this->db->get("aauth_users");
		if($query->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	//check if the email(which is to be update) is exist.
	public function check_email_exist($email)
	{
		$this->db->where("email",$email);
		$query=$this->db->get("aauth_users");
		
		if($query->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
