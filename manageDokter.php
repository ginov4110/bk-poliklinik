<?php
    include "koneksi.php";

    if(isset($_POST['simpan'])) {
        $tambah= mysqli_query($mysqli, "INSERT INTO dokter (nip, nama, alamat, no_hp, id_poli, passwords)
            VALUES(
                '" . $_POST['nip'] . "',
                '" . $_POST['nama'] . "',
                '" . $_POST['alamat'] . "',
                '" . $_POST['no_hp'] . "',
                '" . $_POST['id_poli'] . "',
                '" . $_POST['password'] . "',
            )
        ");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Dokter</title>
</head>
<body>
    <h2 class="mt-4">Manage Dokter</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="number" name="nip" class="form-control" id="nip" placeholder="NIP" maxlength="10">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat Tempat Tinggal"></textarea>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor Handphone</label>
            <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="Nomor Handphone">
        </div>
        <div class="mb-3">
            <label for="id_poli" class="form-label">Poli</label>
            <select name="id_poli" id="id_poli" class="form-select">
                <?php
                    $selectedPoli= '';
                    $result= mysqli_query($mysqli, "SELECT * FROM poli");
                    while($polis= mysqli_fetch_array($result)){
                        $selectedPoli= 'selected="selected"';
                ?>
                <option value="<?php echo $polis['id'] ?>" <?php echo $selectedPoli ?> > <?php echo $polis['nama_poli'] ?> </option>
            <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
    <hr>
    <h2 class="mt-4">Daftar Dokter</h2>
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Handphone</th>
                <th scope="col">Poli</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no= 1;
                $result= mysqli_query($mysqli, "SELECT * FROM dokter");
                $fetchPoli= mysqli_query($mysqli, "SELECT * FROM poli");
                while($dokters= mysqli_fetch_array($result)){
            ?>
            <tr>
                <th scope="row"> <?php echo $no++?> </th>
                <td> <?php echo $dokters['nip'] ?> </td>
                <td> <?php echo $dokters['nama'] ?> </td>
                <td> <?php echo $dokters['alamat'] ?> </td>
                <td> <?php echo $dokters['no_hp'] ?> </td>
                <td> <?php echo $dokters['id_poli'] ?> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>