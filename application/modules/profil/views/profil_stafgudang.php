<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<?php 
    include "menu_stafgudang.php";
?>
<div class="rgba-black-strong">
    <!--Main layout-->
    <main class="">
        <div class="container-fluid text-xs-center" style="height: 600px;">
            <br><br>
            
            <!--Card-->
            <div class="card testimonial-card">

                <!--Bacground color-->
                <div class="card-up elegant-color">
                </div>

                <!--Avatar-->
                <div class="avatar"><img src="<?php echo base_url()."assets/uploads/" ?><?php echo $session_data['foto'] ?>" class="img-circle img-responsive">
                </div>

                <div class="card-block">
                    <!--Name-->
                    <h4 class="card-title"><?php echo $session_data['nama'] ?></h4>
                    <h4 class="card-title"><?php echo $session_data['no_telp'] ?></h4>

                    <hr>
                    <!--Quotation-->
                    <p><i class="fa fa-quote-left"></i> Saya Bertugas di Penataan Gudang di Mitra Bangunaan</p>
                </div>

            </div>
            <!--/.Card-->


        </div>
    </main>
    <!--/Main layout-->

       <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Call to action-->
        <div class="call-to-action">
            <ul>
                <li>
                    <h5>Find us on social media</h5>
                </li>
            </ul>
        </div>
        <!--/.Call to action-->

        <hr>

        <!--Social buttons-->
        <div class="social-section">
            <ul>
                <li><a class="btn-floating btn-small btn-fb waves-effect waves-light"><i class="fa fa-facebook"> </i></a></li>
                <li><a class="btn-floating btn-small btn-tw waves-effect waves-light"><i class="fa fa-twitter"> </i></a></li>
                <li><a class="btn-floating btn-small btn-gplus waves-effect waves-light"><i class="fa fa-google-plus"> </i></a></li>
                <li><a class="btn-floating btn-small btn-li waves-effect waves-light"><i class="fa fa-linkedin"> </i></a></li>
                <li><a class="btn-floating btn-small btn-git waves-effect waves-light"><i class="fa fa-github"> </i></a></li>
                <li><a class="btn-floating btn-small btn-pin waves-effect waves-light"><i class="fa fa-pinterest"> </i></a></li>
                <li><a class="btn-floating btn-small btn-ins waves-effect waves-light"><i class="fa fa-instagram"> </i></a></li>
            </ul>
        </div>
        <!--/.Social buttons-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2015 Copyright: <a href="#"> Daffa Pratama </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->
</div>
</body>
</html>