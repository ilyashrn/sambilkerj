<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Model {

	function insert($data) {
		$this->db->insert('messages', $data);
	}

	function get_receivers($id,$type) {
		$this->db->select('*');
		$this->db->from('messages');
		if ($type == 1) {
			$this->db->join('company', 'id_receiver = id_company');	
		}

		$this->db->where('id_sender', $id);
		$this->db->where('message_type', $type);

		$this->db->distinct();
		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	    	return false;
	    } 
	}

	// function get_messages($id) { // inbox company
	// 	$this->db->select('*');
	// 	$this->db->from('messages');
	// 	$this->db->where('id_receiver', $id);

	// }

	function get_messages($where_what,$id,$type) {
		$this->db->select('*');
		$this->db->from('messages');
		// $this->db->where('message_type', $type);
		if ($type == 1) { // worker ke company
			$this->db->join('company', 'id_receiver = id_company','left');
			$this->db->join('worker', 'id_sender = id_worker','left');
			$this->db->join('administrator', 'id_sender  = id_admin','left');
		} elseif ($type == 2) { // company ke worker
			$this->db->join('company', 'id_sender = id_company','left');
			$this->db->join('worker', 'id_receiver = id_worker','left');
			$this->db->join('administrator', 'id_receiver = id_admin','left');
		} elseif ($type == 3) { // company ke admin
			$this->db->join('company', 'id_sender = id_company','left');
			$this->db->join('administrator', 'id_receiver = id_admin','left');
		} elseif ($type == 4) { //admin ke company
			$this->db->join('company', 'id_receiver= id_company','left');
			$this->db->join('administrator', 'id_sender  = id_admin','left');
		}
		$this->db->where($where_what, $id);
		$this->db->order_by('timestamp', 'desc');

		$query = $this->db->get();
	    if ($query->num_rows() > 0) {
	        return $query->result();
	    } else {
	    	return false;
	    }
	}

	function delete($id) {
		$this->db->where('id_message', $id);
		$this->db->delete('messages');
	}

}

/* End of file Message.php */
/* Location: ./application/models/Message.php */