-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 05:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
  `waktu` datetime NOT NULL,
  `kontak_akses` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`kd_akses`, `id_user`, `akses`, `status`, `waktu`, `kontak_akses`) VALUES
(1, 1, 'konten', 1, '2022-01-01 00:00:00', 2022),
(2, 1, 'sdm', 1, '2022-01-05 17:56:25', 8596),
(18, 2, 'keuangan', 1, '2022-01-05 17:56:54', 856),
(19, 2, 'logistik', 1, '2022-01-05 17:58:12', 856),
(20, 1, 'logistik', 1, '2022-01-05 17:58:50', 88),
(21, 1, 'marketing', 1, '2022-01-10 19:27:53', 1),
(22, 1, 'cs', 1, '2022-01-10 19:33:00', 1),
(23, 1, 'penjualan', 1, '2022-01-10 20:26:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `kd_cs` bigint(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_pelanggan` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `kd_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs`
--

INSERT INTO `cs` (`kd_cs`, `waktu`, `id_pelanggan`, `id_user`, `kd_produk`) VALUES
(1, '2022-01-18 16:34:20', 12, 1, 'PPCG'),
(11, '2022-01-18 19:14:39', 20, 1, 'PPCG'),
(12, '2022-01-18 19:17:06', 12, 1, 'PPCG'),
(13, '2022-01-18 19:17:13', 21, 1, 'PPCG'),
(14, '2022-01-18 21:51:48', 22, 1, ''),
(15, '2022-01-18 21:52:02', 22, 1, 'PPCG'),
(16, '2022-01-18 22:37:59', 23, 1, 'PPCG');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `kd_gaji` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `akses` varchar(255) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `gaji` bigint(255) DEFAULT NULL,
  `status` int(4) DEFAULT NULL,
  `target_bonus` bigint(255) DEFAULT NULL,
  `bonus` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`kd_gaji`, `id_user`, `akses`, `waktu`, `gaji`, `status`, `target_bonus`, `bonus`) VALUES
(1, 3, 'cs', '2022-01-02 05:22:47', 23131231, 1, NULL, NULL),
(2, 1, 'sdm', '2022-01-02 05:24:47', 3, 1, NULL, NULL),
(3, 6, 'cs', '2022-01-03 21:25:30', 23123123, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `kd_harga` bigint(255) NOT NULL,
  `kd_produk` varchar(255) DEFAULT NULL,
  `id_suplier` bigint(255) NOT NULL,
  `harga` bigint(255) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `status_harga` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`kd_harga`, `kd_produk`, `id_suplier`, `harga`, `waktu`, `status_harga`) VALUES
(1, 'PPCG', 1, 30000, '2022-01-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `kd_jenis` varchar(255) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `kd_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`kd_jenis`, `jenis`, `kd_kategori`) VALUES
('KLACC', 'aas', 'KL'),
('KLwq', 'w', 'KL'),
('PP', 'Plastik', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `kd_kategori` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`kd_kategori`, `kategori`) VALUES
('KL', 'Kompu'),
('P', 'Perabotan rumah tangga');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `kd_konten` bigint(255) NOT NULL,
  `id_user` bigint(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `jenis_konten` varchar(255) NOT NULL,
  `kd_produk` varchar(255) NOT NULL,
  `status_proses` varchar(255) NOT NULL,
  `biaya` int(255) NOT NULL,
  `gdrive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`kd_konten`, `id_user`, `waktu`, `jenis_konten`, `kd_produk`, `status_proses`, `biaya`, `gdrive`) VALUES
(4, 1, '2022-01-09 21:10:16', 'Video', 'KLACCSMM', 'Planning', 0, 'https://www.memek.com'),
(5, 1, '2022-01-10 19:06:01', 'Gambar', 'KLACCSMM', 'Planning', 0, ''),
(6, 1, '2022-01-10 19:06:06', 'System Website', 'KLACCSMM', 'Planning', 0, ''),
(7, 2, '2022-01-10 19:06:11', 'Gambar', 'KLACCSMM', 'Planning', 0, ''),
(8, 1, '2022-01-17 19:53:37', 'Gambar', 'PPCG', 'Finish', 0, 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `kd_marketing` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `kd_konten` bigint(255) NOT NULL,
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
  `kd_merek` varchar(255) NOT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `kd_jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`kd_merek`, `merek`, `kd_jenis`) VALUES
('KLACCSM', 'ssss', 'KLACC'),
('PPC', 'kn', 'PP');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `kd_order` bigint(255) NOT NULL,
  `kd_pemesanan` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `id_suplier` bigint(255) DEFAULT NULL,
  `status_order_suplier` int(4) DEFAULT NULL,
  `resi_pengiriman` varchar(255) DEFAULT NULL,
  `status_pengiriman` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`kd_order`, `kd_pemesanan`, `id_user`, `id_suplier`, `status_order_suplier`, `resi_pengiriman`, `status_pengiriman`) VALUES
(1, 151801222156, 1, 9, 1, 'y54y6bfghn53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kontak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `kontak`) VALUES
(12, 'Ubaid', '0852154646545'),
(13, 'Pelanggan Baru', '0854564'),
(14, 'Pelanggan Baru', '52424'),
(15, 'Pelanggan Baru', '876867'),
(17, 'Pelanggan Baru', '2222222222'),
(18, 'Pelanggan Baru', '435345345'),
(19, 'Pelanggan Baru', '543534'),
(20, 'Pelanggan Baru', '085131'),
(21, 'Pelanggan Baru', '021313'),
(22, 'Pelanggan Baru', '085234038214'),
(23, 'Pelanggan Baru', '9879789');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `kd_pemesanan` bigint(255) NOT NULL,
  `waktu_pemesanan` date DEFAULT NULL,
  `kd_cs` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `id_pelanggan` bigint(255) DEFAULT NULL,
  `kd_produk` varchar(255) DEFAULT NULL,
  `jumlah` bigint(255) DEFAULT NULL,
  `harga_penjualan` bigint(255) DEFAULT NULL,
  `total_pembayaran` bigint(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `bank` varchar(255) NOT NULL,
  `status_pembayaran` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`kd_pemesanan`, `waktu_pemesanan`, `kd_cs`, `id_user`, `id_pelanggan`, `kd_produk`, `jumlah`, `harga_penjualan`, `total_pembayaran`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `metode_pembayaran`, `bank`, `status_pembayaran`) VALUES
(11801221917, '2022-01-18', 1, 1, 12, 'PPCG', 5, 30000, 150000, 'fghfh', '0', '0', '0', '0', 'Transfer', 'BRI', 0),
(151801222156, '2022-01-18', 15, 1, 22, 'PPCG', 9, 30000, 270000, 'jhkhk', '0', '0', '0', '0', 'Transfer', 'BRI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` varchar(255) NOT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `kd_merek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `produk`, `kd_merek`) VALUES
('KLACCSMa', 'sasasas', 'KLACCSM'),
('KLACCSMM', 'aaa', 'KLACCSM'),
('PPCG', 'Gayung', 'PPC');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `kd_publikasi` int(255) NOT NULL,
  `id_user` bigint(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `kd_konten` bigint(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
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
(1, 'Misbahudin', '2022-01-05', 1, '1', 1, '1', '1', '1', '1', 1, '1', '1', '1', '1'),
(2, 'Muhammad Iqbal Murtadho', '2022-01-05', 2, '2', 2, '2', '2', '2', '2', 2, '2', '2', '2', '2'),
(8, 'Samudera Alamsyah', '2022-01-04', 1, '1', 1, '1', '1', '1', '1', 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` bigint(255) NOT NULL,
  `suplier` varchar(255) DEFAULT NULL,
  `toko` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `produk` varchar(255) NOT NULL,
  `kontak` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `suplier`, `toko`, `alamat`, `kategori`, `produk`, `kontak`) VALUES
(9, 'Iqbal', 'AMR Store', 'Malang', 'tokopedia', 'PPCG', 852);

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
(1, '1', '1', 'user', 1),
(2, '2', '2', 'user', 1),
(8, '3', '3', 'user', 1);

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
-- Indexes for table `cs`
--
ALTER TABLE `cs`
ADD PRIMARY KEY (`kd_cs`);

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
-- Indexes for table `produk`
--
ALTER TABLE `produk`
ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `sdm`
--
ALTER TABLE `sdm`
ADD PRIMARY KEY (`id_user`);

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
MODIFY `kd_akses` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cs`
--
ALTER TABLE `cs`
MODIFY `kd_cs` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
MODIFY `kd_gaji` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
MODIFY `kd_harga` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
MODIFY `kd_konten` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
MODIFY `kd_marketing` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `kd_order` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
MODIFY `kd_pemesanan` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151801222157;

--
-- AUTO_INCREMENT for table `sdm`
--
ALTER TABLE `sdm`
MODIFY `id_user` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
MODIFY `id_suplier` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `kd_transaksi` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
