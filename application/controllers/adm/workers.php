<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Workers extends CI_Controller {

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
		$users = $this->Worker->get_all();

		$data = array(
			'title' => 'Workers Management',
			'users_data' => $users
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/workers',$data);
		$this->load->view('admin/footer',$data);
	}

	public function inserting()
	{
		$input = array(
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')) //MD5 ENCRYPTED
			 );	
		$inserting = $this->Worker->insert($input);
		$new_id = array('id_worker' => $inserting);
		$inserting2 = $this->Worker->insert_identity($new_id);
		$this->session->set_flashdata(
							'msg', 
							'Well done! New user is sucessfully inserted!'
							);
		redirect('adm/workers','refresh');
	}

	public function edit($id_user,$username) 
	{
		$prov_data = $this->Location->get_all_prov(); 
		$lang_sets = $this->Language->get_all();
		$skill_sets = $this->Skill->get_all();
		$sch_sets = $this->School->get_all();
		$may_sets = $this->Mayor->get_all();

		$basic_data = $this->Worker->get('username',$username);
		$ident_data = $this->Worker->get_ident($id_user);
		$lang_data = $this->Worker->get_lang($id_user);
		$skill_data = $this->Worker->get_skill($id_user);
		$edu_data = $this->Worker->get_edu($id_user);
		$exp_data = $this->Worker->get_exp($id_user);
		$train_data = $this->Worker->get_train($id_user);
		$ach_data = $this->Worker->get_ach($id_user);
		$loc_data = $this->Worker->get_loc($id_user);
		$pob_data = $this->Worker->get_pob($id_user);
		$job_data = $this->Applier->get_per_id('h.id_worker',$id_user);
		$job_count = $this->Applier->count_rows('id_worker',$id_user);
		$review_data = $this->Applier->get_review('h.id_worker',$id_user);
		$review_count = $this->Applier->count_rev('id_worker',$id_user);

		foreach ($basic_data as $key) { //GET FULLNAME OF CURRENT USER
			$fullname = $key->fullname;
		}

		$data = array(
			'title' => 'Edit user | FSMS',
			'username' => $username,
			'fullname' => $fullname,
			'basic_data' => $basic_data,
			'ident_data' => $ident_data,
			'lang_data' => $lang_data,
			'skill_data' => $skill_data,
			'edu_data' => $edu_data,
			'exp_data' => $exp_data,
			'train_data' => $train_data,
			'job_data' => $job_data,
			'job_count' => $job_count,
			'review_data' => $review_data,
			'review_count' => $review_count,
			'loc_data' => $loc_data,
			'pob_data' => $pob_data,
			'ach_data' => $ach_data,
			'prov_data' => $prov_data,
			'lang_sets' => $lang_sets,
			'skill_sets' => $skill_sets,
			'sch_sets' => $sch_sets,
			'may_sets' => $may_sets
			);

		$this->load->view('admin/html_head',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/content/workers-edit',$data);
		$this->load->view('admin/footer',$data);
	}

	public function editing($id)
	{
		// $id = $this->input->post('id');
		// echo $id;
		// if (($this->input->post('origin_username') !== $this->input->post('username')) && ($this->Company->check_username($this->input->post('username')) || $this->Worker->check_username($this->input->post('username')))) {
		// 		$this->session->set_flashdata(
		// 					'warn', 
		// 					'Username you insert is existed, try a new one!'
		// 					);
		// 		redirect('adm/workers/editing/'.$id,'refresh');
		// }
		if (false == $this->Worker->get_ident($id)) {
			$new_id = array('id_worker' => $id);
			// echo $this->input->post('id');
			$inserting2 = $this->Worker->insert_identity($new_id);
		}

		$dob = implode("-", array_reverse(explode("/", $this->input->post('dob'))));	
		$mem_data = array(
			'nickname' => $this->input->post('nickname'),
			'pob' => $this->input->post('pob'),
			'dob' => $dob,
			'telp_number' => $this->input->post('telp_number'),
			'about' => $this->input->post('about'),
			'domicile' => $this->input->post('domicile'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address')
			);
		
		$basic = array(
			'username' => $this->input->post('username'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email')
			);

		if ($this->input->post('password') !== '') {
			$pass = array('password' => md5($this->input->post('password')));
			$update = $this->Worker->update($pass,$id);	
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
			$update = $this->Worker->update_identity($avatar,$id);	
		}

		$update = $this->Worker->update($basic,$id);
		$insert = $this->Worker->update_identity($mem_data,$id);
		$this->session->set_flashdata(
							'msg', 
							'Well done! User data is sucessfully updated!'
							);
		redirect('adm/workers','refresh');
	}

	public function store($id_hired) {
		$data = array('store' => '1');
		$store = $this->Applier->update($data,$id_hired);
		$this->session->set_flashdata(
							'msg', 
							'Well done! User data is sucessfully updated!'
							);
		redirect('adm/Workers','refresh');
	}

	public function remove_photo($file_name,$mem_id) {
		$data = array('avatar' => '');
		$remove = $this->Worker->update_identity($data,$mem_id);
		unlink("./images/profil_photo/".$file_name);
		$this->session->set_flashdata(
					'msg', 
					'<b>Foto profil</b> berhasil dihapus!'
					);
		redirect('adm/workers/','refresh');
	}

	public function deleting($id_user)
	{
		$this->Worker->remove_edu($id_user);
		$this->Worker->remove_exp($id_user);
		$this->Worker->remove_ach($id_user);
		$this->Worker->remove_lang($id_user);
		$this->Worker->remove_train($id_user);
		$this->Worker->delete_loker($id_user);

		$this->Worker->delete_ident($id_user);
		$this->Worker->delete($id_user);		

		$this->session->set_flashdata(
							'msg', 
							'Well done! User data is sucessfully removed!'
							);
		redirect('adm/Workers','refresh');	
	}
}