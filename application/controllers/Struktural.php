<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktural extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_anggota');
		$this->load->model('m_jabatan');
		$this->load->model('m_struktural');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['struktural'] = $this->m_struktural->get()->result_array();
		$this->template->load('index','struktural/index',$data);
	}

	public function add()
	{
		$anggota = $this->m_struktural->count_anggota()->result_array();
		$count = COUNT($anggota);
		if ($count==0){
			$data['anggota'] = $this->m_struktural->get_new()->result_array();
		}  else {
			$data['anggota'] = $this->m_struktural->get_last()->result_array();
		}
		$data['jabatan'] = $this->m_jabatan->get()->result_array();
		$this->template->load('index','struktural/add',$data);
	}

	public function tambah()
	{
		$data = $this->input->post('data');
		foreach ($data as $d) {
			$d['id_tahun'] = $_SESSION['id_tahun'];
			$hasil = $this->m_struktural->add($d);		
		}
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('struktural');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('struktural');
		}
	}

	public function edit($id)
	{
		$data['struktural'] = $this->m_struktural->edit($id)->row();
		$id = $data['struktural']->id_anggota;
		$data['anggota'] = $this->m_anggota->edit($id)->row();
		$data['jabatan'] = $this->m_jabatan->get()->result_array();
		$this->template->load('index','struktural/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_anggota_jabatan');
		$data['id_jabatan'] = $this->input->post('id_jabatan');
		$hasil = $this->m_struktural->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('struktural');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('struktural');
		}
	}

	public function delete($id)
	{
		$hasil = $this->m_struktural->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('struktural');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('struktural');
		}
	}

}
