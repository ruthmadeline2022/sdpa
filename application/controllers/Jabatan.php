<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jabatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_jabatan');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['jabatan'] = $this->m_jabatan->get()->result_array();
		$this->template->load('index','jabatan/index',$data);
	}

	public function tambah()
	{
		$data['nama_jabatan'] = $this->input->post('nama_jabatan');
		$hasil = $this->m_jabatan->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('jabatan');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('jabatan');
		}
	}

	public function edit($id)
	{
		$data['jabatan'] = $this->m_jabatan->edit($id)->row();
		$this->template->load('index','jabatan/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_jabatan');
		$data['nama_jabatan'] = $this->input->post('nama_jabatan');
		$hasil = $this->m_jabatan->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('jabatan');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('jabatan');
		}
	}

	public function delete($id)
	{
		$hasil = $this->m_jabatan->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('jabatan');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('jabatan');
		}
	}

}
