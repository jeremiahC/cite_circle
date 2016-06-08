<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {
 	public function __construct(){
	    parent::__construct();
		// Your own constructor code
		$this->load->library("Aauth");
	    $this->load->model('status_model');
	    $this->load->library('pagination');
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
		$config['base_url'] = base_url().'status/display_status';
		$config['total_rows'] = $this->status_model->count_status();
		$config['per_page'] = 5;
		$config["uri_segment"] = 3;
		$data['query']=$this->status_model->get_status($config['per_page'] ,$this->uri->segment(3));
		foreach ($data['query'] as $query){
		$data['query2']=$this->status_model->get_comments($query->status_id);
		}
		$this->pagination->initialize($config);
		echo $this->load->view('status/display_status',$data,TRUE);
	}

	public function display_more_status(){
		$page = $this->input->post('pagenumber');
		$start = 5 * ($page-1);
		$config['base_url'] = base_url().'status/display_more_status';
		$config['total_rows'] = $this->status_model->count_status();
		$config['per_page'] = 5;
		$config["uri_segment"] = 3;
		$config["use_page_numbers"] = TRUE;
		$data['query']=$this->status_model->get_status($config['per_page'] ,$start);
		foreach ($data['query'] as $query){
		$data['query2']=$this->status_model->get_comments($query->status_id);
		}
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['batchNo'] = $page;
		echo $this->load->view('status/status_template',$data,TRUE);
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