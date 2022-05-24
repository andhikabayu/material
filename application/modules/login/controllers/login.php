<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	  public function __construct()    
	  {
	  	parent::__construct();        
	  	$this->load->helper('url');        
	  	$this->load->library('input');
	  	$this->load->model(array('m_login'));        
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');    
	  } 

	public function index()
	{
		$this->load->view('login'); 
	}
  public function login_success()
  {
    $this->load->view('login_success'); 
  }

function verifylogin()
 {
   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Jika validasi gagal user akan diarahkan kembali ke halaman login
     $this->load->view('login/login');
   }
   else
   {
   	$data_login = $this->session->userdata('logged_in');
   	if($data_login['id_level'] == "1"){
		redirect('home/home_manager', 'refresh');
   	}else if($data_login['id_level'] == "2"){
   		redirect('home/home_admin', 'refresh');
   	}
   	else if($data_login['id_level'] == "3"){
   		redirect('home/home_kasir', 'refresh');
   	}
   	else if($data_login['id_level'] == "4"){
   		redirect('home/home_stafgudang', 'refresh');
   	}
     //Jika berhasil user akan di arahkan ke private area 
     
   }
 }
 function check_database($password)
 {
   //validasi field terhadap database 
   $username = $this->input->post('username');

   //query ke database
   $result = $this->m_login->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id_user' => $row->id_user,
         'nama' =>$row->nama,
         'username' => $row->username,
         'password' => $row->password,
         'no_telp' => $row->no_telp,
         'id_level' => $row->id_level,
         'foto' => $row->foto
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login/login'));
	}

}