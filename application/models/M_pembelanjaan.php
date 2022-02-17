<?php
class M_pembelanjaan extends CI_Model {

	public function get_by($id)
	{
        $this->db->where('p.id_pengeluaran',$id);
        $this->db->join('t_pengeluaran as pj','p.id_pengeluaran=pj.id_pengeluaran');
		return $this->db->get('t_pembelanjaan as p');
	}

	public function get_tanggal($id,$tanggal)
	{
		$this->db->where('p.id_pengeluaran',$id);
		$this->db->where('p.tanggal_pembelanjaan <=',$tanggal);
        $this->db->join('t_pengeluaran as pj','p.id_pengeluaran=pj.id_pengeluaran');
		return $this->db->get('t_pembelanjaan as p');
	}

	public function get_bln($id,$tanggal)
	{
		$this->db->where('p.id_pengeluaran',$id);
		$this->db->where('p.tanggal_pembelanjaan LIKE',$tanggal.'-%');
        $this->db->join('t_pengeluaran as pj','p.id_pengeluaran=pj.id_pengeluaran');
		return $this->db->get('t_pembelanjaan as p');
	}

	public function add($data)
	{
		$this->db->insert('t_pembelanjaan',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_pembelanjaan',$id);
		return $this->db->get('t_pembelanjaan');
	}

	public function update($id,$data)
	{
		$this->db->where('id_pembelanjaan',$id);
		return $this->db->update('t_pembelanjaan',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_pembelanjaan',$id);
		return $this->db->delete('t_pembelanjaan');
	}

}
