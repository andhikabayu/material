<?php
class M_merek extends CI_Model {

   function __construct(){
      parent::__construct();


   }

   function insert_barang($data)
   {
      $this->db->insert('tb_barang',$data);
   } 

   function select_all($where="")
   {
      $databarang = $this->db->query('SELECT * FROM tb_barang'.$where);
      return $databarang->result_array();
   }

   function select_by_id($id_barang)
   {
      $this->db->select('*');
      $this->db->from('tb_barang');
      $this->db->where('id_barang',$id_barang);
      return $this->db->get();
   }

   function update_barang($id_barang, $data)
   { 
      $this->db->where('id_barang', $id_barang); 
      $this->db->update('tb_barang', $data); 
   }

   function delete_barang($id_barang,$data)
   {
      $this->db->where('id_barang',$id_barang);
      $this->db->delete('tb_barang');
   }

   //merek
   function insert_merek($data)
   {
      $this->db->insert('tb_merek',$data);
   } 

   function select_all_merek()
   {
      $this->db->select('*');
      $this->db->from('tb_merek');
      $this->db->order_by('id_merek','DESC');
      return $this->db->get();
   }

   function select_by_id_merek($id_merek)
   {
      $this->db->select('*');
      $this->db->from('tb_merek');
      $this->db->where('id_merek',$id_merek);
      return $this->db->get();
   }

   function update_merek($id_merek, $data)
   { 
      $this->db->where('id_merek', $id_merek); 
      $this->db->update('tb_merek', $data); 
   }

   function delete_merek($id_merek,$data)
   {
      $this->db->where('id_merek',$id_merek);
      $this->db->delete('tb_merek');
   }
   function buat_kode_barang(){
      $this->db->select('RIGHT(tb_barang.kd_barang,6) as kode', FALSE);
      $this->db->order_by('kd_barang','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_barang');
      //cek dulu apakah ada sudah ada kode di tabel.
      if($query->num_rows() <> 0){
         //jika kode ternyata sudah ada.
         $data = $query->row();
         $kode = intval($data->kode) + 1;
      }else{
         //jika kode belum ada
         $kode = 1;
      }
      $kodemax = str_pad(
      $kode, 6, "0", STR_PAD_LEFT);
      $kodejadi = "BDM".$kodemax;
      return $kodejadi;
   }
   function delete($id){
    $this->db->where("id_merek",$id);
    $this->db->delete("tb_merek");
  }
}
?>