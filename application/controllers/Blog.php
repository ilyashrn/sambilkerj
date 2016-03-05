<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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
		$data = array(
			'title' => 'Blog | SambiKerja.com',
			'contacts' => $this->Hcontent->get_all('contacts'),
		);
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/blog-list', $data);
		$this->load->view('footer', $data);		
	}
	
	public function detail()
	{
		$data = array(
			'title' => 'Blog | SambiKerja.com',
			'contacts' => $this->Hcontent->get_all('contacts'),
		);
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/blog-detail', $data);
		$this->load->view('footer', $data);
	}

}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */