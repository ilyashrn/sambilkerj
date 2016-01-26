<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	private $username = null; 
	private $mem_id = null;
	private $mem_type = null;
	private $fullname = null;

	function __construct() 
	{
		parent::__construct();
		$this->load->model('Worker');
		$this->load->model('Company');

		$this->username = $this->session->userdata('logged');
		$this->mem_id = $this->session->userdata('mem_id');
		$this->mem_type = $this->session->userdata('mem_type');
	}

	public function _remap($method,$args)
	{
		if (method_exists($this, $method)) {
			$this->$method($args);
		}
		else {
			$this->index($method,$args);
		}
	}

	public function index()
	{
		if ($this->mem_type == 'W') { //IDENTIFY MEMBER (WORKER OR COMPANY)
			//LOAD ALL MEMBER'S DATA
			$basic_data = $this->Worker->get('username',$this->username);
			$ident_data = $this->Worker->get_ident($this->mem_id);
			$lang_data = $this->Worker->get_lang($this->mem_id);
			$skill_data = $this->Worker->get_skill($this->mem_id);

			foreach ($basic_data as $key) { //GET FULLNAME OF CURRENT USER
				$this->fullname = $key->fullname;
			}

			$data = array( //INSERTING DATA FOR VIEW
				'title' => $this->fullname." | SambilKerja.com",
				'basic_data' => $basic_data,
				'ident_data' => $ident_data,
				'lang_data' => $lang_data,
				'skill_data' => $skill_data
				);

			//LOADING VIEWS
			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/profil-detail', $data);
			$this->load->view('footer', $data);	
		}
	}

	public function edit($username) 
	{
		$data = array(
			'title' => $this->fullname." | SambilKerja.com", 
			);
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/profil-edit', $data);
		$this->load->view('footer', $data);
	}

}
