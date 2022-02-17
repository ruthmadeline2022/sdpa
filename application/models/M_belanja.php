<?php
class M_belanja extends CI_Model {
	public function get($id)
	{
        $this->db->where('b.id_kegiatan',$id);
        $this->db->join('t_kegiatan as k','b.id_kegiatan=k.id_kegiatan');
        $this->db->join('t_kategori as kt','b.id_kategori=kt.id_kategori');
		return $this->db->get('t_belanja as b');
	}

	public function get_kategori($id,$id_kategori)
	{
		$this->db->where('b.id_kegiatan',$id);
		$this->db->where('b.id_kategori',$id_kategori);
        $this->db->join('t_kegiatan as k','b.id_kegiatan=k.id_kegiatan');
        $this->db->join('t_kategori as kt','b.id_kategori=kt.id_kategori');
		return $this->db->get('t_belanja as b');
	}

	public function add($data)
	{
		$this->db->insert('t_belanja',$data);
	}

	public function edit($id)
	{
        $this->db->where('b.id_belanja',$id);
        $this->db->join('t_kegiatan as k','b.id_kegiatan=k.id_kegiatan');
        $this->db->join('t_kategori as kt','b.id_kategori=kt.id_kategori');
		return $this->db->get('t_belanja as b');
	}

	public function update($id,$data)
	{
		$this->db->where('id_belanja',$id);
		return $this->db->update('t_belanja',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_belanja',$id);
		return $this->db->delete('t_belanja');
	}

}
