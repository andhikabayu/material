<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<style type="text/css">
	.utama{
		margin: 0 auto;
		border:thin solid #000;
		width: 700px;
		padding: 10px;
	}
	.table-view{
		padding-left:25px;
		padding-right:25px;
	}
	strong{
		font-size: 20px;
	}
	table {
    	border-collapse: collapse;
    	width: 100%;
	}

	.th, .td {
    	padding: 8px;
    	text-align: left;
    	border-bottom: 1px solid #ddd;
	}
</style>
<body>
<br>
<div class="utama">
	
		<table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td width="19%" rowspan="3" align="center" valign="top"><img class="circle" src="assets/images/mitra.png" width="110" height="110"></td>
				<td width="93%" valign="top"><strong>&nbsp;Laporan Master Barang</strong></td>
			</tr>
			<tr>
				<td valign="top">&nbsp;CV. Mitra Bangunan</td>
			</tr>
			<tr>
				<td valign="top">&nbsp;<i>Belanja Dekat, Belanja Hemat, dan Belanja Cermat</i></td>
			</tr>
		</table>
		<hr>
	<div class="table-view">
		<table>
			<tr>
				<th class="th">No</th>
				<th class="th">Suplier</th>
				<th class="th">No Telp</th>
				<th class="th">Alamat</th>
		  	</tr>
		  	<?php 
		  	$no= 0;
			foreach ($datasuplier as $data) {
			$no++;
			?>
			  <tr>
			    <td class="th"><?php echo $no ?></td>
			    <td class="th"><?php echo $data->suplier ?></td>
			    <td class="th"><?php echo $data->no_telp ?></td>
			    <td class="th"><?php echo $data->alamat ?></td>
			  </tr>
		  <?php } ?>
		</table>
		<br>
	</div>
</div>
</body>
</html>