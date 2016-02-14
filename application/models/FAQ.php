<?php
  class FAQ extends CI_model {

    function __construct() {
      parent::__construct();
    }

    function get_all() {
      $this->db->select('*');
      $this->db->from('faq');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function get($where_value) {
      $this->db->select('*');
      $this->db->from('faq');
      $this->db->where('id_faq',$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function insert($data) {
      $this->db->insert('faq',$data);
    }

    function delete($where) {
      $this->db->where('id_faq',$where);
      $this->db->delete('faq');
    }

    function update($data,$where) {
      $this->db->where('id_faq',$where);
      $this->db->update('faq',$data);
    }
  }
?>
