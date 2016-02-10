<?php
  class Applier extends CI_model {

    function __construct() {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
    }

    function get_all() {
      $this->db->select('*');
      $this->db->from('c_hired as h');
      $this->db->join('worker as w', 'h.id_worker = w.id_worker');
      $this->db->join('company as c', 'h.id_company = w.id_company');
      $this->db->join('job_post as j', 'h.id_job = j.id_post');
      $this->db->join('c_hired_status as s','h.id_status = s.id_status');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    function get_per_id($where_what,$where_value) {
      $this->db->select('*');
      $this->db->from('c_hired as h');
      $this->db->join('worker as w', 'h.id_worker = w.id_worker');
      $this->db->join('company as c', 'h.id_company = c.id_company');
      $this->db->join('c_identity as ci', 'c.id_company = ci.id_company');
      $this->db->join('c_hired_status as s','h.id_status = s.id_status');
      $this->db->join('job_post as j', 'h.id_job = j.id_post');
      $this->db->where($where_what,$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      } 
    }

    function apply($data) {
      $this->db->insert('c_hired',$data);
    }


  }
?>
