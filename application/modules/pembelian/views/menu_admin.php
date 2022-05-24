<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url()."assets/css/"; ?>mdb.min.css" rel="stylesheet">

    <link href="<?php echo base_url()."assets/css/"; ?>compiled.min.css" rel="stylesheet">
    <style>
        body {
            background: url("../../assets/images/88.jpg")no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

<body class="fixed-sn dark-skin">
    
<!--Double navigation-->
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
            <ul class="social">
                <li><h2><?php echo $session_data['nama']; ?></h2></li>
            </ul>
        </li>
        <!--/Social-->

        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li><a class="collapsible-header waves-effect arrow-r" href="<?php echo base_url()."index.php/home/home_admin" ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-plus"></i> Master<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="<?php echo base_url()."index.php/barang/barang" ?>" class="waves-effect">Barang</a>
                            </li>
                            <li><a href="<?php echo base_url()."index.php/merek/merek" ?>" class="waves-effect">Merek</a>
                            </li>
                            <li><a href="<?php echo base_url()."index.php/user/input_user" ?>" class="waves-effect">User</a>
                            </li>
                            <li><a href="<?php echo base_url()."index.php/suplier/suplier" ?>" class="waves-effect">Suplier</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-credit-card-alt"></i> Transaksi<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <!-- <li><a href="<?php echo base_url()."index.php/pembelian/tranpembelian" ?>" class="waves-effect">Pembelian</a>
                            </li> -->
                            <li><a href="<?php echo base_url()."index.php/penerimaan/penerimaan" ?>" class="waves-effect">Penerimaan</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r" <a href="<?php echo base_url()."index.php/laporan/laporan" ?>"><i class="fa fa-fax"></i> Laporan</a></li>
            </ul>
        </li>
        <!--/. Side navigation links -->

    </ul>
    <!--/. Sidebar navigation -->

    <!--Navbar-->
    <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">

        <!-- SideNav slide-out button -->
        <div class="pull-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
        </div>

        <!-- Breadcrumb-->
        <div class="breadcrumb-dn">
            <p>Mitra Bangunan</p>
        </div>

        <ul class="nav navbar-nav pull-right">

           <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Account</a>
                <div class="dropdown-menu dropdown-primary dd-right" aria-labelledby="dropdownMenu1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <a class="dropdown-item" href="<?php echo base_url()."index.php/profil/profil_admin" ?>">Profil</a>
                    <a class="dropdown-item" href="<?php echo base_url()."index.php/profil/edit_profil_admin" ?>">Edit Profil</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#myModalLogout">Logout</a>
                </div>
            </li>
        </ul>

    </nav>
    <!--/.Navbar-->

</header>
<!--/Double navigation-->                                   

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