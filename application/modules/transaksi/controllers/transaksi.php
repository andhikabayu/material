<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
	  parent::__construct();
	  $this->load->library('cart');
	  $this->load->helper(array('url'));
	  $this->load->library('input');        
	  $this->load->model(array('m_transaksi'));
	  $this->load->helper('form'); 
	  $this->load->library('session');
	  $this->load->library('form_validation');    
	}

	public function index()
	{
	  $data['session_data'] = $this->session->userdata('logged_in');
	  $data['penerimaan'] = $this->m_transaksi->retrieve_penerimaan();
	  $data['kode'] = $this->m_transaksi->buat_kode_barang();
	  $data['datakeranjang'] = $this->m_transaksi->select_all_keranjang()->result();
	  $data['datajumlah'] = $this->m_transaksi->countdatabarang();
	  $this->load->view('transaksi',$data); 
	}

	public function form_cetakNota()
	{
		$data['data_penjualan'] = $this->m_transaksi->select_group_penjualan()->result();
		// var_dump($data);
		// die();
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('formCetak_nota',$data);
	}

	public function nota_penjualan($no_faktur)
	{
		$qry = $this->m_transaksi->select_all_penjualan("where no_faktur = '$no_faktur' ");
	   	$data = array(
		   	"no_faktur" =>$qry[0]['no_faktur'],
		   	"tgl_transaksi" =>$qry[0]['tgl_transaksi'],
		   	"total" =>$qry[0]['total']
	   	);
		$data['detail'] = $this->m_transaksi->select_all_penjualan("where no_faktur = '$no_faktur' order by no_faktur DESC ");
   		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('nota_penjualan',$data);
	}

	public function update_bayar($no_faktur)
	{
		$bayar = $_POST['bayar'];
		$sisa = $_POST['sisa'];
		
		$status = '';
		if ($bayar >= $sisa) {
			$sisa = 0;
			$status = 'Lunas';
		} else if ($bayar < $sisa) {
			$sisa = $sisa - $bayar;
			$status = 'DP';
		}
		$data = array(
			"bayar" => $bayar,
			"sisa" => $sisa,
			"status" => $status
		);
		// var_dump($data);
		// die();
		$this->m_transaksi->update_bayar($no_faktur, $data);  
		redirect('transaksi/form_cetakNota');
	}

	public function detail_penjualan($no_faktur)
	{
		$qry = $this->m_transaksi->select_all_penjualan("where no_faktur = '$no_faktur' ");
	   	$data = array(
		   	"no_faktur" =>$qry[0]['no_faktur'],
		   	"tgl_transaksi" =>$qry[0]['tgl_transaksi'],
			"total" =>$qry[0]['total'],
			"bayar" => $qry[0]['bayar'],   
			"sisa" => $qry[0]['sisa'],
			"status" => $qry[0]['status'],
		);
		$data['detail'] = $this->m_transaksi->select_all_penjualan("where no_faktur = '$no_faktur' order by no_faktur DESC ");
		$data['session_data'] = $this->session->userdata('logged_in');   
		// print_r($data);
		// die();
		$this->load->view('detail_penjualan',$data);
	}

	public function tambah()
	{
	  		$nm = $this->input->post('id_penerimaan');
	  			if ($nm=="") {
	  				redirect('transaksi');
	  			}else{
	  				$nm = $this->input->post('id_penerimaan');
	  					for($i=0; $i < count($nm); $i++){
		  					$penerimaan = $this->m_transaksi->find_byid($nm[$i]);
		  					$result[] = array(
		  						"kd_barang" =>$penerimaan->kd_barang,
		  						"nama_barang" =>$penerimaan->nama_barang,
		  						"merek" =>$penerimaan->merek,
		  						"harga_barang" =>$penerimaan->harga_jual,
		  						"jumlah_barang" =>$penerimaan->jumlah_barang
		  			);
		  		}
		
	  				$test = $this->db->insert_batch('tb_keranjang',$result);
	  					if($test){
	  						redirect('transaksi');
	  	   				}else{
							redirect('transaksi');
		  	}
	   	}
	}

	public function proses_edit_data()
	{
		$ty = $this->input->post('kd_barang');
		$qty = $this->input->post('qty');
			for($i=0; $i < count($ty); $i++){
				$keranjang = $this->m_transaksi->find_bykd($ty[$i]);
				$data = array(
					"qty" =>$qty[$i]
				);
		$this->db->update('tb_keranjang', $data);  
		redirect('transaksi',$data);
	}
}

	public function menu()
	{
	  $this->load->view('menu_kasir');
	}

	function delete(){
		$id= $this->input->post("id");
		$this->m_transaksi->delete($id);
		echo "{}";
	}

	public function do_delete_tmp($id_tmp)
	{
	  $where = array('id_tmp' =>$id_tmp);
	  $this->m_transaksi->deletedata('tb_tmp_transaksi',$where);
	  redirect('transaksi');
	}

	public function reset()
	{
	  $data['session_data'] = $this->session->userdata('logged_in');
	  $data['penerimaan'] = $this->m_transaksi->retrieve_penerimaan();
	  $data['kode'] = $this->m_transaksi->buat_kode_barang();
	  $this->m_transaksi->reset_barang('$id');
	  redirect('transaksi/form_cetakNota');
	}

	public function proses_akhir()
	{
	  $this->form_validation->set_rules('no_faktur','kd_barang','required');
	  $this->form_validation->set_rules('kd_barang[]','kd_barang','required');
	  $this->form_validation->set_rules('harga_barang[]','harga_barang','required');

		if($this->form_validation->run() == FALSE){
			echo validation_errors();
		}else{
			$nm = $this->input->post('kd_barang');
			$result = array();
			for($i=0; $i < count($nm); $i++){
				$keranjang = $this->m_transaksi->find_bykd($nm[$i]);
				$no_faktur = $this->input->post('no_faktur');
				$qty = $this->input->post('qty');
				$subtotal = $this->input->post('subtotal');
				$no_faktur = $this->input->post('no_faktur');
				$tgl_transaksi = $this->input->post('tgl_transaksi');
				$diskon = $this->input->post('diskon');
				$total = $this->input->post('total');
				$bayar = $this->input->post('bayar');
				$sisa = $this->input->post('sisa');
				$status = 'Lunas';
				if ($bayar == 0 && $sisa > 0) {
					$status = 'Hutang';
				} else if ($bayar > 0 && $sisa > 0) {
					$status = 'DP';
				}
				$result[] = array(
					"no_faktur" =>$no_faktur,
					"nama_barang" =>$keranjang->nama_barang,
					"kd_barang" =>$keranjang->kd_barang,
					"harga_barang" =>$keranjang->harga_barang,
					"qty" =>$qty[$i],
					"subtotal" =>$subtotal[$i],
					"no_faktur" =>$no_faktur,
					"tgl_transaksi" =>$tgl_transaksi,
					"diskon" => $diskon,
					"total" =>$total,
					"bayar" => $bayar,
					"sisa" => $sisa,
					"status" => $status
					);
			}
				$er = $this->db->insert_batch('tb_penjualan',$result);
					if($er){
						redirect('transaksi/reset');
					}else
						redirect('transaksi');
					}
			}
}
