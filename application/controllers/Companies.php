<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends CI_Controller {
	
	private $username = null; 
	private $mem_id = null;
	private $mem_type = null;
	private $fullname = null;
	private $last_page = null;

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if ($this->session->userdata('logged') != true) {
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
		} else {
			$this->username = $this->session->userdata('logged');
			$this->mem_id = $this->session->userdata('mem_id');
			$this->mem_type = $this->session->userdata('mem_type');

			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
			$this->last_page= $this->session->userdata('last_page');
		}
	}

	public function index()
	{
    	
	}
	
	public function is_username_exist($username) {
		if ($this->Company->check_username($username)) {
			$this->form_validation->set_message('is_username_exist','Username you inserted is already exist.');
			return false;
		} else {
			return true;
		}
	}

	public function is_telp_exist($telp) {
		if ($this->Company->check_telp($telp)) {
			$this->form_validation->set_message('is_telp_exist','Telphone number you inserted is already exist.');
			return false;
		} else {
			return true;
		}
	}

	public function is_email_exist($email) {
		if ($this->Company->check_email($email)) {
			$this->form_validation->set_message('is_email_exist','E-mail you inserted is already exist.');
			return false;
		} else {
			return true;
		}
	}

	function inserting() {
		
		$this->form_validation->set_rules('username', 'Username', 'required|callback_is_username_exist');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|callback_is_email_exist');
		$this->form_validation->set_rules('2nd_email', 'E-mail', 'required|valid_email|callback_is_email_exist');
		if ($this->input->post('email') == $this->input->post('2nd_email')) {
			$this->session->set_flashdata('warn', 'Email dan e-mail kedua tidak boleh sama.');
			$this->session->set_flashdata('company_name', $this->input->post('company_name'));
			$this->session->set_flashdata('username', $this->input->post('username'));
			$this->session->set_flashdata('email', $this->input->post('email'));
			$this->session->set_flashdata('2nd_email', $this->input->post('2nd_email'));
			$this->session->set_flashdata('tab', true);
			redirect('Main/new_user','refresh');
		}
		elseif ($this->form_validation->run()) {
			$data = array( //ARRAY FOR INPUTS FROM FORM
				'company_name' => $this->input->post('company_name'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'secondary_email' => $this->input->post('2nd_email'),
				'password' => md5($this->input->post('password')) //MD5 ENCRYPTED
			 	);	
			$insert = $this->Company->insert($data); // INSERTING INTO DATABASE

			$sess_array = array('company_name' => $this->input->post('company_name'));
			$this->session->set_userdata($sess_array); //SESSION-ING THE FULLNAME REGRISTRATOR
			redirect('Main/regristration_success');
		} else {
			$this->session->set_flashdata('company_name', $this->input->post('company_name'));
			$this->session->set_flashdata('username', $this->input->post('username'));
			$this->session->set_flashdata('email', $this->input->post('email'));
			$this->session->set_flashdata('2nd_email', $this->input->post('2nd_email'));
			$this->session->set_flashdata('tab', true);
			$this->session->set_flashdata('warn', validation_errors());
			redirect('Main/new_user','refresh');
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
			if ($this->input->post('origin_email') !== $this->input->post('email')) {
				$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|callback_is_email_exist');		
				if ($this->form_validation->run()) {
					$email = array('email' => $this->input->post('email'));
					$this->Company->update($email,$this->mem_id);	
				} else {
					$this->session->set_flashdata('warn', validation_errors());
					redirect('Members/edit_c/I/'.$this->username,'refresh');
				}
			}

			if ($this->input->post('origin_secondary_email') !== $this->input->post('secondary_email')) {
				$this->form_validation->set_rules('secondary_email', 'Secondary E-mail', 'required|valid_email|callback_is_email_exist');		
				if ($this->form_validation->run()) {
					$email = array('secondary_email' => $this->input->post('secondary_email'));
					$this->Company->update($email,$this->mem_id);	
				} else {
					$this->session->set_flashdata('warn', validation_errors());
					redirect('Members/edit_c/I/'.$this->username,'refresh');
				}	
			}

			if ($this->input->post('origin_telp_number') !== $this->input->post('telp_number')) {
				$this->form_validation->set_rules('telp_number', 'Telephone number', 'required|callback_is_telp_exist');		
				if ($this->form_validation->run()) {
					$telp = array('telp_number' => $this->input->post('telp_number'));
					$this->Company->update($telp,$this->mem_id);	
				} else {
					$this->session->set_flashdata('warn2', validation_errors());
					redirect('Members/edit_c/I/'.$this->username,'refresh');
				}	
			}
			$mem_data = array(
				'ownership' => $this->input->post('ownership'),
				'NPWP' => $this->input->post('npwp'),
				'about' => $this->input->post('about'),
				'domicile' => $this->input->post('domicile'),
				'bidang' => $this->input->post('bidang'),
				'business_form' => $this->input->post('business_form'),
				'address' => $this->input->post('address'),
				'avatar' => $file_name
				);
			$basic = array(
				'company_name' => $this->input->post('company_name'));
			$update = $this->Company->update($basic,$this->mem_id);
			$insert = $this->Company->update_identity($mem_data,$this->mem_id);
			$this->session->set_flashdata('msg', '<b>Identitas Perusahaan</b> berhasil diperbarui!');
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
				$this->session->set_flashdata('msg', '<b>Password lama</b> yang anda masukkan salah! Silahkan coba lagi.');
				redirect('Members/edit_c/PA/'.$this->username,'refresh');
			}
			else {
				$pass_data = array('password' => md5($this->input->post('new_pass')));
				$ins_edu = $this->Company->update($pass_data,$this->mem_id);
				$this->session->set_flashdata('msg', '<b>Password</b> berhasil diperbarui!');
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
					$this->session->set_flashdata('msg', '<b>Username</b> ini sudah dipakai. Silahkan pilih username lain.');
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

	function removing_photo($file_name,$id_company) {
		$data = array('avatar' => '');
		$remove = $this->Company->update_identity($data,$id_company);
		unlink("./images/profil_photo/".$file_name);
		$this->session->set_flashdata(
					'msg', 
					'<b>Foto profil</b> berhasil dihapus!'
					);
		redirect('Members/edit_c/I/'.$this->username,'refresh');
	}

	function change_stat($id_stat,$id_hire) {
		$data = array(
			'id_status' => $id_stat
			);
		$update = $this->Applier->update($data,$id_hire);
		$this->session->set_flashdata(
					'msg', 
					'<b>Status pelamar</b> berhasil diperbarui!'
					);
		redirect('Members/'.$this->username,'refresh');
	}

	function rate(){
		if (!empty($this->mem_id) && $this->input->post('ra') !== false) {
			$datestring = '%Y-%m-%d %h:%i:%s';
			$input = array(
				'stars' => $this->input->post('rating'),
				'review' => $this->input->post('review'),
				'review_date' => mdate($datestring,now())
				 );	
			$review = $this->Applier->update($input,$this->input->post('id'));
			$this->session->set_flashdata(
						'msg', 
						'<b>Review untuk '.$this->input->post('fullname').'</b> berhasil diberikan!'
						);
			redirect('Members/'.$this->username,'refresh');		
		}
	}
}
