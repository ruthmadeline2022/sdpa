<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_login');
		$this->load->model('m_tahun');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['tahun'] = $this->m_tahun->get()->result_array();
		$this->load->view('login',$data);
	}

	public function proses()
	{
		$data['username'] = $this->input->post('username',TRUE);
		$data['password'] = md5($this->input->post('password',TRUE));
		$hasil = $this->m_login->login($data);
		if (count($hasil->result()) == 1){
			foreach ($hasil->result() as $h) {
				$h_data['logged_id'] = 'Sudah Login';
				$h_data['username'] = $h->username;
				$h_data['password'] = $h->password;
				$h_data['id_user'] = $h->id_user;
				$h_data['id_anggota'] = $h->id_anggota;
				$h_data['id_level'] = $h->id_level;
				$h_data['id_tahun'] = $this->input->post('tahun');
				$this->session->set_userdata($h_data);
			}
			redirect('home');
		} else {
			$this->session->set_flashdata('alert','Maaf Username atau password anda salah');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->userdata('username');
		$this->session->userdata('status');
		session_destroy();
		redirect('login');
	}
}
