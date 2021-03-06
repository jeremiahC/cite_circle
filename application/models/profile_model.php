<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Profile_Model extends CI_Model
{

		public function __construct(){
		parent::__construct();
		$this->load->library("Aauth");
		$this->load->helper(array('html','file'));
	}

	public function getAllUsersInfo()
	{
		$this->db->select('*');
		$this->db->from('aauth_users');
		$this->db->join('aauth_user_profile', 'aauth_user_profile.user_id = aauth_users.id');
		$this->db->order_by("firstname asc");
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getUserInfo($user_id)
	{
		$this->db->select('*');
		$this->db->from('aauth_users');
		$this->db->join('aauth_user_profile', 'aauth_user_profile.user_id = aauth_users.id');
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
	
	
	public function do_upload()
	{
		$user_id = $this->session->userdata('id');
	
		$config = array(
				'upload_path'   => './assets/uploads/',
				'allowed_types' => 'gif|jpg|png',
				'max_size'      => '10000',
				'max_width'     => '5000',
				'max_height'	=> '5000'
		);
	
	
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload()){
			return $this->upload->display_errors();
		}
	
		$upload_data = $this->upload->data();
		$data['user_picture']=  $upload_data['file_name'] ;
		// $data['picture_caption'] = $this->input->post('picture_caption');
	
		$this->db->where('user_id',$user_id);
		$this->db->update('aauth_user_profile',$data);
	}
	
	
	public function get_upload($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('aauth_user_profile');
		return $query->result();
	}

	public function update_online($time){
		$user_id = $this->session->userdata('id');
		$this->db->where('id', $user_id);
		$this->db->update('aauth_users', array('online'=>$time));
	}
}
