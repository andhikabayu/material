<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filter Barang</title>
</head>
	<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
	<style>
		div.dataTables_length select {
			width: 75px;
			display: inline-block;
		}
	</style>
<body>
	<?php 
	if ($session_data['id_level']==2) {
		include "menu_admin.php";
	}else{
		include "menu_stafgudang.php";
	}
	?>

<main>
        <!--Body-->
		<!--Panel-->
		<div class="main-wrapper z-depth-2 white">
    	  <div class="grey darken-3" align="center" style="padding:10px;">
			<h1 class="white-text">Data Pembelian 
				<?php if ($session_data['id_level']==2) { ?>
				<a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>index.php/penerimaan/">
				    <i class="fa fa-list left"> Penerimaan</i>
				</a>
				<a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>index.php/pembelian/tranpembelian">
				    <i class="fa fa-cart-plus left"> Pembelian</i>
				</a>
				<?php }else{ ?>
				<a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>index.php/penerimaan/penerimaan_staf">
				    <i class="fa fa-list left"> Penerimaan</i>
				</a>
				<?php } ?>
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
							<th>Tgl_pembelian</th>
							<th>Aksi</th>
						</thead>
						 <?php
                            $no=0;
                            foreach ($datafilpembelian as $row) {
                            $no++
                        ?>
         			
                        <tr>
                        	<input type="hidden" name="tgl_pembelian" value="<?php echo $row['tgl_pembelian'] ?>">
                            <td><?php echo $no; ?>.</td>
                            <td><input type="hidden" name="kd_pembelian" value="<?php echo $row['kd_pembelian'] ?>"><?php echo $row['kd_pembelian'] ?></td>
                            <td>
                            	<?php 
                            		$datajumlah = $this->m_pembelian->countdetail($row['kd_pembelian']);
                            		echo count($datajumlah) 
                            	?>
                            </td>
                            <td><?php echo $row['tgl_pembelian'] ?></td>
                            <td>
 								<a href="<?php echo site_url('pembelian/detail_pembelian/'.$row['kd_pembelian']);?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="right" title="Detail"><i class="fa fa-eye"></i></a>
								<a href="<?php echo site_url('penerimaan/datapenerimaan/'.$row['kd_pembelian']);?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="right" title="Terima"><i class="fa fa-truck"></i></a>
								<a href="<?php echo site_url('pembelian/edit_pembelian/'.$row['kd_pembelian']);?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a>
				            </td>
						  </tr>
						  <?php } ?>
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