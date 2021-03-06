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

	public function add_users()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				);
			$this->load->view('addusers_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_add_users()
	{
		if($this->session->userdata('logged_in'))
		{
			$dat = array(
			'nama' => $this->input->post('txtnama'),
			'alamat' => $this->input->post('txtalamat'),
			'email' => $this->input->post('txtemail'),
			'nohp' => $this->input->post('txtnohp'),
			'tpt_lahir' => $this->input->post('txttempatlahir'),
			'tgl_lahir' => $this->input->post('dtptgllahir'),
			'username' => $this->input->post('txtusername'),
			'password' => md5($this->input->post('txtpassword')),
			'role' => $this->input->post('cborole'),
			);
			$this->users_model->insert_users($dat);
			redirect('users');
		}
		else
		{
			redirect('login');
		}
	}

	public function edit_user($id)
	{
		if($this->session->userdata('logged_in'))
		{	
			$result = $this->users_model->get_users($id);
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'user' => $result->result_array()
				);
			$this->load->view('editusers_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_edit_users()
	{
		if($this->session->userdata('logged_in'))
		{
			$id = $this->input->post('hid');
			$dat = array(
			'nama' => $this->input->post('txtnama'),
			'alamat' => $this->input->post('txtalamat'),
			'nohp' => $this->input->post('txtnohp'),
			'tpt_lahir' => $this->input->post('txttempatlahir'),
			'tgl_lahir' => $this->input->post('dtptgllahir'),
			'username' => $this->input->post('txtusername'),
			//'password' => md5($this->input->post('txtpassword')),
			'role' => $this->input->post('cborole'),
			);
			$this->users_model->edit_users($id, $dat);
			redirect('users');
		}
		else
		{
			redirect('login');
		}
	}

	public function detuser($id)
	{
		if($this->session->userdata('logged_in'))
		{	
			$result = $this->users_model->get_users($id);
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'users' => $result->result_array()
				);
			$this->load->view('detusers_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function del_user($id)
	{
		if($this->session->userdata('logged_in'))
		{
			$result = $this->users_model->get_users($id)->row();
			$this->delete_model->delete_user($id);

			redirect('users');
		}
		else
		{
			redirect('login');
		}
	}

	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   $this->session->sess_destroy();
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

	public function change_pass()
	{
		if($this->session->userdata('logged_in'))
		{	
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				);
			$this->load->view('ubahpass_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_change_pass()
	{
		$session_data = $this->session->userdata('logged_in');
		$oldpas = $this->input->post('txtoldpas');
		$newpas1 = $this->input->post('txtnewpas1');
		$newpas2 = $this->input->post('txtnewpas2');

		$res = $this->login_model->password($oldpas);

		if ($res) {
			if ($newpas1 == $newpas2) {
				$this->login_model->update_pass(MD5($newpas1), $session_data['username']);
				redirect('home');
			}
			else {
			redirect('users/change_pass');
			}
		}
		else {
			redirect('users/change_pass');
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
