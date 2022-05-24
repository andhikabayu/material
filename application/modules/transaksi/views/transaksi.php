<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaksi</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>


    <script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/" ?>jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/DataTables/media/css/" ?>jquery.dataTables.min.css">
    <style>
        div.dataTables_length select {
            width: 75px;
            display: inline-block;
        }
    </style>
<body style="background-image:url(<?php echo base_url() ?>assets/images/88.jpg)">
    <?php 
        include "menu_admin.php";
    ?>
    <br><br>
<!-- Modal -->
<div class="modal fade ql-modal" id="quick-look-ex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?php echo base_url()?>transaksi/proses_akhir">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">List Barang yang akan di </h4>
            </div>

            <center>
                 Tanggal : <input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m-d'); ?>"><?php echo date('Y-m-d'); ?>  
            </center>
            <center>No Faktur : <input type="hidden" name="no_faktur" value="<?php echo $kode ?>"><?php echo $kode ?></center>
            <div class="container table-responsive">
                <table class="table table-hover thead-inverse z-depth-1 data">
                    <thead>
                        <th align="center">No.</th>
                        <th align="center">Kd_Barang</th>
                        <th align="center">Nama_Barang</th>
                        <th align="center">Merek</th>
                        <th align="center">Harga</th>
                        <th align="center">Stok_Barang</th>
                        <th align="center">Qty</th>
                        <!-- <th align="center">Diskon</th> -->
                        <th align="center">Subtotal</th>
                        <th align="center">Batal</th>
                    </thead>
                    <tbody>
                    <?php
                        $no=0;
                        $id=0;
                        $total_akhir=0;
                        foreach ($datakeranjang as $r) {
                            $format = $r->harga_barang;
                            $format_uang = number_format($format,2,',','.');
                            $no++;
                            $id++;
                    ?>
                    <tr data-id="<?php echo $r->id ?>">
                        <td align="center">
                            <?php echo $no ?>.
                        </td>
                        <td align="center">
                            <input type="hidden" name="kd_barang[]" value="<?php echo $r->kd_barang ?>"><?php echo $r->kd_barang ?>
                        </td>
                        <td align="center">
                            <input type="hidden" name="nama_barang[]" value="<?php echo $r->nama_barang ?>"><?php echo $r->nama_barang ?>
                        </td>
                        <td align="center">
                            <input type="hidden" name="merek" value="<?php echo $r->merek ?>"><?php echo $r->merek ?>
                        </td>
                        <td align="center">
                            <input type="hidden" name="harga_barang[]" id="harga_<?php echo $no ?>" value="<?php echo $r->harga_barang ?>">Rp.<?php echo $format_uang ?>
                        </td>
                        <td align="center">
                            <?php echo $r->jumlah_barang ?>
                        </td>
                        <td align="center">
                            <input type="number" name="qty[]" placeholder="0" required onkeyup="jumlah(<?php echo $no ?>, 'qty');" id="qty_<?php echo $no ?>" max="<?php echo $r->jumlah_barang ?>"><p id="info_<?php echo $no ?>" class="text-danger">
                        </td>
                        <!-- <td align="center">
                            <input type="text" name="diskon[]" readonly placeholder="0" id="diskon_<?php echo $no ?>" onkeyup="jumlah(<?php echo $no ?>, 'diskon');">
                        </td> -->
                        <td align="center">
                            <input type="text" name="subtotal[]" value="0" id="subtotal_<?php echo $no ?>" readonly>
                        </td>
                        <td align="center">
                            <a class="btn btn-danger hapus-barang" data-id="<?php echo $r->id ?>"><i class="fa fa-trash  "></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php $total_raw = $id ?>
                    </tbody>
                    <tr>
                        <td colspan="7" align="center"><strong>Diskon : </strong></td>
                        <td align="center">
                            <input type="text" name="diskon" id="diskon" onkeyup="jumlah(0, 'diskon');" readonly >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center"><strong>Total : </strong></td>
                        <td align="center">
                            <input type="hidden" name="total_hidden" id="total_hidden">
                            <input type="text" name="total" id="total" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center"><strong>Bayar : </strong></td>
                        <td align="center">
                            <input type="text" name="bayar" id="bayar" onkeyup="jumlah(0, 'bayar');" required readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" align="center"><strong>Sisa : </strong></td>
                        <td align="center">
                            <input type="text" name="sisa" id="sisa" readonly>
                        </td>
                    </tr>
                </table>
                </div>
            <!--Footer-->
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary qty" id="btn-proses" name="btn">Proses</button>
               </form>
                <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/transaksi">Keluar</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->



<main>
<div class="container">
    <!--Form with header-->
<div class="card">
    <div class="card-block">

        <!--Header-->
        <div class="form-header elegant-color">
            <h3><i class="fa fa-shopping-cart fa-lg"></i>  Form Penjualan</h3>
        </div>
    <?php if(count($datajumlah) == 0){?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-md" disabled data-toggle="modal" data-target="#quick-look-ex">
            List Barang Yang Akan di Beli
        </button>
    <?php }else{ ?>
        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#quick-look-ex">
            List Barang Yang Akan di Beli
        </button>
        <span class="counter"><?php echo count($datajumlah) ?></span>
    <?php } ?>
        <br>
        <div class="container  table-responsive  z-depth-1">
        <br>
        <div class="container" align="center">
        <div class="row table-responsive">
        <form method="post" action="<?php echo base_url() ?>transaksi/tambah">
            <table class="table table-hover thead-inverse z-depth-1 data">
                        <thead align="center">
                            <th>No.</th>
                            <th>Kd_Barang</th>
                            <th>Nama_Barang</th>
                            <th>Merek</th>
                            <th>Harga</th>
                            <th>Stok_Barang</th>
                            <th>Beli</th>
                        </thead>
                        
                        <tbody>
                        <?php
                        $no=0;
                        $id=0; 
                            foreach ($penerimaan as $row) {
                                $format = $row->harga_jual;
                                $format_uang = number_format($format,2,',','.');
                                $no++;
                                $id++;
                                if($row->jumlah_barang == 0){ }else{
                        ?>
                          <tr>
                            <td align="center"><?php echo $no ?>.</td>
                            <td align="center"><input type="hidden" name="kd_barang" value="<?php echo $row->kd_barang ?>"><?php echo $row->kd_barang ?></td>
                            <td align="center"><input type="hidden" name="nama_barang" value="<?php echo $row->nama_barang ?>"><?php echo $row->nama_barang ?></td>
                            <td align="center"><input type="hidden" name="merek" value="<?php echo $row->merek ?>"><?php echo $row->merek ?></td>
                            <td align="center">Rp. <input type="hidden" name="harga_barang" value="<?php echo $row->harga_jual ?>"><?php echo $format_uang ?></td>
                            <td align="center"><input type="hidden" name="jumlah_barang" value="<?php echo $row->jumlah_barang ?>"><?php echo $row->jumlah_barang ?></td>
                            <td align="center"><fieldset class="form-group">
                                <input type="checkbox" name="id_penerimaan[]" value="<?php echo $row->id_penerimaan ?>" id="checkbox<?php echo $id; ?>">
                                <label for="checkbox<?php echo $id; ?>"></label>
                                </fieldset></td>
                          </tr>
                          <?php }  } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
<!--/Form with header-->
</div>
<br>
<center><input type="submit" name="submit" value="Proses" class="btn btn-primary"></center>
            </form>
</div>
</main>

<script type="text/javascript" src="<?php echo base_url()."assets/DataTables/media/js/jquery.dataTables.min.js" ?>"></script>
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
            if (document.getElementById("qty_" + id).validity.rangeOverflow){
                txt = "Lebih";
                toastr.error('Maaf, QTY Melebihi Stok Barang.', 'Error!')
                }
                document.getElementById("info_" + id).innerHTML = txt;
                }
</script>
<script>
    function jumlah(id, selector) {
        // console.log(selector)
        if(selector == 'diskon'){
            var total_hidden = document.getElementById('total_hidden').value
            var diskon = document.getElementById('diskon').value
            document.getElementById('total').value = total_hidden - diskon
            if (document.getElementById('total').value <= 0) {
                document.getElementById('total').value = 0
            }
        } else if(selector == 'bayar'){ 
            var total = document.getElementById('total').value
            var bayar = document.getElementById('bayar').value
            document.getElementById('sisa').value = total - bayar
            if (document.getElementById('sisa').value <= 0) {
                document.getElementById('sisa').value = 0
            }
        } else {
            document.getElementById('diskon').removeAttribute("readonly");
            var harga_barang = document.getElementById('harga_' + id).value;
            // var diskon = document.getElementById('diskon_' + id).value;
            var qtyy         = document.getElementById('qty_' + id).value;
            console.log('qty',qtyy)
            var subtotall    = parseInt(harga_barang) * parseInt(qtyy);
            var totall       = parseInt(subtotall);
            var total_raw    = <?php echo $total_raw ?>;
            var hasil_total  = 0;
            if (!isNaN(subtotall)/** && diskon != null*/ ) {
            //     document.getElementById('subtotal_' + id).value = qtyy == "" ? 0 : subtotall - diskon;
            // } else  {
                document.getElementById('subtotal_' + id).value = qtyy == "" ? 0 : subtotall;
            }
            if (qtyy == "") {
                document.getElementById('subtotal_' + id).value = 0;
            }
            for(var i = 1; i <= total_raw;i++){
                hasil_total += parseInt($('#subtotal_' + i).val());
                document.getElementById('total').value = hasil_total;   
                document.getElementById('total_hidden').value = hasil_total;   
            }
            if (document.getElementById('total').value == "" || document.getElementById('total').value == 0) {
                document.getElementById("bayar").readOnly = true; 
            } else {
               document.getElementById('bayar').removeAttribute("readonly");
            }
            var txt = "";
            if (document.getElementById("qty_" + id).validity.rangeOverflow){
                txt = "Lebih";
                toastr.error('Maaf, QTY Tidak Boleh Melebihi Stok Barang..!', 'Error!')
            }
                document.getElementById("info_" + id).innerHTML = txt;
        }
    }
</script>
<script type="text/javascript">
    $(function(){
        $.ajaxSetup({
            type:"post",
            cache:false,
            dataType: "json"
        })

    $(document).on("click",".hapus-barang",function(){
        var id=$(this).attr("data-id");
            swal({
                title:"Batalkan Barang",
                text:"Yakin akan membatalkan barang yang satu ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                closeOnConfirm: true,
        },
        function(){
         $.ajax({
            url:"<?php echo base_url('index.php/transaksi/delete'); ?>",
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

</body>
</html>
