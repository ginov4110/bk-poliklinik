<?php
    include "koneksi.php";

    if(isset($_POST['simpan'])) {
        $tambah= mysqli_query($mysqli, "INSERT INTO periksa(id_daftar_poli, tgl_periksa, catatan, biaya)
            VALUES (
                '" . $_POST['id_daftar_poli'] . "',
                '" . $_POST['tgl_periksa'] . "',
                '" . $_POST['catatan'] . "',
                '" . $_POST['biaya'] . "'
            )
        ");
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Periksa Pasien</title>
</head>
<body>
    <h1 class="m-2" >Halaman Periksa Pasien</h1>

    <form method="POST" >    
        <?php
            $id_daftar_poli= '';
            $tgl_periksa= '';
            $catatan= '';
            $biaya= '150000';
            if(isset($_GET['id'])){
                $ambil= mysqli_query($mysqli,
                    "SELECT * FROM periksa
                    WHERE id='". $_GET['id'] ."'"
                );
                while($row = mysqli_fetch_array($ambil)){
                    $id_daftar_poli= $row['id_daftar_poli'];
                    $tgl_periksa= $row['tgl_periksa'];
                    $catatan= $row['catatan'];
                    $biaya= $row['biaya'];
                }
        ?>
        <input type="hidden" value="<?php echo $_GET['id'] ?>">
        <?php } ?>
        <div class="mb-3">
            <label  for="id_daftar_poli" class="form-label">Keluhan</label>
            <select id="id_daftar_poli" name="id_daftar_poli" class="form-select">
                <?php
                    $selectedPoli= '';
                    $daftarPoli= mysqli_query($mysqli, "SELECT * FROM daftar_poli");
                    while ($data= mysqli_fetch_array($daftarPoli)){
                        if($data['id'] == $id_daftar_poli){
                            $selectedPoli= 'selected="selected"';
                        } else {
                            $selectedPoli= '';
                        }
                ?>
                <option value="<?php echo $data['id'] ?>" <?php echo $selectedPoli ?> > <?php echo $data['keluhan'] ?> </option>
                <?php } ?>
            </select>   
        </div>
        <div class="mb-3">
            <label  for="tgl_periksa" class="form-label">Tanggal Periksa</label>
            <input type="datetime-local" class="form-control" name="tgl_periksa" id="tgl_periksa" value="<?php echo $tgl_periksa ?>" >
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" rows="3" name="catatan" id="catatan" value="<?php echo $catatan ?>"></textarea>
        </div>
        <div class="mb-3">
            <label for="biaya" class="form-label">Biaya</label>
            <input class="form-control" type="number" name="biaya" id="biaya" value="<?php echo $biaya ?>" >
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Kirim</button>
    </form>
    <hr>
    <h4>Detail Periksa</h4>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Poli</th>
                <th scope="col">Tanggal Periksa</th>
                <th scope="col">Catatan</th>
                <th scope="col">Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $result= mysqli_query($mysqli, "SELECT * FROM periksa");
                $no= 1;
                while($datas= mysqli_fetch_array($result)){
            ?>
            <tr>
                <th scope="row"> <?php echo $no++ ?> </th>
                <td> <?php $datas['id_daftar_poli'] ?> </td>
                <td> <?php $datas['tgl_periksa'] ?> </td>
                <td> <?php $datas['catatan'] ?> </td>
                <td> <?php $datas['biaya'] ?> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>