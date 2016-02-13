<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Controller {

	function __construct() {
		parent::__construct();
		if ($this->session->userdata('usrnm') == null) {
			redirect('adm/login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index() 
	{
		$users = $this->Company->get_all();

		$data = array(
			'title' => 'Companies Management',
			'users_data' => $users
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/companies',$data);
		$this->load->view('admin/footer',$data);
	}

	public function inserting()
	{
		$input = array(
			'company_name' => $this->input->post('company_name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')) //MD5 ENCRYPTED
			 );	
		$inserting = $this->Company->insert($input);
		$new_id = array('id_company' => $inserting);
		$inserting2 = $this->Company->insert_identity($new_id);
		$this->session->set_flashdata(
							'msg', 
							'Well done! New user is sucessfully inserted!'
							);
		redirect('adm/companies','refresh');
	}

	public function edit($id_user,$username) 
	{
		$prov_data = $this->Location->get_all_prov(); 

		$basic_data = $this->Company->get('username',$username);
		$ident_data = $this->Company->get_ident($id_user);
		$loc_data = $this->Company->get_loc($id_user);
		$job_data = $this->Job->get_per_comp($id_user);
		$job_count = $this->Job->get_per_comp_count($id_user);
		$app_data = $this->Applier->get_per_id('h.id_company',$id_user);
		$app_count = $this->Applier->count_rows('id_company',$id_user);

		foreach ($basic_data as $key) { //GET FULLNAME OF CURRENT USER
			$fullname = $key->company_name;
		}

		$data = array(
			'title' => 'Edit user | FSMS',
			'username' => $username,
			'basic_data' => $basic_data,
			'ident_data' => $ident_data,
			'job_data' => $job_data,
			'app_data' => $app_data,
			'job_count' => $job_count,
			'app_count' => $app_count,
			'loc_data' => $loc_data,
			'prov_data' => $prov_data
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/companies-edit',$data);
		$this->load->view('admin/footer',$data);
	}

	public function editing()
	{
		$id = $this->input->post('id');
		// if ($this->input->post('origin_username') !== $this->input->post('username')) {
		// 	if ($this->Company->check_username($this->input->post('username')) || $this->Worker->check_username($this->input->post('username')) ) {
		// 		$this->session->set_flashdata(
		// 					'msg', 
		// 					'Username you insert is existed, try a new one!'
		// 					);
		// 		redirect('adm/companies/editing/'.$id,'refresh');
		// 	}
		// }
		if (false == $this->Company->get_ident($id)) {
			$new_id = array('id_company' => $id);
			$inserting2 = $this->Company->insert_identity($new_id);
		}

		$dob = implode("-", array_reverse(explode("/", $this->input->post('dob'))));	
		$mem_data = array(
			'NPWP' => $this->input->post('npwp'),
			'telp_number' => $this->input->post('telp_number'),
			'ownership' => $this->input->post('ownership'),
			'about' => $this->input->post('about'),
			'domicile' => $this->input->post('domicile'),
			'bidang' => $this->input->post('bidang'),
			'business_form' => $this->input->post('business_form'),
			'address' => $this->input->post('address')
			);
		
		$basic = array(
			'username' => $this->input->post('username'),
			'company_name' => $this->input->post('company_name'),
			'email' => $this->input->post('email'),
			'secondary_email' => $this->input->post('secondary_email')
			);

		if ($this->input->post('password') !== '') {
			$pass = array('password' => md5($this->input->post('password')));
			$update = $this->Company->update($pass,$id);	
		}

		if ($this->input->post('avatar') !== '') {
			$config['upload_path'] = './images/profil_photo/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('avatar');	
			$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
			$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME
			// echo $this->upload->display_errors();
			$avatar = array('avatar' => $file_name);
			$update = $this->Company->update_identity($avatar,$id);	
		}

		$update = $this->Company->update($basic,$id);
		$insert = $this->Company->update_identity($mem_data,$id);
		$this->session->set_flashdata(
							'msg', 
							'Well done! User data is sucessfully updated!'
							);
		redirect('adm/companies','refresh');
	}

	public function deleting($id_user)
	{
		$this->Company->delete_hire($id_user);
		$posts = $this->Job->get_per_comp($id_user);
		foreach ($posts as $post) {
			$this->Job->delete_skill($post->id_post);
			$this->Job->delete($post->id_post);
		}

		$this->Company->delete($id_user);		

		$this->session->set_flashdata(
							'msg', 
							'Well done! User data is sucessfully removed!'
							);
		redirect('adm/Companies','refresh');	
	}
}