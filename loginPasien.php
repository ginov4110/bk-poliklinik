<?php
    include "koneksi.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $no_rm= $_POST['no_rm'];
        $query= "SELECT * FROM pasien WHERE no_rm = '$no_rm'";
        $result= $mysqli->query($query);

        if(!$result){
            die("Query error: " . $mysqli->error);
        }

        if($result->num_rows == 1){
            $_SESSION['no_rm'] = $no_rm;
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/loginDokter.css">
    <title>Login Pasien</title>
</head>
<body>
    <h2 class="mt-3"> Login Pasien </h2>
    <div class="container-fluid p-4 rounded border border-2">
        <form action="" method="post">
            <div class="d-flex flex-column justify-content-center">
                <div class="mb-3 justify-content-center">
                    <label for="">Nomor RM</label>
                    <input class="form-control" type="text" name="no_rm" placeholder="Masukkan Nomor RM anda">
                    <p><i>*Masukkan nomor RM anda</i></p>
                </div>
                <input type="submit" name="simpan" value="Masuk" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>