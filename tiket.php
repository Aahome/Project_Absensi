<?php
include "koneksi.php";

$selected_date_from = isset($_GET['filter_from']) ? $_GET['filter_from'] : '';
$selected_date_to   = isset($_GET['filter_to']) ? $_GET['filter_to'] : '';
$pengemudi = isset($_GET['pengemudi_text']) ? $_GET['pengemudi_text'] : '';

echo "
<script>
console.log('$pengemudi')
</script>
";

$sql_query = "SELECT * FROM pemesanan";

if ($selected_date_from && $selected_date_to && $pengemudi) {
    $sql_query .= " WHERE tanggal BETWEEN '$selected_date_from' AND '$selected_date_to' AND pengemudi='$pengemudi'";
} elseif ($selected_date_from && $selected_date_to) {
    $sql_query .= " WHERE tanggal BETWEEN '$selected_date_from' AND '$selected_date_to'";
} elseif ($selected_date_from && $pengemudi) {
    $sql_query .= " WHERE tanggal = '$selected_date_from' AND pengemudi='$pengemudi'";
} elseif ($selected_date_to && $pengemudi) {
    $sql_query .= " WHERE tanggal = '$selected_date_to' AND pengemudi='$pengemudi'";
} elseif ($selected_date_from) {
    $sql_query .= " WHERE tanggal = '$selected_date_from'";
} elseif ($selected_date_to) {
    $sql_query .= " WHERE tanggal = '$selected_date_to'";
} elseif ($pengemudi) {
    $sql_query .= " WHERE pengemudi = '$pengemudi'";
}

echo "<script>
console.log('Query: " . addslashes($sql_query) . "');
console.log('Date From: $selected_date_from');
console.log('Date To: $selected_date_to');
console.log('Pengemudi: $pengemudi');
</script>";

echo "
<script>
console.log('$selected_date_from')
</script>
";
echo "
    <script>
    console.log('$selected_date_to')
    </script>
    ";
$sql = mysqli_query($konek, $sql_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "header.php"; ?>
    <title>Main Menu</title>
</head>
<style>
    .button {
        background-color: #04AA6D;
        border: none;
        color: white;
        padding: 6px 23px;
        text-align: center;
        text-decoration: none;
        border-radius: 50px;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

    .date {
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>

<body onload=display_ct();>
    <?php include "menu.php"; ?>
    <div class="container-fluid">
        <h1><strong>TIKET</strong></h1>

        <form method="GET" action="">
            <div class="date">
                <input type="date" name="filter_from" value="<?php echo $selected_date_from; ?>" style="margin-right: 10px;">
                <p> - </p>
                <input type="date" name="filter_to" value="<?php echo $selected_date_to; ?>" style="margin-left: 10px;">
                <label>Pengemudi</label>
                <select name="pengemudi" id="pengemudi" onchange="updateSelectedText()" required>
                    <option value="0"></option>
                    <?php
                    include "koneksi.php";
                    $sql2 = mysqli_query($konek, "SELECT * FROM karyawan");
                    while ($data2 = mysqli_fetch_array($sql2)) {
                        echo "<option value='" . $data2['nama'] . "'>" . $data2['nama'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="pengemudi_text" id="pengemudi_text">
                <button type="submit" class="btn btn-primary" style="padding-bottom: 5px; padding-top: 5px;">Filter</button>
                <a href="tiket.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white">
                    <th style="width: 10px; text-align: center">No.</th>
                    <th style="width: 120px; text-align: center">No. Tiket</th>
                    <th style="width: 165px; text-align: center">Pelanggan</th>
                    <th style="width: 165px; text-align: center">Pengemudi</th>
                    <th style="width: 70px; text-align: center">Tanggal</th>
                    <th style="width: 150px; text-align: center">Tujuan</th>
                    <th style="width: 120px; text-align: center">Harga</th>
                    <th style="width: 10px; text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                while ($data = mysqli_fetch_array($sql)) {
                    
                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php
                            $tt = "";
                            if ($data['id_tiket'] <= 10) {
                                $tt = "00";
                            } elseif ($data['id_tiket'] >= 10 && $data['id_tiket'] <= 100) {
                                $tt = "0";
                            }
                            ?>

                            <?php echo $tt, $data['id_tiket']; ?></td>
                        <td><?php echo $data['pelanggan']; ?></td>
                        <td><?php echo $data['pengemudi']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['tujuan']; ?></td>
                        <td>Rp<?php echo $data['harga']; ?></td>
                        <td>
                            <a href="updTiket.php?id=<?php echo $data['id_tiket']; ?>">Update</a> |
                            <a href="cetakTiket.php?pengemudi=<?php echo urlencode($data['pengemudi']); ?>">Cetak</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="date">
            <a href="inputTiket.php" style="margin-right:38%"> <button class="btn btn-primary"><strong>INPUT TIKET</strong></button></a>
            <table class="table table-bordered" style="width: 10%; margin-left:38%">
                <thead>
                    <tr style="background-color: grey; color: white">
                        <th style="width: 10px; text-align: center" colspan="2">Total</th>
                    </tr>

                </thead>
                <?php
                $sql2 = mysqli_query($konek, $sql_query);
                ?>
                <tbody>
                    <?php
                    $no2 = 0;
                    $total = 0;
                    while ($data2 = mysqli_fetch_array($sql2)) {
                        $no2++;
                        $total += $data2['harga'];

                        echo "<script>
                        console.log('$no2');
                        console.log('$total');
                        </script>
                        ";
                    } ?>
                    

                    <tr>
                        <td><?php echo $no2; ?></td>
                        <td>Rp<?php echo $total ?></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
<script>
    function updateSelectedText() {
        var select = document.getElementById("pengemudi");
        var selectedText = select.options[select.selectedIndex].text;
        document.getElementById("pengemudi_text").value = selectedText;
    }
</script>
<?php include "clock.php"; ?>

</html>