-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 12:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_pertemuan_empat`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(7, 'Operator Pertemuan', 'opepertemuan', 'opepertemuan@gmail.com', '$2y$10$B.FuvVSJ8K14D3cxXp14EO16MfjS9Tt7kyCigeDqzRH3SRI0eoWEq', '2'),
(9, 'Operator Mahasiswa', 'opemahasiswa', 'opmahasiswa1@gmail.com', '$2y$10$i4An.2ZRFY9Nzei3LMMvWO1pDIq81L9cRVPHabP668qDlZtDyEe4W', '3'),
(14, 'ade', 'ade', 'ade@gmail.com', '$2y$10$I8Fh5NOgvv5r3XAy.CSiEuWym1TGuX2A1RZbO7/Qk4jrFsp1yict.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id_mahasiswa` int(10) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `semester`, `no_hp`, `email`, `foto`) VALUES
(2, 'Ika Purnama Sari', 'Informatika', 4, '082366239061', 'ika@gmail.com', '64930d702589c.jpg'),
(4, 'Muhammad Aldi', 'Informatika', 8, '083134479099', 'mhdaldii@gmail.com', '64930d999c29e.jpg'),
(5, 'Riska Amelia', 'Ilmu Komputer', 4, '085777316802', 'riskamelia@gmail.com', '64930dd68290f.jpg'),
(15, 'Muhammad Ilham', 'Sistem Informasi', 4, '083180846671', 'ilham@gmail.com', '649196e3e1618.jpg'),
(16, 'Ratu Ranya', 'Sistem Informasi', 8, '087590912231', 'ranya@gmail.com', '6491a427572b6.jpg'),
(18, 'Muhammad Farhan', 'Sistem Informasi', 6, '0821998995567', 'farhan@gmail.com', '6491a50f76f68.jpg'),
(19, 'Adelia Natasya', 'Informatika', 4, '089122345166', 'adel@gmail.com', '64930722baeef.jpg'),
(20, 'Baby Shakila', 'Ilmu Komputer', 6, '085677810799', 'kila@gmail.com', '6494022b2411c.jpg'),
(21, 'Nala Syakhiya ', 'Ilmu Komputer', 6, '082199816661', 'nala@gmail.com', '6494032ab83cd.jpg'),
(22, 'Muhammad Dzikri', 'Informatika', 4, '087755218844', 'dzikri@gmail.com', '64940421792b2.jpg'),
(23, 'Arkan Pratama', 'Informatika', 4, '089588013331', 'arkan@gmail.com', '649405892a149.jpg'),
(24, 'Teddy Citra ', 'Sistem Informasi', 4, '083855217077', 'citra@gmail.com', '649407666585b.jpg'),
(25, 'Alya Rahmadhani', 'Sistem Informasi', 6, '089144312066', 'alya@gmail.com', '649408454d928.jpg'),
(26, 'Raka Aditya', 'Informatika', 4, '085599893402', 'raka@gmail.com', '6494088f16925.jpg'),
(27, 'Ade Julia Sari', 'Informatika', 8, '085781239023', 'julia@gmail.com', '649408f2392b2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_pertemuan`
--

CREATE TABLE `data_pertemuan` (
  `id_data_pertemuan` int(11) NOT NULL,
  `judul_pertemuan` varchar(100) NOT NULL,
  `isi_pertemuan` varchar(225) NOT NULL,
  `waktu_pertemuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pertemuan`
--

INSERT INTO `data_pertemuan` (`id_data_pertemuan`, `judul_pertemuan`, `isi_pertemuan`, `waktu_pertemuan`) VALUES
(17, 'HTML', 'Membuat form HTML sederhana', '2023-03-25 13:56:00'),
(18, 'Bootstrap', 'Membuat form menggunakan bootstrap 5', '2023-04-01 14:01:00'),
(19, ' PHP', 'Pembahasan tentang tipe data pada bahasa pemrograman PHP', '2023-04-08 14:00:00'),
(20, 'Chart JS', 'MVC dengan template laravel breeze', '2023-05-27 14:03:00'),
(21, ' Project', 'Membangun aplikasi monitoring pendaftaran mahasiswa baru ', '2023-06-10 14:13:00'),
(22, 'Laravel', 'Penerapan MVC pada framework Laravel', '2023-05-20 14:15:00'),
(23, 'MySQL', 'Operasi CRUD dengan PHP dan MySQL', '2023-05-06 14:08:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `data_pertemuan`
--
ALTER TABLE `data_pertemuan`
  ADD PRIMARY KEY (`id_data_pertemuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id_mahasiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `data_pertemuan`
--
ALTER TABLE `data_pertemuan`
  MODIFY `id_data_pertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
