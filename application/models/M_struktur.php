<?php
class M_struktur extends CI_Model {
	public function get()
	{
		return $this->db->get('t_struktur');
	}

	public function add($data)
	{
		$this->db->insert('t_struktur',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_struktur',$id);
		return $this->db->get('t_struktur');
	}

	public function update($id,$data)
	{
		$this->db->where('id_struktur',$id);
		return $this->db->update('t_struktur',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_struktur',$id);
		return $this->db->delete('t_struktur');
	}

}
