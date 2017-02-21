<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_not_found extends CI_Controller {

	public function index()
	{
    $data = array('title' => "Page Not Found | SambilKerja.com",
    	'contacts' => $this->Hcontent->get_all('contacts')
    	);
    $this->load->view('html_head', $data);
    $this->load->view('header', $data);
    $this->load->view('content/page_missing', $data);
    $this->load->view('footer', $data);

	}

}
