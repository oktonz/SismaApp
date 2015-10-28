<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Input_model extends CI_model
{
	public function add_index($data) 
	{
		$this->db->insert('tbl_index', $data);
	}

	public function get_index()
	{
		$data = $this->db->get('tbl_index');
		return $data;
	}

	public function add_pekerjaan($data) 
	{
		$this->db->insert('tbl_pekerjaan', $data);
	}

	public function get_lokasi()
	{
		$data = $this->db->get('tbl_maps');
		return $data;
	}

	public function get_pekerjaan()
	{
		$data = $this->db->get('tbl_pekerjaan');
		return $data;
	}

	public function add_dokumen($data)
	{
		$this->db->insert('tbl_dokumen',$data);
	}

	public function add_lokasi($data)
	{
		$this->db->insert('tbl_lokasi',$data);
	}
}
?>