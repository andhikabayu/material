<!DOCTYPE html>
<html>
<head>
<br>
<br>
	<title>Edit Data Merek</title>
</head>
<body style="background-color:#eeeeee;">
<?php
	include "menu_admin.php";
?>
<main>
<h2 align="center">Form Edit Data Merek</h2>
<br>
<form method="post" action="<?php echo base_url() ?>index.php/merek/proses_edit_merek/<?php echo $merek->id_merek ?>">
	<table align="center">
		<tr>
			<td>Merek</td>
			<td>:</td>
			<td><input type="text" name="merek" value="<?php echo $merek->merek?>"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<input type="hidden" name="id_merek" value="<?php echo $merek->id_merek;?>">
<div class="tabbutton"><td><input type="submit" class="btn btn-success btn-md" name="submit" value="Update"><a href="<?php echo base_url() ?>index.php/merek/" class="btn btn-danger btn-md">Batal</a></td>
		</tr>
	</table>
</form>
</main>
<script>
        $(document).ready(function() {
        $('.mdb-select').material_select();
      });
    </script>
</body>
</html>

