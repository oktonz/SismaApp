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

	public function autonum($tabel, $kolom, $awalan) {
		$this->db->select($kolom);
		$this->db->order_by($kolom, "desc");
		$this->db->from($tabel);
		$query = $this->db->get();

		$jum = $query->num_rows();
		if($jum == 0) {
			$kod = $awalan."-".date('d').date('m').date('y')."~"."0001";
		}
		elseif($jum < 9) {
			$kod = $awalan."-".date('d').date('m').date('y')."~"."000".strval($jum+1);
		}
		elseif($jum < 99) {
			$kod = $awalan."-".date('d').date('m').date('y')."~"."00".strval($jum+1);
		}
		elseif($jum < 999) {
			$kod = $awalan."-".date('d').date('m').date('y')."~"."0".strval($jum+1);
		}
		else {
			$kod = $awalan."-".date('d').date('m').date('y')."~".strval($jum+1);
		}
		return $kod;
	}
}
?>