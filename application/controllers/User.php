<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
        $this->load->model('m_user');
		$this->load->model('m_level');
		$this->load->model('m_anggota');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['anggota'] = $this->m_anggota->get_user()->result_array();
        $data['level'] = $this->m_level->get()->result_array();
        $data['user'] = $this->m_user->get()->result_array();
		$this->template->load('index','user/index',$data);
	}

	public function add($id=null)
	{
		if($id==null){
			$data['id_anggota'] = $this->input->post('id_anggota'); 
		} else {
			$data['id_anggota'] = $id; 
		}
		$data['anggota'] = $this->m_anggota->edit($id)->row();
		$data['level'] = $this->m_level->get()->result_array();
		$this->template->load('index','user/add',$data);
	}

	public function tambah()
	{
		$id = $this->input->post('id_anggota');
        $data['username'] = $this->input->post('username');
        $data['password'] = md5($this->input->post('password'));
		$data['id_level'] = $this->input->post('id_level');
		$data['id_anggota'] = $id;

		$data1['status_user'] = 1;
		$this->m_anggota->update($id,$data1);

		$hasil = $this->m_user->add($data);
		if ($hasil == 0){
			$this->session->set_flashdata('alert','Tambah Data Berhasil');
			redirect('user');
		} else {
			$this->session->set_flashdata('alert','Tambah Data Gagal');
			redirect('user');
		}
	}

	public function edit($id)
	{
		$data['user'] = $this->m_user->edit($id)->row();
        $data['level'] = $this->m_level->get()->result_array();
		$this->template->load('index','user/edit',$data);
	}

	public function update()
	{
		$id = $this->input->post('id_user');
		$data['username'] = $this->input->post('username');
        $data['id_level'] = $this->input->post('id_level');
		$hasil = $this->m_user->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Data Berhasil');
			redirect('user');
		} else {
			$this->session->set_flashdata('alert','Update Data Gagal');
			redirect('user');
		}
    }
    
    public function chpassword()
	{
		$id = $this->input->post('id_user');
		$data['password'] = md5($this->input->post('pass_confirm'));
		$hasil = $this->m_user->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Password Berhasil');
			redirect('user');
		} else {
			$this->session->set_flashdata('alert','Update Password Gagal');
			redirect('user');
		}
	}

	public function ch_password()
	{
		$id = $this->input->post('id_user');
		$data['password'] = md5($this->input->post('pass_confirm'));
		$hasil = $this->m_user->update($id,$data);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Update Password Berhasil');
			redirect('login/logout');
		} else {
			$this->session->set_flashdata('alert','Update Password Gagal');
			redirect('login/logout');
		}
	}

	public function delete($id,$id_anggota)
	{
		$data['status_user'] = 0;
		$this->m_anggota->update($id_anggota,$data1);

		$hasil = $this->m_user->add($data);

		$hasil = $this->m_user->delete($id);
		if ($hasil != 0){
			$this->session->set_flashdata('alert','Hapus Data Berhasil');
			redirect('user');
		} else {
			$this->session->set_flashdata('alert','Hapus Data Gagal');
			redirect('user');
		}
	}

}
