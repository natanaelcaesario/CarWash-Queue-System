-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 02:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `id_motor` int(11) NOT NULL,
  `nama_motor` varchar(36) NOT NULL,
  `plat_motor` varchar(10) NOT NULL,
  `harga_sewa` int(36) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gambar_motor` varchar(80) NOT NULL,
  `status` varchar(36) NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motor`
--

INSERT INTO `motor` (`id_motor`, `nama_motor`, `plat_motor`, `harga_sewa`, `deskripsi`, `gambar_motor`, `status`) VALUES
(2, 'Honda Beat FI', 'AB 8321 GT', 70000, 'Tahun 2018', '1610526843_9636c8ed355dbaf18529.jpg', 'Tersedia'),
(3, 'Yamaha Nmax (New)', 'AB 1234 CD', 125000, 'Tahun 2018', '1610544594_9f3471504a4f1ae9460b.jpg', 'Tersedia'),
(4, 'Vario 150', 'AB 8301 VT', 90000, 'Tahun 2017', '1610527138_7ba91ef4546ec2b3362a.jpeg', 'Tersedia'),
(5, 'Scoopy  Blue', 'AB 9987 OP', 90000, 'Tahun 2018', '1610545243_179ed361213a4fb5d8ab.jpg', 'Tersedia'),
(6, 'Yamaha Mio', 'AB 9945 GT', 60000, 'Tahun 2016', '1610545313_43d0bcb89c5dc5f5db65.jpeg', 'Tersedia'),
(7, 'Honda Genio', 'AB 6498 KI', 75000, 'Tahun 2016', '1610545600_49386b3397adb4c86b54.jpeg', 'Tersedia'),
(8, 'Yamaha Fino', 'AB 3907 IR', 80000, 'Tahun 2017', '1610550217_c1451bc868e853babc00.jpg', 'Tersedia'),
(9, 'Beat Street', 'AB 8754 BV', 60000, 'Tahun 2017', '1610553240_c2a3f0a744c8fa2bc652.jpg', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(36) NOT NULL,
  `nomorhandphone` varchar(36) NOT NULL,
  `email` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL,
  `gambar` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `nomorhandphone`, `email`, `password`, `gambar`) VALUES
(1, 'Juwita', '082153466898', 'juwita@gmail.com', 'juwita123', '1610527923_398b0fa05a5296e02bb6.jpg'),
(2, 'Arnaldo Purba', '081393994829', 'arnaldo@gmail.com', 'arnaldo123', '1610547093_6fa5bfdf7c2c00effdfd.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_motor` int(15) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama` varchar(36) NOT NULL,
  `motor` varchar(36) NOT NULL,
  `lokasi_jemput` varchar(36) NOT NULL,
  `nomorhandphone` varchar(36) NOT NULL,
  `tglsewa` date NOT NULL,
  `tglkembali` date NOT NULL,
  `kode_booking` varchar(20) NOT NULL,
  `plat_motor` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Belum Lunas',
  `bukti_bayar` varchar(36) DEFAULT NULL,
  `bank` varchar(36) NOT NULL,
  `harga` varchar(36) NOT NULL,
  `denda` int(15) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggaltransaksi` datetime NOT NULL DEFAULT current_timestamp(),
  `deadline` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_motor`, `id_pengguna`, `id_admin`, `nama`, `motor`, `lokasi_jemput`, `nomorhandphone`, `tglsewa`, `tglkembali`, `kode_booking`, `plat_motor`, `status`, `bukti_bayar`, `bank`, `harga`, `denda`, `keterangan`, `tanggaltransaksi`, `deadline`) VALUES
(5, 1, 1, 1, 'Juwita', 'Beat Street', 'Malioboro', '082153466898', '2021-01-14', '2021-01-15', '06WaAJGR', 'AB 8754 BV', 'Diterima', '1610551782_f220c1b4b1ee637cad2d.jpg', 'Bank Mandiri', '90000', 0, 'tidak ada denda', '2021-01-13 22:28:58', '2021-01-14 01:28:43'),
(7, 4, 1, 2, 'Juwita', 'Vario 150', 'St. Tugu', '082153466898', '2021-01-15', '2021-01-16', 'n6RmXVBs', 'AB 8301 VT', 'Diterima', '1610582201_b5e58780bb09d9d116d2.jpg', 'Bank BCA', '90000', 25000, 'Ban Motor Bocor', '2021-01-14 06:54:40', '2021-01-14 08:54:29'),
(9, 4, 2, 1, 'Arnaldo Purba', 'Vario 150', 'St. Tugu', '081393994829', '2021-01-16', '2021-01-17', 'S2wO7uZL', 'AB 8301 VT', 'Diterima', '1610583914_07345cbb18c84fc16fef.jpg', 'Lainnya', '90000', 0, 'tidak ada denda', '2021-01-14 07:24:50', '2021-01-14 10:24:39'),
(10, 2, 2, 1, 'Arnaldo Purba', 'Honda Beat FI', 'Malioboro', '081393994829', '2021-01-14', '2021-01-15', 'WGs3Vbvo', 'AB 8321 GT', 'Diterima', '1610602299_079434c9b474017fc286.jpg', 'Bank Mandiri', '70000', 0, 'tidak ada denda', '2021-01-14 12:30:38', '2021-01-14 15:30:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `id_motor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
