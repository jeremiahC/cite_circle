<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->library("Aauth");
		$this->load->helper(array('url','form','html','file'));
		$this->load->library('../controllers/status');
		if ( !$this->aauth->is_loggedin() ){
			redirect('/');
		}
	}
	
	public function index()
	{
		// $user_id = $this->session->userdata('id');
		// $data['error'] = $this->profile_model->do_upload();
		// $data['user_profile'] = $this->profile_model->getUserInfo();
		// $data['upload_files'] = $this->profile_model->get_upload($user_id);
		// $data['body'] = 'profile/profile_view'; // call your content
		// $this->load->view('template/template', $data);
		$this->status->index();
	}
	
	
	
	public function editUpdateProfile(){
			$data['user_profile'] = $this->profile_model->getUserInfo();
			$data['body'] = 'profile/update'; // call your content
			$this->load->view('template/template', $data);
	}
	
	
	public function update_account()
	{
		$this->form_validation->set_rules('username' ,'User name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password','Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE){
			echo "false";
		}else{
			$user_id = $this->session->userdata('id');
			$user_name = $this->input->post('username');
			$user_email= $this->input->post('email'); 
			$user_password = $this->input->post('password');
			
			if($this->aauth->update_user($user_id, $user_email, $user_password, $user_name)){
				echo "true";
			}else{
				echo "false";
			}
		}
	}
	
	
	public function update_profile(){
	
		$this->form_validation->set_rules('firstname', 'First name' ,'required');
		$this->form_validation->set_rules('lastname', 'Last name' ,'required');
		$this->form_validation->set_rules('birthday','Birthday', 'required');
		$this->form_validation->set_rules('contact_number', 'Contact number', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required');
	
		if($this->form_validation->run() == FALSE){
			echo "false";
		}else{
	
			$user_id = $this->session->userdata('id');
			$user_firstname = $this->input->post('firstname');
			$user_lastname= $this->input->post('lastname');
			$user_birthday = $this->input->post('birthday');
			$user_age= $this->input->post('age');
			$user_contact= $this->input->post('contact_number');
			$user_address = $this->input->post('address');
			$user_gender = $this->input->post('gender');
	
			$data = array(
					'user_id' => $user_id,
					'firstname' => $user_firstname,
					'lastname' => $user_lastname,
					'birthday' => $user_birthday,
					'age' => $user_age,
					'contact_number' => $user_contact,
					'address' => $user_address,
					'gender' => $user_gender
			);
			if($this->profile_model->updateUserInfo($data) == true){
				echo "true";
			}else{
				echo "false";
			}
		}
	
	}
	
	
	
	public function check_user(){
		 $username = $this->input->post('name');
		 $username_sess = $this->session->userdata('name');
		 
		 if ($username == $username_sess){
		 	echo "true";
		 }else{
			 if($this->aauth->user_exist_by_name($username)){
		  		echo "false";
			 }else{
			  echo "true";
			 }
		 }
	}
	
	public function password_check_length($input, $max){
		$length = strlen($input);
		if($length >= $max){
			return true;
		}else{
			return false;
		}
	}
	
	public function check_pass(){
		$password = $this->input->post('password');
		$max = 6;
		
		if($this->password_check_length($password, $max)){
			echo "true";
		}else{
			echo  "false";
		}
		
	}
	
	public function check_email(){
 		$email = $this->input->post('email');
 		$origemail = $this->session->userdata('email');
	
		if ($origemail == $email){
			echo "true";
		}else{
			if ($this->aauth->user_exist_by_email($email)){
				echo "false";
			}else{
				echo "true";
			}
		}
		
	}
	
	public function view_profile($id){
		$data['user_profile'] = $this->profile_model->view_profile($id);
		$data['upload_files'] = $this->profile_model->get_upload($id);
		$data['body'] = 'profile/profile_view'; // call your content
		$this->load->view('template/template', $data);
	}	

	public function user_info(){
		$user_id = $this->input->post('user_id');

		$data['information']= $this->profile_model->user_info_model($user_id);
		echo $this->load->view('profile/user_infos', $data, true);
		
	}
}
	

