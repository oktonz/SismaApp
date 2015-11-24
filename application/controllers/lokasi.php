<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$result = $this->arsip_model->get_all_lokasi();
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'lokasi' => $result->result_array(),
				);
			if ($session_data['role'] == 'Viewer') {
				$this->load->view('lokarsip_v1', $komponen);
			}
			else {
				$this->load->view('lokarsip_v', $komponen);
			}
		}
		else
		{
			redirect('login');
		}
	}

	public function det_lokasi($kd_lokasi)
	{
		if($this->session->userdata('logged_in'))
		{
			$result = $this->arsip_model->get_det_lokasi($kd_lokasi);
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'detlokasi' => $result->result_array(),
				);
			$this->load->view('detlokasi_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function delete_lokasi($kd_lokasi)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$dok = $this->arsip_model->get_det_lokasi($kd_lokasi)->row();
			$no_dok = $dok->no_dok;
			$pdfd = $dok->file_path;
			
			unlink($pdfd);
			
			$this->delete_model->delete_lokasi($kd_lokasi, $no_dok);

			redirect('lokasi');
		}
		else
		{
			redirect('login');
		}
	}

	public function edit_lokasi($kode)
	{
		if($this->session->userdata('logged_in'))
		{				
			$lokasi = $this->arsip_model->get_det_lokasi($kode);
			$alok = $this->input_model->get_lokasi();
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),	
				'lokasi' => $lokasi->result_array(),
				'maps' => $alok->result_array()						
				);
			$this->load->view('editlokasi_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_edit_lokasi()
	{
		$kode = $this->input->post('txtidlok');
		$lokasidok = array(
			'kd_lokasi' => $kode,
			'gedung' => $this->input->post('txtgedung'),
			'lantai' => $this->input->post('txtlantai'),
			'rak' => $this->input->post('txtrak'),
			'baris' => $this->input->post('txtbaris'),
			'kolom' => $this->input->post('txtkolom'),
			//'file_path' => "assets/dokumen/".$res['file_name'],
			//'no_dok' => $this->input->post('txtnodok'),
			'kd_map' => $this->input->post('cbolok'),
		);
		$upmap = array(
			'kd_map' => $this->input->post('cbolok')
		);
		$this->arsip_model->edit_lokasi($kode, $lokasidok);
		$kd = $this->input->post('txtnodok');
		$this->arsip_model->edit_dok($kd, $upmap);
		redirect('lokasi');
	}

	public function html_topbar()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = array(
			'id' => $session_data['id'],
			'username' => $session_data['username'],
		);
		return $this->load->view('header_v', $data, true);
	}

	public function html_navigasi()
	{
		$session_data = $this->session->userdata('logged_in');
		$data = array(
			'id' => $session_data['id'],
			'username' => $session_data['username'],
			'role' => $session_data['role']
		);
		if ($session_data['role'] == 'Master' || $session_data['role'] == 'Super Admin') 
		{
			return $this->load->view('navigasi_v', $data, true);
		}
		elseif ($session_data['role'] == 'Admin')
		{
			return $this->load->view('navigasi_v1', $data, true);	
		}
		elseif ($session_data['role'] == 'Viewer')
		{
			return $this->load->view('navigasi_v2', $data, true);
		}
	}

	public function html_footer()
	{
		$data = array(//data
			);
		return $this->load->view('footer_v', $data, true);
	}
}
