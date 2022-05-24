-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Sep 2020 pada 21.46
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_material`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `qw_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `qw_barang` (
`id_barang` int(11)
,`kd_barang` varchar(15)
,`nama_barang` varchar(25)
,`id_merek` int(11)
,`merek` varchar(25)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `id_merek` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kd_barang`, `nama_barang`, `id_merek`) VALUES
(1, 'BDM000001', 'Cat', '1'),
(2, 'BDM000002', 'Cat', '2'),
(5, 'BDM000003', 'Paku', '3'),
(7, 'BDM000004', 'Kayu', '3'),
(8, 'BDM000005', 'Semen', '3'),
(9, 'BDM000006', 'Besi', '3'),
(10, 'BDM000007', 'Batu', '2'),
(11, 'BDM000008', 'Pasir', '3'),
(12, 'BDM000009', 'Semen Putih', '3'),
(17, 'BDM000010', 'Lem', '5'),
(18, 'BDM000011', 'Kabel', '3'),
(19, 'BDM000012', 'as', '5'),
(20, 'BDM000013', 'cau', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `merek` varchar(25) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `jumlah_barang` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `kd_level` int(11) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`kd_level`, `level`) VALUES
(1, 'Manager'),
(2, 'Admin'),
(3, 'Kasir'),
(4, 'Staf Gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lot`
--

CREATE TABLE `tb_lot` (
  `id_lot` int(11) NOT NULL,
  `nama_lot` varchar(25) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lot`
--

INSERT INTO `tb_lot` (`id_lot`, `nama_lot`, `kapasitas`) VALUES
(1, 'Rak A', 3),
(2, 'Rak B', 10),
(3, 'Rak C', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merek`
--

CREATE TABLE `tb_merek` (
  `id_merek` int(11) NOT NULL,
  `merek` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_merek`
--

INSERT INTO `tb_merek` (`id_merek`, `merek`) VALUES
(1, 'Nippon'),
(2, 'Q-lux'),
(3, 'Bagus'),
(5, 'Lux'),
(7, 'Kumbang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kd_pembelian` varchar(15) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `jumlah_barang` varchar(25) NOT NULL,
  `merek` varchar(25) NOT NULL,
  `suplier` varchar(25) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerimaan`
--

CREATE TABLE `tb_penerimaan` (
  `id_penerimaan` int(11) NOT NULL,
  `kd_pembelian` varchar(15) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `merek` varchar(25) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `harga_jual` int(25) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `jumlah_masuk` int(15) NOT NULL,
  `suplier` varchar(25) NOT NULL,
  `tgl_penerimaan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penerimaan`
--

INSERT INTO `tb_penerimaan` (`id_penerimaan`, `kd_pembelian`, `kd_barang`, `nama_barang`, `merek`, `harga_barang`, `harga_jual`, `jumlah_barang`, `jumlah_masuk`, `suplier`, `tgl_penerimaan`) VALUES
(26, 'PBM000003', 'BDM000004', 'Kayu', 'Bagus', 15000, 16500, 30, 30, 'PT Bagus ', '2016-10-20 03:21:15'),
(30, 'PBM000002', 'BDM000007', 'Batu', 'Q-lux', 20000, 22000, 20, 20, 'PT Bagus ', '2016-10-28 10:12:07'),
(28, 'PBM000002', 'BDM000001', 'Cat', 'Nippon', 20000, 22000, 25, 25, 'PT Gudang Baru', '2016-10-20 03:21:45'),
(29, 'PBM000002', 'BDM000007', 'Batu', 'Q-lux', 40000, 44000, 10, 10, 'PT Bagus ', '2016-10-20 03:21:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `no_faktur` varchar(25) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `qty` int(15) NOT NULL,
  `subtotal` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `no_faktur`, `kd_barang`, `nama_barang`, `harga_barang`, `qty`, `subtotal`, `total`, `tgl_transaksi`) VALUES
(4, 'FKR0001', 'BDM000005', 'Semen', 10000, 5, 50000, 250000, '2016-10-05'),
(3, 'FKR0001', 'BDM000008', 'Pasir', 40000, 5, 200000, 250000, '2016-10-05'),
(5, 'FKR0002', 'BDM000004', 'Kayu', 100000, 22, 2200000, 2200000, '2016-10-10'),
(6, 'FKR0003', 'BDM000003', 'Paku', 10000, 11, 110000, 110000, '2016-10-10'),
(7, 'FKR0004', 'BDM000002', 'Cat', 50000, 3, 150000, 350000, '2016-10-14'),
(8, 'FKR0004', 'BDM000003', 'Paku', 10000, 20, 200000, 350000, '2016-10-14'),
(9, 'FKR0005', 'BDM000003', 'Paku', 10000, 8, 80000, 80000, '2016-10-14'),
(10, 'FKR0006', 'BDM000007', 'Batu', 10000, 3, 30000, 130000, '2016-10-14'),
(11, 'FKR0006', 'BDM000002', 'Cat', 50000, 2, 100000, 130000, '2016-10-14'),
(12, 'FKR0007', 'BDM000002', 'Cat', 55000, 16, 880000, 880000, '2016-10-17'),
(13, 'FKR0008', 'BDM000004', 'Kayu', 24200, 30, 726000, 726000, '2016-10-19'),
(14, 'FKR0009', 'BDM000011', 'Kabel', 44000, 2, 88000, 253000, '2016-10-28'),
(15, 'FKR0009', 'BDM000014', 'Smen', 55000, 3, 165000, 253000, '2016-10-28'),
(16, 'FKR0010', 'BDM000011', 'Kabel', 44000, 1, 44000, 44000, '2016-11-07'),
(17, 'FKR0011', 'BDM000011', 'Kabel', 44000, 2, 88000, 143000, '2016-11-09'),
(18, 'FKR0011', 'BDM000014', 'Smen', 55000, 1, 55000, 143000, '2016-11-09'),
(19, 'FKR0012', 'BDM000011', 'Kabel', 44000, 35, 1540000, 1540000, '2016-11-09'),
(20, 'FKR0013', 'BDM000006', 'Besi', 22000, 3, 66000, 396000, '2019-07-07'),
(21, 'FKR0013', 'BDM000003', 'Paku', 44000, 5, 220000, 396000, '2019-07-07'),
(22, 'FKR0013', 'BDM000014', 'Smen', 55000, 2, 110000, 396000, '2019-07-07'),
(23, 'FKR0014', 'BDM000003', 'Paku', 44000, 6, 264000, 264000, '2019-07-07');

--
-- Trigger `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `trigger_pengurangan` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
UPDATE tb_stockbarang SET jumlah_barang=jumlah_barang-NEW.qty
WHERE kd_barang=NEW.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stockbarang`
--

CREATE TABLE `tb_stockbarang` (
  `id_stockbarang` int(11) NOT NULL,
  `id_penerimaan` varchar(15) NOT NULL,
  `kd_pembelian` varchar(15) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `harga_jual` int(15) NOT NULL,
  `jumlah_barang` int(15) NOT NULL,
  `id_lot` varchar(15) NOT NULL,
  `suplier` varchar(50) NOT NULL,
  `tgl_penerimaan` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stockbarang`
--

INSERT INTO `tb_stockbarang` (`id_stockbarang`, `id_penerimaan`, `kd_pembelian`, `kd_barang`, `nama_barang`, `merek`, `harga_barang`, `harga_jual`, `jumlah_barang`, `id_lot`, `suplier`, `tgl_penerimaan`) VALUES
(15, '25', 'PBM000004', 'BDM000011', 'Kabel', 'Bagus', 40000, 44000, 0, '2', 'PT Bagus ', '2016-10-21 17:04:43'),
(12, '22', 'PBM000002', 'BDM000014', 'Smen', 'Bagus', 50000, 55000, 84, '2', 'PT Gudang Baru', '2016-10-18 14:32:25'),
(13, '23', 'PBM000001', 'BDM000006', 'Besi', 'Bagus', 20000, 22000, 35, '1', 'PT Gudang Baru', '2016-10-20 11:15:58'),
(16, '31', 'PBM000002', 'BDM000003', 'Paku', 'Bagus', 40000, 44000, 9, '2', 'PT Bagus ', '2016-10-28 18:12:08'),
(11, '18', 'PBM000001', 'BDM000004', 'Kayu', 'Bagus', 22000, 24200, 0, '2', 'PT Gudang Baru', '2016-10-14 17:28:34'),
(17, '24', 'PBM000004', 'BDM000009', 'Semen Putih', 'Bagus', 50000, 55000, 30, '2', 'PT Bagus ', '2016-10-20 11:20:33'),
(18, '32', 'PBM000001', 'BDM000002', 'Cat', 'Q-lux', 30000, 33000, 40, '2', 'PT Bagus ', '2016-10-28 18:14:01'),
(19, '33', 'PBM000001', 'BDM000003', 'Paku', 'Bagus', 30000, 33000, 4, '2', 'PT Bagus ', '2016-11-09 08:34:43'),
(20, '34', 'PBM000001', 'BDM000007', 'Batu', 'Q-lux', 20000, 22000, 20, '2', 'PT Bagus ', '2016-11-09 08:35:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suplier`
--

CREATE TABLE `tb_suplier` (
  `id_suplier` int(11) NOT NULL,
  `suplier` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_suplier`
--

INSERT INTO `tb_suplier` (`id_suplier`, `suplier`, `alamat`, `no_telp`) VALUES
(1, 'PT Gudang Baru', 'Jalan Terus Lalu Tersesat', '0897777777'),
(2, 'PT Bagus ', 'Jalan Baru', '0988789'),
(3, 'PT Terpercaya', 'JL Lagi Ke Rumah', '098766555588');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tmp_barang`
--

CREATE TABLE `tb_tmp_barang` (
  `id_tmp_barang` int(11) NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `merek` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_level` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `no_telp`, `foto`, `id_level`) VALUES
(2, 'daffa', 'daffa', 'Daffa Pratama', '089744556647', 'manager.png_5822794b72805', '1'),
(22, 'kasir', 'kasir', 'kasir', '0988666688', 'log.png_58007f640ddd0', '3'),
(39, 'probo', 'probo', 'probo Novaryianto', '08977665', 'logo_smk_wikrama.jpg_58017acecc86d', '4'),
(14, 'staf', 'staf', 'staf', '098846575676', 'Hacker-silhouette-678x381.jpg_5809daeebbb8f', '4'),
(29, 'admin', 'admin', 'Admin Material', '0988884444', 'icon-145995.png_58227dd0d9778', '2'),
(41, 'coba', 'coba', 'coba', '0896666666', 'icon-145995.png_58227ce629a90', '3'),
(42, 'baru', 'baru', 'baru', '09888888', 'kasir.png_58227f1ca8d3e', '2');

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_barang`
--
DROP TABLE IF EXISTS `qw_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_barang`  AS  select `tb_barang`.`id_barang` AS `id_barang`,`tb_barang`.`kd_barang` AS `kd_barang`,`tb_barang`.`nama_barang` AS `nama_barang`,`tb_merek`.`id_merek` AS `id_merek`,`tb_merek`.`merek` AS `merek` from (`tb_barang` join `tb_merek` on(`tb_barang`.`id_merek` = `tb_merek`.`id_merek`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`kd_level`);

--
-- Indeks untuk tabel `tb_lot`
--
ALTER TABLE `tb_lot`
  ADD PRIMARY KEY (`id_lot`);

--
-- Indeks untuk tabel `tb_merek`
--
ALTER TABLE `tb_merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD UNIQUE KEY `id_penjualan` (`id_penjualan`);

--
-- Indeks untuk tabel `tb_stockbarang`
--
ALTER TABLE `tb_stockbarang`
  ADD PRIMARY KEY (`id_stockbarang`);

--
-- Indeks untuk tabel `tb_suplier`
--
ALTER TABLE `tb_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indeks untuk tabel `tb_tmp_barang`
--
ALTER TABLE `tb_tmp_barang`
  ADD PRIMARY KEY (`id_tmp_barang`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `kd_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_lot`
--
ALTER TABLE `tb_lot`
  MODIFY `id_lot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_merek`
--
ALTER TABLE `tb_merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT untuk tabel `tb_penerimaan`
--
ALTER TABLE `tb_penerimaan`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_stockbarang`
--
ALTER TABLE `tb_stockbarang`
  MODIFY `id_stockbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_suplier`
--
ALTER TABLE `tb_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_tmp_barang`
--
ALTER TABLE `tb_tmp_barang`
  MODIFY `id_tmp_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
