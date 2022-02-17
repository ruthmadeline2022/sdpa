<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('m_bidang');
		$this->load->model('m_program');
		$this->load->model('m_anggota');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['bidang'] = $this->m_bidang->get()->result_array();
		$data['program'] = $this->m_program->get()->result_array();
		$data['anggota'] = $this->m_anggota->get()->result_array();
		$this->template->load('index','dashboard',$data);
	}
}
