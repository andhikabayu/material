<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laporan</title>
</head>
<body>
  <?php 
    include "menu_manager.php";
  ?>
<div style="background-color:rgba(0,0,0,0.5);height:700px">
  
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
            <div class="btn-group">
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Pembelian
              </label>
              <a href="<?php echo base_url() ?>index.php/laporan/see_lap_pembelian/" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <a href="<?php echo base_url() ?>index.php/laporan/down_lap_pembelian/" class="btn btn-secondary"><i class="fa fa-download"></i></a>
            </div>
            <div class="btn-group">
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Penjualan
              </label>
              <a href="<?php echo base_url() ?>index.php/laporan/see_lap_penjualan/" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <a href="<?php echo base_url() ?>index.php/laporan/down_lap_penjualan/" class="btn btn-secondary"><i class="fa fa-download"></i></a>
            </div>
          </div>
          <br>
      <h4 class="primary-text" align="center">Laporan Master</h4>
      <br>
          <div class="row" align="center">
            <div class="btn-group">
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Barang
              </label>
              <a href="<?php echo base_url() ?>index.php/laporan/see_lap_barang/" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <a href="<?php echo base_url() ?>index.php/laporan/down_lap_barang/" class="btn btn-secondary"><i class="fa fa-download"></i></a>
            </div>
            <div class="btn-group">
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Suplier
              </label>
              <a href="<?php echo base_url() ?>index.php/laporan/see_lap_suplier/" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <a href="<?php echo base_url() ?>index.php/laporan/down_lap_suplier/" class="btn btn-secondary"><i class="fa fa-download"></i></a>
            </div>
            <div class="btn-group">
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Merek
              </label>
              <a href="<?php echo base_url() ?>index.php/laporan/see_lap_merek/" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <a href="<?php echo base_url() ?>index.php/laporan/down_lap_merek/" class="btn btn-secondary"><i class="fa fa-download"></i></a>
            </div>
            <div class="btn-group">
              <label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Rak
              </label>
              <a href="<?php echo base_url() ?>index.php/laporan/see_lap_rak/" target="_blank" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
              <a href="<?php echo base_url() ?>index.php/laporan/down_lap_rak/" class="btn btn-secondary"><i class="fa fa-download"></i></a>
            </div>
          </div>
        </div>
    <br>
</div>
<!--/.Panel-->
</main>
</div>
<script>
  $(document).ready(function() {
    $('.mdb-select').material_select();
  });
</script>
<script>
  $('.datepicker').pickadate();
</script>
</body>
</html>