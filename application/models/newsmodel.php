<?php

class Newsmodel	extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }
    // insert post to db
    public function post($content,$title){
        $format = "Y-m-d";
	    $data = array(
            'content' => $content,
            'date'    => date($format),
            'title'   => $title
        );
        $this->db->insert('news', $data);
    }
    //retrieve a specific news from db
    public function show($id){
        $query = $this->db->get_where('news', array('news_id' => $id));
        return $query->result();
    }
    //retrieve all news entry from db
    public function show_all(){
        $this->db->order_by('news_id','DESC');
        $query = $this->db->get('news');
        return $query->result();
    }
    //delete a news entry in table news
    public function delete($id){
        $this->db->where('news_id', $id);
        $this->db->delete('news');
    }
    //insert a comment entry in news_comments table
    public function insert_comment($data){
        $this->db->insert('news_comments',$data);
        $inserted_id = $this->db->insert_id();
        return $inserted_id;
    }
    //retrieve comments entry from news_comments table
    public function get_comments($news_id){
        $this->db->select('*');
        $this->db->where('news_id',$news_id);
        $this->db->from ( 'news_comments' );
        $this->db->join ( 'aauth_user_profile', 'aauth_user_profile.user_id = news_comments.user_id' , 'left' );
        $this->db->join ( 'aauth_users', 'aauth_users.id = aauth_user_profile.user_id' , 'left' );
        $this->db->order_by("news_comments.id","desc");
        $query = $this->db->get ();
        return $query->result ();
    }
    //count all entries in table news_comments
    public function count_comments($news_id){
        $this->db->where('news_id',$news_id);
        $this->db->from('news_comments');
        return $this->db->count_all_results();
    }
}
?>