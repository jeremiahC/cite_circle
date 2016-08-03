<?php

class Admin extends CI_Controller{

	private $sh_admin = 'school_admin';
	private $admin = 'admin';
	private $reg_user = 'reg_user';

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library("Aauth");
		$this->load->library("parser");
		$this->aauth->create_perm('school_admin');
		$this->aauth->create_perm('admin');
		$this->aauth->create_perm('reg_user');
	}

	public function index(){
		
		$data['body']= 'admin/dashboard'; 
        $this->parser->parse('template/admin_template',$data);
	}

	public function userlist(){
		$temp = '';
		$base_url = base_url();
		$template ='<tr>
					<td>
					<div class="cell">
					    <a href="' . base_url(). 'user/{id}">{name}</a>
					</div>
					</td>
					<td>{email}</td>
					<td>Cell</td>
					</tr>';

		$query = $this->admin_model->show_all_users();

		foreach($query as $row){
			$temp .= $this->parser->parse_string($template,$row,TRUE);
		}

		$template = 'admin/userlist';

		$data['entries'] = $temp;

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->parser->parse($template,$data);
		$this->load->view('template/footer2');

	}
	
	public function show($id){
		$data['query'] = $this->admin_model->show_user($id);
		$data['body'] = 'admin/show';
		$this->load->view('template/admin_template',$data);
		// $this->load->view('admin/show',$data);
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

	public function import_csv(){
		$this->aauth->allow_user(2,'admin');
	}
}
?>