-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 01:06 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_pasien`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `id_pasien`, `id_dokter`, `tgl_periksa`, `no_antrian`, `status`) VALUES
(1, 3, 3, '2021-09-29', 1, 'tunggu'),
(2, 2, 3, '2021-09-29', 2, 'tunggu'),
(3, 1, 3, '2021-09-29', 3, 'tunggu'),
(10, 5, 3, '2021-09-29', 4, 'tunggu'),
(12, 2, 3, '2021-09-30', 1, 'periksa'),
(13, 7, 3, '2021-09-30', 2, 'periksa'),
(14, 8, 3, '2021-09-30', 3, 'periksa'),
(15, 4, 3, '2021-09-30', 4, 'tunggu'),
(16, 5, 3, '2021-09-30', 5, 'tunggu'),
(17, 9, 3, '2021-09-30', 6, 'tunggu');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `poli` varchar(15) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `poli`, `no_telp`) VALUES
(1, 'Dr. Salsabila ', 'Umum', '0822564564'),
(2, 'Dr. Naomi', 'Mata', '08765765'),
(3, 'Dr Raisa', 'Gigi', '0855453667');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `password`) VALUES
(1, 'salsa', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(1, 'Salsabila Daranti', '2004-08-22', 'P', 'Kp. Cibedug kulon', '0822564564'),
(2, 'Nayanda D.A', '2014-09-24', 'P', 'Kp. Cibedug kulon', '0831766767'),
(3, 'Aldebaran', '2000-08-09', 'L', 'Kp. Cibedug kidul', '0855453667'),
(4, 'Renata', '2003-05-21', 'P', 'Jl. Aceh 32', '08326575765'),
(5, 'Reina', '2003-05-21', 'P', 'Jl. Radio 13', '0822564654'),
(6, 'Joko', '2003-05-21', 'L', 'Jl. Riau 13', '08326575765'),
(7, 'Risma', '2000-05-19', 'P', 'Jl. Radio 13', '0822564637'),
(8, 'Salsabila', '2000-05-19', 'P', 'Jl. Riau 13', '0822564637'),
(9, 'Salsabila', '2000-05-19', 'P', '500', '0822564637');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`),
  ADD CONSTRAINT `antrian_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
