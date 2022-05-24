<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Filter Barang</title>
</head>
	<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
   	<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
   	<script type="text/javascript" src="<?php echo base_url()."assets/plugins/" ?>jquery.chained.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()."assets/plugins/" ?>jquery.chained.remote.js"></script>
   	<script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
	<style>
		div.dataTables_length select {
			width: 75px;
			display: inline-block;
		}
		.style-select{
			width: 100%;
		    border: none;
		    display: inline-block;
		    padding: 12px 20px;
		    margin: 8px 0;
		    box-sizing: border-box;
		    border-bottom: 2px solid #3CBC8D;
		}
	</style>

<body>
	<?php 
		include "menu_stafgudang.php";
	?>
<!-- Modal -->
<form method="post" action="<?php echo base_url()."index.php/stockbarang/simpanbarang" ?>">
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      		<!--Header-->
	      		<div class="container">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		                <h4 class="modal-title" id="myModalLabel">Pilih Barang</h4>
		            </div>
	           		<table class="col-md-2 col-md-offset-1" style="margin-top:10px">
		           		<tr>
			           		<td>Simpan Di Rak</td>
			           	</tr>
			           	<tr>
				           	<td> 
				           		<select class="browser-default style-select" name="simpanlot" id="simpanlot">
				           		    <option value="" disabled selected>---Pilih Rak---</option>
				                    <?php
				                       foreach ($datalot as $lot) {
				                       	$datarak = $this->m_stockbarang->countrak($lot['id_lot']);
                        				$jumlahrak = count($datarak);
                        				$hasil = $lot['kapasitas'] - $jumlahrak;
				                       	if($hasil == 0){}else{
				                    ?>
				                    <option value="<?php echo $lot['id_lot']; ?>"><?php echo $lot['nama_lot']; ?></option>
				                    <?php } } ?>
				               </select>
				           </td>
			           	</tr>
		            </table>
		            <table class="col-md-2 col-md-offset-2" style="margin-top:10px">
			          <tr>
			        	<td>Sisa Kapasitas</td>
			          </tr>
			          <tr>
			           	<td>
						<select class="browser-default style-select" name="kapasitas" id="kapasitas">
			               	<?php
		                       foreach ($datalot as $kapasitas) {
		                    	$jumlahkapasitas = $this->m_stockbarang->countrak($kapasitas['id_lot']);
                        		$jumlahrak = count($jumlahkapasitas);
                        		$hasil = $kapasitas['kapasitas'] - $jumlahrak; 
                            ?>
			  	                  <option value="<?php echo $hasil ?>" id="checkbox<?php echo $hasil ?>" class="<?php echo $kapasitas['id_lot'];?>"><?php echo $hasil; ?></option>
			                    <?php } ?>
			               </select>
			           	</td>
			          </tr>
			        </table>
		        </div>

	            <br>
	            <!--Body-->
	            <div class="container">
	              <div class="table-responsive">
	           		 <table class="table table-hover thead-inverse z-depth-1 data">
								<thead>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Merek</th>
									<th>Jumlah</th>
									<th>tanggal Masuk</th>
									<th>Harga Beli</th>
									<th>Harga Jual</th>
									<th>Rak</th>
								</thead>
								<tbody>
								<?php
								$no=0;
								$id=500;
								foreach ($data as $simpan) {
								$format = $simpan['harga_barang'];
                                $format_uang = number_format($format,2,',','.');
								$format1 = $simpan['harga_jual'];
                                $format_uang1 = number_format($format1,2,',','.');
								$no++;
								$id++;
								?>
								  <tr>
								  	<td><?php echo $no ?></td>
									<td><?php echo $simpan['nama_barang'] ?></td>
									<td><?php echo $simpan['merek'] ?></td>
									<td><?php echo $simpan['jumlah_masuk'] ?></td>
									<td><?php echo $simpan['tgl_penerimaan'] ?></td>
									<td>Rp.<?php echo $format_uang ?></td>
									<td>Rp.<?php echo $format_uang1 ?></td>
									<td>
									<fieldset class="form-group">
									  <input type="checkbox" name="id_penerimaan[]" id="checkbox<?php echo $id; ?>" value="<?php echo $simpan['id_penerimaan'] ?>">
									  <label for="checkbox<?php echo $id; ?>">Pilih</label>
									</fieldset>
								</td>
							  </tr>
							<?php } ?>
							</tbody>
						</table>
					  </div>
					</div>
	            <!--Footer-->
	            <div class="modal-footer">
	            	<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
	                <button class="btn btn-secondary" data-dismiss="modal">Kembali</button>
	            </div>
	    </div>
	  </div>
	</div>
 </form>


<br><br><br><br><br>
<div class="container-fluid">
	<!--Form with header-->
<div class="card col-md-12">
    <div class="card-block">

        <!--Header-->
        <div class="form-header elegant-color">
            <h3><i class="fa fa-credit-card-alt"></i> Data Penerimaan Barang</h3>
        </div>
        <div align="center">
        	<h4><?php echo date('l, Y-m-d') ?></h4>
        </div>

        <!--Body-->
		<!--Panel-->
		<div class="card col-md-12">
		    <h3 class="card-header primary-color white-text"> Rak Penyimpanan 
			    <a class="btn btn-secondary btn-lg" data-toggle="modal" data-target=".bd-example-modal-lg">
					<i class="fa fa-save"></i>
			    	<span>Barang</span>
				</a>
				<?php if( count($datajumlah) == 0){ }else{ ?>
				<span class="counter"><?php echo count($datajumlah) ?></span>
			    <?php } ?>
		    </h3>
		    <div class="fluid-container">
		    <div class="card-blright table-responsive">
            		<table class="table table-hover thead-inverse z-depth-1 data">
						<thead>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Merek</th>
							<th>Jumlah</th>
							<th>Tgl Penerimaan</th>
							<th>Harga Barang</th>
							<th>Harga Jual</th>
							<th>Rak</th>
							<th>Aksi</th>
						</thead>
						<tbody>
						<?php 
						$no=0;
						foreach($datapembelian as $data){
						$format = $data['harga_barang'];
                        $format_uang = number_format($format,2,',','.');
						$format1 = $data['harga_jual'];
                        $format_uang1 = number_format($format1,2,',','.');
						$no++;
						?>
						  <tr data-id="<?php echo $data['id_stockbarang'] ?>">
						  	<td><?php echo $no ?></td>
						  	<td><?php echo $data['kd_barang'] ?></td>
							<td><?php echo $data['nama_barang'] ?></td>
							<td><?php echo $data['merek'] ?></td>
							<td><?php echo $data['jumlah_barang'] ?></td>
							<td><?php echo $data['tgl_penerimaan'] ?></td>
							<td>Rp.<?php echo $format_uang ?></td>
							<td>Rp.<?php echo $format_uang1 ?></td>
							<td><?php echo $data['nama_lot'] ?></td>
							<td>
								<a href="<?php echo base_url()."index.php/stockbarang/editbarang/".$data['id_stockbarang']; ?>" class="btn btn-sm btn-default"><i class="fa fa-edit "></i></a>
								<button class="btn btn-danger btn-sm hapus-member" data-id="<?php echo $data['id_stockbarang'] ?>"><i class="fa fa-times"></i></button>
							</td>
						  </tr>
						  <?php } ?>
						</tbody>
					</table>
				</div>
		    </div>
		</div>
		<!--/.Panel-->

</div>
</div>
<!--/Form with header-->
</div>

<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/plugins/chained/" ?>jquery.chained.min.js"></script>
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
<script>
	function validasi(id){
		var txt = "";
		if(document.getElementById("rak_" + id).validity.rangeOverflow){
			txt = "Penuh";
			toastr.error('Rak Sudah Memenuhi Kapasitas.','Maaf !','error!')
		}
		document.getElementById("info_" + id).innerHTML = txt;
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
               text:"Yakin akan menghapus Data ini ?",
               type: "warning",
               showCancelButton: true,
               confirmButtonText: "Hapus",
               closeOnConfirm: true,
           },
               function(){
                $.ajax({
                   url:"<?php echo base_url('index.php/stockbarang/delete/'); ?>",
                   data:{id:id},
                   success: function(){
                       $("tr[data-id='"+id+"']").fadeOut("fast",function(){
                           $(this).remove();
                           history.go(0);
                       });
                   }
                });
           });
       });
       });
</script>
<!--<script>
var sel = document.getElementById('simpanlot');

    function getSelectedOption(sel) {
        var opt;
        for ( var i = 0, len = sel.options.length; i < len; i++ ) {
            opt = sel.options[i];
            if ( opt.selected === true ) {
                break;
            }
        }
        return opt;

    }

    $("#simpanlot").change(function () {
      $('#kapasitas').val(sel.options[sel.selectedIndex].value);
    });
</script>-->
<script type="text/javascript">
     $("#kapasitas").chained("#simpanlot");
   </script>
</body>
</html>