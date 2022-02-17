<?php
class M_jabatan extends CI_Model {
	public function get()
	{
		return $this->db->get('t_jabatan');
	}

	public function add($data)
	{
		$this->db->insert('t_jabatan',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_jabatan',$id);
		return $this->db->get('t_jabatan');
	}

	public function update($id,$data)
	{
		$this->db->where('id_jabatan',$id);
		return $this->db->update('t_jabatan',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_jabatan',$id);
		return $this->db->delete('t_jabatan');
	}

}
