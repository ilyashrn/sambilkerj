<?php
  class Language extends CI_model {

    function __construct() {
      parent::__construct();
    }

    function get_all() {
      $this->db->select('*');
      $this->db->from('languages_set');

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
      $this->db->from('languages_set');
      $this->db->where('id_language',$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function insert($data) {
      $this->db->insert('languages_set',$data);
    }

    function delete($where) {
      $this->db->where('id_language',$where);
      $this->db->delete('languages_set');
    }
  }
?>
