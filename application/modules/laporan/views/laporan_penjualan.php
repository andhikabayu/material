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
<th class="th">No.</th>
<th class="th">No Faktur</th>
<th class="th">Jumlah Barang</th>
<th class="th">Total</th>
<th class="th">Tgl Penjualan</th>
 	</tr>
 	<?php 
 	$no= 0;
foreach ($dat_penjualan as $data) {
$no++;
?>
 <tr>
   <td class="th"><?php echo $no ?>.</td>
   <td class="th"><?php echo $data->no_faktur ?></td>
   <td class="th"><div style="position:relative; margin-left:45px;"><?php $countjumlah = $this->m_laporan->countdatabarang_Byno_faktur($data->no_faktur); echo count($countjumlah) ?></div></td>
   <td class="th"><?php echo $data->total ?></td>
   <td class="th"><?php echo $data->tgl_transaksi ?></td>
 </tr>
 <?php } ?>
</table>
<br>
</div>
</div>
</body>
</html>