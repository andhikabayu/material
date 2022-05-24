<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Profil</title>
</head>
<body>
	<?php
	 	include "menu_admin.php";
	?>
<div style="background-color:rgba(0,0,0,0.5);height:700px">
<!-- Main layout-->
<main>
    <div class="main-wrapper">
      <div class="container">
        <div class="row">
			<div class="grey lighten-5">
			<form method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/profil/do_update_profil"; ?>">    
					  <div align="center" class="grey darken-3" style="padding:10px;">
					  	<h1 class="white-text">Form Edit Profil</h1>
					  </div>
					  <br>
					  <div class="container">
					   <div class="col-md-12">
					   <input type="hidden" name="id_user" value="<?php echo $session_data['id_user'] ?>">
					   <input type="hidden" name="id_level" value="<?php echo $session_data['id_level'] ?>">
					  	<div class="md-form col-md-6">
						    <input type="text" id="form6" name="username" value="<?php echo $session_data['username'] ?>" class="form-control" required>
						    <label for="form6" class="active">Username</label>
						</div>
						<div class="md-form col-md-6">
						    <input type="text" id="form1" name="nama" value="<?php echo $session_data['nama'] ?>" class="form-control" required>
						    <label for="form1" class="">nama</label>
						</div>
					   </div>
					   <div class="col-md-12">
						<div class="md-form col-md-6">
						    <input type="password" id="form1" name="password" value="<?php echo $session_data['password'] ?>" class="form-control" required>
						    <label for="form1" class="">Password</label>
						</div>
						<div class="md-form col-md-6">
						    <input type="password" id="form1" name="password2" value="<?php echo $session_data['password'] ?>" class="form-control" required>
						    <label for="form1" class="">Password</label>
						</div>
					   </div>
					   <div class="col-md-12">
						<div class="md-form col-md-6">
						    <input type="text" id="form1" name="no_telp" value="<?php echo $session_data['no_telp'] ?>" class="form-control" required>
						    <label for="form1" class="">no_telp</label>
						</div>
						<div class="file-field col-md-6">
					        <div class="btn btn-primary">
					            <span>Choose file</span>
					            <input type="file" name="filefoto" required>
					        </div>
					        <div class="file-path-wrapper">
					           <input class="file-path validate" name="filefoto" value="<?php echo $session_data['foto'] ?>" type="text" placeholder="Upload your file" required>
					        </div>
					    </div>
					   </div>
						<div align="center">
							<button name="update" class="btn btn-info waves-effect">Simpan</button>
						</div>
						<div id="#test" onclick="toastr.success('Hi! I am success message.');">
							
						</div>
						<br>
					  </div>
					</form>
					</div>
		
        </div>
      </div>
    </div>
</main>
<!-- End Main layout-->
</div>

<script>
	$(document).ready(function() {
    $('.mdb-select').material_select();
  });
</script>
</body>
</html>