-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2024 pada 15.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poli`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id_poli` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `no_antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_poli`
--

INSERT INTO `daftar_poli` (`id_poli`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`) VALUES
(3, 26, 3, 'diare', 1),
(4, 25, 5, 'susah tidur', 2),
(8, 28, 4, 'Demam dan batuk berdahak', 3),
(14, 30, 11, 'Sering pandangan berkunang-kunang', 4),
(15, 27, 12, 'Tenggorokan sakit, sering pusing sebelah, dan demam', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(11) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `id_poli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `nip`, `passwords`, `nama`, `alamat`, `no_hp`, `id_poli`) VALUES
(1, '1234', '1234', 'Andra Fatmawati', 'Tembalang, Semarang', '082394876278', 1),
(2, '12345', '12345', 'Yustina', 'Ungaran', '085284692666', 4),
(3, '12333', '12333', 'Amalia', 'jatingalehhh', '082565681323', 3),
(4, '1490672435', 'nuralami1234', 'Nuralami', 'Demakan', '089677529544', 2),
(5, '1490785638', 'ardianto1234', 'Ardianto', 'Mangkang', '089766365971', 6),
(6, '1490784625', 'marta1234', 'Marta', 'Kendal', '082579426963', 5),
(7, '1423', '1423', 'Agil', 'semarang', '1234566', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 1, 'Senin', '10:00:00', '14:00:00'),
(2, 2, 'Selasa', '13:00:13', '17:00:17'),
(3, 3, 'Rabu', '08:00:08', '16:00:16'),
(4, 4, 'Kamis', '16:00:16', '18:00:18'),
(5, 5, 'Jumat', '09:00:09', '11:00:11'),
(6, 6, 'Sabtu', '08:00:08', '14:00:14'),
(7, 1, 'Rabu', '10:00:00', '17:00:00'),
(9, 7, 'Jumat', '09:00:00', '16:00:00'),
(10, 1, 'Sabtu', '11:00:00', '14:00:00'),
(11, 5, 'Selasa', '10:00:00', '17:00:00'),
(12, 4, 'Kamis', '10:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `kemasan` varchar(50) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(1, 'Paracetamol', 'Kemas Primer', 8000),
(2, 'Alpara', 'Kemas Primer', 10000),
(3, 'Bodrex', 'Saset', 13000),
(4, 'Artesunate tablet 50 mg + Amodiaquine anhydrida tablet 200 mg', 'Tablet', 44000),
(5, 'Albendasol suspensi 200 mg/5 ml', 'Kotak/Botol', 6000),
(6, 'Alopurinol', 'Tablet', 16000),
(7, 'Alprazolam', 'Tablet', 64000),
(8, 'Ambroxol Sirup', 'Botol', 5000),
(9, 'Amilorida', 'Tablet', 12000),
(10, 'Aminofilin', 'Tablet', 57000),
(11, 'Aminofilin Injeksi', 'Kotak', 118000),
(12, 'Amitriptilin Salut', 'Tablet', 16000),
(13, 'Amoksisilin', 'Kotak', 38000),
(14, 'Amoksisilin + As.Klavulanat', 'Kotak', 209000),
(15, 'Ampisilin', 'Kotak', 36000),
(16, 'Antasida DOEN II Suspensi', 'Botol', 4800),
(17, 'Anti Bakteri DOEN Salep', 'Kotak', 83000),
(18, 'Animigren', 'Botol', 64000),
(19, 'Arthemeter Injeksi', 'Kotak', 175000),
(20, 'Asam Askrobat (Vitamin C)', 'Botol', 42000),
(21, 'Asam Folat', 'Botol', 6500),
(22, 'Asam Mefenamat', 'Kapsul', 17000),
(23, 'Asiklovir Krim', 'Tube', 99000),
(24, 'Atropin Sulfat', 'Botol', 89000),
(25, 'Benzatin Benzil Penisilin', 'Kotak', 108000),
(26, 'Betahistin Mesilat', 'Kotak', 34000),
(27, 'Prometazin', 'Tablet', 82000),
(28, 'Ramipril', 'Tablet', 11000),
(29, 'Reserpin', 'Tablet', 85000),
(30, 'Rifampisin', 'Kotak', 359000),
(31, 'Retinol (Vitamin A)', 'Botol', 29000),
(32, 'Ringer Laktat Larutan Infus', 'Kotak', 210000),
(33, 'Salisil Bedak', 'Kotak', 12000),
(34, 'Teofilin', 'Tablet', 249000),
(35, 'Tetrasiklin', 'Kapsul', 66000),
(36, 'Tiamin (Vitamin B)', 'Kotak', 107000),
(37, 'Tramadol Kapsul', 'Kotak', 50000),
(38, 'Vitamin B Kompleks', 'Tablet', 36000),
(39, 'Natrium Fluoresein Tetes Mata', 'Botol', 19000),
(40, 'Nevirapin', 'Kotak', 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_rm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(25, 'Gilang Nova', 'Ambarawa', '3322012843', '0823478134', '20240105001'),
(26, 'Andre', 'Salatiga', '3322004943', '0823987243', '20240105002'),
(27, 'yoga', 'semarang', '1234', '1234', '20240107003'),
(28, 'Andi', 'Semarang', '12344', '512345213', '20240107004'),
(29, 'Agus', 'Ngaliyan', '12344566', '1652436', '20240108002'),
(30, 'Kresna', 'Demak', '12344566', '081248723535', '20240126002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `id_daftar_poli` int(11) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL,
  `biaya` int(11) NOT NULL,
  `obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya`, `obat`) VALUES
(1, 3, '2024-01-04 07:55:11', 'Banyak minum air putih dan istirahat', 50000, 'Alpara'),
(14, 4, '2024-01-24 19:47:00', 'ea5njerat', 150000, '2'),
(15, 3, '2024-01-26 15:20:00', 'jaga pola makan', 150000, '2'),
(16, 8, '2024-01-26 21:41:00', 'Minum obatnya 3x sehari, banyak minum air putih dan istirahat yang cukup dan hindari angin malam', 150000, '14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(1, 'Cek Kesehatan', 'Cek Kesehatan pasien, untuk keperluan pendaftaran ke suatu organisasi atau yang lainnya'),
(2, 'Penyakit Dalam', 'Konsultasi mengenai penyakit dalam'),
(3, 'Klinik Vaksin', 'Melayani segala hal tentang vaksinasi'),
(4, 'Konsultasi Gizi', 'Melayani analisis gizi'),
(5, 'Kebidanan dan Kandungan', 'Melayani ibu-ibu hamil'),
(6, 'Poliklinik Mata', 'Melayani pemeriksaan mengenai kesehatan mata'),
(7, 'Poli Baru Nih', 'Baru buka ayo periksa disini'),
(8, 'Poliklinik Keluarga', 'Poliklinik untuk keluarga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pasien`
--

CREATE TABLE `riwayat_pasien` (
  `id` int(11) NOT NULL,
  `id_daftar_poli` int(11) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `total_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `riwayat_pasien`
--

INSERT INTO `riwayat_pasien` (`id`, `id_daftar_poli`, `tgl_periksa`, `total_biaya`) VALUES
(1, 3, '2024-01-07 23:12:42', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, '', 'user', '$2y$10$2GV1xulCn3BT/WdJPcGDhec2IskIN33vZ7UUofTjFz5K7WGicSFdO'),
(2, '', 'gilang', '$2y$10$HoQVwy/B0IoRQ1Hvjz.p8O4IEJQrEYXiWQocy7r4knhMoyLW1FzaK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id_poli`),
  ADD KEY `fk_daftar_poli_jadwal` (`id_jadwal`),
  ADD KEY `fk_daftar_poli_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_periksa` (`id_periksa`),
  ADD KEY `fk_detail_obat` (`id_obat`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokter_poli` (`id_poli`);

--
-- Indeks untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periksa_daftar_poli` (`id_daftar_poli`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_pasien`
--
ALTER TABLE `riwayat_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_riwayat_datar_poli` (`id_daftar_poli`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pasien`
--
ALTER TABLE `riwayat_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `fk_daftar_poli_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`),
  ADD CONSTRAINT `fk_daftar_poli_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `fk_detail_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_detail_periksa` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`);

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_dokter_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `fk_jadwal_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);

--
-- Ketidakleluasaan untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_periksa_daftar_poli` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `riwayat_pasien`
--
ALTER TABLE `riwayat_pasien`
  ADD CONSTRAINT `fk_riwayat_datar_poli` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id_poli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
