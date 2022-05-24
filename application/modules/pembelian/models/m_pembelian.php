<?php
class M_pembelian extends CI_Model {
protected $pembelian  = 'tb_pembelian';
   function __construct(){
      parent::__construct();

   }
    function find_byid($id) {
       $this->db->select('*');
       $this->db->from('tb_barang');
       $this->db->where('kd_barang', $id);
       $query = $this->db->get();
       return $query->row();
    }
    function find_byqwid($id) {
       $this->db->select('*');
       $this->db->from('qw_barang');
       $this->db->where('kd_barang', $id);
       $this->db->order_by('nama_barang','ASC');
       $query = $this->db->get();
       return $query->row();
    }
    function find_bytmpid($id) {
       $this->db->select('*');
       $this->db->from('tb_tmp_barang');
       $this->db->where('kd_barang', $id);
       $query = $this->db->get();
       return $query->row();
    }
	function insert_tmp_barang($data){
	     $this->db->insert('tb_tmp_barang',$data);
	}
	function insert_pembelian($data){
	     $this->db->insert('tb_pembelian',$data);
	}

	public function countbarang($kd_pembelian) {
       $this->db->select('kd_barang');
       $this->db->from($this->pembelian);
       $query = $this->db->get();
       return ($query->num_rows() > 0) ? $query->result() : NULL;
   }
   public function Getdetailpembelian($where)
	{
		$this->db->select('*');
		$this->db->where('kd_pembelian',$where);
		$dataqwsiswa = $this->db->get('tb_pembelian');
		return $dataqwsiswa->result_array();
	}

    public function Getsuplier($where=""){
		$data = $this->db->query('SELECT * FROM tb_suplier '.$where);
		return $data->result_array();
	}
	public function Getbarang($where="")
	{
		$data = $this->db->query('SELECT * FROM tb_barang '.$where);
		return $data->result_array();
	}
	public function Getalltmp($where="")
	{
		$data = $this->db->query('SELECT * FROM tb_tmp_barang '.$where);
		return $data->result_array();
	}
	function Gettmpbarang(){
		  $this->db->select('*');
	      $this->db->from('tb_tmp_barang');
	      return $this->db->get();
	}
	public function Getpembelian($where=""){
		$data = $this->db->query('SELECT * FROM tb_pembelian '.$where);
		return $data->result_array();
	}
	public function Getfilpembelian($where=""){
		$data = $this->db->query('SELECT * FROM tb_pembelian '.$where.'group by kd_pembelian order by kd_pembelian DESC');
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
	function select_by_id($id_pembelian)
	   {
	      $this->db->select('*');
	      $this->db->from('tb_pembelian');
	      $this->db->where('id_pembelian',$id_pembelian);
	      return $this->db->get();
	   }
	function select_by_detail_id($kd_pembelian)
	   {
	      $this->db->select('*');
	      $this->db->from('tb_pembelian');
	      $this->db->where('kd_pembelian',$kd_pembelian);
	      return $this->db->get();
	   } 
	function select_by_tmp($kd_barang)
	   {
	      $this->db->select('*');
	      $this->db->from('tb_tmp_barang');
	      $this->db->where('kd_barang',$kd_barang);
	      return $this->db->get();
	   }
	function delete_barang($kd_barang,$data)
   {
      $this->db->where('kd_barang',$kd_barang);
      $this->db->delete('tb_tmp_barang');
   }
   function delete_pembelian($id_pembelian,$data)
   {
      $this->db->where('id_pembelian',$id_pembelian);
      $this->db->delete('tb_pembelian');
   }
    public function deletedata($tabelNama,$where){
		$res = $this->db->delete($tabelNama,$where);
		return $res;
	}
	public function deletealldata($tabelNama,$where=""){
		$res = $this->db->delete($tabelNama,$where);
		return $res;
	}
	public function countdetail($kd_pembelian) {
       $this->db->where('kd_pembelian', $kd_pembelian);
       $this->db->from($this->pembelian);
       $query = $this->db->get();
       return ($query->num_rows() > 0) ? $query->result() : NULL;
   }

	function reset_tmp_barang()
	  {
	   $this->db->select("*");
	   $this->db->from("tb_tmp_barang");
	   $this->db->truncate("tb_tmp_barang");
	   return $this->db->get('tb_tmp_barang');
	  }

	function master_finds() {
      $this->db->select('*');
      $this->db->from('tb_barang');
      $this->db->join('tb_merek', 'tb_merek.id_merek = tb_barang.id_merek');
      $query = $this->db->get();
      return ($query->num_rows() > 0) ? $query->result() : null;
  }
   function buat_kode_pembelian(){
		$this->db->select('RIGHT(tb_pembelian.kd_pembelian,6) as kode', FALSE);
		$this->db->order_by('kd_pembelian','DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_pembelian');
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
    $this->db->where("id_pembelian",$id);
    $this->db->delete("tb_pembelian");
  }
}
?>