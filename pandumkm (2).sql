-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2024 pada 05.17
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pandumkm1`
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
  `pertanyaan` varchar(1000) NOT NULL,
  `jawaban` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chatbot`
--

INSERT INTO `chatbot` (`id`, `pertanyaan`, `jawaban`) VALUES
(1, 'Hallo', 'Hai Sahabat PandUMKM,Ada yang bisa kami bantu?'),
(2, 'siapa kamu?|siapa kamu|siapa namamu|Siapa kamu|kamu siapa?', 'Saya adalah bot,saya biasa di panggil sahabat UMKM'),
(3, 'Assalamualaikum', 'Waalaikumsalam Sahabat PandUMKM :)'),
(7, 'Apa yang dimaksud Digital Marketing', 'Digital Marketing atau Pemasaran digital itu seperti membuka toko di dunia maya, di mana kita bisa memperkenalkan dan menjual produk atau jasa lewat internet, seperti di Facebook atau Google. Caranya lebih mudah dan murah karena kita bisa langsung ngobrol dengan pembeli dan tahu apa yang mereka suka, tanpa harus buka toko fisik yang besar. Jadi, kita bisa menjangkau lebih banyak orang dari berbagai tempat hanya dengan menggunakan handphone atau komputer.'),
(8, 'Apa saja jenis-jenis Digital Marketing', 'Pemasaran digital mencakup berbagai strategi online seperti pemasaran konten, SEO, SEM, email marketing, media sosial, afiliasi, pesan instan, influencer, video, mobile, iklan TV, dan realitas virtual. Setiap strategi memiliki pendekatan berbeda dalam menarik calon konsumen, membangun merek, menyampaikan informasi produk, serta mendorong penjualan dan interaksi pelanggan. Kombinasi strategi yang tepat bergantung pada tujuan pemasaran, target audiens, dan sumber daya bisnis.'),
(9, 'Apa kelebihan Digital Marketing', 'Kelebihan utama digital marketing adalah biaya yang lebih rendah, jangkauan yang luas, kemampuan untuk menargetkan audiens secara tepat, interaksi langsung dengan pelanggan, pengukuran efektivitas yang mudah, potensi hasil penjualan yang lebih tinggi, membangun loyalitas pelanggan, kecepatan eksekusi kampanye, serta tidak ada batasan jumlah audiens yang dapat dijangkau.'),
(10, 'Apa kekurangan Digital Marketing', 'Kekurangan digital marketing antara lain persaingan yang ketat di dunia online, tantangan dalam membangun kepercayaan dan kredibilitas, kebutuhan untuk selalu meng-update konten dan strategi, serta risiko penipuan dan serangan siber.'),
(11, 'Apa kunci sukses mengatur Digital Marketing', 'Kunci sukses mengatur digital marketing adalah memahami target audiens dengan baik, menetapkan tujuan dan strategi yang jelas, memprioritaskan saluran yang paling efektif, konsistensi dalam eksekusi dan penyesuaian berkala berdasarkan analisis data, serta kolaborasi yang baik antar tim pemasaran.'),
(12, 'Bagaimana cara menerapkan Digital Marketing untuk UMKM', 'Cara menerapkan digital marketing untuk UMKM adalah dengan memanfaatkan media sosial untuk menjangkau audiens lokal, membuat konten menarik dan relevan, mengoptimalkan SEO untuk bisnis lokal, menjalin kemitraan dengan bisnis lain di sekitar, dan memberikan pelayanan pelanggan yang prima.'),
(13, 'Bagaimana merancang Digital Marketing', 'Merancang digital marketing dimulai dengan menetapkan tujuan dan target audiens, memilih saluran yang tepat (media sosial, SEO, email, dll), membuat konten dan kampanye yang menarik, mengalokasikan anggaran yang sesuai, serta menyiapkan metrik untuk mengukur keberhasilan.'),
(14, 'Macam-macam Digital Marketing apa saja', 'Macam-macam digital marketing antara lain pemasaran konten, SEO, SEM, email marketing, media sosial, afiliasi, pesan instan, influencer, video, mobile, iklan TV, dan realitas virtual.'),
(15, 'Apakah sosial media marketing penting untuk bisnis', 'Sosial media yang penting untuk bisnis antara lain Facebook, Instagram, Twitter, LinkedIn, YouTube, dan TikTok - bergantung pada target audiens dan jenis bisnis Anda.'),
(16, 'Bagaimana cara mengukur kesuksesan sosial media marketing', 'Kesuksesan sosial media marketing dapat diukur dengan berbagai metrik seperti jumlah pengikut/followers, jangkauan konten, tingkat keterlibatan (like, komentar, shares), jumlah klik pada tautan yang disematkan, tingkat konversi seperti penjualan yang didapat, serta analisis sentimen audiens terhadap merek/produk. Indikator ini perlu dipantau secara berkala untuk mengevaluasi efektivitas strategi yang dijalankan.'),
(17, 'Apa saja sosial media yang penting untuk bisnis', 'Beberapa sosial media yang penting untuk bisnis saat ini adalah Facebook yang memiliki banyak pengguna dan fitur lengkap, Instagram untuk memasarkan produk secara visual, Twitter untuk berkomunikasi langsung dengan audiens, LinkedIn untuk keperluan B2B, YouTube untuk konten video dan tutorial, serta TikTok yang sedang naik daun terutama untuk memasarkan kepada audiens milenial/Gen Z. Pemilihan platform bergantung pada target audiens serta tujuan pemasaran bisnis tersebut.'),
(18, 'Apa Manfaat sosial media untuk bisnis', 'Manfaat sosial media untuk bisnis adalah meningkatkan kesadaran merek, menjangkau audiens baru, membangun hubungan dengan pelanggan, mendorong lalu lintas website, meningkatkan penjualan, serta mendapatkan masukan dari pelanggan.'),
(19, 'Berapa biaya yang dibutuhkan untuk sosial media', 'Biaya untuk sosial media marketing bervariasi, mulai dari gratis (posting organik) hingga ribuan dolar per bulan untuk iklan berbayar, bayar influencer, alat analitik, dan sumber daya manusia.'),
(20, 'Apakah tiktok aplikasi marketing yang bagus digunakan', 'TikTok bisa menjadi aplikasi marketing yang bagus digunakan untuk menargetkan audiens milenial dan Gen Z dengan konten video kreatif dan autentik yang menarik perhatian.'),
(21, 'Apakah blog sangat dibutuhkan untuk sosial media marketing', 'Blog masih dibutuhkan dalam sosial media marketing karena konten berkualitas sangat penting untuk membangun kepercayaan dan posisi sebagai otoritas di bidang Anda. Blog juga bagus untuk SEO.'),
(22, 'Sosial media marketing lebih baik untuk bisnis B2B atau B2C', 'Sosial media marketing lebih baik untuk bisnis B2C yang menargetkan konsumen akhir, sedangkan untuk B2B sebaiknya fokus pada platform seperti LinkedIn.'),
(23, 'Bagaimana cara menggunakan facebook untuk marketing', 'Cara menggunakan Facebook untuk marketing adalah dengan membuat Halaman Bisnis, mengunggah konten yang menarik dan relevan, beriklan dengan Facebook Ads, serta berinteraksi dengan audiens di grup dan komunitasCara menggunakan Facebook untuk marketing adalah dengan membuat Halaman Bisnis, mengunggah konten yang menarik dan relevan, beriklan dengan Facebook Ads, serta berinteraksi dengan audiens di grup dan komunitas'),
(24, 'Bagaimana cara menggunakan tiktok untuk marketing', 'Cara menggunakan TikTok untuk marketing adalah dengan membuat konten video kreatif dan autentik yang sesuai dengan tren, menggunakan tagar dan suara yang relevan, berkolaborasi dengan pembuat konten lain, serta mengikuti analitik untuk konten yang sukses.'),
(25, 'Bagaimana cara menggunakan instagram untuk marketing', 'Cara menggunakan Instagram untuk marketing adalah dengan memproduksi konten visual yang menarik (foto/video), menggunakan tagar dan geotag yang tepat, berkolaborasi dengan influencer yang relevan, serta menggunakan Instagram Ads untuk kampanye berbayar.'),
(26, 'Bagaimana cara menggunakan youtube untuk marketing', 'Cara menggunakan YouTube untuk marketing adalah dengan membuat video tutorial, review produk, konten hiburan, serta memanfaatkan strategi seperti kolaborasi dengan YouTuber lain, optimasi SEO video, dan hadiah untuk audiens.'),
(27, 'Bagaimana cara mengendalikan brand secara online dengan Sosial Media Marketing', 'Mengendalikan brand secara online dengan sosial media marketing bisa dilakukan dengan memantau percakapan di media sosial, merespons secara responsif, konsisten dalam pesan dan identitas visual, serta menjaga reputasi dengan berkomunikasi secara jujur dan profesional.'),
(28, 'Apa tipe konten media sosial yang menghasilkan konversi terbaik', 'Tipe konten media sosial yang menghasilkan konversi terbaik adalah konten yang memberikan nilai seperti tutorial, tips, penawaran khusus, serta isi yang menarik dan menghibur untuk mengembangkan hubungan dengan audiens.'),
(29, 'Berapa banyak waktu yang dihabiskan untuk Social Media Marketing dalam seminggu', 'Waktu yang dihabiskan untuk sosial media marketing dalam seminggu bervariasi tergantung skala bisnis, namun umumnya antara 5-20 jam untuk mengelola beberapa platform, membuat konten, dan berinteraksi dengan audiens.'),
(30, 'Berapa lama untuk mendapatkan hasil dari Social Media Marketing', 'Membutuhkan waktu 3-6 bulan untuk mendapatkan hasil dari sosial media marketing karena dibutuhkan waktu untuk membangun audiens, meningkatkan engagement, serta mengoptimalkan strategi berdasarkan data.'),
(31, 'Apa kesalahan umum yang sering dilakukan sebuah bisnis dalam Social Media Marketing', 'Cara memudahkan iklan di sosial media tanpa biaya tinggi adalah dengan memanfaatkan posting organik semaksimal mungkin, menggunakan iklan berpromosi melalui berbagai fitur di platform sosial media, serta berkolaborasi dengan influencer kecil yang sesuai dengan audiens Anda.'),
(32, 'Apa tips umum untuk kesuksesan media sosial?', 'Tips umum untuk kesuksesan media sosial adalah menentukan tujuan dan strategi yang jelas, mengenal target audiens dengan baik, membuat konten berkualitas yang menarik dan bernilai, berinteraksi dan membangun hubungan dengan komunitas, memanfaatkan fitur iklan dan kolaborasi dengan influencer, memantau analitik untuk evaluasi, serta konsisten dalam pelaksanaan strategi pemasaran di media sosial.'),
(33, 'Apa cara yang memudahkan untuk iklan di sosial media tanpa menghabiskan biaya yang tinggi', 'Cara mengiklankan di media sosial tanpa biaya tinggi adalah dengan memanfaatkan konten organik secara maksimal, menjadi aktif di komunitas yang relevan dengan audiens, menggunakan tagar (hashtag) yang tepat untuk meningkatkan jangkauan, serta berkolaborasi dengan kreator/influencer kecil yang memiliki audiens sesuai dengan target bisnis Anda'),
(34, 'Bagaimana memaksimalkan digital marketing jika target tidak begitu besar aktivitasnya di sosial media', 'Jika target tidak begitu aktif di sosial media, cara memaksimalkan digital marketing adalah dengan fokus pada strategi seperti SEO, iklan di mesin pencari, email marketing, serta menciptakan konten berkualitas untuk menarik audiens ke website.'),
(35, 'Bagaimana cara mengetahui waktu yang pas untuk mempromosikan produk UMKM', 'Waktu yang pas untuk mempromosikan produk UMKM adalah saat momen-momen penting seperti hari raya, acara khusus, atau musim tertentu yang relevan dengan produk Anda. Selain itu, promosi juga bisa dilakukan saat memasuki musim ramai seperti akhir pekan atau liburan.'),
(36, 'Apa saja jenis-jenis pemasaran ', 'Jenis-jenis pemasaran antara lain pemasaran digital (online), pemasaran langsung, pemasaran melalui acara, pemasaran konten, pemasaran email, pemasaran melalui media cetak/TV, pemasaran afiliasi, pemasaran dari mulut ke mulut, dan lain-lain.'),
(37, 'Sebutkan perbedaan pemasaran langsung dan branding', 'Perbedaan pemasaran langsung dan branding, pemasaran langsung berfokus pada promosi untuk mendorong penjualan secara langsung, sedangkan branding lebih kepada membangun identitas dan citra merek dalam jangka panjang untuk meningkatkan loyalitas konsumen.'),
(38, 'Apa saja alat pemasaran digital yang populer', 'Alat pemasaran digital yang populer antara lain SEO, SEM, email marketing, media sosial, konten pemasaran, influencer marketing, mobile marketing, video marketing, dan iklan digital seperti PPC.'),
(39, 'Trik marketing apa yang bisa dipelajari oleh UMKM', 'Trik marketing untuk UMKM adalah memanfaatkan media sosial untuk menjangkau audiens lokal, mengoptimalkan SEO website, membuat konten menarik dan relevan, menawarkan layanan serta pengalaman pelanggan yang prima, serta menjalin kemitraan dengan pelaku bisnis/komunitas lain.'),
(40, 'Apakah pemasaran offline atau online yang baik untuk dijalankan oleh UMKM', 'UMKM sebaiknya menggabungkan pemasaran online dan offline. Online untuk jangkauan lebih luas dengan biaya rendah, sementara offline seperti brosur, event, kemitraan lokal untuk meningkatkan kehadiran di komunitas sekitar.'),
(41, 'Apakah perlu menggunakan influencer atau brand ambassador', 'Menggunakan influencer atau brand ambassador bisa dipertimbangkan jika relevan dengan target audiens dan anggaran pemasaran. Mereka dapat membantu meningkatkan kesadaran merek secara efektif.'),
(42, 'Bagaimana cara menciptakan logo dan tagline yang bagus', 'Logo sebaiknya simpel, mudah diingat, dan mewakili identitas bisnis. Tagline harus singkat, unik, dan menjelaskan nilai utama yang ditawarkan.'),
(43, 'Berapa persen dari pendapatam yang sebaiknya dialokasikan untuk pemasaran', 'Idealnya, 5-10% dari total pendapatan dialokasikan untuk pemasaran. Namun tergantung pada tahap dan tujuan bisnis. Bisnis baru bisa mengalokasikan lebih untuk meningkatkan brand awareness.'),
(44, 'Bagaimana cara mengelola anggaran pemasaran agar efektif', 'Mengelola anggaran pemasaran secara efektif dengan menetapkan tujuan jelas, mengalokasikan anggaran di saluran paling efektif, mengevaluasi dan menyesuaikan anggaran secara berkala, serta mengutamakan strategi pemasaran berbiaya rendah.'),
(45, 'Bagaimana cara menjaga pelanggan tetap setia', 'Menjaga loyalitas pelanggan dengan memberikan layanan dan pengalaman prima, menjalankan program loyalitas/rewards, mempertahankan komunikasi dan engagement, serta merespons pertanyaan/keluhan dengan cepat.'),
(46, 'Apa strategi untuk loyal kepada pelanggan', 'Strategi membangun loyalitas pelanggan meliputi program member/poin rewards, promo khusus untuk pelanggan setia, pelayanan personal, serta melibatkan pelanggan dalam pengembangan produk/layanan.'),
(47, 'Bagaimana cara menangani feedback dan keluhan pelanggan dengan baik?', 'Menangani feedback/keluhan dengan mendengarkan, memberi respons cepat, menunjukkan empati dan upaya penyelesaian masalah, memberikan kompensasi/ganti rugi jika diperlukan, serta mempelajari masukan untuk perbaikan layanan.'),
(48, 'Apa langkah pertama untuk memulai strategi pemasaran?', 'Langkah awal strategi pemasaran adalah menetapkan tujuan pemasaran yang spesifik, menentukan target audiens, menganalisis kompetitor dan posisi pasar, lalu mengembangkan strategi untuk mencapai tujuan tersebut.'),
(49, 'Apa saja strategi pemasaran yang efektif untuk bisnis kecil?', 'Strategi pemasaran efektif untuk bisnis kecil meliputi memanfaatkan media sosial dan konten pemasaran, mengoptimalkan SEO lokal, memberikan layanan pelanggan prima, menjalin kemitraan dengan bisnis/komunitas lokal.'),
(50, 'Bagaimana cara membuat konten yang menarik di media sosial?', 'Membuat konten media sosial yang menarik dengan memahami preferensi audiens, menggunakan visual menarik (foto/video berkualitas), menyajikan dalam gaya storytelling yang mengajak berinteraksi.'),
(51, 'Bagaimana cara membangun identitas brand yang kuat?', 'Membangun identitas brand yang kuat dengan menetapkan brand positioning yang unik, konsisten dalam gaya visual, menjaga kualitas produk/layanan, serta menjadikan customer experience sebagai prioritas.'),
(52, 'Bagaimana cara mengelola krisis dalam pemasaran?', 'Mengelola krisis pemasaran dengan menyiapkan rencana manajemen krisis, merespons dengan cepat dan transparan, menunjukkan tanggung jawab dan empati, serta mengambil langkah perbaikan nyata.'),
(53, 'Bagaimana cara membuat proposal pemasaran yang efektif?', 'Membuat proposal pemasaran yang efektif dengan menguraikan tujuan, target audiens, strategi, anggaran, timeline, dan metrik sukses, disertai visualisasi yang menarik dan persuasif serta bahasa yang sesuai dengan klien.'),
(54, 'Bagaimana cara berkolaborasi dengan bisnis lain untuk kampanye pemasaran?', 'Berkolaborasi dengan bisnis lain melalui co-marketing, promosi silang, kemitraan sponsorship event/kampanye, kerja sama affiliate atau influencer, bundling produk/layanan.'),
(55, 'Bagaimana mempertahankan usaha ketika dalam keadaan krisis', 'Saat krisis, prioritaskan efisiensi biaya operasional, optimalkan pemasaran berbiaya rendah, fokus pada loyalitas retensi pelanggan, serta pertahankan kualitas produk/layanan.'),
(56, 'Bagaimana cara menghadapai saingan sesama UMKM', 'Menghadapi saingan sesama UMKM dengan membangun keunggulan kompetitif melalui diferensiasi produk/layanan, memberikan nilai tambah, menjaga kualitas dan service excellence, serta memanfaatkan pemasaran untuk meningkatkan brand awareness dan loyalitas pelanggan.'),
(57, 'Hai', 'Hai Sahabat PandUMKM,Ada yang bisa kami bantu?');

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
(6, 'radenwahiddd29@gmail.com', 'raden', 'isijdjd', '$2y$10$W7C3QLwRnPVeU', '65d558a6108a5.jpeg', '38c60d132a12929567edfd5cc9297b8510bd4b8047d559fe352e9f5877b5ea95', '2024-06-07 15:30:04', NULL),
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
(19, 'radenwahid@susahsenang.com', 'raden wahid', 'fatrani', '$2y$10$OWh20F9Q7c0.K', '66589ece68049.jpg', '00a77d1114d41b0db466729704c132217682100a1fb73cbbb6f63ffbae89a3e0', '2024-05-30 18:14:32', NULL),
(20, 'fatharani11@gmail.com', 'fatharani sativa dewi', 'fatrani', '$2y$10$63BwqSpX8rVnV', '6661cdcfba67a.png', NULL, NULL, NULL),
(21, 'vava@gmail.com', 'tiva', 'Sejahtera', '$2y$10$N0Kwp4N8eWDEY', '6662f5679b9ed.jpg', NULL, NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
