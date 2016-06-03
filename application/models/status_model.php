<?php
class Status_model extends CI_Model
{
	public function __construct()
	{//Core controller constructor
	parent::__construct();
	date_default_timezone_set('Asia/Manila');
	
	}
	
	//get all status
	public function get_status(){
		$this->db->select ( '*' );
		//$this->db->limit(5,0);
		$this->db->from ( 'status' );
		$this->db->join ( 'aauth_user_profile', 'aauth_user_profile.user_id = status.user_id' , 'left' );
		$this->db->join ( 'aauth_users', 'aauth_users.id = aauth_user_profile.user_id' , 'left' );
		$this->db->order_by("status_id","desc");
		$query = $this->db->get ();
		return $query->result ();
	}
	
	//insert status
	public function insert_status($datas){
		$this->db->insert('status',$datas);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}
	
	//delete status
	public function delete_status(){
		$status_id = $this->input->post('status_id');
		$this->db->where('status_id', $status_id);
		$this->db->delete('status');
		$this->db->where('cmt_status_id', $status_id);
		$this->db->delete('status_comments');
	}
	
	//update/edit status
	public function update_status(){
		$status_id = $this->input->post('status_id');
		$status = $this->input->post('status');
		$this->db->where('status_id', $status_id);
		$this->db->update('status',array('status'=>$status));
	}
	
	//get comments
	public function get_comments(){
		$this->db->select('*');
		$this->db->from ( 'aauth_user_profile' );
		$this->db->join ( 'aauth_users', 'aauth_users.id = aauth_user_profile.user_id' , 'left' );
		$this->db->join ( 'status_comments', 'status_comments.user_id = aauth_users.id' , 'left' );
		$this->db->order_by("comment_id","desc");
		$query = $this->db->get ();
		return $query->result ();
	}
	
	//insert comments
	public function insert_comment($data){
		$this->db->insert('status_comments',$data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}
	
}
?>