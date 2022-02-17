<?php
class M_struktural extends CI_Model {
	public function get()
	{
        $this->db->where('aj.id_tahun',$_SESSION['id_tahun']);
        $this->db->join('t_jabatan as j','aj.id_jabatan=j.id_jabatan');
        $this->db->join('t_anggota as a','aj.id_anggota=a.id_anggota');
		return $this->db->get('t_anggota_jabatan as aj');
	}

	public function get_jabatan($id)
	{
		$this->db->where('aj.id_tahun',$_SESSION['id_tahun']);
		$this->db->where('aj.id_jabatan',$id);
        $this->db->join('t_jabatan as j','aj.id_jabatan=j.id_jabatan');
        $this->db->join('t_anggota as a','aj.id_anggota=a.id_anggota');
		return $this->db->get('t_anggota_jabatan as aj');
	}

	public function get_anggota($id)
	{
		$this->db->where('aj.id_tahun',$_SESSION['id_tahun']);
		$this->db->where('aj.id_anggota',$id);
		$this->db->order_by('a.nama_anggota','ASC');
        $this->db->join('t_jabatan as j','aj.id_jabatan=j.id_jabatan');
        $this->db->join('t_anggota as a','aj.id_anggota=a.id_anggota');
		return $this->db->get('t_anggota_jabatan as aj');
	}

	public function count_anggota()
	{
		$this->db->where('aj.id_tahun',$_SESSION['id_tahun']);
		return $this->db->get('t_anggota_jabatan as aj');
	}

	public function get_new()
	{
		return $this->db->get('t_anggota as a');
	}

	public function get_last()
	{
		$this->db->where('a.id_anggota not in','(SELECT id_anggota FROM t_anggota_jabatan where id_tahun = '.$_SESSION['id_tahun'].')',false);
		return $this->db->get('t_anggota as a');
	}

	public function add($data)
	{
		$this->db->insert('t_anggota_jabatan',$data);
	}

	public function edit($id)
	{
        $this->db->where('aj.id_anggota_jabatan',$id);
        $this->db->join('t_jabatan as j','aj.id_jabatan=j.id_jabatan');
        $this->db->join('t_anggota as a','aj.id_anggota=a.id_anggota');
		return $this->db->get('t_anggota_jabatan as aj');
	}

	public function update($id,$data)
	{
		$this->db->where('id_anggota_jabatan',$id);
		return $this->db->update('t_anggota_jabatan',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_anggota_jabatan',$id);
		return $this->db->delete('t_anggota_jabatan');
	}

}
