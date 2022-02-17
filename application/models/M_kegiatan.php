<?php
class M_kegiatan extends CI_Model {
	public function get()
	{
		$this->db->join('t_program as p','k.id_program=p.id_program');
		$this->db->join('t_bidang as b','p.id_bidang=b.id_bidang');
		return $this->db->get('t_kegiatan as k');
	}

	public function get_by($id)
	{
		$this->db->order_by('k.mak_kegiatan','ASC');
		$this->db->where('k.id_program',$id);
		$this->db->join('t_anggota as a','k.id_anggota=a.id_anggota');
		// $this->db->join('t_program as p','k.id_program=p.id_program');
		// $this->db->join('t_bidang as b','p.id_bidang=b.id_bidang');
		return $this->db->get('t_kegiatan as k');
	}

	public function add($data)
	{
		$this->db->insert('t_kegiatan',$data);
	}

	public function edit($id)
	{
		$this->db->where('k.id_kegiatan',$id);
		$this->db->join('t_program as p','k.id_program=p.id_program');
		$this->db->join('t_bidang as b','p.id_bidang=b.id_bidang');
		$this->db->join('t_anggota as a','k.id_anggota=a.id_anggota');
		return $this->db->get('t_kegiatan as k');
	}

	public function update($id,$data)
	{
		$this->db->where('id_kegiatan',$id);
		return $this->db->update('t_kegiatan',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_kegiatan',$id);
		return $this->db->delete('t_kegiatan');
	}

}
