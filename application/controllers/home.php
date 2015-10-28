<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer()
				);
			$this->load->view('home_v', $komponen);
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

	public function search()
	{
		if($this->session->userdata('logged_in'))
		{
			$match = $this->input->post('txtsearch');
			$session_data = $this->session->userdata('logged_in');
			$cari = $this->search_model->get_search($match);
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'hasil' => $cari->result_array(),
				);
			$this->load->view('search_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}
}
