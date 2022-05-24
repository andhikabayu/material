<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url()."assets/css/"; ?>mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url()."assets/css/"; ?>costume.css" rel="stylesheet">
<body>

<!--Navigation & Intro-->
<header>
    <!--Mask-->
    <div class="view hm-black-light">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row" id="home">

                    <!--First column-->
                    <div class="col-lg-6">
                        <div class="description">
                            <h2 class="h2-responsive wow fadeInLeft">Selamat Datang </h2>
                            <hr class="hr-light wow fadeInLeft">
                            <p class="wow fadeInLeft" data-wow-delay="0.4s">Mitra Bangunan tempat yang menyediakan Barang Material dengan Belanja Dekat, Belanja Hemat, dan Belanja Cermat.</p>
                            <br>
                        </div>
                    </div>
                    <!--/.First column-->

                    <!--Second column-->
                    <div class="col-lg-6">
                        <!--Form-->
                        <div class="card wow fadeInRight">
                            <div class="card-block">

                                <!--Body-->
                                <?php echo form_open('login/verifylogin') ?>
                                    <div class="md-form" style="color:#454545">
                                        <i class="fa fa-user prefix"></i>
                                        <input type="text" id="form91" name="username" class="form-control validate" autofocus required>
                                        <label for="form91">Your Username</label>
                                    </div>
                                    <div class="md-form" style="color:#454545">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" id="form3" name="password" class="form-control" required>
                                        <label for="form3">Your password</label>
                                    </div>
                                    <div class="text-xs-center">
                                        <button type="submit" class="btn btn-primary btn-lg" name="login">Login</button>
                                    </div>
                                </form>    

                            </div>
                        </div>
                        <!--/.Form-->
                    </div>
                    <!--/Second column-->
                </div>
            </div>
        </div>
    </div>
    <!--/.Mask-->

</header>
<!--/Navigation & Intro-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url()."assets/js/"; ?>jquery-2.2.3.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url()."assets/js/"; ?>tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url()."assets/js/"; ?>bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url()."assets/js/"; ?>mdb.min.js"></script>
    
</body>
</html>