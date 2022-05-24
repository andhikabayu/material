<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data barang</title>
</head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>dataTables.bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
<body>
    <?php
        include "menu_stafgudang.php";
        error_reporting(0);
    ?>
<main>
<h2 align="center">Form Edit Barang</h2>
<br>
<form method="post" action="<?php echo base_url()."index.php/stockbarang/updatbarang" ?>">
    <table align="center">
            <td><input type="hidden" name="id_stockbarang" value="<?php echo $id_stockbarang; ?>" readonly></td>
        <tr>
            <td>nama barang</td>
            <td>:</td>
            <td><input type="text" name="barang" value="<?php echo $nama_barang ?>" readonly></td>
        </tr>
        <tr>
            <td>Dari Rak</td>
            <td> : </td>
            <td><input type="text" name="editposisilot" value="<?php echo $id_lot ?>" readonly></td>
        </tr>
        <tr>
            <td>Pindah Ke Rak  </td>
            <td>:</td>
            <td>
               <select class="mdb-select" name="editposisilot">
                    <option value="" disabled selected>----------Rak---------</option>
                    <?php
                        foreach ($datalot as $lot) {
                     ?>
                     <option value="<?php echo $lot['id_lot']; ?>"><?php echo $lot['nama_lot']; ?></option>
                     <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Harga Jual Awal</td>
            <td> : </td>
            <td><input type="text" name="harga" value="<?php echo 'Rp.'.$harga_jual.',-' ?>" readonly></td>
        </tr>
        <tr>
            <td>Harga Jual Baru</td>
            <td>:</td>
            <td><input type="text" name="harga_jual" value="<?php echo $harga_jual ?>"></td>
        </tr>
        <tr>
            <td><button type="sumbit" name="update" class="btn btn-info waves-effect">UPDATE</button></td>
            <td></td>
            <td><a class="btn btn-info waves-effect" href="<?php echo base_url()."index.php/stockbarang/stockbarang" ?>">Kembali</a></td>
        </tr>
    </table>
</form>
</main>
</div>
    <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.mdb-select').material_select();
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#data').DataTable();
        });
    </script>
    <script type="text/javascript">
        function deleteBarang(id) {
            var konfirmasi = confirm("[WARNING] This action will deleted. Are you sure want to continue?");
            if (konfirmasi == true) {
                window.location = "<?php echo base_url() ?>index.php/barang/delete_barang/" + id;
            }
        }       
    </script>

</body>
</html>