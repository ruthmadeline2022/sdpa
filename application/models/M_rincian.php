<?php
class M_rincian extends CI_Model {

	public function get_by($id)
	{
		$this->db->order_by('r.id_rincian','ASC');
        $this->db->where('r.id_pengajuan',$id);
        $this->db->join('t_pengajuan as p','r.id_pengajuan=p.id_pengajuan');
		return $this->db->get('t_rincian as r');
	}

	public function add($data)
	{
		$this->db->insert('t_rincian',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_rincian',$id);
		return $this->db->get('t_rincian');
	}

	public function update($id,$data)
	{
		$this->db->where('id_rincian',$id);
		return $this->db->update('t_rincian',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_rincian',$id);
		return $this->db->delete('t_rincian');
	}

}
