<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Data Karyawan</title>
</head>

<body onload=display_ct();>
    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Data Karyawan</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white">
                    <th style="width: 10px; text-align: center">No.</th>
                    <th style="width: 200px; text-align: center">No.Kartu</th>
                    <th style="width: 200px; text-align: center">Nama</th>
                    <th style="text-align: center; width: 170px">Tempat Tanggal Lahir</th>
                    <th style="text-align: center">Alamat</th>
                    <th style="text-align: center; width: 150px">Jenis Kelamin</th>
                    <th style="width: 10px; text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "koneksi.php";

                $sql = mysqli_query($konek, "SELECT * FROM karyawan");
                $sql_image = mysqli_query($konek, "SELECT * FROM test");
                $no = 0;
                // $data = mysqli_fetch_array($sql);
                while ($data = mysqli_fetch_array($sql)) {
                    $data2 = mysqli_fetch_array($sql_image);
                    $no++;

                ?>


                    <tr>
                        <td>
                            <?php echo $no; ?>
                        </td>
                        <td>
                            <?php echo $data['nokartu']; ?>
                        </td>
                        <td>
                            <?php echo $data['nama']; ?>
                            <img src="asset/<?php echo $data2['image_path']; ?>" alt="pas foto" style="width: 35%;">
                        </td>

                        <td>
                            <?php echo $data['ttl']; ?>
                        </td>
                        
                        <td>
                            <?php echo $data['alamat']; ?>
                        </td>

                        <td>
                            <?php echo $data['jenkel']; ?>
                        </td>

                        <td>
                            <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                            <a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="tambah.php"> <button class="btn btn-primary">Tambah Data Karyawan</button></a>

    </div>

    <?php include "footer.php"; ?>
</body>
<?php include "clock.php"; ?>

</html>