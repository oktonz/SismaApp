<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			redirect('home');	
		}
		else
		{
			$this->load->view('login_v');
		}
	}
}
