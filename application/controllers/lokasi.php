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
			$this->load->view('lokarsip_v', $komponen);
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
			$dok = $this->arsip_model->get_det_lokasi($kd_lokasi)->row();
			$no_dok = $dok->no_dok;
			$session_data = $this->session->userdata('logged_in');
			
			$this->delete_model->delete_lokasi($kd_lokasi, $no_dok);

			redirect('lokasi');
		}
		else
		{
			redirect('login');
		}
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
		$data = array(//data
			);
		return $this->load->view('navigasi_v', $data, true);
	}

	public function html_footer()
	{
		$data = array(//data
			);
		return $this->load->view('footer_v', $data, true);
	}
}
