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
		$this->form_validation->set_rules('username', 'Username', 'required|callback_is_username_exist');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|callback_is_email_exist');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[confirm_password]');

		if ($this->form_validation->run()) {
			$input = array(
				'administrator_name' => $this->input->post('fullname'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')) //MD5 ENCRYPTED
				 );	
			$inserting = $this->Administrator->insert($input);
			$this->session->set_flashdata('msg', 'Well done! New user is sucessfully inserted!');
		} else {
			$this->session->set_flashdata('warn', validation_errors());
		}
		redirect('adm/administrators','refresh');	
	}

	public function is_username_exist($username) {
		if ($this->Administrator->check_username($username)) {
			$this->form_validation->set_message('is_username_exist','Username you inserted is already exist.');
			return false;
		} else {
			return true;
		}
	}

	public function is_email_exist($email) {
		if ($this->Administrator->check_email($email)) {
			$this->form_validation->set_message('is_email_exist','E-mail you inserted is already exist.');
			return false;
		} else {
			return true;
		}
	}

	public function edit($id_user,$username) 
	{
		$data = array(
			'title' => 'Edit user | SambilKerja Admin Panel',
			'basic_data' => $this->Administrator->get_user($id_user)
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/admin-edit',$data);
		$this->load->view('admin/footer',$data);
	}

	public function editing()
	{	
		if ($this->input->post('origin_username') !== $this->input->post('username')) {
			$this->form_validation->set_rules('username', 'Username', 'required|callback_is_username_exist');
			$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|callback_is_email_exist');
			if ($this->form_validation->run()) {
				$basic = array(
					'username' => $this->input->post('username'),
					'administrator_name' => $this->input->post('administrator_name'),
					'email' => $this->input->post('email')
					);

				if ($this->input->post('password') !== '') {
					$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[confirm_password]');
					if ($this->form_validation->run()) {
						$pass = array('password' => md5($this->input->post('password')));
						$update = $this->Administrator->update($pass,$this->input->post('id'));		
					} else {
						$this->session->set_flashdata('warn',validation_errors());
					}
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
					$update = $this->Administrator->update($avatar,$this->input->post('id'));	
				}
				
				$update = $this->Administrator->update($basic,$this->input->post('id'));
				$this->session->set_flashdata(
									'msg', 
									'Well done! User data is sucessfully updated!'
									);	
			} else {
				$this->session->set_flashdata('warn',validation_errors());
			}
		}
		redirect('adm/administrators/','refresh');
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