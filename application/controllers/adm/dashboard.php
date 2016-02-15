<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ($this->session->userdata('usrnm') == null) {
			redirect('adm/login','refresh');
		}
	}

	public function index() //PROCESSING LOGIN
	{
		$data = array(
			'title' => 'SambilKerja Dashboard',
			'job_count' => $this->Job->record_count(),
			'worker_count' => $this->Worker->record_count(),
			'comp_count' => $this->Company->record_count(),
			'adm_count' => $this->Administrator->record_count()
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/dashboard',$data);
		$this->load->view('admin/footer',$data);
	}
}