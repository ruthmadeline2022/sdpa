<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
        $this->load->model('m_belanja');
        $this->load->model('m_kegiatan');
        $this->load->model('m_kategori');
		date_default_timezone_set('Asia/Jakarta');
    }
    
	public function tambah()
	{
		$id_kegiatan = $this->input->post('id_kegiatan');
		$data['id_kegiatan'] = $id_kegiatan;
        $data['belanja'] = $this->input->post('belanja');
        $data['volume'] = $this->input->post('volume');
        $data['satuan'] = $this->input->post('satuan');
        $data['harga'] = $this->input->post('harga');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['id_kategori'] = $this->input->post('id_kategori');
		$hasil = $this->m_belanja->add($data);
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
		
        $data['belanja'] = $this->m_belanja->edit($id)->row();
		$data['belanja_by'] = $this->m_belanja->get($id)->result_array();
		$data['id_kegiatan'] = $data['belanja']->id_kegiatan;
		$data['kegiatan'] = $this->m_kegiatan->edit($data['id_kegiatan'])->row();
        $data['kategori'] = $this->m_kategori->get()->result_array();
		$this->template->load('index','belanja/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_belanja');
		$id_kegiatan = $this->input->post('id_kegiatan');
        $data['belanja'] = $this->input->post('belanja');
        $data['volume'] = $this->input->post('volume');
        $data['satuan'] = $this->input->post('satuan');
        $data['harga'] = $this->input->post('harga');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['id_kategori'] = $this->input->post('id_kategori');
		$hasil = $this->m_belanja->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('detail/data/'.$id_kegiatan);
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('detail/data/'.$id_kegiatan);
		}
	}

	public function delete($id,$id_kegiatan)
	{
		$hasil = $this->m_belanja->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('detail/data/'.$id_kegiatan);
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('detail/data/'.$id_kegiatan);
		}
	}

}
