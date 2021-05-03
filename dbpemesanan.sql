-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 10:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpemesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal_pemesanan`, `total_belanja`) VALUES
(13, '2020-12-25', 850000),
(14, '2021-03-15', 325000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id_pemesanan_produk` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan_produk`
--

INSERT INTO `pemesanan_produk` (`id_pemesanan_produk`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(15, 13, 13, 1),
(16, 13, 22, 1),
(17, 14, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `ulasan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `nama_menu`, `nama_lengkap`, `ulasan`) VALUES
(7, 'Printed T-Shirt', 'Shendy', 'Kaosnya bagus banget, bahannya tebel nyaman dipakai, sesuai dengan harga. Terimakasih LYN STORE. Nanti bakal re-purchase disini lagi deh hihihi!! '),
(9, 'Hooded Top', 'Lala', 'Super cute banget warnanya, suka banget !!! pengirimannya juga cepet'),
(10, 'Converse Chuck Taylor 70', 'Yeny', 'Makasi LYN Store, barangnya sudah sampai:)'),
(11, 'Nike Air Jordan 1 Low', 'Baskoro', 'Tidak menyesal membeli sepatu disini ! Bagus '),
(12, 'Stripe T-Shirt', 'Rizal', 'Menarik, saya suka karena cepat datang!');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_menu`, `nama_menu`, `jenis_menu`, `stock`, `harga`, `gambar`) VALUES
(12, 'Printed T-Shirt', '', 10, 200000, 'Printed T-Shirt.jpg'),
(13, 'Fitted Turtleneck', '', 5, 250000, 'Fitted Turtleneck.jpg'),
(14, 'Hooded Top', 'Kaos', 25, 325000, 'Hooded Top.jpg'),
(15, 'Knitted Jumper', 'Kaos', 7, 260000, 'Knitted Jumper.jpg'),
(16, 'Oversized Hoodie', 'Kaos', 17, 355000, 'Oversized Hoodie.jpg'),
(17, 'Printed T-Shirt X JB', '', 18, 150000, 'Printed T-Shirt X JB.jpg'),
(18, 'Short Sweatshirt', 'Kaos', 8, 345000, 'Short Sweatshirt.jpg'),
(19, 'Stripe T-Shirt', 'Kaos', 19, 220000, 'Stripe T-Shirt.jpg'),
(20, 'Converse Casual White', '', 7, 580000, 'Converse Casual White.jpg'),
(21, 'Converse WhiteCarbon', 'Sepatu', 5, 840000, 'Converse WhiteCarbon.jpg'),
(22, 'Converse Chuck Taylor', 'Sepatu', 10, 600000, 'Converse Chuck Taylor.jpg'),
(23, 'Converse Chuck Taylor 70', '', 10, 710000, 'Converse Chuck Taylor 70.jpg'),
(24, 'Nike Air Force 1 07', 'Sepatu', 5, 1600000, 'Nike Air Force 1 07.jpg'),
(25, 'Nike Air Jordan 1 Low', 'Sepatu', 7, 1700000, 'Nike Air Jordan 1 Low.jpg'),
(26, 'Nike Blazer Mid 77', '', 3, 2100000, 'Nike Blazer Mid 77.jpg'),
(27, 'Nike Jordan Mars 270', '', 4, 2350000, 'Nike Jordan Mars 270.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `status` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `hp`, `status`) VALUES
(1, 'lutfi', 'cdb0b6889f4def26f43951b2d5b7a9e3', 'nur aini lutfiyah', 'perempuan', '2020-12-01', 'malang', '517189290', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'Laki-Laki', '2020-12-02', 'Jl. Sigura-gura gg. 1 , Kota Malang', '0876545342', 'user'),
(3, 'indres', '924189d7242a506fc0220543c494aa6f', 'user2', 'Laki-Laki', '2020-12-02', 'Jl. Ijen, Kota Malang', '08976875345', 'user'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Laki-Laki', '2020-12-23', 'Jl. Ijen, Kota Malang', '0876568799', 'admin'),
(6, 'ikhwan', '9ec631cd57a8756e85641ecbb3ffc000', 'M. Ikhwanuddin', 'Laki-Laki', '2020-12-03', 'Jl. Soekarno-Hatta, Kota Malang', '082232440739', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `nama_menu` (`nama_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nama_lengkap` (`nama_lengkap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id_pemesanan_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD CONSTRAINT `pemesanan_produk_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `produk` (`id_menu`),
  ADD CONSTRAINT `pemesanan_produk_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
