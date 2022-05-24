<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Material</title>
	<link rel="stylesheet" href="">
</head>
<body style="background-image:url(<?php echo base_url() ?>assets/images/88.jpg)">
<?php 
	include "menu_admin.php";
?>
<main>
	<form class="white" method="post" enctype="multipart/form-data" action="<?php echo base_url()."index.php/user/do_update_staf"; ?>">    
	  <div align="center" class="grey darken-3" style="padding:10px;">
	  	<h1 class="white-text">Form Edit User</h1>
	  </div>
	  <br>
	  <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
	  <input type="hidden" name="id_level" value="<?php echo $id_level ?>">
	  <div class="container">
	  <div class="row">
	  	<div class="md-form col-md-6">
		    <input type="text" id="form1" name="username" class="form-control validate" value="<?php echo $user ?>" required>
		    <label for="form1">Username</label>
		</div>
		<div class="md-form col-md-6">
		    <input type="text" id="form2" name="nama" class="form-control" value="<?php echo $nama ?>" required>
		    <label for="form2" class="">Nama User</label>
		</div>
	  </div>
	  <div class="row">
		<div class="md-form col-md-6">
		    <input type="password" id="form4" name="password" class="form-control" value="<?php echo $pass ?>" required>
		    <label for="form4" class="">Password</label>
		</div>
	  	<div class="md-form col-md-6">
		    <input type="password" id="form4" name="password2" class="form-control" value="<?php echo $pass ?>" required>
		    <label for="form4" class="">Password</label>
		</div>
	  </div>
	  <div class="row">
	  	<div class="md-form col-md-6">
		    <input type="text" id="form3" name="no_telp" class="form-control" value="<?php echo $no_telp ?>" required>
		    <label for="form3" class="">No Telp</label>
		</div>
	  	<div class="file-field col-md-6">
	        <div class="btn btn-primary">
	            <span>Choose file</span>
	            <input type="file" name="filefoto" required>
	        </div>
	        <div class="file-path-wrapper">
	           <input class="file-path validate" type="text" name="filefoto" value="<?php echo $filefoto ?>" placeholder="Upload your file" >
	        </div>
	    </div>
	   </div>
	  	<div align="center">
			<button name="simpan" class="btn btn-info waves-effect">Update</button>
			<a href="<?php echo base_url() ?>index.php/user/input_stafgudang" class="btn btn-danger btn-md">Batal</a>
		</div>
		<br>
	  </div>
	</form>
</main>
</body>
</form>
	<script>
        $(document).ready(function() {
        $('.mdb-select').material_select();
      });
    </script>
</html>