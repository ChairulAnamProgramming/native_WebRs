-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2019 pada 02.15
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `native_rumah_sakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
(4, 'Dr. Chairul Anam', 'Penyakit Dalam', 'Desa Tambak Bitin Kec.Daha Utara Kota Kangan', '082217380171'),
(5, 'Dr. Ahmad Yani', 'Penyakit Jantung', 'Kota Banjarmasin', '083374628374'),
(6, 'Dr. Sufian Anshor', 'Mata', 'Kota Banjarmasin', '082218374623');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
(19, 'Acarbose', 'Acarbose adalah obat antidiabetes yang digunakan untuk menangani diabetes tipe 2'),
(20, 'Acyclovir Oral', 'Acyclovir oral adalah obat yang dapat digunakan untuk mengobati infeksi akibat virus, seperti Varicella zoster dan Herpes simplex.\r\n'),
(21, 'Acetazolamide ', 'Acetazolamide adalah obat golongan diuretik yang dapat digunakan untuk mencegah dan mengurangi gejala penyakit ketinggian (altitude sickness).'),
(22, 'Agonis Beta', 'Agonis beta atau agonis adrenergik beta adalah golongan obat yang digunakan untuk melegakan pernapasan (bronkodilator). '),
(23, 'Gabapentin', 'Gabapentin merupakan obat antikonvulsan yang berfungsi untuk mengatasi kejang. '),
(24, 'Panadol', 'Panadol adalah produk obat pereda nyeri (analgetik) dan penurun demam (antipiretik) yang mengandung paracetamol sebagai bahan aktif utama. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat_rekammedis`
--

CREATE TABLE `tbl_obat_rekammedis` (
  `id` int(11) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_obat_rekammedis`
--

INSERT INTO `tbl_obat_rekammedis` (`id`, `id_rm`, `id_obat`) VALUES
(38, '02-14-25am', 19),
(39, '02-14-25am', 21),
(40, '02-14-25am', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nomor_identitas` varchar(50) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jk` enum('P','L') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jk`, `alamat`, `no_telp`) VALUES
(10, 'Pasien-001', 'Chairul Anam   ', 'L', 'Desa Tambak Bitin Kec.Daha Utara Kota Kandangan', '082217380171'),
(11, 'Pasien-002', 'Sri Magfirah', 'L', 'Kota Kandangan Desa Binjai', '084736172836'),
(12, 'Pasien-003', 'Admn', 'L', 'Desa Tambak Bitin', '082217380171');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poliklinik`
--

CREATE TABLE `tbl_poliklinik` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_poliklinik`
--

INSERT INTO `tbl_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
(37, 'Poli A', 'Lantai 1'),
(38, 'Poli B', 'Lantai 1'),
(39, 'Poli C', 'Lantai 1'),
(40, 'Poli B', 'Lantai 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekammedis`
--

CREATE TABLE `tbl_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` int(11) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rekammedis`
--

INSERT INTO `tbl_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('02-14-25am', 10, 'Mata Sakit,Berair', 6, 'Gitulah....', 37, '2019-06-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `img` varchar(128) NOT NULL,
  `role` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `alamat`, `img`, `role`) VALUES
(2, 'Chairul Anam', 'anam', '$2y$10$KfqZkRYcBFHvOmVer33dMeEyaM5sBuD3KWVZQZMUUEyDfFMaUdJsG', 'Desa Tambak Bitin Kec.Daha Utara', '5d06cf664a552.png', '1'),
(4, 'TimCodeAnamArt', 'TimCode', '$2y$10$Jpxa12u3bQ4y6Q9pjNDmJO39NfuMZveat5hiQu2z0jnMRTPsyBEFO', 'Desa Tambak Bitin Kec.Daha Utara Kab.Hulu Sungai Selatan Kalimantan Selatan : Indonesia\r\n', '5d06d80e0fbf8.jpg', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tbl_obat_rekammedis`
--
ALTER TABLE `tbl_obat_rekammedis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_rm` (`id_rm`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `tbl_rekammedis`
--
ALTER TABLE `tbl_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_obat_rekammedis`
--
ALTER TABLE `tbl_obat_rekammedis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_poliklinik`
--
ALTER TABLE `tbl_poliklinik`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_obat_rekammedis`
--
ALTER TABLE `tbl_obat_rekammedis`
  ADD CONSTRAINT `tbl_obat_rekammedis_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tbl_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_obat_rekammedis_ibfk_3` FOREIGN KEY (`id_rm`) REFERENCES `tbl_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_rekammedis`
--
ALTER TABLE `tbl_rekammedis`
  ADD CONSTRAINT `tbl_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tbl_pasien` (`id_pasien`),
  ADD CONSTRAINT `tbl_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tbl_dokter` (`id_dokter`),
  ADD CONSTRAINT `tbl_rekammedis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tbl_poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
