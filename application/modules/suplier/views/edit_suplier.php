<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Suplier</title>
	<link rel="stylesheet" href="">
</head>
<body style="background-color:#eeeeee;">
<?php 
	include "menu_admin.php"; 
?>
<main>
<h4 align="center">Edit Suplier</h4>
<form method="post" action="<?php echo base_url()."index.php/suplier/updatesuplier"; ?>">
	<table align="center">
	<input type="hidden" name="id_suplier" value="<?php echo $id_suplier ?>">
		<tr>
			<td>suplier</td>
			<td> : </td>
			<td><input type="text" name="suplier" value="<?php echo $suplier ?>" required></td>
		</tr>
		<tr>
			<td>No Telp</td>
			<td> : </td>
			<td><input type="text" name="no_telp" value="<?php echo $no_telp ?>" required></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td> : </td>
			<td><textarea name="alamat" class="md-textarea" requited><?php echo $alamat ?></textarea></td>
		</tr>
		<tr>
			<td><input type="submit" name="update" class="btn btn-success btn-md" value="UPDATE"></td>
			<td colspan="2"><input type="reset" class="btn btn-default btn-md" value="RESET"><a href="<?php echo base_url() ?>index.php/user/input_user" class="btn btn-danger btn-md">Batal</a></td>
		</tr>
	</table>
</form>
</body>
</form>
</html>