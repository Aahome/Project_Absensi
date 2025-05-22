<?php
include "koneksi.php";

// Retrieve ID safely
$id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

if ($id === null) {
    echo "ID not provided.";
    exit;
}

$cari = mysqli_query($konek, "SELECT * FROM karyawan WHERE id='$id'");
$hasil = mysqli_fetch_array($cari);

if (isset($_POST['btnSimpan'])) {
    $nokartu = $_POST['nokartu'];
    $nama    = $_POST['nama'];
    $alamat  = $_POST['alamat'];

    $simpan = mysqli_query($konek, "UPDATE karyawan SET nokartu='$nokartu', nama='$nama', alamat='$alamat' WHERE id='$id'");
    if ($simpan) {
        echo "
            <script>
            alert('Tersimpan');
            location.replace('datakaryawan.php')
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Gagal Tersimpan');
            location.replace('datakaryawan.php')
            </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php";?>
    <title>Tambah Karyawan</title>
</head>
<body onload=display_ct();>
    <?php include "menu.php";?>

    <div class="container-fluid">

    <h3>Tambah Data Karyawan</h3>

    <form method="POST">
        <div class="form-group">
            <label>No.Kartu</label>
            <input type="text" name="nokartu" id="nokartu" 
            placeholder="nomor kartu RFID" class="form-control" style="width: 200px;" value="<?= isset($hasil['nokartu']) ? $hasil['nokartu'] : '' ?>">
        </div>
        <div class="form-group">
            <label>Nama Karyawan</label>
            <input type="text" name="nama" id="nama"
            placeholder="nama karyawan" class="form-control" style="width: 400px;" value="<?php echo $hasil['nama']; ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat"
            placeholder="alamat" style="width: 400px;" value="<?php echo $hasil['alamat']; ?>"></textarea>
        </div>

        <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
    </form>

    </div>
    <?php include "footer.php";?>
</body>
<?php include "clock.php"; ?>

</html>