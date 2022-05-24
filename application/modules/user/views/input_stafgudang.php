<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Masukan StafGudang</title>
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
                <h4 class="modal-title" id="myModalLabel">Masukan StafGudang</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <br>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/user/do_insert_staf"; ?>">    
                      <br>
                      <div class="container">
       					<input type="hidden" name="id_level" value="4">
                        <div class="col-md-12">
					  	<div class="md-form col-md-6">
						    <input type="text" id="form6" name="username" class="form-control" required>
						    <label for="form6" class="active">Username</label>
						</div>
						<div class="md-form col-md-6">
						    <input type="text" id="form1" name="nama" class="form-control" required>
						    <label for="form1" class="">nama</label>
						</div>
					   </div>
					   <div class="col-md-12">
						<div class="md-form col-md-6">
						    <input type="password" id="form1" name="password" class="form-control" required>
						    <label for="form1" class="">Password</label>
						</div>
						<div class="md-form col-md-6">
						    <input type="password" id="form1" name="password2" class="form-control" required>
						    <label for="form1" class="">Password</label>
						</div>
					   </div>
					   <div class="col-md-12">
					   <div class="md-form col-md-6">
						    <input type="text" id="form1" name="no_telp" class="form-control" required>
						    <label for="form1" class="">no_telp</label>
						</div>
					    <div class="file-field col-md-6">
					        <div class="btn btn-primary">
					            <span>Choose file</span>
					            <input type="file" name="filefoto" required>
					        </div>
					        <div class="file-path-wrapper">
					           <input class="file-path validate" name="filefoto" type="text" placeholder="Upload your file" required>
					        </div>
					    </div>
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
         <h1 class="white-text">Data StafGudang <button type="button" class="btn btn-info pull-right secondary" data-toggle="modal" data-target="#modal-contact"><i class="fa fa-plus"></i> StafGudang</button></h1>
    </div>
      <div class="container" align="center">
        <div class="row table-responsive">
                    <br>
                    <table class="table table-hover thead-inverse z-depth-1" id="data">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Nama</th>
								<th>No telp</th>
								<th>Foto</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$no=0;
								foreach ($datastafgudang as $user) {
							 	$no++;
							 ?>
							<tr data-id="<?php echo $user['id_user'] ?>">
								<td><?php echo $no ?></td>
								<td><?php echo $user['username'] ?></td>
								<td><?php echo $user['nama'] ?></td>
								<td><?php echo $user['no_telp'] ?></td>
								<td><img src="../../assets/uploads/<?php echo $user['foto']?>" height="50px" width="50px"></td>
								<td>
									<a class="btn btn-sm btn-default waves-effect" href="<?php echo base_url()."index.php/user/editstaf/".$user['id_user']; ?>"><i class="fa fa-edit"></i></a>
									<a class="btn btn-sm btn-danger waves-effect hapus-member" data-id="<?php echo $user['id_user'] ?>"><i class="fa fa-trash"></i></a>
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
        function deleteuser(id) {
            var konfirmasi = confirm("[WARNING] This action will deleted. Are you sure want to continue?");
            if (konfirmasi == true) {
                window.location = "<?php echo base_url() ?>index.php/user/delete_user/" + id;
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
					url:"<?php echo base_url('index.php/user/delete/'); ?>",
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