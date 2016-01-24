<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('logged') !== true) {
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
		}
	}

	public function index()
	{
		$data = array('title' => "SambilKerja.com");
		echo $this->session->userdata('logged');
		$this->load->view('html_head', $data);
	    $this->load->view('header', $data);
	    $this->load->view('content/home', $data);
	    $this->load->view('footer', $data);
	}

	public function new_user()
	{
		$data = array('title' => "Regristration page | SambilKerja.com");
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/regrister-login', $data);
		$this->load->view('footer', $data);
	}

	public function regristration_success()
	{
		if ($this->session->userdata('fullname') !== false) {
			$data = array( //DATA FOR VIEWS
				'title' => "Regristration sucessfull! | SambilKerja.com",
				'fullname' => $this->session->userdata('fullname')
				);

			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/regristration-success', $data);
			$this->load->view('footer', $data);

			$this->session->sess_destroy();
		}
		elseif ($this->session->userdata('company_name') !==  false) {
			$data = array( //DATA FOR VIEWS
				'title' => "Regristration sucessfull! | SambilKerja.com",
				'fullname' => $this->session->userdata('company_name')
				);

			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/regristration-success', $data);
			$this->load->view('footer', $data);

			$this->session->sess_destroy();
		}
		else {
			redirect('Main');
		}
	}

}
