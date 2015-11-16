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
			$session_data = $this->session->userdata('logged_in');
			$dok = $this->arsip_model->get_dokumen($kd_pekerjaan)->row();
			$kdmap = $dok->kd_map;
			$pdfd = $dok->file_path;

			unlink($pdfd);
			
			$this->delete_model->delete_arsip($kd_pekerjaan, $kdmap);

			redirect('arsip');
		}
		else
		{
			redirect('login');
		}
	}

	public function edit_arsip($kode)
	{
		if($this->session->userdata('logged_in'))
		{	
			$arsip = $this->arsip_model->get_det_arsip($kode);	
			$indx = $this->input_model->get_index();
   			$pkj = $this->input_model->get_pekerjaan();
   			$dok = $this->arsip_model->get_dokumen($kode);
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'arsip' => $arsip->result_array(),
				'idx' => $indx->result_array(),
				'pekerjaan' => $pkj->result_array(),
				'dokumen' => $dok->result_array()				
				);
			$this->load->view('editarsip_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_edit_arsip()
	{
		$kode = $this->input->post('txtkode');
		$dat = array(
			'kd_pekerjaan' => $kode,
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
		$this->arsip_model->edit_arsip($kode, $dat);		
		redirect('arsip');
	}

	public function view_dok($kd)
	{
		if($this->session->userdata('logged_in'))
		{
			$dokumen = $this->arsip_model->get_dokumen_d($kd);
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),		
				'dokumen' => $dokumen->result_array()		
				);
			$this->load->view('detdok_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function edit_dok($kd)
	{
		if($this->session->userdata('logged_in'))
		{				
			$dokumen = $this->arsip_model->get_dokumen_d($kd);
			$session_data = $this->session->userdata('logged_in');
			$komponen = array(
				'topbar' => $this->html_topbar(),
				'navigasi' => $this->html_navigasi(),
				'footer' => $this->html_footer(),
				'dokumen' => $dokumen->result_array()							
				);
			$this->load->view('editdok_v', $komponen);
		}
		else
		{
			redirect('login');
		}
	}

	public function do_edit_dok()
	{
		$dokurl = $this->input->post('txturlfile');
		
		if ($_FILES['userfile']['size'] != 0)
		{		   
			unlink($dokurl);
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
			$this->upload->do_upload();
			$res = $this->upload->data();
			$dokurl = "assets/dokumen/".$res['file_name'];
		}
		
		$kd = $this->input->post('txtkdlok');
		$kode = $this->input->post('txtnodok');
		$dat = array(
			'tbl_lokasi.no_dok' => $kode,
			'tbl_dokumen.no_dok' => $kode,
			'nm_dok' => $this->input->post('txtperihal'),
			'asal' => $this->input->post('txtasaldok'),
			'penerima' => $this->input->post('txtpenerimadok'),
			'kategori' => $this->input->post('txtkategori'),
			'sifat' => $this->input->post('txtsifatkep'),
			'versi' => $this->input->post('txtversi'),
			'tgl_dok' => $this->input->post('dtptgldok'),
			'tgl_terima' => $this->input->post('dtptglterima'),
			'kondisi' => $this->input->post('txtkondisidok'),
			'keterangan' => $this->input->post('txtket'),
			'tbl_lokasi.file_path' => $dokurl
		);
		$this->arsip_model->edit_dok($kd, $dat);		
		redirect('arsip');
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
