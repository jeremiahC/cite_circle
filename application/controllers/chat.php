<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Controller {
 	public function __construct(){
	    parent::__construct();
		$this->load->library("Aauth");
		$this->load->model('chat_model');
	    }
	//SEND A MESSAGE TO GLOBAL CHAT
	public function send_message(){
		$message = $this->input->get('message', null);
		$id = $this->session->userdata('id');
		$this->chat_model->add_message($message, $id);
		$this->_setOutput($message);
	}
	//GET CHAT MESSAGES WHERE TIME > NOW
	public function get_messages(){
		$timestamp = $this->input->get('timestamp', null);
		$messages = $this->chat_model->get_messages($timestamp);
		$this->_setOutput($messages);
	}
	//DATA MESSAGES TO JSON ENCODE
	private function _setOutput($data){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($data);
	}
}
?>