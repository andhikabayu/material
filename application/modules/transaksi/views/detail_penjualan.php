<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Barang</title>
</head>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css.css">
    <style>
        div.dataTables_length select {
            width: 75px;
            display: inline-block;
        }
    </style>
<body style="background-image:url(<?php echo base_url() ?>assets/images/88.jpg);">
    <?php 
        include "menu_admin.php";
    ?>
<div class="container">
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
        <!--/.Content-->
        
    </div>
</div>
<!-- /.Live preview-->


<br><br><br><br><br>
<div class="container">
    <!--Form with header-->
<div class="card">
    <div class="card-block">

        <!--Header-->
        <div class="form-header elegant-color">
            <h3>Detail Barang <a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>transaksi/form_cetakNota"><i class="fa fa-print"></i> Nota</a></h3>
        </div>
        </form>
        <!-- Button trigger modal -->
        
        <div class="container">
        <div class="md-form col-md-6">
            <input type="text" id="form20" name="no_faktur" class="form-control" value="<?php echo $no_faktur ?>" readonly required>
           <label for="form20" class="">No_Faktur</label>
        </div>
        <div class="md-form col-md-6">
            <input type="text" id="form2" name="tgl_transaksi" class="form-control" value="<?php echo $tgl_transaksi ?>" readonly required>
           <label for="form2" class="">Tgl_Penjualan</label>
        </div>
        <div class="container" align="center">
        <div class="row table-responsive">
        <form method="post" action="<?php echo base_url() ?>transaksi/update_bayar/<?php echo $no_faktur ?>">
            <table class="table table-hover thead-inverse z-depth-1 data">
                        <thead align="center">
                            <th>No.</th>
                            <th>Kd_Barang</th>
                            <th>Nama_Barang</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                        <?php
                            $no=0;
                            foreach($detail as $row) {
                                $format = $row['harga_barang'];
                                $format_uang = number_format($format,0,',','.');
                                $format2 = $row['subtotal'];
                                $format_uang2 = number_format($format2,0,',','.');
                                $format3 = $row['total'];
                                $format_uang3 = number_format($format3,0,',','.');
                                $no++;
                        ?>
                        <tr>
                            <td><?php echo $no ?>.</td>
                            <td><?php echo $row['kd_barang'] ?></td>
                            <td><?php echo $row['nama_barang'] ?></td>
                            <td>Rp. <?php echo $format_uang ?></td>
                            <td><?php echo $row['qty'] ?></td>
                            <td><div style="margin-left:10px;">Rp. <?php echo $format_uang2 ?></div></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        <thead>
                            <th colspan="5" class="default"><strong class="tengah">Total Akhir : </strong></th>
                            <th>Rp. <?php echo $format_uang3 ?></i></th>
                        </thead>
                        <thead>
                            <th colspan="5" class="default"><strong class="tengah">Bayar : </strong></th>
                            <!-- <th>Rp. <?php echo number_format($bayar,0,',','.'); ?></i></th> -->
                            <th style="width:150px;"><input type="text" name="bayar" <?php if($status == 'Lunas') {?> readonly <?php } ?> value="<?php if($status == 'Lunas') echo $total ?>"></i></th>
                        </thead>
                        <thead>
                            <th colspan="5" class="default"><strong class="tengah">Sisa : </strong></th>
                            <input type="hidden" name="sisa" value="<?php echo $sisa?>">
                            <th>Rp. <?php echo number_format($sisa,0,',','.'); ?></i></th>
                        </thead>
                    </table>
                    <br>
                        <center><input type="submit" <?php if($status == 'Lunas'){?>disabled<?php }?> name="submit" value="Proses" class="btn btn-primary"></center>
                    </form>
                    </div>
                </div>
<!--/Form with header-->
</div>
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
