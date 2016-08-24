<?php



class Admin extends CI_Controller{

	private $sh_admin = 'school_admin';
	private $admin = 'admin';
	private $reg_user = 'reg_user';


	public function __construct(){
		parent::__construct();
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
					    <a href="' . $base_url. 'user/{id}">{name}</a>
					</div>
					</td>
					<td>{email}</td>
					<td>Cell</td>
					</tr>';

		$query = $this->profile_model->getAllUsersInfo();

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

		$user_field = '<input type="text" hidden="hidden" value="{id}" id="user_id">';
		$field_true = '<input type="checkbox" value="school_admin" name="check"  class="hidden role" checked="checked">';
		$field_false = '<input type="checkbox" value="school_admin" name="check"  class="hidden role" >';

		$user['id']=$id;

		$temp = $this->parser->parse_string($user_field,$user,TRUE);

		$data['user_field'] =$temp;

		if($this->aauth->is_allowed('school_admin', $id)){
			$data['checkbox_field'] = $field_true;
		}else{
			$data['checkbox_field'] = $field_false;
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->parser->parse('admin/show',$data);
		$this->load->view('template/footer2');

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