<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $model_array = array(
			// '' => , );
		if ($this->session->userdata('usrnm') == null) {
			redirect('adm/login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index() 
	{	
		$data = array(
			'title' => 'Syarat dan Ketentuan',
			'hak' => $this->Term->get_all_hak(),
			'kewajiban' => $this->Term->get_all_kew()
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/terms',$data);
		$this->load->view('admin/footer',$data);
	}

	public function inserting_hak()
	{	
		$input = array(
			'hak' => $this->input->post('hak')
			);
		$this->Term->insert('hak',$input);
		$this->session->set_flashdata(
							'msg', 
							'Well done! Hak baru is sucessfully inserted!'
							);
		redirect('adm/terms','refresh');
	}

	public function inserting_kew()
	{	
		$input = array(
			'kewajiban' => $this->input->post('kewajiban')
			);
		$this->Term->insert('kewajiban',$input);
		$this->session->set_flashdata(
							'msg', 
							'Well done! kewajiban baru is sucessfully inserted!'
							);
		redirect('adm/terms','refresh');
	}


	public function deleting($id_what,$table,$id)
	{
		$this->Term->delete($id_what,$id,$table);

		$this->session->set_flashdata(
							'msg', 
							'Well done! '.$table.' data is sucessfully removed!'
							);
		redirect('adm/terms','refresh');	
	}
}