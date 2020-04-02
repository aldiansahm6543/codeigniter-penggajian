-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2020 pada 03.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan_gaji`
--

CREATE TABLE `aturan_gaji` (
  `id` int(11) NOT NULL,
  `kode_jabatan` varchar(15) NOT NULL,
  `masa_kerja_jabatan` varchar(55) NOT NULL,
  `insentif` varchar(55) NOT NULL,
  `bonus` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aturan_gaji`
--

INSERT INTO `aturan_gaji` (`id`, `kode_jabatan`, `masa_kerja_jabatan`, `insentif`, `bonus`) VALUES
(2, 'J003', '11', '150000', '100000'),
(3, 'J002', '12', '200000', '150000'),
(5, 'J002', '8', '80000', '100000'),
(6, 'J005', '12', '100000', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `kode_penggajian` varchar(15) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_karyawan` varchar(55) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`kode_penggajian`, `nip`, `nama_karyawan`, `tanggal_penerimaan`, `nominal`) VALUES
('P001', '9876567898765', 'Anjariani', '2020-03-31', 4500000),
('P002', '098765432123456', 'anggoro seto', '2020-03-31', 2350000),
('P003', '9876678998766789', 'Nur Adiansyah', '2020-03-30', 4000000),
('P004', '9876678998766789', 'Nur Adiansyah', '2020-03-31', 4000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` varchar(15) NOT NULL,
  `jabatan` varchar(55) NOT NULL,
  `standar_gaji` varchar(55) NOT NULL,
  `keterangan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `jabatan`, `standar_gaji`, `keterangan`) VALUES
('J001', 'karyawan', '2000000', 'operator'),
('J002', 'supervisor', '6000000', 'pengawas'),
('J003', 'stafff', '4000000', 'operatorr'),
('J004', 'admin', '4000000', 'admin'),
('J005', 'Personalia ', '7000000', 'personalia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `kode_jabatan` varchar(55) NOT NULL,
  `masa_kerja` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `jenis_kelamin`, `tgl_lahir`, `telp`, `email`, `alamat`, `kode_jabatan`, `masa_kerja`) VALUES
('098765432123456', 'anggoro seto', 'laki-laki', '2020-03-25', '08767776', 'seto@gmail.com', 'depok', 'J001', '14'),
('0989878978', 'rido ilahi', 'laki-laki', '2020-03-11', '08128273743', 'aldiansyahh03m@gmail.com', 'depok', 'J005', '24'),
('8786765675687', 'rina dian', 'perempuan', '2020-03-26', '08767776', 'rina@gmail.com', 'citayem', 'J002', '7'),
('9876567898765', 'Anjariani', 'perempuan', '2020-03-03', '08767776', 'aldiansyahh01m@gmail.com', 'depok', 'J002', '10'),
('9876678998766789', 'Nur Adiansyah', 'laki-laki', '2002-03-01', '0892787248', 'dian@gmail.com', 'Bogor', 'J003', '8');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aturan_gaji`
--
ALTER TABLE `aturan_gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_jabatan` (`kode_jabatan`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`kode_penggajian`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kode_jabatan` (`kode_jabatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturan_gaji`
--
ALTER TABLE `aturan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aturan_gaji`
--
ALTER TABLE `aturan_gaji`
  ADD CONSTRAINT `aturan_gaji_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`);

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`kode_jabatan`) REFERENCES `jabatan` (`kode_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
