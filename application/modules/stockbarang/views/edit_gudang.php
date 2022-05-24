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
    ?>

<!-- Main layout-->
<main>
    <div class="main-wrapper">
      <div class="container">
        <div class="row">

           <form method="post" action="<?php echo base_url()."index.php/stockbarang/updatelot" ?>">
                      <div align="center" class="grey darken-3" style="padding:10px;">
                        <h1 class="white-text">Form Edit Rak Penyimpanan</h1>
                      </div>
                      <br>
                      <div class="container">
                      <input type="hidden" name="id_lot" value="<?php echo $id_lot ?>">
                        <div class="md-form">
                            <input type="text" id="form1" name="nama_lot" value="<?php echo $nama_lot ?>" class="form-control" required>
                            <label for="form1" class="">Nama Rak Penyimpanan</label>
                        </div>
                        <div class="md-form">
                            <input type="number" name="kapasitas" class="form-control" value="<?php echo $kapasitas; ?>" required>
                            <label>Kapasitas</label>
                        </div>
                        <div align="center">
                            <button type="sumbit" name="update" class="btn btn-info waves-effect">UPDATE</button>
                        </div>
                        <div id="#test" onclick="toastr.success('Hi! I am success message.');">
                            
                        </div>
                        <br>
                      </div>
                    </form>

        </div>
      </div>
    </div>
</main>
<!-- End Main layout-->
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