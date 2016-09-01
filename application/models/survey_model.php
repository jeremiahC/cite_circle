<?php

class Survey_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	//SAVE DATA TO SURVEY TABLE
	function SaveForm($form_data){
		$this->db->insert('survey', $form_data);
		if ($this->db->affected_rows() == '1'){
			return TRUE;
		}
		return FALSE;
	}
}
?>