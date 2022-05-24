<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Masukan Manager</title>
</head>
<body>
	<?php 
		include "profil_manager.php";
	?>

	<script>
    Command: toastr["error"]("Password Tidak Sama, Silahkan masukan user lagi", "Alert")

    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    </script>
</body>
</html>