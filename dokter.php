<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter Spesialis</title>
</head>
<body>
    <h1 class="mt-3">Jadwal Dokter Spesialis</h1>
    <table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nama Dokter</th>
      <th scope="col">No Handphone</th>
      <th scope="col">Hari</th>
      <th scope="col">Jadwal Praktek</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $datas_dokter= mysqli_query($mysqli, "SELECT * FROM dokter");
      $datas_jadwal= mysqli_query($mysqli, "SELECT * FROM jadwal_periksa");
      $no= 1;
      while ($datas= mysqli_fetch_array($datas_dokter) and $data_jadwal= mysqli_fetch_array($datas_jadwal)){
    ?>
    <tr>
      <th scope="row"> <?php echo $no++ ?> </th>
      <td> <?php echo $datas['nama'] ?> </td>
      <td> <?php echo $datas['no_hp'] ?> </td>
      <td> <?php echo $data_jadwal['hari'] ?> </td>
      <td> <?php echo $data_jadwal['jam_mulai'];?> - <?php echo $data_jadwal['jam_selesai'];?> </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>
</body>
</html>