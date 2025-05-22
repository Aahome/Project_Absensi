<?php

    include "koneksi.php";

    $id = $_GET['id'];

    $hapus = mysqli_query($konek, "DELETE FROM antriloketb WHERE id='$id'");


    if($hapus) {
        echo "
            <script>
                alert('Terhapus');
                location.replace('antrianB.php')
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Terhapus');
                location.replace('antrianB.php')
            </script>
        ";
    }
?>