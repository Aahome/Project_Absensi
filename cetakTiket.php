<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "header.php"; ?>
    <title>Main Menu</title>
</head>
<style>
    .button {
        background-color: #04AA6D;
        border: none;
        color: white;
        padding: 6px 23px;
        text-align: center;
        text-decoration: none;
        border-radius: 50px;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>

<body onload=display_ct();>
    <?php include "menu.php"; ?>
    <div class="container-fluid" style="padding-top: 10%; text-align:center">
        <h1><strong>TIKET</strong></h1>

        <?php
        include "koneksi.php";

        if (isset($_GET['pengemudi'])) {
            $pengemudi = urldecode($_GET['pengemudi']);

            // Debugging: Print pengemudi to console
            echo "<script>console.log('$pengemudi')</script>";

            // Filter query to get only matching `pengemudi`
            $sql = mysqli_query($konek, "SELECT * FROM pemesanan WHERE pengemudi = '$pengemudi'");

            if (mysqli_num_rows($sql) > 0) {
                echo "<table class='table table-bordered'>
                        <thead>
                            <tr style='background-color: grey; color: white'>
                                <th style='width: 10px; text-align: center'>No.</th>
                                <th style='width: 120px; text-align: center'>No. Tiket</th>
                                <th style='width: 170px; text-align: center'>Pelanggan</th>
                                <th style='width: 170px; text-align: center'>Pengemudi</th>
                                <th style='width: 70px; text-align: center'>Tanggal</th>
                                <th style='width: 150px; text-align: center'>Tujuan</th>
                                <th style='width: 120px; text-align: center'>Harga</th>
                            </tr>
                        </thead>
                        <tbody>";

                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    $no++;
                    echo "<tr>
                            <td style='text-align: center'>$no</td>
                            <td style='text-align: center'>{$data['id_tiket']}</td>
                            <td style='text-align: center'>{$data['pelanggan']}</td>
                            <td style='text-align: center'>{$data['pengemudi']}</td>
                            <td style='text-align: center'>{$data['tanggal']}</td>
                            <td style='text-align: center'>{$data['tujuan']}</td>
                            <td style='text-align: center'>{$data['harga']}</td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<h3 style='color: red'>No tickets found for pengemudi: $pengemudi</h3>";
            }
        } else {
            echo "<h3 style='color: red'>No pengemudi specified!</h3>";
        }
        ?>
    </div>
    <?php include "footer.php"; ?>

    <script>
        window.print();
    </script>
</body>
<?php include "clock.php"; ?>

</html>