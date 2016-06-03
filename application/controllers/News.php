<?php
/*************************************
 **** Author : Jeremiah Caballero ****
 **** Date : May 02, 2016         ****
 *************************************/

class News extends CI_Controller{
        /* Role Access : School Admin*/
    
	public function __construct(){
	    parent::__construct();
            $this->load->library("Aauth");
            $this->load->library("parser");
            $this->load->model('newsmodel');
	}
        
        //default page
	public function index(){
            
            if ( $this->aauth->is_loggedin() ){    
                    $data['body']= 'news/index'; 
                    $this->parser->parse('template/template',$data);
            } else {
                redirect('/');
            }
	}
        //goes to create page
        public function post_create(){ 
            $data['body']= 'news/create'; 
            $this->parser->parse('template/template',$data);             
        }
        
        //post your entry
	public function post_data(){
            $title =  $this->input->post('header');
            $content = $this->input->post('postnews');
            $this->newsmodel->post($content,$title);
            redirect('post_news');
	}
        
        //show your entry at the news page
        public function post_show(){
            $row =  $this->newsmodel->show_all();
            $data['show'] = $row;
            $this->parser->parse('news/post',$data);
        }
        
        //view page for an individual entry
        public function post_view($id){

            $row =  $this->newsmodel->show($id);
            foreach($row as $rows){
                $data = array(
                    'post_content' => $rows->content,
                    'post_user'    => 'School Admin',
                    'post_date'    => $rows->date,
                    'post_title'   => $rows->title,
                );
                
            }$data['body']= 'news/view'; 
            $this->parser->parse('template/template',$data);
        }
        
	public function vote(){
		$this->newsmodel->vote();
	}
        
        public function delete($id){
            $this->newsmodel->delete($id);
        }

}
?>