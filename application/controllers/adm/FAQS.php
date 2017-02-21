<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FAQS extends CI_Controller {

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
			'title' => 'Frequently Asked Questions',
			'faqs' => $this->FAQ->get_all()
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/faqs',$data);
		$this->load->view('admin/footer',$data);
	}

	public function inserting()
	{	
		$input = array(
			'question' => $this->input->post('question'),
			'answer' => $this->input->post('answer')
			);
		$this->FAQ->insert($input);
		$this->session->set_flashdata(
							'msg', 
							'Well done! New question is sucessfully inserted!'
							);
		redirect('adm/FAQS','refresh');
	}

	public function edit($id_faq) 
	{
		$data = array(
			'title' => 'Edit F.A.Q.',
			'faqs' => $this->FAQ->get($id_faq)
			);
		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/faqs-edit',$data);
		$this->load->view('admin/footer',$data);
	}

	public function editing($id)
	{
		$input = array(
			'question' => $this->input->post('question'),
			'answer' => $this->input->post('answer')
			);

		$update = $this->FAQ->update($input,$id);
		$this->session->set_flashdata(
							'msg', 
							'Well done! Question data is sucessfully updated!'
							);
		redirect('adm/FAQS','refresh');
	}

	public function deleting($id_faq)
	{
		$this->FAQ->delete($id_faq);

		$this->session->set_flashdata(
							'msg', 
							'Well done! Question and answer data is sucessfully removed!'
							);
		redirect('adm/FAQS','refresh');	
	}
}