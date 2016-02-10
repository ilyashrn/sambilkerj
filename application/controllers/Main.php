<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if ($this->session->userdata('logged') == false) {
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
		}
	}

	public function index() // MAIN PAGE
	{
		$data = array('title' => "SambilKerja.com");
		// echo $this->session->userdata('logged');

		$this->load->view('html_head', $data);
	    $this->load->view('header', $data);
	    $this->load->view('content/home', $data);
	    $this->load->view('footer', $data);
	}

	public function new_user() //REGRISTRATION PAGE
	{
		if ($this->session->userdata('logged') == false) {
			$data = array('title' => "Regristration page | SambilKerja.com");
			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/regrister-login', $data);
			$this->load->view('footer', $data);	
		}
		else {
			redirect('Main','refresh');
		}
		
	}

	public function regristration_success() //SUCCESS PASCA REGRISTRATION PAGE
	{
		if ($this->session->userdata('fullname') !== false) {
			$data = array( //DATA FOR VIEWS
				'title' => "Regristration sucessfull! | SambilKerja.com",
				'fullname' => $this->session->userdata('fullname')
				);

			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/regristration-success', $data);

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

			$this->session->sess_destroy();
		}
		else {
			redirect('Main');
		}
	}

}
