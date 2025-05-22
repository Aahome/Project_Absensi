<?php
    include "koneksi.php";

    $sql = mysqli_query($konek, "SELECT * FROM status");
    $data = mysqli_fetch_array($sql);
    $mode_absen = $data['mode'];

    $mode = "";
    if($mode_absen==1)
        $mode = "Masuk";
    else if($mode_absen==2)
        $mode = "Istirahat";
    else if($mode_absen==3)
        $mode = "Kembali";
    else if($mode_absen==4)
        $mode = "Pulang";

    $baca_kartu = mysqli_query($konek, "SELECT * FROM tmprfid");
    $data_kartu = mysqli_fetch_array($baca_kartu);
    $nokartu    = isset($data_kartu['nokartu']) ? $data_kartu['nokartu'] : '';
    // $nokartu    = $data_kartu['nokartu'];
?>

<div class="container-fluid" style="text-align: center;">
    <?php if($nokartu=="") { ?>

    <h3>Absen : <?php echo $mode; ?></h3>
    <h3>Tempelkan Kartu RFID Anda</h3>
    <img src="images/rfid.png" alt="RFID" style="width: 200px"> <br>
    <img src="images/animasi2.gif" alt="RFID">
    
    <?php } else {
        $cari_karyawan = mysqli_query($konek, "SELECT * FROM karyawan WHERE nokartu='$nokartu'");
        $jumlah_data = mysqli_num_rows($cari_karyawan);
        
        if($jumlah_data==0)
        echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
        else {

            $data_karyawan = mysqli_fetch_array($cari_karyawan);
            $nama = $data_karyawan['nama'];

            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date('Y-m-d');
            $jam     = date('H:i:s');

            $cari_absen = mysqli_query($konek, "SELECT * FROM absensi WHERE nokartu='$nokartu' AND 
            tanggal='$tanggal'");

            $jumlah_absen = mysqli_num_rows($cari_absen);

        
            if($jumlah_absen == 0 && $mode_absen == 1) {
                echo "<h1>Selamat Datang <br> $nama</h1>";
                mysqli_query($konek, "INSERT INTO absensi(nokartu, tanggal, jam_masuk)values('$nokartu', '$tanggal', '$jam')");
            
            } else if($jumlah_absen >= 1 && $mode_absen == 1) {
                    echo "<h1>ANDA SUDAH ABSEN<br> $nama</h1>";
                } else {
                if ($mode_absen == 2) {
                        echo "<h1>Selamat Istirahat <br> $nama</h1>";
                        mysqli_query($konek, "UPDATE absensi SET jam_istirahat='$jam' WHERE nokartu='$nokartu' and tanggal='$tanggal'");
                } else if ($mode_absen == 3) {
                    echo "<h1>Selamat Datang Kembali <br> $nama</h1>";
                    mysqli_query($konek, "UPDATE absensi SET jam_kembali='$jam' WHERE nokartu='$nokartu' and tanggal='$tanggal'");
                } else if ($mode_absen == 4) {
                    echo "<h1>Terimakasih <br> Sudah Absen  Pulang <br> Data Anda Sudah Tersimpan Di Server <br> $nama</h1>";
                    mysqli_query($konek, "UPDATE absensi SET jam_pulang='$jam' WHERE nokartu='$nokartu' and tanggal='$tanggal'");
                }
            }
        }

        mysqli_query($konek, "DELETE FROM tmprfid");
    } ?>
</div>