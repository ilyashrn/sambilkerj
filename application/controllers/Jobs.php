<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function index()
	{
    $data = array('title' => "Lowongan kerja yang tersedia | SambilKerja.com");
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/job-list', $data);
		$this->load->view('footer', $data);
	}

	public function new_job()
	{
		$data = array('title' => "Regristration page | SambilKerja.com");
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/new-job', $data);
		$this->load->view('footer', $data);
	}

}
