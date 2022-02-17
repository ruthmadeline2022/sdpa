<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
				$this->load->library('template');
				$this->load->model('m_anggota');
        $this->load->model('m_bidang');
				$this->load->model('m_program');
				$this->load->model('m_kategori');
        $this->load->model('m_kegiatan');
				$this->load->model('m_tahun');
				$this->load->model('m_detail');
				$this->load->model('m_belanja');
				$this->load->model('m_struktural');
				$this->load->model('m_pengajuan');
				$this->load->model('m_rincian');
				$this->load->model('m_pengeluaran');
				$this->load->model('m_pembelanjaan');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function bidang()
	{
		$id = $this->input->post('anggota');
		$data['struktural'] = $this->m_struktural->get_anggota($id)->row();
    $data['bidang'] = $this->m_bidang->get()->result_array();
    $data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
		$this->load->view('laporan/bidang',$data);
  }
    
  public function panitia_kegiatan()
	{
		$this->load->view('laporan/index');
  }
    
  public function panitia_nama()
	{
		$this->load->view('laporan/index');
  }
    
  public function dokumen_pa()
	{
		$id = $this->input->post('id_kegiatan');
		$data['id_kegiatan'] = $id;

		$id_anggota1 = $this->input->post('id_anggota1');
		$data['struktural1'] = $this->m_struktural->get_anggota($id_anggota1)->row();

		$id_anggota2 = $this->input->post('id_anggota2');
		$data['struktural2'] = $this->m_struktural->get_anggota($id_anggota2)->row();

		$id_anggota3 = $this->input->post('id_anggota3');
		$data['struktural3'] = $this->m_struktural->get_anggota($id_anggota3)->row();

		$id_anggota4 = $this->input->post('id_anggota4');
		$data['struktural4'] = $this->m_struktural->get_anggota($id_anggota4)->row();

		$data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
		$data['kategori'] = $this->m_kategori->get()->result_array();
		$data['detail'] = $this->m_detail->get($id)->row();
		$data['kegiatan'] = $this->m_kegiatan->edit($id)->row();
		$data['belanja'] = $this->m_belanja->get($id)->result_array();
		$this->load->view('laporan/dokumen_pa',$data);
	}

	public function pengajuan()
	{
		$id = $this->input->post('id_pengajuan');

		$id_anggota1 = $this->input->post('id_anggota1');
		$data['struktural1'] = $this->m_struktural->get_anggota($id_anggota1)->row();

		$id_anggota2 = $this->input->post('id_anggota2');
		$data['struktural2'] = $this->m_struktural->get_anggota($id_anggota2)->row();

		$id_anggota3 = $this->input->post('id_anggota3');
		$data['struktural3'] = $this->m_struktural->get_anggota($id_anggota3)->row();

		$id_anggota4 = $this->input->post('id_anggota4');
		$data['struktural4'] = $this->m_struktural->get_anggota($id_anggota4)->row();

		$data['pengajuan'] = $this->m_pengajuan->edit($id)->row();
		$id_kegiatan = $data['pengajuan']->id_kegiatan;
		$data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
		$data['kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
		$data['rincian'] = $this->m_rincian->get_by($id)->result_array();
		$this->load->view('laporan/pengajuan',$data);
	}

	public function pengeluaranBukti()
	{
		$id = $this->input->post('id_pengeluaran');

		$id_anggota1 = $this->input->post('id_anggota1');
		$data['struktural1'] = $this->m_struktural->get_anggota($id_anggota1)->row();

		$id_anggota2 = $this->input->post('id_anggota2');
		$data['struktural2'] = $this->m_struktural->get_anggota($id_anggota2)->row();

		$id_anggota3 = $this->input->post('id_anggota3');
		$data['struktural3'] = $this->m_struktural->get_anggota($id_anggota3)->row();

		$data['pengeluaran'] = $this->m_pengeluaran->edit($id)->row();
		$id_pengajuan = $data['pengeluaran']->id_pengajuan;

		$data['pengajuan'] = $this->m_pengajuan->edit($id_pengajuan)->row();
		$id_kegiatan = $data['pengajuan']->id_kegiatan;

		$data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
		$data['kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
		$data['pembelanjaan'] = $this->m_pembelanjaan->get_by($id)->result_array();
		$this->load->view('laporan/pengeluaranBukti',$data);
	}

	public function pengeluaranLembar($id)
	{
		$data['pengeluaran'] = $this->m_pengeluaran->edit($id)->row();
		$id_pengajuan = $data['pengeluaran']->id_pengajuan;

		$data['pengajuan'] = $this->m_pengajuan->edit($id_pengajuan)->row();
		$id_kegiatan = $data['pengajuan']->id_kegiatan;

		$data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
		$data['pembelanjaan'] = $this->m_pembelanjaan->get_by($id)->result_array();
		$this->load->view('laporan/pengeluaranLembar',$data);
	}

	public function belanja()
	{
		$tgl_sekarang = date('Y-m');
		$tgl_bulan_lalu = date('Y-m', strtotime('-1 month', strtotime($tgl_sekarang)));
		$data['lalu']=$tgl_bulan_lalu.'-31';
		$data['sekarang']=$tgl_sekarang.'-31';
		$data['bulan']=$tgl_sekarang;

		$data['bidang'] = $this->m_bidang->get()->result_array();
    	$data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
		$this->load->view('laporan/belanja',$data);
	}

	// public function belanja_bln()
	// {
	// 	$tgl_sekarang = date('Y-m');
	// 	$tgl_bulan_lalu = date('Y-m', strtotime('-1 month', strtotime($tgl_sekarang)));
	// 	$data['lalu']=$tgl_bulan_lalu;
	// 	$data['sekarang']=$tgl_sekarang;

	// 	$data['bidang'] = $this->m_bidang->get()->result_array();
    // $data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
	// 	$this->load->view('laporan/belanja_bln',$data);
	// }

	public function panitia()
	{
		$data['anggota'] = $this->m_anggota->get()->result_array();
    $data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
		$this->load->view('laporan/panitia',$data);
	}

	public function kategori()
	{
		$data['kategori'] = $this->m_kategori->get()->result_array();
		$this->template->load('index','laporan/daftar_kategori',$data);
	}

	public function ctk_kategori($id)
	{
		$data['kategori'] = $this->m_kategori->edit($id)->row();
		$data['tahun'] = $this->m_tahun->edit($_SESSION['id_tahun'])->row();
		$data['bidang'] = $this->m_bidang->get()->result_array();
		$this->load->view('laporan/kategori',$data);
	}



}
