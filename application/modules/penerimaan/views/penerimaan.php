<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filter Barang</title>
</head>
	<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>dataTables.bootstrap.css">
<body style="background-image:url(<?php echo base_url() ?>assets/images/88.jpg)">
	<?php 
	if ($session_data['id_level']==2) {
		include "menu_admin.php";
	}else{
		include "menu_stafgudang.php";
	}
	?>

<main>
<div class="container">

        
        <!--Body-->
		<!--Panel-->
		<form action="<?php echo base_url() ?>index.php/penerimaan/insert_penerimaan" method="POST">
		<div class="main-wrapper z-depth-2 white">
    	  <div class="grey darken-3" align="center" style="padding:10px;">
			<h1 class="white-text">Penerimaan Barang<a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>index.php/pembelian/tranpembelian"><i class="fa fa-list"></i>Pembelian </a></h1>
	      </div>
	      <br>
	      <div class="container-fluid">
        	<h5 class="pull-right"><?php echo date('l, d-m-Y') ?></h5>
          </div>
		<div class="container-fluid" align="center">
		<div class="md-form col-md-6">
		  	<input type="text" id="form20" name="kd_pembelian" class="form-control" value="<?php echo $kd_pembelian ?>" readonly required>
		    <label for="form20" class="">Kd pembelian</label>
		</div>
		<div class="md-form col-md-6">
		  	<input type="text" id="form2" name="tgl_pembelian" class="form-control" value="<?php echo $tgl_pembelian ?>" readonly required>
		    <label for="form2" class="">Tgl Pembelian</label>
		</div>
        <div class="row table-responsive">
    		<table class="table table-hover thead-inverse data">
				<thead>
					<th>No</th>
					<th>KD Barang</th>
					<th>Nama Barang</th>
					<th>Merek</th>
					<th>Harga Barang</th>
					<th>Harga Jual</th>
					<th>Jumlah</th>
					<th>Jumlah Terima</th>
				</thead>
				<tbody>
				<?php 
				$no=0;
				foreach($filter as $data){
				$no++;
				$harga_jual = $data['harga_barang'] * 10/100 + $data['harga_barang'];
				?>
				<input type="hidden" name="tgl_penerimaan[]" value="<?php echo date('Y-m-d h:i:s'); ?>">
				<input type="hidden" name="suplier[]" value="<?php echo $data['suplier'] ?>">
				  <tr>
				  	<td><?php echo $no ?></td>
					<td><input type="hidden" name="kd_barang[]" value="<?php echo $data['kd_barang'] ?>"><?php echo $data['kd_barang'] ?></td>
					<td><input type="hidden" name="nama_barang[]" value="<?php echo $data['nama_barang'] ?>"><?php echo $data['nama_barang'] ?></td>
					<td><input type="hidden" name="merek[]" value="<?php echo $data['merek'] ?>"><?php echo $data['merek'] ?></td>
					<td><input type="hidden" name="harga_barang[]" value="<?php echo $data['harga_barang'] ?>">Rp.<?php echo $data['harga_barang'] ?>,-</td>
					<td><input type="hidden" name="harga_jual[]" value="<?php echo $harga_jual ?>">Rp.<?php echo $harga_jual ?>,-</td>
					<td><input type="hidden" name="jumlah_barang[]" value="<?php echo $data['jumlah_barang'] ?>"><?php echo $data['jumlah_barang'] ?></td>
					<td><input type="number" name="jumlah_masuk[]" id="id_<?php echo $no ?>" onchange="validasi(<?php echo $no ?>)" name="jumlah_terima" placeholder="Jumlah Terima" max="<?php echo $data['jumlah_barang'] ?>"><p id="info_<?php echo $no ?>" class="text-danger"></p></td>
				  </tr>
				  <?php } ?>
				</tbody>
			</table>
		</div>
		<div class="row col-md-12" align="center">
			<button name="simpan" class="btn btn-secondary waves-effect">Simpan</button>
		</div>
		</div>
		<br>
		</div>
		</form>
		<!--/.Panel-->
<br>
</main>
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
<script>
	function validasi(id){
		var txt = "";
		if (document.getElementById("id_" + id).validity.rangeOverflow){
			txt = "Lebih";
			toastr.error('Maaf, Jumlah Terima Melebihi Jumlah Beli.', 'Error!')
		}
		document.getElementById("info_" + id).innerHTML = txt;
	}
</script>
</body>
</html>