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
        $this->db->select('
          w.id_worker as id_worker,
          w.id_language as id_language,
          l.language_name as language_name');
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
        $this->db->select('
          w.id_worker as id_worker,
          w.id_skill as id_skill,
          s.skill_name as skill_name
          ');
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

    function get_edu($where_value) {
        $this->db->select('
          w.id_w_education as id_w_education,
          w.id_worker as id_worker,
          w.id_school as id_school,
          s.school_name as school_name,
          w.id_mayor as id_mayor,
          m.mayor_name as mayor_name,
          w.year_in as year_in,
          w.year_out as year_out
          ');
        $this->db->from('w_education as w');
        $this->db->join('schools_set as s','w.id_school = s.id_school');
        $this->db->join('mayors_set as m','w.id_mayor = m.id_mayor');
        $this->db->where('w.id_worker',$where_value);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return $query->result();
        }
        else {
          return false;
        }
    }

    function get_exp($where_value) {
        $this->db->select('*');
        $this->db->from('w_experience');
        $this->db->where('id_worker',$where_value);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return $query->result();
        }
        else {
          return false;
        }
    }

    function get_train($where_value) {
        $this->db->select('*');
        $this->db->from('w_training');
        $this->db->where('id_worker',$where_value);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
          return $query->result();
        }
        else {
          return false;
        }
    }

    function insert($data) { //INSERT WORKER
      $this->db->insert('worker',$data);
    }

    function insert_identity($data) { //INSERT IDENTITY OF WORKER 
      $this->db->insert('w_identity',$data);
    }

    function update_identity($data,$where_value) { //UPDATE IDENITY OF WORKER
      $this->db->update('w_identity',$data);
      $this->db->where('id_worker',$where_value);
    }

    function insert_skill($data) { //INSERT SKILL OF WORKER
      $this->db->insert('w_skill',$data);
    }

    function remove_skill($where_value) { //REMOVE OR CLEAN SKILLS OF WORKER
      $this->db->where('id_worker',$where_value);
      $this->db->delete('w_skill');
    }

    function insert_lang($data) { //INSERT LANGUAGE OF WORKER
      $this->db->insert('w_language',$data);
    }

    function remove_lang($where_value) { //REMOVE OR CLEAN LANGUAGE OF WORKER
      $this->db->where('id_worker',$where_value);
      $this->db->delete('w_language');
    }

    function insert_edu($data) { //INSERT EDUCATION OF WORKER
      $this->db->insert('w_education',$data);
    }

    function remove_edu($where_value) { //REMOVE OR CLEAN EDUCATION OF WORKER
      $this->db->where('id_w_education',$where_value);
      $this->db->delete('w_education');
    }

    function insert_exp($data) { //INSERT EXPERIENCE OF WORKER
      $this->db->insert('w_experience',$data);
    }

    function remove_exp($where_value) { //REMOVE OR CLEAN EXPERIENCE OF WORKER
      $this->db->where('id_w_experience',$where_value);
      $this->db->delete('w_experience');
    }

    function insert_train($data) { //INSERT EXPERIENCE OF WORKER
      $this->db->insert('w_training',$data);
    }

    function remove_train($where_value) { //REMOVE OR CLEAN EXPERIENCE OF WORKER
      $this->db->where('id_w_training',$where_value);
      $this->db->delete('w_training');
    }

    function update($data,$where_what,$where_value) {
      $this->db->update('worker',$data);
      $this->db->where($where_what,$where_value);
    }
  }
?>
