<?php
  class Administrator extends CI_model {

  	function __construct() {
  		parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
  	}

  	function log_in($login_id,$pass) {
      $this->db->select('*');
      $this->db->from('administrator');
      $this->db->where('username',$login_id);
      $this->db->having('password',$pass);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      else {
        return false;
      }
    }

    function check_username($username) {
      $this->db->select('*');
      $this->db->from('administrator');
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
      $this->db->from('administrator');
      $this->db->where('email', $email);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return true;
      }
      else {
        return false;
      }
    }


    function update_login($id_user) {
      $datestring = '%Y-%m-%d %h:%i:%s';
      $this->db->set('last_login',mdate($datestring,now('Asia/Jakarta')));
      $this->db->where('id_admin',$id_user);
      $this->db->update('administrator');
    }

    function insert($data) {
      $this->db->insert('administrator',$data);
    }

    function get_user($id_user) {
      $this->db->select('*');
      $this->db->from('administrator');
      $this->db->where('id_admin',$id_user);

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
      $this->db->from('administrator');

      $query = $this->db->get();
      return $query->num_rows();
    }

    function get_all() {
      $this->db->select('*');
      $this->db->from('administrator');

      $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        else {
          return false;
        }
    }

  function update($data,$id_user) {
    $this->db->where('id_admin',$id_user);
    $this->db->update('administrator',$data);  
  }

  function delete($id_user) {
      $this->db->where('id_admin',$id_user);
      $this->db->delete('administrator');  
    }
  }
?>