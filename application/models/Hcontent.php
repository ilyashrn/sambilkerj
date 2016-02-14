<?php
  class Hcontent extends CI_model {

    function __construct() {
      parent::__construct();
    }

    function get_all($table) {
      $this->db->select('*');
      $this->db->from($table);

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
      $this->db->from('skills_set');
      $this->db->where('id_skill',$where_value);

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

    function delete($table,$where,$where_what) {
      $this->db->where($where_what,$where);
      $this->db->delete($table);
    }

    function update($table,$data,$where,$where_what) {
      $this->db->where($where_what,$where);
      $this->db->update($table,$data);
    }
  }
?>
