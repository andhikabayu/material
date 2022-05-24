<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Transaksi</title>
</head>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
	<style>
        div.dataTables_length select {
            width: 75px;
            display: inline-block;
        }
    </style>
<body style="background-image:url(<?php echo base_url() ?>assets/images/88.jpg)">
	<?php 
		include "menu_admin.php";
	?>
<div class="container">
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        </div>
        <!--/.Content-->
        
    </div>
</div>
<!-- /.Live preview-->


<br><br><br><br><br><br>
<div class="container">
	<!--Form with header-->
<div class="card">
    <div class="card-block">

        <!--Header-->
        <div class="form-header elegant-color">
            <h3><i class="fa fa-print"></i>&nbsp Form Cetak Nota <a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>transaksi"><i class="fa fa-shopping-cart"></i> Penjualan</a></h3>
        </div>
        <!-- Button trigger modal -->
		<form method="post" action="">
		<div class="fluid-container">
		  <div class="table-responsive">
            <table class="table table-hover thead-inverse z-depth-1 data">
						<thead align="center">
							<th>No.</th>
							<th>No Faktur</th>
							<th>Jumlah Barang</th>
							<th>Total</th>
							<th>Status</th>
							<th>Tgl Penjualan</th>
							<th>Aksi</th>
						</thead>
						<tbody>
						<?php
							$no=0;
							$warna = "";
							foreach($data_penjualan as $row) {
								$format = $row->total;
                    	        $format_uang = number_format($format,0,',','.');
								$no++;
								if ($row->status == 'Hutang') {

						?>
						<tr class="danger-color">
						<?php } else if ($row->status == 'DP') {?>
						<tr class="warning-color">
						<?php } else { ?>
						<tr>
						<?php } ?>
						  	<td><?php echo $no ?>.</td>
							<td><?php echo $row->no_faktur ?></td>
							<td><?php $countjumlah = $this->m_transaksi->countdatabarang_Byno_faktur($row->no_faktur); echo count($countjumlah) ?></td>
							<td>Rp.<?php echo $format_uang ?></td>
							<td><?php echo $row->status ?></td>
							<td><?php echo $row->tgl_transaksi ?></td>
							<td>
								<a target="_blank" href="<?php echo site_url('transaksi/nota_penjualan/'.$row->no_faktur);?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Cetak Nota"><i class="fa fa-print"></i></a>
								<a href="<?php echo site_url('transaksi/detail_penjualan/'.$row->no_faktur);?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Lihat Detail"><i class="fa fa-eye"></i></a>
							</td>
						</tr>
						<?php } ?>
						</tbody>
					</table>
			</div>
		</div>
<!--/Form with header-->
<br><br>
			</form>
</div>
<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/jquery.dataTables.min.js" ?>"></script>
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
        function deleteBarang(id) {
            var konfirmasi = confirm("[WARNING] This action will cancelled. Are you sure want to continue?");
            if (konfirmasi == true) {
                window.location = "<?php echo base_url() ?>index.php/transaksi/delete_barang/" + id;
            }
        }       
    </script>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>
