<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class arsip_model extends CI_Model
{
	function get_all_arsip()
	{
		$this->db->select('*');
		$this->db->from('tbl_index');
		$this->db->join('tbl_pekerjaan', 'tbl_index.index_arsip = tbl_pekerjaan.index_arsip');
		$this->db->order_by('tbl_index.index_arsip');
		$data = $this->db->get();
		return $data;
	}

	function get_det_arsip($kd_pekerjaan)
	{
		$this->db->select('*');
		$this->db->from('tbl_index');
		$this->db->join('tbl_pekerjaan', 'tbl_index.index_arsip = tbl_pekerjaan.index_arsip');
		$this->db->where('kd_pekerjaan',$kd_pekerjaan);
		$this->db->order_by('tbl_index.index_arsip');
		$data = $this->db->get();
		return $data;
	}

	function get_dokumen($kd_pekerjaan)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen');
		$this->db->join('tbl_lokasi', 'tbl_dokumen.no_dok = tbl_lokasi.no_dok');
		$this->db->join('tbl_maps', 'tbl_dokumen.kd_map = tbl_maps.kd_map');
		$this->db->where('kd_pekerjaan', $kd_pekerjaan);
		$this->db->order_by('tbl_lokasi.kd_lokasi');
		$data = $this->db->get();
		return $data;
	}

	function get_all_dokumen()
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen');
		$this->db->join('tbl_lokasi', 'tbl_dokumen.no_dok = tbl_lokasi.no_dok');
		$this->db->join('tbl_maps', 'tbl_dokumen.kd_map = tbl_maps.kd_map');
		$this->db->order_by('tbl_lokasi.kd_lokasi');
		$data = $this->db->get();
		return $data;
	}

	function get_all_lokasi()
	{
		$this->db->select('*');
		$this->db->from('tbl_lokasi');
		$this->db->join('tbl_dokumen', 'tbl_lokasi.no_dok = tbl_dokumen.no_dok');
		$this->db->order_by('tbl_lokasi.kd_lokasi');
		$data = $this->db->get();
		return $data;
	}

	function get_det_lokasi($kd_lokasi)
	{
		$this->db->select('*');
		$this->db->from('tbl_lokasi');
		$this->db->join('tbl_dokumen', 'tbl_lokasi.no_dok = tbl_dokumen.no_dok');
		$this->db->where('kd_lokasi', $kd_lokasi);
		$this->db->order_by('tbl_lokasi.kd_lokasi');
		$data = $this->db->get();
		return $data;
	}
}
?>