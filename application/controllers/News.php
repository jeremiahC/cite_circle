<?php
class News extends CI_Controller{

	//ROle:School Admin
	 public function __construct(){
	    parent::__construct();
		// Your own constructor code
		$this->load->library("Aauth");
	    $this->load->database();
	    $this->load->model('newsmodel');
	}

	public function index(){
		
		if ( $this->aauth->is_loggedin() ){
			$data['body'] = 'news/index'; // call your content
			$this->load->view('template/template', $data);
		} else {
			redirect('/');
		}
	}

	public function post(){
		//create a function were a school_admin can post news or normal post

	}

	public function vote(){
		$this->newsmodel->vote();
	}

// 	public function delete(){
// 		//create a function were a school_admin can delet news or normal post
// 	}
// 
}
?>