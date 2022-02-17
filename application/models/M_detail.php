<?php
class M_detail extends CI_Model {
	public function get($id)
	{
        $this->db->where('d.id_kegiatan',$id);
		return $this->db->get('t_detail as d');
	}

	public function add($data)
	{
		$this->db->insert('t_detail',$data);
	}

	public function edit($id)
	{
        $this->db->where('d.id_detail',$id);
        $this->db->join('t_kegiatan as k','d.id_kegiatan=k.id_kegiatan');
        $this->db->join('t_program as p','k.id_program=p.id_program');
        $this->db->join('t_bidang as b','p.id_bidang=p.id_bidang');
		return $this->db->get('t_detail as d');
	}

	public function update($id,$data)
	{
		$this->db->where('id_detail',$id);
		return $this->db->update('t_detail',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_detail',$id);
		return $this->db->delete('t_detail');
	}

}
