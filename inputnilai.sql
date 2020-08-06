-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Jan 2019 pada 09.01
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` bigint(15) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodiid` varchar(50) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `username`, `password`, `nama`, `prodiid`, `level`) VALUES
(110002, 'A-0001', '4297f44b13955235245b2497399d7a93', 'Suep', '11', 'koor'),
(11223344556, '11223344556', '0192023a7bbd73250516f069df18b500', 'Mahmud ABC', '12', 'pengampu'),
(12345678910, '12345678910', '0192023a7bbd73250516f069df18b500', 'Dadi AB', '11', 'pengampu'),
(12345678911, '12345678911', '0192023a7bbd73250516f069df18b500', 'Mansur B', '11', 'pengampu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `hariid` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`hariid`, `hari`) VALUES
(5, 'Jum''at'),
(4, 'Kamis'),
(7, 'Minggu'),
(3, 'Rabu'),
(6, 'Sabtu'),
(2, 'Selasa'),
(1, 'Senin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalkuliah`
--

CREATE TABLE `jadwalkuliah` (
  `jadwalid` varchar(25) NOT NULL,
  `tahunid` varchar(5) NOT NULL,
  `prodiid` varchar(25) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `mkid` varchar(25) NOT NULL,
  `hariid` varchar(10) NOT NULL,
  `jammulai` time NOT NULL,
  `jamselesai` time NOT NULL,
  `ruangid` varchar(10) NOT NULL,
  `pengampuid` bigint(15) NOT NULL,
  `koorid` bigint(15) NOT NULL,
  `sks` int(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwalkuliah`
--

INSERT INTO `jadwalkuliah` (`jadwalid`, `tahunid`, `prodiid`, `kelas`, `mkid`, `hariid`, `jammulai`, `jamselesai`, `ruangid`, `pengampuid`, `koorid`, `sks`, `status`) VALUES
('J01', '2', '11', '3B', 'MK02', '3', '10:20:00', '11:20:00', 'R02', 11223344556, 110002, 4, 0),
('J02', '1', '11', '2B', 'MK03', '3', '13:58:00', '13:57:00', 'R01', 12345678910, 110002, 4, 0),
('J03', '1', '11', '2B', 'MK02 ', '5', '08:20:00', '10:20:00', 'R02', 110002, 11223344556, 4, 0),
('J04', '1', '11', '3A', 'MK01', '5', '09:00:00', '10:20:00', 'R03', 12345678910, 11223344556, 4, 0),
('J06', '1', '11', '2C', 'MK06', '1', '13:58:00', '13:57:00', 'R04', 12345678910, 110002, 2, 1),
('J07', '1', '11', '3B', 'MK02  ', '4', '07:30:00', '10:30:00', 'R02', 12345678910, 11223344556, 4, 1),
('J08', '8', '11', '2B', 'MK01 ', '6', '10:00:00', '11:30:00', 'R03', 12345678910, 11223344556, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, '3A'),
(2, '3B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `mkid` int(11) NOT NULL,
  `tugas` varchar(10) NOT NULL,
  `praktikum` varchar(10) NOT NULL,
  `uts` varchar(10) NOT NULL,
  `uas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `krsid` int(25) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `jadwalid` varchar(25) NOT NULL,
  `tahunid` varchar(5) NOT NULL,
  `mkid` varchar(25) NOT NULL,
  `sks` int(5) NOT NULL,
  `tugas` int(10) NOT NULL,
  `praktikum` int(10) NOT NULL,
  `uts` int(10) NOT NULL,
  `uas` int(10) NOT NULL,
  `nakhir` double NOT NULL,
  `gnilai` varchar(5) NOT NULL,
  `status` varchar(15) NOT NULL,
  `post_by` bigint(15) NOT NULL,
  `update_by` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`krsid`, `npm`, `jadwalid`, `tahunid`, `mkid`, `sks`, `tugas`, `praktikum`, `uts`, `uas`, `nakhir`, `gnilai`, `status`, `post_by`, `update_by`) VALUES
(1, '1163001', 'J01', '1', 'MK02', 2, 80, 80, 80, 80, 0, '', '0', 0, 0),
(2, '1163010', 'J03', '1', 'MK02', 4, 100, 10, 10, 10, 32.5, 'D', '1', 0, 0),
(3, '1163010', 'J02', '1', 'MK03', 3, 10, 20, 10, 20, 15, 'E', '1', 0, 0),
(4, '1153001', 'J06', '1', 'MK06', 3, 90, 90, 90, 90, 73.8, 'B', '1', 0, 0),
(5, '1163100', 'J06', '1', 'MK06', 3, 90, 90, 80, 80, 85, 'A', '1', 0, 0),
(6, '1163102', 'J06', '1', 'MK06', 3, 90, 90, 90, 90, 73.8, 'B', '1', 0, 0),
(10, '1163001', 'J07', '1', 'MK02', 4, 80, 90, 90, 80, 69.6, 'B', '1', 0, 0),
(11, '1163005', 'J07', '1', 'MK02', 4, 90, 80, 80, 90, 86, 'A', '1', 0, 0),
(12, '1163011', 'J07', '1', 'MK02', 4, 90, 80, 80, 90, 86, 'A', '1', 0, 0),
(13, '1163010', 'J04', '1', 'MK02', 4, 65, 65, 80, 80, 72.5, 'B', '', 0, 0),
(14, '1163010', 'J04', '1', 'MK02', 4, 65, 65, 80, 80, 72.5, 'B', '', 0, 0),
(15, '1163069', 'J07', '1', 'MK02', 4, 75, 80, 80, 90, 58.4, 'C', '1', 0, 0),
(16, '1153002', 'J04', '1', 'MK01', 2, 100, 100, 100, 100, 82, 'A', '1', 0, 0),
(17, '1163002', 'J04', '1', 'MK01', 2, 90, 100, 100, 90, 77.8, 'B', '1', 0, 0),
(18, '1163160', 'J07', '1', 'MK02', 4, 80, 70, 90, 100, 68, 'B', '1', 0, 0),
(19, '1530999', 'J03', '1', 'MK02', 4, 90, 90, 90, 90, 73.8, 'B', '', 0, 0),
(20, '1167890', 'J03', '1', 'MK02', 4, 100, 100, 100, 100, 100, 'A', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `laporan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodiid` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tahunmasuk` varchar(5) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `username`, `password`, `nama`, `prodiid`, `kelas`, `tahunmasuk`, `level`) VALUES
(1153001, '1153001', '0192023a7bbd73250516f069df18b500', 'ASD', '11', '2C', '20171', 'mahasiswa'),
(1153002, '1153002', 'd325ffe191a600f562fb59ae52ccbc75', 'CDE', '11', '3A', '20171', 'mahasiswa'),
(1163001, '1163001', '4297f44b13955235245b2497399d7a93', 'Udin', '11', '3B', '20181', 'mahasiswa'),
(1163002, '1163002', '0192023a7bbd73250516f069df18b500', 'Juned', '11', '3A', '20171', 'mahasiswa'),
(1163004, '1163004', '0192023a7bbd73250516f069df18b500', 'Tatu', '11', '1B', '20171', 'mahasiswa'),
(1163005, '1163005', '44af009786c6a218c3e4f14353ab997d', 'Ha', '11', '3B', '20181', 'mahasiswa'),
(1163010, '1163010', '0192023a7bbd73250516f069df18b500', 'Fun', '11', '2B', '20171', 'mahasiswa'),
(1163011, '1163011', '0192023a7bbd73250516f069df18b500', 'NURIS DOANG', '11', '3B', '20171', 'mahasiswa'),
(1163012, '1163012', '61056d50d6aea6ed5b32fadfddde8c4c', 'Gen', '11', '1C', '20181', 'mahasiswa'),
(1163022, '1163022', '4297f44b13955235245b2497399d7a93', 'Ra', '11', '3C', '20181', 'mahasiswa'),
(1163059, '1163059', '0192023a7bbd73250516f069df18b500', 'Husen', '11', '3A', '20181', 'mahasiswa'),
(1163069, '1163069', '0192023a7bbd73250516f069df18b500', 'Samsuri', '11', '3B', '20161', 'mahasiswa'),
(1163088, '1163088', '0192023a7bbd73250516f069df18b500', 'Sanusi', '11', '3A', '20181', 'mahasiswa'),
(1163099, '20181', 'fcea920f7412b5da7be0cf42b8c93759', 'AB', '11', '3A', '20181', 'admin123'),
(1163100, '20181', 'e36a2f90240e9e84483504fd4a704452', 'AB AB', '11', '2C', '20181', 'admin124'),
(1163101, '20181', 'ad4f7a281da95c03ab3e9fe5f12e6aa4', 'QWERTY', '11', '3A', '20181', 'admin123'),
(1163102, '20181', '0e734fe422d3cee12786f8680965e4d8', 'QWERTY OA', '11', '2C', '20181', 'admin124'),
(1163160, '20181', 'ff7cd911252d251d6ab8135d0c5aa913', 'QAZ', '11', '3B', '20181', 'admin123'),
(1163162, '20181', 'e99206e3e80790adeb6a6f002df7ba29', 'WSX', '11', '3A', '20181', 'admin124'),
(1163199, '1163199', '0192023a7bbd73250516f069df18b500', 'Aldi', '11', '1A', '20181', 'mahasiswa'),
(1234567, '1234567', '0192023a7bbd73250516f069df18b500', 'ED', '11', '3A', '20181', 'mahasiswa'),
(2133122, '1234569', 'd325ffe191a600f562fb59ae52ccbc75', 'RD 13', '11', '3C', '20181', 'mahasiswa'),
(3123213, '1234567', '0192023a7bbd73250516f069df18b500', 'RD 1', '11', '3A', '20181', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `mkid` varchar(25) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` int(10) NOT NULL,
  `prodiid` varchar(50) NOT NULL,
  `nidn` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`mkid`, `nama_matkul`, `sks`, `prodiid`, `nidn`) VALUES
('MK01', 'Bahasa Inggris', 2, '11', 12345678910),
('MK02', 'Jaringan Komputer', 4, '11', 12345678911),
('MK03', 'Matematik', 3, '11', 110002),
('MK06', 'SAP', 3, '11', 11223344556);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `prodiid` varchar(25) NOT NULL,
  `namaprodi` varchar(50) NOT NULL,
  `jenjangid` int(10) NOT NULL,
  `namajenjang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`prodiid`, `namaprodi`, `jenjangid`, `namajenjang`) VALUES
('11', 'Teknik Informatika', 3, 'D3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `ruangid` varchar(11) NOT NULL,
  `ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`ruangid`, `ruangan`) VALUES
('R01', 101),
('R02', 102),
('R03', 210),
('R04', 211);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `ket` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status`, `ket`) VALUES
(1, 'SI', 'Sudah Input');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin-001', '4297f44b13955235245b2497399d7a93', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`hariid`),
  ADD KEY `hari` (`hari`);

--
-- Indexes for table `jadwalkuliah`
--
ALTER TABLE `jadwalkuliah`
  ADD PRIMARY KEY (`jadwalid`),
  ADD KEY `tahunid` (`tahunid`),
  ADD KEY `prodiid` (`prodiid`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `mkid` (`mkid`),
  ADD KEY `nidn` (`pengampuid`),
  ADD KEY `sks` (`sks`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`krsid`),
  ADD KEY `npm` (`npm`),
  ADD KEY `jadwalid` (`jadwalid`),
  ADD KEY `tahunid` (`tahunid`),
  ADD KEY `mkid` (`mkid`),
  ADD KEY `sks` (`sks`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `prodi` (`prodiid`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `tahunid` (`tahunmasuk`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`mkid`),
  ADD KEY `sks` (`sks`),
  ADD KEY `namaprodi` (`prodiid`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prodiid`),
  ADD KEY `namaprodi` (`namaprodi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`ruangid`),
  ADD KEY `ruangid` (`ruangid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`tahunid`),
  ADD KEY `na` (`status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `nidn` bigint(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `krsid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `npm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3123214;
--
-- AUTO_INCREMENT for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `tahunid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
