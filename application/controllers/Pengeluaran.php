<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
        $this->load->model('m_kegiatan');
        $this->load->model('m_rincian');
        $this->load->model('m_pengajuan');
        $this->load->model('m_pengeluaran');
        $this->load->model('m_pembelanjaan');
		$this->load->model('m_anggota');
		$this->load->model('m_jabatan');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function data($id)
	{
        $data['pengeluaran'] = $this->m_pengeluaran->get_by($id)->row();
        if(COUNT($data['pengeluaran'])!=0) {
            $id_pengeluaran = $data['pengeluaran']->id_pengeluaran;
        } else {
            $id_pengeluaran =0;
        }
        
        $data['pembelanjaan'] = $this->m_pembelanjaan->get_by($id_pengeluaran)->result_array();
        $data['pengajuan'] = $this->m_pengajuan->edit($id)->row();
        $id_kegiatan = $data['pengajuan']->id_kegiatan;
        $data['rincian'] = $this->m_rincian->get_by($id)->result_array();
		$data['kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
		$data['jabatan'] = $this->m_jabatan->get()->result_array();
		$this->template->load('index','pengeluaran/data',$data);
    }
    
    public function add($id)
	{
        $data['pengajuan'] = $this->m_pengajuan->edit($id)->row();
        $id_kegiatan = $data['pengajuan']->id_kegiatan;
        $data['kegiatan'] = $this->m_kegiatan->edit($id_kegiatan)->row();
        $data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','pengeluaran/add',$data);
	}

	public function tambah()
	{
		$id = $this->input->post('id_pengajuan');
		$data['id_pengajuan'] = $id;
		$data['id_kegiatan'] = $this->input->post('id_kegiatan');
        $data['no_kk'] = $this->input->post('no_kk');
        $data['tanggal_pengeluaran'] = $this->input->post('tanggal_pengeluaran');
		$data['id_verifikator'] = $this->input->post('id_verifikator');
		$data['tahap_pengeluaran'] = 0;
		$hasil = $this->m_pengeluaran->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('pengeluaran/data/'.$id);
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('pengeluaran/data/'.$id);
		}
	}

	public function edit($id)
	{
        $data['pengeluaran'] = $this->m_pengeluaran->edit($id)->row();
        $data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','pengeluaran/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_pengajuan');
		$id_pengeluaran = $this->input->post('id_pengeluaran');
        $data['no_kk'] = $this->input->post('no_kk');
        $data['tanggal_pengeluaran'] = $this->input->post('tanggal_pengeluaran');
		$data['id_verifikator'] = $this->input->post('id_verifikator');
		$hasil = $this->m_pengeluaran->update($id_pengeluaran,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('pengeluaran/data/'.$id);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('pengeluaran/data/'.$id);
		}
	}

	public function complete()
	{
		$id = $this->input->post('id_pengajuan');
		$id_pengeluaran = $this->input->post('id_pengeluaran');
		$data['tahap_pengeluaran'] = 1;
		$hasil = $this->m_pengeluaran->update($id_pengeluaran,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Data Pengeluaran Dalam Status Complete');
			redirect('pengeluaran/data/'.$id);
		} else {
			$this->session->set_flashdata('alert','Gagal');
			redirect('pengeluaran/data/'.$id);
		}
	}

}
