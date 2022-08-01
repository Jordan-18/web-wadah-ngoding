-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2022 pada 15.40
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wadah_ngoding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datawebsite`
--

CREATE TABLE `datawebsite` (
  `id` int(11) NOT NULL,
  `app` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `jenis` varchar(50) NOT NULL,
  `tools` varchar(100) NOT NULL,
  `user_id` int(64) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datawebsite`
--

INSERT INTO `datawebsite` (`id`, `app`, `author`, `link`, `gambar`, `tanggal`, `jenis`, `tools`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gaji Pintar Static\r\n', 'Jordan Istiqlal', 'https://jordan-18.github.io/', 'gajipintar.png', '2021-04-15 05:19:35', 'website', 'Html,Css,Javascript', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(2, 'UAC Unida ', 'Jordan Istiqlal', 'https://uac-unida.github.io/', 'uac.png', '2021-04-15 07:47:33', 'website', 'Html,Css,Javascript', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(3, 'QuranTani', 'Jordan Istiqlal', 'https://github.com/Jordan-18/QuranTani', 'qurantani.jpg', '2021-04-15 08:43:51', 'android', 'Kotlin', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(8, 'Lazizwaf -WordPress', 'Jordan Istiqlal', 'http://laziswaf.unida.gontor.ac.id/', '6195163f7fb4e.png', '2021-11-17 14:48:31', 'website', 'PHP,Wordpress', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(9, 'Klasifikasi Hukum Bacaan MAD-HMM', 'Jordan Istiqlal', 'https://colab.research.google.com/drive/1pyErIdQchAFAWrNUNJZXh5glhUz8kgDg?authuser=1', 'HMM.png', '2021-11-26 14:52:31', 'AI', 'Python,Hidden Markov Model,Machine Learning', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(10, 'Vehicle Rental', 'Jordan Istiqlal', 'http://vrental.ngoding-ajalah.my.id/', '62775a4770ffe.png', '2022-05-07 21:51:03', 'website', 'PHP,Laravel', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(11, 'ArFest Panahan point', 'Jordan Istiqlal', 'https://panahan.ngoding-ajalah.my.id/', '62775a7e4b1c5.png', '2022-05-07 21:51:58', 'website', 'PHP,Laravel', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(12, 'Project Magang - Private', 'Jordan Istiqlal', 'http://_internal-test.binosaurus.com/', '627764bae2e8e.png', '2022-05-07 22:35:38', 'website', 'Laravel,Python,RabbitMQ,Redis', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(13, 'Web Dawet', 'Zaim Mustaqiem', 'http://dawet-domain.my.id', '6284dd75cf419.png', '2022-05-18 15:50:13', 'website', 'Html,Css', NULL, '', '2022-07-25 09:57:59', NULL, NULL),
(17, 'BWA Store Furniture Laravel', 'Jordan Istiqlal', 'https://bwastore.ngoding-ajalah.my.id/', '628e69daac3b6.png', '2022-05-25 21:39:38', 'website', 'PHP,Laravel,BuildWithAngga,Midtrans', NULL, '', '2022-07-25 09:57:59', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datawebsite`
--
ALTER TABLE `datawebsite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datawebsite`
--
ALTER TABLE `datawebsite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
