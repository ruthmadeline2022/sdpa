<?php
class M_login extends CI_Model {
	public function login($data)
	{
		$this->db->where('username',$data['username']);
		$this->db->where('password',$data['password']);
		return $this->db->get('t_user');
	}

}
