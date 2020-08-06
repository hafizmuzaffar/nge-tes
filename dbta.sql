-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2019 pada 07.29
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
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'm0vyKu2zW7L8PTG20bquF.707e055aeea8a30aca', 1541329145, 'WcHCQ5vcXwT1z99BvJUWnu', 1268889823, 1564972138, 1, 'Admin', 'istrator', '0'),
(12, '::1', 'wisatawan@gmail.com', '$2y$08$KjwW2oOMOru0xzPEZboaWuhpKFZcOaaYxioWy0C09sJ6z55aGvcye', NULL, 'wisatawan@gmail.com', NULL, NULL, NULL, NULL, 1564116032, 1564576408, 1, 'Wisatawan', 'contoh', '089666655548'),
(13, '::1', 'pramuwisata@gmail.com', '$2y$08$Kw7FkcDFBJa.rC5GT.DoA.BQk7Cu94hvdmcUP./AtLsWNE3oUmvK2', NULL, 'pramuwisata@gmail.com', NULL, NULL, NULL, NULL, 1564116109, 1564972063, 1, 'Agus', 'Pramono', '089666655548'),
(14, '::1', 'wanda@gmail.com', '$2y$08$ZDLtLhx.xKu0ZB8SJO.WTOYXrsFPl19y8Pp0uXlCSO77I.k7MVlMW', NULL, 'wanda@gmail.com', NULL, NULL, NULL, NULL, 1564331722, 1564332933, 1, 'wanda', 'feni', '0819864689032'),
(15, '::1', 'safitri', '$2y$08$RUWNETLy1wMIMcbuYm4g8.0VMRL47BbwFenxjRYnvc8hX5gkGkR5q', NULL, 'feni@gmail.com', NULL, NULL, NULL, NULL, 0, 1564336140, 1, 'safitri', 'feni', '085678953279'),
(16, '::1', 'feni', '$2y$08$XJb/Oyfaf/a4XToC5mfNN.MTf6qWE7HtngQbpdqYzz.gRP/BYhqmm', NULL, 'wanda@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, 1, 'feni', 'feni', '089765478927');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
