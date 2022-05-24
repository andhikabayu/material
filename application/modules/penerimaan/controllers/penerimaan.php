<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerimaan extends CI_Controller {
	public function __construct(){
	  	parent::__construct();
	  	$this->load->helper('url');
	  	$this->load->library('input');
	  	$this->load->model(array('m_penerimaan'));
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');
	  } 
	public function index(){
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['data'] = $this->m_penerimaan->Getpenerimaan();
		$this->load->view('data-penerimaan',$data);
	}
	public function penerimaan_staf(){
	$data['session_data'] = $this->session->userdata('logged_in');
		$data['data'] = $this->m_penerimaan->Getpenerimaan();
		$this->load->view('data-penerimaan_staf',$data);
	}
	public function tranpenerimaan(){
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['data'] = $this->m_penerimaan->Getpenerimaan();
		$data['datalot'] = $this->m_penerimaan->Getpenyimpanan();
		$data['datapembelian'] = $this->m_penerimaan->master_finds();
		$this->load->view('penerimaan',$data);
	}
	public function tranpembelian()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['kode'] = $this->m_penerimaan->buat_kode_penerimaan();
		$data['datatmpbarang'] = $this->m_penerimaan->Gettmpbarang()->result_array();
		$data['datasuplier'] = $this->m_penerimaan->Getsuplier();
		$data['datapembelian'] = $this->m_penerimaan->Getpembelian();
		$data['qwbarang'] = $this->m_penerimaan->master_finds();
		$this->load->view('pembelian',$data); 
	}
	public function datapenerimaan($kd_pembelian){
		$qry = $this->m_penerimaan->Getpembelian("where kd_pembelian = '$kd_pembelian' ");
    	$data = array(
    			"kd_pembelian" =>$qry[0]['kd_pembelian'],
    			"tgl_pembelian" =>$qry[0]['tgl_pembelian']
    			);
		$data['filter'] = $this->m_penerimaan->Getpembelian("where kd_pembelian = '$kd_pembelian' order by kd_pembelian DESC ");
    	$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('penerimaan',$data);
	}
	public function detail_penerimaan($kd_pembelian){
		$qry = $this->m_penerimaan->Getdetailpenerimaan("where kd_pembelian = '$kd_pembelian' ");
    	$data = array(
    			"kd_pembelian" =>$qry[0]['kd_pembelian'],
    			"tgl_penerimaan" =>$qry[0]['tgl_penerimaan']
    			);
		$data['detail'] = $this->m_penerimaan->Getdetailpenerimaan("where kd_pembelian = '$kd_pembelian' order by kd_pembelian DESC ");
    	$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('penerimaan/data-penerimaan-detail',$data);
	}
	public function detail_penerimaan_staf($kd_pembelian){
		$qry = $this->m_penerimaan->Getdetailpenerimaan("where kd_pembelian = '$kd_pembelian' ");
    	$data = array(
    			"kd_pembelian" =>$qry[0]['kd_pembelian'],
    			"tgl_penerimaan" =>$qry[0]['tgl_penerimaan']
    			);
		$data['detail'] = $this->m_penerimaan->Getdetailpenerimaan("where kd_pembelian = '$kd_pembelian' order by kd_pembelian DESC ");
    	$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('penerimaan/data-penerimaan-detail_staf',$data);
	}
	public function edit_penerimaan($kd_pembelian){
		$qry = $this->m_penerimaan->Getdetailpenerimaan("where kd_pembelian = '$kd_pembelian' ");
    	$data = array(
    			"kd_pembelian" =>$qry[0]['kd_pembelian'],
    			"tgl_penerimaan" =>$qry[0]['tgl_penerimaan']
    			);
    	$data['detail'] = $this->m_penerimaan->Getdetailpenerimaan("where kd_pembelian = '$kd_pembelian' order by kd_pembelian DESC ");
    	$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('penerimaan/edit_penerimaan',$data);
	}
	public function edit_penerimaan_staf($kd_pembelian){
		$qry = $this->m_penerimaan->Getdetailpenerimaan("where kd_pembelian = '$kd_pembelian' ");
    	$data = array(
    			"kd_pembelian" =>$qry[0]['kd_pembelian'],
    			"tgl_penerimaan" =>$qry[0]['tgl_penerimaan']
    			);
    	$data['detail'] = $this->m_penerimaan->Getdetailpenerimaan("where kd_pembelian = '$kd_pembelian' order by kd_pembelian DESC ");
    	$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('penerimaan/edit_penerimaan_staf',$data);
	}
	public function indexgudang(){
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['data'] = $this->m_penerimaan->Getpenyimpanan();
		$this->load->view('gudang',$data);
	}
	public function simpanlot(){
		$nama_lot = $_POST['nama_lot'];
		$kapasitas = $_POST['kapasitas'];
		$insertlot = array(
			"nama_lot" => $nama_lot,
			"kapasitas" => $kapasitas
			);
		$this->m_penerimaan->Getinsert('tb_lot',$insertlot);
		redirect('penerimaan/indexgudang');
	}
	public function editlot($id){
		$lot = $this->m_penerimaan->Getpenyimpanan("where id_lot = '$id' ");
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
		$this->m_penerimaan->Getupdate('tb_lot',$insertlot,$where);
		redirect('penerimaan/indexgudang');
	}
	public function hapuslot($id){
		$where = array('id_lot' => $id);
		$this->m_penerimaan->Getdelete('tb_lot',$where);
		redirect('penerimaan/indexgudang');
	}
	//------------------------------------------------------------------------------------------------
	public function editposisilot($id_penerimaan){
		$lot = $this->m_penerimaan->Gettampilpenerimaan("where id_penerimaan = '$id_penerimaan' ");
		$datalot = array(
			"id_penerimaan" =>$lot[0]['id_penerimaan'],
			"id_lot" =>$lot[0]['id_lot'],
			"nama_barang"=>$lot[0]['nama_barang']
			);
		$datalot['datalot'] = $this->m_penerimaan->Getpenyimpanan();
		$datalot['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('edit_posisirak',$datalot);
	}
	public function updateposisilot(){
		$id_penerimaan = $_POST['id_penerimaan'];
		$nama_barang = $_POST['barang'];
		$id_lot = $_POST['editposisilot'];
		$updatelot = array(
			'id_lot' => $id_lot,
			);
		$where = array('id_penerimaan' => $id_penerimaan);
		$this->m_penerimaan->Getupdate('tb_penerimaan',$updatelot,$where);
		redirect('penerimaan/penerimaan');
	}
	//------------------------------------------------------------------------------------------------
	public function edithargajual($id_penerimaan){
		$harga = $this->m_penerimaan->Gettampilpenerimaan("where id_penerimaan = '$id_penerimaan'");
		$dataharga = array(
			"id_penerimaan" =>$harga[0]['id_penerimaan'],
			"nama_barang"=>$harga[0]['nama_barang'],
			"harga_jual" =>$harga[0]['harga_jual']
			);
		//$datalot['penerimaan'] = $this->m_penerimaan->Getpenerimaan2($id_penerimaan)->row();
		$dataharga['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('edit_hargajual',$dataharga);
	}
	public function updetehargajual(){
		$id_penerimaan = $_POST['id_penerimaan'];
		$nama_barang = $_POST['barang'];
		$harga_jual = $_POST['harga_jual'];
		$updatehargajual = array(
			'harga_jual' => $harga_jual
			);
		$where = array('id_penerimaan' => $id_penerimaan);
		$this->m_penerimaan->Getupdate('tb_penerimaan',$updatehargajual,$where);
		redirect('penerimaan/penerimaan');
	}

	public function delete_pembelian($kd_pembelian)
	{
		$data = $this->m_penerimaan->select_by_id($kd_pembelian)->row();
		$this->m_penerimaan->delete_kdpembelian($kd_pembelian,$data);
		redirect('penerimaan/penerimaan');
	}
	//------------------------------------------------------------------------------------------------
	
	public function insert_penerimaan(){

		$kode = $this->m_penerimaan->buat_kode_penerimaan();

		// var_dump($kode);
		// die();

		$kd = $this->input->post('kd_barang');
		$kd_pembelian = $this->input->post('kd_pembelian');
		$harga_barang = $this->input->post('harga_barang');
		$nama_barang = $this->input->post('nama_barang');
		$harga_jual = $this->input->post('harga_jual');
		$suplier = $this->input->post('suplier');
		$merek = $this->input->post('merek');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$jumlah_masuk = $this->input->post('jumlah_masuk');
		$result = array();
		for ($i = 0; $i < count($kd); $i++ ) {
			// $barang = $this->m_penerimaan->find_bypembelian($kd[$i]);
			$result = array(
				'kd_pembelian' => $kode,
				'suplier' => $suplier[$i],
				'kd_barang' => $kd[$i],
				'nama_barang' => $nama_barang[$i],
				'merek' => $merek[$i],
				'harga_barang' => $harga_barang[$i],
				'harga_jual' => $harga_barang[$i] * 10/100 + $harga_barang[$i],
				'jumlah_barang' => $jumlah_barang[$i],
				'jumlah_masuk' => $jumlah_barang[$i],
				'tgl_penerimaan' => date('Y-m-d h:i:s'),
			);

			$test = $this->db->insert('tb_penerimaan',$result);
			$id = $this->db->insert_id();

			$pembelian = $this->m_penerimaan->find_byidstok($id);

			$cek = $this->m_penerimaan->find_byidstok_ready($kd[$i],$suplier[$i]);

			if (!$cek) {
				 // var_dump("ada");
				$data = array(
				'id_penerimaan' =>$pembelian->id_penerimaan,
				'kd_pembelian' =>$pembelian->kd_pembelian,
				'kd_barang' =>$pembelian->kd_barang,
				'nama_barang' =>$pembelian->nama_barang,
				'harga_barang' =>$pembelian->harga_barang,
				'merek' =>$pembelian->merek,
				'jumlah_barang' =>$pembelian->jumlah_masuk,
				'id_lot' =>'1',
				'harga_jual' =>$pembelian->harga_jual,
				'suplier' =>$pembelian->suplier,
				'tgl_penerimaan'=>$pembelian->tgl_penerimaan
				);

				$this->m_penerimaan->insert_stock($data);

			}
		}
		// var_dump($result["harga_jual"]);
		// die();

			
			// die();
		if($test){
			redirect('penerimaan/reset');
		}else{
			echo "gagal";
		}
	}

	public function reset(){
		$this->m_penerimaan->reset_tmp_barang('tb_tmp_barang');
		redirect('penerimaan/penerimaan');
	}

	public function simpanbarang(){
		//$data_pembelian = $this->m_penerimaan->master_finds('id_penerimaan');
		//if ( $data_pembelian >= [5] ) {
		//	$this->session->set_flashdata('simpan','Lot Penyimpanan Penuh');
        //        redirect('penerimaan/penerimaan');
		//}else{
			$data_pembelian = $this->input->post('id_pembelian');
			foreach ($data_pembelian as $id_pembelian) {
				$pembelian = $this->m_penerimaan->find_byid($id_pembelian);
				$lot = $this->input->post('simpanlot');
				$harga_jual = $this->input->post('harga_jual');
				$data = array(
						'kd_pembelian' =>$pembelian->kd_pembelian,
						'kd_barang' =>$pembelian->kd_barang,
						'nama_barang' =>$pembelian->nama_barang,
						'harga_barang' =>$pembelian->harga_barang,
						'merek' =>$pembelian->merek,
						'jumlah_barang' =>$pembelian->jumlah_barang,
						'id_lot' =>$lot,
						'harga_jual' =>$harga_jual,
						'suplier' =>$pembelian->suplier,
						'tgl_penerimaan'=> date('Y-m-d')
					);
			//}
			$this->m_penerimaan->insert_pembelian($data);
			//$where=array('id_pembelian' =>$id_pembelian);
			//$this->m_penerimaan->delete_pembelian($where);
			redirect('penerimaan/penerimaan');
		}
	}

	public function do_update_penerimaan(){
		$id = $this->input->post('id_penerimaan');
		$jumlah_masuk = $this->input->post('jumlah_masuk');
		$result = array();
		for ($i = 0; $i < count($id); $i++ ) {
			$id_penerimaan = $this->input->post('id_penerimaan');
			$result = array(
				'id_penerimaan' => $id[$i],
				'jumlah_masuk' => $jumlah_masuk[$i],
			);
			$where = array('id_penerimaan' => $id[$i]);
	    	$this->db->update('tb_penerimaan',$result,$where);
    	}
    	redirect('penerimaan/penerimaan');
    }

    public function do_update_penerimaan_staf(){
		$id = $this->input->post('id_penerimaan');
		$jumlah_masuk = $this->input->post('jumlah_masuk');
		$result = array();
		for ($i = 0; $i < count($id); $i++ ) {
			$id_penerimaan = $this->input->post('id_penerimaan');
			$result = array(
				'id_penerimaan' => $id[$i],
				'jumlah_masuk' => $jumlah_masuk[$i],
			);
			$where = array('id_penerimaan' => $id[$i]);
	    	$this->db->update('tb_penerimaan',$result,$where);
    	}
    	redirect('penerimaan/penerimaan_staf');
    }
	
	function create(){
		echo json_encode(array("id"=>$this->crud_model->create()));
	}

	function update(){
		$id= $this->input->post("id");
		$value= $this->input->post("value");
		$modul= $this->input->post("modul");
		$this->crud_model->update($id,$value,$modul);
		echo "{}";
	}

	function delete(){
		$id= $this->input->post("id");
		$this->m_penerimaan->delete($id);
		echo "{}";
	}	
}