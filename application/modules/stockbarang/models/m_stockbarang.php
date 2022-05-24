<?php
class M_stockbarang extends CI_Model {
protected $penerimaan  = 'tb_penerimaan';
protected $stockbarang  = 'tb_stockbarang';
protected $kapasitas  = 'tb_lot';

  
  public function find_byid($id){
    $this->db->select('*');
    $this->db->from('tb_penerimaan');
    $this->db->where('id_penerimaan', $id);
    $query = $this->db->get();
    return $query->row();
  }
   public function Getpenerimaan($where=""){
   		$data = $this->db->query('SELECT * FROM tb_penerimaan '.$where);
   		return $data->result_array();
   }
   public function countbarang() {
       $this->db->select('id_penerimaan');
       $this->db->from($this->penerimaan);
       $query = $this->db->get();
       return ($query->num_rows() > 0) ? $query->result() : NULL;
   }
   public function Getpenyimpanan($where=""){
   		$data = $this->db->query('SELECT * FROM tb_lot '.$where);
   		return $data->result_array();
   }
   public function Getinsert($table,$data){
   		$lot = $this->db->insert($table,$data);
   		return $lot;
   }
   public function Getupdate($table,$data,$where){
		$lot = $this->db->update($table,$data,$where);
		return $lot;
	}
   public function Getdelete($table,$where){
   		$lot = $this->db->delete($table,$where);
   		return $lot;
   }
   public function countrak($id_lot) {
       $this->db->where('id_lot', $id_lot);
       $this->db->from($this->stockbarang);
       $query = $this->db->get();
       return ($query->num_rows() > 0) ? $query->result() : NULL;
   }
    public  function master_finds() {
      $this->db->select('*');
      $this->db->from('tb_stockbarang');
      $this->db->join('tb_lot', 'tb_lot.id_lot = tb_stockbarang.id_lot');
      $this->db->limit('kapasitas');
      $this->db->order_by('nama_lot','ASC');
      $query = $this->db->get();
      return ($query->num_rows() > 0) ? $query->result_array() : null;
  }
    public function Gettampilpenerimaan($where=""){
      $data = $this->db->query('SELECT * FROM tb_stockbarang '.$where);
      return $data->result_array();
    }
  public function insert_pembelian($data){
      $this->db->insert('tb_stockbarang',$data);
  }
    public function delete_pembelian($where){
      $this->db->delete('tb_penerimaan',$where);
    }
    public function delete($id){
     $this->db->where("id_stockbarang",$id);
     $this->db->delete("tb_stockbarang");
    }
    function delete_rak($id){
    $this->db->where("id_lot",$id);
    $this->db->delete("tb_lot");
  }
}
?>