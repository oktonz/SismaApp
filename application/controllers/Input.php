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
				'footer' => $this->html_footer(),
				'auto' => $this->autonumidx()
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
			'instansi' => $this->input->post('txtinstansi'),
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
				'idx' => $result->result_array(),
				'auto' => $this->autonumpkrj()
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
			'file_name' => $nmdok.date('d').date('i'), 
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
			'file_path' => "assets/dokumen/".$res['file_name'],
			'no_dok' => $this->input->post('txtnodok'),
			'kd_map' => $this->input->post('cbolok'),
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

	public function autonumidx() {
		return $this->input_model->autonum('tbl_index', 'index_arsip', 'IDX');
	}

	public function autonumpkrj() {
		return $this->input_model->autonum('tbl_pekerjaan', 'kd_pekerjaan', 'PKJ');
	}
}
