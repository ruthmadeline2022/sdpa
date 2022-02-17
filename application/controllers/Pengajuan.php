<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_bidang');
		$this->load->model('m_program');
		$this->load->model('m_jabatan');
		$this->load->model('m_kegiatan');
		$this->load->model('m_anggota');
		$this->load->model('m_pengajuan');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['id_bidang'] = 0;
		$data['id_program'] = 0;
		$data['id_kegiatan'] = 0;
		$data['bidang'] = $this->m_bidang->get()->result_array();
		$data['kegiatan'] = $this->m_kegiatan->get()->result_array();
		$data['program'] = $this->m_program->get()->result_array();
		$this->template->load('index','pengajuan/index',$data);
	}

	public function filter($id=null,$id_program=null)
	{
		if($id==null){
			$id_bidang = $this->input->post('id_bidang');
			$id = $this->input->post('id_program');
		} else {
			$id_bidang =$id;
			$id =$id_program;
		}
		$data['id_bidang'] = $id_bidang;
		$data['id_program'] = $id;
		$data['bidang'] = $this->m_bidang->get()->result_array();
		$data['program'] = $this->m_program->get_by($id_bidang)->result_array();
		$data['det_program'] = $this->m_program->edit($id)->row();
		$data['kegiatan'] = $this->m_kegiatan->get_by($id)->result_array();
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','pengajuan/index',$data);
	}

	public function data($id)
	{
		$data['pengajuan'] = $this->m_pengajuan->get_by($id)->result_array();
		$data['kegiatan'] = $this->m_kegiatan->edit($id)->row();
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','pengajuan/data',$data);
	}

	public function tambah()
	{
		$id_kegiatan = $this->input->post('id_kegiatan');
		$data['id_kegiatan'] = $id_kegiatan;
		$data['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
		$data['tanggal_lpj'] = $this->input->post('tanggal_lpj');
		$data['id_verifikasi'] = $this->input->post('id_verifikasi');
		$data['status_pengajuan'] = 0;
		$data['tahap_pengajuan'] = 0;
		$hasil = $this->m_pengajuan->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('pengajuan/data/'.$id_kegiatan);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('pengajuan/data/'.$id_kegiatan);
		}
	}

	public function edit($id,$id_kegiatan)
	{
		$data['pengajuan'] = $this->m_pengajuan->edit($id)->row();
		$data['kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','pengajuan/edit',$data);
	}

	public function ttd($id)
	{
		$data['jabatan'] = $this->m_jabatan->get()->result_array();
		$data['pengajuan'] = $this->m_pengajuan->edit($id)->row();
		$this->template->load('index','pengajuan/ttd',$data);
	}

	public function update()
	{
		$id_kegiatan = $this->input->post('id_kegiatan');
		$id = $this->input->post('id_pengajuan');
		$data['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
		$data['tanggal_lpj'] = $this->input->post('tanggal_lpj');
		$data['id_verifikasi'] = $this->input->post('id_verifikasi');
		$hasil = $this->m_pengajuan->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('pengajuan/data/'.$id_kegiatan);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('pengajuan/data/'.$id_kegiatan);
		}
	}

	public function complete()
	{
		$id = $this->input->post('id_pengajuan');
		$data['tahap_pengajuan'] = 1;
		$hasil = $this->m_pengajuan->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Rincian Dalam Status Complete');
			redirect('rincian/data/'.$id);
		} else {
			$this->session->set_flashdata('alert','Gagal');
			redirect('rincian/data/'.$id_kegiatan);
		}
	}

	public function verifikasi()
	{
		$id = $this->input->post('id_pengajuan');
		$data['status_pengajuan'] = 1;
		$hasil = $this->m_pengajuan->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Pengajuan Sudah Diverifikasi');
			redirect('rincian/data/'.$id);
		} else {
			$this->session->set_flashdata('alert','Gagal');
			redirect('rincian/data/'.$id_kegiatan);
		}
	}

	public function delete($id,$id_kegiatan)
	{
		$hasil = $this->m_pengajuan->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('pengajuan/data/'.$id_kegiatan);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('pengajuan/data/'.$id_kegiatan);
		}
	}

}
