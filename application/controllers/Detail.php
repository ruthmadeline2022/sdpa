<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detail extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_detail');
		$this->load->model('m_belanja');
		$this->load->model('m_kategori');
		$this->load->model('m_kegiatan');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function data($id)
	{
		$data['id_kegiatan'] = $id;
		$data['kategori'] = $this->m_kategori->get()->result_array();
		$data['detail'] = $this->m_detail->get($id)->row();
		$data['kegiatan'] = $this->m_kegiatan->edit($id)->row();
		$data['belanja'] = $this->m_belanja->get($id)->result_array();
		$this->template->load('index','detail/index',$data);
	}

	public function add($id)
	{
		$data['id_kegiatan'] = $id;
		$data['kegiatan'] = $this->m_kegiatan->edit($id)->row();
		$this->template->load('index','detail/add',$data);
	}

	public function tambah()
	{
		$id_kegiatan = $this->input->post('id_kegiatan');
		$data['id_kegiatan'] = $id_kegiatan;
        $data['pelaksana'] = $this->input->post('pelaksana');
        $data['sasaran'] = $this->input->post('sasaran');
        $data['lokasi'] = $this->input->post('lokasi');
		$data['capaian'] = $this->input->post('capaian');
		$data['target_capaian'] = $this->input->post('target_capaian');
		$data['sumber_dana'] = $this->input->post('sumber_dana');
		$data['tenaga'] = $this->input->post('tenaga');
		$data['waktu'] = $this->input->post('waktu');
        $data['keluaran'] = $this->input->post('keluaran');
		$hasil = $this->m_detail->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('detail/data/'.$id_kegiatan);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('detail/data/'.$id_kegiatan);
		}
	}

	public function edit($id)
	{
		$data['id_kegiatan'] = $id;
		$data['detail'] = $this->m_detail->get($id)->row();
		$data['kegiatan'] = $this->m_kegiatan->edit($id)->row();
		$this->template->load('index','detail/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_detail');
		$id_kegiatan = $this->input->post('id_kegiatan');
		$data['pelaksana'] = $this->input->post('pelaksana');
        $data['sasaran'] = $this->input->post('sasaran');
        $data['lokasi'] = $this->input->post('lokasi');
		$data['capaian'] = $this->input->post('capaian');
		$data['target_capaian'] = $this->input->post('target_capaian');
		$data['sumber_dana'] = $this->input->post('sumber_dana');
		$data['tenaga'] = $this->input->post('tenaga');
		$data['waktu'] = $this->input->post('waktu');
        $data['keluaran'] = $this->input->post('keluaran');
		$hasil = $this->m_detail->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('detail/data/'.$id_kegiatan);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('detail/data/'.$id_kegiatan);
		}
	}

	public function delete($id)
	{
		$hasil = $this->m_detail->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('detail');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('detail');
		}
	}

}
