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
		$this->load->model('Location');
		$this->load->model('Skill');
		$this->load->model('Language');
		$this->load->model('School');
		$this->load->model('Mayor');

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

	public function index($username)
	{
		if ($this->username == $username) { //IF USERNAME = LOGGED IN USERNAME
			$prov_data = $this->Location->get_all_prov(); 

			if ($this->mem_type == 'W') { //IDENTIFY MEMBER (WORKER)
				//LOAD ALL MEMBER'S DATA
				$basic_data = $this->Worker->get('username',$this->username);
				$ident_data = $this->Worker->get_ident($this->mem_id);
				$lang_data = $this->Worker->get_lang($this->mem_id);
				$skill_data = $this->Worker->get_skill($this->mem_id);
				$edu_data = $this->Worker->get_edu($this->mem_id);
				$exp_data = $this->Worker->get_exp($this->mem_id);
				$train_data = $this->Worker->get_train($this->mem_id);

				foreach ($basic_data as $key) { //GET FULLNAME OF CURRENT USER
					$this->fullname = $key->fullname;
				}

				$data = array( //INSERTING DATA FOR VIEW
					'title' => $this->fullname." | SambilKerja.com",
					'username' => $username,
					'fullname' => $this->fullname,
					'basic_data' => $basic_data,
					'ident_data' => $ident_data,
					'lang_data' => $lang_data,
					'skill_data' => $skill_data,
					'edu_data' => $edu_data,
					'exp_data' => $exp_data,
					'train_data' => $train_data,
					'prov_data' => $prov_data
					);

				//LOADING VIEWS FOR WORKER PROFIL
				$this->load->view('html_head', $data);
				$this->load->view('header', $data);
				$this->load->view('content/profil-detail', $data);
				$this->load->view('footer', $data);	
			}
			elseif ($this->mem_type == 'C') { //IDENTIFY MEMBER (COMPANY)
				//LOAD ALL MEMBER'S DATA
				$basic_data = $this->Company->get('username',$this->username);
				$ident_data = $this->Company->get_ident($this->mem_id);

				foreach ($basic_data as $key) { //GET FULLNAME OF CURRENT USER
					$this->fullname = $key->fullname;
				}

				$data = array( //INSERTING DATA FOR VIEW
					'title' => $this->fullname." | SambilKerja.com",
					'basic_data' => $basic_data,
					'ident_data' => $ident_data,
					'prov_data' => $prov_data 
					);

				//LOADING VIEWS FOR COMPANY PROFIL
				$this->load->view('html_head', $data);
				$this->load->view('header', $data);
				$this->load->view('content/profil-detail', $data);
				$this->load->view('footer', $data);		
			}
		}  	
	}

	public function edit_w($param) 
	{
		if ($this->session->userdata('logged') != false) {
			$tab_param = $param[0];
			$this->username = $param[1];

			$prov_data = $this->Location->get_all_prov(); 
			$lang_sets = $this->Language->get_all();
			$skill_sets = $this->Skill->get_all();
			$sch_sets = $this->School->get_all();
			$may_sets = $this->Mayor->get_all();

			$basic_data = $this->Worker->get('username',$this->username);
			$ident_data = $this->Worker->get_ident($this->mem_id);
			$lang_data = $this->Worker->get_lang($this->mem_id);
			$skill_data = $this->Worker->get_skill($this->mem_id);
			$edu_data = $this->Worker->get_edu($this->mem_id);
			$exp_data = $this->Worker->get_exp($this->mem_id);
			$train_data = $this->Worker->get_train($this->mem_id);

			foreach ($basic_data as $key) { //GET FULLNAME OF CURRENT USER
				$this->fullname = $key->fullname;
			}

			if ($ident_data == false) {
				$input = array('id_worker' => $this->mem_id);
				$add_ident = $this->Worker->insert_identity($input);
			}

			$data = array( //INSERTING DATA FOR VIEW
				'tab_param' => $tab_param,
				'title' => $this->fullname." | SambilKerja.com",
				'username' => $this->username,
				'basic_data' => $basic_data,
				'ident_data' => $ident_data,
				'lang_data' => $lang_data,
				'skill_data' => $skill_data,
				'edu_data' => $edu_data,
				'exp_data' => $exp_data,
				'train_data' => $train_data,
				'prov_data' => $prov_data,
				'lang_sets' => $lang_sets,
				'skill_sets' => $skill_sets,
				'sch_sets' => $sch_sets,
				'may_sets' => $may_sets
				);

			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/profil-edit-tabs', $data);
			$this->load->view('content/profil-edit-1', $data);
			$this->load->view('content/profil-edit-2', $data);
			$this->load->view('content/profil-edit-3', $data);
			$this->load->view('content/profil-edit-4', $data);
			$this->load->view('footer', $data);	
		} else {
			redirect('Main','refresh');
		}
		
	}

	// public function edit_ident($username)
	// {
	// 		$this->load->view('html_head', $data);
	// 	$this->load->view('header', $data);
	// 	$this->load->view('content/profil-edit-tabs', $data);
	// 	$this->load->view('content/profil-edit-1', $data);
	// 	$this->load->view('content/profil-edit-2', $data);
	// 	$this->load->view('content/profil-edit-3', $data);
	// 	$this->load->view('footer', $data);		
	// }

}
