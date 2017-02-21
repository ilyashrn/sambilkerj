<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	

	public function index() //LOGOUT 
	{
		$this->session->unset_userdata('usrnm');
		$this->session->set_flashdata(
			'msg', 
			'Anda sudah logout. Sampai bertemu kembali!'
			);
		redirect('adm/Login','refresh');
	}
}