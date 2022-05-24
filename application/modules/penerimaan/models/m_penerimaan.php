<?php
class M_penerimaan extends CI_Model {
protected $pembelian  = 'tb_pembelian';
protected $penerimaan  = 'tb_penerimaan';
  
  public function find_byid($id){
    $this->db->select('*');
    $this->db->from('tb_pembelian');
    $this->db->where('id_pembelian', $id);
    $query = $this->db->get();
    return $query->row();
  }

  public function find_byidstok($id){
    $this->db->select('*');
    $this->db->from('tb_penerimaan');
    $this->db->where('id_penerimaan', $id);
    $query = $this->db->get();
    return $query->row();
  }
  public function find_byidstok_ready($id,$suplier){
    $this->db->select('*');
    $this->db->from('tb_stockbarang');
    $this->db->where('kd_barang', $id);
    $this->db->where('suplier', $suplier);
    $query = $this->db->get();
    return $query->row();
  }

  function find_bypembelian($id) {
       $this->db->select('*');
       $this->db->from('tb_pembelian');
       $this->db->where('kd_barang', $id);
       $query = $this->db->get();
       return $query->row();
    }
  public function Getdetailpembelian($where)
  {
    $this->db->select('*');
    $this->db->where('kd_pembelian',$where);
    $dataqwsiswa = $this->db->get('tb_pembelian');
    return $dataqwsiswa->result_array();
  }
  public function Getpembelian($where=""){
    $data = $this->db->query('SELECT * FROM tb_pembelian '.$where);
    return $data->result_array();
  }
  public function Getdetailpenerimaan($where=""){
    $data = $this->db->query('SELECT * FROM tb_penerimaan '.$where);
    return $data->result_array();
  }
   public function Getpenerimaan($where=""){
   		$data = $this->db->query('SELECT * FROM tb_penerimaan '.$where.'group by kd_pembelian order by kd_pembelian DESC');
   		return $data->result_array();
   }
   public function filterpembelian($where){
      $this->db->select('*');
      $this->db->where('kd_pembelian',$where);
      $dataqwsiswa = $this->db->get('tb_pembelian');
      return $dataqwsiswa->result_array();
   }

   function select_by_id($id_pembelian)
     {
        $this->db->select('*');
        $this->db->from('tb_pembelian');
        $this->db->where('id_pembelian',$id_pembelian);
        return $this->db->get();
     }
  function delete_kdpembelian($kd_pembelian,$data)
     {
        $this->db->where('kd_pembelian',$kd_pembelian);
        $this->db->delete('tb_pembelian');
     }

   public function countbarang($kd_pembelian) {
       $this->db->where('kd_pembelian', $kd_pembelian);
       $this->db->from($this->penerimaan);
       $query = $this->db->get();
       return ($query->num_rows() > 0) ? $query->result() : NULL;
   }
   public function sumawal($kd_pembelian) {
      $this->db->select('SUM(jumlah_barang) as total');
      $this->db->from('tb_penerimaan');
      $this->db->where('kd_pembelian', $kd_pembelian);
      return $this->db->get()->row()->total;
   }
   public function summasuk($kd_pembelian) {
       $this->db->select('SUM(jumlah_masuk) as total');
      $this->db->from('tb_penerimaan');
      $this->db->where('kd_pembelian', $kd_pembelian);
      return $this->db->get()->row()->total;
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
  //   public  function master_finds() {
  //     $this->db->select('*');
  //     $this->db->from('tb_penerimaan');
  //     $this->db->join('tb_lot', 'tb_lot.id_lot = tb_penerimaan.id_lot');
  //     $this->db->limit('kapasitas');
  //     $query = $this->db->get();
  //     return ($query->num_rows() > 0) ? $query->result_array() : null;
  // }

   function master_finds() {
      $this->db->select('*');
      $this->db->from('tb_barang');
      $this->db->join('tb_merek', 'tb_merek.id_merek = tb_barang.id_merek');
      $query = $this->db->get();
      return ($query->num_rows() > 0) ? $query->result() : null;
  }
    public function Gettampilpenerimaan($where=""){
      $data = $this->db->query('SELECT * FROM tb_penerimaan '.$where);
      return $data->result_array();
    }
    public function Getpenerimaan2($id_penerimaan){
      $this->db->select('*');
      $this->db->from('tb_penerimaan');
      $thid->db->where('id_penerimaan',$id_penerimaan);
      return $this->db->get();
    }
  public function insert_pembelian($data){
      $this->db->insert('tb_penerimaan',$data);
    }
    public function delete_pembelian($data){
      $this->db->delete('tb_pembelian',$data);
    }
    public function update_posisilot($data){
      $this->db->update('tb_penerimaan',$data);
    }

    function create(){
    $this->db->insert("member",array("nama"=>""));
    return $this->db->insert_id();
  }


  function read(){
    $this->db->order_by("id","desc");
    $query=$this->db->get("member");
    return $query->result_array();
  }


  function update($id,$value,$modul){
    $this->db->where(array("id"=>$id));
    $this->db->update("member",array($modul=>$value));
  }

  function delete($id){
    $this->db->where("id_penerimaan",$id);
    $this->db->delete("tb_penerimaan");
  }
  function buat_kode_penerimaan(){
    $this->db->select('RIGHT(tb_penerimaan.kd_pembelian,6) as kode', FALSE);
    $this->db->order_by('kd_pembelian','DESC');
    $this->db->limit(1);
    $query = $this->db->get('tb_penerimaan');
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
    $kodejadi = "PBM".$kodemax;
    return $kodejadi;
  }
  function reset_tmp_barang()
    {
     $this->db->select("*");
     $this->db->from("tb_tmp_barang");
     $this->db->truncate("tb_tmp_barang");
     return $this->db->get('tb_tmp_barang');
    }

  public function Getsuplier($where=""){
    $data = $this->db->query('SELECT * FROM tb_suplier '.$where);
    return $data->result_array();
  }
  function Gettmpbarang(){
      $this->db->select('*');
        $this->db->from('tb_tmp_barang');
        return $this->db->get();
  }
  public function insert_stock($data){
      $this->db->insert('tb_stockbarang',$data);
  }
}
?>