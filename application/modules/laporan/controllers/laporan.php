<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
	  public function __construct()    
	  {
	  	parent::__construct();        
	  	$this->load->helper('url');        
	  	$this->load->library('input');        
	  	$this->load->model(array('m_laporan'));
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');    
	  } 

	public function index()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('laporan',$data); 
	}
	public function laporan_manager()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('laporan_manager',$data); 
	}
	public function down_lap_merek() {	
		// Load all views as normal
		$data['datamerek'] = $this->m_laporan->select_all_merek()->result();
		$this->load->view('laporan/laporan_merek',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_merek.pdf");
		
	}
	public function see_lap_merek() {	
		// Load all views as normal
		// $data['datamerek'] = $this->m_laporan->select_all_merek()->result();
		// $this->load->view('laporan/see_lap_merek',$data);

		$data['datamerek'] = $this->m_laporan->select_all_merek()->result();
		$this->load->view('laporan/laporan_merek',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_merek.pdf", array("Attachment" => false));
	}

	public function down_lap_suplier() {	
		// Load all views as normal
		$data['datasuplier'] = $this->m_laporan->select_all_suplier()->result();
		$this->load->view('laporan/laporan_suplier',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_suplier.pdf");
		
	}
	public function see_lap_suplier() {	
		// Load all views as normal
		$data['datasuplier'] = $this->m_laporan->select_all_suplier()->result();
		$this->load->view('laporan/laporan_suplier',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_suplier.pdf", array("Attachment" => false));
	}

	public function down_lap_rak() {	
		// Load all views as normal
		$data['datarak'] = $this->m_laporan->select_all_rak()->result();
		$this->load->view('laporan/laporan_rak',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_rak.pdf");
		
	}
	public function see_lap_rak() {	
		// Load all views as normal
		$data['datarak'] = $this->m_laporan->select_all_rak()->result();
		$this->load->view('laporan/laporan_rak',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_rak.pdf", array("Attachment" => false));
	}

	public function down_lap_barang() {	
		// Load all views as normal
		$data['databarang'] = $this->m_laporan->select_all_barang()->result();
		$this->load->view('laporan/laporan_barang',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_barang.pdf");
	}
	public function see_lap_barang() {	
		// Load all views as normal
		$data['databarang'] = $this->m_laporan->select_all_barang()->result();
		$this->load->view('laporan/laporan_barang',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_barang.pdf", array("Attachment" => false));
	}

	public function down_lap_pembelian() {	
		// Load all views as normal
		$data['datapembelian'] = $this->m_laporan->select_all_pembelian()->result();
		$this->load->view('laporan/laporan_pembelian',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_pembelian.pdf");
		
	}
	public function see_lap_pembelian($from,$to) {
		// var_dump($from);
		// var_dump($to);
		// die();	
		// Load all views as normal
		$data['datapembelian'] = $this->m_laporan->select_all_pembelian()->result();
		$this->load->view('laporan/laporan_pembelian',$data);
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_pembelian.pdf", array("Attachment" => false));
	}

	public function down_lap_penjualan() {	
		// Load all views as normal
		$data['dat_penjualan'] = $this->m_laporan->select_group_penjualan()->result();
		$this->load->view('laporan/laporan_penjualan',$data);
		// Get output html
		$html = $this->output->get_output();

		// Load library
		$this->load->library('dompdf_gen');

		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_penjualan.pdf");

	}
	public function see_lap_penjualan() {	
		// Load all views as normal
		$data['dat_penjualan'] = $this->m_laporan->select_group_penjualan()->result();
		$this->load->view('laporan/laporan_penjualan',$data);
		// Get output html
		$html = $this->output->get_output();

		// Load library
		$this->load->library('dompdf_gen');

		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_penjualan.pdf", array("Attachment" => false));
	}

	function pdf()
	{
	     $this->load->helper(array('dompdf', 'file'));
	     // page info here, db calls, etc.     
	     $html = $this->load->view('laporan/laporan_merek', $data, true);
	     pdf_create($html, 'filename');
	     //or
	     $data = pdf_create($html, '', false);
	     write_file('name', $data);
	     //if you want to write it to disk and/or send it as an attachment    
	}
}