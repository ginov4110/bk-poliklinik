<?php
    include "koneksi.php";

    $auto= mysqli_query($mysqli ,"SELECT no_rm FROM pasien");
    $data= mysqli_fetch_array($auto);
    $sequence= (int)substr(1,3);
    $sequence++;
    $initCode= "RM";
    $rmCode= $initCode . sprintf("%03s", $sequence);

    $totalPasien= mysqli_query($mysqli, "SELECT * FROM pasien WHERE id IN (SELECT MAX(id) FROM pasien)");

    if(isset($_POST['simpan'])){
        $tambah = mysqli_query($mysqli, "INSERT INTO pasien (nama,alamat,no_ktp,no_hp,no_rm) 
                                            VALUES (
                                                '" . $_POST['nama'] . "',
                                                '" . $_POST['alamat'] . "',
                                                '" . $_POST['no_ktp'] . "',
                                                '" . $_POST['no_hp'] . "',
                                                '" . $_POST['no_rm'] . "'
                                            )");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pasien Baru</title>
    <link rel="stylesheet" href="./styles/registerPasienStyle.css">
</head>
<body>
    <h1 class="mt-4" >Pendaftaran Pasien</h1>
    <h4 class="mt-5" >Mohon isi data-data yang diperlukan</h4>
    <form action="" method="POST" onsubmit="return(validate());">
            <div class="d-flex flex-column">
                <label class="ms-3 mt-1 me-2" for="nama"><b>Nama Anda</b></label>
                <input class="form-control" name="nama" type="text"  placeholder="Nama Anda" id="nama">

                <label class="ms-3 mt-1 me-2" for="alamat"><b>Alamat</b></label>
                <input class="form-control" name="alamat" type="text"  placeholder="Alamat Anda" id="alamat">

                <label class="ms-3 mt-1 me-2" " for="noKtp"><b>No. KTP</b></label>
                <input class="form-control" name="no_ktp" type="text" placeholder="Nomor KTP" id="no_ktp">

                <label class="ms-3 mt-1 me-2"  for="noHp"><b>No. Handphone</b></label>
                <input class="form-control" name="no_hp" type="text"  placeholder="Nomor Handphone" id="no_hp">

                <label class="ms-3 mt-1 me-2"  for="no_rm"><b>No. Rekam Medis</b></label>
                <input class="form-control" name="no_rm" placeholder="RM000 , jumlah antrian +1" type="text" id="no_rm">
                <p class="text-danger">*Jumlah antrian sekarang <? echo $totalPasien['id'] ?> </p>
            </div>
            <input type="submit" value="Simpan" name="simpan" class="btn btn-primary mt-2">
    </form>

    <h4 class="mt-5" >Daftar Antrian Pasien</h4>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</body>
</html>