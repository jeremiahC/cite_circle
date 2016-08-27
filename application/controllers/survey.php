<?php

class Survey extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
 		$this->load->library("Aauth");
	    if ( !$this->aauth->is_loggedin() ){
	    	redirect('/');
	    }
		$this->load->model('survey_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('citenian', 'This ', 'max_length[155]');			
		$this->form_validation->set_rules('social_media[]', 'This ', 'required|trim|max_length[155]');			
		$this->form_validation->set_rules('make_friends', 'This ', 'required|trim|max_length[15]');		
		$this->form_validation->set_rules('social_media_useful_no', 'This ', 'trim');		
		$this->form_validation->set_rules('social_media_useful[]', 'This ', 'trim');	
		$this->form_validation->set_rules('tried', 'This ', 'required|trim|max_length[155]');			
		$this->form_validation->set_rules('project_use[]', 'This ', 'required|trim|max_length[155]');			
		$this->form_validation->set_rules('performance', 'This ', 'required|max_length[5]');			
		$this->form_validation->set_rules('project_help[]', 'This ', 'required|trim|max_length[155]');			
		$this->form_validation->set_rules('fit', 'This ', 'required|trim|max_length[5]');
				
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$data['body'] = 'survey/survey_view'; // call your content
			$user_id = $this->session->userdata('id');
                    $data['upload_files'] = $this->profile_model->get_upload($user_id);
			$this->load->view('template/template', $data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			$social_media = set_value('social_media');
			$social_media_useful = set_value('social_media_useful');
			$project_use = set_value('project_use');
			$project_help = set_value('project_help');
			$form_data = array(
					       	'citenian' => set_value('citenian'),
					       	'social_media' => implode(",", $social_media),
					       	'make_friends' => set_value('make_friends'),
					       	'social_media_useful_no' => set_value('social_media_useful_no'),
					       	'social_media_useful' => implode(",", $social_media_useful),
					       	'tried' => set_value('tried'),
					       	'project_use' => implode(",", $project_use),
					       	'performance' => set_value('performance'),
					       	'project_help' => implode(",", $project_help),
					       	'fit' => set_value('fit')
						);
					
			// run insert model to write data to db
		
			if ($this->survey_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('survey/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			$data['body'] = 'survey/survey_success'; // call your content
			$user_id = $this->session->userdata('id');
                    $data['upload_files'] = $this->profile_model->get_upload($user_id);
			$this->load->view('template/template', $data);
	}
}
?>