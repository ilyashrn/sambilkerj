<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workers extends CI_Controller {

	private $username = null; 
	private $mem_id = null;
	private $mem_type = null;
	private $fullname = null;

	public function __construct() {
		parent::__construct();
		$this->load->model('Worker');

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
    	$data = array('title' => "Pekerja yang tersedia | SambilKerja.com");
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/worker-list', $data);
		$this->load->view('footer', $data);
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
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')) //MD5 ENCRYPTED
		 	);

		// echo $this->input->post('ins_worker');
		// $this->form_validation->set_rules('ins_worker', 'Button', 'required');
		if (null !== $this->input->post('ins_worker')) {
			$insert = $this->Worker->insert($data); // INSERTING INTO DATABASE

			$sess_array = array('fullname' => $this->input->post('fullname'));
			$this->session->set_userdata($sess_array); //SESSION-ING THE FULLNAME REGRISTRATOR
			if ($this->session->userdata('fullname') !== false) {
				redirect('Main/regristration_success');
			}
		}
	}

	function updating_ident() {
		$mem_id = $this->session->userdata('mem_id');

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
			
			$dob = implode("-", array_reverse(explode("/", $this->input->post('dob'))));	
			$mem_data = array(
				'nickname' => $this->input->post('nickname'),
				'pob' => $this->input->post('pob'),
				'dob' => $dob,
				'telp_number' => $this->input->post('telp_number'),
				'about' => $this->input->post('about'),
				'domicile' => $this->input->post('domicile'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'avatar' => $file_name
				);
			$basic = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email')
				);
			$update = $this->Worker->update($basic,$this->mem_id);
			$insert = $this->Worker->update_identity($mem_data,$this->mem_id);
			$this->session->set_flashdata(
					'msg', 
					'<b>Identitas dasar</b> berhasil diperbarui!'
					);
			redirect('Members/'.$this->username);
		}
		else{
			redirect('errors/Page_not_found','refresh');
		}
	}

	function updating_username() {
		if (!empty($this->mem_id) && false !== $this->input->post('upd_ue')) {
				$data = array('username' => $this->input->post('username'));
				$check = $this->Worker->get('username',$this->input->post('username'));
				if ($check !== false) {
					$this->session->set_flashdata(
						'msg', 
						'<b>Username</b> ini sudah dipakai. Silahkan pilih username lain.'
						);
					redirect('Members/edit_w/PA/'.$this->username,'refresh');	
				}
				else {
					$update = $this->Worker->update($data,$this->mem_id);
					
					$sess_array = array('logged' => $this->input->post('username'));
					$this->session->set_userdata($sess_array);
					$this->session->set_flashdata(
						'msg', 
						'<b>Username</b> berhasil diperbarui!'
						);
					redirect('Members/edit_w/PA/'.$this->session->userdata('logged'),'refresh');
				}
				
		}		
	}

	function updating_password() {
		if (!empty($this->mem_id) && false !== $this->input->post('upd_pass')) {
			$check = $this->Worker->log_in($this->username,md5($this->input->post('password')));
			if ($check == false) {
				$this->session->set_flashdata(
					'msg', 
					'<b>Password lama</b> yang anda masukkan salah!'
					);
				redirect('Members/edit_w/PA/'.$this->username,'refresh');
			}
			else {
				$pass_data = array(
						'password' => md5($this->input->post('new_pass'))
						);
				$ins_edu = $this->Worker->update($pass_data,$this->mem_id);
				$this->session->set_flashdata(
						'msg', 
						'<b>Password</b> berhasil diperbarui!'
						);
				redirect('Members/edit_w/PA/'.$this->username,'refresh');
			}
		}	
	}

	function updating_KB() {
		if (!empty($this->mem_id) && false !== $this->input->post('ins_KB')) {
			$cleaning = $this->Worker->remove_skill($this->mem_id);
			$cleaning2 = $this->Worker->remove_lang($this->mem_id);
			if (false !== $this->input->post('skills')) {
				foreach ($this->input->post('skills') as $row ) {
					$data = array(
						'id_worker' => $this->mem_id,
						'id_skill' => $row
						 );
					$ins_skill = $this->Worker->insert_skill($data); 
				}	
			}
			
			if (false !== $this->input->post('languages')) {
				foreach ($this->input->post('languages') as $rows) {
					$data = array(
						'id_worker' => $this->mem_id,
						'id_language' => $rows 
						);
					$ins_lang = $this->Worker->insert_lang($data);
				}
			}
			$this->session->set_flashdata(
					'msg', 
					'Informasi <b>Keahlian dan Bahasa</b> berhasil diperbarui!'
					);
			redirect('Members/'.$this->username,'refresh');
		}
	}

	function updating_edu() {
		if (!empty($this->mem_id) && false !== $this->input->post('ins_edu')) {
			$edu_data = array(
				'id_worker' => $this->mem_id,
				'id_school' => $this->input->post('univ'),
				'id_mayor' => $this->input->post('mayor'),
				'year_in' => $this->input->post('year_in'),
				'year_out' => $this->input->post('year_out')
				 );
			$ins_edu = $this->Worker->insert_edu($edu_data);
			$this->session->set_flashdata(
					'msg', 
					'Informasi <b>riwayat pendidikan</b> berhasil diperbarui!'
					);
			redirect('Members/'.$this->username,'refresh');
		}	
	}

	function updating_exp() {
		if (!empty($this->mem_id) && false !== $this->input->post('ins_exp')) {
			$exp_data = array(
				'id_worker' => $this->mem_id,
				'company' => $this->input->post('company'),
				'position' => $this->input->post('position'),
				'year_in' => $this->input->post('year_in'),
				'year_out' => $this->input->post('year_out')
				 );
			$ins_exp = $this->Worker->insert_exp($exp_data);
			$this->session->set_flashdata(
					'msg', 
					'Informasi <b>riwayat pekerjaan</b> berhasil diperbarui!'
					);
			redirect('Members/'.$this->username,'refresh');
		}
	}

	function updating_train() {
		if (!empty($this->mem_id) && false !== $this->input->post('ins_train')) {
			$train_data = array(
				'id_worker' => $this->mem_id,
				'course_name' => $this->input->post('course_name'),
				'institution' => $this->input->post('institution'),
				'year' => $this->input->post('year')
				 );
			$ins_exp = $this->Worker->insert_train($train_data);
			$this->session->set_flashdata(
					'msg', 
					'Informasi <b>riwayat pelatihan</b> berhasil diperbarui!'
					);
			redirect('Members/'.$this->username,'refresh');
		}
	}

	function updating_ach() {
		if (!empty($this->mem_id) && false !== $this->input->post('ins_ach')) {
			$ach_data = array(
				'id_worker' => $this->mem_id,
				'achievement' => $this->input->post('achievement'),
				'institution' => $this->input->post('institution'),
				'year' => $this->input->post('year')
				 );
			$ins_ach = $this->Worker->insert_ach($ach_data);
			$this->session->set_flashdata(
					'msg', 
					'Informasi <b>riwayat prestasi</b> berhasil diperbarui!'
					);
			redirect('Members/'.$this->username,'refresh');
		}
	}

	function removing_edu($id_w_education) {
		$remove_edu = $this->Worker->remove_edu($id_w_education);
		$this->session->set_flashdata(
					'msg', 
					'<b>Riwayat penddiikan</b> berhasil dihapus!'
					);
		redirect('Members/edit_w/PP/'.$this->username,'refresh');
	}

	function removing_exp($id_w_experience) {
		$remove_exp = $this->Worker->remove_exp($id_w_experience);
		$this->session->set_flashdata(
					'msg', 
					'<b>Riwayat pekerjaan</b> berhasil dihapus!'
					);
		redirect('Members/edit_w/PP/'.$this->username,'refresh');
	}

	function removing_train($id_w_training) {
		$remove_exp = $this->Worker->remove_train($id_w_training);
		$this->session->set_flashdata(
					'msg', 
					'<b>Riwayat pelatihan</b> berhasil dihapus!'
					);
		redirect('Members/edit_w/PP/'.$this->username,'refresh');
	}	

	function removing_photo($mem_id,$file_name) {
		$data = array('avatar' => '');
		$remove = $this->Worker->update_identity($data,$mem_id);
		unlink("./images/profil_photo/".$file_name);
		$this->session->set_flashdata(
					'msg', 
					'<b>Foto profil</b> berhasil dihapus!'
					);
		redirect('Members/edit_w/I/'.$this->username,'refresh');
	}

}
