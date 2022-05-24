<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {
	  public function __construct()    
	  {
	  	parent::__construct();        
	  	$this->load->helper('url');        
	  	$this->load->library('input');        
	  	$this->load->model(array('m_barang'));
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');    
	  } 

	public function index()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['kode'] = $this->m_barang->buat_kode_barang();	
		$data['databarang'] = $this->m_barang->select_all();
		$data['datamerek'] = $this->m_barang->select_all_merek()->result_array();
		$data['qwbarang'] = $this->m_barang->master_finds();
		$this->load->view('barang',$data); 
	}

	public function proses_input_barang()
	{
		$kd_barang = $_POST['kd_barang'];
		$nama_barang = $_POST['nama_barang'];
		$id_merek = $_POST['id_merek'];
		$data = array(
			"kd_barang" =>$kd_barang,
			"nama_barang" =>$nama_barang,
			"id_merek" =>$id_merek
			);
		$this->m_barang->insert_barang($data);
		redirect(site_url('barang/barang'));
	}
	public function edit_barang($id_barang)
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['datamerek'] = $this->m_barang->select_all_merek()->result();
		$data['barang'] = $this->m_barang->select_by_id($id_barang)->row();
		$data['qwbarang'] = $this->m_barang->select_by_idqw($id_barang)->row();
		$this->load->view('edit_barang',$data);
	}
	public function proses_edit_barang($id_barang)
	{
		$id_barang = $_POST['id_barang'];
		$kd_barang = $_POST['kd_barang'];
		$nama_barang = $_POST['nama_barang'];
		$id_merek = $_POST['id_merek'];
		$data = array(
			"kd_barang" =>$kd_barang,
			"nama_barang" =>$nama_barang,
			"id_merek" =>$id_merek
			);
		$this->m_barang->update_barang($id_barang, $data);  
		redirect('barang/barang',$data);
	}
	public function delete_barang($id_barang)
	{
		$data = $this->m_barang->select_by_id($id_barang)->row();
		$this->m_barang->delete_barang($id_barang,$data);
		redirect('barang/barang');
	}
	function delete(){
		$id= $this->input->post("id");
		$this->m_barang->delete($id);
		echo "{}";
	}	

}