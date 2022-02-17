<?php
class M_kategori extends CI_Model {
	public function get()
	{
		return $this->db->get('t_kategori');
	}

	public function add($data)
	{
		$this->db->insert('t_kategori',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_kategori',$id);
		return $this->db->get('t_kategori');
	}

	public function update($id,$data)
	{
		$this->db->where('id_kategori',$id);
		return $this->db->update('t_kategori',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_kategori',$id);
		return $this->db->delete('t_kategori');
	}

}
