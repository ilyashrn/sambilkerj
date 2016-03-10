<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Model {

	function insert($input) {
		$this->db->insert('invoice', $input);
	}

	function get_all() {
		$this->db->select('*');
		$this->db->from('invoice');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function get($id) {
		$this->db->select('*');
		$this->db->from('invoice');
		$this->db->where('id_invoice', $id);

		$query = $this->db->get();
		if ($query->row() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function delete($id) {
		$this->db->where('id_invoice', $id);
		$this->db->delete('invoice');
	}

	function update($id,$update) {
		$this->db->where('id_invoice', $id);
		$this->db->update('invoice', $update);
	}

}

/* End of file invoice.php */
/* Location: ./application/models/invoice.php */