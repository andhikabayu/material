<?php
class M_laporan extends CI_Model {

   function __construct(){
      parent::__construct();


   }
   function select_all_merek()
   {
      $this->db->select('*');
      $this->db->from('tb_merek');
      $this->db->order_by('id_merek','DESC');
      return $this->db->get();
   }
   function select_all_suplier()
   {
      $this->db->select('*');
      $this->db->from('tb_suplier');
      $this->db->order_by('id_suplier','DESC');
      return $this->db->get();
   }
   function select_all_rak()
   {
      $this->db->select('*');
      $this->db->from('tb_lot');
      $this->db->order_by('id_lot','DESC');
      return $this->db->get();
   }
   function select_all_barang()
   {
      $this->db->select('*');
      $this->db->from('qw_barang');
      $this->db->order_by('id_barang','DESC');
      return $this->db->get();
   }
   function select_all_pembelian()
   {
      $this->db->select('*');
      $this->db->from('tb_stockbarang');
      $this->db->order_by('id_stockbarang','DESC');
      return $this->db->get();
   }

   function countdatabarang_Byno_faktur($no_faktur)
  {
      $this->db->where('no_faktur',$no_faktur);
      $this->db->from('tb_penjualan');
      $query = $this->db->get();
      return ($query->num_rows() > 0) ? $query->result() : NULL;
  }

    public function Getmerek($where=""){
		$data = $this->db->query('SELECT * FROM tb_merek '.$where);
		return $data->result_array();
	}

   function select_by_id_merek($id_merek)
   {
      $this->db->select('*');
      $this->db->from('tb_merek');
      $this->db->where('id_merek',$id_merek);
      return $this->db->get();
   }

   function select_group_penjualan()
   {
     $this->db->select('*');
     $this->db->from('tb_penjualan');
     $this->db->group_by('no_faktur');
     $this->db->order_by('no_faktur','desc');
     return $this->db->get();
   }
}
?>