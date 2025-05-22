-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 04:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abrfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nokartu` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_istirahat` time NOT NULL,
  `jam_kembali` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nokartu`, `tanggal`, `jam_masuk`, `jam_istirahat`, `jam_kembali`, `jam_pulang`) VALUES
(147, '2147483647', '2025-01-20', '09:21:22', '09:21:39', '09:28:30', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `antriloketb`
--

CREATE TABLE `antriloketb` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `antriloketb`
--

INSERT INTO `antriloketb` (`id`, `nama`, `tujuan`, `jam`, `tanggal`) VALUES
(8, 'Upin', 'Belakang Padang - Sekupang', '10:08:26', '10/3/2025'),
(9, 'Ipin', 'Belakang Padang - Sekupang', '8:38:38', '11/3/2025');

-- --------------------------------------------------------

--
-- Table structure for table `antriloketp`
--

CREATE TABLE `antriloketp` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `antriloketp`
--

INSERT INTO `antriloketp` (`id`, `nama`, `tujuan`, `jam`, `tanggal`) VALUES
(5, 'Ipin', 'Belakang Padang - Sekupang', '2:29:25', '7/3/2025');

-- --------------------------------------------------------

--
-- Table structure for table `islogin`
--

CREATE TABLE `islogin` (
  `login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `islogin`
--

INSERT INTO `islogin` (`login`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `noktp` int(50) NOT NULL,
  `nokartu` varchar(30) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenkel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `noktp`, `nokartu`, `ttl`, `nama`, `alamat`, `jenkel`) VALUES
(33, 0, '1791662652', '', 'Udin', 'eefrg', 'Laki - Laki'),
(34, 0, '1152417615', '', 'Upin', 'EFGH', ''),
(35, 0, '2147483647', '', 'Ipin', 'IJKL', ''),
(41, 21345, '', 'ada, 2025-02-23', 'dada', '213', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `loketbatam`
--

CREATE TABLE `loketbatam` (
  `pengemudi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loketbatam`
--

INSERT INTO `loketbatam` (`pengemudi`) VALUES
('Ipin');

-- --------------------------------------------------------

--
-- Table structure for table `loketblp`
--

CREATE TABLE `loketblp` (
  `pengemudi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loketblp`
--

INSERT INTO `loketblp` (`pengemudi`) VALUES
('Ipin'),
('Ipin'),
('Ipin');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_tiket` int(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(255) NOT NULL,
  `pengemudi` varchar(255) NOT NULL,
  `pelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_tiket`, `tujuan`, `tanggal`, `harga`, `pengemudi`, `pelanggan`) VALUES
(17, 'Sekupang - Belakang Padang', '2025-02-27', 12, 'Upin', 'Sigma'),
(155, 'Sekupang - Belakang Padang', '2025-02-02', 30000, 'Udin', 'Sigma'),
(187, 'Sekupang - Belakang Padang', '2025-03-08', 345, 'Udin', 'Sigma2');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_backup`
--

CREATE TABLE `pemesanan_backup` (
  `id_tiket` int(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` varchar(255) NOT NULL,
  `pengemudi` varchar(255) NOT NULL,
  `pelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `foto`) VALUES
(100001, 'da', 'WIN_20241126_13_14_33_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `mode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`mode`) VALUES
(4);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `nama` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`nama`, `image_path`) VALUES
('Udin', 'ho.jpg'),
('Upin', 'pas foto.png'),
('ipin', 'pngwing.com (12).png'),
('', 'youtube.png');

-- --------------------------------------------------------

--
-- Table structure for table `tmprfid`
--

CREATE TABLE `tmprfid` (
  `nokartu` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nokartu` (`nokartu`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `antriloketb`
--
ALTER TABLE `antriloketb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antriloketp`
--
ALTER TABLE `antriloketp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `islogin`
--
ALTER TABLE `islogin`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loketbatam`
--
ALTER TABLE `loketbatam`
  ADD PRIMARY KEY (`pengemudi`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_tiket`),
  ADD UNIQUE KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `pemesanan_backup`
--
ALTER TABLE `pemesanan_backup`
  ADD PRIMARY KEY (`id_tiket`),
  ADD UNIQUE KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`mode`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD UNIQUE KEY `image_path` (`image_path`);

--
-- Indexes for table `tmprfid`
--
ALTER TABLE `tmprfid`
  ADD PRIMARY KEY (`nokartu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `antriloketb`
--
ALTER TABLE `antriloketb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `antriloketp`
--
ALTER TABLE `antriloketp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
