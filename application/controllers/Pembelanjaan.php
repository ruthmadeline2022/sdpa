<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelanjaan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
        $this->load->model('m_kegiatan');
        $this->load->model('m_anggota');
        $this->load->model('m_pengajuan');
        $this->load->model('m_pengeluaran');
        $this->load->model('m_rincian');
		$this->load->model('m_pembelanjaan');
		date_default_timezone_set('Asia/Jakarta');
    }
    
    public function add($id)
	{
		$data['pengeluaran'] = $this->m_pengeluaran->edit($id)->row();
        $id_kegiatan = $data['pengeluaran']->id_kegiatan;
        $id_pengajuan = $data['pengeluaran']->id_pengajuan;
        $data['pembelanjaan'] = $this->m_pembelanjaan->get_by($id)->result_array();
        $data['rincian'] = $this->m_rincian->get_by($id_pengajuan)->result_array();
		$data['kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
		$this->template->load('index','pembelanjaan/add',$data);
	}

	public function tambah()
	{
        $id = $this->input->post('id_pengajuan');
        $data['id_pengeluaran'] = $this->input->post('id_pengeluaran');
		$data['uraian_pembelanjaan'] = $this->input->post('uraian_pembelanjaan');
		$data['jumlah_pembelanjaan'] = $this->input->post('jumlah_pembelanjaan');
        $data['tanggal_pembelanjaan'] = $this->input->post('tanggal_pembelanjaan');
        $data['status_pembelanjaan'] = 0;
		$hasil = $this->m_pembelanjaan->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('pengeluaran/data/'.$id);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('pengeluaran/data/'.$id);
		}
	}

	public function edit($id,$id_pengajuan)
	{
        $data['id_pengajuan'] = $id_pengajuan;
        $data['pengajuan'] = $this->m_pengajuan->edit($id_pengajuan)->row();
        $data['rincian'] = $this->m_rincian->get_by($id_pengajuan)->result_array();
        $data['jum_pembelanjaan'] = $this->m_pembelanjaan->get_by($id)->result_array();
        $data['pembelanjaan'] = $this->m_pembelanjaan->edit($id)->row();
        $data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','pembelanjaan/edit',$data);
	}

	public function update()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');
		$id = $this->input->post('id_pembelanjaan');
		$data['uraian_pembelanjaan'] = $this->input->post('uraian_pembelanjaan');
		$data['jumlah_pembelanjaan'] = $this->input->post('jumlah_pembelanjaan');
		$hasil = $this->m_pembelanjaan->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('pengeluaran/data/'.$id_pengajuan);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('pengeluaran/data/'.$id_pengajuan);
		}
	}

	public function delete($id,$id_pengajuan)
	{
		$hasil = $this->m_pembelanjaan->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('pengeluaran/data/'.$id_pengajuan);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('pengeluaran/data/'.$id_pengajuan);
		}
	}

}
