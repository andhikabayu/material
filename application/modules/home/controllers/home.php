<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	  public function __construct()    
	  {
	  	parent::__construct();        
	  	$this->load->helper('url');        
	  	$this->load->library('input');        
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');    
	  } 

	public function index()
	{
		$this->load->view('login'); 
	}
	public function home_manager()
	{
		if($this->session->userdata('logged_in'))
		   {
		     $data['session_data'] = $this->session->userdata('logged_in');
		     $this->load->view('home_manager',$data);
		   }
		   else
		   {
		     //Jika tidak ada session di kembalikan ke halaman login
		     redirect('login/login_manager', 'refresh');
		   }
	}
	public function home_admin()
	{
		if($this->session->userdata('logged_in'))
		   {
		     $data['session_data'] = $this->session->userdata('logged_in');
		     $this->load->view('home_admin',$data);
		   }
		   else
		   {
		     //Jika tidak ada session di kembalikan ke halaman login
		     redirect('login/login_admin', 'refresh');
		   }
	}
	public function home_kasir()
	{
		if($this->session->userdata('logged_in'))
		   {
		     $data['session_data'] = $this->session->userdata('logged_in');
		     $this->load->view('home_kasir',$data);
		   }
		   else
		   {
		     //Jika tidak ada session di kembalikan ke halaman login
		     redirect('login/login_kasir', 'refresh');
		   }
	}
	public function home_stafgudang()
	{
		if($this->session->userdata('logged_in'))
		   {
		     $data['session_data'] = $this->session->userdata('logged_in');
		     $this->load->view('home_stafgudang',$data);
		   }
		   else
		   {
		     //Jika tidak ada session di kembalikan ke halaman login
		     redirect('login/login_stafgudang', 'refresh');
		   }
	}

}