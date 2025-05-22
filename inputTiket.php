<?php
include "koneksi.php";

function generateUniqueTicketID($konek) {
    do {
        $id_tiket = rand(1, 999);
        $sql = mysqli_query($konek, "SELECT * FROM pemesanan WHERE id_tiket = '$id_tiket'");
    } while (mysqli_num_rows($sql) > 0);

    return $id_tiket;
}

if (isset($_POST['btnSimpan'])) {
    $id_tiket = generateUniqueTicketID($konek);
    $pengemudi    = $_POST['pengemudi_text'];
    $pelanggan = $_POST['pelanggan'];
    $tanggal = $_POST['tanggal'];
    $plbTujuan  = $_POST['plbTujuan_text'];
    $harga = $_POST['harga'];

    echo "
    <script>
    console.log('$pengemudi')
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
    console.log('$plbTxt')
    </script>
    ";

    echo "
    <script>
    console.log('$harga')
    </script>
    ";


    $simpan = mysqli_query($konek, "INSERT INTO pemesanan(id_tiket, tujuan, tanggal, harga, pengemudi,pelanggan)
        value('$id_tiket', '$plbTujuan', '$tanggal', '$harga', '$pengemudi', '$pelanggan')");
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
                <select name="pengemudi" id="pengemudi" onchange="updateSelectedText()" class="form-control w200" required>
                    <option value="0">-</option>
                    <?php
                    include "koneksi.php";
                    $sql = mysqli_query($konek, "SELECT * FROM karyawan");
                    while ($data = mysqli_fetch_array($sql)) {
                        echo "<option value='" . $data['nama'] . "'>" . $data['nama'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="pengemudi_text" id="pengemudi_text">
            </div>

            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" name="pelanggan" id="pelanggan" class="form-control w200" required>
            </div>


            <div class="form-group">
                <label>Pelabuhan asal</label>
                <select class="form-control w200" name="plbTujuan" id="plbTujuan" onchange="updateSelectedText2()" required>
                    <option value="0">-</option>
                    <option value="1">Sekupang - Belakang Padang</option>
                    <option value="2">Belakang Padang - Sekupang</option>
                </select>
                <input type="hidden" name="plbTujuan_text" id="plbTujuan_text">
            </div>
            
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" id="harga" class="form-control w200" required>
            </div>

            <div>
                <label for="image">Tanggal Berangkat</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control w200" style="margin-bottom: 15px;" required>
            </div>
            <input type="hidden" name="id_tiket" id="id_tiket">
            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
        </form>

    </div>
    <?php include "footer.php"; ?>

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
</body>
<?php include "clock.php"; ?>

</html>