<?php

class Newsmodel	extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }
    
    public function post(){
        $format = "Y-m-d";
	$data = array(
            'content' => 'ako la;asdfad',
            'date'  => date($format)
        );
        
        $this->db->insert('news', $data);
    }
    
    public function show(){
        $query = $this->db->get('news');
        return $query->result();
    }
        

}

?>