<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lokers extends CI_Controller {

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
		$users = $this->Job->get_all_norm();
		$cat_data = $this->Job->get_all_cats();
		$skill_sets = $this->Skill->get_all();
		$prov_data = $this->Location->get_all_prov(); 
		
		$data = array(
			'title' => 'Loker Management',
			'users_data' => $users,
			'companies' => $this->Company->get_all(),
			'cat_data' => $cat_data,
			'skill_sets' => $skill_sets,
			'prov_data' => $prov_data,
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/lokers',$data);
		$this->load->view('admin/footer',$data);
	}

	public function inserting()
	{	
		foreach ($this->Company->get('id_company',$this->input->post('id_company')) as $key) {}
		
		$file_name = '';
		if ($_FILES['file']['size'] !== 0) {
			$username = $key->username;
			$config['upload_path'] = './files/loker/';
			$new_name = $username.' - '.$this->input->post('post_title');
			$config['file_name'] = $new_name;
			$config['allowed_types'] = 'pdf|jpg|ppt|pptx|doc|docx';
			$config['overwrite'] = FALSE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('file');	
			$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
			$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME
		}
		// echo $file_name;
		$data = array( //ARRAY FOR INPUTS FROM FORM
			'id_company' => $this->input->post('id_company'),
			'post_title' => $this->input->post('post_title'),
			'id_job_category' => $this->input->post('category'),
			'description' => $this->input->post('description'),
			'file' => $file_name,
			'file_desc' => $this->input->post('file_desc'),
			'deadline' => $this->input->post('deadline'),
			'salary' => $this->input->post('salary'),
			'id_location' => $this->input->post('location'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date')
		 	);

		$insert = $this->Job->insert($data); // INSERTING INTO DATABASE
		$this->session->set_flashdata(
							'msg', 
							'Well done! New user is sucessfully inserted!'
							);
		redirect('adm/lokers','refresh');
	}

	public function edit($id_post,$post_title) 
	{
		$cat_data = $this->Job->get_all_cats();
		$prov_data = $this->Location->get_all_prov(); 
		$app_data = $this->Applier->get_per_id('id_job',$id_post);
		$app_count = $this->Applier->count_rows('id_job',$id_post);

		$post_data = $this->Job->get_post($id_post);
		$data = array(
			'title' => 'Edit loker | SambilKerja Admin Panel',
			'cat_data' => $cat_data,
			'prov_data' => $prov_data,
			'post_data' => $post_data,
			'companies' => $this->Company->get_all(),
			'id_post' => $id_post,
			'job_data' => $app_data,
			'app_count' => $app_count
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/lokers-edit',$data);
		$this->load->view('admin/footer',$data);
	}

	public function editing($id)
	{
		foreach ($this->Company->get('id_company',$this->input->post('id_company')) as $key) {}
		$data = array( //ARRAY FOR INPUTS FROM FORM
			'post_title' => $this->input->post('post_title'),
			'id_job_category' => $this->input->post('category'),
			'description' => $this->input->post('description'),
			'file_desc' => $this->input->post('file_desc'),
			'deadline' => $this->input->post('deadline'),
			'salary' => $this->input->post('salary'),
			'id_location' => $this->input->post('location'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date')
		 	);

		if ($_FILES['file']['size'] !== 0) {
			$username = $key->username;
			$config['upload_path'] = './files/loker/';
			$new_name = $username.' - '.$this->input->post('post_title');
			$config['file_name'] = $new_name;
			$config['allowed_types'] = 'pdf|jpg|ppt|pptx|doc|docx';
			$config['overwrite'] = FALSE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('file');	
			$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
			$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME

			$file = array('file' => $file_name);
			$update = $this->Job->update($file,$id);	
		}

		$update = $this->Job->update($data,$id);
		$this->session->set_flashdata(
							'msg', 
							'Well done! Loker data is sucessfully updated!'
							);
		redirect('adm/lokers','refresh');
	}

	public function remove_file($file_name,$mem_id) {
		$data = array('file' => '', 'file_desc' => '');
		$remove = $this->Job->update($data,$mem_id);
		unlink("./files/loker/".$file_name);
		$this->session->set_flashdata(
					'msg', 
					'<b>File Pendukung</b> berhasil dihapus!'
					);
		redirect('adm/lokers/','refresh');
	}

	public function deleting($id_job)
	{
		$this->Applier->delete($id_job);
		$this->Job->delete($id_job);

		$this->session->set_flashdata(
							'msg', 
							'Well done! Loker data is sucessfully removed!'
							);
		redirect('adm/lokers','refresh');	
	}
}