<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url()."assets/css/"; ?>mdb.min.css" rel="stylesheet">

    <link href="<?php echo base_url()."assets/css/"; ?>compiled.min.css" rel="stylesheet">
    <style>
        .body {
            background: url("../../assets/images/88.jpg")no-repeat center center fixed;
            }
    </style>

<body class="fixed-sn dark-skin body">

    <!--Double Navigation-->
    <header>

        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed custom-scrollbar ps-container ps-theme-default" style="transform: translateX(-100%);" data-ps-id="a3059142-77b4-da24-04a8-3242680b3688">

            <!-- Logo -->
            <li>
                <div class="logo-wrapper waves-light sn-avatar-wrapper waves-effect waves-light">
                    <a href="#">
                        <img src="<?php echo base_url()."assets/uploads/" ?><?php echo $session_data['foto'] ?>" class="img-circle">
                    </a>
                </div>
            </li>
            <!--/. Logo -->

            <!--Social-->
            <li>
                <ul class="social" style="padding-top:10px;padding-bottom:10px;">
                    <li><?php echo $session_data['nama'] ?></li>
                </ul>
            </li>
            <!--/Social-->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url()."index.php/home/home_kasir" ?>"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url()."index.php/transaksi" ?>"><i class="fa fa-credit-card-alt"></i> Transaksi Penjualan</a></li>
                    <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url()."index.php/transaksi/form_cetakNota" ?>"><i class="fa fa-print"></i> Cetak Nota</a></li>
                </ul>
            </li>
            <!--/. Side navigation links -->

        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></ul>
        <!--/. Sidebar navigation -->

        <!--Navbar-->
        <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">

            <!-- SideNav slide-out button -->
            <div class="pull-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>

            <!-- Breadcrumb-->
            <div class="breadcrumb-dn" style="padding-left:20px">
                <h2>Mitra Bangunan</h2>
            </div>


            <ul class="nav navbar-nav pull-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user "></i>Account</a>
                    <div class="dropdown-menu dropdown-primary dd-right" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url()."index.php/profil/profil_kasir" ?>">Profil</a>
                        <a class="dropdown-item waves-effect waves-light" href="<?php echo base_url()."index.php/profil/edit_profil_kasir" ?>">Edit Profil</a>
                        <a class="dropdown-item waves-effect waves-light" data-toggle="modal" data-target="#myModalLogout">Logout</a>
                    </div>
                </li>
            </ul>

        </nav>
        <!--/.Navbar-->

    </header>
    <!--/Double Navigation-->


<!-- Modal -->
<div class="modal fade" id="myModalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Logout Akun</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                Anda ingin logout ?
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" href="<?php echo base_url()."index.php/login/logout" ?>">Yes</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->


<!-- Modal -->
<div class="modal fade cart-modal" id="cart-modal-ex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Your cart</h4>
            </div>
            <!--Body-->
            <div class="modal-body">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product name</th>
                            <th>product contents</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <?php 
                    $no=0;
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>aa</td>
                            <td>aa</td>
                            <td><a><i class="fa fa-remove"></i></a></td>
                        </tr>
                    </tbody>
                </table>

                <a href="<?php echo base_url()."index.php/crud/transaksi" ?>" class="btn btn-primary">Checkout</a>

            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>



    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="../../js/jquery-2.2.3.min.js"></script>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url()."assets/js/"; ?>jquery-2.2.3.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url()."assets/js/"; ?>tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url()."assets/js/"; ?>bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url()."assets/js/"; ?>mdb.min.js"></script>

    <script>
        $(".button-collapse").sideNav();

        var el = document.querySelector('.custom-scrollbar');

        Ps.initialize(el);
    </script><div class="drag-target" style="left: 0px; -moz-user-select: none;"></div>


<div class="hiddendiv common"></div></body>


</body>
</html>