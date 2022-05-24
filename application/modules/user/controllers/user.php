<?php
class User extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();  
        $this->load->model('modelku');
        $this->load->library('upload');
    }
    public function navbar(){
        $this->view('nav');
    }
    public function index() {
        $data['session_data'] = $this->session->userdata('logged_in');
        $data['datalevel'] = $this->modelku->Getlevel();
        $data['data'] = $this->modelku->Getadmin();
        $this->load->view('input_admin',$data);
    }
    public function input_user() {
        $data['session_data'] = $this->session->userdata('logged_in');
        $data['datalevel'] = $this->modelku->Getlevel();
        $data['qwuser'] = $this->modelku->master_finds();
        $data['datauser'] = $this->modelku->Getuser();
        $data['datakasir'] = $this->modelku->Getkasir();
        $data['datastafgudang'] = $this->modelku->Getstafgudang();
        $this->load->view('input_user',$data);
    }
    public function input_user_error() {
        $data['session_data'] = $this->session->userdata('logged_in');
        $data['datalevel'] = $this->modelku->Getlevel();
        $data['datakasir'] = $this->modelku->Getkasir();
        $data['datastafgudang'] = $this->modelku->Getstafgudang();
        $this->load->view('input_user_error',$data);
    }
    public function input_stafgudang() {
        $data['session_data'] = $this->session->userdata('logged_in');
        $data['datalevel'] = $this->modelku->Getlevel();
        $data['datakasir'] = $this->modelku->Getkasir();
        $data['datastafgudang'] = $this->modelku->Getstafgudang();
        $this->load->view('input_stafgudang',$data);
    }
    public function input_stafgudang_error() {
        $data['session_data'] = $this->session->userdata('logged_in');
        $data['datalevel'] = $this->modelku->Getlevel();
        $data['datakasir'] = $this->modelku->Getkasir();
        $data['datastafgudang'] = $this->modelku->Getstafgudang();
        $this->load->view('input_stafgudang_error',$data);
    }
    public function input_admin() {
        $data['session_data'] = $this->session->userdata('logged_in');
        $data['datalevel'] = $this->modelku->Getlevel();
        $data['data'] = $this->modelku->Getadmin();
        $this->load->view('input_admin',$data);
    }
    public function input_admin_error() {
        $data['session_data'] = $this->session->userdata('logged_in');
        $data['datalevel'] = $this->modelku->Getlevel();
        $data['data'] = $this->modelku->Getadmin();
        $this->load->view('input_admin_error',$data);
    }

    public function do_insert_admin()
        {
            if ($_FILES['filefoto']['error'] != 4) {
                   $config['upload_path'] = './assets/uploads';
                   $config['allowed_types'] = '*';
                   $config['file_name'] = $this->input->post('filefoto') . "_" . uniqid();
                   $config['overwrite'] = TRUE;
                   $this->upload->initialize($config);
                   if ($this->upload->do_upload('filefoto')) {
                       $datafile = $this->upload->data();
                       $image_name = $datafile['file_name'];
                       $data = array(
                          'foto' =>$image_name,
                          'username' =>$this->input->post('username'),
                          'nama' =>$this->input->post('nama'),
                          'password' =>$this->input->post('password'),
                          'no_telp' =>$this->input->post('no_telp'),
                          'id_level' =>$this->input->post('id_level') 
                        );
                    $password = $this->input->post('password');
                     $password2 = $this->input->post('password2');
                     if($password==$password2){
                      $this->db->insert('tb_user',$data);
                      redirect(site_url('user/input_admin'));
                     }else{
                      $this->session->set_flashdata('alert','Password Tidak sama Silahkan isi Kembali');
                      redirect('user/input_admin_error'); 
                     }
                   } else {
                       $this->session->set_flashdata('messages', $this->upload->display_errors());
                       redirect('user/input_admin');
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
        public function do_update_admin()
        {
            if ($_FILES['filefoto']['error'] != 4) {
                   $config['upload_path'] = './assets/uploads';
                   $config['allowed_types'] = '*';
                   $config['file_name'] = $this->input->post('filefoto') . "_" . uniqid();
                   $config['overwrite'] = TRUE;
                   $id_user = $this->input->post('id_user');
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
                      redirect(site_url('user/input_admin'));
                     }else{
                      $this->session->set_flashdata('alert','Password Tidak sama Silahkan isi Kembali');
                      redirect('user/input_admin_error'); 
                     }
                   } else {
                       $this->session->set_flashdata('messages', $this->upload->display_errors());
                       redirect('user/input_admin');
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

        public function do_insert_user()
        {
            if ($_FILES['filefoto']['error'] != 4) {
                   $config['upload_path'] = './assets/uploads';
                   $config['allowed_types'] = '*';
                   $config['file_name'] = $this->input->post('filefoto') . "_" . uniqid();
                   $config['overwrite'] = TRUE;
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
                          'no_telp' =>$this->input->post('no_telp'),
                          'id_level' =>$id_level
                        );
                     $password = $this->input->post('password');
                     $password2 = $this->input->post('password2');
                     if($password==$password2){
                      $this->modelku->Getinsert('tb_user',$data);
                      redirect(site_url('user/input_user')); 
                     }else{
                      $this->session->set_flashdata('alert','Password Tidak sama Silahkan isi Kembali');
                      redirect('user/input_user_error'); 
                     }
                   } else {
                       $this->session->set_flashdata('messages', $this->upload->display_errors());
                       redirect('user/input_user');
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
        public function do_update_user()
        {
            if ($_FILES['filefoto']['error'] != 4) {
                   $config['upload_path'] = './assets/uploads';
                   $config['allowed_types'] = '*';
                   $config['file_name'] = $this->input->post('filefoto') . "_" . uniqid();
                   $config['overwrite'] = TRUE;
                   $id_user = $this->input->post('id_user');
                   $this->upload->initialize($config);
                   if ($this->upload->do_upload('filefoto')) {
                       $datafile = $this->upload->data();
                       $image_name = $datafile['file_name'];
                       $data = array(
                          'foto' =>$image_name,
                          'username' =>$this->input->post('username'),
                          'nama' =>$this->input->post('nama'),
                          'password' =>$this->input->post('password'),
                          'no_telp' =>$this->input->post('no_telp'),
                          'id_level' =>$this->input->post('id_level')
                        );
                     $password = $this->input->post('password');
                     $password2 = $this->input->post('password2');
                     if($password==$password2){
                      $where = array('id_user' => $id_user);   
                      $this->db->update('tb_user',$data,$where);
                      redirect(site_url('user/input_user'));
                     }else{
                      $this->session->set_flashdata('alert','Password Tidak sama Silahkan isi Kembali');
                      redirect('user/input_user_error'); 
                     }
                   } else {
                       $this->session->set_flashdata('messages', $this->upload->display_errors());
                       redirect('user/input_user');
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
        public function do_insert_staf()
        {
            if ($_FILES['filefoto']['error'] != 4) {
                   $config['upload_path'] = './assets/uploads';
                   $config['allowed_types'] = '*';
                   $config['file_name'] = $this->input->post('filefoto') . "_" . uniqid();
                   $config['overwrite'] = TRUE;
                   $this->upload->initialize($config);
                   if ($this->upload->do_upload('filefoto')) {
                       $datafile = $this->upload->data();
                       $image_name = $datafile['file_name'];
                       $data = array(
                          'foto' =>$image_name,
                          'username' =>$this->input->post('username'),
                          'nama' =>$this->input->post('nama'),
                          'password' =>$this->input->post('password'),
                          'no_telp' =>$this->input->post('no_telp'),
                          'id_level' =>$this->input->post('id_level')
                        );
                     $password = $this->input->post('password');
                     $password2 = $this->input->post('password2');
                     if($password==$password2){
                      $this->modelku->Getinsert('tb_user',$data);
                      redirect(site_url('user/input_stafgudang'));
                     }else{
                      $this->session->set_flashdata('alert','Password Tidak sama Silahkan isi Kembali');
                      redirect('user/input_stafgudang_error'); 
                     }
                   } else {
                       $this->session->set_flashdata('messages', $this->upload->display_errors());
                       redirect('user/input_stafgudang');
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
        public function do_update_staf()
        {
            if ($_FILES['filefoto']['error'] != 4) {
                   $config['upload_path'] = './assets/uploads';
                   $config['allowed_types'] = '*';
                   $config['file_name'] = $this->input->post('filefoto') . "_" . uniqid();
                   $config['overwrite'] = TRUE;
                   $id_user = $this->input->post('id_user');
                   $this->upload->initialize($config);
                   if ($this->upload->do_upload('filefoto')) {
                       $datafile = $this->upload->data();
                       $image_name = $datafile['file_name'];
                       $data = array(
                          'foto' =>$image_name,
                          'username' =>$this->input->post('username'),
                          'nama' =>$this->input->post('nama'),
                          'password' =>$this->input->post('password'),
                          'no_telp' =>$this->input->post('no_telp'),
                          'id_level' =>$this->input->post('id_level')
                        );

                     $password = $this->input->post('password');
                     $password2 = $this->input->post('password2');
                     if($password==$password2){
                      $where = array('id_user' => $id_user);   
                      $this->db->update('tb_user',$data,$where);
                      redirect(site_url('user/input_stafgudang'));
                     }else{
                      $this->session->set_flashdata('alert','Password Tidak sama Silahkan isi Kembali');
                      redirect('user/input_stafgudang_error'); 
                     }
                   } else {
                       $this->session->set_flashdata('messages', $this->upload->display_errors());
                       redirect('user/input_stafgudang');
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

    	public function editadmin($id){
    		$qry = $this->modelku->Getuser("where id_user = '$id' ");
    		$data = array(
    			"id_user" =>$qry[0]['id_user'],
    			"user" =>$qry[0]['username'],
    			"pass" =>$qry[0]['password'],
    			"nama" =>$qry[0]['nama'],
    			"no_telp" =>$qry[0]['no_telp'],
    			"filefoto" =>$qry[0]['foto'],
    			"id_level" =>$qry[0]['id_level']
    			);
            $data['session_data'] = $this->session->userdata('logged_in');
    		$this->load->view('edit_admin',$data);
    	}
        public function hapusadmin($id){
        	$where = array('id_user' => $id);
        	$user = $this->modelku->Gethapus('tb_user',$where);
        	if ($user >= 1) {
        		$this->session->set_flashdata('hapus','Data Berhasil Terhapus');
                    redirect('user/input_admin');
                 }else{
                    echo "<script>alert('Data Gagal Terhapus')</script>";
            }
        }

        public function edituser($id){
            $qry = $this->modelku->Getuser("where id_user = '$id' ");
            $data = array(
                "id_user" =>$qry[0]['id_user'],
                "user" =>$qry[0]['username'],
                "pass" =>$qry[0]['password'],
                "nama" =>$qry[0]['nama'],
                "no_telp" =>$qry[0]['no_telp'],
                "filefoto" =>$qry[0]['foto'],
                "id_level" =>$qry[0]['id_level']
                );
            $data['session_data'] = $this->session->userdata('logged_in');
            $this->load->view('edit_user',$data);
        }
        public function editstaf($id){
            $qry = $this->modelku->Getuser("where id_user = '$id' ");
            $data = array(
                "id_user" =>$qry[0]['id_user'],
                "user" =>$qry[0]['username'],
                "pass" =>$qry[0]['password'],
                "nama" =>$qry[0]['nama'],
                "no_telp" =>$qry[0]['no_telp'],
                "filefoto" =>$qry[0]['foto'],
                "id_level" =>$qry[0]['id_level']
                );
            $data['session_data'] = $this->session->userdata('logged_in');
            $this->load->view('edit_stafgudang',$data);
        }
        public function hapususer($id){
            $where = array('id_user' => $id);
            $user = $this->modelku->Gethapus('tb_user',$where);
            if ($user >= 1) {
                $this->session->set_flashdata('hapus','Data Berhasil Terhapus');
                    redirect('user/input_user');
                 }else{
                    echo "<script>alert('Data Gagal Terhapus')</script>";
            }
        }
        public function hapusstaf($id){
            $where = array('id_user' => $id);
            $user = $this->modelku->Gethapus('tb_user',$where);
            if ($user >= 1) {
                $this->session->set_flashdata('hapus','Data Berhasil Terhapus');
                    redirect('user/input_stafgudang');
                 }else{
                    echo "<script>alert('Data Gagal Terhapus')</script>";
            }
        }
        function delete(){
          $id= $this->input->post("id");
          $this->modelku->delete($id);
          echo "{}";
        } 
}