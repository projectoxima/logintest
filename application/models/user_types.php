<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_types extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function find_all(){
    	$query = $this->db->get('tbl_user_type');

    	if($query->num_rows() > 0) {
    		return $query->result_array();
    	} else {
    		return 0;
    	}
    }

    function find_name($id) {
        $this->db->where(array('id' => $id));
        $query = $this->db->get('tbl_user_type');

        if($query->num_rows > 0) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    function find($id){
      $this->db->where(array('id' => $id));
      $query = $this->db->get('tbl_user_type');

      if($query->num_rows() > 0){
        return $query->result_array();
      } else {
        return 0;
      }
    }

    function create($data){
      $query = $this->db->insert('tbl_user_type', $data);

      return $query;
    }

    function update($id, $data){
      $this->db->where('id', $id);
      $query = $this->db->update('tbl_user_type', $data);

      return $query;
    }

    function remove($id){
      $query = $this->db->delete('tbl_user_type', array('id' => $id));

      return $query; 
    }
}