<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {

	private $username = null; 
	private $mem_id = null;
	private $mem_type = null;
	private $fullname = null;
	private $last_page = null;

	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if ($this->session->userdata('logged') !== false) {
			$this->username = $this->session->userdata('logged');
			$this->mem_id = $this->session->userdata('mem_id');
			$this->mem_type = $this->session->userdata('mem_type');

			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
			$this->last_page = $this->session->userdata('last_page');
		} else {
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
		}
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
		$check1 = $this->Worker->get('username',$username); //CHECK WETHER USER IS WORKER OR NOT
		$check2 = $this->Company->get('username',$username); //CHECK WETHER USER IS COMPANY OR NOT
		$not_logged = false;

		if ($check1 !== false || $check2 !== false) { //CHECK IF USERNAME EXIST
			$prov_data = $this->Location->get_all_prov(); 

			if ($check1 !== false) { //IDENTIFY MEMBER (WORKER)
				if ($username !== $this->username) { //MEANS THE NOT-LOGGEDIN USER SEES THEIR OWN/OTHERS PROFULE
					foreach ($check1 as $key) {
						$this->mem_id = $key->id_worker;	
					}
					$not_logged = true;
				}

				//LOAD ALL MEMBER'S DATA
				$basic_data = $this->Worker->get('username',$username);
				$ident_data = $this->Worker->get_ident($this->mem_id);
				$lang_data = $this->Worker->get_lang($this->mem_id);
				$skill_data = $this->Worker->get_skill($this->mem_id);
				$edu_data = $this->Worker->get_edu($this->mem_id);
				$exp_data = $this->Worker->get_exp($this->mem_id);
				$train_data = $this->Worker->get_train($this->mem_id);
				$ach_data = $this->Worker->get_ach($this->mem_id);
				$loc_data = $this->Worker->get_loc($this->mem_id);
				$pob_data = $this->Worker->get_pob($this->mem_id);
				$job_data = $this->Applier->get_per_id('h.id_worker',$this->mem_id);
				$job_count = $this->Applier->count_rows('id_worker',$this->mem_id);
				$review_data = $this->Applier->get_review('h.id_worker',$this->mem_id);
				$review_count = $this->Applier->count_rev('id_worker',$this->mem_id);

				foreach ($basic_data as $key) { //GET FULLNAME OF CURRENT USER
					$this->fullname = $key->fullname;
				}

				$data = array( //INSERTING DATA FOR VIEW
					'title' => $this->fullname." | SambilKerja.com",
					'username' => $username,
					'fullname' => $this->fullname,
					'not_logged' => $not_logged,
					'basic_data' => $basic_data,
					'ident_data' => $ident_data,
					'lang_data' => $lang_data,
					'skill_data' => $skill_data,
					'edu_data' => $edu_data,
					'exp_data' => $exp_data,
					'train_data' => $train_data,
					'job_data' => $job_data,
					'job_count' => $job_count,
					'review_data' => $review_data,
					'review_count' => $review_count,
					'loc_data' => $loc_data,
					'pob_data' => $pob_data,
					'ach_data' => $ach_data
					);

				//LOADING VIEWS FOR WORKER PROFIL
				$this->load->view('html_head', $data);
				$this->load->view('header', $data);
				$this->load->view('content/profil-detail', $data);
				$this->load->view('footer', $data);	
			}
			elseif ($check2 !== false) { //IDENTIFY MEMBER (COMPANY)
				if ($username !== $this->username) { //MEANS THE NOT-LOGGEDIN USER SEES THEIR OWN/OTHERS PROFULE
					foreach ($check2 as $key) {
						$this->mem_id = $key->id_company;	
					}
					$not_logged = true;
				}
				//LOAD ALL MEMBER'S DATA
				$basic_data = $this->Company->get('username',$username);
				$ident_data = $this->Company->get_ident($this->mem_id);
				$loc_data = $this->Company->get_loc($this->mem_id);
				$job_data = $this->Job->get_per_comp($this->mem_id);
				$job_count = $this->Job->get_per_comp_count($this->mem_id);
				$app_data = $this->Applier->get_per_id('h.id_company',$this->mem_id);
				$app_count = $this->Applier->count_rows('id_company',$this->mem_id);

				foreach ($basic_data as $key) { //GET FULLNAME OF CURRENT USER
					$this->fullname = $key->company_name;
				}

				$data = array( //INSERTING DATA FOR VIEW
					'title' => $this->fullname." | SambilKerja.com",
					'username' => $username,
					'not_logged' => $not_logged,
					'basic_data' => $basic_data,
					'ident_data' => $ident_data,
					'job_data' => $job_data,
					'app_data' => $app_data,
					'job_count' => $job_count,
					'app_count' => $app_count,
					'loc_data' => $loc_data
					);

				//LOADING VIEWS FOR COMPANY PROFIL
				$this->load->view('html_head', $data);
				$this->load->view('header', $data);
				$this->load->view('content/profil-detail-c', $data);
				$this->load->view('footer', $data);		
			}
		}
		else { //USERNAME NOT EXIST
			redirect('errors/Page_not_found','refresh');
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
			$ach_data = $this->Worker->get_ach($this->mem_id);

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
				'ach_data' => $ach_data,
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

	public function edit_c($param) {
		if ($this->session->userdata('logged') != false) {
			$tab_param = $param[0];
			$this->username = $param[1];

			$prov_data = $this->Location->get_all_prov(); 
			$basic_data = $this->Company->get('username',$this->username);
			$ident_data = $this->Company->get_ident($this->mem_id);

			foreach ($basic_data as $key) {
				$this->company_name = $key->company_name;
			}

			if ($ident_data == false) {
				$input = array('id_company' => $this->mem_id);
				$add_ident = $this->Company->insert_identity($input);
			}

			$data = array(
				'tab_param' => $tab_param,
				'title' => $this->company_name." | SambilKerja.com",
				'username' => $this->username,
				'basic_data' => $basic_data,
				'ident_data' => $ident_data,
				'prov_data' => $prov_data
				 );

			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/profil-edit-tabs-c', $data);
			$this->load->view('content/profil-edit-1-c', $data);
			$this->load->view('content/profil-edit-2-c', $data);
			$this->load->view('content/profil-edit-3-c', $data);
			$this->load->view('footer', $data);	
		}
	}
}
