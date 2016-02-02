<?php
  class Company extends CI_model {

    function __construct() {
      parent::__construct();
    }

    function log_in($login_id,$pass) {
      $this->db->select('*');
      $this->db->from('company');
      $this->db->where('username',$login_id);
      $this->db->or_where('email',$login_id);
      $this->db->where('password',$pass);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function get_all() {
      $this->db->select('*');
      $this->db->from('company');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function get_ident($where_value) {
      $this->db->select('*');
      $this->db->from('c_identity');
      $this->db->where('id_company',$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }      
    }

    function update_identity($data,$where_value) {
      $this->db->where('id_company',$where_value);
      $this->db->update('c_identity',$data);
    }

    function get($where_what,$where_value) {
      $this->db->select('*');
      $this->db->from('company');
      $this->db->where($where_what,$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function insert($data) {
      $this->db->insert('company',$data);
    }

    function insert_identity($data) {
      $this->db->insert('c_identity',$data);
    }

    function update($data,$where_value) {
      $this->db->where('id_company',$where_value);
      $this->db->update('company',$data);
      
    }
  }
?>
