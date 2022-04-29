-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2022 pada 05.41
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depot_7`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `harga_makanan` float NOT NULL,
  `gambar_makanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga_makanan`, `gambar_makanan`) VALUES
(2, 'Nasi Kambing Goreng', 25000, 'n.kambing.jpg'),
(3, 'Nasi Kebuli', 32000, 'nasikebuli2.jpg'),
(6, 'N.Campur', 20000, 'nasicampur.jpg'),
(7, 'N.Krawu', 20000, 'nasikrawu.jpg'),
(8, 'N.Krengsengan', 25000, 'nasikrengsengan.jpg'),
(10, 'N.Rawon', 20000, 'nasirawon.jpg'),
(11, 'Tahu Campur', 20000, 'tahucampur2.jpg'),
(12, 'Lontong Bumbu', 20000, 'lontongbumbu.jpg'),
(13, 'Gado - Gado', 18000, 'gado.jpg'),
(14, 'Maryam Original', 5000, 'maryamori.jpg'),
(15, 'Maryam Keju', 6000, 'maryamkeju.jpg'),
(16, 'Nasi Uduk', 15000, 'nasiuduk.jpg'),
(17, 'Nasi Bubur Ayam', 18000, 'buburayam.jpg'),
(18, 'Nasi Rames', 18000, 'nasirames.jpg'),
(19, 'Nasi Madura', 20000, 'nasimadura.jpg'),
(20, 'Nasi Gule Kambing', 28000, 'n.gulekambing.jpg'),
(22, 'Rujak Cingur', 20000, 'rujakcingur.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(11) NOT NULL,
  `nama_minuman` varchar(50) NOT NULL,
  `harga_minuman` float NOT NULL,
  `gambar_minum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `harga_minuman`, `gambar_minum`) VALUES
(1, 'Es Campurrr', 12000, 'escampur.jpg'),
(2, 'Es Soda Gembira', 12000, 'sodagembira2.jpg'),
(3, 'Es Joshua', 11000, 'esjosua2.jpg'),
(4, 'Es Blewah', 8000, 'esblewah.jpg'),
(5, 'Es Degan', 8000, 'esdegan.jpg'),
(6, 'Es Jeruk', 7000, 'esjeruk.jpg'),
(7, 'Es Melon', 8000, 'esmelon.jpg'),
(8, 'Jus Jambu', 8000, 'jusjambu.jpg'),
(9, 'Jus Alpukat', 9000, 'jusalpukat.jpg'),
(10, 'Jus Tomat', 8000, 'justomat.jpg'),
(11, 'Jus Melon', 8000, 'jusmelon.jpg'),
(13, 'Jus Nangka', 8000, 'jusnangka.jpg'),
(14, 'Jus Blewah', 8000, 'jusblewah.jpg'),
(15, 'Teh Panas', 5000, 'tehpanas.jpg'),
(16, 'Es Teh', 5000, 'esteh.jpg'),
(17, 'Jeruk Panas', 7000, 'jerukpanas.jpg'),
(18, 'Jeruk Nipis Panas', 7000, 'jeruknipis.jpg'),
(19, 'Kopi Panas', 5000, 'kopipanas.jpg'),
(22, 'Jus Pepaya', 7000, 'juspepaya.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_pendapatan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pengeluaran` float NOT NULL,
  `pemasukan` float NOT NULL,
  `laba` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendapatan`
--

INSERT INTO `pendapatan` (`id_pendapatan`, `tanggal`, `pengeluaran`, `pemasukan`, `laba`) VALUES
(2, '2021-02-15', 20000000, 3000000, 2000000),
(3, '2021-02-16', 1000000, 1000000, 10000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `Pembeli` varchar(50) NOT NULL,
  `waktu_pesan` time NOT NULL,
  `waktu_ambil` time NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `Nama`, `Harga`, `Jumlah`, `total_harga`, `Pembeli`, `waktu_pesan`, `waktu_ambil`, `tgl_transaksi`) VALUES
(2, 'Nasi Kambing Goreng', 25000, 1, 25000, 'Tuarie', '00:00:00', '00:00:00', '0000-00-00'),
(4, 'Es Campurrr', 12000, 1, 12000, 'Tuariiii', '00:00:00', '00:00:00', '0000-00-00'),
(6, 'Maryam Original', 5000, 5, 25000, 'sahla', '00:00:00', '00:00:00', '0000-00-00'),
(13, 'Es Soda Gembira uhuy', 12000, 3, 36000, 'tuarie', '00:00:00', '00:00:00', '0000-00-00'),
(14, 'Nasi Kebuli', 32000, 2, 64000, 'tuarie', '00:00:00', '00:00:00', '0000-00-00'),
(15, 'Tahu Campur', 20000, 2, 40000, 'mira', '00:00:00', '00:00:00', '0000-00-00'),
(16, 'Nasi Goreng Kambing', 30000, 2, 60000, 'mira', '00:00:00', '00:00:00', '0000-00-00'),
(17, 'Es Joshua', 11000, 2, 22000, 'tita', '00:00:00', '00:00:00', '0000-00-00'),
(18, 'Nasi Kambing Goreng', 25000, 2, 50000, 'dito', '00:00:00', '00:00:00', '0000-00-00'),
(19, 'Nasi Kambing Goreng', 25000, 2, 50000, 'dito', '00:00:00', '00:00:00', '0000-00-00'),
(20, 'Es Joshua', 11000, 1, 11000, 'dito', '00:00:00', '00:00:00', '0000-00-00'),
(21, 'Nasi Kambing Goreng', 25000, 1, 25000, 'lisa', '09:03:41', '15:00:00', '2021-07-12'),
(22, 'Nasi Kambing Goreng', 25000, 1, 25000, 'aa', '15:13:22', '15:50:00', '2021-07-12'),
(23, 'Nasi Kambing Goreng', 25000, 2, 50000, 'Tuarie', '15:20:52', '16:20:00', '2021-07-12'),
(24, 'N.Campur', 20000, 1, 20000, 'pipi', '15:28:10', '16:00:00', '2021-07-12'),
(25, 'Nasi Kebuli', 32000, 2, 64000, 'lala', '15:33:27', '15:00:00', '2021-07-12'),
(26, 'N.Krawu', 20000, 2, 40000, 'kiki', '16:53:32', '19:00:00', '2021-07-12'),
(27, 'Nasi Kambing Goreng', 25000, 1, 25000, 'tata', '17:14:46', '18:00:00', '2021-07-12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indeks untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
