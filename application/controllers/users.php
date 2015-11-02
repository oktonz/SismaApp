<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$result = $this->users_model->get_allusers();
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'dafusers' => $result->result_array()
				);
			$this->load->view('frmusers_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login');
	}

	public function profile($id)
	{
		if($this->session->userdata('logged_in'))
		{	
			$result = $this->users_model->get_users($id);
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'usernow' => $result->result_array()
				);
			$this->load->view('profil_v', $komponen);
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
		if ($session_data['role'] != 'Master') {
			return $this->load->view('navigasi_v1', $data, true);
		}
		else
		{
			return $this->load->view('navigasi_v', $data, true);	
		}
	}

	public function html_footer()
	{
		$data = array(//data
			);
		return $this->load->view('footer_v', $data, true);
	}
}
