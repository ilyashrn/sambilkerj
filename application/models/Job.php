<?php
	class Job extends CI_model {

		function __construct() {
			parent::__construct();
		}

		function insert($data) {
			$this->db->insert('job_post', $data);
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