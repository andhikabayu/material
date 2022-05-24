<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelku extends CI_Model {
	
	function master_finds() {
      $this->db->select('*');
      $this->db->from('tb_user');
      $this->db->join('tb_level', 'tb_level.kd_level = tb_user.id_level');
      $query = $this->db->get();
      return ($query->num_rows() > 0) ? $query->result() : null;
  }
	public function Getuser($where=""){
		$data = $this->db->query('SELECT * FROM tb_user '.$where.' order by id_user DESC');
		return $data->result_array();
	}
	public function Getstafgudang($where=""){
		$data = $this->db->query('SELECT * FROM tb_user where id_level =4 order by id_user DESC');
		return $data->result_array();
	}
	public function Getkasir($where=""){
		$data = $this->db->query('SELECT * FROM tb_user where id_level =3 order by id_user DESC');
		return $data->result_array();
	}
	public function Getadmin($where=""){
		$data = $this->db->query('SELECT * FROM tb_user where id_level =2 order by id_user DESC');
		return $data->result_array();
	}
	public function Getlevel($where=""){
		$data = $this->db->query('SELECT * FROM tb_level '.$where);
		return $data->result_array();
	}
	function Getnmlevel($id) {
       $this->db->select('*');
       $this->db->from('tb_pembelian');
       $this->db->where('kd_barang', $id);
       $query = $this->db->get();
       return $query->row();
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
	    $this->db->where("id_user",$id);
	    $this->db->delete("tb_user");
	  }
}