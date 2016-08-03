<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
 	public function __construct(){
	    parent::__construct();
		// Your own constructor code
		$this->load->library("Aauth");
	    if ( !$this->aauth->is_loggedin() ){
	    	redirect('/');
	    }
	}
	
	function index(){
		$data['body'] = 'users/users'; // call your content
		$this->load->view('template/template', $data);
	}

		

}