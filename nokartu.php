<?php
    include "koneksi.php";

    $sql = mysqli_query($konek, "SELECT * FROM tmprfid");
    $data = mysqli_fetch_array($sql);

    
    $nokartu = isset($data['nokartu']) ? $data['nokartu'] : '';
?>

<div class="form-group">
    <label>No.Kartu</label>
    <input type="text" name="nokartu" id="nokartu"
        placeholder="Tempelkan kartu RFID anda" class="form-control" style="width: 200px;" value="<?php echo $nokartu; ?>">
</div>