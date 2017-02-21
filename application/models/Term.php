<?php
  class Term extends CI_model {

    function __construct() {
      parent::__construct();
    }

    function get_all_hak() {
      $this->db->select('*');
      $this->db->from('hak');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function get_all_kew() {
      $this->db->select('*');
      $this->db->from('kewajiban');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function get($where_what,$where_value,$table) {
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where_what,$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function insert($table,$data) {
      $this->db->insert($table,$data);
    }

    function delete($where_what,$where_value,$table) {
      $this->db->where($where_what,$where_value);
      $this->db->delete($table);
    }

    function update($data,$where,$where_what,$table) {
      $this->db->where($where_what,$where);
      $this->db->update($table,$data);
    }
  }
?>
