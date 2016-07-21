<?php

class Admin extends CI_Controller{

	private $sh_admin = 'school_admin';
	private $admin = 'admin';
	private $reg_user = 'reg_user';

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library("Aauth");
		$this->aauth->create_perm('school_admin');
		$this->aauth->create_perm('admin');
		$this->aauth->create_perm('reg_user');
	}

	public function index(){
		$data['query'] = $this->admin_model->show_all_users();
		$data['perm'] = 
		$this->load->view('template/header');
		$this->load->view('admin/index',$data);
	}

	public function show($id){
		$data['query'] = $this->admin_model->show_user($id);
		$this->load->view('template/header');
		$this->load->view('admin/show',$data);
	}

	public function allow_role(){
		$userid = $this->input->post('user_id');
		$role = $this->input->post('role');
		if($role === 'school_admin'){
				$this->aauth->allow_user($userid, $role);
		}else{
			echo 'no success';
		}
	}

	public function delete_role(){
		$userid = $this->input->post('user_id');
		$role = $this->input->post('role');
		$this->aauth->deny_user($userid, $role);
	}
}
?>