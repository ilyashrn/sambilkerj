<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Model {

	function insert($input) {
		$this->db->insert('c_payment', $input);
	}	

	function delete_check($where,$id) {
		$this->db->select('*');
		$this->db->from('c_payment as p');
		$this->db->join('c_hired as h', 'p.id_c_hired = h.id_hired', 'left');
		$this->db->where($where, $id);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function check_entry($id) {
		$this->db->select('*');
		$this->db->from('c_payment');
		$this->db->where('id_c_hired', $id);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		    return $query->result();
		}
	    else {
	    	return false;
	  	}
	}

	function check_verified($id) {
		$this->db->select('*');
		$this->db->from('c_payment');
		$this->db->where('id_c_hired', $id);
		$this->db->where('verified', '1');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		    return true;
		}
	    else {
	    	return false;
	  	}
	}

	function get_not_paid() {
		$this->db->select('*, c.username as cusername');
		$this->db->from('c_hired as h');
		$this->db->join('job_post as j', 'h.id_job = j.id_post', 'left');
		$this->db->join('company as c', 'h.id_company = c.id_company', 'left');
		$this->db->join('worker as w', 'h.id_worker = w.id_worker', 'left');
		$this->db->join('c_payment as p', 'h.id_hired = p.id_c_hired', 'left');
		$this->db->where('p.id_c_hired', null);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		    return $query->result();
		}
	    else {
	    	return false;
	  	}
	}

	function get_incoming() {
		$this->db->select('*, c.username as cusername');
		$this->db->from('c_payment as p');
		$this->db->where('verified', 0);
		$this->db->join('c_hired as h', 'p.id_c_hired = h.id_hired', 'left');
		$this->db->join('job_post as j', 'h.id_job = j.id_post', 'left');
		$this->db->join('company as c', 'h.id_company = c.id_company', 'left');
		$this->db->join('worker as w', 'h.id_worker = w.id_worker', 'left');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		    return $query->result();
		}
	    else {
	    	return false;
	  	}
	}

	function get_verified() {
		$this->db->select('*, c.username as cusername');
		$this->db->from('c_payment as p');
		$this->db->where('verified', 1);
		$this->db->join('c_hired as h', 'p.id_c_hired = h.id_hired', 'left');
		$this->db->join('job_post as j', 'h.id_job = j.id_post', 'left');
		$this->db->join('company as c', 'h.id_company = c.id_company', 'left');
		$this->db->join('worker as w', 'h.id_worker = w.id_worker', 'left');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		    return $query->result();
		}
	    else {
	    	return false;
	  	}
	}

	function verify($id) {
		$update = array('verified' => 1);
		$this->db->where('id_payment', $id);
		$this->db->update('c_payment', $update);
	}

	function delete($id) {
		$this->db->where('id_payment', $id);
		$this->db->delete('c_payment');
	}

}

/* End of file Payment.php */
/* Location: ./application/models/Payment.php */