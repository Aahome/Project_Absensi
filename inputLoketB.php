<?php
include "koneksi.php";

// Start session
session_start();

// Check login status only if not already verified
if (!isset($_SESSION['isLoggedIn'])) {
    $loginCheck = mysqli_query($konek, "SELECT * FROM isLogin");
    $data = mysqli_fetch_array($loginCheck);

    if ($data['login'] == 1) {
        $_SESSION['isLoggedIn'] = true; // Set session to remember login status
        mysqli_query($konek, "UPDATE isLogin SET login = 0"); // Update login only once
        echo "<script>console.log('BERHASIL LOGIN');</script>";
    } else {
        echo "
        <script>
        console.log('ANDA BELUM LOGIN');
        alert('ANDA BELUM LOGIN');
        location.replace('loketLogin.php');
        </script>
        ";
        exit();
    }
}

// If user clicks 'Simpan' button, save data
if (isset($_POST['btnSimpan'])) {
    $no_loket = $_POST['no_loket'];
    $nama = $_POST['nama_txt'];

    echo "
    <script>
    console.log('$no_loket');
    console.log('$nama');
    </script>
    ";

    $simpan = mysqli_query($konek, "UPDATE loket SET nama='$nama' WHERE no_loket = '$no_loket'");

    if ($simpan) {
        echo "
        <script>
        alert('Tersimpan');
        location.replace('loket.php');
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Gagal Tersimpan');
        location.replace('loket.php');
        </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
</head>
<style>
    .w200 {
        width: 200px;
    }
</style>

<body>
    <?php include "menu.php"; ?>

    <div class="container-fluid" style="margin-left: 10vh;">
        <h3>Input Loket</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama</label>
                <select name="nama" id="nama" onchange="updateSelectedText()" class="form-control w200" required>
                    <option value="0">-</option>
                    <?php
                    $sql = mysqli_query($konek, "SELECT * FROM karyawan");
                    while ($data = mysqli_fetch_array($sql)) {
                        echo "<option value='" . $data['nama'] . "'>" . $data['nama'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="nama_txt" id="nama_txt">
            </div>

            <div class="form-group">
                <label>Loket</label>
                <select class="form-control w200" name="no_loket" id="no_loket" required>
                    <option value="0">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
        </form>
    </div>

    <?php include "footer.php"; ?>

    <script>
        function updateSelectedText() {
            var select = document.getElementById("nama");
            var selectedText = select.options[select.selectedIndex].text;
            document.getElementById("nama_txt").value = selectedText;
        }
    </script>
</body>

</html>
