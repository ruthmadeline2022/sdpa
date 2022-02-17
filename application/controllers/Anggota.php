<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_anggota');
		$this->load->model('m_struktural');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','anggota/index',$data);
	}

	public function jabatan($id_jabatan)
	{
		$q = $this->m_struktural->get_jabatan($id_jabatan)->result_array();
		$data = "<option value=''> - Data Anggota- </option>";
		foreach ($q as $value) {
			$data .= "<option value='".$value['id_anggota']."'>".$value['nama_anggota']."</option>";
		}
		echo $data;
	}

	public function tambah()
	{
		$data['nbm_anggota'] = $this->input->post('nbm_anggota');
        $data['nama_anggota'] = $this->input->post('nama_anggota');
		$data['alamat'] = $this->input->post('alamat');
		$data['jenkel'] = $this->input->post('jenkel');
		$data['no_anggota'] = $this->input->post('no_anggota');
		$data['email'] = $this->input->post('email');
		$data['status_user'] = 0;
		$hasil = $this->m_anggota->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('anggota');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('anggota');
		}
	}

	public function edit($id)
	{
		$data['anggota'] = $this->m_anggota->edit($id)->row();
		$this->template->load('index','anggota/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_anggota');
		$data['nbm_anggota'] = $this->input->post('nbm_anggota');
		$data['nama_anggota'] = $this->input->post('nama_anggota');
        $data['alamat'] = $this->input->post('alamat');
		$data['jenkel'] = $this->input->post('jenkel');
		$data['no_anggota'] = $this->input->post('no_anggota');
		$data['email'] = $this->input->post('email');
		$hasil = $this->m_anggota->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('anggota');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('anggota');
		}
	}

	public function delete($id)
	{
		$hasil = $this->m_anggota->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('anggota');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('anggota');
		}
	}

}
