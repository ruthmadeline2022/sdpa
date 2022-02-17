<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_bidang');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['bidang'] = $this->m_bidang->get()->result_array();
		$this->template->load('index','bidang/index',$data);
	}

	public function tambah()
	{
		$data['mak_bidang'] = $this->input->post('mak_bidang');
		$data['nama_bidang'] = $this->input->post('nama_bidang');
		$data['tap_biaya'] = $this->input->post('tap_biaya');
		$data['id_tahun'] = $_SESSION['id_tahun'];
		$hasil = $this->m_bidang->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('bidang');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('bidang');
		}
	}

	public function edit($id)
	{
		$data['bidang'] = $this->m_bidang->edit($id)->row();
		$this->template->load('index','bidang/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_bidang');
		$data['mak_bidang'] = $this->input->post('mak_bidang');
		$data['nama_bidang'] = $this->input->post('nama_bidang');
		$data['tap_biaya'] = $this->input->post('tap_biaya');
		$hasil = $this->m_bidang->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('bidang');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('bidang');
		}
	}

	public function delete($id)
	{
		$hasil = $this->m_bidang->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('bidang');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('bidang');
		}
	}

}
