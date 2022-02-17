<?php
class M_pengajuan extends CI_Model {

	public function get_by($id)
	{
		$this->db->order_by('p.id_pengajuan','ASC');
		$this->db->where('p.id_kegiatan',$id);
        $this->db->join('t_anggota as a','p.id_verifikasi=a.id_anggota');
        $this->db->join('t_kegiatan as k','p.id_kegiatan=k.id_kegiatan');
		return $this->db->get('t_pengajuan as p');
	}

	public function add($data)
	{
		$this->db->insert('t_pengajuan',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_pengajuan',$id);
		return $this->db->get('t_pengajuan');
	}

	public function update($id,$data)
	{
		$this->db->where('id_pengajuan',$id);
		return $this->db->update('t_pengajuan',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_pengajuan',$id);
		return $this->db->delete('t_pengajuan');
	}

}
