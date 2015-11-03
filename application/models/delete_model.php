<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Delete_model extends CI_model
{
	public function delete_arsip($kd_pkrj, $kd_map)
	{
		$this->db->where('kd_pekerjaan', $kd_pkrj);
		$this->db->delete('tbl_pekerjaan');

		$this->db->where('kd_pekerjaan', $kd_pkrj);
		$this->db->delete('tbl_dokumen');

		$this->db->where('kd_map', $kd_map);
		$this->db->delete('tbl_lokasi');
	}

	public function delete_lokasi($kd_lok, $no_dok)
	{
		$this->db->where('kd_lokasi', $kd_lok);
		$this->db->delete('tbl_lokasi');

		$this->db->where('no_dok', $no_dok);
		$this->db->delete('tbl_dokumen');
	}

	public function delete_user($id)
	{	
		$this->db->where('id', $id);
		$this->db->delete('tbl_user');
	}
}
?>