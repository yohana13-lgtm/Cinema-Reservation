-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2022 pada 13.46
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookingtable`
--

CREATE TABLE `bookingtable` (
  `bookingID` int(11) NOT NULL,
  `movieName` varchar(100) DEFAULT NULL,
  `bookingTheatre` varchar(100) NOT NULL,
  `bookingType` varchar(100) DEFAULT NULL,
  `bookingDate` varchar(50) NOT NULL,
  `bookingTime` varchar(50) NOT NULL,
  `bookingFName` varchar(100) NOT NULL,
  `bookingLName` varchar(100) DEFAULT NULL,
  `bookingPNumber` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedbacktable`
--

CREATE TABLE `feedbacktable` (
  `msgID` int(12) NOT NULL,
  `senderfName` varchar(50) NOT NULL,
  `senderlName` varchar(50) DEFAULT NULL,
  `sendereMail` varchar(100) NOT NULL,
  `senderfeedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `feedbacktable`
--

INSERT INTO `feedbacktable` (`msgID`, `senderfName`, `senderlName`, `sendereMail`, `senderfeedback`) VALUES
(1, 'Ahmed', 'Ali', 'Ahmed@mail.com', 'Hello first'),
(2, 'Ahmed', 'Ali', 'asa@as.com', 'asdas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `movietable`
--

CREATE TABLE `movietable` (
  `movieID` int(11) NOT NULL,
  `movieImg` varchar(150) NOT NULL,
  `movieTitle` varchar(100) NOT NULL,
  `movieGenre` varchar(50) NOT NULL,
  `movieDuration` int(11) NOT NULL,
  `movieRelDate` date NOT NULL,
  `movieDirector` varchar(50) NOT NULL,
  `movieActors` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `movietable`
--

INSERT INTO `movietable` (`movieID`, `movieImg`, `movieTitle`, `movieGenre`, `movieDuration`, `movieRelDate`, `movieDirector`, `movieActors`) VALUES
(1, 'img/movie poster-1.jpg', 'KKN Di Desa Penari', 'Horor', 121, '2022-04-30', 'Awi Suryadi', 'Tissa Biani, Achmad Megantara, Calvin Jeremy, Adinda Thomas, Aghniny Haque, Fajar Nugraha, Kiki Narendra, Aulia Sarah, Aty Cancer, Diding Boneng, dkk.'),
(2, 'img/movie poster-2.jpg', 'Dear Nathan: Thank You Salma', 'Remaja/Drama', 112, '2022-01-13', 'Kuntz Agus', ' Jefri Nichol, Amanda Rawless, Ardhito Pramono , Indah Permatasari, Susan Sameh'),
(3, 'img/movie poster-3.jpg', 'Uncharted', 'Petualangan', 116, '2022-02-16', 'Ruben Fleischer', 'Tom Holland, Mark Wahlberg, Antonio Banderas'),
(4, 'img/movie poster-4.jpg', 'Fantastic Beasts: The Secrets of Dumbledore', 'Fantasi/Petualangan', 144, '2022-04-13', 'David Yates', 'Mads Mikkelsen, Eddie Redmayne, Jude Law, Katherine Waterston,  Ezra Miller, dkk.'),
(5, 'img/movie poster-5.jpg', 'minions the rise of gru', 'Komedi/Animasi', 90, '2022-07-01', 'Kyle Balda', 'Pierre Coffin, Steve Carell, Taraji P. Henson, Michelle Yeoh, Jean-Claude Van Damme, Lucy Lawless , Dolph Lundgren, dkk.'),
(6, 'img/movie poster-6.jpg', 'Gara-Gara Warisan', 'Drama, Komedi', 117, '2022-04-30', 'Muhadkly Acho', 'Oka Antara, Indah Permatasari, Ge Pamungkas, Yayu Unru, Ira Wibowo, Ernest Prakasa, Sheila Dara, Lukman Sardi, Lydia Kandou, Aci Resti, Lolox, Ence Ba');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`),
  ADD KEY `bookingID_2` (`bookingID`),
  ADD KEY `bookingID_3` (`bookingID`),
  ADD KEY `bookingID_4` (`bookingID`);

--
-- Indeks untuk tabel `feedbacktable`
--
ALTER TABLE `feedbacktable`
  ADD PRIMARY KEY (`msgID`),
  ADD UNIQUE KEY `msgID` (`msgID`);

--
-- Indeks untuk tabel `movietable`
--
ALTER TABLE `movietable`
  ADD PRIMARY KEY (`movieID`),
  ADD UNIQUE KEY `movieID` (`movieID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `feedbacktable`
--
ALTER TABLE `feedbacktable`
  MODIFY `msgID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `movietable`
--
ALTER TABLE `movietable`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
