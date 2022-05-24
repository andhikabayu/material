<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merek extends CI_Controller {
	  public function __construct()    
	  {
	  	parent::__construct();        
	  	$this->load->helper('url');        
	  	$this->load->library('input');        
	  	$this->load->model(array('m_merek'));
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');    
	  } 

	public function index()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['datamerek'] = $this->m_merek->select_all_merek()->result_array();
		$this->load->view('merek',$data); 
	}

	public function proses_input_merek()
	{
		$merek = $_POST['merek'];
		$data = array(
			"merek" =>$merek
			);
		$this->m_merek->insert_merek($data);
		redirect(site_url('merek/merek'));
	}
	public function edit_merek($id_merek)
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$data['merek'] = $this->m_merek->select_by_id_merek($id_merek)->row();
		$this->load->view('edit_merek',$data);
	}
	public function proses_edit_merek($id_merek)
	{
		$id_merek = $_POST['id_merek'];
		$merek = $_POST['merek'];
		$data = array(
			"merek" =>$merek
			);
		$this->m_merek->update_merek($id_merek, $data);  
		redirect('merek/merek',$data);
	}
	public function delete_merek($id_merek)
	{
		$data = $this->m_merek->select_by_id($id_merek)->row();
		$this->m_merek->delete_merek($id_merek,$data);
		redirect('merek/merek');
	}
	function delete(){
		$id= $this->input->post("id");
		$this->m_merek->delete($id);
		echo "{}";
	}	

}