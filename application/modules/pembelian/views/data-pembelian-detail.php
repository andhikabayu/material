<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data barang</title>
</head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>dataTables.bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
<body style="background-image:url(<?php echo base_url() ?>assets/images/88.jpg)">
	<?php 
	if ($session_data['id_level']==2) {
		include "menu_admin.php";
	}else{
		include "menu_stafgudang.php";
	}
	?>

<!-- Main layout-->
<main>
    <div class="main-wrapper">
      <div class="container">
        <div class="white z-depth-2">
				
			<div align="center" class="grey darken-3" style="padding:10px;">
			  	<h1 class="white-text">Detail Pembelian <a class="btn btn-secondary pull-right" href="<?php echo base_url() ?>index.php/pembelian/"><i class="fa fa-list"></i> pembelian</a></h1>
			</div>
			  <br>
			  <div class="container">
			  	<div class="md-form col-md-6">
				  	<input type="text" id="form20" name="kd_pembelian" class="form-control" value="<?php echo $kd_pembelian ?>" readonly required>
				    <label for="form20" class="">Kd pembelian</label>
				</div>
				<div class="md-form col-md-6">
				  	<input type="text" id="form2" name="tgl_pembelian" class="form-control" value="<?php echo $tgl_pembelian ?>" readonly required>
				    <label for="form2" class="">Tgl Pembelian</label>
				</div>
			    <div class="col-md-12 row table-responsive">
				    <table class="table table-hover thead-inverse data">
						<thead>
							<th>No</th>
							<th>KD Barang</th>
							<th>Nama Barang</th>
							<th>Merek</th>
							<th>Jumlah</th>
							<th>Harga Barang</th>
							<th>Aksi</th>
						</thead>
						<tbody id="table-body">
						<?php 
						$no=0;
						foreach($detail as $data){
							$format = $data['harga_barang'];
							$format_uang = number_format($format,2,',','.');
						$no++;
						?>
						  <tr data-id="<?php echo $data['id_pembelian'] ?>">
						  	<td><?php echo $no ?></td>
						  	<td><?php echo $data['kd_barang'] ?></td>
							<td><?php echo $data['nama_barang'] ?></td>
							<td><?php echo $data['merek'] ?></td>
							<td><?php echo $data['jumlah_barang'] ?></td>
							<td>Rp. <?php echo $format_uang ?></td>
							<td><button class='btn btn-sm btn-danger hapus-member' data-id="<?php echo $data['id_pembelian'] ?>" data-toggle="tooltip" data-placement="right" title="Hapus"><i class='fa fa-times'></i></button></td>
						  </tr>
						  <?php } ?>
						</tbody>
					</table>
					<br>
				</div>
			</div>

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
            $('.data').DataTable();
        });
    </script>
    <script type="text/javascript">
        function deletePembelian(id) {
            var konfirmasi = confirm("[WARNING] This action will deleted. Are you sure want to continue?");
            if (konfirmasi == true) {
                window.location = "<?php echo base_url() ?>index.php/pembelian/delete_pembelian/" + id;
            }
        }       
    </script>
    <script>
    	function simpanpem() {
          $.post("pembelian/insert_pembelian", $('#formpembelian').serialize(), function (data) {
          //alert(data);
          }).done(function (data) {
              alert("Data Tersimpan");
          }).fail(function () {
              alert("Pesan gagal dikirim");
          }).always(function () {
              //alert("finished");
          });
      }
    </script>
    <script>
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
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
			url:"<?php echo base_url('index.php/pembelian/delete/'); ?>",
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