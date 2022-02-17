<?php
class M_panitia extends CI_Model {
	public function get($id)
	{
		$this->db->order_by('a.nama_anggota','ASC');
        $this->db->where('p.id_tahun',$_SESSION['id_tahun']);
        $this->db->where('p.id_kegiatan',$id);
        $this->db->join('t_struktur as s','p.id_struktur=s.id_struktur');
        $this->db->join('t_kegiatan as k','p.id_kegiatan=k.id_kegiatan');
        $this->db->join('t_anggota as a','p.id_anggota=a.id_anggota');
		return $this->db->get('t_panitia as p');
	}

	public function get_anggota($id)
	{
		$this->db->order_by('a.nama_anggota','ASC');
		$this->db->where('p.id_tahun',$_SESSION['id_tahun']);
        $this->db->where('p.id_anggota',$id);
        $this->db->join('t_struktur as s','p.id_struktur=j.id_struktur');
        $this->db->join('t_kegiatan as k','p.id_kegiatan=j.id_kegiatan');
        $this->db->join('t_anggota as a','p.id_anggota=a.id_anggota');
		return $this->db->get('t_panitia as p');
    }
    
    public function get_new()
	{
        $this->db->order_by('s.id_struktur','ASC');
		return $this->db->get('t_struktur as s');
	}

	public function get_last($id)
	{
        $this->db->order_by('s.id_struktur','ASC');
		$this->db->where('s.id_struktur not in','(SELECT id_struktur FROM t_panitia where id_kegiatan = '.$id.')',false);
		return $this->db->get('t_struktur as s');
	}

	public function add($data)
	{
		$this->db->insert('t_panitia',$data);
	}

	public function edit($id)
	{
		$this->db->order_by('p.id_struktur','ASC');
        $this->db->where('p.id_panitia',$id);
        $this->db->join('t_struktur as s','p.id_struktur=s.id_struktur');
        $this->db->join('t_kegiatan as k','p.id_kegiatan=k.id_kegiatan');
        $this->db->join('t_anggota as a','p.id_anggota=a.id_anggota');
		return $this->db->get('t_panitia as p');
	}

	public function update($id,$data)
	{
		$this->db->where('id_panitia',$id);
		return $this->db->update('t_panitia',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_panitia',$id);
		return $this->db->delete('t_panitia');
	}

}
