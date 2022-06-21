-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2022 pada 04.54
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ekspedisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `berat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `berat`) VALUES
(1, 'mainan', 2),
(2, 'buku', 1),
(3, 'baju', 3),
(4, 'baju', 2),
(5, 'kain ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_customer`
--

CREATE TABLE `data_customer` (
  `id_pengirim` int(10) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `notelp_pengirim` varchar(20) DEFAULT NULL,
  `alamat_pengirim` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_customer`
--

INSERT INTO `data_customer` (`id_pengirim`, `nama_pengirim`, `notelp_pengirim`, `alamat_pengirim`) VALUES
(1, 'alfa', '08812323', 'jl.gardenia city'),
(2, 'bagas', '08812299', 'jl.bagong'),
(3, 'victor', '088135566', 'jl.kenanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `no_resi` int(10) DEFAULT NULL,
  `id_pengirim` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`no_resi`, `id_pengirim`) VALUES
(2, 1),
(3, 1),
(4, 2),
(5, 1),
(6, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `kode_kurir` int(10) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL,
  `notelp_kurir` varchar(20) DEFAULT NULL,
  `alamat_kurir` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`kode_kurir`, `nama_kurir`, `notelp_kurir`, `alamat_kurir`) VALUES
(1, 'bima setya', '0888223', 'jl.bali'),
(2, 'bejo', '08812211', 'jl.gedong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama`, `username`, `password`, `level`) VALUES
(1, 'bima setya', 'bima123', 'bima123', 'kurir'),
(2, 'bejo', 'bejo123', 'bejo123', 'kurir'),
(3, 'administrasi', 'admin123', 'admin123', 'administrasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_resi` int(10) NOT NULL,
  `kode_kurir` int(10) NOT NULL,
  `id_barang` int(10) DEFAULT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_tujuan` varchar(200) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `status_pengiriman` varchar(15) NOT NULL,
  `total_biaya` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_resi`, `kode_kurir`, `id_barang`, `nama_penerima`, `alamat_tujuan`, `kode_pos`, `tgl_pengiriman`, `status_pengiriman`, `total_biaya`) VALUES
(2, 1, 1, 'io', 'jl.gedangan', '12302', '0000-00-00', 'proses', 20000),
(3, 1, 2, 'io', 'jl.gedangan', '12302', '0000-00-00', 'proses', 10000),
(4, 1, 1, 'rega', 'jl.rega', '12345', '2022-06-14', 'terkirim', 10000),
(5, 2, 3, 'shelby', 'jl.gedong', '12556', '0000-00-00', 'proses', 15000),
(6, 2, 4, 'shelby', 'jl.pahlawan', '12334', '0000-00-00', 'proses', 10000),
(7, 2, 5, 'walda', 'jl.semarang', '12228', '2022-06-15', 'terkirim', 5000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_pengirim`),
  ADD UNIQUE KEY `notelp_pengirim` (`notelp_pengirim`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `fk_transaksi2` (`no_resi`),
  ADD KEY `fk_customer` (`id_pengirim`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`kode_kurir`),
  ADD UNIQUE KEY `notelp_kurir` (`notelp_kurir`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_resi`),
  ADD KEY `fk_kurir` (`kode_kurir`),
  ADD KEY `fk_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_pengirim` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `kode_kurir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_resi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`id_pengirim`) REFERENCES `data_customer` (`id_pengirim`),
  ADD CONSTRAINT `fk_transaksi2` FOREIGN KEY (`no_resi`) REFERENCES `transaksi` (`no_resi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `fk_kurir` FOREIGN KEY (`kode_kurir`) REFERENCES `kurir` (`kode_kurir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
