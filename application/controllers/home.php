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

	public function adv_search()
	{
		if($this->session->userdata('logged_in'))
		{
			$match = array(
				'match1' => $this->input->post('txtidxarsip'),
				'match2' => $this->input->post('txtnmpekerjaan'),
				'match3' => $this->input->post('txttahun'),
				'match4' => $this->input->post('txtprovinsi'),
				'match5' => $this->input->post('txtnodok'),
				'match6' => $this->input->post('txtperihal'),
				'match7' => $this->input->post('txtasaldok'),
				'match8' => $this->input->post('txtlokasi'),
				'match9' => $this->input->post('txtgedung'),
			);			
			$session_data = $this->session->userdata('logged_in');
			$cari = $this->search_model->get_advsearch($match);
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

	public function test()
	{
		$this->load->view('file_view');
	}
}
