<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once("koneksi.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand me-3s" href="#">Sistem Informasi Poliklinik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Data Master</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="index.php?page=obat">Obat</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?page=periksa">Periksa</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="index.php?page=manageJadwal">Input Jadwal Dokter</a>
                        </li>
                    </ul>
                </li>
                <?php 
                    if(isset($_SESSION['username'])){
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=manageDokter">Manage Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=managePoli">Manage Poli</a>
                    </li>
                <?php } ?>
                <?php 
                    if(isset($_SESSION['nip'])){
                        
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=manageJadwal">Jadwal Praktik Dokter</a>
                    </li>
                <?php } ?>
                <?php
                    if(isset($_SESSION['no_rm'])){
                ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=registPoli">Booking Periksa</a>
                    </li>    

                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=registPasienBaru">Pendaftaran Pasien Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=riwayatPeriksa">Riwayat Periksa</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
            <?php
                if (isset($_SESSION['username'])) {
                    // Jika pengguna sudah login, tampilkan tombol "Logout"
                ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout (<?php echo $_SESSION['username'] ?>)</a>
                        </li>
                    </ul>
                <?php
                } else if(isset($_SESSION['no_rm'])) {
                    // Jika pengguna belum login, tampilkan tombol "Login" dan "Register"
                ?>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout (<?php echo $_SESSION['no_rm'] ?>)</a>
                        </li>
                    </ul>
                <?php } else if (isset($_SESSION['nip'])) { ?>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout (<?php echo $_SESSION['nip'] ?>)</a>
                        </li>
                    </ul>
                <?php } else {?>
                    <ul class="navbar-nav me-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="index.php?page=loginPasien">Login Pasien</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?page=loginDokter">Login Dokter</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.php?page=loginUser">Login Admin</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=registerUser">Register</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
    <!-- end Navbar -->

    <!-- Children -->
    <main role="main" class="container">
    <?php
    if (isset($_GET['page'])) {
        include($_GET['page'] . ".php");
    } else {
        echo "<br><h2>Selamat Datang di Sistem Informasi Poliklinik";
    
        if (isset($_SESSION['username'])) {
            //jika sudah login tampilkan username
            echo ", " . $_SESSION['username'] . "</h2>";
        }
    }
    ?>
    <hr>
</main>
    <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <img src="./images/dokterLogin-removebg-preview.png" class="img_thumbnail" alt="">
                </div>
                <div class="col mt-5">
                    <h4 class="mt-3">Sistem Poliklinik</h4>
                    <ul type="dot">
                        <li class="fs-6">Daftar sebagai pasien dan jadwalkan periksa dan temu dengan dokter</li>
                        <li class="fs-6">Jadwal dokter praktik mulai Senin-Sabtu</li>
                        <li class="fs-6">Tersedia banyak Poliklinik</li>
                    </ul>
                    <h4 class="mt-3">Daftar secara online sekarang!</h4>
                        <ul type="dot">
                            <li class="fs-6">Daftar pasien baru</li>
                            <li class="fs-6">Catat Nomor RM anda untuk login</li>
                            <li class="fs-6">Login untuk memilih poli dan dokter anda</li>
                            <li class="fs-6">Tunggu jadwal yang telah ditentukan</li>
                            <li class="fs-6">Pembayaran dapat dilihat melalui riwayat pasien</li>
                        </ul>
                </div>
            </div>
        </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>