<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Penerimaan Barang</title>
</head>
	<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.css">
	<style>
		div.dataTables_length select {
			width: 75px;
			display: inline-block;
		}
	</style>
<body>
	<?php 
		include "menu_stafgudang.php";
		error_reporting(0);
	?>

<main>
        <!--Body-->
		<!--Panel-->
		<div class="main-wrapper z-depth-2 white">
    	  <div class="grey darken-3" align="center" style="padding:10px;">
			<h1 class="white-text">Data Penerimaan
				<a href="<?php echo site_url('pembelian/pembelian') ?>" class="btn btn-sm btn-warning pull-right" data-toggle="tooltip" data-placement="right" title="Terima"><i class="fa fa-truck"></i> Barang</a>
			</h1>
	      </div>
	      <br>
	    <div class="container-fluid">
        	<h3><?php echo date('l, d-m-Y') ?></h3>
        </div>
       <div class="container-fluid" align="center">
        <div class="table-responsive">
			       <table class="table table-hover thead-inverse z-depth-1 data">
						<thead>
							<th>No</th>
							<th>KD Pembelian</th>
							<th>Jumlah Barang</th>
							<th>Tgl_Penerimaan</th>
							<th>Status</th>
							<th>Aksi</th>
						</thead>
						 <?php
                            $no=0;
                            foreach ($data as $row) {
                            $no++;

                        $awal = $this->m_penerimaan->sumawal($row['kd_pembelian']);
						$masuk = $this->m_penerimaan->summasuk($row['kd_pembelian']);  
						if($awal == $masuk){
                        ?>
                        <tr>
                        	<td><?php echo $no; ?>.</td>
                            <td><input type="hidden" name="kd_pembelian" value="<?php echo $row['kd_pembelian'] ?>"><?php echo $row['kd_pembelian'] ?></td>
                            <td>
                            	<?php 
                            		$datajumlah = $this->m_penerimaan->countbarang($row['kd_pembelian']);
                            		echo count($datajumlah) 
                            	?>
                            </td>
                            <td><input type="hidden" name="tgl_penerimaan" value="<?php echo $row['tgl_penerimaan'] ?>"><?php echo $row['tgl_penerimaan'] ?></td>
                            <td><a class="btn btn-success btn-sm" >Selesai</a></td>
                            <td>
 								<a href="<?php echo site_url('penerimaan/detail_penerimaan_staf/'.$row['kd_pembelian']);?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="right" title="Detail"><i class="fa fa-eye"></i></a>
								<a href="<?php echo site_url('penerimaan/edit_penerimaan_staf/'.$row['kd_pembelian']);?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a>
				                <!--<button class="btn btn-danger btn-sm" onClick="deletePembelian(<?php echo $row['id_pembelian'] ?>)"><i class="fa fa-times"></i></button>-->
							</td>
						  </tr>
						  <?php }else{ ?>
						  <tr class="warning-color">
                        	<td><?php echo $no; ?>.</td>
                            <td><input type="hidden" name="kd_pembelian" value="<?php echo $row['kd_pembelian'] ?>"><?php echo $row['kd_pembelian'] ?></td>
                            <td>
                            	<?php 
                            		$datajumlah = $this->m_penerimaan->countbarang($row['kd_pembelian']);
                            		echo count($datajumlah) 
                            	?>
                            </td>
                            <td><input type="hidden" name="tgl_penerimaan" value="<?php echo $row['tgl_penerimaan'] ?>"><?php echo $row['tgl_penerimaan'] ?></td>
                            <td><a class="btn btn-warning btn-sm" >Kurang</a></td>
                            <td>
 								<a href="<?php echo site_url('penerimaan/detail_penerimaan_staf/'.$row['kd_pembelian']);?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="right" title="Detail"><i class="fa fa-eye"></i></a>
								<a href="<?php echo site_url('penerimaan/edit_penerimaan_staf/'.$row['kd_pembelian']);?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a>
				                <!--<button class="btn btn-danger btn-sm" onClick="deletePembelian(<?php echo $row['id_pembelian'] ?>)"><i class="fa fa-times"></i></button>-->
							</td>
						  </tr>
						  <?php } } ?>
						</tbody>
					</table>
				</div> 
		</div>
		</div>
		<!--/.Panel-->

<!--/Form with header-->
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
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
</body>
</html>