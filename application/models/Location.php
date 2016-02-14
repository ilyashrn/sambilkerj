<?php
	class Location extends CI_model {

		function get_all_cities(){
			$this->db->select('
				l.id_city as id_city, 
				c.city_name as city_name,
				l.id_province as id_province,
				p.province_name as province_name');
			$this->db->from('location as l');
			$this->db->join('city as c', 'l.id_city = c.id_city');
			$this->db->join('province as p', 'l.id_province = p.id_province');

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }
		}

		function get_all_prov(){
			$this->db->select('*');
			$this->db->from('province');

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }	
		}

		function get_cities($cur_id){
			$this->db->select('l.id_city as id_city, c.city_name');
			$this->db->from('location as l');
			$this->db->join('city as c', 'l.id_city = c.id_city');
			$this->db->where('l.id_province',$cur_id);

			$query = $this->db->get();
		    if ($query->num_rows() > 0) {
		        return $query->result();
		    }
		    else {
		    	return false;
		    }		
		}
	}
?>