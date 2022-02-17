<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class program extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_program');
		$this->load->model('m_bidang');
		$this->load->model('m_anggota');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['id_bidang'] = 0;
		$data['bidang'] = $this->m_bidang->get()->result_array();
		$data['program'] = $this->m_program->get()->result_array();
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','program/index',$data);
	}

	public function filter($id=null)
	{
		if($id==null){
			$id = $this->input->post('id_bidang');
		} else {
			$id =$id;
		}
		$data['id_bidang'] = $id;
		$data['bidang'] = $this->m_bidang->get()->result_array();
		$data['det_bidang'] = $this->m_bidang->edit($id)->row();
		$data['program'] = $this->m_program->get_by($id)->result_array();
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','program/index',$data);
	}

	public function tambah()
	{
		$data['id_bidang'] = $this->input->post('id_bidang');
		$id = $data['id_bidang'];
		$data['mak_program'] = $this->input->post('mak_program');
		$data['nama_program'] = $this->input->post('nama_program');
		$data['tap_program'] = $this->input->post('tap_program');
		$data['id_anggota'] = $this->input->post('id_anggota');
		$hasil = $this->m_program->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('program/filter/'.$id);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('program/filter/'.$id);
		}
	}

	public function edit($id,$id_bidang)
	{
		$data['id_bidang'] = $id_bidang;
		$data['det_bidang'] = $this->m_bidang->edit($id_bidang)->row();
		$data['program'] = $this->m_program->edit($id)->row();
		$data['program_by'] = $this->m_program->get_by($id_bidang)->result_array();
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','program/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_program');
		$id_bidang = $this->input->post('id_bidang');
		$data['mak_program'] = $this->input->post('mak_program');
		$data['nama_program'] = $this->input->post('nama_program');
		$data['tap_program'] = $this->input->post('tap_program');
		$data['id_anggota'] = $this->input->post('id_anggota');
		$hasil = $this->m_program->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('program/filter/'.$id_bidang);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('program/filter/'.$id_bidang);
		}
	}

	public function delete($id,$id_bidang)
	{
		$hasil = $this->m_program->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('program/filter/'.$id_bidang);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('program/filter/'.$id_bidang);
		}
	}

}
