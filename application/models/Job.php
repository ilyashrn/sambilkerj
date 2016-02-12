<?php
	class Job extends CI_model {

		function __construct() {
			parent::__construct();
		}

		function insert($data) {
			$this->db->insert('job_post', $data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}

		function update($data,$where) {
			$this->db->where('id_post',$where);
      		$this->db->update('job_post',$data);	
		}

		function get_poster($id_post) {
			$this->db->select('id_company');
			$this->db->from('job_post');
			$this->db->where('id_post',$id_post);

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function delete($id_post) {
			$this->db->where('id_post',$id_post);
      		$this->db->delete('job_post');	
		}

		function insert_skill($data) {
			$this->db->insert('job_req_skill', $data);
		}

		function delete_skill($where) {
			$this->db->where('id_post',$where);
      		$this->db->delete('job_req_skill');
		}

		function record_count() {
			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				c.username as username,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline,
				p.id_location as id_location,
				ct.city_name as  city_name,
				pr.province_name as province_name
				');
			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->join('city as ct', 'p.id_location = ct.id_city', 'left');
			$this->db->join('location as l', 'ct.id_city = l.id_city', 'left');
			$this->db->join('province as pr', 'l.id_province = pr.id_province', 'left');

			$query = $this->db->get();
			return $query->num_rows();
		}

		function get_all($limit,$start,$order_by,$sort) {
			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				c.username as username,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline,
				p.id_location as id_location,
				ct.city_name as  city_name,
				pr.province_name as province_name
				');
			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->join('city as ct', 'p.id_location = ct.id_city', 'left');
			$this->db->join('location as l', 'ct.id_city = l.id_city', 'left');
			$this->db->join('province as pr', 'l.id_province = pr.id_province', 'left');

			if ($order_by == '' || $sort == '') {
				$this->db->order_by("p.created_time", "desc");
			} elseif ($order_by == '1') {
				$this->db->order_by("p.created_time", ($sort == '1') ? "desc" : "asc");
			} elseif ($order_by == '2') {
				$this->db->order_by("p.salary", ($sort == '1') ? "desc" : "asc");
			} elseif ($order_by == '3') {
				$this->db->order_by("p.deadline", ($sort == '1') ? "desc" : "asc");
			}

			$this->db->limit($limit,$start);
			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function get_per_comp($id_company) {
			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline,
				p.id_location as id_location,
				ct.city_name as  city_name,
				pr.province_name as province_name
				');

			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->join('city as ct', 'p.id_location = ct.id_city', 'left');
			$this->db->join('location as l', 'ct.id_city = l.id_city', 'left');
			$this->db->join('province as pr', 'l.id_province = pr.id_province', 'left');
			$this->db->where('p.id_company',$id_company);
			
			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function get_per_comp_count($id_company) {
			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline,
				p.id_location as id_location,
				ct.city_name as  city_name,
				pr.province_name as province_name
				');

			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->join('city as ct', 'p.id_location = ct.id_city', 'left');
			$this->db->join('location as l', 'ct.id_city = l.id_city', 'left');
			$this->db->join('province as pr', 'l.id_province = pr.id_province', 'left');
			$this->db->where('p.id_company',$id_company);
			
			$query = $this->db->get();
		    return $query->num_rows();
		}

		function get_post($id_post) {
			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline,
				p.id_location as id_location,
				ct.city_name as  city_name,
				pr.province_name as province_name
				');

			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->join('city as ct', 'p.id_location = ct.id_city', 'left');
			$this->db->join('location as l', 'ct.id_city = l.id_city', 'left');
			$this->db->join('province as pr', 'l.id_province = pr.id_province', 'left');
			$this->db->where('p.id_post',$id_post);	

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function search_all($limit,$start,$st,$order_by,$sort) {
			if ($st == "NIL") {
				$st = "";
			}

			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				c.username as username,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline,
				p.id_location as id_location,
				ct.city_name as  city_name,
				pr.province_name as province_name
				');
			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->join('city as ct', 'p.id_location = ct.id_city', 'left');
			$this->db->join('location as l', 'ct.id_city = l.id_city', 'left');
			$this->db->join('province as pr', 'l.id_province = pr.id_province', 'left');
			$this->db->like('p.post_title', $st);
			$this->db->or_like('c.company_name', $st);
			$this->db->or_like('s.sub_category_name', $st);
			$this->db->or_like('ca.category_name', $st);

			if ($order_by == '' || $sort == '') {
				$this->db->order_by("p.created_time", "desc");
			} elseif ($order_by == '1') {
				$this->db->order_by("p.created_time", ($sort == '1') ? "desc" : "asc");
			} elseif ($order_by == '2') {
				$this->db->order_by("p.salary", ($sort == '1') ? "desc" : "asc");
			} elseif ($order_by == '3') {
				$this->db->order_by("p.deadline", ($sort == '1') ? "desc" : "asc");
			}
			
			$this->db->limit($limit,$start);
			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function refine_search($limit,$start,$st,$order_by,$sort,$lokasi,$kategori) {
			if ($st == "NIL") {
				$st = "";
			}

			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				c.username as username,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline,
				p.id_location as id_location,
				ct.city_name as  city_name,
				pr.province_name as province_name
				');
			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->join('city as ct', 'p.id_location = ct.id_city', 'left');
			$this->db->join('location as l', 'ct.id_city = l.id_city', 'left');
			$this->db->join('province as pr', 'l.id_province = pr.id_province', 'left');
			$this->db->like('p.post_title', $st);
			$this->db->or_like('c.company_name', $st);
			$this->db->or_like('s.sub_category_name', $st);
			$this->db->or_like('ca.category_name', $st);

			foreach ($lokasi as $lok) {
				if ($lok == 'default') {
					break;
				}
				$this->db->or_where('p.id_location',$lok);
			}
			
			foreach ($kategori as $kat) {
				if ($kat == 'default') {
					break;
				}
				$this->db->or_where('p.id_job_category',$kat);	
			}

			if ($order_by == '' || $sort == '') {
				$this->db->order_by("p.created_time", "desc");
			} elseif ($order_by == '1') {
				$this->db->order_by("p.created_time", ($sort == '1') ? "desc" : "asc");
			} elseif ($order_by == '2') {
				$this->db->order_by("p.salary", ($sort == '1') ? "desc" : "asc");
			} elseif ($order_by == '3') {
				$this->db->order_by("p.deadline", ($sort == '1') ? "desc" : "asc");
			}
			
			$this->db->limit($limit,$start);
			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function refine_search_record_count($st,$lokasi,$kategori) {
			if ($st == "NIL") {
				$st = "";
			}

			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline
				');
			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->like('p.post_title', $st);
			$this->db->or_like('c.company_name', $st);
			$this->db->or_like('s.sub_category_name', $st);
			$this->db->or_like('ca.category_name', $st);

			foreach ($lokasi as $lok) {
				if ($lok == 'default') {
					break;
				}
				$this->db->or_where('p.id_location',$lok);
			}
			
			foreach ($kategori as $kat) {
				if ($kat == 'default') {
					break;
				}
				$this->db->or_where('p.id_job_category',$kat);	
			}

			$query = $this->db->get();
        	return $query->num_rows();
		}

		function search_record_count($st) {
			if ($st == "NIL") {
				$st = "";
			}

			$this->db->select('
				p.id_post as id_post, 
				p.post_title as post_title,
				p.id_company as id_company,
				ci.avatar as avatar,
				c.company_name as company_name,
				c.username as username,
				p.id_job_category as id_job_category,
				s.sub_category_name as sub_category_name,
				ca.category_name as category_name,
				p.description as description,
				p.salary as salary,
				p.file as file,
				p.file_desc as file_desc,
				p.created_time as created_time,
				p.deadline as deadline,
				p.id_location as id_location,
				ct.city_name as  city_name,
				pr.province_name as province_name
				');
			$this->db->from('job_post as p');
			$this->db->join('company as c', 'p.id_company = c.id_company');
			$this->db->join('job_sub_categories as s', 'p.id_job_category = s.id_sub_category');
			$this->db->join('job_categories as ca', 's.id_category = ca.id_category');
			$this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
			$this->db->join('city as ct', 'p.id_location = ct.id_city', 'left');
			$this->db->join('location as l', 'ct.id_city = l.id_city', 'left');
			$this->db->join('province as pr', 'l.id_province = pr.id_province', 'left');
			$this->db->like('p.post_title', $st);
			$this->db->or_like('c.company_name', $st);
			$this->db->or_like('s.sub_category_name', $st);
			$this->db->or_like('ca.category_name', $st);

			$query = $this->db->get();
        	return $query->num_rows();
		}

		function get_req_skill($id_post) {
			$this->db->select('
				j.id_post as id_post,
				j.id_skill as id_skill,
				s.skill_name as skill_name
				');
			$this->db->from('job_req_skill as j');
			$this->db->join('skills_set as s','j.id_skill = s.id_skill');
			$this->db->where('id_post',$id_post);

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function get_all_cat_w_sub() {
			$this->db->select('
				s.id_sub_category as id_sub_category,
				s.sub_category_name as sub_category_name,
				s.id_category as id_category,
				c.category_name as category_name
				');
			$this->db->from('job_sub_categories as s');
			$this->db->join('job_categories as c', 's.id_category = c.id_category');

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function get_all_cats() {
			$this->db->select('*');
			$this->db->from('job_categories');

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function get_subs($cur_id) {
			$this->db->select('
				s.id_sub_category as id_sub_category, 
				s.sub_category_name as sub_category_name');
			$this->db->from('job_sub_categories as s');
			$this->db->join('job_categories as c', 's.id_category = c.id_category');
			$this->db->where('s.id_category',$cur_id);

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}
	}
?>