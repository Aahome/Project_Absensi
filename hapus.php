<?php

    include "koneksi.php";

    $id = $_GET['id'];

    $hapus = mysqli_query($konek, "DELETE FROM karyawan WHERE id='$id'");


    if($hapus) {
        echo "
            <script>
                alert('Terhapus');
                location.replace('datakaryawan.php')
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Terhapus');
                location.replace('datakaryawan.php')
            </script>
        ";
    }
?>