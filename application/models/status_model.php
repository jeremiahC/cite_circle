<?php
class Status_model extends CI_Model
{
	public function __construct()
	{//Core controller constructor
	parent::__construct();
	$this->load->helper('date');
	date_default_timezone_set('Asia/Manila');
	
	}
	//get status
	public function get_status(){
 		$this->db->select('*');
		$this->db->from('aauth_users');
		$this->db->join('status', 'aauth_users.id = status.user_id');
		$this->db->order_by("status_id","desc");
		$query = $this->db->get();
		return $query->result();
	}
	
	//insert status
	public function insert_status(){
		$user_id=$this->input->post('user_id');
		$status=$this->input->post('status');
		$time = time();
		$datestring = "%Y-%m-%d - %h:%i %a";
		$date= mdate($datestring, $time);
		$this->db->insert('status',array('user_id'=>$user_id ,'status'=>$status,'time'=> $date));
	}
	
	
	
	
	
	//get comments
	public function get_comments(){
		$this->db->select('*');
		$query = $this->db->get('status_comments');
		return $query->result();
	}
	
	//insert comments
	public function insert_comment(){
		$name=$this->input->post('name');
		$cmt_status_id=$this->input->post('cmt_status_id');
		$comment=$this->input->post('comment');
		$time = time();
		$datestring = "%Y-%m-%d - %h:%i %a";
		$date= mdate($datestring, $time);
		$this->db->insert('status_comments',array('name'=>$name ,'comment'=>$comment,'time'=> $date,'cmt_status_id'=>$cmt_status_id));
		return $this->db->insert_id();
	}
	
	//delete comment
	public function delete_comment(){
		$id = $this->input->post('id');
		$this->db->where('comment_id', $id);
		$this->db->delete('status_comments');
	}
	
	
}
?>