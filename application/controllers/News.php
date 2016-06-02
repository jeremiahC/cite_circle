<?php

use views\Form;

class News extends CI_Controller{
        
	//ROle:School Admin
	public function __construct(){
	    parent::__construct();
		// Your own constructor code
                $this->load->library("Aauth");
                $this->load->model('newsmodel');
                $this->load->library('parser');
	}
        
	public function index(){
            
            if ( $this->aauth->is_loggedin() ){    
                    $data['body']= 'news/index'; 
                    $this->parser->parse('template/template',$data);
            } else {
                redirect('/');
            }
	}
        
	public function post_data(){
            $content = $this->input->post('postnews');
            $this->newsmodel->post($content);
            $this->post_show();
	}
        
        public function post_show(){
            $row =  $this->newsmodel->show();
            foreach($row as $rows){
                $data = array(
                    'post_content' => $rows->content,
                    'post_user'    => 'School Admin',
                    'post_date'    => $rows->date,
                );
                $this->parser->parse('news/post',$data);
            } 
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