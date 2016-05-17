<?php

class Newsmodel	extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }
    
    public function post(){
		
    }
    
    public function show(){
        $query = $this->db->get('news');
        return $query->result();
    }
        

}

?>