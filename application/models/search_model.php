<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Search_model extends CI_Model
{
	function get_search($match)
	{
		$sel = array('tbl_index.index_arsip', 'judul', 'tbl_pekerjaan.kd_pekerjaan',
					 'nm_pekerjaan', 'unit', 'tahun', 'provinsi', 'kabupaten', 'kecamatan',
					 'desa', 'status', 'tbl_dokumen.no_dok', 'nm_dok', 'asal', 'penerima',
					 'kategori', 'sifat', 'versi', 'tgl_dok', 'kondisi', 'gedung', 'lantai',
					 'rak', 'baris', 'kolom', 'lokasi', 'kd_lokasi'
					);
		$this->db->select($sel);
		$this->db->from('tbl_pekerjaan');
		$this->db->join('tbl_dokumen', 'tbl_pekerjaan.kd_pekerjaan = tbl_dokumen.kd_pekerjaan', 'left');
		$this->db->join('tbl_lokasi', 'tbl_dokumen.no_dok = tbl_lokasi.no_dok', 'left');
		$this->db->join('tbl_index', 'tbl_pekerjaan.index_arsip = tbl_index.index_arsip', 'left');
		$this->db->join('tbl_maps', 'tbl_lokasi.kd_map = tbl_maps.kd_map', 'left');
		$this->db->like('tbl_dokumen.no_dok', $match);
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
		$this->db->or_like('tahun', $match);
		$this->db->or_like('provinsi', $match);
		$this->db->or_like('kabupaten', $match);
		$this->db->or_like('kecamatan', $match);
		$this->db->or_like('desa', $match);
		$this->db->or_like('status', $match);
		$this->db->or_like('tbl_index.index_arsip', $match);
		$this->db->or_like('judul', $match);
		$this->db->or_like('gedung', $match);
		$this->db->or_like('lantai', $match);
		$query = $this->db->get();
		return $query;
	}

	function get_advsearch()
	{
		
	}

	function get_dok_maps($lokasi)
	{
		$this->db->select('*');
		$this->db->from('tbl_dokumen');
		$this->db->join('tbl_maps', 'tbl_dokumen.kd_map = tbl_maps.kd_map');
		$this->db->join('tbl_lokasi', 'tbl_dokumen.no_dok = tbl_lokasi.no_dok');
		$this->db->where('lokasi', $lokasi);
		$this->db->order_by('tbl_dokumen.no_dok');
		$query = $this->db->get();
		return $query;
	}
}
?>