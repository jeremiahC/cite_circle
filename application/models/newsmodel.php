<?php

class Newsmodel	extends CI_Model
{
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
}

?>