-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2024 pada 16.35
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
  `ID` int(11) NOT NULL,
  `NAMA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID`, `NAMA`) VALUES
(35, 'Baju Pria'),
(36, 'Baju Wanita'),
(37, 'Sepatu');

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
  `ketersediaan_stok` enum('HABIS','TERSEDIA') DEFAULT 'TERSEDIA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(13, 36, 'birthday tshirt chika', 200000, 'LuAwOA0R8ZSWVYAOwYyT.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(14, 36, 'birthday tshirt cigree', 200000, 'IkMxiiQYWYslKP5EJVRx.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(15, 36, 'birthday t-shirt lulu', 200000, 'JRYKoiPpztVYx8jqAYoN.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(16, 36, 'birthday t-shirt shani', 200000, 'dw9Mqz6AocsOE327jbZk.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(17, 36, 'birthday tshirt indira', 200000, 'mEW6z8ZBeuX3skD0kbAY.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(18, 35, 'kaos adidas', 50000, 'dC8b3stqOLHR9mvlEvGi.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(19, 35, 'kaos bloods', 100000, 'bU74ro1h8SWFDpOxBxXb.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(20, 35, 'kaos dobujack', 75000, 'u3FgHVWdEz2YmDEG7Lst.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(21, 35, 'kaos erigo', 60000, 'EvOGrzNi8OEqhODPnAZL.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(22, 35, 'kaos nike', 150000, 't9J8lsamlScnrQfkDvQ1.jpg', 'berbahan cotton 100%', 'TERSEDIA'),
(23, 37, 'sepatu converse', 300000, 'WTCfWxSnWxAxmkcQBJF2.jpg', ' ', 'TERSEDIA'),
(24, 37, 'sepatu jordan', 500000, 'vjvkAvpUptEwSIehv9JQ.jpg', '', 'TERSEDIA'),
(25, 37, 'sepatu nike', 400000, '5zfQ7VNcUi0861PwpK1z.jpg', '', 'TERSEDIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `register`
--

CREATE TABLE `register` (
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `register`
--

INSERT INTO `register` (`nama`, `email`, `password`, `id`) VALUES
('Salman', 'salmanannafi3@gmail.com', 'asdkansk', 2),
('Salman', 'salmanilyaa4@gmail.com', '123456', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID`, `username`, `password`) VALUES
(1, 'ADMIN', 'rahasia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NAMA` (`nama`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `KATEGORI_PRODUK` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`ID`),
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
