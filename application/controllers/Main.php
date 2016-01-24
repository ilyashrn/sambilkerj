<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data = array('title' => "SambilKerja.com");
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
		$data = array( //DATA FOR VIEWS
			'title' => "Regristration sucessfull! | SambilKerja.com",
			'fullname' => $this->session->userdata('fullname')
			);

		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/regristration-success', $data);
		$this->load->view('footer', $data);
	}

}
