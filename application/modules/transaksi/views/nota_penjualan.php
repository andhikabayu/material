<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nota Penjualan</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/naik.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<style>
	.utama{
		margin: 0 auto;
		border:thin solid #000;
		width: 700px;
	}
	.print{
		margin: 0 auto;
		width: 700px;
	}
	a{
		text-decoration: none;
	}
</style>
<body>
	<div class="print">
		<a title="Print" id="print" href="#" onclick="document.getElementById('print').style.display='none';window.print();"><img width="50px" height="50px" src="<?php echo base_url() ?>assets/images/printlogo.jpg"></a>
	</div>
	<div class="utama">
		<table width="97%" border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top:10px;">
			<tr>
				<td width="19%" rowspan="3" align="center" valign="top"><img class="circle" src="<?php echo base_url() ?>assets/images/mitra.png" width="110" height="110"></td>
				<td width="93%" valign="top"><strong>&nbsp;Nota Penjualan</strong></td>
			</tr>
			<tr>
				<td valign="top">&nbsp;CV. Mitra Bangunan</td>
			</tr>
			<tr>
				<td valign="top">&nbsp;<i>Belanja Dekat, Belanja Hemat, dan Belanja Cermat</i></td>
			</tr>
		</table>
		<table width="100%">
			<tr><td><hr></td></tr>
		</table>
		<table class="table table-bordered" style="width:99.80%;" align="center">
					<tr>
						<td colspan="8"><strong>
						&nbspNo_Faktur&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $no_faktur ?>
							<div class="right">&nbspTanggal_Penjualan : <?php echo $tgl_transaksi ?></div>
							</strong>
						</td>	
					</tr>
						<tr>
							<td align="center"><strong>No.</strong></td>
							<td align="center"><strong>Kd_Barang</strong></td>
							<td align="center"><strong>Nama_Barang</strong></td>
							<td align="center"><strong>Harga</strong></td>
							<td align="center"><strong>QTY</strong></td>
							<td align="center"><strong>Subtotal</strong></td>
						<tr>
						<?php 
						$no=0;
						foreach ($detail as $row) {
							$format = $row['harga_barang'];
                            $format_uang = number_format($format,2,',','.');
                            $format2 = $row['subtotal'];
                            $format_uang2 = number_format($format2,2,',','.');
                            $format3 = $row['total'];
                            $format_uang3 = number_format($format3,2,',','.');
							$no++;
						?>
						  <tr>
						  	<td align="center"><?php echo $no ?>.</td>
							<td align="center"><?php echo $row['kd_barang'] ?></td>
							<td align="center"><?php echo $row['nama_barang'] ?></td>
							<td align="center">Rp. <?php echo $format_uang ?></td>
							<td align="center"><?php echo $row['qty'] ?></td>
							<td align="center">Rp. <?php echo $format_uang2 ?></td>
						  </tr>
						  <?php } ?>
						  <tr>
						  	<td colspan="5" align="center"><strong class="tengah">Total Akhir : </strong></td>
                            <td align="center">Rp. <?php echo $format_uang3 ?></i></td>
                          </tr>
			</table>
			</div>
		<br>
	</div>
	<center><p>&copy; <?php echo date('Y'); ?> Siswa PKL</p></center>
</body>
</html>
