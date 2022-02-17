<?php
class M_level extends CI_Model {
	public function get()
	{
		return $this->db->get('t_level');
	}

	public function add($data)
	{
		$this->db->insert('t_level',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_level',$id);
		return $this->db->get('t_level');
	}

	public function update($id,$data)
	{
		$this->db->where('id_level',$id);
		return $this->db->update('t_level',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_level',$id);
		return $this->db->delete('t_level');
	}

}
