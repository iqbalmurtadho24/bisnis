-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2021 pada 14.07
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

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
-- Struktur dari tabel `gaji`
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
-- Struktur dari tabel `harga`
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
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `kd_jenis` bigint(255) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `kd_kategori` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `kd_kategori` bigint(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
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
-- Struktur dari tabel `marketing`
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
-- Struktur dari tabel `merek`
--

CREATE TABLE `merek` (
  `kd_merek` bigint(255) NOT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `kd_jenis` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
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
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` bigint(255) NOT NULL,
  `id_user` bigint(255) DEFAULT NULL,
  `id_produk` bigint(255) DEFAULT NULL,
  `kontak` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
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
-- Struktur dari tabel `sdm`
--

CREATE TABLE `sdm` (
  `id_user` bigint(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `ttl` datetime DEFAULT NULL,
  `nik` bigint(255) DEFAULT NULL,
  `jalan` varchar(255) DEFAULT NULL,
  `rt_rw` bigint(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kota_kabupaten` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kontak` bigint(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `series`
--

CREATE TABLE `series` (
  `kd_series` bigint(255) NOT NULL,
  `series` varchar(255) DEFAULT NULL,
  `kd_merek` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` bigint(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `kontak` bigint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` bigint(255) NOT NULL ,
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` bigint(255)  PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `akses` (
  `kd_akses` bigint(255) NOT NULL PRIMARY KEY,
  `id_user` bigint(255) NOT NULL,
  `akses` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD KEY `id_user` (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses`
--
ALTER TABLE `akses`
  ADD CONSTRAINT `akses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gaji`
--

ALTER TABLE `gaji`
  ADD PRIMARY KEY (`kd_gaji`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`kd_harga`),
  ADD KEY `kd_series` (`kd_series`);

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`kd_jenis`),
  ADD KEY `kd_kategori` (`kd_kategori`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`kd_marketing`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`kd_merek`),
  ADD KEY `kd_jenis` (`kd_jenis`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`kd_order`),
  ADD KEY `order_ibfk_1` (`id_user`),
  ADD KEY `order_ibfk_2` (`id_suplier`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `pelanggan_ibfk_1` (`id_produk`),
  ADD KEY `pelanggan_ibfk_2` (`id_user`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`kd_pemesanan`),
  ADD KEY `pemesanan_ibfk_1` (`id_pelanggan`),
  ADD KEY `pemesanan_ibfk_2` (`id_produk`),
  ADD KEY `pemesanan_ibfk_3` (`id_user`);

--
-- Indeks untuk tabel `sdm`
--
ALTER TABLE `sdm`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`kd_series`),
  ADD KEY `kd_merek` (`kd_merek`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `harga_ibfk_1` FOREIGN KEY (`kd_series`) REFERENCES `series` (`kd_series`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD CONSTRAINT `jenis_produk_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori_produk` (`kd_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `konten_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `marketing`
--
ALTER TABLE `marketing`
  ADD CONSTRAINT `marketing_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `merek`
--
ALTER TABLE `merek`
  ADD CONSTRAINT `merek_ibfk_1` FOREIGN KEY (`kd_jenis`) REFERENCES `jenis_produk` (`kd_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_suplier`) REFERENCES `suplier` (`id_suplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `series` (`kd_series`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `series` (`kd_series`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sdm`
--
ALTER TABLE `sdm`
  ADD CONSTRAINT `sdm_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`kd_merek`) REFERENCES `merek` (`kd_merek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
