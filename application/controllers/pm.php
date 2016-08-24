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
	}
	
	function index(){
		$receiver_id = $this->session->userdata('id');
		$limit = 5;
		$offset = 0;
		$data['pms'] = $this->aauth->list_pms($limit, $offset, $receiver_id , $sender_id= FALSE);
		$data['users'] = $this->profile_model->getAllUsersInfo();
		$data['body'] = 'pm/pm'; // call your content
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

}