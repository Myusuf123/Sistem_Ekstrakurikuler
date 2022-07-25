-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 05:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smansago`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_prestasi`
--

CREATE TABLE `data_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `ekskull_id` int(11) NOT NULL,
  `tgl_lomba` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_prestasi`
--

INSERT INTO `data_prestasi` (`id_prestasi`, `ekskull_id`, `tgl_lomba`, `deskripsi`) VALUES
(12, 16, '2022-05-23', 'Juara 1 Fotografi antar provinsi'),
(14, 16, '2022-05-31', 'menang fotografi'),
(15, 18, '2022-06-08', 'menang!!!!'),
(18, 16, '2022-07-12', 'mmmsssddd');

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id_ekskul` int(11) NOT NULL,
  `nip_g` varchar(16) NOT NULL,
  `nama_ekskul` varchar(50) NOT NULL,
  `tahunajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id_ekskul`, `nip_g`, `nama_ekskul`, `tahunajaran`) VALUES
(15, '1907051007', 'Seni Tari', '2022/2023'),
(16, '1907051018', 'Multimedia', '2022/2023'),
(17, '1907051034', 'Sepak Bola', '2022/2023'),
(18, '123456', 'Basket', '2022/2023'),
(20, '321', 'ekstrakurikuler baru', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(16) NOT NULL,
  `nama_g` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','pembina') DEFAULT NULL,
  `foto_g` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_g`, `nohp`, `password`, `level`, `foto_g`) VALUES
('123456', 'Rio Antoro', '222', 'e10adc3949ba59abbe56e057f20f883e', 'pembina', 'defaultt.png'),
('1907051001', 'muhammad yusuf', '085369067474', '850bd7bf75067f73b0b41a37a06809aa', 'admin', 'Muhammad_yusuf.jpg'),
('1907051007', 'Poppy Devi L', '08212322', '7ba09103999467a91a24a396961b43c0', 'pembina', 'defaultt.png'),
('1907051018', 'Veni Melinda', '434344', '3c175fbfa77eb35b619a2c8f4f32705d', 'pembina', 'defaultt.png'),
('1907051034', 'Ananto Danu Prasetyo', '08223211111', 'fe61d137d28e3a07ec376400f8c2065f', 'pembina', 'defaultt.png'),
('321', 'pembina baru', '12', 'caf1a3dfb505ffed0d024130f58c5cfa', 'pembina', 'defaultt.png');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_ekskull` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_ekskull`, `tgl`, `jam_mulai`, `jam_selesai`, `lokasi`, `deskripsi`) VALUES
(19, 15, '2022-05-30', '17:39:00', '18:39:00', 'GOR utama sekolah', 'latian tari lampung');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(15, 'IPA 4'),
(20, 'IPA 1'),
(21, 'IPA 3'),
(22, 'IPA 5'),
(23, 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nis_s` int(11) NOT NULL,
  `ekskul_id` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `jabatan` enum('Ketua','Anggota') DEFAULT NULL,
  `status` enum('Diproses','Diterima','Ditolak','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nis_s`, `ekskul_id`, `tgl_daftar`, `jabatan`, `status`) VALUES
(704, 1907051009, 18, '2022-06-02', 'Anggota', 'Diterima'),
(711, 1914151010, 16, '2022-05-23', 'Anggota', 'Diterima'),
(713, 1914151076, 18, '2022-05-23', 'Anggota', 'Diproses'),
(716, 1914151076, 16, '2022-06-13', 'Anggota', 'Diterima'),
(717, 1914151076, 17, '2022-06-13', 'Anggota', 'Diproses'),
(718, 1907051029, 17, '2022-06-15', 'Anggota', 'Diterima'),
(719, 1907051029, 16, '2022-06-20', 'Anggota', 'Selesai'),
(720, 432, 16, '2022-06-29', 'Anggota', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `kelas` enum('10','11','12') DEFAULT NULL,
  `gender` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `password`, `no_telp`, `kelas`, `gender`, `foto`, `jurusan_id`) VALUES
(123, 'anisa arum ningtias', '202cb962ac59075b964b07152d234b70', '', '11', '', 'defaultt.png', 15),
(432, 'siswa baru', '248e844336797ec98478f85e7626de4a', NULL, '11', NULL, 'defaultt.png', 23),
(1907051009, 'M Tazmir Fadel', 'ac70299822154215ddcae5eba177183b', NULL, '12', NULL, 'defaultt.png', 20),
(1907051029, 'Faris Ubad Al', '9ffda48a97e9d3d1a68ee7eaf5ee55d0', '', '10', '', 'defaultt.png', 15),
(1914151010, 'Pangestu Prasetyo', '0f11a31157e3b0f376f15ec1ba6ea6c8', '0982823344', '11', 'Laki-Laki', 'defaultt.png', 15),
(1914151076, 'Aditya Prima Yudha', '018e5212affa84ea492869d41ec3172b', NULL, '10', NULL, 'defaultt.png', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_prestasi`
--
ALTER TABLE `data_prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `ekskull_id` (`ekskull_id`);

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id_ekskul`),
  ADD KEY `nip_g` (`nip_g`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_ekskull` (`id_ekskull`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `nis_s` (`nis_s`),
  ADD KEY `ekskul_id` (`ekskul_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_prestasi`
--
ALTER TABLE `data_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id_ekskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=721;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_prestasi`
--
ALTER TABLE `data_prestasi`
  ADD CONSTRAINT `data_prestasi_ibfk_1` FOREIGN KEY (`ekskull_id`) REFERENCES `ekskul` (`id_ekskul`);

--
-- Constraints for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD CONSTRAINT `ekskul_ibfk_1` FOREIGN KEY (`nip_g`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_ekskull`) REFERENCES `ekskul` (`id_ekskul`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`nis_s`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`ekskul_id`) REFERENCES `ekskul` (`id_ekskul`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
