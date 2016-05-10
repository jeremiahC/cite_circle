<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {
 	public function __construct(){
	    parent::__construct();
		// Your own constructor code
		$this->load->library("Aauth");
	    $this->load->database();
	    $this->load->model('status_model');
	}
	
	function index(){
		
		if ( $this->aauth->is_loggedin() ){
			$data['body'] = 'status_view'; // call your content
			$this->load->view('template/template', $data);
		} else {
			redirect('/');
		}
	}
	
	public function display_status()
	{
		$data['query']=$this->status_model->get_status();
		echo $this->load->view('pages/display_status',$data,TRUE);
	}
	
	public function insert_status()
	{
		$this->status_model->insert_status();
		$this->display_status();
	}
    
}

/* End of file status.php */
/* Location: ./application/controllers/status.php */