<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrators extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ($this->session->userdata('usrnm') == null) {
			redirect('adm/login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index() 
	{
		$users = $this->Administrator->get_all();

		$data = array(
			'title' => 'Administrator Management',
			'users_data' => $users
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/admins',$data);
		$this->load->view('admin/footer',$data);
	}

	public function inserting()
	{
		// if ($this->Administrator->check_username($this->input->post('username'))) {
		// 	$this->session->set_flashdata(
		// 					'warn', 
		// 					'Username you insert is existed, try a new one!'
		// 					);
		// 	redirect('adm/Administrators','refresh');	
		// }
		$input = array(
			'administrator_name' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')) //MD5 ENCRYPTED
			 );	
		$inserting = $this->Administrator->insert($input);
		$this->session->set_flashdata(
							'msg', 
							'Well done! New user is sucessfully inserted!'
							);
		redirect('adm/administrators','refresh');
	}

	public function edit($id_user,$username) 
	{

		$data = array(
			'title' => 'Edit user | FSMS',
			'basic_data' => $this->Administrator->get_user($id_user)
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/admin-edit',$data);
		$this->load->view('admin/footer',$data);
	}

	public function editing()
	{
		$id = $this->input->post('id');
		// if ($this->input->post('origin_username') !== $this->input->post('username')) {
		// 	if ($this->Company->check_username($this->input->post('username')) || $this->Worker->check_username($this->input->post('username')) ) {
		// 		$this->session->set_flashdata(
		// 					'msg', 
		// 					'Username you insert is existed, try a new one!'
		// 					);
		// 		redirect('adm/companies/editing/'.$id,'refresh');
		// 	}
		// }
		$basic = array(
			'username' => $this->input->post('username'),
			'administrator_name' => $this->input->post('administrator_name'),
			'email' => $this->input->post('email')
			);

		if ($this->input->post('password') !== '') {
			$pass = array('password' => md5($this->input->post('password')));
			$update = $this->Administrator->update($pass,$id);	
		}

		if ($this->input->post('avatar') !== '') {
			$config['upload_path'] = './images/profil_photo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('avatar');	
			$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
			$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME
			// echo $this->upload->display_errors();
			$avatar = array('avatar' => $file_name);
			$update = $this->Administrator->update($avatar,$id);	
		}
		
		$update = $this->Administrator->update($basic,$id);
		$this->session->set_flashdata(
							'msg', 
							'Well done! User data is sucessfully updated!'
							);
		redirect('adm/administrators','refresh');
	}

	public function deleting($id_user)
	{
		$this->Administrator->delete($id_user);		

		$this->session->set_flashdata(
							'msg', 
							'Well done! User data is sucessfully removed!'
							);
		redirect('adm/administrators','refresh');	
	}
}
?>