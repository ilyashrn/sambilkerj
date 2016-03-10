<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

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
			'title' => 'Messaging',
			'messages' => $this->Message->get_messages('id_receiver',$this->session->userdata('memid'),3)
		);
		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/messages-list',$data);
		$this->load->view('admin/footer',$data);
	}

	public function send()
	{
		$input = array(
			'id_sender' => $this->session->userdata('memid'),
			'id_receiver' => $this->input->post('receiver'),
			'message_content' => $this->input->post('content'),
			'message_type' => 4 
		);
		$this->Message->insert($input);
		$this->session->set_flashdata('msg', 'Kirim pesan berhasil');
		redirect('adm/messages','refresh');
	}

	public function delete($id)
	{
		$this->Message->delete($id);
		$this->session->set_flashdata('msg', 'Pesan berhasil dihapus');
		redirect('adm/messages','refresh');
	}

	public function replies()
	{
		$data = array(
			'title' => 'Messaging',
			'replies' => $this->Message->get_messages('id_sender',$this->session->userdata('memid'),4),
		);
		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/reply-list',$data);
		$this->load->view('admin/footer',$data);	
	}

}

/* End of file Messages.php */
/* Location: ./application/controllers/adm/Messages.php */