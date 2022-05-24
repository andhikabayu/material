<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data barang</title>
</head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">	
    <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
	<style>
		div.dataTables_length select {
			width: 75px;
			display: inline-block;
		}
	</style>
<body>
	<?php
	 	include "menu_admin.php";
	 	error_reporting(0);
	?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <form method="post" action="<?php echo base_url()?>index.php/pembelian/proses">
       <!--Content-->
       <div class="modal-content" align="center">
           <!--Header-->
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
               <h4 class="modal-title" id="myModalLabel">Pilih Barang</h4>
           </div>
           <!--Body-->
           <div class="container ">
           <div class="row table-responsive">
           <table class="table table-hover thead-inverse z-depth-1 data">
				<thead>
				<th>No.</th>
				<th>Nama Barang</th>
				<th>Merek</th>
				<th>Aksi</th>
				</thead>

				<tbody>
				<?php
				$no=0;
				$id=0; 
				foreach ($qwbarang as $row) {
				$no++;
				$id++;
				?>
				 <tr>
				 	<td align="center"><?php echo $no ?>.</td>
					<td align="center"><?php echo $row->nama_barang ?></td>
					<td align="center"><?php echo $row->merek ?></td>
					<td>
					<fieldset class="form-group">
					   <input type="checkbox" name="kd_barang[]" id="checkbox<?php echo $id; ?>" value="<?php echo $row->kd_barang ?>">
					   <label for="checkbox<?php echo $id; ?>">Pilih</label>
					</fieldset>
					</td>
				<?php } ?>
				 </tr>
				</tbody>
				</table>
				</div>
				</div>
           <!--Footer-->
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary" name="btn">Prosess</button>
           </div>
       </div>
       <!--/.Content-->
       </form>
   </div>
</div>
<!-- /.Live preview-->

<!-- Main layout-->
<main>
    <div class="main-wrapper">
      <div class="container">
        <div class="white z-depth-2">

			    <form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/penerimaan/insert_penerimaan" ?>" id="formpembelian">
					  <div align="center" class="grey darken-3" style="padding:10px;">
					  	<h1 class="white-text">Transaksi Penerimaan <a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>index.php/penerimaan/"><i class="fa fa-list"></i> Kembali</a></h1>
					  </div>
					  <br>
					  <div class="container">
					  	<div class="md-form col-md-6">
						  	<input type="text" id="form20" name="kd_pembelian" class="form-control" value="<?php echo $kode ?>" readonly required>
						    <label for="form20" class="">Kd Penerimaan</label>
						</div>
						<div class="md-form col-md-6">
						  	<input type="text" id="form2" name="tgl_pembelian" class="form-control" value="<?php echo date('Y-m-d h:i:s') ?>" readonly required>
						    <label for="form2" class="">Tgl Penerimaan</label>
						</div>
						<a class="btn btn-secondary" data-toggle="modal" data-target="#myModal" >Pilih Barang</a>
						<div class="col-md-12 row table-responsive">
							<table class="table table-hover thead-inverse col-md-12 data">
								<thead>
									<th>No</th>
									<th>Kode Barang</th>
									<th>Nama Barang</th>
									<th>Merek</th>
									<th>Harga Barang</th>
									<th>Jumlah</th>
									<th>Suplier</th>
									<th>Aksi</th>	
								</thead>
								<tbody>
								<?php 
								$no=0;
								foreach ($datatmpbarang as $r){
								$no++;

								?>
								  <tr>
								  	<td><?php echo $no ?></td>
									<td><input type="hidden" name="kd_barang[]" value="<?php echo $r['kd_barang'] ?>" readonly><?php echo $r['kd_barang'] ?></td>
									<td><input type="hidden" name="nama_barang[]" value="<?php echo $r['nama_barang'] ?>" readonly><?php echo $r['nama_barang'] ?></td>
									<td><input type="hidden" name="merek[]" value="<?php echo $r['merek'] ?>" readonly><?php echo $r['merek'] ?></td>
									<td><input type="number" name="harga_barang[]" placeholder="add Harga" required></td>
									<td><input type="number" name="jumlah_barang[]" placeholder="add Jumlah" required></td>
									<td>
										<select class="mdb-select" name="suplier[]" required>
									    	<option disabled selected>Suplier</option>
									 		<?php
											foreach ($datasuplier as $d) {
											?>
											<option value="<?PHP echo $d['suplier'] ?>"><?php echo $d['suplier']?></option>
										<?php } ?>
										</select>
									</td>
									<td>
										<a href="<?php echo base_url()."pembelian/do_delete_tmp/".$r['kd_barang']; ?>" class="btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
									</td>
								  </tr>
								  <?php } ?>
								</tbody>
							</table>
						</div>
						<div class="row col-md-12" align="center">
							<button name="simpan" onclick="simpanpem" class="btn btn-secondary waves-effect">Simpan</button>
						</div>
						<br>
					  </div>
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
</body>
</html>