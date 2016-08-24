<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*************************************
 **** Author : Jeremiah Caballero ****
 **** Date : May 02, 2016         ****
 *************************************/

class News extends CI_Controller{
        /* Role Access : School Admin*/
    
	public function __construct(){
	    parent::__construct();
        $this->load->helper('url');
	}

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
            $label = $this->input->post('label');
            $this->newsmodel->post($content,$title);
            redirect('postnews');
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
                    'post_id'      => $rows->news_id
                );
                
            $data['comment'] = $this->newsmodel->get_comments($data['post_id']);
            $data['count'] = $this->newsmodel->count_comments($data['post_id']);

            }

            $data['body']= 'news/view'; 
            $this->parser->parse('template/template',$data);

    }
        
    public function post_comment(){
        $user_id = $this->session->userdata('id');
        $news_id = $this->input->post('news_id');
        $content = $this->input->post('comments');
        // exit(var_dump($content));
        $data['user_id']= $user_id;
        $data['content']= $content;
        $data['cmt_status_id']= $news_id;
        $datas=array(
                'user_id'=>$data['user_id'] ,
                'content'=>$data['content'],
                'news_id'=>$data['cmt_status_id']
                );
        $data['inserted_id'] = $this->newsmodel->insert_comment($datas);
        $this->load->view('news/comments',$data);

    }

    public function delete(){
            $news_id = $this->input->post('news_id');
            $this->newsmodel->delete($news_id);
    }

}
?>