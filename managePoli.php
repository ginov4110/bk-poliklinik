<?php
    include "koneksi.php";

    if (!isset($_SESSION['username'])) {
        // Jika pengguna sudah login, tampilkan tombol "Logout"
        header("Location: index.php?page=loginUser");
        exit;
    }

    
    if(isset($_POST['simpan'])){
        if(isset($_POST['id'])){
            $ubah= mysqli_query($mysqli, "UPDATE poli SET
                nama_poli= '". $_POST['nama_poli'] ."',
                keterangan= '". $_POST['keterangan'] ."'
                WHERE id= '". $_POST['id'] ."'
            ");
        } else {
            $tambah= mysqli_query($mysqli, "INSERT INTO poli(nama_poli, keterangan)
            VALUES(
                '". $_POST['nama_poli'] ."',
                '". $_POST['keterangan'] ."'
                )
                ");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Poli</title>
</head>
<body>
    <h2 class="mt-3">Manage Poli</h2>
    <form action="" method="post">
        <?php
            $nama_poli= '';
            $keterangan= '';
            if(isset($_GET['id'])){
                $ambil= mysqli_query($mysqli, "SELECT * FROM poli WHERE id= '". $_GET['id'] ."'");
                while($row= mysqli_fetch_array($ambil)){
                    $nama_poli= $row['nama_poli'];
                    $keterangan= $row['keterangan'];
             
        ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
        <?php
               }
            }
        ?>
        <div class="mb-3">
            <label for="" class="form-label">Nama Poli</label>
            <input type="text" class="form-control" name="nama_poli" value="<?php echo $nama_poli ?>"  >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Keterangan</label>
            <input class="form-control" name="keterangan" value="<?php echo $keterangan ?>"  >
        </div>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
    </form>
    <hr>
    <h2 class="mb-4 mt-4">Daftar Semua Poli</h2>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Poli</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                $polis= mysqli_query($mysqli, "SELECT * FROM poli");

                while($poli= mysqli_fetch_array($polis)){
            ?>
            <tr>
                <th scope="row"> <?php echo $no++ ?> </th>
                <td> <?php echo $poli['nama_poli'] ?> </td>
                <td> <?php echo $poli['keterangan'] ?> </td>
                <td>
                    <a href="index.php?page=managePoli&id= <?php echo $poli['id'] ?>"><i class=" bi bi-pencil-square text-warning"></i></a>  
                    <a class="ms-3" href="index.php?page=managePoli&id= <?php echo $poli['id'] ?>&aksi=hapus"><i class="bi bi-trash3 text-danger "></i></a> 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>