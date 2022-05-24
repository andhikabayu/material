<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_suplier extends CI_Model {
	
	public function Getsuplier($where=""){
		$data = $this->db->query('SELECT * FROM tb_suplier '.$where.'order by id_suplier DESC');
		return $data->result_array();
	}
	public function Getinsert($table,$data){
		$material = $this->db->insert($table,$data);
		return $material;
	}
	public function Getupdate($table,$data,$where){
		$material = $this->db->update($table,$data,$where);
		return $material;
	}
	public function Gethapus($table,$where){
		$material = $this->db->delete($table,$where);
		return $material;
	}
	function delete($id){
	    $this->db->where("id_suplier",$id);
	    $this->db->delete("tb_suplier");
  	}
}