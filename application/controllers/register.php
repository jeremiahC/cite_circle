<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->library("Aauth");
	}
	
	public function index(){
		if ( $this->aauth->is_loggedin() ){
			redirect('/');
		}else{
		$this->load->view('register_view');
	}
	}
	
	/**
	 * register function.
	 *
	 * @access public
	 * @return void
	 */
	public function register() {
		// set validation rules
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
	

		if ($this->form_validation->run() === false) {
			// validation not ok, send validation errors to the view
			// $this->load->view('register_view');
			echo json_encode(validation_errors());
			
		} else {
			// set variables from the form
			$name = $this->input->post('name');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			if ($this->aauth->create_user($email,$password,$name) == true) {
	
				// $data['body'] = 'pages/register_success'; // cal your content
				// $this->load->view('template/template', $data);
				echo json_encode(validation_errors());

			} else {
				// send error to the view
				$data['error'] = $this->aauth->print_errors();
				$this->load->view('register_view', $data);
			}
				
		}
	}
}