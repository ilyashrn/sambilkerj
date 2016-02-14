<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

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
		redirect('Jobs/lists','refresh');
	}

	public function detail($id_post,$post_name)
	{
		$post_data = $this->Job->get_post($id_post);
		$req_skill = $this->Job->get_req_skill($id_post);
		$poster_data = $this->Job->get_poster($id_post);
		foreach ($poster_data as $poster) {}
		foreach ($post_data as $post) {}
		$basic_data = $this->Company->get('id_company',$poster->id_company);
		$ident_data = $this->Company->get_ident($poster->id_company);
		$loc_data = $this->Company->get_loc($poster->id_company);
		$post_count = $this->Job->get_per_comp_count($poster->id_company);
		$app_count = $this->Applier->count_rows('id_job',$post->id_post);

		$data = array(
			'title' => $post->post_title." | SambilKerja.com",
			'contacts' => $this->Hcontent->get_all('contacts'),
			'post_data' => $post_data,
			'req_skill' => $req_skill,
			'basic_data' => $basic_data,
			'ident_data' => $ident_data,
			'loc_data' => $loc_data,
			'post_count' => $post_count,
			'mem_type' => $this->mem_type,
			'app_count' => $app_count
			);
		$this->load->view('html_head', $data);
		$this->load->view('content/modal', $data);
		$this->load->view('header', $data);
		$this->load->view('content/job-detail', $data);
		$this->load->view('footer', $data);		
	}

	public function lists()
	{
		//PAGINATION SETUP
		$this->session->unset_userdata('lokasi');
		$this->session->unset_userdata('kategori');
		// $this->session->unset_userdata('keyword');
		$search = false;
		// Initialize empty array.
		$config = array();
		// Set base_url for every links
		$config["base_url"] = base_url()."Jobs/lists/";
		// Set total rows in the result set you are creating pagination for.
		$config["total_rows"] = $this->Job->record_count();
		// Number of items you intend to show per page.
		$config["per_page"] = 10;
		//Set that how many number of pages you want to view.
		$config['num_links'] = $config["total_rows"];

        //PAGINATION VIEW
        $config['full_tag_open'] = '<ul class="pagination text-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['next_link'] = false;
        $config['prev_link'] = false;
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        // $page = str_replace('&per_page=', '', $page);
        $str_links = $this->pagination->create_links();

        $order_by = '';
        $sort = '';
        
        if (!empty($this->input->post('sort_by'))) {
        	$order_by = $this->input->post('sort_by');
        	$sort = $this->input->post('sort_method');
        	$sess_array = array('order_by' => $order_by, 'sort' => $sort);
        	$this->session->set_userdata($sess_array);
        }
    
        $cat_data = $this->Job->get_all_cats();
		$prov_data = $this->Location->get_all_prov(); 

    	$data = array(
    		'title' => "Lowongan kerja yang tersedia | SambilKerja.com",
    		'contacts' => $this->Hcontent->get_all('contacts'),
    		'job_data' => $this->Job->get_all($config["per_page"], $page, $order_by, $sort),
    		'links' => explode('&nbsp;',$str_links),
    		'cat_data' => $cat_data,
    		'prov_data' => $prov_data,
    		'page' => $page,
    		'rows' => $config["total_rows"],
    		'search' => $search,
    		'job_count' => $this->Job->record_count()
    		);

		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/job-list', $data);
		$this->load->view('footer', $data);
	}

	public function search()
	{
		$keyword = ($this->input->post('search')) ? $this->input->post('search') : "NIL";
		
		if (false !== $this->input->post('search')) {
			$sess = array('keyword' => $this->input->post('search'));
			$this->session->set_userdata($sess);	
		}

		$keyword = ($this->session->userdata('keyword')) ? $this->session->userdata('keyword') : $keyword;
		$search = true;
		//PAGINATION SETUP
		// Initialize empty array.
		$config = array();
		// Set base_url for every links
		$config["base_url"] = base_url()."Jobs/search/$keyword/";
		// Set total rows in the result set you are creating pagination for.
		$config["total_rows"] = $this->Job->search_record_count($keyword);
		// Number of items you intend to show per page.
		$config["per_page"] = 10;
		//Set that how many number of pages you want to view.
		$config['num_links'] = $config["total_rows"];

        $config["uri_segment"] = 4;

        //PAGINATION VIEW
        $config['full_tag_open'] = '<ul class="pagination text-center">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['next_link'] = false;
        $config['prev_link'] = false;
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        // $config["first_url"] = base_url()."Jobs/search/page/1";

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $str_links = $this->pagination->create_links();

        $order_by = '';
        $sort = '';
        
        if (!empty($this->input->post('sort_by'))) {
        	$order_by = $this->input->post('sort_by');
        	$sort = $this->input->post('sort_method');
        	$sess_array = array('order_by' => $order_by, 'sort' => $sort);
        	$this->session->set_userdata($sess_array);
        }

        $cat_data = $this->Job->get_all_cats();
		$prov_data = $this->Location->get_all_prov(); 

        $data = array(
    		'title' => "Lowongan kerja yang tersedia | SambilKerja.com",
    		'contacts' => $this->Hcontent->get_all('contacts'),
    		'total_rows' => $config["total_rows"],
    		'job_data' => $this->Job->search_all($config["per_page"], $page, $keyword, $order_by, $sort),
    		'links' => explode('&nbsp;',$str_links),
    		'keyword' => $keyword,
    		'cat_data' => $cat_data,
    		'prov_data' => $prov_data,
    		'keyword' => $keyword,
    		'search' => $search
    		);

		$this->load->view('html_head', $data);
		$this->load->view('header', $data);
		$this->load->view('content/job-list', $data);
		$this->load->view('footer', $data);
	}

	public function refine_search() {
		if ($this->input->post('refine') !== false) {
			$keyword = ($this->input->post('refine_search')) ? $this->input->post('refine_search') : "";
			$lokasi = $this->input->post('location');
			$kategori = $this->input->post('category');
		
			if (false !== $this->input->post('refine')) {
				$sess = array(
					'refine_keyword' => $this->input->post('refine_search'),
					'lokasi' => $lokasi,
					'kategori' => $kategori
					);
				$this->session->set_userdata($sess);	
			}

			$keyword = ($this->session->userdata('refine_keyword')) ? $this->session->userdata('refine_keyword') : $keyword;
			$lokasi = ($this->session->userdata('lokasi')) ? $this->session->userdata('lokasi') : $lokasi;
			$kategori = ($this->session->userdata('kategori')) ? $this->session->userdata('kategori') : $kategori;

			$search = "refine";
			//PAGINATION SETUP
			// Initialize empty array.
			$config = array();
			// Set base_url for every links
			$config["base_url"] = base_url()."Jobs/refine_search/$keyword/";
			// Set total rows in the result set you are creating pagination for.
			$config["total_rows"] = $this->Job->refine_search_record_count($keyword,$lokasi,$kategori);
			// Number of items you intend to show per page.
			$config["per_page"] = 10;
			//Set that how many number of pages you want to view.
			$config['num_links'] = $config["total_rows"];

	        $config["uri_segment"] = 4;

	        //PAGINATION VIEW
	        $config['full_tag_open'] = '<ul class="pagination text-center">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = false;
	        $config['last_link'] = false;
	        $config['next_link'] = false;
	        $config['prev_link'] = false;
	        $config['cur_tag_open'] = '<li class="active"><a href="">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        // $config["first_url"] = base_url()."Jobs/search/page/1";

	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	        $str_links = $this->pagination->create_links();

	        $order_by = '';
	        $sort = '';
	        
	        if (!empty($this->input->post('sort_by'))) {
	        	$order_by = $this->input->post('sort_by');
	        	$sort = $this->input->post('sort_method');
	        	$sess_array = array('order_by' => $order_by, 'sort' => $sort);
	        	$this->session->set_userdata($sess_array);
	        }

	        $cat_data = $this->Job->get_all_cats();
			$prov_data = $this->Location->get_all_prov(); 

	        $data = array(
	    		'title' => "Refine search | SambilKerja.com",
	    		'contacts' => $this->Hcontent->get_all('contacts'),
	    		'total_rows' => $config["total_rows"],
	    		'job_data' => $this->Job->refine_search($config["per_page"], $page, $keyword, $order_by, $sort, $lokasi, $kategori),
	    		'links' => explode('&nbsp;',$str_links),
	    		'keyword' => $keyword,
	    		'cat_data' => $cat_data,
	    		'prov_data' => $prov_data,
	    		'keyword' => $keyword,
	    		'search' => $search
	    		);

			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/job-list', $data);
			$this->load->view('footer', $data);
		} 
	}

	public function new_job()
	{
		if ($this->session->userdata('logged') != false && $this->mem_type == 'C') { //IF USER COMPANY LOGIN
			$cat_data = $this->Job->get_all_cats();
			$skill_sets = $this->Skill->get_all();
			$prov_data = $this->Location->get_all_prov(); 
			$edit = false; 

			$data = array(
				'title' => "Buka Lowongan baru | SambilKerja.com",
				'contacts' => $this->Hcontent->get_all('contacts'),
				'sub_title' => 'Buka Lowongan Baru',
				'sub_subtitle' => 'Mulai Lowongan Baru',
				'cat_data' => $cat_data,
				'skill_sets' => $skill_sets,
				'prov_data' => $prov_data,
				'edit' => $edit
				);
			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/new-job', $data);
			$this->load->view('footer', $data);	
		}
		else {
			redirect('errors/Page_not_found','refresh');
		}
	}

	public function edit_job($id_post) 
	{
		if ($this->session->userdata('logged') != false && $this->mem_type == 'C') { //IF USER COMPANY LOGIN
			$cat_data = $this->Job->get_all_cats();
			$skill_sets = $this->Skill->get_all();
			$prov_data = $this->Location->get_all_prov(); 
			
			$post_data = $this->Job->get_post($id_post);
			$req_skill_data = $this->Job->get_req_skill($id_post);
			$edit = true;

			$data = array(
				'title' => "Edit Lowongan | SambilKerja.com",
				'contacts' => $this->Hcontent->get_all('contacts'),
				'sub_title' => "Edit Lowongan",
				'sub_subtitle' => "Perbarui Lowongan Lama",
				'cat_data' => $cat_data,
				'skill_sets' => $skill_sets,
				'prov_data' => $prov_data,
				'post_data' => $post_data,
				'req_skill_data' => $req_skill_data,
				'edit' => $edit,
				'id_post' => $id_post
				);

			$this->load->view('html_head', $data);
			$this->load->view('header', $data);
			$this->load->view('content/new-job', $data);
			$this->load->view('footer', $data);	
		}
		else {
			redirect('errors/Page_not_found','refresh');
		}
	}

	function updating($id_post)
	{
		if (!empty($this->mem_id) && $this->mem_type == 'C' && $this->input->post('ins_job') !== false) {
			if ($_FILES['file']['size'] == 0) {
				$file_name = $this->input->post('cur_file');	
			} else {
				$config['upload_path'] = './files/loker/';
				$new_name = $this->username.' - '.$this->input->post('post_title');
				$config['file_name'] = $new_name;
				$config['allowed_types'] = 'pdf|jpg|ppt|pptx|doc|docx';
				$config['overwrite'] = FALSE;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$upload = $this->upload->do_upload('file');	
				$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
				$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME
				echo $file_name;
			} 

			$data = array( //ARRAY FOR INPUTS FROM FORM
				'post_title' => $this->input->post('post_title'),
				'id_job_category' => $this->input->post('category'),
				'description' => $this->input->post('jobdesc'),
				'file' => $file_name,
				'file_desc' => $this->input->post('file_desc'),
				'deadline' => $this->input->post('deadline'),
				'salary' => $this->input->post('salary'),
				'id_location' => $this->input->post('location'),
			 	);
			$update = $this->Job->update($data,$id_post); // UPDATING

			$cleaning = $this->Job->delete_skill($id_post);
			if (false !== $this->input->post('skills')) {
				foreach ($this->input->post('skills') as $row ) {
					$data = array(
						'id_post' => $id_post,
						'id_skill' => $row
						 );
					$ins_skill = $this->Job->insert_skill($data); 
				}
			}

			$this->session->set_flashdata(
					'msg', 
					'<b>Lowongan pekerjaan</b> berhasil diperbarui!'
					);
			redirect('Members/'.$this->username);
		} else {
			redirect('errors/Page_not_found','refresh');
		}		
	}

	function inserting() {
		if (!empty($this->mem_id) && $this->mem_type == 'C' && $this->input->post('ins_job') !== false) {
			$config['upload_path'] = './files/loker/';
			$new_name = $this->username.' - '.$this->input->post('post_title');
			$config['file_name'] = $new_name;
			$config['allowed_types'] = 'pdf|jpg|ppt|pptx|doc|docx';
			$config['overwrite'] = FALSE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$upload = $this->upload->do_upload('file');	
			$upload_data = $this->upload->data(); //UPLOAD DATA AFTER UPLOADING
			$file_name = $upload_data['file_name']; //RETRIEVING FILE NAME
			// echo $file_name;
			$data = array( //ARRAY FOR INPUTS FROM FORM
				'id_company' => $this->mem_id,
				'post_title' => $this->input->post('post_title'),
				'id_job_category' => $this->input->post('category'),
				'description' => $this->input->post('jobdesc'),
				'file' => $file_name,
				'file_desc' => $this->input->post('file_desc'),
				'deadline' => $this->input->post('deadline'),
				'salary' => $this->input->post('salary'),
				'id_location' => $this->input->post('location'),
			 	);
			$insert = $this->Job->insert($data); // INSERTING INTO DATABASE

			if (false !== $this->input->post('skills')) {
				foreach ($this->input->post('skills') as $row ) {
					$data = array(
						'id_post' => $insert,
						'id_skill' => $row
						 );
					$ins_skill = $this->Job->insert_skill($data); 
				}
			}

			$this->session->set_flashdata(
					'msg', 
					'<b>Lowongan pekerjaan</b> berhasil dibuat!'
					);
			redirect('Members/'.$this->username);
		} else {
			redirect('errors/Page_not_found','refresh');
		}
	}

	function removing($id_post) {
		$poster = $this->Job->get_poster($id_post);
		foreach ($poster as $poster ) {}
		if ($this->mem_id == $poster->id_company) {
			$this->Applier->delete_c($id_post);
			$rem_skill = $this->Job->delete_skill($id_post);
			$rem_post = $this->Job->delete($id_post);
			
			$this->session->set_flashdata(
						'msg', 
						'<b>Lowongan pekerjaan</b> berhasil dihapus!'
						);
			redirect('Members/'.$this->username);
		} else {
			redirect('errors/Page_not_found','refresh');
		}
	}

	function removing_file($file,$id_post) {
		$data = array('file' => '', 'file_desc' => '');
		$remove = $this->Job->update($data,$id_post);
		unlink("./files/loker/".$file);
		$this->session->set_flashdata(
					'msg', 
					'<b>File pendukung</b> berhasil dihapus!'
					);
		redirect('Jobs/edit_job/'.$id_post,'refresh');
	}

}