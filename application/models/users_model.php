<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Users_model extends CI_Model
{
	function get_allusers()
	{
	  	$data = $this->db->get('tbl_user');
	   	return $data;
	}

	function get_users($id)
	{
		$this->db->where('id',$id);
		$data = $this->db->get('tbl_user');
		return $data;
	}

	function insert_users($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	function edit_users($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('tbl_user', $data);
	}
}
?>