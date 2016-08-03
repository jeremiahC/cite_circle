<?php
class Status_model extends CI_Model
{
	public function __construct()
	{//Core controller constructor
	parent::__construct();
	date_default_timezone_set('Asia/Manila');
	$this->postTable = 'status';
	}
	
	function count_status(){
		$query = $this->db->count_all_results('status');
		return $query;
	}
	
	//get all status
	public function get_status($start, $limit=0){
		$this->db->select ( '*' );
		$this->db->limit($start, $limit);
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
	public function get_comments($id){
		$this->db->select('*');
		$this->db->from ( 'status_comments' );
		$this->db->join ( 'aauth_user_profile', 'aauth_user_profile.user_id = status_comments.user_id' , 'left' );
		$this->db->join ( 'aauth_users', 'aauth_users.id = aauth_user_profile.user_id' , 'left' );
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

	public function delete_like($status_id, $user_id){
		$this->db->where('voted_status_id', $status_id);
		$this->db->where('vote_user_id', $user_id);
		$this->db->delete('vote');
		return true;
	}

	public function insert_like($status_id, $user_id){
		$this->db->insert('vote', array('voted_status_id' => $status_id,'vote_user_id' => $user_id));
		return true;
	}

	public function like_check($status_id,$user_id){
		$this->db->select("*");
		$this->db->from("vote");
		$this->db->where("voted_status_id", $status_id);
		$this->db->where('vote_user_id', $user_id);
		$result= $this->db->get();
		if($result->row_array() > 0 ){
			return true;
		}else{
			return false;
		}
	}
	
	public function count_likes($status_id){
		$this->db->select("COUNT(*) AS likes_count");
		$this->db->from("vote");
		$this->db->where("voted_status_id", $status_id);
		$result= $this->db->get();
		return $result->row_array();
	}

	public function user_who_likes($status_id){
		$query = $this->db->get_where('vote', array('voted_status_id' => $status_id));
		return $query->result_array();
	}
	
	public function get_who_likes($voted_user){
		$query = $this->db->get_where('aauth_user_profile', array('user_id' => $voted_user));
		return $query->result_array();
	 }

	 public function get_userdata($id){
	 	$query = $this->db->get_where('aauth_users', array('id' => $id));
		return $query->result_array();
	 }

	 

}
?>