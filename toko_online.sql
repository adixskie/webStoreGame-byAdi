-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2024 pada 10.40
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(8, 'Nintendo Switch Online'),
(12, 'PC Game'),
(13, 'Mobile Game'),
(15, 'Xbox Game Pass');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(2, 13, 'MLBB', 50000, 'LuWSznuNHXDNFieJQBrZ.png', '                Game 5vs5\r\ndengan efek dan animasi menawan\r\nhadir di sini                ', 'tersedia'),
(3, 12, 'Valorant', 150000, 'ysIRPVeeD0ogwpP7TUvp.jpg', 'Game FPS terlaris abad ini', 'tersedia'),
(4, 12, 'GTA VI', 600000, 'hHoon0opTugBHjQtPDjA.jpg', 'Game terbaru dari rockstar, memberikan kesan kebebasan hidup', 'tersedia'),
(5, 8, 'Super Semash Mario Bros', 250000, 'aJCRGA1Frr2Go6vFsPVq.jpg', 'Game jadul dengan update terbaru grafis memukau', 'tersedia'),
(6, 8, 'Zelda', 900000, 'lQKOtO6fTpTUwxn8kYOJ.jpg', 'Game untuk para sepuh RPG awikwok', 'tersedia'),
(7, 13, 'Subway Surf', 1000000, '5HfONg8weSZnsrjEPuq3.jpg', 'Game terbaik sepanjang masa!!!', 'tersedia'),
(8, 15, 'CHRONOS', 580000, 'JQf2JiftqNzxOURjOZYB.jpg', 'Hadir sebelum crono di epep', 'tersedia'),
(9, 15, 'Hogwart', 700000, 'CqcKezE8v8azv3U1aJnH.jpg', 'Adaptasi dari series Hary Potter', 'tersedia'),
(10, 12, 'Forza Horizon 4', 647000, 'IVCruZCDK08I8z0F9SVX.jpg', 'Game balap arcade tergilaa', 'tersedia'),
(11, 12, 'NFS Heat', 870000, '5klYlrB9aFqcvSdxzMlk.jpg', 'Terusan dari sebuah album game balap NFS', 'tersedia'),
(13, 12, 'Fishing Planet', 999999, 'SETBb2eTQFLDusIcxn6w.jpg', 'Game mancing yang pernah di tekuni M Thontowi', 'tersedia'),
(14, 13, 'PUBGM', 190000, 'zCAgolygKK4Xhw7TvbjW.jpg', 'Lebih baik daripada epep', 'tersedia'),
(15, 13, 'AOV', 90000, 'HmQ5bDwIK0NtQc7HfkIM.png', 'Moba dengan grafis memukau', 'tersedia'),
(16, 8, 'Pokemon Scarlet', 430000, '6Cvuhz1NacE7uA1L8jaM.jpg', 'Mencari pokemon? kau bisaa!!!', 'tersedia'),
(17, 8, 'Metro Redux', 200000, 'VxPTQOdIXp75AowPnvby.jpg', 'Game perang hadir di nine tendo switch', 'tersedia'),
(18, 15, 'Rise Of Kong', 590000, 'iqgxpqOETDoi5JMRgli0.jpg', 'Adaptasi dari film KingKong', 'tersedia'),
(19, 15, 'Gears Of Wars', 860000, '7r0o4fhHOzBULUicLXv8.jpg', 'peperangan kembali hadir di Xbox', 'tersedia'),
(20, 15, 'Assasin Creed Valhala', 600000, 'RDrk4aKR20aMsk7HEYi7.jpg', 'Kembali ke zaman dahulu mulai petualangan mu', 'tersedia'),
(21, 8, 'JurasicPark', 90000, 'QtNO5UKOzlrIDdfTqfef.png', 'Pelihara dino mu ', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$44GyFXL49aI8O2PNGDZN7.GWuyzV.1cPplFh4PurO0PqbRw2Xv9Ge');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
