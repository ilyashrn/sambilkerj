<?php
  class Mayor extends CI_model {

    function __construct() {
      parent::__construct();
    }

    function get_all() {
      $this->db->select('*');
      $this->db->from('mayors_set');

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
      $this->db->from('mayors_set');
      $this->db->where('id_mayor',$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function insert($data) {
      $this->db->insert('mayors_set',$data);
    }

    function delete($where) {
      $this->db->where('id_mayor',$where);
      $this->db->delete('mayors_set');
    }
  }
?>
