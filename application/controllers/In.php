<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Worker'); //LOAD MODELS FOR CHECKING DB
		$this->load->model('Company');
	}

	public function index()
	{
		
	}

	public function process()
	{
		$prev_page = $this->session->userdata('last_page');

		if (null !== $this->input->post('in')) {
			$login_id = $this->input->post('name_email');
			$pass = md5($this->input->post('password'));

			$check1 = $this->Worker->log_in($login_id,$pass);

			if ($check1 == false) {
				$check2 = $this->Company->log_in($login_id,$pass);
				
				if ($check2 == false) {
					redirect($prev_page);
				}
				else {
					foreach ($check2 as $row) { //LOOPING FOR A USERNAME
					}

					$this->session->set_userdata('logged',$row->username);
					redirect($prev_page);	
				}
			}
			else {
				foreach ($check1 as $row) { //LOOPING FOR A USERNAME
				}	

				$this->session->set_userdata('logged',$row->username);
				redirect($prev_page);
			}	
		}
		else {
			redirect($prev_page);
		}
		
	}

	public function out()
	{
		$prev_page = $this->session->userdata('last_page');
		$this->session->unset_userdata('logged');
	}

}
