<?php
include "koneksi.php";

$sql_query = "SELECT * FROM antriloketp";
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
    <div class="date">
        <h1>ANTRIAN PENGEMUDI</h1>
    </div>
    <div class="container-fluid date">
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white">
                    <th style="width: 10px; text-align: center">No.</th>
                    <th style="width: 155px; text-align: center">Nama</th>
                    <th style="width: 155px; text-align: center">Tujuan</th>
                    <th style="width: 155px; text-align: center">Jam</th>
                    <th style="width: 155px; text-align: center">Tanggal</th>
                    <th style="width: 125px; text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {

                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tujuan']; ?></td>
                        <td><?php echo $data['jam']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><a href="selesaip.php?id=<?php echo $data['id']; ?>">Selesai</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <?php include "footer.php"; ?>
</body>
<?php include "clock.php"; ?>

</html>

<!-- tgl lahir -->
<!-- no ktp -->