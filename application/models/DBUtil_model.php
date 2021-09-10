<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBUtil_model extends CI_Model {
	
	function get($table, $id = null){
		if($id){
			$result = $this->db->get_where($table, array('id' => $id))->result();
			if($result){
				return $result['0'];
			}
			return null;
		}else{
			return $this->db->get($table)->result();
		}
	}

	function save($table,$data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function update($table,$id,$data){
		$this->db->where('id',$id);
		$this->db->update($table,$data);
	}

	function delete($table,$id){
		$this->db->delete($table, array('id' => $id)); 
	}

	function get_with_array($table, $array){
		return $this->db->get_where($table,$array)->result();
	}

	function count_result($table,$attr,$value_attr){
		$query = $this->db->get_where($table, array($attr => $value));
		return $query->num_rows();
	}

	function get_paginated_result($table,$page,$size){
		$sql = 'SELECT * FROM ' . $table . ' LIMIT ' . (($page - 1) * $size) . ',' . $size;
		return $this->db->query($sql)->result();
	}

}
