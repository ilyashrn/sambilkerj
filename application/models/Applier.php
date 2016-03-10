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
      $this->db->join('company as c', 'h.id_company = c.id_company');
      $this->db->join('job_post as j', 'h.id_job = j.id_post');
      $this->db->join('c_hired_status as s','h.id_status = s.id_status');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    function count_rows($where_what,$where_value) {
      $this->db->select('*');
      $this->db->from('c_hired');
      $this->db->where($where_what,$where_value);

      $query = $this->db->get();
      return $query->num_rows();
    }

    function count_rev($where_what,$where_value) {
      $this->db->select('*');
      $this->db->from('c_hired');
      $this->db->where($where_what,$where_value);
      $this->db->where('review !=','');

      $query = $this->db->get();
      return $query->num_rows();
    }

    function get_review($where_what,$where_value) {
      $this->db->select('*');
      $this->db->from('c_hired as h');
      $this->db->join('worker as w', 'h.id_worker = w.id_worker');
      $this->db->join('company as c', 'h.id_company = c.id_company');
      $this->db->join('c_identity as ci', 'c.id_company = ci.id_company','left');
      $this->db->join('c_hired_status as s','h.id_status = s.id_status');
      $this->db->join('job_post as j', 'h.id_job = j.id_post');
      $this->db->where($where_what,$where_value);
      $this->db->where('review !=','');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      } 
    }

    function get_not_store($where) { // pekerjaan yang blm disetor
      $this->db->select('*, w.username as worker_username, wi.avatar as worker_avatar');
      $this->db->from('c_hired as h');
      $this->db->join('worker as w', 'h.id_worker = w.id_worker');
      $this->db->join('w_identity as wi', 'w.id_worker = wi.id_worker');
      $this->db->join('company as c', 'h.id_company = c.id_company');
      $this->db->join('c_identity as ci', 'c.id_company = ci.id_company','left');
      $this->db->join('c_hired_status as s','h.id_status = s.id_status','left');
      $this->db->join('job_post as j', 'h.id_job = j.id_post');
      $this->db->where('h.id_company',$where);
      $this->db->where('store', '0');

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      } 
    }

    function get_per_id($where_what,$where_value) {
      $this->db->select('*, w.username as worker_username, wi.avatar as worker_avatar');
      $this->db->from('c_hired as h');
      $this->db->join('worker as w', 'h.id_worker = w.id_worker');
      $this->db->join('w_identity as wi', 'w.id_worker = wi.id_worker');
      $this->db->join('company as c', 'h.id_company = c.id_company');
      $this->db->join('c_identity as ci', 'c.id_company = ci.id_company','left');
      $this->db->join('c_hired_status as s','h.id_status = s.id_status','left');
      $this->db->join('job_post as j', 'h.id_job = j.id_post');
      $this->db->where($where_what,$where_value);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      } 
    }

    function prvilege_worker_prof($id_company,$username) {
      $this->db->select('*');
      $this->db->from('c_hired as c');
      $this->db->join('worker as w', 'c.id_worker = w.id_worker', 'left');
      $this->db->where('id_company', $id_company);
      $this->db->where('username', $username);

      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return true;
      } else {
        return false;
      }
    }

    function get_worker($id_company) {
      $this->db->select('*');
      $this->db->from('c_hired as c');
      $this->db->join('worker as co', 'c.id_worker = co.id_worker','left');
      $this->db->where('c.id_company', $id_company);
      $this->db->having('c.id_status = 1 or c.id_status = 2');

      $this->db->distinct();
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    function get_company($id_worker) {
      $this->db->select('*');
      $this->db->from('c_hired as c');
      $this->db->join('company as co', 'c.id_company = co.id_company');
      $this->db->where('id_worker', $id_worker);
      $this->db->where('id_status', 1);
      $this->db->or_where('id_status', 2);

      $this->db->distinct();
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    function check_worker($id_worker,$id_job) {
      $this->db->select('*');
      $this->db->from('c_hired');
      $this->db->where('id_worker',$id_worker);
      $this->db->where('id_job',$id_job);

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

    function unapply($id_where) {
      $this->db->where('id_hired',$id_where);
      $this->db->delete('c_hired');
    }

    function delete($id_where) {
      $this->db->where('id_job',$id_where);
      $this->db->delete('c_hired');
    }

    function delete_a($id_where) {
      $this->db->where('id_worker',$id_where);
      $this->db->delete('c_hired');
    }

    function delete_c($id_where) {
      $this->db->where('id_company',$id_where);
      $this->db->delete('c_hired');
    }

    function update($data,$id_where) {
      $this->db->where('id_hired',$id_where);
      $this->db->update('c_hired',$data);
    }


  }
?>
