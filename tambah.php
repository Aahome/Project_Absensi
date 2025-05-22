<?php
include "koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $nokartu = $_POST['nokartu'];
    $nama    = $_POST['nama'];
    $ttl = $_POST['t'] . ', ' . $_POST['tl'];
    $alamat  = $_POST['alamat'];
    $noktp = $_POST['noktp'];
    $jenkel = $_POST['jenkel_txt'];

    echo "
    <script>
    console.log('$jenkel')
    </script>
    ";

    $simpan = mysqli_query($konek, "INSERT INTO karyawan(nokartu, noktp, nama, alamat, ttl, jenkel)
        value('$nokartu','$noktp', '$nama', '$alamat', '$ttl', '$jenkel')");
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = "asset/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES['image']['name']);
    $targetFilePath = $targetDir . $fileName;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if (isset($_POST['btnSimpan'])) {
        $image_path = $fileName;

        $simpan = mysqli_query($konek, "INSERT INTO test(image_path)
            value('$image_path')");
        if ($simpan) {
            echo "
                    <script>
                    alert('Tersimpan');
                    </script>
                    ";
        } else {
            echo "
                    <script>
                    alert('Gagal Tersimpan');
                    </script>
                    ";
        }
    }

    if (in_array($fileType, $validExtensions)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
            echo "File uploaded successfully: $targetFilePath";
            echo "<script>location.replace('test.php')</script>";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}
mysqli_query($konek, "DELETE FROM tmprfid");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "header.php"; ?>
    <title>Tambah Karyawan</title>
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#norfid").load('nokartu.php')
            }, 1000);
        });
    </script>
</head>
<style>
    .grid {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
    }

    .item {
        text-align: center;
    }

    .row {
        display: flex;
        justify-content: space-between;
    }


    .w200 {
        width: 200px;
    }
</style>

<body onload=display_ct();>
    <?php include "menu.php"; ?>

    <div class="container-fluid">

        <h3>Tambah Data Karyawan</h3>

        <form method="POST" enctype="multipart/form-data">
            <div id="norfid"></div>

            <div class="form-group">
                <label>No. KTP</label>
                <input type="number" name="noktp" id="noktp"
                    placeholder="No. KTP" class="form-control w200">
            </div>

            <div class="form-group">
                <label>Nama Karyawan</label>
                <input type="text" name="nama" id="nama"
                    placeholder="nama karyawan" class="form-control w200">
            </div>

            <div><label>Tempat Tanggal Lahir</label>
                <div class="grid">
                    <input type="text" name="t" id="t"
                        placeholder="Tempat" class="form-control" style="width: 120px;">
                    <input type="date" name="tl" id="tl" class="form-control w200" required>
                </div>
            </div>

            <div>
                <label for="image">Choose an image to upload:</label>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat"
                    placeholder="alamat" style="width: 400px;"></textarea>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control w200" name="jenkel" id="jenkel" onchange="updateSelectedText()" required>
                    <option value="0">-</option>
                    <option value="1">laki - laki</option>
                    <option value="2">Perempuan</option>
                </select>
                <input type="hidden" name="jenkel_txt" id="jenkel_txt">
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
        </form>

    </div>
    <?php include "footer.php"; ?>
    <script>
        function updateSelectedText() {
            var select = document.getElementById("jenkel");
            var selectedText = select.options[select.selectedIndex].text;
            document.getElementById("jenkel_txt").value = selectedText;
        }
    </script>
</body>
<?php include "clock.php"; ?>
 
</html>