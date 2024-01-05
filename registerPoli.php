<?php
    include "koneksi.php";

        $auto= mysqli_query($mysqli ,"SELECT RIGHT (no_antrian, 1) as max_code FROM daftar_poli");
        $data= mysqli_fetch_array($auto);
        $code= $data['max_code'];
        $sequence= (int)substr($code,1);
        $sequence++;
        $initCode= "";
        $seqCode= $initCode . sprintf($sequence);

    if(isset($_POST['simpan'])){
        $tambah= mysqli_query($mysqli, "INSERT INTO daftar_poli (id_pasien, id_jadwal, keluhan, no_antrian)
            VALUES (
                '" . $_POST['id_pasien'] . "',
                '" . $_POST['id_jadwal'] . "',
                '" . $_POST['keluhan'] . "',
                '" . $_POST['no_antrian'] . "'
            )
            ");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Poli</title>
</head>
<body>
    <h2 class="mt-4">Daftar Poli</h2>
    <hr>
    <form action="" method="POST">
        <?php
            $id_pasien= '';
            $id_jadwal= '';
            $keluhan= '';
            $no_antrian= '';
            if(isset($_GET['id'])){
                $ambil= mysqli_query($mysqli,
                "SELECT * FROM daftar_poli
                WHERE id='" . $_GET['id'] . "'");
                while($row= mysqli_fetch_array($ambil)){
                    $id_pasien= $row['id_pasien'];
                    $id_jadwal= $row['id_jadwal'];
                    $keluhan= $row['keluhan'];
                    $no_antrian= $row['no_antrian'];
                }
            
        ?>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <?php } ?>
        <div class="mb-3">
            <label for="id_pasien" class="form-label">Pasien</label>
            <select class="form-select" name="id_pasien" id="id_pasien">
                <?php 
                    $selectedPasien= '';
                    $pasiens= mysqli_query($mysqli, "SELECT * FROM pasien");
                    while ($pasien= mysqli_fetch_array($pasiens)){
                        $selectedPasien= 'selected="selected"';
                ?>
                <option value="<?php echo $pasien['id']?>" <?php echo $selectedPasien ?> > <?php echo $pasien['nama'] ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_jadwal" class="form-label">Jadwal</label>
            <select name="id_jadwal" id="id_jadwal" class="form-select">
                <?php 
                    $selectedJadwal= '';
                    $jadwals= mysqli_query($mysqli, "SELECT * FROM `jadwal_periksa` INNER JOIN dokter ON jadwal_periksa.`id_dokter` = `dokter`.`id`;");
                    while($jadwal= mysqli_fetch_array($jadwals)){
                        $selectedJadwal= 'selected="selected"';
                ?>
                <option value="<?php echo $jadwal['id'] ?>" <?php echo $selectedJadwal ?> > <?php echo "Dokter " . $jadwal['nama'] ?> , <?php echo $jadwal['hari'] ?>: <?php echo $jadwal['jam_mulai'] ?> - <?php echo $jadwal['jam_selesai'] ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="keluhan">Keluhan</label>
            <textarea name="keluhan" id="keluhan" class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?php echo $keluhan?>" ></textarea>
        </div>
        <div class="mb-3">
            <label for="no_antrian">Nomor Antrian</label>
            <input name="no_antrian" id="no_antrian" value="<?php echo $seqCode ?>" type="number" class="form-control" disabled >
        </div>
        <input type="submit" class="btn btn-primary" namespace="simpan" value="Daftar" >
    </form>
    <hr>
    <h2>Daftar Poli</h2>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Pasien</th>
            <th scope="col">Jadwal</th>
            <th scope="col">Keluhan</th>
            <th scope="col">Nomor Antrian</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $poliDatas= mysqli_query($mysqli, "SELECT * FROM `daftar_poli` INNER JOIN pasien ON daftar_poli.`id_pasien` = pasien.id INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.hari;");
                $no= 1;
                while($poliData= mysqli_fetch_array($poliDatas)){
            ?>
            <tr>
                <th scope="row"> <?php echo $no++ ?> </th>
                <td> <?php echo $poliData['nama'] ?> </td>
                <td> <?php echo $poliData['hari'] ?> : <?php echo $poliData['jam_mulai'] ?> - <?php echo $poliData['jam_selesai'] ?> </td>
                <td> <?php echo $poliData['keluhan'] ?> </td>
                <td> <?php echo $poliData['no_antrian'] ?> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>