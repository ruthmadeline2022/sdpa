<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rincian extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_kegiatan');
        $this->load->model('m_pengajuan');
		$this->load->model('m_rincian');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function data($id)
	{
        $data['pengajuan'] = $this->m_pengajuan->edit($id)->row();
        $id_kegiatan = $data['pengajuan']->id_kegiatan;
		$data['rincian'] = $this->m_rincian->get_by($id)->result_array();
		$data['kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
		$this->template->load('index','rincian/data',$data);
	}

	public function tambah()
	{
        $id = $this->input->post('id_pengajuan');
		$data['id_pengajuan'] = $id;
		$data['uraian_rincian'] = $this->input->post('uraian_rincian');
		$data['jumlah_rincian'] = $this->input->post('jumlah_rincian');
		$data['tanggal_rincian'] = date('Y-m-d');
		$hasil = $this->m_rincian->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('rincian/data/'.$id);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('rincian/data/'.$id);
		}
	}

	public function edit($id,$id_kegiatan)
	{
		$data['det_rincian'] = $this->m_rincian->edit($id)->row();
		$id_pengajuan = $data['det_rincian']->id_pengajuan;
		$data['rincian'] = $this->m_rincian->get_by($id_pengajuan)->result_array();
		$data['det_kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
		$this->template->load('index','rincian/edit',$data);
	}

	public function update()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');
		$id = $this->input->post('id_rincian');
		$data['uraian_rincian'] = $this->input->post('uraian_rincian');
		$data['jumlah_rincian'] = $this->input->post('jumlah_rincian');
		$hasil = $this->m_rincian->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('rincian/data/'.$id_pengajuan);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('rincian/data/'.$id_pengajuan);
		}
	}

	public function delete($id,$id_pengajuan)
	{
		$hasil = $this->m_rincian->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('rincian/data/'.$id_pengajuan);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('rincian/data/'.$id_pengajuan);
		}
	}

}
