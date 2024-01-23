<?php
    include "koneksi.php";

    if(isset($_POST['simpan'])){
        $tambah= mysqli_query($mysqli, "INSERT INTO periksa(id_daftar_poli, tgl_periksa, catatan, biaya, obat)
            VALUES(
                '". $_POST['id_daftar_poli'] ."',
                '". $_POST['tgl_periksa'] ."',
                '". $_POST['catatan'] ."',
                '". $_POST['biaya'] ."',
                '". $_POST['obat'] ."'
            )
        ");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periksa</title>
</head>
<body>
    <h2 class="mt-4">Periksa Pasien</h2>
    <hr>
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label for="">Daftar Poli</label>
            <select name="id_daftar_poli" class="form-select">
                <?php
                    $selectedPoli= '';
                    $polis= mysqli_query($mysqli, "SELECT * FROM daftar_poli inner join pasien on daftar_poli.id_pasien = pasien.id;");

                    while($poli= mysqli_fetch_array($polis)){
                        $selectedPoli= 'selected="selected"';
                ?>
                <option value="<?php echo $poli['id_poli'] ?>" ><?php echo $poli['nama'] ?>, Keluhan: <?php echo $poli['keluhan'] ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="tgl_periksa">Tanggal Periksa</label>
            <input class="form-control" type="datetime-local" name="tgl_periksa">
        </div>
        <div class="mb-3 mt-3">
            <label for="catatan">Catatan</label>
            <textarea class="form-control" type="text" name="catatan"></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="obat">Obat</label>
            <select name="obat" class="form-select">
                <?php
                    $selectedObat='';
                    $obats= mysqli_query($mysqli, "SELECT * FROM obat");

                    while($obat= mysqli_fetch_array($obats)){
                ?>
                    <option value="<?php echo $obat['id'] ?>" <?php echo $selectedObat ?> > <?php echo $obat['nama_obat'] ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="biaya">Biaya</label>
            <input class="form-control" type="number" value="150000" name="biaya" readonly>
        </div>
        <input class="btn btn-primary" type="submit" name="simpan" value="Selesai" >
    </form>
</body>
</html>