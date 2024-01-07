<?php
    include "koneksi.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nip= $_POST['nip'];
        $passwords= $_POST['passwords'];

        $query = "SELECT * FROM dokter WHERE nip = '$nip'";
        $result= $mysqli->query($query);

        if(!$result){
            die("Query error: " . $mysqli->error);
        }

        if($result->num_rows == 1){
            $_SESSION['nip']= $nip;
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
    <title>Login Dokter</title>
</head>
<body>
    <div class="container-fluid p-4 rounded border border-2 mt-5">
        <form action="index.php?page=loginDokter" method="post">
                        <?php
                        if (isset($error)) {
                            echo '<div class="alert alert-danger">' . $error . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';
                        }
                        ?>
            <div class="row">
                <div class="col text-center">
                    <img src="./images/dokter.png" class="img-fluid mb-5" alt="">
                </div>
                <div class="col mb-5">
                    <h2 class="mt-3 mb-5"> Login Dokter </h2>
                    <div class="mb-3">
                        <label for="">NIP</label>
                        <input class="form-control" type="text" name="nip" placeholder="NIP">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input class="form-control" type="password" name="passwords" placeholder="Password">
                    </div>
                </div>
                <input type="submit" name="simpan" value="Masuk" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>