-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2024 pada 14.46
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pandumkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(300) NOT NULL,
  `jawaban` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chatbot`
--

INSERT INTO `chatbot` (`id`, `pertanyaan`, `jawaban`) VALUES
(1, 'Halli|Hallo|hay|halo|hallo|woy|bro|HI|hola', 'Hai Sahabat PandUMKM,Ada yang bisa kami bantu?'),
(2, 'siapa kamu?|siapa kamu|siapa namamu|Siapa kamu|kamu siapa?', 'Saya adalah bot,saya biasa di panggil sahabat UMKM'),
(3, 'Assalamualaikum|ass|assalamualaikum|assamualaikumm', 'Waalaikumsalam Sahabat PandUMKM :)'),
(4, 'saha', 'kamu'),
(5, 'bagaimana kabar?', 'baik'),
(6, 'apa itu penjualan ?', 'penjualan adalah kegiatan tukar menukar uang dengan barang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_history`
--

CREATE TABLE `chat_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `praktisi`
--

CREATE TABLE `praktisi` (
  `id` int(11) NOT NULL,
  `nama_praktisi` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_umkm` varchar(32) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `token_expires_at` datetime DEFAULT NULL,
  `token_chat` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `nama_umkm`, `password`, `foto`, `reset_token_hash`, `token_expires_at`, `token_chat`) VALUES
(1, 'iwawahid858@yahoo.com', 'raden wahid', 'fatrani', '$2y$10$atTRqtdHgcHLj', '', 'c01d2285277e2d81b0e4fec2fce4f707a3b23165a6d9fcedbce79d38578119dd', '2024-05-30 17:39:20', NULL),
(2, 'iwatea1029@yahoo.com', 'fatharani sativa dewi', 'fatrani', '$2y$10$1JWg.QJMu.WFz', '65d34ea5e3d28.png', NULL, NULL, NULL),
(3, 'iwawahid88@yahoo.com', 'fatharani sativa dewi', 'wa', '$2y$10$LbfQgnmJk/8j7', '65d34f0602875.png', NULL, NULL, NULL),
(4, 'fatharanisativa1@gmail.com', 'raden wahid', 'fatrani', '$2y$10$0lTQWTZu.GYP7', '65d34fda47eb1.png', NULL, NULL, NULL),
(5, 'fatharanisativa2@gmail.com', 'fatharani sativa dewi', 'fatrani', '$2y$10$vnSKElaNNdY/w', '65d4396bd9b0e.png', NULL, NULL, NULL),
(6, 'radenwahiddd29@gmail.com', 'raden', 'isijdjd', '$2y$10$W7C3QLwRnPVeU', '65d558a6108a5.jpeg', 'f312e0de44a109d38c4d94b0ff50c87e526eb2356550a6455930ceb1023962e2', '2024-05-30 18:26:13', NULL),
(7, 'fatharanisativa@umbandung.ac.id', 'tiva', 'Godigi', '$2y$10$xCabrIxX1gW/w', '65d5fac1e4466.png', NULL, NULL, NULL),
(8, 'fatha1ranisativa12@gmail.com', 'raden wahid', 'fatrani', '$2y$10$EucWDviw4gIe2', '65e45c27322fa.jpg', NULL, NULL, NULL),
(9, 'fatharanisativa211@gmail.com', 'raden wahid', 'fatrani', '$2y$10$bPOrqD/Y5/ihz', '65e45cb90389d.jpg', NULL, NULL, NULL),
(10, 'fati@gmail.com', 'fatharani sativa dewi', 'fatrani', '$2y$10$N3wvPqAPoC8Hd', '65e45dd12186b.jpg', NULL, NULL, NULL),
(11, 'fati1@gmail.com', 'raden wahid', 'fatrani', '$2y$10$2FXbnn0VWCG6k', '65e45f0a4f65d.jpg', NULL, NULL, NULL),
(12, 'fa1ti@gmail.com', 'fatharani sativa dewi', '12', '$2y$10$LGRfvy8ShCgxN', '65e45f797f5b8.jpg', NULL, NULL, NULL),
(13, 'fatharanisativaqq2@gmail.com', 'raden wahid', 'fatrani', '$2y$10$UMotsx3HDOlQp', '65e46a305e468.jpg', NULL, NULL, NULL),
(14, 'fatharanisa11tiva2@gmail.com', 'fatharani sativa dewi', 'admin', '$2y$10$BvD5cQ/HtJcMs', '65e47626e4700.jpg', NULL, NULL, NULL),
(15, 'fatharanisativa21@gmail.com', 'raden wahid', 'fatrani', '$2y$10$MVGJxzfGEC9LJ', '65e477b688490.jpeg', NULL, NULL, NULL),
(16, 'fatharani@gmail.com', 'fatharani', 'vavalicious', '$2y$10$OhbNHSc3ZCyzg', '6642399c4c787.jpg', NULL, NULL, NULL),
(17, 'fatharanisat1iva2@gmail.com', 'raden wahid', 'fatrani', '$2y$10$iaTp14pcd6ykb', '66588eb75aab6.jpg', NULL, NULL, NULL),
(18, 'raden@example.com', 'raden wahid', 'fatrani', '$2y$10$yF38Gl0U2BomI', '66589b2f4e485.jpg', '4534e957f2960940ac0097a7c44603bbf95fadd5fe29a3b25386bcc57b67689b', '2024-05-30 18:11:16', NULL),
(19, 'radenwahid@susahsenang.com', 'raden wahid', 'fatrani', '$2y$10$OWh20F9Q7c0.K', '66589ece68049.jpg', '00a77d1114d41b0db466729704c132217682100a1fb73cbbb6f63ffbae89a3e0', '2024-05-30 18:14:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat_history`
--
ALTER TABLE `chat_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `praktisi`
--
ALTER TABLE `praktisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reset_token` (`reset_token_hash`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `chat_history`
--
ALTER TABLE `chat_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `praktisi`
--
ALTER TABLE `praktisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
