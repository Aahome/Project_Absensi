<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Main Menu</title>

</head>

<body background="pemandangan-dari-pelabuhan.jpg" style="background-position: center; background-repeat: no-repeat; background-size: cover;" onload=display_ct();>
    <?php include "menu.php"; ?>
    <div class="container-fluid" style="padding-top: 10%; text-align:center">
        <img src="asset/logo-iteba.png" alt="" style="width: 15%;">
        <h1 style="color: white;">
            Selamat Datang <br>
            SISTEM ABSENSI <br>PENGEMUDI KAPAL SANGKUT <br>BELAKANG PADANG <br>
            BERBASIS KARTU RFID <br>
        </h1>
    </div>
    <?php include "footer.php"; ?>
</body>
<?php include "clock.php"; ?>
 
</html>