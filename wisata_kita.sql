-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2026 at 03:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata_kita`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `id` int NOT NULL,
  `nama_destinasi` varchar(100) DEFAULT NULL,
  `lokasi` varchar(150) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `fasilitas` text,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id`, `nama_destinasi`, `lokasi`, `harga`, `fasilitas`, `gambar`) VALUES
(1, 'Curug Malela', 'Rongga, Bandung Barat', 15000, 'Area Parkir, Warung Makan, Toilet Umum, Pemandu Wisata, Gazebo, Spot Foto', 'curug malela.jpg'),
(2, 'Orchid Forest Cikole', 'lembang, Bandung Barat', 40000, 'Area Parkir, Cafe & Resto, Toilet Umum, Playground, Spot Foto, Jembatan Gantung', 'Orchid Forest Cikole.jpg'),
(3, 'Lembang Park & Zoo\r\n', 'Lembang, Bandung Barat', 65000, 'Area Parkir, Restoran, Toilet, Tiket Terusan, Spot Foto Hewan, Wahana Bermain', 'Lembang Park & Zoo.webp'),
(4, 'Sanghyang Heuleut', 'Rajamandala, Bandung Barat', 20000, 'Pemandu Lokal, Sewa Pelampung, Warung Tradisional, Spot Foto Alam, Area Istirahat', 'Sanghyang Heuleut.webp'),
(5, 'Kawah Putih', 'Ciwidey, Bandung', 31000, 'Area Parkir, Mushola, Toilet Umum, Shuttle Bus (Ontang-Anting), Warung Wisata, Spot Foto', 'kawah putih.jpg'),
(6, 'Gunung Tangkuban Parahu', 'Lembang, Bandung Barat', 20000, 'Area Parkir Luas, Mushola, Toilet, Toko Souvenir, Warung Makan, Spot Foto Kawah', 'tangkuban parahu.webp'),
(7, 'The Great Asia Africa', 'Lembang, Bandung Barat', 40000, 'Miniatur Dunia, Kuliner Internasional, Toko Souvenir, Tempat Sewa Kostum, Toilet', 'The Great Asia Africa.webp'),
(8, 'Stone Garden Citatah', 'Cipatat, Bandung Barat', 20000, 'Area Parkir, Warung Logistik, Pemandu Wisata, Spot Foto Tebing, Toilet Umum', 'Stone Garden Citatah.webp');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `no` int NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`no`, `user`, `pass`) VALUES
(1, 'ncip@gmail.com', '123ncip'),
(2, 'nursipa', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
