<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Companies extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Company');

		if ($this->session->userdata('logged') != true) {
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
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

	function test($fullname) {
		$sess_array = array('fullname' => $fullname);
		$this->session->set_userdata($sess_array);

		if ($this->session->userdata('fullname') !== false) {
			redirect('Main/regristration_success');
		}
	}

}
