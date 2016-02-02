<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	private $username = null; 
	private $mem_id = null;
	private $mem_type = null;
	private $fullname = null;

	public function __construct() {
		parent::__construct();
		$this->load->model('Company');
		$this->load->model('Job');

		if ($this->session->userdata('logged') != true) {
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
		} else {
			$this->username = $this->session->userdata('logged');
			$this->mem_id = $this->session->userdata('mem_id');
			$this->mem_type = $this->session->userdata('mem_type');
		}
	}

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
		if ($this->session->userdata('logged') != false && $this->mem_type == 'C') { //IF USER COMPANY LOGIN
			$cat_data = $this->Job->get_all_cats();

			$data = array(
				'title' => "Buka Lowongan baru | SambilKerja.com",
				'cat_data' => $cat_data
				);
			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/new-job', $data);
			$this->load->view('footer', $data);	
		}
		else {
			redirect('errors/Page_not_found','refresh');
		}
		
	}

	function inserting() {
		if (!empty($this->mem_id) && $this->mem_type == 'C' && $this->input->post('ins_job') !== false) {
			$config['upload_path'] = './files/loker/';
			$new_name = $this->username.' - '.$this->input->post('post_title');
			$config['file_name'] = $new_name;
			$config['overwrite'] = FALSE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('file');	
			$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
			$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME

			$data = array( //ARRAY FOR INPUTS FROM FORM
				'id_company' => $this->mem_id,
				'post_title' => $this->input->post('post_title'),
				'id_job_category' => $this->input->post('category'),
				'description' => $this->input->post('jobdesc'),
				'file' => $file_name,
				'file_desc' => $this->input->post('file_desc'),
				'deadline' => $this->input->post('deadline'),
				'salary' => $this->input->post('salary'),
			 	);
			
			$insert = $this->Job->insert($data); // INSERTING INTO DATABASE
			$this->session->set_flashdata(
					'msg', 
					'<b>Lowongan</b> berhasil dibuat!'
					);
			redirect('Members/'.$this->username);
		}
	}

}
