<!DOCTYPE html>
<html>
<head>
<br>
<br>
	<title>Edit Data Barang</title>
</head>
<body style="background-color:#eeeeee;">
<?php
	include "menu_admin.php";
?>
<main>
<h2 align="center">Form Edit Data Barang</h2>
<br>
<form method="post" action="<?php echo base_url() ?>index.php/barang/proses_edit_barang/<?php echo $barang->id_barang ?>">
	<table align="center">
		<tr>
			<td>kd_barang</td>
			<td>:</td>
			<td><input type="text" name="kd_barang" value="<?php echo $barang->kd_barang?>" readonly></td>
		</tr>
		<tr>
			<td>nama_barang</td>
			<td>:</td>
			<td><input type="text" name="nama_barang" value="<?php echo $barang->nama_barang?>"></td>
		</tr>
		<tr>
			<td>id_merk</td>
			<td>:</td>
			<td>
				<select class="mdb-select" name="id_merek">
					<option value="<?php echo $qwbarang->id_merek ?>"><?php echo $qwbarang->merek ?></option>
					<?php
						foreach ($datamerek as $r) {
					?>
					<option value="<?php echo $r->id_merek ?>"><?php echo $r->merek ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<input type="hidden" name="id_barang" value="<?php echo $barang->id_barang;?>">
<div class="tabbutton"><td><input type="submit" class="btn btn-success btn-md" name="submit" value="Update"><a href="<?php echo base_url() ?>index.php/barang/" class="btn btn-danger btn-md">Batal</a></td>
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

