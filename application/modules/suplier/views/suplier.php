<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data Suplier</title>
</head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
    <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>

    <style>
        div.dataTables_length select {
            width: 75px;
            display: inline-block;
        }
    </style>
<body>
	<?php
	 	include "menu_admin.php";
	?>

<!-- Modal Contact -->
<div class="modal fade modal-ext" id="modal-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Masukan Suplier</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <br>
                <form method="post" action="<?php echo base_url()."index.php/suplier/do_insert_suplier"; ?>">    
                      <br>
                      <div class="container">
                        <div class="md-form ">
					  		<i class="fa fa-user prefix"></i>
						    <input type="text" id="form1" name="suplier" class="form-control" required>
						    <label for="form1" class="">suplier</label>
						</div>
						<div class="md-form">
						    <i class="fa fa-phone prefix"></i>
						    <input type="text" id="form2" name="no_telp" class="form-control" required>
						    <label for="form2" class="">No Telp</label>
						</div>
						<div class="md-form">
						    <i class="fa fa-home prefix"></i>
						    <textarea type="text" id="form8" name="alamat" class="md-textarea"></textarea>
						    <label for="form8">Alamat</label>
						</div>
						<div align="center">
							<button name="simpan" class="btn btn-info waves-effect">Simpan</button>
						</div>
                        <div id="test" onclick="toastr.success('Hi! I am success message.');">
                        </div>
                        <br>
                      </div>
                    </form>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>


<!-- Main layout-->
<main>
    <div class="main-wrapper z-depth-2 white">
    <div align="center" class="grey darken-3" style="padding:10px;">
         <h1 class="white-text">Data Suplier <button type="button" class="btn btn-info pull-right secondary" data-toggle="modal" data-target="#modal-contact"><i class="fa fa-plus"></i> Suplier</button></h1>
    </div>
      <div class="container" align="center">
        <div class="row table-responsive">
                    <br>
                    <table class="table table-hover thead-inverse z-depth-1" id="data">
						<thead>
							<th>No</th>
							<th>Suplier</th>
							<th>No Telp</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</thead>
						<tbody>
						<?php 
						$no=1;
						foreach ($datasuplier as $r) {
						$no++;
						?>
						  <tr data-id="<?php echo $r['id_suplier'] ?>">
						  	<td><?php echo $no ?></td>
							<td><?php echo $r['suplier'] ?></td>
							<td><?php echo $r['no_telp'] ?></td>
							<td><?php echo $r['alamat'] ?></td>
							<td>
								<a href="<?php echo base_url()."index.php/suplier/editsuplier/".$r['id_suplier']; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
				                <button class="btn btn-sm btn-danger hapus-member" data-id="<?php echo $r['id_suplier'] ?>">
				                <i class="fa fa-times"></i></button>
							</td>
						  </tr>
						<?php } ?>
						</tbody>
					</table> 
                    <br>

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
            $('#data').DataTable();
        });
    </script>
    <script type="text/javascript">
        function deletemerek(id) {
            var konfirmasi = confirm("[WARNING] This action will deleted. Are you sure want to continue?");
            if (konfirmasi == true) {
                window.location = "<?php echo base_url() ?>index.php/merek/delete_merek/" + id;
            }
        }       
    </script>

        <script type="text/javascript">

        $(function(){

        $.ajaxSetup({
            type:"post",
            cache:false,
            dataType: "json"
        })

        $(document).on("click",".hapus-member",function(){
            var id=$(this).attr("data-id");
            swal({
                title:"Hapus Data",
                text:"Yakin akan menghapus Data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                closeOnConfirm: true,
            },
                function(){
                 $.ajax({
                    url:"<?php echo base_url('index.php/suplier/delete/'); ?>",
                    data:{id:id},
                    success: function(){
                        $("tr[data-id='"+id+"']").fadeOut("fast",function(){
                            $(this).remove();
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        });
                    }
                 });
            });
        });

        });
    </script>
</body>
</html>