<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$result = $this->arsip_model->get_all_arsip();
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'arsip' => $result->result_array(),
				);
			$this->load->view('daftarsip_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function detail_arsip($kd_pekerjaan)
	{
		if($this->session->userdata('logged_in'))
		{
			$arsipz = $this->arsip_model->get_det_arsip($kd_pekerjaan);
			$dok = $this->arsip_model->get_dokumen($kd_pekerjaan);
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'detarsip' => $arsipz->result_array(),
				'dokumen' => $dok->result_array(),
				);
			$this->load->view('detarsip_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function delete_arsip($kd_pekerjaan)
	{
		if($this->session->userdata('logged_in'))
		{
			$dok = $this->arsip_model->get_dokumen($kd_pekerjaan)->row();
			$kdmap = $dok->kd_map;
			$session_data = $this->session->userdata('logged_in');
			
			$this->delete_model->delete_arsip($kd_pekerjaan, $kdmap);

			redirect('arsip');
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
