<?php
include "koneksi.php";

if (isset($_POST['btnSimpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    $sql = mysqli_query($konek, $sql_query);
    $data = mysqli_fetch_array($sql);
    if ($data) {
    mysqli_query($konek, "UPDATE isLogin SET login= 1");
    echo "
    <script>
    console.log('Berhasil')
    alert('Berhasil');
    location.replace('inputLoket.php')
    </script>
    ";
    } else {
        echo "
    <script>
    console.log('Gagal')
    alert('Gagal');
    location.replace('loketLogin.php')
    </script>
    ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body {
        font-family: 'Helvetica Neue', Arial, sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .title {
        font-size: 32px;
        color: #333;
        margin-bottom: 20px;
        font-weight: bold;
        text-align: center;
        position: relative;
    }

    .form-container {
        background-color: #ffffff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 15px;
        width: 390px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        text-align: center;
        position: relative;
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .form-container:hover {
        transform: scale(1.02);
    }

    .form-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 10px;
        width: 30%;
    }

    .image-text {
        font-size: 16px;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group1 {
        margin-bottom: 35px;
        text-align: center;
    }

    .form-group1 label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        font-size: 14px;
        text-align: left;
        margin-right: 15px;
    }

    .form-group1 input[type="text"],
    .form-group1 input[type="number"],
    .form-group1 select {
        width: calc(100% - 30px);
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 14px;
        background-color: #f9f9f9;
        transition: border-color 0.3s ease;
        text-align: left;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .form-group1 input[type="text"]:focus,
    .form-group1 input[type="number"]:focus,
    .form-group1 select:focus {
        border-color: #007bff;
        outline: none;
        background-color: #fff;
    }

    .submit-btn {
        background-color: black;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        border-color: black;
        font-size: 16px;

        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        width: 100%;
    }

    .submit-btn:hover {
        background-color: white;
        color: black;
        transform: translateY(-2px);
    }

    .submit-btn:active {
        background-color: gray;
        transform: translateY(0);
    }

    html,
    body {
        height: 100%;
        overflow-y: auto;
    }

    .error {
        color: white;
        display: none;
        background-color: red;
        border-radius: 10px;
        width: 75%;
        margin: 30px;
        padding: 20px;
    }

    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 40px;
        color: black;
        text-decoration: none;
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-weight: bold;
        padding: 10px;
    }

    .back-button:hover {
        color: #f5a623;
    }
</style>

<body>
    <h1 class="title">Login</h1>
    <div class="form-container">
        <p class="image-text">Masukkan username dan password</p>
        <form id="loginForm" method="POST">
            <div class="form-group1">
                <label for="pelanggan">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group1">
                <label for="pelanggan">Password:</label>
                <input type="text" name="password" id="password" required>
            </div>
            <button name="btnSimpan" id="btnSimpan" class="submit-btn">Login</button>
        </form>
    </div>
</body>
<?php include "clock.php"; ?>

</html>