-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 12:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `endels`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id_beli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `tgl_dateline` datetime NOT NULL,
  `banyak` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('lunas','belum','gagal') NOT NULL,
  `id_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `katagori`
--

CREATE TABLE `katagori` (
  `id_katagori` int(11) NOT NULL,
  `nama_katagori` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katagori`
--

INSERT INTO `katagori` (`id_katagori`, `nama_katagori`, `foto`) VALUES
(1, 'berminyak', ''),
(2, 'basah', ''),
(3, 'kering', ''),
(4, 'normal', '');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `banyak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `klinik`
--

CREATE TABLE `klinik` (
  `id_klinik` int(11) NOT NULL,
  `nama_klinik` varchar(100) NOT NULL,
  `tanggal_gabung` date NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_pengirim` int(11) NOT NULL,
  `id_penerima` int(11) NOT NULL,
  `tgl_chat` datetime NOT NULL,
  `chat` text NOT NULL,
  `status` enum('terkirim','dilihat','dibaca') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_katagori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `rekomendasi` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `foto`, `harga`, `jumlah`, `id_katagori`, `id_toko`, `rekomendasi`) VALUES
(1, 'skincare', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0'),
(2, 'skincarea', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0'),
(3, 'skincarean', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 2, 1, '0'),
(4, 'skincareaq', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 2, 1, '0'),
(5, 'skincareaw', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 3, 1, '0'),
(6, 'skincareae', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 3, 1, '0'),
(7, 'skincarear', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 3, 1, '0'),
(8, 'skincareat', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 4, 1, '1'),
(9, 'skincareay', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 4, 1, '1'),
(10, 'skincareau', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 4, 1, '1'),
(11, 'skincareai', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 4, 1, '1'),
(12, 'skincareao', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0'),
(13, 'skincareap', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0'),
(14, 'skincareal', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0'),
(15, 'skincareak', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0'),
(16, 'skincareaj', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0'),
(17, 'skincareah', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0'),
(18, 'skincareag', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 20000, 10, 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_klinik` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `alamat_toko` varchar(100) NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `nomor` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `id_user`, `id_klinik`, `nama_toko`, `alamat_toko`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `tanggal_daftar`, `nomor`, `logo`) VALUES
(1, 1, 0, 'sajna', 'jl.anjasmoro', 1, 2, 'turirejo', 'lawang', 'malang', 'jawa timur', 0, '2021-02-20', 35454, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kabupaten` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `tempat_lahir`, `tanggal_lahir`, `nomor`, `email`, `password`, `foto`) VALUES
(1, 'anjas', 'Jl.anjasmoro no.47', '1', '2', 'turirejo', 'lawang', 'malang', 'jawa timur', 32154, 'malang', '1996-08-10', '085755874597', 'mtrianjasmoro@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `katagori`
--
ALTER TABLE `katagori`
  ADD PRIMARY KEY (`id_katagori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katagori`
--
ALTER TABLE `katagori`
  MODIFY `id_katagori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
