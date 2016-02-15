<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workers extends CI_Controller {

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
		if (!empty($this->mem_id) && false !== $this->input->post('ins_edu') && $this->input->post('mayor') !== '-9999' && $this->input->post('univ') !== '-9999') {
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
			redirect('Members/edit_w/PP/'.$this->username,'refresh');
		} else {
			$this->session->set_flashdata(
					'msg', 
					'Silahkan isi form <b>riwayat pendidikan</b> dengan benar. Pastikan semua terisi.'
					);
			redirect('Members/edit_w/PP/'.$this->username,'refresh');
		}
	}

	function updating_exp() {
		if (!empty($this->mem_id) && 
			false !== $this->input->post('ins_exp') && 
			$this->input->post('company') !== '' && 
			$this->input->post('position') !== '' && 
			$this->input->post('year_in') !== '' && 
			$this->input->post('year_out') !== '') {
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
			redirect('Members/edit_w/PP/'.$this->username,'refresh');
		} else {
			$this->session->set_flashdata(
					'msg', 
					'Silahkan isi form <b>riwayat pekerjaan</b> dengan benar. Pastikan semua terisi.'
					);
			redirect('Members/edit_w/PP/'.$this->username,'refresh');
		}
	}

	function updating_train() {
		if (!empty($this->mem_id) && 
			false !== $this->input->post('ins_train') && 
			$this->input->post('course_name') !== '' && 
			$this->input->post('institution') !== '' &&
			$this->input->post('year') !== '' ) {
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
			redirect('Members/edit_w/PP/'.$this->username,'refresh');
		} else {
			$this->session->set_flashdata(
					'msg', 
					'Silahkan isi form <b>riwayat pelatihan</b> dengan benar. Pastikan semua terisi.'
					);
			redirect('Members/edit_w/PP/'.$this->username,'refresh');
		}
	}

	function updating_ach() {
		if (!empty($this->mem_id) && 
			false !== $this->input->post('ins_ach') && 
			$this->input->post('achievement') !== '' && 
			$this->input->post('institution') !== '' && 
			$this->input->post('year') !== '') {
			$ach_data = array(
				'id_worker' => $this->mem_id,
				'ach_name' => $this->input->post('achievement'),
				'institution' => $this->input->post('institution'),
				'year' => $this->input->post('year')
				 );
			$ins_ach = $this->Worker->insert_ach($ach_data);
			$this->session->set_flashdata(
					'msg', 
					'Informasi <b>riwayat prestasi</b> berhasil diperbarui!'
					);
			redirect('Members/edit_w/PP/'.$this->username,'refresh');
		} else {
			$this->session->set_flashdata(
					'msg', 
					'Silahkan isi form <b>riwayat prestasi</b> dengan benar. Pastikan semua terisi.'
					);
			redirect('Members/edit_w/PP/'.$this->username,'refresh');
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

	function removing_ach($id_w_ach) {
		$remove_exp = $this->Worker->remove_ach($id_w_ach);
		$this->session->set_flashdata(
					'msg', 
					'<b>Riwayat prestasi</b> berhasil dihapus!'
					);
		redirect('Members/edit_w/PP/'.$this->username,'refresh');
	}	

	function removing_photo($file_name,$mem_id) {
		$data = array('avatar' => '');
		$remove = $this->Worker->update_identity($data,$mem_id);
		unlink("./images/profil_photo/".$file_name);
		$this->session->set_flashdata(
					'msg', 
					'<b>Foto profil</b> berhasil dihapus!'
					);
		redirect('Members/edit_w/I/'.$this->username,'refresh');
	}

	function applying($id_status,$id_job,$id_worker,$id_company) {
		$datestring = '%Y-%m-%d %h:%i:%s';
      	$now = mdate($datestring,now('Asia/Jakarta'));
      	$this->form_validation->set_rules('terms', 'Syarat dan Ketentuan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata(
					'msg', 
					'<b>Baca syarat dan ketentuan yang berlaku!</b>'
					);
			redirect($this->session->flashdata('redirect'),'refresh');		
		} else {
			$check = $this->Applier->check_worker($id_worker,$id_job);
			if ($check == true) {
				$this->session->set_flashdata(
						'msg', 
						'<b>Anda sudah mendaftar pekerjaan ini!</b> Silahkan mendaftar pekerjaan lainnya.'
						);
				redirect($this->session->flashdata('redirect'),'refresh');
			} else{
				$input = array(
				'id_company' => $id_company,
				'id_worker' => $id_worker,
				'id_status' => $id_status,
				'id_job' =>  $id_job,
				'hire_date' => $now
				);
				$ins = $this->Applier->apply($input);
				$this->session->set_flashdata(
						'msg', 
						'<b>Anda berhasil mendaftar pekerjaan!</b> Silahkan tunggu pemberitahuan lebih lanjut dari pihak perusahaan.'
						);
				redirect('Members/'.$this->username,'refresh');
			}
		} 
	}

	function unapplying($id_hired) {
		$remove = $this->Applier->unapply($id_hired);
		$this->session->set_flashdata(
					'msg', 
					'<b>Anda berhasil membatalkan lowongan pekerjaan!</b>'
					);
		redirect('Members/'.$this->username,'refresh');
	}

	function del_ac() {
		if ($this->Worker->log_in($this->input->post('username'), md5($this->input->post('password')))) {
			$this->Applier->delete_a($this->mem_id);
			$this->Worker->delete_edu($this->mem_id);
			$this->Worker->delete_exp($this->mem_id);
			$this->Worker->delete_ach($this->mem_id);
			$this->Worker->remove_lang($this->mem_id);
			$this->Worker->remove_skill($this->mem_id);
			$this->Worker->delete_train($this->mem_id);
			$this->Worker->delete_loker($this->mem_id);

			$this->Worker->delete_ident($this->mem_id);
			$this->Worker->delete($this->mem_id);		

			$this->session->set_flashdata(
								'msg', 
								'Akun berhasil dihapus. Feel free to join <b>SambilKerja</b> again!'
								);
			if ($this->input->cookie('ci_session')) {
				delete_cookie('ci_session');	
			}
			redirect('Main','refresh');	
		} else {
			$this->session->set_flashdata(
								'msg', 
								'Username, e-mail, atau password yang anda masukkan salah'
								);
			redirect('Members/edit_w/PA/'.$this->username,'refresh');	
		}
	}
}
