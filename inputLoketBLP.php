<?php
include "koneksi.php";

// // Start session
// session_start();

// // Check login status only if not already verified
// if (!isset($_SESSION['isLoggedIn'])) {
//     $loginCheck = mysqli_query($konek, "SELECT * FROM isLogin");
//     $data = mysqli_fetch_array($loginCheck);

//     if ($data['login'] == 1) {
//         $_SESSION['isLoggedIn'] = true; // Set session to remember login status
//         mysqli_query($konek, "UPDATE isLogin SET login = 0"); // Update login only once
//         echo "<script>console.log('BERHASIL LOGIN');</script>";
//     } else {
//         echo "
//         <script>
//         console.log('ANDA BELUM LOGIN');
//         alert('ANDA BELUM LOGIN');
//         location.replace('loketLogin.php');
//         </script>
//         ";
//         exit();
//     }
// }

// If user clicks 'Simpan' button, save data

$baca_kartu = mysqli_query($konek, "SELECT * FROM tmprfid");
$data_kartu = mysqli_fetch_array($baca_kartu);
$nokartu    = isset($data_kartu['nokartu']) ? $data_kartu['nokartu'] : '';

$sql2 = mysqli_query($konek, "SELECT * FROM karyawan WHERE nokartu='$nokartu'");
$data2 = mysqli_fetch_array($sql2);

if (isset($_POST['btnSimpan'])) {
    $nama = $data2['nama'];
    $tujuan = isset($_POST['plbTujuan_text']) ? $_POST['plbTujuan_text'] : "";
    $jam = isset($_POST['timeInput']) ? $_POST['timeInput'] : "";
    $tanggal = isset($_POST['dateInput']) ? $_POST['dateInput'] : "";

    echo "
console.log($nama)
";

    $simpan = mysqli_query($konek, "INSERT INTO antriloketb(nama, tujuan, jam, tanggal) VALUES ('$nama', '$tujuan', '$jam', '$tanggal')");
    if ($simpan) {
        echo "
        <script>
        alert('Tersimpan');
        location.replace('loketblp.php');
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal Tersimpan');
        location.replace('loketblp.php');
        </script>
        ";
    }
    mysqli_query($konek, "DELETE FROM tmprfid");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $("#dataContainer").load("iloketP.php");
            }, 1000);
        });
    </script>
</head>
<style>
    .w200 {
        width: 200px;
    }
</style>

<body onload=display_ct();>
    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Input Loket</h3>

        <div id="dataContainer" method="POST"></div>


        <form method="POST">
            <div class="form-group">
                <label>Tujuan</label>
                <select class="form-control w200" name="plbTujuan" id="plbTujuan" onchange="updateSelectedText()" required>
                    <option value="">-</option>
                    <option value="Sekupang - Belakang Padang">Sekupang - Belakang Padang</option>
                    <option value="Belakang Padang - Sekupang">Belakang Padang - Sekupang</option>
                </select>
                <input type="hidden" name="plbTujuan_text" id="plbTujuan_text">
            </div>
            <div class="form-group">
                <label>Jam</label>
                <input type="text" name="timeInput" id="timeInput" class="form-control w200" readonly required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="text" name="dateInput" id="dateInput" class="form-control w200" readonly required>
            </div>

            <button class="btn btn-primary" name="btnSimpan">Simpan</button>
        </form>
    </div>

    <?php include "footer.php"; ?>
    <?php include "clock.php"; ?>

    <script>
        function updateSelectedText() {
            var select = document.getElementById("plbTujuan");
            var selectedText = select.options[select.selectedIndex].text;
            document.getElementById("plbTujuan_text").value = selectedText;
        }
    </script>
</body>

</html>