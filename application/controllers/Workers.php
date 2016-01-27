<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workers extends CI_Controller {

	private $username = null; 
	private $mem_id = null;
	private $mem_type = null;
	private $fullname = null;

	public function __construct() {
		parent::__construct();
		$this->load->model('Worker');

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

	function updating_ident() {
		$mem_id = $this->session->userdata('mem_id');

		if (false !== $this->input->post('ins_ident')) {
			$config['upload_path'] = './images/profil_photo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;
			// $config['max_size']	= '300';
			// $config['max_width']  = '1024';
			// $config['max_height']  = '1024';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('avatar');
			
			$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
			$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME

			$dob = implode("-", array_reverse(explode("/", $this->input->post('dob'))));	
			$mem_data = array(
				'dob' => $dob,
				'telp_number' => $this->input->post('telp_number'),
				'about' => $this->input->post('about'),
				'domicile' => $this->input->post('domicile'),
				'avatar' => $file_name
				);
			
			$insert = $this->Worker->update_identity($mem_data,$this->mem_id);
			redirect('Members/'.$this->username);
			
			// if ( ! $this->upload->do_upload('userfile'))
			// {
			// 	$error = array('error' => $this->upload->display_errors());

			// 	$this->load->view('upload_form', $error);
			// }
			// else
			// {
			// 	$upload_data = $this->upload->data();
			// 	$file_name = $upload_data['file_name'];
			// 	$data = array(
			// 		'upload_data' => $upload_data,
			// 		'file_name' => $file_name
			// 		);

			// 	$this->load->view('upload_success', $data);
			// }

			
		}
		else{
			redirect('errors/Page_not_found','refresh');
		}
	}

}
