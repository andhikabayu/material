<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller {
	  public function __construct()    
	  {
	  	parent::__construct();        
	  	$this->load->helper('url');        
	  	$this->load->library('input');        
	  	$this->load->model(array('m_pembelian'));
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');    
	  } 

	public function index()
	{
		$kd_pembelian = $this->input->post('kd_pembelian');
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['datasuplier'] = $this->m_pembelian->Getsuplier();
		$data['datafilpembelian'] = $this->m_pembelian->Getfilpembelian();
		$data['qwbarang'] = $this->m_pembelian->master_finds();
		$this->load->view('data-pembelian',$data); 
	}
	public function tranpembelian()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['kode'] = $this->m_pembelian->buat_kode_pembelian();
		$data['datatmpbarang'] = $this->m_pembelian->Gettmpbarang()->result_array();
		$data['datasuplier'] = $this->m_pembelian->Getsuplier();
		$data['datapembelian'] = $this->m_pembelian->Getpembelian();
		$data['qwbarang'] = $this->m_pembelian->master_finds();
		$this->load->view('pembelian',$data); 
	}
	public function detail_pembelian($kd_pembelian){
		$qry = $this->m_pembelian->Getpembelian("where kd_pembelian = '$kd_pembelian' ");
    	$data = array(
    			"kd_pembelian" =>$qry[0]['kd_pembelian'],
    			"tgl_pembelian" =>$qry[0]['tgl_pembelian']
    			);
		$data['detail'] = $this->m_pembelian->Getpembelian("where kd_pembelian = '$kd_pembelian' order by kd_pembelian DESC ");
    	$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('pembelian/data-pembelian-detail',$data);
	}
	public function edit_pembelian($kd_pembelian)
	{	
		$qry = $this->m_pembelian->Getpembelian("where kd_pembelian = '$kd_pembelian' ");
    		$data = array(
    			"kd_pembelian" =>$qry[0]['kd_pembelian'],
    			"tgl_pembelian" =>$qry[0]['tgl_pembelian'],
    			);
			$data['detail'] = $this->m_pembelian->Getpembelian("where kd_pembelian = '$kd_pembelian' order by kd_pembelian DESC ");
    		$data['session_data'] = $this->session->userdata('logged_in');
    		$this->load->view('edit_pembelian',$data);
	}
	public function do_insert_pembelian()
	{
		$nama_barang = $_POST['nama_barang'];
		$merek = $_POST['merek'];
		$harga_barang = $_POST['harga_barang'];
		$jumlah_barang = $_POST['jumlah_barang'];
		$id_suplier = $_POST['id_suplier'];
		$data = array(
			"nama_barang" =>$nama_barang,
			"merek" =>$merek,
			"harga_barang" =>$harga_barang,
			"jumlah_barang" =>$jumlah_barang,
			"id_suplier" =>$id_suplier
			);
		$this->m_pembelian->Getinsert('tb_pembelian',$data);
		redirect(site_url('pembelian/pembelian'));
	}
	public function proses(){
		$data_barang = $this->input->post('kd_barang');
		if($data_barang==""){
			redirect(site_url('pembelian/pembelian'));
		}
		else{
			foreach($data_barang as $kd_barang){
			$barang = $this->m_pembelian->find_byqwid($kd_barang);
			$data = array(
			'kd_barang' => $barang->kd_barang,
			'nama_barang' => $barang->nama_barang,
			'merek' => $barang->merek
			);
			$this->m_pembelian->insert_tmp_barang($data);
			}
			redirect(site_url('pembelian/tranpembelian'));
		}	
	}

	public function insert_pembelian(){
		$kd = $this->input->post('kd_barang');
		$kd_pembelian = $this->input->post('kd_pembelian');
		$suplier = $this->input->post('suplier');
		$harga_barang = $this->input->post('harga_barang');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$tgl_pembelian = $this->input->post('tgl_pembelian');
		$result = array();
		for ($i = 0; $i < count($kd); $i++ ) {
			$barang = $this->m_pembelian->find_bytmpid($kd[$i]);
			$result = array(
				'kd_pembelian' => $kd_pembelian,	
				'suplier' => $suplier[$i],
				'kd_barang' => $barang->kd_barang,
				'nama_barang' => $barang->nama_barang,
				'merek' => $barang->merek,
				'harga_barang' => $harga_barang[$i],
				'jumlah_barang' => $jumlah_barang[$i],
				'tgl_pembelian' => $tgl_pembelian
			);

			$test = $this->db->insert('tb_pembelian',$result);
		}
		if($test){
			redirect('pembelian/reset');
		}else{
			echo "gagal";
		}
	}

	public function reset(){
		$this->m_pembelian->reset_tmp_barang('tb_tmp_barang');
		redirect('pembelian/pembelian');
	}
	public function delete_pembelian($id_pembelian)
	{
		$data = $this->m_pembelian->select_by_id($id_pembelian)->row();
		$this->m_pembelian->delete_pembelian($id_pembelian,$data);
		redirect('pembelian/pembelian');
	}
	/*public function delete_tmp_barang($kd_barang)
	{
		$data = $this->m_pembelian->select_by_tmp($kd_barang)->row();
		$this->m_pembelian->delete_barang($kd_barang,$data);
		redirect('pembelian/pembelian');
	}*/
	public function do_delete_tmp($kd_barang){
		$where = array('kd_barang' =>$kd_barang);
		$res = $this->m_pembelian->deletedata('tb_tmp_barang',$where);
		if($res>=1){
			$this->session->set_flashdata('alert','Data TerHapus');
			redirect('pembelian/tranpembelian');
		}else{
			echo "<h2>Hapus data gagal</h2>";
		}
	}
	public function delete_tmp_pembelian(){
		$res = $this->m_pembelian->deletealldata('tb_tmp_barang');
		if($res>=1){
			$this->session->set_flashdata('alert','Data TerHapus');
			redirect('pembelian/pembelian');
		}else{
			echo "<h2>Hapus data gagal</h2>";
		}
	}
	public function do_update_pembelian(){
		$id = $this->input->post('id_pembelian');
    	$jumlah_barang = $this->input->post('jumlah_barang');
    	$harga_barang = $this->input->post('harga_barang');
		$result = array();
		for ($i = 0; $i < count($id); $i++ ) {
			$id_penerimaan = $this->input->post('id_pembelian');
			$result = array(
				'id_pembelian' => $id[$i],
				'harga_barang' => $harga_barang[$i],
				'jumlah_barang' => $jumlah_barang[$i]
			);
			$where = array('id_pembelian' => $id[$i]);
	    	$this->db->update('tb_pembelian',$result,$where);
    	}
    	redirect('pembelian/pembelian');
    }
    function delete(){
		$id= $this->input->post("id");
		$this->m_pembelian->delete($id);
		echo "{}";
	}	
}