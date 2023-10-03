-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Okt 2023 pada 10.50
-- Versi server: 8.0.30
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_crud_jquery_ajax`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` varchar(8) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `whatsapp` varchar(13) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `tanggal_daftar`, `kelas`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `email`, `whatsapp`, `foto_profil`) VALUES
('ID-00001', '2023-10-01', 'Web Development', 'Indra Styawantoro', 'Laki-laki', 'Tanjung Karang, Kota Bandar Lampung, Lampung', 'indra.styawantoro@gmail.com', '081377783334', '81d1a3b0910a41d02e2537c5e87613593456131c.jpg'),
('ID-00002', '2023-10-03', 'Web Design', 'Lindsay Spice', 'Perempuan', 'Kedaton, Kota Bandar Lampung, Lampung', 'lindsay.spice@gmail.com', '0895881122441', '6c5fbfe37acf5663fad1f006176c5df22740d4f2.png'),
('ID-00003', '2023-10-03', 'Digital Marketing', 'Lynda Marquez', 'Perempuan', 'Tanjung Karang, Kota Bandar Lampung, Lampung', 'lynda.marquez@gmail.com', '0898557766889', '494b086b39a89f5d62e3bc91173e0d8d6c3b57e6.png'),
('ID-00004', '2023-10-05', 'Web Design', 'James Doe', 'Laki-laki', 'Rajabasa, Kota Bandar Lampung, Lampung', 'james.doe@gmail.com', '082380905643', '2eaed7616d36e143823273f7abf8a49a8555ed0a.png'),
('ID-00005', '2023-10-07', 'Web Development', 'Mark Parker', 'Laki-laki', 'Kedaton, Kota Bandar Lampung, Lampung', 'mark.parker@gmail.com', '082123459876', '0d9b269bce232c645abd5565b5b7e94815ba52b9.png'),
('ID-00006', '2023-10-10', 'Web Development', 'Frank Gibson', 'Laki-laki', 'Kemiling, Kota Bandar Lampung, Lampung', 'frank.gibson@gmail.com', '081379793535', '14b30dd76e58faba380060d90c41167642ca4c47.png'),
('ID-00007', '2023-10-11', 'Digital Marketing', 'Ashlyn Jordan', 'Perempuan', 'Langkapura, Kota Bandar Lampung, Lampung', 'ashlyn.jordan@gmail.com', '081381195335', '7e8f5739a4aa1bad98935d9277a28e12ba502649.jpg'),
('ID-00008', '2023-10-13', 'Web Development', 'Patric Green', 'Laki-laki', 'Way Halim, Kota Bandar Lampung, Lampung', 'patric.green@gmail.com', '081366782234', '43fe6f64698f07a9b711b0e8ce7dbf143042558b.png'),
('ID-00009', '2023-10-17', 'Mobile Development', 'Jeffery Riley', 'Laki-laki', 'Labuhan Ratu, Kota Bandar Lampung, Lampung', 'jeffery.riley@gmail.com', '081376891324', '4fac987c74705b71fd242e830095ea138be4447d.png'),
('ID-00010', '2023-10-17', 'Data Analysis', 'Marsha Singer', 'Perempuan', 'Teluk Betung, Kota Bandar Lampung, Lampung', 'marsha.singer@gmail.com', '085758857778', '3d7f1d0bbcde1b91aa4ab8cb8cff791a8ae93c6d.png'),
('ID-00011', '2023-10-18', 'Web Development', 'Manver Jacobson', 'Laki-laki', 'Rajabasa, Kota Bandar Lampung, Lampung', 'manver.jacobson@gmail.com', '082189897676', '3066ccdd2ddd8ad301215fd52cb82dd0fe38447a.jpg'),
('ID-00012', '2023-10-20', 'Data Analysis', 'Alice Doe', 'Perempuan', 'Tanjung Karang, Kota Bandar Lampung, Lampung', 'alice.doe@gmail.com', '082377883344', '374ff01f5b155533255f35d4305c4d525d9e4a6c.png'),
('ID-00013', '2023-10-21', 'Game Development', 'Ronnie Blake', 'Laki-laki', 'Tanjung Karang, Kota Bandar Lampung, Lampung', 'ronnie.blake@gmail.com', '082173775544', 'fc15a480f153b8d464a06d441a7922cc4638a705.png'),
('ID-00014', '2023-10-27', 'Mobile Development', 'Mike Brown', 'Laki-laki', 'Rajabasa, Kota Bandar Lampung, Lampung', 'mike.brown@gmail.com', '082188669988', '11096a3bbfd4cf9f43a5c4c3693f99ca5921c0be.png'),
('ID-00015', '2023-10-27', 'Web Design', 'Pauline Smith', 'Perempuan', 'Teluk Betung, Kota Bandar Lampung, Lampung', 'pauline.smith@gmail.com', '085669919779', '7639fac6449e249fca36b248dda1440644c7219d.png'),
('ID-00016', '2023-10-31', 'Data Analysis', 'Jonathan Smart', 'Laki-laki', 'Kedaton, Kota Bandar Lampung, Lampung', 'jonathan.smart@gmail.com', '082373378448', '76d5fdd36d2107ad77e1d1ef819cc81a913af17c.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
