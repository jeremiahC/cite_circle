<?php

class Newsmodel	extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }
    
    public function post($content,$title){
        $format = "Y-m-d";
	    $data = array(
            'content' => $content,
            'date'    => date($format),
            'title'   => $title
        );
        $this->db->insert('news', $data);
    }
    
    public function show($id){
        $query = $this->db->get_where('news', array('news_id' => $id));
        return $query->result();
    }
    
    public function show_all(){
        $this->db->order_by('news_id','DESC');
        $query = $this->db->get('news');
        return $query->result();
    }
    
    public function delete($id){
        $this->db->where('news_id', $id);
        $this->db->delete('news');
    }
    
    public function vote(){
        $user_id = $this->input->post('user_id');
        $news_id = $this->input->post('news_id');
        
         $data = array(
             'news_id'=>$news_id,
             'user_id'=>$user_id
         );
        $this->db->insert('votes',$data);
    }
}

?>