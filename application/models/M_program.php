<?php
class M_program extends CI_Model {
	public function get()
	{
		
		$this->db->join('t_bidang as b','p.id_bidang=b.id_bidang');
		return $this->db->get('t_program as p');
	}

	public function get_by($id)
	{
		$this->db->order_by('p.mak_program','ASC');
		$this->db->where('p.id_bidang',$id);
		$this->db->join('t_anggota as a','p.id_anggota=a.id_anggota');
		$this->db->join('t_bidang as b','p.id_bidang=b.id_bidang');
		return $this->db->get('t_program as p');
	}

	public function add($data)
	{
		$this->db->insert('t_program',$data);
	}

	public function edit($id)
	{
		$this->db->join('t_bidang as b','p.id_bidang=b.id_bidang');
		$this->db->where('id_program',$id);
		return $this->db->get('t_program as p');
	}

	public function update($id,$data)
	{
		$this->db->where('id_program',$id);
		return $this->db->update('t_program',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_program',$id);
		return $this->db->delete('t_program');
	}

}
