<?php

use application\views\Form;

class News extends CI_Controller{

	//ROle:School Admin
	 public function __construct(){
	    parent::__construct();
		// Your own constructor code
                $this->load->library("Aauth");
                $this->load->database();
                $this->load->model('newsmodel');
                $this->load->helper('html');
                $this->load->helper('form');
	}

//        public function post_form(){
//            $textarea = array(
//                    'name'          => 'email',
//                    'class'         => 'form-control',
//                    'rows'          => 2,
//                    'placeholder'   => 'Write a post ...'
//            );
//            $button = array(
//                    'class' => 'ui positive button',
//            );
//            $form[]=form_textarea($textarea);
//            $form[]=form_button($button, 'Post');
//            echo $form;
//        }
//        
	public function index(){
            $textarea = array(
                    'name'          => 'post_news',
                    'class'         => 'form-control',
                    'rows'          => 2,
                    'placeholder'   => 'Write a post ...'
            );
            $button = array(
                    'class' => 'ui positive button',
            );
            if ( $this->aauth->is_loggedin() ){    
                    $row = $this->newsmodel->show();
                    $data['body']= 'news/index'; 
                    $data['form']= form_textarea($textarea);
                    $data['button']= form_button($button, 'Post');
                    $this->load->view('template/template', $data);
                    foreach ($row as $rows){
                        $data1 = array(
                            'post_content'  => $rows->content,
                            'post_user'     => 'School Admin',
                            'post_date'     => $rows->date
                        );
                        $this->load->view('news/post',$data1);
                    }
                    
            } else {
                redirect('/');
            }
	}
        
	public function post(){
            //create a function were a school_admin can post news or normal post
            $this->newsmodel->post();
            redirect('post_news');
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