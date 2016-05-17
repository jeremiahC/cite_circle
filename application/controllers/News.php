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
                $row =  $this->newsmodel->show();
                foreach ($row as $rows){
                    $data= array(
                        'body' => 'news/index', // call your content
                        'post_content' => $rows->content,
                        'post_user' => 'School admin',
                        'post_dt' => $rows->date
                    );
                    $this->load->view('template/template', $data);
                }
            } else {
                redirect('/');
            }
	}

	public function post($id){
		//create a function were a school_admin can post news or normal post
                echo $id;
//                if($id == 1){
//                    echo "true";
//                }else{
//                    echo "false";
//                }
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