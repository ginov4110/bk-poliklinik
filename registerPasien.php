<?php
    if(isset($_POST['simpan'])){
        $tambah= mysqli_query($mysqli, "INSERT INTO pasien (nama, alamat, no_ktp, no_hp)
            VALUES (
                '". $_POST['nama'] ."',
                '". $_POST['alamat'] ."',
                '". $_POST['no_ktp'] ."',
                '". $_POST['no_hp'] ."',
            )
        ");
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
    <?php
        $auto= mysqli_query($mysqli ,"select no_rm from pasien");
        $data= mysqli_fetch_array($auto);
        $sequence= (int)substr(1,3);
        $sequence++;
        $initCode= "RM";
        $rmCode= $initCode . sprintf("%03s", $sequence)
    ?>
    <form action="" method="post" onsubmit="return(validate());">
            <div class="d-flex flex-column">
                <label class="ms-3 mt-1 me-2" for="nama"><b>Nama Anda</b></label>
                <input class="form-control namaPasien" type="text" placeholder="Nama Anda" id="nama" aria-label="namaPasien">
                <label class="ms-3 mt-1 me-2" for="alamat"><b>Alamat</b></label>
                <input class="form-control namaPasien" type="text" placeholder="Alamat Anda" id="alamat" aria-label="alamat">
                <label class="ms-3 mt-1 me-2" for="noKtp"><b>No. KTP</b></label>
                <input class="form-control namaPasien" type="text" placeholder="Nomor KTP" id="no_ktp" aria-label="no_ktp">
                <label class="ms-3 mt-1 me-2" for="noHp"><b>No. Handphone</b></label>
                <input class="form-control namaPasien" type="text" placeholder="Nomor Handphone" id="no_hp" aria-label="no_hp">
                <label class="ms-3 mt-1 me-2" for="noRm"><b>No. Rekam Medis</b></label>
                <input class="form-control namaPasien" disabled type="text" value="<?php echo $rmCode?>" id="noRm" aria-label="noRm">
            </div>
            <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>
    </form>
</body>
</html>