<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan</title>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">s
</head>
<body>
	<?php 
		include "menu_admin.php";
	?>
<div style="background-color:rgba(0,0,0,0.5);height:700px">
 <link rel="stylesheet" href="<?php echo base_url()."assets/plugins/"; ?>plugins/bootstrap-datepicker.css">
<main>
<div class="container">
<!--Panel-->
<div class="card">
    <h3 class="card-header primary-color white-text">Laporan</h3>
    <div class="card-block">
	  <br>

	  <div class="container">
	  <h4 class="primary-text" align="center">Laporan Transaksi</h4>
      <br>
          <div class="row" align="center">
            <div class="container" style="margin-left: 35%;">
              <form method="POST">
                <div class="col-md-3">
                  <input type="text" name="from" id="from" class="form-control datepicker" placeholder="From">
                </div>
                <div class="col-md-3">
                  <input type="text" name="to" id="to" onchange="detail_penerimaan()" class="form-control datepicker" placeholder="To">
                </div>
              </form>
            </div>
            <hr>
            <div class="btn-group">
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Penerimaan
              </label>
              <a href="<?php echo base_url() ?>index.php/laporan/see_lap_pembelian/" id="btn-detail" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <a href="<?php echo base_url() ?>index.php/laporan/down_lap_pembelian/" class="btn btn-secondary"><i class="fa fa-download"></i></a>
            </div>
	          <div class="btn-group">
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Penjualan
              </label>
              <a href="<?php echo base_url() ?>index.php/laporan/see_lap_penjualan/" id="detail_penjualan" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <a href="<?php echo base_url() ?>index.php/laporan/down_lap_penjualan/" id="penjualan" class="btn btn-secondary"><i class="fa fa-download"></i></a>
            </div>
          </div>
        </div>
	  <br>
</div>
<!--/.Panel-->
</main>
</div>
 <!--<script src="<?php echo base_url()."assets/plugins/"; ?>plugins/jquery-3.3.1.slim.min.js"></script>
  Javascript Bootstrap -->
 <script src="<?php echo base_url()."assets/plugins/"; ?>plugins/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function() {
    $('.mdb-select').material_select();
    
  });
</script>
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
  });

  function detail_penerimaan() {
    var from = $('#from').val();
    var to = $('#to').val();
    if (from > to) {
      alert("Format Tanggal Salah");
    }else{
      // alert("benar");
       document.getElementById("btn-detail").setAttribute("href", "<?php echo base_url() ?>index.php/laporan/see_lap_pembelian/"+from+"/"+to);
       document.getElementById("detail_penjualan").setAttribute("href", "<?php echo base_url() ?>index.php/laporan/see_lap_pembelian/"+from+"/"+to);
    }
  }
 </script>
</body>
</html>