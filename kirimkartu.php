<?php 
    include "koneksi.php";

    $nokartu = $_GET['nokartu'];
    mysqli_query($konek, "DELETE FROM tmprfid");

    $simpan = mysqli_query($konek, "INSERT INTO tmprfid(nokartu)
    values('$nokartu')");

    if($simpan) 
        echo "Berhasil";
    else
        echo "Gagal";
?>