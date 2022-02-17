<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class struktur extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_struktur');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['struktur'] = $this->m_struktur->get()->result_array();
		$this->template->load('index','struktur/index',$data);
	}

	public function tambah()
	{
        $data['nama_struktur'] = $this->input->post('nama_struktur');
        $data['deskripsi'] = $this->input->post('deskripsi');
		$hasil = $this->m_struktur->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('struktur');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('struktur');
		}
	}

	public function edit($id)
	{
		$data['struktur'] = $this->m_struktur->edit($id)->row();
		$this->template->load('index','struktur/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_struktur');
        $data['nama_struktur'] = $this->input->post('nama_struktur');
        $data['deskripsi'] = $this->input->post('deskripsi');
		$hasil = $this->m_struktur->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('struktur');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('struktur');
		}
	}

	public function delete($id)
	{
		$hasil = $this->m_struktur->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('struktur');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('struktur');
		}
	}

}
