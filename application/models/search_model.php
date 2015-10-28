<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Search_model extends CI_Model
{
	function get_search($match)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen');
		$this->db->join('tbl_pekerjaan', 'tbl_dokumen.kd_pekerjaan = tbl_pekerjaan.kd_pekerjaan');
		$this->db->like('no_dok', $match);
		$this->db->or_like('nm_dok', $match);
		$this->db->or_like('asal', $match);
		$this->db->or_like('penerima', $match);
		$this->db->or_like('kategori', $match);
		$this->db->or_like('sifat', $match);
		$this->db->or_like('kondisi', $match);
		$this->db->or_like('versi', $match);
		$this->db->or_like('tbl_dokumen.keterangan', $match);
		$this->db->or_like('tbl_pekerjaan.kd_pekerjaan', $match);
		$this->db->or_like('nm_pekerjaan', $match);
		$query = $this->db->get();
		return $query;
	}
}
?>