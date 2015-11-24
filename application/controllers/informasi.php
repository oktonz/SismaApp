<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$direktori = 'assets/dokumen';
			//count how many file
			$fi = new FilesystemIterator($direktori, FilesystemIterator::SKIP_DOTS);
			$fi = iterator_count($fi);
			//----------------------------------------------------
			//jlh kabupaten
			$kab = $this->input_model->get_lokasi();
			
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'jlh_file' => $fi,
				'ukuran' => $this->filesize_r($direktori),
				'jlh_kab' => $kab->num_rows(),
				'jlh_aset' => $this->input_model->tot_aset()->row()
				);
			$this->load->view('info_v', $komponen);
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

	function filesize_r($path)
	{
	  if(!file_exists($path)) return 0;
	  if(is_file($path)) return filesize($path);
	  $ret = 0;
	  foreach(glob($path."/*") as $fn)
	    $ret += $this->filesize_r($fn);
	  return $ret;
	}
}
