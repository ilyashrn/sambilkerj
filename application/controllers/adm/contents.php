<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends CI_Controller {

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
			'title' => 'Content Management',
			'skill_set' => $this->Skill->get_all(),
			'lang_set' => $this->Language->get_all(),
			'cat_set' => $this->Job->get_all_cats(),
			'sub_set' => $this->Job->get_all_cat_w_sub(),
			'may_set' => $this->Mayor->get_all(),
			'sch_set' => $this->School->get_all()
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/contents',$data);
		$this->load->view('admin/footer',$data);
	}

	public function inserting()
	{	
		$content_id = $this->input->post('content_id');
		$content_name = $this->input->post('content');
		if ($content_id == '1') {
			$input = array('school_name' => $content_name);	
			$this->School->insert($input);
		} elseif ($content_id == '2') {
			$input = array('mayor_name' => $content_name);	
			$this->Mayor->insert($input);
		} elseif ($content_id == '3') {
			$input = array('skill_name' => $content_name);	
			$this->Skill->insert($input);
		} elseif ($content_id == '4') {
			$input = array('language_name' => $content_name);	
			$this->Language->insert($input);
		} elseif ($content_id == '5') {
			$input = array('category_name' => $content_name);	
			$this->Category->insert_cat($input);
		} elseif ($content_id == '6') {
			$input = array('sub_category_name' => $content_name, 'id_category' => $this->input->post('category'));	
			$this->Category->insert_sub($input);
		}
		$this->session->set_flashdata(
							'msg', 
							'Well done! New Content is sucessfully inserted!'
							);
		redirect('adm/contents','refresh');
	}

	public function deleting($content_id,$id_content)
	{
		if ($content_id == '1') {
			$this->School->delete($id_content);
		} elseif ($content_id == '2') {
			$this->Mayor->delete($id_content);
		} elseif ($content_id == '3') {
			$this->Skill->delete($id_content);
		} elseif ($content_id == '4') {
			$this->Language->delete($id_content);
		} elseif ($content_id == '5') {
			$this->Category->delete_sub_per_cat($id_content);
			$this->Category->delete_cat($id_content);
		} elseif ($content_id == '6') {
			$this->Category->delete_sub_cat($id_content);
		}

		$this->session->set_flashdata(
							'msg', 
							'Well done! One Content data is sucessfully removed!'
							);
		redirect('adm/contents','refresh');	
	}
}