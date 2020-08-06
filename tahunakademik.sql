-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2019 pada 08.49
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inputnilai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `tahunid` int(5) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktuawal` date NOT NULL,
  `bataswaktu` date NOT NULL,
  `tahunakademik` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `tahun` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahunakademik`
--

INSERT INTO `tahunakademik` (`tahunid`, `status`, `waktuawal`, `bataswaktu`, `tahunakademik`, `semester`, `tahun`) VALUES
(1, 'aktif', '2018-12-01', '2019-01-01', 20181, 'Semester Ganjil', '2018/2019 '),
(2, 'tidak', '2017-12-01', '2017-12-31', 20172, 'Semester Genap', '2017/2018 '),
(8, 'tidak', '2019-05-17', '2019-06-17', 20182, 'Semester Genap', '2018/2019      '),
(9, 'tidak', '2017-01-01', '2017-02-01', 20171, 'Semester Ganjil', '2017/2018');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`tahunid`),
  ADD KEY `na` (`status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `tahunid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
