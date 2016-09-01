<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("Aauth");
	}
	//IF LOGGED IN, PROCEED TO HOMEPAGE ELSE REDIRECT TO LOGIN PAGE
	public function index(){
	 	if ( $this->aauth->is_loggedin() ){
            $data['body'] = 'home_view'; // call your content
            $user_id = $this->session->userdata('id');
                    $data['upload_files'] = $this->profile_model->get_upload($user_id);
			$this->load->view('template/template', $data);
		}else{
			$this->load->view('login_view');
        }
	}
	
}
?>