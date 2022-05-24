<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {
	  public function __construct()    
	  {
	  	parent::__construct();        
	  	$this->load->helper('url');        
	  	$this->load->library('input');        
	  	$this->load->model(array('m_profil'));
	  	$this->load->helper('form'); 
	  	$this->load->library('session');
	  	$this->load->library('form_validation');    
	  	$this->load->library('upload');
	  } 

	public function index()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_admin',$data); 
	}
	public function profil_manager()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_manager',$data); 
	}
	public function profil_manager_error()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_manager_error',$data); 
	}
	public function profil_admin()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_admin',$data); 
	}
	public function profil_admin_error()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_admin_error',$data); 
	}
	public function profil_kasir()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_kasir',$data); 
	}
	public function profil_kasir_error()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_kasir_error',$data); 
	}
	public function profil_stafgudang()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_stafgudang',$data); 
	}
	public function profil_stafgudang_error()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('profil_stafgudang_error',$data); 
	}
	public function edit_profil_manager()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('edit_profil_manager',$data); 
	}
	public function edit_profil_admin()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('edit_profil_admin',$data); 
	}
	public function edit_profil_kasir()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('edit_profil_kasir',$data); 
	}
	public function edit_profil_stafgudang()
	{
		$data['session_data'] = $this->session->userdata('logged_in');
		$this->load->view('edit_profil_stafgudang',$data); 
	}

	public function do_update_profil()
        {
            if ($_FILES['filefoto']['error'] != 4) {
                   $config['upload_path'] = './assets/uploads';
                   $config['allowed_types'] = '*';
                   $config['file_name'] = $this->input->post('filefoto') . "_" . uniqid();
                   $config['overwrite'] = TRUE;
                   $id_user = $this->input->post('id_user');
                   $id_level = $this->input->post('id_level');
                   $this->upload->initialize($config);
                   if ($this->upload->do_upload('filefoto')) {
                       $datafile = $this->upload->data();
                       $image_name = $datafile['file_name'];
                       $data = array(
                          'foto' =>$image_name,
                          'username' =>$this->input->post('username'),
                          'nama' =>$this->input->post('nama'),
                          'password' =>$this->input->post('password'),
                          'no_telp' =>$this->input->post('no_telp')
                        );

                     $password = $this->input->post('password');
                     $password2 = $this->input->post('password2');
                     if($password==$password2){
                      $where = array('id_user' => $id_user);   
                      $this->db->update('tb_user',$data,$where);
                      redirect(site_url('login/login_success'));
                     }else{
                      if ($id_level =="1") {
                      	redirect('profil/profil_manager_error'); 
                      }
                      if ($id_level =="2") {
                      	redirect('profil/profil_admin_error'); 
                      }
                      if ($id_level =="3") {
                      	redirect('profil/profil_kasir_error'); 
                      }
                      if ($id_level =="4") {
                      	redirect('profil/profil_stafgudang_error'); 
                      }
                     }
                   } else {
                       $this->session->set_flashdata('messages', $this->upload->display_errors());
                       redirect('profil/profil_admin_error');
                   }
               }   
            if($_FILES['filefoto']['name'])
            {
                if ($this->upload->do_upload('filefoto'))
                {
                    $gbr = $this->upload->data();    
                }   
            }
        }

}