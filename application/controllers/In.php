<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In extends CI_Controller { //LOGIN CONTROLLER

	public function __construct() {
		parent::__construct();
		$this->load->model('Worker'); //LOAD MODELS FOR CHECKING DB
		$this->load->model('Company');
	}

	public function index()
	{
		
	}

	public function process() //PROCESSING LOGIN
	{
		$prev_page = $this->session->userdata('last_page'); // RETRIEVING LAST PAGE WHERE LOGIN PANEL WAS ACCESSED

		if (null !== $this->input->post('in')) {
			$login_id = $this->input->post('name_email');
			$pass = md5($this->input->post('password'));

			$check1 = $this->Worker->log_in($login_id,$pass);

			if ($check1 == false) { //USERNAME/EMAIL ISN'T IN WORKER
				$check2 = $this->Company->log_in($login_id,$pass);
				
				if ($check2 == false) { // USERNAME/EMAIL ISN'T IN ANY TABLES
					redirect($prev_page);
				}
				else { //USERNAME/EMAIL IS IN COMPANY
					foreach ($check2 as $row) { //LOOPING FOR A COMPANY USERNAME
					}
					$sess_array = array(
						'logged' => $row->username,
						'mem_id' => $row->id_company,
						'mem_type' => 'C' );

					$this->session->set_userdata($sess_array); //SET USERDATA WITH LOGGED IN USER
					$update_login = $this->Company->update_login($row->id_company);
					$this->session->set_flashdata(
						'msg', 
						'Login berhasil. Selamat datang kembali!'
						);
					redirect($prev_page);
				}
			}
			else { //USERNAME/EMAIL IS IN WORKER
				foreach ($check1 as $row) { //LOOPING FOR A WORKER USERNAME
				}	
				$sess_array = array(
					'logged' => $row->username,
					'mem_id' => $row->id_worker,
					'mem_type' => 'W' 
					);
				$this->session->set_userdata($sess_array); //SET USERDATA WITH LOGGED IN USER
				$update_login = $this->Worker->update_login($row->id_worker);
				$this->session->set_flashdata(
					'msg', 
					'Login berhasil. Selamat datang kembali!'
					);
				redirect($prev_page);
			}	
		}
		else { // SUBMIT BUTTON WASN'T PRESSED
			redirect($prev_page);
		}
		
	}

	public function out() //LOGOUT 
	{
		// $prev_page = $this->session->userdata('last_page');
		$this->session->unset_userdata('logged');
		$this->session->set_flashdata(
					'msg', 
					'Anda sudah logout. Sampai bertemu kembali!'
					);
		redirect('Main','refresh');
	}

}
