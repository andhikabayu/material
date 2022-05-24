<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Pembelian</title>
</head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>dataTables.bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
<style type="text/css">

td {
	cursor: pointer;
}

.editor{
	display: none;
}

</style>
<body style="background-image:url(<?php echo base_url() ?>assets/images/88.jpg)">
	<?php 
	if ($session_data['id_level']==2) {
		include "menu_admin.php";
	}else{
		include "menu_stafgudang.php";
	}
	?>

<!-- Main layout-->
<main>
    <div class="main-wrapper">
      <div class="container">
        <div class="white z-depth-2">
			<form action="<?php echo base_url() ?>index.php/pembelian/do_update_pembelian" method="post">
			<div align="center" class="grey darken-3" style="padding:10px;">
			  	<h1 class="white-text">Edit Pembelian 
			  		<a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>index.php/pembelian/"><i class="fa fa-list"></i> Pembelian</a>
			  	</h1>
			</div>
			  <br>
			  <div class="container">
			  	<div class="md-form col-md-6">
				  	<input type="text" id="form20" name="kd_pembelian" class="form-control" value="<?php echo $kd_pembelian ?>" readonly required>
				    <label for="form20" class="">Kd pembelian</label>
				</div>
				<div class="md-form col-md-6">
				  	<input type="text" id="form2" name="tgl_pembelian" class="form-control" value="<?php echo $tgl_pembelian ?>" readonly required>
				    <label for="form2" class="">Tgl Pembelian</label>
				</div>
			    <div class="col-md-12 row table-responsive">
				    <table class="table table-hover thead-inverse data">
						<thead>
							<th>No</th>
							<th>KD Barang</th>
							<th>Nama Barang</th>
							<th>Merek</th>
							<th>Harga Barang</th>
							<th>Jumlah</th>
							<th>Suplier</th>
						</thead>
						<tbody>
						<?php 
						$no=0;
						foreach($detail as $data){
						$no++;
						?>
					 	  <tr>
					 	  	<input type="hidden" name="id_pembelian[]" value="<?php echo $data['id_pembelian'] ?>">
					 	  	<td><?php echo $no ?></td>
						  	<td><?php echo $data['kd_barang'] ?></td>
							<td><?php echo $data['nama_barang'] ?></td>
							<td><?php echo $data['merek'] ?></td>
							<td><input type="number" name="harga_barang[]" value="<?php echo $data['harga_barang'] ?>"></td>
							<td><input type="number" name="jumlah_barang[]" value="<?php echo $data['jumlah_barang'] ?>"></td>
							<td><?php echo $data['suplier'] ?></td>
						   </tr>
						  <?php } ?>
						</tbody>
					</table>
					<br>
					<div class="row col-md-12" align="center">
						<button name="update" class="btn btn-secondary waves-effect">Update</button>
					</div>
				</div>
			</div>
			<br>
			</form>
        </div>
      </div>
    </div>
</main>
<!-- End Main layout-->

<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
    $('.mdb-select').material_select();
  });
</script>
<script type="text/javascript">
        $(document).ready(function(){
            $('.data').DataTable();
        });
    </script>
    <script type="text/javascript">
        function deletePembelian(id) {
            var konfirmasi = confirm("[WARNING] This action will deleted. Are you sure want to continue?");
            if (konfirmasi == true) {
                window.location = "<?php echo base_url() ?>index.php/pembelian/delete_pembelian/" + id;
            }
        }       
    </script>
    <script>
    	function simpanpem() {
          $.post("pembelian/insert_pembelian", $('#formpembelian').serialize(), function (data) {
          //alert(data);
          }).done(function (data) {
              alert("Data Tersimpan");
          }).fail(function () {
              alert("Pesan gagal dikirim");
          }).always(function () {
              //alert("finished");
          });
      }
    </script>
    <script>
	function validasi(id){
		var txt = "";
		if (document.getElementById("jumlah_" + id).validity.rangeOverflow){
			txt = "Lebih";
			toastr.error('Maaf, Jumlah Terima Melebihi Jumlah Beli.', 'Error!')
		}
		document.getElementById("info_" + id).innerHTML = txt;
	}
</script>

</body>
</html>