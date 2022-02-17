<?php
class M_bidang extends CI_Model {
	public function get()
	{
		$this->db->order_by('mak_bidang','ASC');
		$this->db->where('id_tahun',$_SESSION['id_tahun']);
		return $this->db->get('t_bidang');
	}

	public function add($data)
	{
		$this->db->insert('t_bidang',$data);
	}

	public function edit($id)
	{
		$this->db->where('id_bidang',$id);
		return $this->db->get('t_bidang');
	}

	public function update($id,$data)
	{
		$this->db->where('id_bidang',$id);
		return $this->db->update('t_bidang',$data);
	}

	public function delete($id)
	{
		$this->db->where('id_bidang',$id);
		return $this->db->delete('t_bidang');
	}

}
