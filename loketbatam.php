<?php
include "koneksi.php";

$sql_query = "SELECT * FROM antriloketb LIMIT 1";
$sql = mysqli_query($konek, $sql_query);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Main Menu</title>

</head>
<style>
    .date2 {
        display: grid;
        grid: repeat(3, 80px);
    }

    .date {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 200px;
        width: 100%;
        min-height: 30vh;
    }


    .table2 {
        border: 1px solid #ddd;
        width: 25%;
        max-width: 25%;
        height: 125px;
        margin: auto;
        margin-bottom: 20px;
        background-color: transparent;
        border-collapse: collapse;
        border-spacing: 0;
        box-sizing: border-box;
    }
</style>

<body onload=display_ct();>
    <?php include "menu.php"; ?>
    <div class="container-fluid date">
        <?php


        $no = 0;
        $total = 0;
        $pengemudi = '';
        if ($data = mysqli_fetch_array($sql)) {
            $pengemudi = $data['nama'];
            $sql_image = mysqli_query($konek, "SELECT * FROM test WHERE nama='$pengemudi'");
            $data2 = mysqli_fetch_array($sql_image);
            $no++;
        ?>
            <table class="table table2 table-bordered">
                <tr style="background-color: grey; color: white; text-align: center">
                    <td><strong>LOKET BLP</strong></td>
                </tr>
                <tr style="text-align: center;">
                    <td><img src="asset/<?php echo $data2['image_path'] ?>" alt="" style="width: 35%;"><br>
                        <?php echo $data['nama'] ?></td>
                </tr>
            </table>
        <?php } ?>
    </div>
    <div class="container-fluid date">
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white">
                    <th style="width: 10px; text-align: center">No.</th>
                    <th style="width: 165px; text-align: center">Pelanggan</th>
                    <th style="width: 150px; text-align: center">Tujuan</th>
                    <th style="width: 70px; text-align: center">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo "
                        <script>
                        console.log('$pengemudi');
                        </script>
                        ";
                
                $sql_query2 = "SELECT * FROM pemesanan WHERE pengemudi='$pengemudi'";
                

                $sql2 = mysqli_query($konek, $sql_query2);

                $no = 0;
                while ($data2 = mysqli_fetch_array($sql2)) {

                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data2['pelanggan']; ?></td>
                        <td><?php echo $data2['tujuan']; ?></td>
                        <td><?php echo $data2['tanggal']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="inputLoketBatam.php" style="margin: auto; margin-bottom: 75px;display:flex; justify-content: center; align-items: center"> <button class="btn btn-primary"><strong>INPUT LOKET</strong></button></a>

    <?php include "footer.php"; ?>
</body>
<?php include "clock.php"; ?>

</html>

<!-- tgl lahir -->
<!-- no ktp -->