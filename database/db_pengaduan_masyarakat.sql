-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 07:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `jenis_aspirasi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelapor` varchar(600) NOT NULL,
  `alamat` varchar(600) NOT NULL,
  `keluhan` varchar(600) NOT NULL,
  `bukti` varchar(600) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggapan` varchar(600) NOT NULL,
  `feedback` varchar(600) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_penduduk` varchar(16) NOT NULL,
  `bukti_admin` varchar(255) NOT NULL,
  `tanggal_pengerjaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `jenis_aspirasi`, `tanggal`, `id_pelapor`, `alamat`, `keluhan`, `bukti`, `status`, `tanggapan`, `feedback`, `date`, `id_penduduk`, `bukti_admin`, `tanggal_pengerjaan`) VALUES
(22, 'Kebersihan', '2022-11-15', 'P001', 'jl mandor husen', 'banjir di jl mandor husen', 'fxfjm7xi.png', 'Selesai', 'Selokan di jalan tersebut sudah di perbaiki. Terimakasih atas Aspirasinya', 'Sangat Baik', '2022-11-15 04:18:52', '1234567891234567', 'charts2.png', '2022-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `input_aspirasi`
--

CREATE TABLE `input_aspirasi` (
  `id_pelapor` varchar(600) NOT NULL,
  `id_penduduk` varchar(16) NOT NULL,
  `jenis_aspirasi` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(600) NOT NULL,
  `keluhan` varchar(600) NOT NULL,
  `bukti` varchar(600) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggapan` varchar(600) NOT NULL,
  `bukti_admin` varchar(255) NOT NULL,
  `tanggal_pengerjaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `input_aspirasi`
--

INSERT INTO `input_aspirasi` (`id_pelapor`, `id_penduduk`, `jenis_aspirasi`, `tanggal`, `alamat`, `keluhan`, `bukti`, `status`, `tanggapan`, `bukti_admin`, `tanggal_pengerjaan`) VALUES
('P001', '1234567891234567', 'Kebersihan', '2022-11-15', 'jl mandor husen', 'banjir di jl mandor husen', 'fxfjm7xi.png', 'Selesai', 'Selokan di jalan tersebut sudah di perbaiki. Terimakasih atas Aspirasinya', 'charts2.png', '2022-11-20'),
('P002', '1234567891234567', 'Keamanan', '2022-11-14', 'kebon jeruk', 'kehilangan motor', 'man.png', 'Waiting', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nama`, `alamat`) VALUES
('1234564789012345', 'Bambang Prasetyo', 'kp pangkalan'),
('1234567891234567', 'Fachrul Rozi', 'Kp.pangkalan');

-- --------------------------------------------------------

--
-- Table structure for table `status_aspirasi`
--

CREATE TABLE `status_aspirasi` (
  `id_pelapor` varchar(600) NOT NULL,
  `status` varchar(100) NOT NULL,
  `feedback` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_aspirasi`
--

INSERT INTO `status_aspirasi` (`id_pelapor`, `status`, `feedback`) VALUES
('P001', 'Selesai', 'Sangat Baik'),
('P002', 'Waiting', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  ADD PRIMARY KEY (`id_pelapor`),
  ADD KEY `fk_aspirasi` (`id_penduduk`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `status_aspirasi`
--
ALTER TABLE `status_aspirasi`
  ADD PRIMARY KEY (`id_pelapor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `input_aspirasi`
--
ALTER TABLE `input_aspirasi`
  ADD CONSTRAINT `fk_aspirasi` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`);

--
-- Constraints for table `status_aspirasi`
--
ALTER TABLE `status_aspirasi`
  ADD CONSTRAINT `fk_lapor` FOREIGN KEY (`id_pelapor`) REFERENCES `input_aspirasi` (`id_pelapor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
