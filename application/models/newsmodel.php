<?php

class Newsmodel	extends CI_Model
{
<<<<<<< HEAD
	public function post(){
		
	}

	public function vote(){
		$news_id = $this->input->post('news_id');
		$user_id = $this->input->post('user_id');

		$data = array(
			'news_id'=>$news_id,
			'user_id'=>$user_id
			);
		$this->db->insert('vote',$data);

	}
=======
    public function __construct() {
        parent::__construct();
    }
    
    public function post(){
		
    }
    
    public function show(){
        $query = $this->db->get('news');
        return $query->result();
    }
        
>>>>>>> dbd5069613737764caa1f0201f8d0accb004a9c3
}

?>