<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {
 	public function __construct(){
	    parent::__construct();
		// Your own constructor code
		$this->load->library("Aauth");
		$this->load->model('chat_model');
	    }
	
	public function send_message()
	{
		$message = $this->input->get('message', null);
		$id = $this->session->userdata('id');
		
		$this->chat_model->add_message($message, $id);
		
		$this->_setOutput($message);
	}
	
	
	public function get_messages()
	{
		$timestamp = $this->input->get('timestamp', null);
		
		$messages = $this->chat_model->get_messages($timestamp);
		
		$this->_setOutput($messages);
	}
	
	
	private function _setOutput($data)
	{
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		
		echo json_encode($data);
	}

	
}

/* End of file status.php */
/* Location: ./application/controllers/status.php */