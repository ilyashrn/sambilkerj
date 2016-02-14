<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administrator');
	}

	public function index() //PROCESSING LOGIN
	{
		if ($this->session->userdata('usrnm') == null ) {
			$data = array(
				'title' => 'Login page | SambilKerja Admin Panel');

			$this->load->view('admin/html_head',$data);
			$this->load->view('admin/content/login',$data);
		} else {
			redirect('adm/dashboard','refresh');
		}
		
	}

	public function processing() 
	{
		if ($this->session->userdata('usrnm') == null) {
			$login_id = $this->input->post('username');
			$pass = md5($this->input->post('password'));

			$check = $this->administrator->log_in($login_id,$pass);

			if ($check == false) { //USERNAME ISN'T IN DATABASE
				$this->session->set_flashdata(
					'msg', 
					'Username atau password salah, silahkan ulangi!'
					);
				redirect('adm/Login','refresh');
			}
			else { //USERNAME IS IN DATABASE
				foreach ($check as $row) {} //LOOPING FOR A WORKER USERNAME	
				$sess_array = array(
					'usrnm' => $row->username,
					'administrator_name' => $row->administrator_name,
					'memid' => $row->id_admin
					);

				$this->session->set_userdata($sess_array); //SET USERDATA WITH LOGGED IN USER
				$update_login = $this->administrator->update_login($row->id_admin);
				$this->session->set_flashdata(
					'msg', 
					'Login berhasil. Selamat datang kembali!'
					);
				redirect('adm/dashboard','refresh');
			}	
		} else {
			redirect('adm/dashboard','refresh');
			// echo "kesini";
		}
	}
}