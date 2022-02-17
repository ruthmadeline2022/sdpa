<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_kategori');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['kategori'] = $this->m_kategori->get()->result_array();
		$this->template->load('index','kategori/index',$data);
	}

	public function tambah()
	{
		$data['nama_kategori'] = $this->input->post('nama_kategori');
		$data['kode_kategori'] = $this->input->post('kode_kategori');
		$hasil = $this->m_kategori->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('kategori');
		}
	}

	public function edit($id)
	{
		$data['kategori'] = $this->m_kategori->edit($id)->row();
		$this->template->load('index','kategori/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_kategori');
		$data['nama_kategori'] = $this->input->post('nama_kategori');
		$data['kode_kategori'] = $this->input->post('kode_kategori');
		$hasil = $this->m_kategori->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('kategori');
		}
	}

	public function delete($id)
	{
		$hasil = $this->m_kategori->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('kategori');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('kategori');
		}
	}

}
