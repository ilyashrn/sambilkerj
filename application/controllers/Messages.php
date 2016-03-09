<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	private $username = null; 
	private $mem_id = null;
	private $mem_type = null;
	private $fullname = null;
	private $last_page = null;

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		if ($this->session->userdata('logged') != true) {
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
		} else {
			$this->username = $this->session->userdata('logged');
			$this->mem_id = $this->session->userdata('mem_id');
			$this->mem_type = $this->session->userdata('mem_type');
			
			$sess_data = array('last_page' => current_url());
			$this->session->set_userdata($sess_data);
			$this->last_page= $this->session->userdata('last_page');

		}
	}

	public function index()
	{
		if ($this->mem_type == 'C') {
			$data = array(
				'title' => 'Private Messages | SambiKerja.com',
				'contacts' => $this->Hcontent->get_all('contacts'),
				'workerlist' => $this->Applier->get_worker($this->mem_id),
				'adminlist' => $this->Administrator->get_all(),
				'messages' => $this->Message->get_messages('id_receiver',$this->mem_id,1),
				'replies' => $this->Message->get_messages('id_sender',$this->mem_id,2),
				'mem_id' => $this->mem_id,
				'mem_type' => $this->mem_type
			);	
		} elseif ($this->mem_type == 'W') {
			$data = array(
				'title' => 'Private Messages | SambiKerja.com',
				'contacts' => $this->Hcontent->get_all('contacts'),
				'companylist' => $this->Applier->get_company($this->mem_id),
				'messages' => $this->Message->get_messages('id_receiver',$this->mem_id,2),
				'replies' => $this->Message->get_messages('id_sender',$this->mem_id,1),
				'mem_id' => $this->mem_id,
				'mem_type' => $this->mem_type
			);
		}
		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/messages-list', $data);
		$this->load->view('footer', $data);		
	}

	public function send()
	{
		if ($this->mem_type == 'C') {
			$receiver = explode('|', $this->input->post('receiver'));
			if ($receiver[1] == 'admin') {
				$input = array(
					'id_sender' => $this->mem_id,
					'id_receiver' => $receiver[0],
					'message_content' => $this->input->post('content'),
					'message_type' => 3 
				);
			} else {
				$input = array(
					'id_sender' => $this->mem_id,
					'id_receiver' => $receiver[0],
					'message_content' => $this->input->post('content'),
					'message_type' => 2 
				);
			}
		} elseif ($this->mem_type == 'W') {
			$input = array(
				'id_sender' => $this->mem_id,
				'id_receiver' => $this->input->post('receiver'),
				'message_content' => $this->input->post('content'),
				'message_type' => 1 
			);
		}
		$this->Message->insert($input);
		$this->session->set_flashdata('msg', 'Kirim pesan berhasil');
		redirect('Messages','refresh');
	}

	public function del($id)
	{
		$this->Message->delete($id);
		$this->session->set_flashdata('msg', 'Pesan berhasil dihapus');
		redirect('Messages','refresh');
	}
}

/* End of file Messages.php */
/* Location: ./application/controllers/Messages.php */