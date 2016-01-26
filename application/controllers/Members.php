<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	private $username = null; 

	function __construct() {
		parent::__construct();
		$this->load->model('Worker');
		$this->load->model('Company');

		$this->username = $this->session->userdata('logged');
	}

	public function index()
	{
		if ($this->session->userdata('mem_type') == 'W') { //IDENTIFY MEMBER (WORKER OR COMPANY)
			$mem_data = $this->Worker->get('username',$this->username);
			foreach ($mem_data as $key) {
				$fullname = $key->fullname;
			}

			$data = array(
				'title' => $fullname." | SambilKerja.com",
				'mem_data' => $mem_data
				);
			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/profil-detail', $data);
			$this->load->view('footer', $data);	
		}
		
	}


}
