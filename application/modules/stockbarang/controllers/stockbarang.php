<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stockbarang extends CI_Controller {
	public function __construct(){
	  	parent::__construct();
	  	$this->load->helper('url');
	  	$this->load->library('input');
	  	$this->load->model(array('m_stockbarang'));
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
	  } 
	public function oa(){
		$data['datajumlah'] = $this->m_stockbarang->countbarang();
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['data'] = $this->m_stockbarang->Getpenerimaan();
		$data['datalot'] = $this->m_stockbarang->Getpenyimpanan();
		$data['datapembelian'] = $this->m_stockbarang->master_finds();
		$this->load->view('stock',$data);
	}
	public function index(){
		$data['datajumlah'] = $this->m_stockbarang->countbarang();
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['data'] = $this->m_stockbarang->Getpenerimaan();
		$data['datalot'] = $this->m_stockbarang->Getpenyimpanan();
		$data['datapembelian'] = $this->m_stockbarang->master_finds();
		$this->load->view('stockbarang',$data);
	}
	public function indexgudang(){
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['data'] = $this->m_stockbarang->Getpenyimpanan();
		$this->load->view('gudang',$data);
	}
	public function simpanlot(){
		$nama_lot = $_POST['nama_lot'];
		$kapasitas = $_POST['kapasitas'];
		$insertlot = array(
			"nama_lot" => $nama_lot,
			"kapasitas" => $kapasitas
			);
		$this->m_stockbarang->Getinsert('tb_lot',$insertlot);
		redirect('stockbarang/indexgudang');
	}
	public function editlot($id){
		$lot = $this->m_stockbarang->Getpenyimpanan("where id_lot = '$id' ");
		$datalot = array(
			"id_lot" =>$lot[0]['id_lot'],
			"nama_lot" =>$lot[0]['nama_lot'],
			"kapasitas" =>$lot[0]['kapasitas'],
			);
		$datalot['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('edit_gudang',$datalot);
	}
	public function updatelot(){
		$id_lot = $_POST['id_lot'];
		$nama_lot = $_POST['nama_lot'];
		$kapasitas = $_POST['kapasitas'];
		$insertlot = array(
			'nama_lot' => $nama_lot,
			'kapasitas' => $kapasitas
			);
		$where = array('id_lot' => $id_lot);
		$this->m_stockbarang->Getupdate('tb_lot',$insertlot,$where);
		redirect('stockbarang/indexgudang');
	}
	public function hapuslot($id){
		$where = array('id_lot' => $id);
		$this->m_stockbarang->Getdelete('tb_lot',$where);
		redirect('stockbarang/indexgudang');
	}
	public function delete(){
		$id= $this->input->post("id");
		$this->m_stockbarang->delete($id);
		echo "{}";
		}
	function delete_rak(){
		$id= $this->input->post("id");
		$this->m_stockbarang->delete_rak($id);
		echo "{}";
	}	
	//--------------------------------------------------------------------------------------------------------
	public function editbarang($id_stockbarang){
		$rak = $this->m_stockbarang->Gettampilpenerimaan("where id_stockbarang = '$id_stockbarang' ");
		$datalot = array(
			"id_stockbarang" =>$rak[0]['id_stockbarang'],
			"id_lot" =>$rak[0]['id_lot'],
			"nama_barang"=>$rak[0]['nama_barang'],
			"harga_jual" =>$rak[0]['harga_jual']
			);
		$datalot['datalot'] = $this->m_stockbarang->Getpenyimpanan();
		$datalot['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('edit',$datalot);
	}
	public function updatbarang(){
		$id_stockbarang = $_POST['id_stockbarang'];
		$nama_barang = $_POST['barang'];
		$id_lot = $_POST['editposisilot'];
		$harga_jual = $_POST['harga_jual'];
		$updatelot = array(
			'id_lot' => $id_lot,
			'harga_jual' => $harga_jual
			);
		$where = array('id_stockbarang' => $id_stockbarang);
		$this->m_stockbarang->Getupdate('tb_stockbarang',$updatelot,$where);
		redirect('stockbarang/stockbarang');
	}
	//------------------------------------------------------------------------------------------------------
	public function simpanbarang(){
		$data_pembelian = $this->input->post('id_penerimaan');
		$simpanlot = $this->input->post('simpanlot');
		for($i=0;$i<count($data_pembelian);$i++){
			$pembelian = $this->m_stockbarang->find_byid($data_pembelian[$i]);
			$data = array(
				'id_penerimaan' =>$pembelian->id_penerimaan,
				'kd_pembelian' =>$pembelian->kd_pembelian,
				'kd_barang' =>$pembelian->kd_barang,
				'nama_barang' =>$pembelian->nama_barang,
				'harga_barang' =>$pembelian->harga_barang,
				'merek' =>$pembelian->merek,
				'jumlah_barang' =>$pembelian->jumlah_masuk,
				'id_lot' =>$simpanlot,
				'harga_jual' =>$pembelian->harga_jual,
				'suplier' =>$pembelian->suplier,
				'tgl_penerimaan'=>$pembelian->tgl_penerimaan
			);
			$this->m_stockbarang->insert_pembelian($data);
			$where = array('id_penerimaan' => $data_pembelian[$i]);
			$this->m_stockbarang->delete_pembelian($where);
		}
		redirect('stockbarang/stockbarang');
	}
}