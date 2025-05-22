<?php
    include "koneksi.php";
    // include "tambah.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = "asset/";
    
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES['image']['name']);
    $targetFilePath = $targetDir . $fileName;

    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    if(isset($_POST['upd'])) {
        $image_path = basename($_FILES['image']['name']);

        $simpan = mysqli_query($konek, "INSERT INTO test(image_path)
        value('$image_path')");
        if($simpan) {
            echo "
                <script>
                alert('Tersimpan');
                location.replace('test.php')
                </script>
            ";
        } else {
            echo "
                <script>
                alert('Gagal Tersimpan');
                location.replace('test.php')
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="image">Choose an image to upload:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <button class="btn" name="upd" id="upd">Upload</button>
    </form>
</body>
</html>
