<?php
  class Worker extends CI_model {

    function __construct() {
      parent::__construct();
    }

    function get_all() {
      $this->db->select('*');
      $this->db->from('worker');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function log_in($login_id,$pass) {
      $this->db->select('*');
      $this->db->from('worker');
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

    function get($where_what,$where_value) {
      $this->db->select('*');
      $this->db->from('worker');
      $this->db->where($where_what,$where_value);

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
      $this->db->from('w_identity');
      $this->db->where('id_worker',$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function get_lang($where_value) {
        $this->db->select('w.id_worker as id_worker,l.language_name as language_name');
        $this->db->from('w_language as w');
        $this->db->join('languages_set as l','l.id_language = w.id_language');
        $this->db->where('id_worker',$where_value);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return $query->result();
        }
        else {
          return false;
        }
    }

    function get_skill($where_value) {
        $this->db->select('w.id_worker as id_worker,s.skill_name as skill_name');
        $this->db->from('w_skill as w');
        $this->db->join('skills_set as s','w.id_skill = s.id_skill');
        $this->db->where('w.id_worker',$where_value);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return $query->result();
        }
        else {
          return false;
        }
    }

    function insert($data) {
      $this->db->insert('worker',$data);
    }

    function insert_identity($data) {
      $this->db->insert('w_identity',$data);
    }

    function update_identity($data,$where_value) {
      $this->db->update('w_identity',$data);
      $this->db->where('id_worker',$where_value);
    }

    function update($data,$where_what,$where_value) {
      $this->db->update('worker',$data);
      $this->db->where($where_what,$where_value);
    }
  }
?>
