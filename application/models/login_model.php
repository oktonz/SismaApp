<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Login_model extends CI_Model
{
	function login($username, $password)
	{
	   $this->db->select('id, username, password, role');
	   $this->db->from('tbl_user');
	   $this->db->where('username', $username);
	   $this->db->where('password', MD5($password));
	   $this->db->limit(1);

	   $query = $this->db->get();

	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}
}
?>