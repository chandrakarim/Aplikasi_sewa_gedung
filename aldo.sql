-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 01:52 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aldo`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_hakakses`
--

CREATE TABLE `m_hakakses` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `akun` varchar(10) NOT NULL,
  `kunci` varchar(10) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_hakakses`
--

INSERT INTO `m_hakakses` (`id`, `nama`, `akun`, `kunci`, `akses`) VALUES
(1, 'Ronaldo', 'aldo', 'aldo', 'admin'),
(2, 'Lingga HA', 'ling', 'ling', 'root'),
(3, 'abe', 'abe', '12345', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `m_paket`
--

CREATE TABLE `m_paket` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kapasitas` varchar(10) NOT NULL,
  `listrik` varchar(10) NOT NULL,
  `fasilitas` text NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_paket`
--

INSERT INTO `m_paket` (`id`, `kode`, `nama`, `kapasitas`, `listrik`, `fasilitas`, `harga`) VALUES
(68, 'PS01', 'Paket A', '500', '1200', 'Full Ac,Catring & Sound system', '15000000'),
(71, 'PS02', 'Paket B', '500', '1200', 'full Ac,Sound system & Catring', '10000000'),
(72, 'PS03', 'Paket C', '500', '1200', 'full Ac,Sound system & Catring', '40000000'),
(73, 'PS04', 'Paket D', '500', '1200', 'Full Ac& Catring', '7000000'),
(74, 'PS05', 'Paket E', '88', '1200', 'Full Ac,Sound System', '8000000'),
(75, 'PS06', 'Paket F', '500', '1200', 'yuyuy', '777778777'),
(76, 'PS07', 'Paket G', '900', '5544', 'gjgjgj hkktk kykyt', '8000000');

-- --------------------------------------------------------

--
-- Table structure for table `m_paket_foto`
--

CREATE TABLE `m_paket_foto` (
  `id` int(11) NOT NULL,
  `id_m_paket` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bank`
--

CREATE TABLE `t_bank` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_rek` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_bank`
--

INSERT INTO `t_bank` (`id`, `kode`, `bank`, `nama`, `no_rek`) VALUES
(6, 'B0001', 'BNI', 'Arya Nugraha', 2147483647),
(7, 'B0002', 'BRI', 'pisang goreng', 2147483647),
(8, 'B0003', 'Mandiri', 'Keladi', 929222023);

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jk` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `imel` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `kunci` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id`, `tgl_daftar`, `ktp`, `nama`, `jk`, `alamat`, `imel`, `telp`, `kunci`) VALUES
(2, '2020-03-01', '1234567890123357', 'Intan Anugerah', '', 'Jekardah', 'intan@gmail.com', '123123123', '123456'),
(3, '2020-02-21', '1234123412341234', 'Daisy', '', 'Klaten', 'daisy@gmail.com', '09898929839', '123456'),
(4, '2020-01-01', '1234567890123457', 'Inul Daratista S', '', 'Jekardah', 'inul@dara.tista', '123123123', '123456'),
(5, '2020-01-01', '1234123412341234', 'Agus S', '', 'Klaten', 'daisy@gmail.com', '09898929839', '123456'),
(6, '2020-03-02', '0234567890123456', 'Gibul', '', 'Klaten', 'asdfasdf@aasdfsadf.sdfa', '423424234234', 'asd'),
(7, '2020-08-01', '3333333333333333', 'batik ku', '', 'janti baru', 'batiku@gmail.com', '452435236', '123456'),
(9, '2020-08-06', '88', 'uuu', '', 'oooo', 'ppi@gmail', '666', '4555'),
(10, '2020-08-09', '9999999999999999', 'Aldo Bareto', '', 'jl.janti', 'Aldo@gmail.com', '0895633444', '123456'),
(11, '2020-08-11', '555', 'ui', 'Laki-Laki', 'jl bambu', 'ui@gmail.com', '8686865', '123456'),
(12, '2020-08-11', '90000', 'lia', 'Perempuan', 'jl bambu', 'lia@gmail.com', '0999', '123456'),
(13, '2020-08-13', '777', 'oji', 'Laki-Laki', 'jl.magelang', 'oji@gmail.com', '123456', '123456'),
(14, '2020-08-20', '99889876', 'citra ayu', 'Perempuan', 'jl.bajo', 'citra@gmail.com', '786655667', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `id_t_pemesanan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `cara` varchar(10) NOT NULL,
  `rekening` varchar(25) NOT NULL,
  `bank` varchar(25) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE `t_pemesanan` (
  `id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deposit` int(12) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `id_t_pelanggan` int(11) NOT NULL,
  `id_m_paket` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(5) NOT NULL,
  `orang` varchar(10) NOT NULL,
  `id_t_bank` int(11) DEFAULT NULL,
  `setuju` varchar(6) DEFAULT NULL,
  `metode` enum('cash','transfer') DEFAULT NULL,
  `bukti` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`id`, `kode`, `nama`, `deposit`, `tgl_pesan`, `id_t_pelanggan`, `id_m_paket`, `tanggal`, `jam`, `orang`, `id_t_bank`, `setuju`, `metode`, `bukti`) VALUES
(325, 'P0001', 'tr', 70000000, '2020-09-17', 10, 68, '2020-09-20', '18:28', '112', NULL, NULL, NULL, NULL),
(326, 'P0002', 'qw', 1000000, '2020-09-17', 11, 71, '2020-09-20', '17:00', '334', NULL, NULL, NULL, NULL),
(327, 'P0003', 'lo', 1000000, '2020-09-17', 10, 68, '2020-09-20', '17:31', '555', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_hakakses`
--
ALTER TABLE `m_hakakses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_paket`
--
ALTER TABLE `m_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_paket_foto`
--
ALTER TABLE `m_paket_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_paket_foto_ibfk_1` (`id_m_paket`);

--
-- Indexes for table `t_bank`
--
ALTER TABLE `t_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_pembayaran_ibfk_1` (`id_t_pemesanan`);

--
-- Indexes for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `id_m_paket` (`id_m_paket`),
  ADD KEY `id_t_pelanggan` (`id_t_pelanggan`),
  ADD KEY `id_bank` (`id_t_bank`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_hakakses`
--
ALTER TABLE `m_hakakses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_paket`
--
ALTER TABLE `m_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `m_paket_foto`
--
ALTER TABLE `m_paket_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_bank`
--
ALTER TABLE `t_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_paket_foto`
--
ALTER TABLE `m_paket_foto`
  ADD CONSTRAINT `m_paket_foto_ibfk_1` FOREIGN KEY (`id_m_paket`) REFERENCES `m_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD CONSTRAINT `t_pembayaran_ibfk_1` FOREIGN KEY (`id_t_pemesanan`) REFERENCES `t_pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD CONSTRAINT `t_pemesanan_ibfk_1` FOREIGN KEY (`id_m_paket`) REFERENCES `m_paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_pemesanan_ibfk_2` FOREIGN KEY (`id_t_pelanggan`) REFERENCES `t_pelanggan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
