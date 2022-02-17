<?php
class M_user extends CI_Model {
	public function get()
	{
		$this->db->join('t_anggota as a','u.id_anggota=a.id_anggota');
        $this->db->join('t_level as l','u.id_level=l.id_level');
		return $this->db->get('t_user as u');
	}

	public function add($data)
	{
		$this->db->insert('t_user',$data);
	}

	public function edit($id)
	{
		$this->db->where('u.id_user',$id);
		$this->db->join('t_anggota as a','u.id_anggota=a.id_anggota');
        $this->db->join('t_level as l','u.id_level=l.id_level');
		return $this->db->get('t_user as u');
	}

	public function update($id,$data)
	{
		$this->db->where('id_user',$id);
		return $this->db->update('t_user',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_user',$id);
		return $this->db->delete('t_user');
	}

}
