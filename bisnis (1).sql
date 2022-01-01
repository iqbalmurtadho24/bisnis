-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2022 at 07:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bisnis`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `kd_akses` bigint(255) NOT NULL,
  `id_user` bigint(255) NOT NULL,
  `akses` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`kd_akses`, `id_user`, `akses`, `status`, `waktu`) VALUES
(1, 1, 'konten', 1, '2021-12-31 11:26:00'),
(2, 1, 'marketing', 1, '2021-12-31 11:26:00'),
(3, 1, 'sdm', 1, '2021-12-31 11:26:00'),
(4, 1, 'keuangan', 1, '2021-12-31 11:26:00'),
(6, 1, 'cs', 1, '2021-12-31 11:26:00'),
(7, 1, 'penjualan', 1, '2022-01-01 14:45:10'),
(8, 1, 'logistik', 1, '2022-01-01 15:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `kd_gaji` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `gaji` bigint(255) DEFAULT NULL,
  `status` int(4) DEFAULT NULL,
  `target_bonus` bigint(255) DEFAULT NULL,
  `bonus` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `kd_harga` bigint(255) NOT NULL,
  `kd_series` bigint(255) DEFAULT NULL,
  `harga` bigint(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status_harga` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `kd_jenis` bigint(255) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `kd_kategori` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `kd_kategori` bigint(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `kd_konten` bigint(255) NOT NULL,
  `id_user` bigint(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `jenis_konten` varchar(255) NOT NULL,
  `produk_konten` varchar(255) NOT NULL,
  `statatus_proses` int(4) NOT NULL,
  `biaya` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `kd_marketing` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `media_iklan` varchar(255) DEFAULT NULL,
  `pemirsa` bigint(255) DEFAULT NULL,
  `klik_lp` bigint(255) DEFAULT NULL,
  `scroll_lp` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `kd_merek` bigint(255) NOT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `kd_jenis` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `kd_order` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `id_suplier` bigint(255) DEFAULT NULL,
  `harga_suplier` bigint(255) DEFAULT NULL,
  `status_pembayaran` int(4) DEFAULT NULL,
  `status_order_suplier` int(4) DEFAULT NULL,
  `resi_pengiriman` bigint(255) DEFAULT NULL,
  `status_pengiriman` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `id_produk` bigint(255) DEFAULT NULL,
  `kontak` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `kd_pemesanan` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `id_pelanggan` bigint(255) DEFAULT NULL,
  `id_produk` bigint(255) DEFAULT NULL,
  `jumlah` bigint(255) DEFAULT NULL,
  `waktu_pemesanan` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `harga_penjualan` bigint(255) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `status_pembayaran` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sdm`
--

CREATE TABLE `sdm` (
  `id_user` bigint(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` bigint(255) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `rt_rw` bigint(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kota_kabupaten` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kontak` bigint(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bank` varchar(255) NOT NULL,
  `nama_rekening` varchar(255) NOT NULL,
  `rekening` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sdm`
--

INSERT INTO `sdm` (`id_user`, `nama`, `tanggal_lahir`, `nik`, `jalan`, `rt_rw`, `desa`, `kecamatan`, `kota_kabupaten`, `provinsi`, `kontak`, `email`, `bank`, `nama_rekening`, `rekening`) VALUES
(1, 'Misbahudin', '2022-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `kd_series` bigint(255) NOT NULL,
  `series` varchar(255) DEFAULT NULL,
  `kd_merek` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` bigint(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `kontak` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `satuan_barang` bigint(255) DEFAULT NULL,
  `harga_satuan` bigint(255) DEFAULT NULL,
  `biaya_operasional` bigint(255) DEFAULT NULL,
  `jumlah_transaksi` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(1, 'misbah', 'udin', 'user', 1),
(2, 'iqbal', 'sangar', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`kd_akses`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`kd_gaji`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`kd_harga`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`kd_konten`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`kd_marketing`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`kd_merek`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`kd_order`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`kd_pemesanan`);

--
-- Indexes for table `sdm`
--
ALTER TABLE `sdm`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`kd_series`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `kd_akses` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `kd_gaji` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `kd_harga` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `kd_jenis` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `kd_kategori` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `kd_konten` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `kd_marketing` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `kd_merek` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `kd_order` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `kd_pemesanan` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sdm`
--
ALTER TABLE `sdm`
  MODIFY `id_user` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `kd_series` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses`
--
ALTER TABLE `akses`
  ADD CONSTRAINT `akses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
