<?php
include "koneksi.php";

// Retrieve ID safely
$id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

if ($id === null) {
    echo "ID not provided.";
    exit;
}

$cari = mysqli_query($konek, "SELECT * FROM pemesanan WHERE id_tiket='$id'");
$hasil = mysqli_fetch_array($cari);

if (isset($_POST['btnSimpan'])) {
    $pengemudi  = $_POST['pengemudi_text'];
    $pelanggan = $_POST['pelanggan'];
    $plbTujuan  = $_POST['plbTujuan_text'];
    $tanggal  = $_POST['tanggal'];
    $harga = $_POST['harga'];

    echo "
    <script>
    console.log('$pengemudi')
    </script>
    ";

    echo "
    <script>
    console.log('$pelanggan')
    </script>
    ";

    echo "
    <script>
    console.log('$plbTujuan')
    </script>
    ";

    echo "
    <script>
    console.log('$tanggal')
    </script>
    ";

    echo "
    <script>
    console.log('$harga')
    </script>
    ";

    $simpan = mysqli_query($konek, "UPDATE pemesanan SET tujuan='$plbTujuan', tanggal='$tanggal', harga='$harga', pengemudi='$pengemudi', pelanggan='$pelanggan' WHERE id_tiket='$id'");
    if ($simpan) {
        echo "
                <script>
                alert('Tersimpan');
                location.replace('tiket.php')
                </script>
            ";
    } else {
        echo "
            <script>
            alert('Gagal Tersimpan');
            location.replace('tiket.php')
            </script>
            ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Tambah Karyawan</title>
</head>
<style>
    .w200 {
        width: 200px;
    }
</style>
<body onload=display_ct();>
    <?php include "menu.php"; ?>

    <div class="container-fluid" style="margin-left: 10vh;">

        <h3>Input Tiket</h3>
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Pengemudi</label>
                <select class="form-control w200" name="pengemudi" id="pengemudi" onchange="updateSelectedText()">
                    <option value="0">-</option>
                    <?php
                    include "koneksi.php";
                    $sql = mysqli_query($konek, "SELECT * FROM karyawan");
                    while ($data = mysqli_fetch_array($sql)) {
                        echo "<option value='" . $data['nama'] . "'>" . $data['nama'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="pengemudi_text" id="pengemudi_text" value="<?php echo $hasil['pelanggan']; ?>">
            </div>

            <div class="form-group">
                <label>Nama Pelanggan</label>
                <?php 
                $cari2 = mysqli_query($konek, "SELECT * FROM pemesanan WHERE id_tiket='$id'");
                $hasil2 = mysqli_fetch_array($cari2);
                ?>
                <input type="text" name="pelanggan" id="pelanggan" class="form-control w200" value="<?php echo $hasil2['pelanggan']; ?>" required>
            </div>


            <div class="form-group">
                <label>Pelabuhan asal</label>
                <select class="form-control w200" name="plbTujuan" id="plbTujuan" onchange="updateSelectedText2()">
                    <option value="0">-</option>
                    <option value="1">Sekupang - Belakang Padang</option>
                    <option value="2">Belakang Padang - Sekupang</option>
                </select>
                <input type="hidden" name="plbTujuan_text" id="plbTujuan_text">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" id="harga" class="form-control w200" value="<?php echo $hasil2['harga']; ?>" required>
            </div>

            <div>
                <label for="image">Tanggal Berangkat</label>
                <input class="form-control w200" style="margin-bottom: 15px;" type="date" name="tanggal" id="tanggal" value="<?php echo $hasil['tanggal']; ?>">
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
        </form>

    </div>

    <script>
        function updateSelectedText() {
            var select = document.getElementById("pengemudi");
            var selectedText = select.options[select.selectedIndex].text;
            document.getElementById("pengemudi_text").value = selectedText;
        }

        function updateSelectedText2() {
            var select = document.getElementById("plbTujuan");
            var selectedText = select.options[select.selectedIndex].text;
            document.getElementById("plbTujuan_text").value = selectedText;
        }
    </script>
    <?php include "footer.php"; ?>
</body>
<?php include "clock.php"; ?>

</html>