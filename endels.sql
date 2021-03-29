-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 12:40 AM
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
  `bayar` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `tgl_bayar`, `bayar`, `potongan`, `bukti`) VALUES
(8, '2021-03-02 17:18:01', 45000, 5000, 'Bukti120210302171801.jpg'),
(9, '2021-03-04 06:57:37', 50000, 5000, 'Bukti120210302171801.jpg');

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
  `kurir` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `resi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `status` enum('lunas','belum','gagal','menunggu') NOT NULL DEFAULT 'belum',
  `id_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id_beli`, `id_produk`, `id_user`, `tgl_beli`, `tgl_dateline`, `banyak`, `total_harga`, `kurir`, `paket`, `resi`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `status`, `id_bayar`) VALUES
(7, 11, 1, '2021-03-02 17:16:55', '2021-03-03 17:16:55', 1, 27000, 'jne', 'REG', '', 'Jl.anjasmoro no.47', 1, 2, 'turirejo', 'lawang', 'Malang', 'Jawa Timur', 'lunas', 8),
(8, 3, 1, '2021-03-02 17:17:50', '2021-03-03 17:17:50', 1, 25000, 'tiki', 'ECO', '', 'Jl.anjasmoro no.47', 1, 2, 'turirejo', 'lawang', 'Malang', 'Jawa Timur', 'belum', 0);

-- --------------------------------------------------------

--
-- Table structure for table `katagori`
--

CREATE TABLE `katagori` (
  `id_katagori` int(11) NOT NULL,
  `nama_katagori` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `katagori`
--

INSERT INTO `katagori` (`id_katagori`, `nama_katagori`, `gambar`) VALUES
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
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_user`) VALUES
(9, 1, 1),
(10, 1, 1);

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

--
-- Dumping data for table `klinik`
--

INSERT INTO `klinik` (`id_klinik`, `nama_klinik`, `tanggal_gabung`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `foto`, `nomor`, `email`, `password`) VALUES
(1, 'anjas', '2021-03-02', 'jl.anjasmoro', '1', '2', 'turirejo', 'lawang', 'malang', 'jawa timur', '1.png', '085755874597', 'mtria@gmail.com', '12346');

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
-- Table structure for table `mua`
--

CREATE TABLE `mua` (
  `id_mua` int(11) NOT NULL,
  `nama_mua` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `buka` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mua`
--

INSERT INTO `mua` (`id_mua`, `nama_mua`, `harga`, `foto`, `alamat`, `rt`, `rw`, `kecamatan`, `kabupaten`, `provinsi`, `email`, `password`, `buka`) VALUES
(1, 'nia', 600000, '1.png', 'jl.ngamar', 2, 2, 'lawang', 'malang', 'jawa timur', 'mh@.com', '$2y$10$f/0WbFUPlrzGZLSyVvO1c.rljLSRuh826F1qK7yY2nyssRerkIxYC', '0'),
(2, 'qwe', 500000, '1.png', 'n', 1, 2, 'lawang', 'tuban', 'jawa tengah', 'ad@gmail.com', 'qwe', '1'),
(3, 'dgv', 800000, '1.png', 'jl.apa', 1, 1, 'kota', 'semarang', 'jawa tengah', 'afg@ad.com', 'asd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mua_booking`
--

CREATE TABLE `mua_booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mua` int(11) NOT NULL,
  `tgl_H` date NOT NULL,
  `tgl_booking` date NOT NULL,
  `acc` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `id_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mua_booking`
--

INSERT INTO `mua_booking` (`id_booking`, `id_user`, `id_mua`, `tgl_H`, `tgl_booking`, `acc`, `id_bayar`) VALUES
(3, 2, 1, '2021-03-24', '2021-03-10', '0', 8),
(4, 1, 1, '2021-03-31', '2021-03-11', '0', 9);

-- --------------------------------------------------------

--
-- Table structure for table `mua_galery`
--

CREATE TABLE `mua_galery` (
  `id_galery` int(11) NOT NULL,
  `id_mua` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto1` varchar(50) NOT NULL,
  `foto2` varchar(50) NOT NULL,
  `foto3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mua_galery`
--

INSERT INTO `mua_galery` (`id_galery`, `id_mua`, `judul`, `foto1`, `foto2`, `foto3`) VALUES
(1, 1, 'contoh', '1.jpg', '2.jpg', '3.jpg'),
(6, 1, 'contoh 2', 'MUA1202103071321501.jpg', 'MUA12021030713215011.jpg', 'MUA12021030713215012.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan_mua`
--

CREATE TABLE `penarikan_mua` (
  `id_tarik` int(11) NOT NULL,
  `id_mua` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_tarik` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bukti` varchar(128) NOT NULL,
  `status` enum('1','0','2') NOT NULL DEFAULT '2' COMMENT '0 = gagal\r\n1 = berhasil\r\n2 = proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penarikan_mua`
--

INSERT INTO `penarikan_mua` (`id_tarik`, `id_mua`, `id_admin`, `tgl_tarik`, `jumlah`, `bukti`, `status`) VALUES
(1, 1, 1, '2021-03-10 11:14:37', 30000, '', '1'),
(2, 1, 1, '2021-03-02 11:14:37', 20000, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan_toko`
--

CREATE TABLE `penarikan_toko` (
  `id_penarikan` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_tarik` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '0=gagal 1=berhasil 2=proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penarikan_toko`
--

INSERT INTO `penarikan_toko` (`id_penarikan`, `id_toko`, `id_admin`, `tgl_tarik`, `jumlah`, `bukti`, `status`) VALUES
(1, 1, 1, '2021-03-17 17:15:12', 20000, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `foto_2` varchar(255) NOT NULL,
  `foto_3` varchar(255) NOT NULL,
  `foto_4` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `id_katagori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `rekomendasi` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `foto`, `foto_2`, `foto_3`, `foto_4`, `harga`, `jumlah`, `berat`, `id_katagori`, `id_toko`, `rekomendasi`) VALUES
(1, 'skincare', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 2, '0'),
(2, 'skincarea', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 1, '0'),
(3, 'skincarean', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 2, 1, '0'),
(4, 'skincareaq', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 2, 1, '0'),
(5, 'skincareaw', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 3, 1, '0'),
(6, 'skincareae', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 3, 1, '0'),
(7, 'skincarear', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 3, 1, '0'),
(8, 'skincareat', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 4, 1, '1'),
(9, 'skincareay', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 4, 1, '1'),
(10, 'skincareau', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 4, 1, '1'),
(11, 'skincareai', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 4, 1, '1'),
(12, 'skincareao', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 1, '0'),
(13, 'skincareap', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 1, '0'),
(14, 'skincareal', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 1, '0'),
(15, 'skincareak', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 1, '0'),
(16, 'skincareaj', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 1, '0'),
(17, 'skincareah', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 1, '0'),
(18, 'skincareag', 'bahan ajaib. bisa bikin cantek', 'ex.jpg', 'exx.jpg', 'exxx.jpg', 'exxxx.jpg', 20000, 10, 20, 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL,
  `id_klinik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomendasi`, `id_klinik`, `id_user`, `id_produk`) VALUES
(1, 1, 1, 1);

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
(1, 1, 0, 'sajna', 'jl.anjasmoro', 1, 2, 'turirejo', 'lawang', '256', '11', 0, '2021-02-20', 35454, '1.png');

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
(1, 'anjas', 'Jl.anjasmoro no.47', '1', '2', 'turirejo', 'lawang', '255', '11', 32154, 'malang', '1996-08-10', '085755874597', 'mtrianjasmoro@gmail.com', '', ''),
(2, 'moro', 'jl. opo', '1', '2', 'turirejo', 'lawang', '11', '255', 32154, 'malang', '1996-08-10', '0857555', 'mj@gmail.com', 'qweqwewqe', '1.jpg');

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
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `mua`
--
ALTER TABLE `mua`
  ADD PRIMARY KEY (`id_mua`);

--
-- Indexes for table `mua_booking`
--
ALTER TABLE `mua_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `mua_galery`
--
ALTER TABLE `mua_galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indexes for table `penarikan_mua`
--
ALTER TABLE `penarikan_mua`
  ADD PRIMARY KEY (`id_tarik`);

--
-- Indexes for table `penarikan_toko`
--
ALTER TABLE `penarikan_toko`
  ADD PRIMARY KEY (`id_penarikan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

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
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `katagori`
--
ALTER TABLE `katagori`
  MODIFY `id_katagori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `klinik`
--
ALTER TABLE `klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mua`
--
ALTER TABLE `mua`
  MODIFY `id_mua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mua_booking`
--
ALTER TABLE `mua_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mua_galery`
--
ALTER TABLE `mua_galery`
  MODIFY `id_galery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penarikan_mua`
--
ALTER TABLE `penarikan_mua`
  MODIFY `id_tarik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penarikan_toko`
--
ALTER TABLE `penarikan_toko`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
