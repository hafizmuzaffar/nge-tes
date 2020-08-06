-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Sep 2019 pada 07.30
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nik` int(8) NOT NULL,
  `nm_dosen` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nik`, `nm_dosen`, `alamat`, `tlp`, `status`) VALUES
(102746, 'Saepudin Nirwan, S.Kom., M.Kom', '', '', 'Aktif'),
(10375056, 'Dini Hamidin, S.Si., MBA., M.T.', '', '', 'Aktif'),
(10379068, 'Marwanto Rahmatuloh, S.T., M.T.', 'Bandung', '08888888888', 'Aktif'),
(10382070, 'M. Ruslan Maulani, S.Kom., M.T.', '', '', 'Aktif'),
(10576082, 'Iwan Setiawan, S.T., M.T.', '', '', 'Aktif'),
(11781248, 'I Made Yadi Dharma, S. Kom., M. Kom.', '', '', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jakul`
--

CREATE TABLE `jakul` (
  `idjakul` int(2) NOT NULL,
  `idmatkul` int(5) NOT NULL,
  `idprodi` int(2) NOT NULL,
  `idruangan` int(3) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `id_kelas` varchar(2) NOT NULL,
  `nik` int(8) NOT NULL,
  `jamawal` varchar(255) NOT NULL,
  `jamakhir` varchar(255) NOT NULL,
  `tahunid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jakul`
--

INSERT INTO `jakul` (`idjakul`, `idmatkul`, `idprodi`, `idruangan`, `hari`, `id_kelas`, `nik`, `jamawal`, `jamakhir`, `tahunid`) VALUES
(16, 10, 1, 2, 'Seninn', '3', 10379068, '10.20', '12.00', 5),
(18, 1, 1, 2, 'Selasa', '2', 10382070, '13.00', '14.00', 1),
(21, 5, 1, 1, 'kamis', '3', 10379068, '07.00', '08.00', 5),
(22, 9, 1, 1, 'Rabu', '3', 10379068, '10.20', '12.00', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `tahunid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `tahunid`) VALUES
(1, '1C', 1),
(2, '2C', 2),
(3, '3C', 5),
(4, '1A', 6),
(5, '1B', 1),
(6, '2A', 6),
(7, '2B', 5),
(8, '3A', 6),
(9, '3B', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `idkrs` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `idmatkul` int(11) NOT NULL,
  `idprodi` int(11) NOT NULL,
  `ip` int(11) NOT NULL,
  `ipk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `idmatkul` int(5) NOT NULL,
  `idsemester` int(1) NOT NULL,
  `nm_matkul` varchar(100) NOT NULL,
  `sks` int(2) NOT NULL,
  `idprodi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`idmatkul`, `idsemester`, `nm_matkul`, `sks`, `idprodi`) VALUES
(1, 1, 'Matematika Diskrit', 3, 1),
(2, 1, 'General English 1', 3, 1),
(3, 1, 'Jaringan Komputer', 4, 1),
(4, 2, 'Basis Data', 4, 1),
(5, 1, 'Arsitektur Komputer', 4, 1),
(6, 1, 'Algoritma', 4, 1),
(7, 2, 'General English 2', 2, 1),
(8, 2, 'Komunikasi Data', 2, 1),
(9, 2, 'SCM', 2, 1),
(10, 2, 'Sistem Multimedia', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkuldosen`
--

CREATE TABLE `matkuldosen` (
  `nik` int(8) NOT NULL,
  `idmatkul` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE `mhs` (
  `npm` int(7) NOT NULL,
  `nm_mhs` varchar(100) NOT NULL,
  `idprodi` int(2) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `tahunid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mhs`
--

INSERT INTO `mhs` (`npm`, `nm_mhs`, `idprodi`, `id_kelas`, `tahunid`, `status`) VALUES
(657, 'saya', 1, 6, 6, ''),
(1163080, 'Sonia Prastica', 1, 3, 5, ''),
(1163099, 'coba', 1, 5, 7, ''),
(1563167, 'aku', 1, 3, 5, ''),
(1673763, 'diah', 1, 7, 5, ''),
(78236728, 'diahayu', 1, 3, 5, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `idmatkul` int(5) NOT NULL,
  `tahunid` int(11) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `idprodi` int(5) NOT NULL,
  `idsemester` int(1) NOT NULL,
  `uas` int(3) NOT NULL,
  `uts` int(3) NOT NULL,
  `tugas` int(3) NOT NULL,
  `absen` int(3) NOT NULL,
  `bobot` varchar(1) NOT NULL,
  `total` int(2) NOT NULL,
  `npm` int(7) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `idmatkul`, `tahunid`, `id_kelas`, `idprodi`, `idsemester`, `uas`, `uts`, `tugas`, `absen`, `bobot`, `total`, `npm`, `status`) VALUES
(253, 10, 5, 3, 1, 0, 100, 100, 67, 10, 'A', 88, 1163080, 'selesai'),
(254, 10, 5, 3, 1, 0, 99, 67, 88, 12, 'A', 85, 1563167, ''),
(255, 10, 5, 3, 1, 0, 66, 77, 88, 10, 'B', 75, 78236728, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` int(2) NOT NULL,
  `nm_prodi` varchar(100) NOT NULL,
  `jenjang` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`idprodi`, `nm_prodi`, `jenjang`) VALUES
(1, 'Teknik Informatika', 'D3'),
(2, 'Teknik Informatika', 'D4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `idruangan` int(3) NOT NULL,
  `nm_ruangan` varchar(50) NOT NULL,
  `status` enum('Kosong','Terisi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`idruangan`, `nm_ruangan`, `status`) VALUES
(1, 'Ruang 111', 'Kosong'),
(2, 'Ruangan 112', 'Kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `idsemester` int(1) NOT NULL,
  `nm_semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`idsemester`, `nm_semester`) VALUES
(1, 'Semester Ganjil'),
(2, 'Semester Genap'),
(3, 'Semester Pendek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `tahunid` int(5) NOT NULL,
  `idsemester` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktuawal` date NOT NULL,
  `bataswaktu` date NOT NULL,
  `semester` varchar(50) NOT NULL,
  `tahun` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahunakademik`
--

INSERT INTO `tahunakademik` (`tahunid`, `idsemester`, `status`, `waktuawal`, `bataswaktu`, `semester`, `tahun`) VALUES
(1, 1, 'non aktif', '2018-12-01', '2019-01-01', 'Semester Ganjil', '2018/2019 '),
(2, 2, 'aktif', '2017-12-01', '2017-12-31', 'Semester Genap', '2017/2018'),
(5, 1, 'aktif', '2019-10-01', '2020-03-01', 'Semester Ganjil', '2019/2020'),
(6, 2, 'aktif', '2020-03-02', '2020-07-31', 'Semester Genap', '2019/2020'),
(7, 3, 'aktif', '2020-08-01', '2020-09-30', 'Semester Pendek', '2019/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pdf`
--

CREATE TABLE `tb_pdf` (
  `gambar_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pdf`
--

INSERT INTO `tb_pdf` (`gambar_logo`) VALUES
('1567633790170.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Dosen','Mahasiswa','Super') NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nomor`, `username`, `email`, `password`, `level`, `status`) VALUES
(4, '2451', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', ''),
(5, '10379068', 'marwanto', 'marwanto@gmail.com', 'abc8382244006a62fadba52c5502b4fb', 'Dosen', ''),
(6, '1163080', 'sonia', 'sonia@gmail.com', 'd31cb1e2b7902e8e9b4d1793e94c38a0', 'Mahasiswa', ''),
(33, '10375056', 'dinihamidin', 'dinihamidin@gmail.com', '83476316a972856163fb987b861a0a2c', 'Dosen', ''),
(37, '11781248', 'yadidharma', 'yadidharma@gmail.com', '752a297b08a90693b7a7f7ad96769dd6', 'Dosen', ''),
(38, '10576082', 'iwansetiawan', 'iwansetiawan@gmail.com', '01ccce480c60fcdb67b54f4509ffdb56', 'Dosen', ''),
(39, '10382070', 'ruslanmaulani', 'mruslanmaulani@gmail.com', '01e20b61d05bb6b42840997233579e08', 'Dosen', ''),
(40, '10273041', 'saepudinnirwan', 'saepudinnirwan@gmail.com', '28e47f714c1fcb538a669b971ee6ce46', 'Dosen', ''),
(41, '657', 'say', 'saya@gmail.com', 'e6481c46e064c35e8f6e371d72912507', 'Admin', ''),
(42, '384578343', 'superadmin', 'id@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Super', ''),
(43, '1163099', 'coba', 'coba@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mahasiswa', ''),
(44, '1673763', 'diah', 'diah@gmail.com', 'b1980b34d5180cf2051d0fe400cb86e0', 'Mahasiswa', ''),
(45, '1563167', 'aku', 'akujrwei@gmail.com', '89ccfac87d8d06db06bf3211cb2d69ed', 'Mahasiswa', ''),
(46, '78236728', 'diahayu', 'diahayu@gmail.com', 'd97d13dc3be214c73c23e86606daa917', 'Mahasiswa', ''),
(47, '8877665', 'etek', 'etek@gmail.com', 'ff8e38b6492520fc2d768c4ce9161548', 'Admin', ''),
(49, '421451', 'super', 'supermi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Super', 'ada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `jakul`
--
ALTER TABLE `jakul`
  ADD PRIMARY KEY (`idjakul`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`idkrs`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`idmatkul`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`idruangan`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`idsemester`);

--
-- Indexes for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`tahunid`),
  ADD KEY `na` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username, unique_nomor` (`username`,`nomor`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jakul`
--
ALTER TABLE `jakul`
  MODIFY `idjakul` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `idmatkul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `idprodi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `idruangan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `tahunid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
