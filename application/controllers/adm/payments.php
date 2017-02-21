<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ($this->session->userdata('usrnm') == null) {
			redirect('adm/login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data = array(
			'title' => 'Payment Manager',
			'incoming' => $this->Payment->get_incoming()
		);
		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/payment-list',$data);
		$this->load->view('admin/footer',$data);
	}

	public function verified()
	{
		$data = array(
			'title' => 'Payment Manager',
			'verified' => $this->Payment->get_verified()
		);
		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/verified-list',$data);
		$this->load->view('admin/footer',$data);
	}

	public function not_paid()
	{
		$data = array(
			'title' => 'Payment Manager',
			'notpaid' => $this->Payment->get_not_paid()
		);
		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/notpaid-list',$data);
		$this->load->view('admin/footer',$data);
	}

	public function settings()
	{
		$data = array(
			'title' => 'Payment Manager',
			'invoice' => $this->invoice->get_all()
		);
		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/payment-settings',$data);
		$this->load->view('admin/footer',$data);		
	}

	public function new_account()
	{
		$input = array(
			'invoice_name' => $this->input->post('invoice_name'),
			'invoice_number' => $this->input->post('invoice_number'),
			'invoice_bank' => $this->input->post('invoice_bank') );
		$this->invoice->insert($input);
		$this->session->set_flashdata('msg', 'Input new account for invoice successfull.');
		redirect('adm/payments/settings','refresh');
	}

	public function del_account($id)
	{
		$this->invoice->delete($id);
		$this->session->set_flashdata('msg', 'Delete successfull');
		redirect('adm/payments/settings','refresh');
	}

	function verify($id)
	{
		$this->Payment->verify($id);
		$this->session->set_flashdata('msg', 'List has been verified.');
		redirect('adm/payments/','refresh');
	}

}

/* End of file payment.php */
/* Location: ./application/controllers/adm/payment.php */