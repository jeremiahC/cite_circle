<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("Aauth");
	}
	//LOGIN CHECKER
	public function index(){
		if ( $this->aauth->is_loggedin() ){
			redirect('/');
		}else{
			$this->load->view('login_view');
		}
	}
	//FUNCTION TO LOGIN WITH VALIDATION
	public function login() {
		// create the data object
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
		// validation not ok, send validation errors to the view
		$this->load->view('login_view');
		} else {
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if($username === "admin" && $password === "admin123"){
					$data['body'] = 'admin/dashboard'; // call your content
					$this->load->view('template/admin_template', $data);
			} elseif ($this->aauth->login($username, $password, true)) {
				// user login ok
				$data['body'] = 'home_view'; // call your content
				$user_id = $this->session->userdata('id');
                    $data['upload_files'] = $this->profile_model->get_upload($user_id);
				$this->load->view('template/template', $data);
			
			} else {
				// login failed
				$data['error'] = $this->aauth->print_errors();
				// send error to the view
				$this->load->view('login_view', $data);
			}
		}
	}
	
	//SESSION DESTROY/ LOGOUT
	public function logout() {
		if ($this->aauth->logout()) {
			$this->load->view('login_view');
		} else {
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
		}
	}
	
}
?>