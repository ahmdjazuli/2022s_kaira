-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 03:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2022s_kaira`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(5) NOT NULL,
  `namabarang` varchar(80) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `modal` float NOT NULL,
  `harga` float NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `stok` int(4) NOT NULL,
  `harga_r` float NOT NULL,
  `terjual` int(10) NOT NULL,
  `cekflash` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `kategori`, `modal`, `harga`, `deskripsi`, `gambar`, `stok`, `harga_r`, `terjual`, `cekflash`) VALUES
(30, 'Kereta Baby', 'Perlengkapan', 100000, 140000, '<p>Ori</p>', 'assets/img/1819kereta.jpg', 16, 110000, 50, 0),
(31, 'Caladine Baby liquid soap', 'Perlengkapan', 20000, 29000, '<p>Sabun khusus untuk bayi yang mengandung Alpha Bisabolol sebagai zat anti inflamasi yang berfungsi mengatasi iritasi dan juga membantu mengurangi kemerahan pada kulit bayi. Kandungan Aloe Vera memberikan efek dingin pada kulit. Penambahan Vitamin B5 dan Minyak Zaitun berfungsi sebagai pelembab untuk menjaga kulit bayi tetap halus dan lembut.<br></p>', 'assets/img/73ecb5a46ab1d0619f6ec4d82e7e8c77.jpg', 0, 23000, 3, 0),
(32, 'Baby Needle Blanket / Selimut Bayi', 'Perlengkapan', 80000, 109000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, æ–‡æ³‰é©›æ­£é»‘, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;å„·é»‘ Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, å¾®è»Ÿæ­£é»‘é«”, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Cuit x Kintakun Baby Needle Blanket \r\n\r\n- Ukuran Blanket: 76 cm x 102 cm \r\n- SNI Certified, OEKO-TEX International Standard 100 Certified \r\n- Safe for Newborn &amp; Sensitive Skin \r\n- Amazingly Soft Material : komposisi bahan yang lembut dan empuk, cocok dengan kulit sensitive bayi \r\n- Hypoallergenic \r\n- Colorful design \r\n- warna tidak luntur \r\n- Meningkatkan sensor bayi terhadap benda \r\n- Multifungsi dapat digunakan sebagai bantal , selimut ataupun selimut untuk traveling \r\n- Desain yang elegant dan tidak pasaran \r\n- Tanpa Topi\r\n\r\n*Disarankan cuci sebelum digunakan*\r\n\r\nCara pencucian: \r\n- hanya mengucek lembut dengan tangan\r\n- sebaiknya menggunakan sabun cuci khusus utk bayi\r\n- tidak menjemur langsung dibawah sinar matahari</span><br></p>', 'assets/img/f33e1e425b80d670e7d2c6dea6ac089d.jpg', 0, 85000, 2, 0),
(33, 'Singlet Velvet Junior', 'Baju Bayi', 10000, 24000, '<p>singlet dari velvet junior<br></p>', 'assets/img/b44ebc9559b853569ae5859247fc0731.jpg', 41, 11000, 9, 0),
(34, 'Hijab anak pashmina instan segitiga 2-7Y', 'Jilbab', 20000, 35000, '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, æ–‡æ³‰é©›æ­£é»‘, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;å„·é»‘ Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, å¾®è»Ÿæ­£é»‘é«”, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Pasmina Instan Segitiga Sivana by Beuzee\r\n\r\nPasmina instan segitiga berbahan spandek rayon premium, sangat nyaman buat anak yang sedang aktif-aktifnya beraktifitas, karena menyerap keringat, jadi sangat adem buat anak\r\n\r\nPasmina ini kisaran buat anak usia 2-7 tahun\r\nPanjang dari bagian dahi ke belakang 75 cm\r\nPanjang dari bagian dagu ke depan 75 cm</span><br></p>', 'assets/img/eb68664943509747ca11d054d654f1b2.jpg', 9, 22000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `idbeli` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `idongkir` int(5) NOT NULL,
  `tglbeli` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `bukti` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `namakota` varchar(80) NOT NULL,
  `tarifnya` float NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`idbeli`, `id`, `idongkir`, `tglbeli`, `total`, `bukti`, `status`, `namakota`, `tarifnya`, `alamat`) VALUES
(52, 7, 0, '2022-06-06 10:48:00', 1100000, '', 'Diterima', '', 0, 'MTP'),
(55, 7, 0, '2022-06-06 11:09:00', 110000, '', 'Diterima', '', 0, 'MTP'),
(61, 3, 0, '2022-06-06 12:21:00', 660000, '', 'Diterima', '', 0, 'Gang Hijrah Raya, Muhibbin 4 Sekumpul'),
(64, 2, 6, '2022-06-06 00:00:00', 305000, 'assets/img/13585937image22a.png', 'Diterima', 'Marabahan', 25000, 'komplek pangeran antasari no. 33'),
(65, 6, 0, '2022-06-18 11:01:00', 108000, '', 'Diterima', '', 0, 'Jl. Trikora Rt.32 Rw.5 Kode Pos 70721 Guntung Manggis'),
(66, 7, 3, '2022-06-19 09:22:00', 200000, 'assets/img/4770IMG.20210830.WA0010.jpg', 'Diterima', 'Barabai', 5000, 'MTP'),
(67, 6, 2, '2022-06-19 09:29:00', 63000, 'assets/img/6139Screenshot.2020.0821.193603.9b553e87d5bc57b8c2fe37f8ae5bc043.png', 'Diterima', 'Banjarbaru', 15000, 'Jl. Trikora Rt.32 Rw.5 Kode Pos 70721 Guntung Manggis'),
(68, 7, 0, '2022-07-06 10:16:00', 22000, '', 'Diterima', '', 0, 'MTP'),
(69, 3, 0, '2022-07-06 10:17:00', 79000, '', 'Diterima', '', 0, 'Gang Hijrah Raya, Muhibbin 4 Sekumpul'),
(70, 7, 9, '2022-07-06 10:52:00', 249000, 'assets/img/3792Screenshot.2020.0821.193603.9b553e87d5bc57b8c2fe37f8ae5bc043.png', 'Diterima', 'Pelaihari', 18000, 'MTP'),
(71, 3, 11, '2022-07-25 15:29:00', 34000, 'assets/img/1544IMG.20211125.WA0000.jpg', 'Diterima', 'Landasan Ulin', 10000, 'Gang Hijrah Raya, Muhibbin 4 Sekumpul'),
(72, 2, 10, '2022-07-26 09:18:00', 49000, 'assets/img/1772IMG.20210830.WA0010.jpg', 'Diterima', 'Batakan', 25000, 'komplek pangeran antasari no. 30'),
(73, 8, 4, '2022-07-26 09:31:00', 157000, 'assets/img/1192IMG.20210815.WA0023.jpg', 'Diterima', 'Kotabaru', 17000, 'bjm');

-- --------------------------------------------------------

--
-- Table structure for table `beliproduk`
--

CREATE TABLE `beliproduk` (
  `idbeliproduk` int(5) NOT NULL,
  `idbeli` int(5) NOT NULL,
  `idbarang` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `namanya` varchar(80) NOT NULL,
  `harganya` float NOT NULL,
  `subharga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beliproduk`
--

INSERT INTO `beliproduk` (`idbeliproduk`, `idbeli`, `idbarang`, `jumlah`, `namanya`, `harganya`, `subharga`) VALUES
(43, 52, 30, 10, 'Kereta Baby', 110000, 1100000),
(46, 55, 30, 1, 'Kereta Baby', 110000, 110000),
(52, 61, 30, 6, 'Kereta Baby', 110000, 660000),
(55, 64, 30, 2, 'Kereta Baby', 140000, 280000),
(56, 65, 32, 1, 'Baby Needle Blanket / Selimut Bayi', 85000, 85000),
(57, 65, 31, 1, 'Caladine Baby liquid soap', 23000, 23000),
(58, 66, 30, 1, 'Kereta Baby', 110000, 110000),
(59, 66, 32, 1, 'Baby Needle Blanket / Selimut Bayi', 85000, 85000),
(60, 67, 33, 2, 'Singlet Velvet Junior', 24000, 48000),
(61, 68, 34, 1, 'Hijab anak pashmina instan segitiga 2-7Y', 22000, 22000),
(62, 69, 31, 2, 'Caladine Baby liquid soap', 23000, 46000),
(63, 69, 33, 3, 'Singlet Velvet Junior', 11000, 33000),
(64, 70, 30, 2, 'Kereta Baby', 110000, 220000),
(65, 70, 33, 1, 'Singlet Velvet Junior', 11000, 11000),
(66, 71, 33, 1, 'Singlet Velvet Junior', 24000, 24000),
(67, 72, 33, 1, 'Singlet Velvet Junior', 24000, 24000),
(68, 73, 30, 1, 'Kereta Baby', 140000, 140000);

--
-- Triggers `beliproduk`
--
DELIMITER $$
CREATE TRIGGER `membeli` AFTER INSERT ON `beliproduk` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok - NEW.jumlah, 
                     terjual = terjual + NEW.jumlah 
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `flashsale`
--

CREATE TABLE `flashsale` (
  `idflash` int(5) NOT NULL,
  `idbarang` int(5) NOT NULL,
  `hargaawal` float NOT NULL,
  `waktu` datetime NOT NULL,
  `diskon` int(11) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flashsale`
--

INSERT INTO `flashsale` (`idflash`, `idbarang`, `hargaawal`, `waktu`, `diskon`, `hasil`) VALUES
(3, 30, 140000, '2022-06-07 08:11:00', 15, 119000),
(4, 34, 35000, '2022-06-19 21:34:00', 10, 31500);

--
-- Triggers `flashsale`
--
DELIMITER $$
CREATE TRIGGER `delete_flash` AFTER DELETE ON `flashsale` FOR EACH ROW BEGIN 
	UPDATE barang SET harga = OLD.hargaawal, cekflash = 0
    WHERE idbarang = OLD.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_flash` AFTER UPDATE ON `flashsale` FOR EACH ROW BEGIN
	UPDATE barang SET harga = NEW.hasil, cekflash = 1
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_flash` AFTER INSERT ON `flashsale` FOR EACH ROW BEGIN
	UPDATE barang SET harga = NEW.hasil, cekflash = 1
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kirim`
--

CREATE TABLE `kirim` (
  `idkirim` int(5) NOT NULL,
  `idbeli` int(5) NOT NULL,
  `idkurir` int(3) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `ket` text NOT NULL,
  `statuskirim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim`
--

INSERT INTO `kirim` (`idkirim`, `idbeli`, `idkurir`, `penerima`, `foto`, `ket`, `statuskirim`) VALUES
(9, 64, 6, 'yg bersangkutan', 'assets/img/IMG_20200504_164041_HDR (2).jpg', 'barang sampai', 'Selesai'),
(10, 66, 2, 'adiknya', 'assets/img/IadsMG_20191218_135559 (2).jpg', 'diambil kurir.', 'Selesai'),
(11, 67, 3, 'yg bersangkutan', 'assets/img/IMG_20200811_092255 (2).jpg', 'diambil pembeli', 'Selesai'),
(12, 70, 3, 'yg bersangkutan', 'assets/img/IadsMG_20191218_135559 (2).jpg', 'Barang Sampai', 'Selesai'),
(13, 71, 6, 'yg bersangkutan', 'assets/img/IMG_20200811_092255 (2).jpg', 'barang sampai', 'Selesai'),
(14, 72, 3, 'yg bersangkutan', 'assets/img/da411f886e81c45d29d745ace4e38644.jpg', '-', 'Selesai'),
(15, 73, 2, 'yg bersangkutan', 'assets/img/IadsMG_20191218_135559 (2).jpg', 'barang sampai', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `idkurir` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `namakurir` varchar(80) NOT NULL,
  `kontakkurir` varchar(50) NOT NULL,
  `alamatkurir` text NOT NULL,
  `jkkurir` enum('0','1') NOT NULL,
  `layanan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`idkurir`, `username`, `password`, `namakurir`, `kontakkurir`, `alamatkurir`, `jkkurir`, `layanan`) VALUES
(2, 'syabani', 'syabani', 'Akhmad Syabani', '051178659932', 'Banjarmasin', '0', 'JNE'),
(3, 'ridwan', 'ridwan', 'Ridwan', '085369696664', 'Barabai', '0', 'J&T Express'),
(6, 'edo', 'edo', 'Edo', '082172337773', 'Martapura', '0', 'AnterAja');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(5) NOT NULL,
  `idbarang` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  `hargamasuk` float NOT NULL,
  `sumber` varchar(80) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tgl`, `jumlah`, `hargamasuk`, `sumber`, `catatan`) VALUES
(28, 30, '2022-06-05', 4, 100000, 'Paman Amin', '-'),
(29, 33, '2022-06-18', 50, 10000, 'Clara Boutique', '-'),
(30, 31, '2022-06-16', 3, 20000, 'Clara Boutique', '-'),
(31, 34, '2022-06-13', 10, 20000, 'Clara Boutique', '-'),
(32, 32, '2022-06-18', 2, 80000, 'ShalyChan', '-');

--
-- Triggers `masuk`
--
DELIMITER $$
CREATE TRIGGER `delete_masuk` AFTER DELETE ON `masuk` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok - OLD.jumlah
    WHERE idbarang = OLD.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_masuk` AFTER INSERT ON `masuk` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + NEW.jumlah
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_masuk` AFTER UPDATE ON `masuk` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - OLD.jumlah, 
                     stok = stok + NEW.jumlah 
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `idongkir` int(2) NOT NULL,
  `kota` varchar(80) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`idongkir`, `kota`, `tarif`) VALUES
(2, 'Banjarbaru', 15000),
(3, 'Barabai', 5000),
(4, 'Kotabaru', 17000),
(5, 'Banjarmasin', 20000),
(6, 'Marabahan', 25000),
(7, 'Kandangan', 20000),
(8, 'Martapura', 17000),
(9, 'Pelaihari', 18000),
(10, 'Batakan', 25000),
(11, 'Landasan Ulin', 10000),
(12, 'COD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `idpengeluaran` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`idpengeluaran`, `tgl`, `ket`, `total`) VALUES
(4, '2022-06-06', 'Bubble Warp', 20000),
(5, '2022-06-01', 'Paket Langganan XLHome 30mbps', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `idretur` int(5) NOT NULL,
  `idbarang` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alasan` text NOT NULL,
  `file` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`idretur`, `idbarang`, `id`, `waktu`, `alasan`, `file`, `status`) VALUES
(2, 33, 3, '2022-07-25 07:55:19', 'rusak', 'assets/img/da411f886e81c45d29d745ace4e38644.jpg', 'Diterima'),
(3, 30, 8, '2022-07-26 01:35:24', 'ban rusak, tidak bisa dipakai selayaknya', 'assets/img/da411f886e81c45d29d745ace4e38644.jpg', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `rusak`
--

CREATE TABLE `rusak` (
  `idrusak` int(5) NOT NULL,
  `idbarang` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  `hargarusak` float NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rusak`
--

INSERT INTO `rusak` (`idrusak`, `idbarang`, `tgl`, `jumlah`, `hargarusak`, `catatan`) VALUES
(2, 30, '2022-06-05', 2, 100000, 'Rusak Parah.');

--
-- Triggers `rusak`
--
DELIMITER $$
CREATE TRIGGER `gaRusak` AFTER DELETE ON `rusak` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok + OLD.jumlah
    WHERE idbarang = OLD.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jadiRusak` AFTER INSERT ON `rusak` FOR EACH ROW BEGIN 
	UPDATE barang SET stok = stok - NEW.jumlah
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahRusak` AFTER UPDATE ON `rusak` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + OLD.jumlah, 
                     stok = stok - NEW.jumlah 
    WHERE idbarang = NEW.idbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `idulasan` int(5) NOT NULL,
  `idbarang` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ulasannya` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`idulasan`, `idbarang`, `id`, `waktu`, `ulasannya`) VALUES
(1, 30, 2, '2022-06-19 01:11:33', 'mantap, barang ori, kurir ramah.'),
(2, 31, 6, '2022-06-19 01:34:05', 'makasih min. barang sampai '),
(4, 33, 2, '2022-07-26 01:24:09', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jk` enum('0','1') NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `alamat`, `telp`, `email`, `jk`, `level`) VALUES
(1, 'admin', 'admin', 'admin', '-', '-', '-', '0', 'admin'),
(2, 'wawan', 'wawan', 'wawan', 'komplek pangeran antasari no. 30', '6282152116441', 'yahoo@gmail.com', '0', 'pelanggan'),
(3, 'rudi', 'rudi', 'rudi', 'Gang Hijrah Raya, Muhibbin 4 Sekumpul', '08132912427', 'rudi@gmail.com', '0', 'pelanggan'),
(4, 'Amelia', 'amel', 'amel', 'Jl. Bunga Melati kota Banjarbaru', '08971441232', 'amelia666@gmail.com', '0', 'pelanggan'),
(6, 'Ikaza', 'ikaza', 'ikaza', 'Jl. Trikora Rt.32 Rw.5 Kode Pos 70721 Guntung Manggis', '082576119311', 'ikazapremium@gmail.co.id', '0', 'pelanggan'),
(7, 'zaskia', 'zaskia', 'zaskia', 'MTP', '08974321238', 'zaskiafayra777@yahoo.co.io', '0', 'reseller'),
(8, 'ridho', 'ridho', 'ridho', 'bjm', '43656454566', 'ahmad@gmail.com', '1', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`idbeli`),
  ADD KEY `id` (`id`),
  ADD KEY `idongkir` (`idongkir`);

--
-- Indexes for table `beliproduk`
--
ALTER TABLE `beliproduk`
  ADD PRIMARY KEY (`idbeliproduk`),
  ADD KEY `idbeli` (`idbeli`),
  ADD KEY `idtanam` (`idbarang`);

--
-- Indexes for table `flashsale`
--
ALTER TABLE `flashsale`
  ADD PRIMARY KEY (`idflash`),
  ADD KEY `idtanam` (`idbarang`);

--
-- Indexes for table `kirim`
--
ALTER TABLE `kirim`
  ADD PRIMARY KEY (`idkirim`),
  ADD KEY `idbeli` (`idbeli`),
  ADD KEY `idkurir` (`idkurir`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`idkurir`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`),
  ADD KEY `idtanam` (`idbarang`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`idongkir`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`idpengeluaran`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`idretur`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `rusak`
--
ALTER TABLE `rusak`
  ADD PRIMARY KEY (`idrusak`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`idulasan`),
  ADD KEY `idbeliproduk` (`idbarang`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `idbeli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `beliproduk`
--
ALTER TABLE `beliproduk`
  MODIFY `idbeliproduk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `flashsale`
--
ALTER TABLE `flashsale`
  MODIFY `idflash` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kirim`
--
ALTER TABLE `kirim`
  MODIFY `idkirim` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `idkurir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `idongkir` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `idpengeluaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `idretur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rusak`
--
ALTER TABLE `rusak`
  MODIFY `idrusak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `idulasan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beliproduk`
--
ALTER TABLE `beliproduk`
  ADD CONSTRAINT `beliproduk_ibfk_1` FOREIGN KEY (`idbeli`) REFERENCES `beli` (`idbeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flashsale`
--
ALTER TABLE `flashsale`
  ADD CONSTRAINT `flashsale_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kirim`
--
ALTER TABLE `kirim`
  ADD CONSTRAINT `kirim_ibfk_1` FOREIGN KEY (`idbeli`) REFERENCES `beli` (`idbeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kirim_ibfk_2` FOREIGN KEY (`idkurir`) REFERENCES `kurir` (`idkurir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `retur`
--
ALTER TABLE `retur`
  ADD CONSTRAINT `retur_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `retur_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rusak`
--
ALTER TABLE `rusak`
  ADD CONSTRAINT `rusak_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_ibfk_3` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
