<?php
  class Category extends CI_model {

    function __construct() {
      parent::__construct();
    }

  
    function get($where_value) {
      $this->db->select('*');
      $this->db->from('job_categories');
      $this->db->where('id_category',$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function insert_cat($data) {
      $this->db->insert('job_categories',$data);
    }

    function insert_sub($data) {
      $this->db->insert('job_sub_categories',$data);
    }    

    function delete_cat($where) {
      $this->db->where('id_category',$where);
      $this->db->delete('job_categories');
    }

    function delete_sub_per_cat($where) {
      $this->db->where('id_category',$where);
      $this->db->delete('job_sub_categories'); 
    }

    function delete_sub_cat($where) {
      $this->db->where('id_sub_category',$where);
      $this->db->delete('job_sub_categories'); 
    }

  }
?>
