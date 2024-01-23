<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="mt-4 mb-4">Riwayat Periksa</h1>
    <table class="table table-striped" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Obat</th>
                <th>Tanggal Periksa</th>
                <th>Biaya Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no= 1;
                $riwayats= mysqli_query("SELECT * FROM `detail_periksa` inner join periksa on detail_periksa.id = periksa.id inner join daftar_poli on periksa.id_daftar_poli = daftar_poli.id_poli inner join pasien on daftar_poli.id_pasien = pasien.id;");
                while($riwayat= mysqli_fetch_array($riwayats)){
            ?>
            <tr>
                <th scope="row" > <?php echo $no++ ?> </th>
                <th scope="row" > <?php echo $riwayat['nama'] ?> </th>
                <th scope="row" > <?php echo $riwayat['alamat'] ?> </th>
                <th scope="row" > <?php echo $riwayat['obat'] ?> </th>
                <th scope="row" > <?php echo $riwayat['tgl_periksa'] ?> </th>
                <th scope="row" > <?php echo $riwayat[''] ?> </th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>