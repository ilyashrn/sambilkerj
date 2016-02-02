<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends CI_Controller {
	
	private $username = null; 
	private $mem_id = null;
	private $mem_type = null;
	private $fullname = null;

	public function __construct() {
		parent::__construct();
		$this->load->model('Company');

		if ($this->session->userdata('logged') != true) {
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
		} else {
			$this->username = $this->session->userdata('logged');
			$this->mem_id = $this->session->userdata('mem_id');
			$this->mem_type = $this->session->userdata('mem_type');
		}
	}

	public function index()
	{
    	
	}

	public function profil()
	{
		$data = array('title' => "Ilyas Habiburrahman | SambilKerja.com");
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/profil-detail', $data);
		$this->load->view('footer', $data);
	}

	function inserting() {

		$data = array( //ARRAY FOR INPUTS FROM FORM
			'company_name' => $this->input->post('company_name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'secondary_email' => $this->input->post('2nd_email'),
			'password' => md5($this->input->post('password')) //MD5 ENCRYPTED
		 	);

		if (null !== $this->input->post('ins_comp')) {
			$insert = $this->Company->insert($data); // INSERTING INTO DATABASE

			$sess_array = array('company_name' => $this->input->post('company_name'));
			$this->session->set_userdata($sess_array); //SESSION-ING THE FULLNAME REGRISTRATOR
			if ($this->session->userdata('company_name') !== false) {
				redirect('Main/regristration_success');
			}
		}
	}

	function updating_ident() {
		if (!empty($this->mem_id) && false !== $this->input->post('ins_ident')) {
			if ($_FILES['avatar']['size'] == 0) {
				$file_name = $this->input->post('cur_avatar');	
			} 
			else {
				$config['upload_path'] = './images/profil_photo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['encrypt_name'] = TRUE;
				$config['overwrite'] = FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$upload = $this->upload->do_upload('avatar');	
				$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
				$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME
			}
			
			$mem_data = array(
				'NPWP' => $this->input->post('npwp'),
				'telp_number' => $this->input->post('telp_number'),
				'ownership' => $this->input->post('ownership'),
				'about' => $this->input->post('about'),
				'domicile' => $this->input->post('domicile'),
				'bidang' => $this->input->post('bidang'),
				'business_form' => $this->input->post('business_form'),
				'address' => $this->input->post('address'),
				'avatar' => $file_name
				);
			$basic = array(
				'company_name' => $this->input->post('company_name'),
				'email' => $this->input->post('email'),
				'secondary_email' => $this->input->post('secondary_email')
				);
			$update = $this->Company->update($basic,$this->mem_id);
			$insert = $this->Company->update_identity($mem_data,$this->mem_id);
			$this->session->set_flashdata(
					'msg', 
					'<b>Identitas Perusahaan</b> berhasil diperbarui!'
					);
			redirect('Members/'.$this->username);
		}
		else {
			redirect('errors/Page_not_found','refresh');
		}
	}

	function updating_password() {
		if (!empty($this->mem_id) && false !== $this->input->post('upd_pass')) {
			$check = $this->Company->log_in($this->username,md5($this->input->post('password')));
			if ($check == false) {
				$this->session->set_flashdata(
					'msg', 
					'<b>Password lama</b> yang anda masukkan salah! Silahkan coba lagi.'
					);
				redirect('Members/edit_c/PA/'.$this->username,'refresh');
			}
			else {
				$pass_data = array(
						'password' => md5($this->input->post('new_pass'))
						);
				$ins_edu = $this->Company->update($pass_data,$this->mem_id);
				$this->session->set_flashdata(
						'msg', 
						'<b>Password</b> berhasil diperbarui!'
						);
				redirect('Members/edit_c/PA/'.$this->username,'refresh');
			}
		}
		else {
			redirect('errors/Page_not_found','refresh');
		}	
	}

	function updating_username() {
		if (!empty($this->mem_id) && false !== $this->input->post('upd_ue')) {
				$data = array('username' => $this->input->post('username'));
				$check = $this->Company->get('username',$this->input->post('username'));
				if ($check !== false) {
					$this->session->set_flashdata(
						'msg', 
						'<b>Username</b> ini sudah dipakai. Silahkan pilih username lain.'
						);
					redirect('Members/edit_c/PA/'.$this->username,'refresh');	
				}
				else {
					$update = $this->Company->update($data,$this->mem_id);
					
					$sess_array = array('logged' => $this->input->post('username'));
					$this->session->set_userdata($sess_array);
					$this->session->set_flashdata(
						'msg', 
						'<b>Username</b> berhasil diperbarui!'
						);
					redirect('Members/edit_c/PA/'.$this->session->userdata('logged'),'refresh');
				}			
		} else {
			redirect('errors/Page_not_found','refresh');
		}		
	}

	function removing_photo($id_company) {
		$data = array('avatar' => '');
		$remove = $this->Company->update_identity($data,$id_company);
		unlink("./images/profil_photo/".$file_name);
		$this->session->set_flashdata(
					'msg', 
					'<b>Foto profil</b> berhasil dihapus!'
					);
		redirect('Members/edit_c/I/'.$this->username,'refresh');
	}
}
