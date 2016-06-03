<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {
 	public function __construct(){
	    parent::__construct();
		// Your own constructor code
		$this->load->library("Aauth");
	    $this->load->model('status_model');
	    date_default_timezone_set('Asia/Manila');
	    if ( !$this->aauth->is_loggedin() ){
	    	redirect('/');
	    }
	}
	
	function index(){
			$data['active_nav'] = 'feed';
			$data['body'] = 'status/status_view'; // call your content
			$this->load->view('template/template', $data);
	}
	
	public function display_status(){
		$data['query']=$this->status_model->get_status();
		$data['query2']=$this->status_model->get_comments();
		echo $this->load->view('status/display_status',$data,TRUE);
	}

	public function insert_status(){
		$data['user_id']=$this->input->post('user_id');
		$data['status']=$this->input->post('status');
		$data['date']= time();
		$datas=array('user_id'=>$data['user_id'],
				'status'=>$data['status'],
				'time'=> $data['date']);
		
		$this->status_model->insert_status($datas);
		$this->display_status();
		
	}
	
	public function delete_status(){
		$this->status_model->delete_status();
	}
	
	public function update_status(){
		$this->status_model->update_status();
	}
	
	//comment functions below
	public function insert_comment(){
		$data['user_id']=$this->input->post('user_id');
		$data['content']=$this->input->post('content');
		$data['cmt_status_id']=$this->input->post('cmt_status_id');
		
		$data['date']= time();
		
		$datas=array('user_id'=>$data['user_id'] ,
				'content'=>$data['content'],
				'time'=> $data['date'],
				'cmt_status_id'=>$data['cmt_status_id']);
		
		$data['inserted_id'] = $this->status_model->insert_comment($datas);
		
		echo $this->load->view('status/comment_tempate',$data,TRUE);
	}
    
}

/* End of file status.php */
/* Location: ./application/controllers/status.php */