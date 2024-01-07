<?php
    include "koneksi.php";

    if (!isset($_SESSION['username'])) {
        // Jika pengguna sudah login, tampilkan tombol "Logout"
        header("Location: index.php?page=loginUser");
        exit;
    }

    if(isset($_POST['simpan'])){
        $tambah= mysqli_query($mysqli, "INSERT INTO dokter (nip, passwords, nama, alamat, no_hp, id_poli)
            VALUES(
                '". $_POST['nip'] ."',
                '". $_POST['passwords'] ."',
                '". $_POST['nama'] ."',
                '". $_POST['alamat'] ."',
                '". $_POST['no_hp'] ."',
                '". $_POST['id_poli'] ."'
            )
        ");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokter</title>
</head>
<body>
    <h2 class="mt-3">Daftar Dokter</h2>
    <!-- forms: nip, nama dokter, alamat, no hp, poli, password -->
    <form method="post">
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="number" class="form-control" name="nip" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="number" class="form-control" name="no_hp" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="id_poli" class="form-label">Pilih Poli</label>
            <select class="form-select" name="id_poli">
                <?php
                    $selectedPoli= '';
                    $polis= mysqli_query($mysqli, "SELECT * FROM poli");
                    
                    while($poli= mysqli_fetch_array($polis)){
                        $selectedPoli= 'selected="selected"';
                ?>
                <option value="<?php echo $poli['id'] ?>" <?php echo $selectedPoli ?>><?php echo $poli['nama_poli'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="passwords" class="form-label">Password</label>
            <input type="password" class="form-control" name="passwords"/>
        </div>
        <input class="btn btn-primary" type="submit" name="simpan" value="Tambah">
    </form>
    <hr>
    <h2 class="mt-4 mb-4">Daftar Semua Dokter</h2>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama Dokter</th>
      <th scope="col">Alamat</th>
      <th scope="col">Nomor Handphone</th>
      <th scope="col">Poliklinik</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $no= 1;
        $dokters= mysqli_query($mysqli, "SELECT * FROM `dokter` inner join poli on dokter.id_poli = poli.id;");
        while($dokter= mysqli_fetch_array($dokters)){
    ?>
    <tr>
        <th scope="row"> <?php echo $no++ ?> </th>
        <td> <?php echo $dokter['nip'] ?> </td>
        <td> <?php echo $dokter['nama'] ?> </td>
        <td> <?php echo $dokter['alamat'] ?> </td>
        <td> <?php echo $dokter['no_hp'] ?> </td>
        <td> <?php echo $dokter['nama_poli'] ?> </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>