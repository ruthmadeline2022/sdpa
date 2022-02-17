<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_tahun');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['tahun'] = $this->m_tahun->get()->result_array();
		$this->template->load('index','tahun/index',$data);
	}

	public function tambah()
	{
		$data['nama_tahun'] = $this->input->post('nama_tahun');
		$hasil = $this->m_tahun->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('tahun');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('tahun');
		}
	}

	public function edit($id)
	{
		$data['tahun'] = $this->m_tahun->edit($id)->row();
		$this->template->load('index','tahun/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_tahun');
		$data['nama_tahun'] = $this->input->post('nama_tahun');
		$hasil = $this->m_tahun->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('tahun');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('tahun');
		}
	}

	public function delete($id)
	{
		$hasil = $this->m_tahun->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('tahun');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('tahun');
		}
	}

}
