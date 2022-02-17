<?php
class M_anggota extends CI_Model {
	public function get()
	{
		$this->db->order_by('nama_anggota','ASC');
		return $this->db->get('t_anggota');
	}

	public function get_user()
	{
		$this->db->where('id_anggota not in','(select id_anggota from t_user)',false);
		$this->db->order_by('nama_anggota','ASC');
		return $this->db->get('t_anggota');
	}

	public function add($data)
	{
		$this->db->insert('t_anggota',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_anggota',$id);
		return $this->db->get('t_anggota');
	}

	public function update($id,$data)
	{
		$this->db->where('id_anggota',$id);
		return $this->db->update('t_anggota',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_anggota',$id);
		return $this->db->delete('t_anggota');
	}

}
