<?php
  class Company extends CI_model {

    function __construct() {
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
    }

    function log_in($login_id,$pass) {
      $this->db->select('*');
      $this->db->from('company');
      $this->db->where('username',$login_id);
      $this->db->or_where('email',$login_id);
      $this->db->having('password',$pass);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function record_count() {
      $this->db->select('*');
      $this->db->from('company');

      $query = $this->db->get();
      return $query->num_rows();
    }

    function check_username($username) {
      $this->db->select('*');
      $this->db->from('company');
      $this->db->where('username', $username);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return true;
      }
      else {
        return false;
      }
    }

    function check_email($email) {
      $this->db->select('*');
      $this->db->from('company');
      $this->db->where('email', $email);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return true;
      }
      else {
        return false;
      }
    }

    function update_login($id_company) {
      $datestring = '%Y-%m-%d %h:%i:%s';
      $this->db->set('last_login',mdate($datestring,now('Asia/Jakarta')));
      $this->db->where('id_company',$id_company);
      $this->db->update('company'); 
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

    function get_loc($id_company) {
      $this->db->select('w.id_company as id_company, w.domicile as domicile, c.city_name as city_name, p.province_name as province_name');
      $this->db->from('c_identity as w');
      $this->db->join('city as c','w.domicile = c.id_city');
      $this->db->join('location l','c.id_city = l.id_city');
      $this->db->join('province p','l.id_province = p.id_province');
      $this->db->where('w.id_company',$id_company);

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
      return $this->db->insert_id();
    }

    function insert_identity($data) {
      $this->db->insert('c_identity',$data);
    }

    function update($data,$where_value) {
      $this->db->where('id_company',$where_value);
      $this->db->update('company',$data);
    }

    function delete_hire($where_value) {
      $this->db->where('id_company',$where_value);
      $this->db->delete('c_hired');
    }

    function delete($where_value) {
      $this->db->where('id_company',$where_value);
      $this->db->delete('c_identity');      

      $this->db->where('id_company',$where_value);
      $this->db->delete('company');      
    }
  }
?>
