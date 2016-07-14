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
		$this->load->view('template/header');
		$this->load->view('admin/index',$data);
	}

	public function show($id){
		$data['query'] = $this->admin_model->show_user($id);
		$this->load->view('template/header');
		$this->load->view('admin/show',$data);
	}

	public function role_access(){
		$userid = 4;
		$roles = array('admin', 'sh_admin','reg_user');
		if($bool === true){
			for($x=0;$x<=2;$x++){
				$this->aauth->allow_user($userid, $roles[$x]);
			}
		}else{
			echo 'no success';
		}
	}
}
?>