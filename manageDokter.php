<?php
    include "koneksi.php";

    if (!isset($_SESSION['username'])) {
        // Jika pengguna sudah login, tampilkan tombol "Logout"
        header("Location: index.php?page=loginUser");
        exit;
    }

    if(isset($_POST['simpan'])){
        if(isset($_POST['id'])){
            $ubah= mysqli_query($mysqli, "UPDATE dokter SET
                nip= '". $_POST['nip'] ."',
                passwords= '". $_POST['passwords'] ."',
                nama= '". $_POST['nama'] ."',
                alamat= '". $_POST['alamat'] ."',
                no_hp= '". $_POST['no_hp'] ."'
                WHERE id= '". $_POST['id'] ."'
                ");
        } else {
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
        echo "<script> 
                document.location='index.php?page=manageDokter';
                </script>";
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
    <?php echo $_GET['id']?>
    <!-- forms: nip, nama dokter, alamat, no hp, poli, password -->
    <form method="post">
        <?php
            $nip= '';
            $nama= '';
            $alamat= '';
            $no_hp='';
            $id_poli= '';
            $passwords= '';
            if(isset($_GET['id'])) {
                $ambil = mysqli_query($mysqli, "SELECT * FROM dokter WHERE id= '". $_GET['id'] ."'");
                while($row = mysqli_fetch_array($ambil)) {
                    $nip= $row['nip'];
                    $nama= $row['nama'];
                    $alamat= $row['alamat'];
                    $no_hp= $row['no_hp'];
                    $id_poli= $row['id_poli'];
                    $passwords= $row['passwords'];
             
        ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <?php
               }
            }
        ?>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="number" class="form-control" name="nip" aria-describedby="emailHelp" value="<?php echo $nip  ?>" >
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Dokter</label>
            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp" value="<?php echo $nama  ?>" >
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input class="form-control" name="alamat" rows="3" value="<?php echo $alamat  ?>" >
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="number" class="form-control" name="no_hp" aria-describedby="emailHelp" value="<?php echo $no_hp  ?>">
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
                <option value="<?php echo $poli['id']?>" <?php echo $selectedPoli ?>><?php echo $poli['nama_poli'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="passwords" class="form-label">Password</label>
            <input type="password" class="form-control" name="passwords" value="<?php echo $passwords  ?>" />
        </div>
        <input class="btn btn-primary" type="submit" name="simpan" value="Tambah">
    </form>
    <hr>
    <h2 class="mt-4 mb-4">Daftar Semua Dokter</h2>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama Dokter</th>
      <th scope="col">Alamat</th>
      <th scope="col">Nomor Handphone</th>
      <th scope="col">Poliklinik</th>
      <th scope="col" >Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $no= 1;
        $dokters= mysqli_query($mysqli, "SELECT * FROM `dokter` inner join poli on dokter.id_poli = poli.id;");
        while($dokter= mysqli_fetch_array($dokters)){

            if(isset($_GET['aksi'])){
                if($_GET['aksi'] == 'hapus') {
                    $hapus = mysqli_query($mysqli, "DELETE FROM dokter WHERE id = '" . $_GET['id'] . "'");
                }
                echo "<script> 
                        document.location='index.php?page=manageDokter';
                        </script>";
            }
    ?>
    <tr>
        <th scope="row"> <?php echo $no++ ?> </th>
        <td> <?php echo $dokter['nip'] ?> </td>
        <td> <?php echo $dokter['nama'] ?> </td>
        <td> <?php echo $dokter['alamat'] ?> </td>
        <td> <?php echo $dokter['no_hp'] ?> </td>
        <td> <?php echo $dokter['nama_poli'] ?> </td>
        <td> 
            <a href="index.php?page=manageDokter&id= <?php echo $dokter['id'] ?>"><i class=" bi bi-pencil-square text-warning"></i></a>  
            <a class="ms-3" href="index.php?page=manageDokter&id= <?php echo $dokter['id'] ?>&aksi=hapus"><i class="bi bi-trash3 text-danger "></i></a> 
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>