<?php
include "koneksi.php";


$baca_kartu = mysqli_query($konek, "SELECT * FROM tmprfid");
$data_kartu = mysqli_fetch_array($baca_kartu);
$nokartu    = isset($data_kartu['nokartu']) ? $data_kartu['nokartu'] : '';
// $nokartu    = $data_kartu['nokartu'];


?>

<?php if ($nokartu == "") { ?>

    <h1 style="margin-bottom: 10px;">SCAN KARTU ANDA</h1>

<?php } else {

    $sql = mysqli_query($konek, "SELECT * FROM karyawan WHERE nokartu='$nokartu'");
    $data = mysqli_fetch_array($sql);

?>



    <div class="form-group">
        <label>No. Kartu</label>
        <input type="text"  class="form-control w200" value="<?php echo isset($data['nokartu']) ? $data['nokartu'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" id="nama" class="form-control w200" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="nama_txt" id="nama_txt" class="form-control w200" value="<?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label>Jenis kelamin</label>
        <input type="text" name="nama_txt" id="nama_txt" class="form-control w200" value="<?php echo isset($data['jenkel']) ? $data['jenkel'] : ''; ?>" required>
    </div>
<?php } ?>