<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// -- settings -- \\
class M_settings extends CI_Model {
    //-- settings page --\\
    // function
    function get_main_data()
    {
      $this->db->from('unit_testing');
	    $query = $this->db->get();
	    return $query->result();
    }
    function save($request)
    {
        $timezone 	= new DateTimeZone("Asia/Jakarta");//untuk menyesuaikan dengan jam indonesia
        $dat 		= new DateTime();//untuk menyesuaikan dengan jam indonesia
        $dat->setTimezone($timezone);//untuk menyesuaikan dengan jam indonesia
        $date		= date('Y-m-d');
        $time		= $dat->format('H:i:s'); // format jam dipanggil disini
        $insertStatus = $this->db->insert('unit_testing',array('title'=>$request['title'],'description'=>$request['description']));
        return $insertStatus;
    }
    function get_by_id($id)
    {
        $this->db->where('a.id', $id);
        $this->db->from('unit_testing as a');
        $this->db->select('a.*');
        $query = $this->db->get();
	      return $query->row();
    }
    function update($where, $request){
        $timezone 	= new DateTimeZone("Asia/Jakarta");//untuk menyesuaikan dengan jam indonesia
        $dat 		= new DateTime();//untuk menyesuaikan dengan jam indonesia
        $dat->setTimezone($timezone);//untuk menyesuaikan dengan jam indonesia
        $date		= date('Y-m-d');
        $time		= $dat->format('H:i:s'); // format jam dipanggil disini
        $this->db->update('unit_testing', array('title'=>$request['title'],'description'=>$request['description'], 'date_modified'=>$date), $where);
		    return $this->db->affected_rows();
    }
     function get_search_data($key)
    {
        $this->db->from('unit_testing as a');
        $this->db->select('a.*');
        $this->db->like('a.title', $key);
        $this->db->or_like('a.description', $key);
		    $query = $this->db->get();
	      return $query->result();
    }
    function delete_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('unit_testing');
    }
    function delete_multi_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('unit_testing');
    }
}
