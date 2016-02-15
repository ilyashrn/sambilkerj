<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hcontents extends CI_Controller {

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
			'sliders' => $this->Hcontent->get_all('slider'),
			'contacts' => $this->Hcontent->get_all('contacts')
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/hcontents',$data);
		$this->load->view('admin/footer',$data);
	}

	public function inserting_im()
	{	
		if ($_FILES['image']['size'] !== 0) {
			$config['upload_path'] = './assets/images/slider/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;
			$config['max_height'] = '500';
			$config['min_width'] = '800';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('image');	
			$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
			$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME

			if (!$upload) {
				$this->session->set_flashdata('warn', $this->upload->display_errors());	
			} else{
				$input = array('img' => $file_name);

				$this->Hcontent->insert('slider',$input);
				$this->session->set_flashdata('msg', 'Well done! New image is sucessfully inserted!');
			}
		} else {
			$this->session->set_flashdata('warn', 'Please select an image file');
		}
		redirect('adm/hcontents','refresh');
	}

	function inserting_co() {
		$input = array(
			'twitter' => $this->input->post('twitter'),
			'facebook' => $this->input->post('facebook'),
			'google' => $this->input->post('google'),
			'email' => $this->input->post('email'),
			'telp' => $this->input->post('telp')
			);
		$this->Hcontent->update('contacts',$input,'1','id_cont');
		$this->session->set_flashdata(
			'msg', 
			'Well done! your contact is sucessfully updated!'
			);
		redirect('adm/hcontents','refresh');
	}

	function removing_im($img,$id) {
		$remove = $this->Hcontent->delete('slider',$id, 'id_img');
		unlink("./assets/images/slider/".$img);
		$this->session->set_flashdata(
					'msg', 
					'<b>Slider image</b> berhasil dihapus!'
					);
		redirect('adm/hcontents/','refresh');
	}
}