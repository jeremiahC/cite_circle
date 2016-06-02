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
    
    public function show(){
        $query = $this->db->get('news');
        return $query->result();
    }
        

}

?>