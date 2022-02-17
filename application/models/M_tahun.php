<?php
class M_tahun extends CI_Model {
	public function get()
	{
		$this->db->order_by('id_tahun','DESC');
		return $this->db->get('t_tahun');
	}

	public function add($data)
	{
		$this->db->insert('t_tahun',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_tahun',$id);
		return $this->db->get('t_tahun');
	}

	public function update($id,$data)
	{
		$this->db->where('id_tahun',$id);
		return $this->db->update('t_tahun',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_tahun',$id);
		return $this->db->delete('t_tahun');
	}

}
