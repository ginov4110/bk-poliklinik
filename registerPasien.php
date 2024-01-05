<?php
    include "koneksi.php";
        $auto= mysqli_query($mysqli ,"SELECT RIGHT (no_rm, 3) as max_code FROM pasien");
        $data= mysqli_fetch_array($auto);
        $code= $data['max_code'];
        $sequence= (int)substr($code,1,3);
        $sequence++;
        $initCode= date("Ymd");
        $rmCode= $initCode . sprintf("%03s", $sequence);
    

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
                <input class="form-control" name="no_rm" value="<?php echo $rmCode++ ?>"  type="text" id="no_rm" readonly>
            </div>
            <input type="submit" value="Daftar" name="simpan" class="btn btn-primary mt-2">
    </form>
    <hr>
    <h4 class="mt-5" >Daftar Antrian Pasien</h4>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Nomor KTP</th>
            <th scope="col">Nomor HP</th>
            <th scope="col">Nomor RM</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = mysqli_query($mysqli, "SELECT * FROM pasien");
                $no= 1;
                while ($datas = mysqli_fetch_array($result)){
            ?>
            <tr>
                <th scope="row"><?php echo $no++ ?></th>
                <td><?php echo $datas['nama'] ?></td>
                <td><?php echo $datas['alamat'] ?></td>
                <td><?php echo $datas['no_ktp'] ?></td>
                <td><?php echo $datas['no_hp'] ?></td>
                <td><?php echo $datas['no_rm'] ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>