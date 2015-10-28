<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input extends CI_Controller {

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
			$this->load->view('frmindex_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_input_index()
	{
		$dat = array(
			'index_arsip' => $this->input->post('txtidxarsip'),
			'judul' => $this->input->post('txtjudularsip'),
			'tgl_input' => $this->input->post('dtpinput'),
		);
		$this->input_model->add_index($dat);
		redirect('home');
	}

	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('login');
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

	public function input_pekerjaan()
	{
		if($this->session->userdata('logged_in'))
		{
			//query the database
   			$result = $this->input_model->get_index();
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'idx' => $result->result_array()
				);
			$this->load->view('frmpkrj_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_input_pekerjaan()
	{
		$dat = array(
			'kd_pekerjaan' => $this->input->post('txtkode'),
			'nm_pekerjaan' => $this->input->post('txtnamapkrj'),
			'unit' => $this->input->post('cbounit'),
			'tahun' => $this->input->post('txttahun'),
			'provinsi' => $this->input->post('txtprovinsi'),
			'kabupaten' => $this->input->post('txtkabupaten'),
			'kecamatan' => $this->input->post('txtkecamatan'),
			'desa' => $this->input->post('txtdesa'),
			'status' => $this->input->post('txtstatus'),
			'keterangan' => $this->input->post('txtket'),
			'index_arsip' => $this->input->post('cboidx'),
		);
		$this->input_model->add_pekerjaan($dat);
		redirect('home');
	}

	public function input_dok()
	{
		if($this->session->userdata('logged_in'))
		{
			//query the database
   			$result = $this->input_model->get_lokasi();
   			$result1 = $this->input_model->get_pekerjaan();
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'maps' => $result->result_array(),
				'pekerjaan' => $result1->result_array()
				);
			$this->load->view('frmdokumen_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_input_dok()
	{
		$nmdok = $this->input->post('txtperihal');
		$config = array(
			'upload_path' => "./assets/dokumen",
			'allowed_types' => "pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			//'max_height' => "1500",
			//'max_width' => "1500",
			'file_name' => $nmdok, 
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
		$res = $this->upload->data();
		//$data = array('upload_data' => $res);
		$dokumen = array(
			'no_dok' => $this->input->post('txtnodok'),
			'nm_dok' => $nmdok,
			'asal' => $this->input->post('txtasaldok'),
			'penerima' => $this->input->post('txtpenerimadok'),
			'kategori' => $this->input->post('txtkategori'),
			'sifat' => $this->input->post('txtsifatkep'),
			'versi' => $this->input->post('txtversi'),
			'tgl_dok' => $this->input->post('dtptgldok'),
			'tgl_terima' => $this->input->post('dtptglterima'),
			'kondisi' => $this->input->post('txtkondisidok'),
			'keterangan' => $this->input->post('txtket'),
			'kd_pekerjaan' => $this->input->post('cbopkj'),
			'kd_map' => $this->input->post('cbolok'),
		);
		$this->input_model->add_dokumen($dokumen);

		$lokasidok = array(
			'kd_lokasi' => '',
			'gedung' => $this->input->post('txtgedung'),
			'lantai' => $this->input->post('txtlantai'),
			'rak' => $this->input->post('txtrak'),
			'baris' => $this->input->post('txtbaris'),
			'kolom' => $this->input->post('txtkolom'),
			'file_path' => substr($res['full_path'], 25),
			'no_dok' => $this->input->post('txtnodok'),
		);
		$this->input_model->add_lokasi($lokasidok);

		redirect('home');
		//$this->load->view('upload_success',$data);
		}
		else
		{	
			echo "<script>alert('Gagal Menyimpan!!!')</script>";
			$this->input_dok();
		//$error = array('error' => $this->upload->display_errors());
		//$this->load->view('file_view', $error);
		}
	}
}
