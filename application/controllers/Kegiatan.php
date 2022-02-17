<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_bidang');
		$this->load->model('m_program');
		$this->load->model('m_kegiatan');
		$this->load->model('m_panitia');
		$this->load->model('m_anggota');
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
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','kegiatan/index',$data);
	}

	public function program($id_bidang)
	{
		$q = $this->m_program->get_by($id_bidang)->result_array();
		$data = "<option value=''> - Data Program - </option>";
		foreach ($q as $value) {
			$data .= "<option value='".$value['id_program']."'>".$value['nama_program']." - [ Rp.".number_format($value['tap_program'],2,',','.')." ] </option>";
		}
		echo $data;
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
		$this->template->load('index','kegiatan/index',$data);
	}

	public function tambah()
	{
		$id_bidang = $this->input->post('id_bidang');
		$id_program = $this->input->post('id_program');
		$data['mak_kegiatan'] = $this->input->post('mak_kegiatan');
		$data['id_program'] = $this->input->post('id_program');
		$data['nama_kegiatan'] = $this->input->post('nama_kegiatan');
		$data['tap_kegiatan'] = $this->input->post('tap_kegiatan');
		$data['id_anggota'] = $this->input->post('id_anggota');
		$hasil = $this->m_kegiatan->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('kegiatan/filter/'.$id_bidang.'/'.$id_program);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('kegiatan/filter/'.$id_bidang.'/'.$id_program);
		}
	}

	public function edit($id_kegiatan,$id_bidang,$id_program)
	{
		$data['id_bidang'] = $id_bidang;
		$data['id_program'] = $id_program;
		$data['det_program'] = $this->m_program->edit($id_program)->row();
		$data['kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
		$data['kegiatan_by'] = $this->m_kegiatan->get_by($id_program)->result_array();
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','kegiatan/edit',$data);
	}

	public function update()
	{
		$id_bidang = $this->input->post('id_bidang');
		$id_program = $this->input->post('id_program');
		$id = $this->input->post('id_kegiatan');
		$id_kegiatan = $this->input->post('id_kegiatan');
		$data['mak_kegiatan'] = $this->input->post('mak_kegiatan');
		$data['nama_kegiatan'] = $this->input->post('nama_kegiatan');
		$data['tap_kegiatan'] = $this->input->post('tap_kegiatan');
		$data['id_anggota'] = $this->input->post('id_anggota');
		$hasil = $this->m_kegiatan->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('kegiatan/filter/'.$id_bidang.'/'.$id_program);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('kegiatan/filter/'.$id_bidang.'/'.$id_program);
		}
	}

	public function delete($id,$id_bidang,$id_program)
	{
		$hasil = $this->m_kegiatan->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('kegiatan/filter/'.$id_bidang.'/'.$id_program);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('kegiatan/filter/'.$id_bidang.'/'.$id_program);
		}
	}

}
