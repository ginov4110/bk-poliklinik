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
    <form action="" method="post">
            <div class="d-flex flex-column">
                <label class="ms-3 mt-1 me-2" for="namaPasien"><b>Nama Anda</b></label>
                <input class="form-control namaPasien" type="text" placeholder="Nama Anda" id="namaPasien" aria-label="namaPasien">
                <label class="ms-3 mt-1 me-2" for="alamat"><b>Alamat</b></label>
                <input class="form-control namaPasien" type="text" placeholder="Alamat Anda" id="alamat" aria-label="alamat">
                <label class="ms-3 mt-1 me-2" for="noKtp"><b>No. KTP</b></label>
                <input class="form-control namaPasien" type="text" placeholder="Nomor KTP" id="noKtp" aria-label="noKtp">
                <label class="ms-3 mt-1 me-2" for="noHp"><b>No. Handphone</b></label>
                <input class="form-control namaPasien" type="text" placeholder="Nomor Handphone" id="noHp" aria-label="noHp">
                <label class="ms-3 mt-1 me-2" for="noRm"><b>No. Rekam Medis</b></label>
                <input class="form-control namaPasien" disabled type="text" value="<?php echo $rmCode?>" id="noRm" aria-label="noRm">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
    </form>
</body>
</html>