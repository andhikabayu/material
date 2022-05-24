<?php
class Suplier extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('m_suplier');
    }
    public function index() {
        $data['session_data'] = $this->session->userdata('logged_in');
        $data['datasuplier'] = $this->m_suplier->Getsuplier();
        $this->load->view('suplier',$data);
    }
    public function do_insert_suplier(){
        $suplier = $_POST['suplier'];
        $no = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        $insertuser = array(
            'suplier' => $suplier,
            'no_telp' => $no,
            'alamat' => $alamat
        );
            $user = $this->m_suplier->Getinsert('tb_suplier',$insertuser);
        if ($user >= 1) {
            $this->session->set_flashdata('simpan','Data Berhasil Tersimpan');
                redirect('suplier/suplier');
             }else{
                echo "<script>alert('Data Gagal Tersimpan')</script>";
            }

        }
    	public function editsuplier($id){
    		$qry = $this->m_suplier->Getsuplier("where id_suplier = '$id' ");
    		$data = array(
    			"id_suplier" =>$qry[0]['id_suplier'],
    			"suplier" =>$qry[0]['suplier'],
    			"no_telp" =>$qry[0]['no_telp'],
    			"alamat" =>$qry[0]['alamat'],
    			);
            $data['session_data'] = $this->session->userdata('logged_in');
    		$this->load->view('edit_suplier',$data);
    	}
    	public function updatesuplier(){
    		$id_suplier = $_POST['id_suplier'];
    		$suplier = $_POST['suplier'];
	    	$no_telp = $_POST['no_telp'];
	    	$alamat = $_POST['alamat'];
	    	$updatetuser = array(
	    		'suplier' => $suplier,
	    		'no_telp' => $no_telp,
	    		'alamat' => $alamat
	    		);
	    	$where = array('id_suplier' => $id_suplier);
	    	$user = $this->m_suplier->Getupdate('tb_suplier',$updatetuser,$where);
	    	if ($user >= 1) {
	    		$this->session->set_flashdata('update','Data Berhasil Terupdate');
	                redirect('suplier/suplier');
	             }else{
	                echo "<script>alert('Data Gagal Terupdate')</script>";
	        }
    	}
        public function hapussuplier($id){
        	$where = array('id_suplier' => $id);
        	$suplier = $this->m_suplier->Gethapus('tb_suplier',$where);
    	if ($suplier >= 1) {
    		$this->session->set_flashdata('hapus','Data Berhasil Terhapus');
                redirect('suplier/suplier');
             }else{
                echo "<script>alert('Data Gagal Terhapus')</script>";
             }
        }
        function delete(){
        $id= $this->input->post("id");
        $this->m_suplier->delete($id);
        echo "{}";
    }   
 
}