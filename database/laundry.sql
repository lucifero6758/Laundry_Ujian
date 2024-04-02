-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 02:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_paket`, `qty`, `keterangan`, `harga_paket`, `total_harga`) VALUES
(1, 5, 3, 2, 'Cuci Bersih', 35000, 70000),
(2, 6, 2, 2, 'Cuci Bersih', 30000, 60000),
(3, 7, 10, 3, 'Cuci Bersih', 30000, 90000),
(4, 8, 12, 2, 'Cuci Bersih', 25000, 50000),
(5, 9, 15, 2, 'Cuci Bersih', 30000, 60000),
(6, 10, 13, 3, 'Cuci Bersih', 17000, 51000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(1, 'Tono Budiono', 'Jln Merdeka ', 'Laki-Laki', '12345670'),
(2, 'Morgan ', 'Jawa', 'Laki-Laki', '223456'),
(5, 'Gracio', 'Kupang', 'Laki-Laki', '23098765'),
(6, 'Lydia', 'Sumatra', 'Perempuan', '2345678'),
(8, 'Gracia', 'Bali', 'Perempuan', '0349853'),
(9, 'May ', 'Bali', 'Perempuan', '0958674');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama`, `alamat`, `tlp`) VALUES
(1, 'Spotless Laundry', 'Jalan Raya Dalung No.16, Denpasar, Bali', '(0361) 422796'),
(6, 'WashTime', 'Jalan Pedungan Indah, Denpasar, Bali', '0878-6136-2982'),
(8, 'Oxygen Laundry', 'Jalan Diponegoro, Denpasar, Bali', '0857-9813-2487'),
(10, 'WashCleaning', 'Jalan Raya Puputan Niti Mandala, Denpasar, Bali', '(0361) 244445');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(1, 1, 'bed_cover', 'Bed Cover S (Kecil)', 25000),
(2, 1, 'bed_cover', 'Bed Cover M (Sedang)', 30000),
(3, 1, 'bed_cover', 'Bed Cover L (Besar)', 35000),
(7, 6, 'kaos', 'Baju', 10000),
(8, 6, 'bed_cover', 'Bed Cover S (Kecil)', 15000),
(9, 6, 'bed_cover', 'Bed Cover L (Besar)', 35000),
(10, 1, 'lain', 'Bantal', 30000),
(11, 1, 'kiloan', 'Kebaya Setelan', 22000),
(12, 1, 'kiloan', 'Jas Setelan', 25000),
(13, 1, 'kiloan', 'Dress Panjang', 17000),
(14, 1, 'lain', 'Karpet Tebal', 30000),
(15, 1, 'lain', 'Boneka ', 30000),
(16, 1, 'lain', 'Tas', 40000),
(17, 6, 'lain', 'Tas', 30000),
(18, 8, 'kiloan', 'Kain', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` double NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`) VALUES
(5, 1, 'INV/2024/02/24/5', 6, '2024-02-24 10:48:40', '2024-02-27 10:48:40', '2024-02-24 03:49:25', 5000, 0, 0.0075, 'proses', 'dibayar', 4),
(6, 1, 'INV/2024/02/24/6', 5, '2024-02-24 11:12:23', '2024-02-27 11:12:23', '2024-02-24 04:12:58', 2000, 0, 0.0075, 'baru', 'dibayar', 4),
(7, 1, 'INV/2024/02/24/7', 1, '2024-02-24 11:15:48', '2024-02-27 11:15:48', '2024-02-24 04:16:45', 0, 0, 0.0075, 'diambil', 'dibayar', 4),
(8, 1, 'INV/2024/02/24/8', 2, '2024-02-24 11:20:56', '2024-02-27 11:20:56', '2024-02-24 04:21:28', 5000, 0, 0.0075, 'selesai', 'dibayar', 4),
(9, 1, 'INV/2024/02/24/9', 9, '2024-02-24 21:28:09', '2024-02-27 21:28:09', '0000-00-00 00:00:00', 5000, 0, 0.0075, 'proses', 'belum_dibayar', 4),
(10, 1, 'INV/2024/02/24/10', 8, '2024-02-24 21:29:41', '2024-02-27 21:29:41', '2024-02-24 14:30:13', 10000, 0, 0.0075, 'selesai', 'dibayar', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `id_outlet`, `role`) VALUES
(1, 'Endah Nuraini', 'Endah', '$2y$10$z1frQd1UeJfHJM64Fft9ju4xJLMg2xOcXqlrYF8oXCvqLA6sMNZnu', 1, 'kasir'),
(2, 'Kamal Najmudin', 'Kamal', '$2y$10$MXBAVojPSUK2caNkWOLtgOdAes7/Y.WN.MQ3q.b6NG.scVHWoUHvm', 1, 'admin'),
(3, 'Putra Adi', 'Putra', '$2y$10$RHnKJN835Kxdeez9MEv1duqScUj/TqUWknqqb099vZe61I6xVh6nC', 1, 'owner'),
(4, 'Admin Setyono', 'divo', '$2y$10$P7st1nUpOogpSlAhLfw0q.G4JUDjPm2stJMemFI9iV5889XLp4Idu', 1, 'admin'),
(5, 'Tono Sudibyo', 'Tono', '$2y$10$GrQjOnp8EasB.bDAmn/jTO72OftXNsT5g7sW8kmA/CP416/oPjMLO', 6, 'admin'),
(6, 'Kevin Sanjaya', 'owner', '$2y$10$hvn06LM7nfMGVwB47VFKaOpgShKXuwEx1HK1WWNWdR1PRb9gayBAO', 8, 'owner'),
(7, 'Jeremy Aditya', 'kasir', '$2y$10$pDGKf3vkjt2H3WJWnny7eOotYeF1dm3JmPFNmLa6liB7phAa43pVC', 6, 'kasir'),
(8, 'Benny Suteja', 'owner1', '$2y$10$g4doKSWfjpKwjhxhwshxT.Y3upE7awYufU5zNGAPDF4152vQ7W8LG', 1, 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `fk_transaksi_detail` (`id_transaksi`),
  ADD KEY `fk_paket_detail` (`id_paket`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `fk_outlet_paket` (`id_outlet`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_outlet_transaksi` (`id_outlet`),
  ADD KEY `fk_user_transaksi` (`id_user`),
  ADD KEY `fk_member_transaksi` (`id_member`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_outlet_user` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `fk_paket_detail` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`),
  ADD CONSTRAINT `fk_transaksi_detail` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`);

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `fk_outlet_paket` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_member_transaksi` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`),
  ADD CONSTRAINT `fk_outlet_transaksi` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`),
  ADD CONSTRAINT `fk_user_transaksi` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `fk_outlet_user` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
