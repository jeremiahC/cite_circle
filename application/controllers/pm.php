<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pm extends CI_Controller {
 	public function __construct(){
	    parent::__construct();
		// Your own constructor code
		$this->load->library("Aauth");
	    if ( !$this->aauth->is_loggedin() ){
	    	redirect('/');
	    }
	    $this->load->model('profile_model');
	    date_default_timezone_set('Asia/Manila');
	}
	
	function index(){
		$data['body'] = 'pm/pm'; // call your content
		$user_id = $this->session->userdata('id');
		$data['upload_files'] = $this->profile_model->get_upload($user_id);
		$this->load->view('template/template', $data);
	}

	function send_pm(){
		$sender_id = $this->session->userdata('id');
		$receiver_id = $this->input->post('receiver_id');
		$subj = $this->input->post('subj');
		$message = $this->input->post('message');

		$this->aauth->send_pm($sender_id, $receiver_id, $subj, $message);
	}

	function read_pm(){
		$pm_id = $this->input->post('pm_id');
		$this->aauth->get_pm($pm_id);
	}

	function count_unread_pms(){
		$receiver_id = $this->session->userdata('id');
		echo $this->aauth->count_unread_pms($receiver_id);
	}

	function display_users(){
		$data['users'] = $this->profile_model->getAllUsersInfo();
		echo $this->load->view('pm/display_users',$data,TRUE);
	}

	function display_pms(){
		$receiver_id = $this->session->userdata('id');
		$limit_count = $this->input->post('limit');
		$limit = $limit_count;
		$offset = 0;
		$data['pms'] = $this->aauth->list_pms($limit, $offset, $receiver_id , $sender_id= FALSE);
		echo $this->load->view('pm/display_pms',$data,TRUE);
	}

	function display_more_pms(){
		$receiver_id = $this->session->userdata('id');
		$offset_count = $this->input->post('offset');
		$data['batch_no'] = $this->input->post('batch_no');
		$limit = 5;
		$offset = $offset_count;
		$data['pms'] = $this->aauth->list_pms($limit, $offset, $receiver_id , $sender_id= FALSE);
		echo $this->load->view('pm/display_pms_template',$data,TRUE);
	}

}