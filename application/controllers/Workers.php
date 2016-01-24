<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Worker');

		// $this->load->model('Job');
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

	function test($fullname) {
		$sess_array = array('fullname' => $fullname);
		$this->session->set_userdata($sess_array);

		if ($this->session->userdata('fullname') !== false) {
			redirect('Main/regristration_success');
		}
	}

}
