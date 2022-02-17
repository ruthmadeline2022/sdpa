<?php
class M_pengeluaran extends CI_Model {

	public function get_by($id)
	{
        $this->db->where('p.id_pengajuan',$id);
        $this->db->join('t_kegiatan as t','p.id_kegiatan=t.id_kegiatan');
        $this->db->join('t_anggota as a','p.id_verifikator=a.id_anggota');
        $this->db->join('t_pengajuan as pj','p.id_pengajuan=pj.id_pengajuan');
		return $this->db->get('t_pengeluaran as p');
	}

	public function add($data)
	{
		$this->db->insert('t_pengeluaran',$data);
	}

	public function edit($id)
	{
        $this->db->where('p.id_pengeluaran',$id);
        $this->db->join('t_kegiatan as t','p.id_kegiatan=t.id_kegiatan');
        $this->db->join('t_anggota as a','p.id_verifikator=a.id_anggota');
        $this->db->join('t_pengajuan as pj','p.id_pengajuan=pj.id_pengajuan');
		return $this->db->get('t_pengeluaran as p');
	}

	public function update($id,$data)
	{
		$this->db->where('id_pengeluaran',$id);
		return $this->db->update('t_pengeluaran',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_pengeluaran',$id);
		return $this->db->delete('t_pengeluaran');
	}

}
