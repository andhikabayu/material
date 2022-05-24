<?php
class M_transaksi extends CI_Model {

   protected $penerimaan = "tb_stockbarang";
   protected $keranjang = "tb_keranjang";

    function find_byid($id_penerimaan) 
    {
      $this->db->where('id_penerimaan', $id_penerimaan);
      $query = $this->db->get($this->penerimaan);
      return $query->row();
    }

    function find_bykd($kd_barang) 
    {
      $this->db->where('kd_barang', $kd_barang);
      $query = $this->db->get($this->keranjang);
      return $query->row();
    }

    function select_by_id($id)
    {
      $this->db->select('*');
      $this->db->from('tb_keranjang');
      $this->db->where('id',$id);
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

    function select_all_penjualan($where="")
    {
      $data = $this->db->query('SELECT * FROM tb_penjualan '.$where);
      return $data->result_array();
    }

    function select_all_keranjang()
    {
      $this->db->select('*');
      $this->db->from('tb_keranjang');
      $this->db->order_by('nama_barang','asc');
      return $this->db->get();
    }

    function deletedata($tabelNama,$where)
    {
      $res = $this->db->delete($tabelNama,$where);
      return $res;
    }

    function buat_kode_barang()
    {
      $this->db->select('RIGHT(tb_penjualan.no_faktur,4) as kode', FALSE);
      $this->db->order_by('no_faktur','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_penjualan');
        //cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
          //jika kode ternyata sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }else{
          //jika kode belum ada
            $kode = 1;
        }
          $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
          $kodejadi = "FKR".$kodemax;
          return $kodejadi;
    }

   function insert_penjualan($s)
   {
     $this->db->insert('tb_penjualan',$s);
   }

   function insert_transaksi($result)
   {
     $this->db->insert('tb_transaksi',$result);
   }

   function delete_barang($id_tmp,$data)
   {
     $this->db->where('id_tmp',$id_tmp);
     $this->db->delete('tb_tmp_transaksi');
   }

   function update_data($kd_barang, $data)
   { 
     $this->db->where('kd_barang', $kd_barang); 
     $this->db->update('tb_keranjang', $data); 
   }

   function update_bayar($no_faktur, $data)
   { 
      $this->db->where('no_faktur', $no_faktur); 
      $this->db->update('tb_penjualan', $data); 
   }

   function reset_barang($kd_barang)
   {
     $this->db->select("*");
     $this->db->from("tb_keranjang");
     $this->db->where("kd_barang",$kd_barang);
     $this->db->truncate("tb_keranjang");
     return $this->db->get('tb_keranjang');
   }

   function retrieve_penerimaan()
   {
     $query = $this->db->get('tb_stockbarang');
     return $query->result();
   }

   function countdatabarang()
   {
    $this->db->select('id');
    $this->db->from('tb_keranjang');
    $query = $this->db->get();
    return ($query->num_rows() > 0) ? $query->result() : NULL;
   }

   function countdatabarang_Byno_faktur($no_faktur)
   {
    $this->db->where('no_faktur',$no_faktur);
    $this->db->from('tb_penjualan');
    $query = $this->db->get();
    return ($query->num_rows() > 0) ? $query->result() : NULL;
   }

   function delete($id)
   {
    $this->db->where("id",$id);
    $this->db->delete("tb_keranjang");
   }
}
