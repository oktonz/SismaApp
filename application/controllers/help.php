<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Help extends CI_Controller {

	public function manual()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer()
				);
			$this->load->view('manual_v', $komponen);
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
}
