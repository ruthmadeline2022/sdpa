<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panitia extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
        $this->load->model('m_bidang');
        $this->load->model('m_anggota');
		$this->load->model('m_program');
		$this->load->model('m_kegiatan');
		$this->load->model('m_struktur');
		$this->load->model('m_panitia');
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
		$this->template->load('index','panitia/index',$data);
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
		$this->template->load('index','panitia/index',$data);
	}

	public function add($id_bidang,$id_program,$id)
	{
		$data['id_bidang'] = $id_bidang;
		$data['id_program'] = $id_program;
		$struktur = $this->m_panitia->get($id)->result_array();
		$count = COUNT($struktur);
		if ($count==0){
			$data['struktur'] = $this->m_panitia->get_new()->result_array();
		}  else {
			$data['struktur'] = $this->m_panitia->get_last($id)->result_array();
        }
        $data['id_kegiatan'] = $id;
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','panitia/add',$data);
	}

	public function tambah()
	{
		$id_bidang = $this->input->post('id_bidang');
		$id_program = $this->input->post('id_program');
		$id_kegiatan = $this->input->post('id_kegiatan');
		$data = $this->input->post('data');
		foreach ($data as $d) {
			$d['id_kegiatan'] = $id_kegiatan;
			$d['id_tahun'] = $_SESSION['id_tahun'];
			$hasil = $this->m_panitia->add($d);		
		}
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('panitia/filter/'.$id_bidang.'/'.$id_program);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('panitia/filter/'.$id_bidang.'/'.$id_program);
		}
	}

	public function edit($id_bidang,$id_program,$id)
	{
		$data['id_bidang'] = $id_bidang;
		$data['id_program'] = $id_program;
		$data['panitia'] = $this->m_panitia->edit($id)->row();
		$data['struktur'] = $this->m_struktur->get()->result_array();
		$this->template->load('index','panitia/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_panitia');
		$id_bidang = $this->input->post('id_bidang');
		$id_program = $this->input->post('id_program');
		$data['id_struktur'] = $this->input->post('id_struktur');
		$hasil = $this->m_panitia->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('panitia/filter/'.$id_bidang.'/'.$id_program);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('panitia/filter/'.$id_bidang.'/'.$id_program);
		}
	}

	public function delete($id_bidang,$id_program,$id)
	{
		$data['id_bidang'] = $id_bidang;
		$data['id_program'] = $id_program;
		$hasil = $this->m_panitia->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('panitia/filter/'.$id_bidang.'/'.$id_program);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('panitia/filter/'.$id_bidang.'/'.$id_program);
		}
	}

}
