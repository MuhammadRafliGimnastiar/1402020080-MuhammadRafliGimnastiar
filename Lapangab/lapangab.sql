-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2022 pada 18.01
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapangab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_footbal`
--

CREATE TABLE `lap_footbal` (
  `id_lap_footbal` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jadwal` date NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lap_footbal`
--

INSERT INTO `lap_footbal` (`id_lap_footbal`, `nama`, `deskripsi`, `alamat`, `jadwal`, `harga`, `gambar`) VALUES
(27, 'Lapangan baru', 'lapangan ini berhasil pertama masuk database', 'jl adfad no adfa234 asdfad ', '2020-12-11', 1208654, 'lapang_dua.png'),
(33, 'Kedua footbal', 'lapangan bola yang ada di adfa g adsgfw dagad asga2e adgasdgasd aisdfgja', 'Jln adfadsfa No. 1234 ,dfaddaf,Jfadsfasdfa', '2020-04-04', 75000, 'lapang_tiga.png'),
(34, 'Footbal Kemayoran', 'adf afadsfasd asdfa4tthsgfh sghw asdqar afga a aerta a er', 'Jln adfadsfa No. 1234 ,dfaddaf,Jfadsfasdfa', '2020-04-04', 100000, 'lapang_satu.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

CREATE TABLE `user_data` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `level` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_data`
--

INSERT INTO `user_data` (`id_user`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'rafli', 'ralfi23423', 'adafs@gmail.com', 'asdfadsf2423', 'user'),
(3, 'Muhammad', 'sdfsd234234', 'adsfad@gmail.com', 'wkwk12', 'user'),
(5, 'rafli', 'rafli123', 'rafli@admin.com', 'qwerty', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lap_footbal`
--
ALTER TABLE `lap_footbal`
  ADD PRIMARY KEY (`id_lap_footbal`);

--
-- Indeks untuk tabel `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lap_footbal`
--
ALTER TABLE `lap_footbal`
  MODIFY `id_lap_footbal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
