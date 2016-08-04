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

		$data['users'] = $this->profile_model->getAllUsersInfo();
		$data['body'] = 'pm/pm'; // call your content
		$this->load->view('template/template', $data);
	}

		

}