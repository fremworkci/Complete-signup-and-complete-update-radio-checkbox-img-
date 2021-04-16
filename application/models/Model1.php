<?php
/**
 * 
 */
class Model1 extends CI_Model
{
	function save_data($table,$data)
	{
		return $this->db->insert($table,$data);
	}

	function show_data($table,$field)
	{
		$qry=$this->db->get($table);
		return $qry->result();
	}

	function edit_data($table,$id)
	{
		$this->db->where("id",$id);
		$qry=$this->db->get($table);
		return $qry->result();
	}

	function update_data($table,$id,$data)
	{
		$this->db->where("id",$id);
		return $this->db->update($table,$data);
	}
}
?>