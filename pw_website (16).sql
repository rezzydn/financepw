-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Mar 2024 pada 17.19
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_website`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name_discount` varchar(100) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `kode_discount` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `discount`
--

INSERT INTO `discount` (`id`, `name_discount`, `id_products`, `price`, `status`, `kode_discount`) VALUES
(1, 'CeraMON Barrier Moistfull Gel 10mL', 3, 10000, 'Aktif', 'QWRD'),
(2, 'CeraMON Barrier Moistfull Gel 50mL', 2, 20000, 'Aktif', 'CBMGL'),
(3, 'Prettywell Confident Clay Mask', 6, 5000, 'Aktif', 'CONFI5K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `idD` int(11) NOT NULL,
  `notrans` varchar(225) DEFAULT NULL,
  `id_products` varchar(50) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty` float DEFAULT NULL,
  `sub_total` float DEFAULT NULL,
  `timeDetail` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`idD`, `notrans`, `id_products`, `product_name`, `price`, `qty`, `sub_total`, `timeDetail`) VALUES
(49, 'PW2305290001', '2', 'CeraMON Barrier Moistfull Gel 50mL', 59000, 2, 118000, '2023-05-29 18:05:53'),
(50, 'PW2305290002', '2', 'CeraMON Barrier Moistfull Gel 50mL', 59000, 1, 59000, '2023-05-29 18:08:56'),
(51, 'PW2305290002', '6', 'Prettywell Confident Clay Mask', 18000, 1, 18000, '2023-05-29 18:08:56'),
(52, 'PW2305290003', '2', 'CeraMON Barrier Moistfull Gel 50mL', 59000, 1, 59000, '2023-05-29 18:10:36'),
(53, 'PW2306080001', '2', 'CeraMON Barrier Moistfull Gel 50mL', 59000, 1, 59000, '2023-06-08 10:11:42'),
(54, 'PW2308020001', '3', 'CeraMON Barrier Moistfull Gel 10mL', 38000, 2, 76000, '2023-08-02 06:01:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_master`
--

CREATE TABLE `order_master` (
  `idM` int(11) NOT NULL,
  `notrans` varchar(225) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `total` float DEFAULT NULL,
  `discount_nominals` float DEFAULT NULL,
  `discount_code` varchar(255) DEFAULT NULL,
  `province` varchar(225) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `courier` varchar(225) DEFAULT NULL,
  `service` varchar(225) DEFAULT NULL,
  `shipping_nominal` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `id_users` varchar(225) DEFAULT NULL,
  `status_payment` varchar(100) DEFAULT NULL,
  `point` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_master`
--

INSERT INTO `order_master` (`idM`, `notrans`, `note`, `total`, `discount_nominals`, `discount_code`, `province`, `city`, `courier`, `service`, `shipping_nominal`, `weight`, `id_users`, `status_payment`, `point`, `date`, `time`) VALUES
(38, 'PW2305290001', 'Jawa Timur', 127000, 0, '', 'Jawa Timur', 'Kabupaten Madiun', 'JNE', '9000,OKE(Ongkos Kirim Ekonomis)', 9000, 100, '9', 'Pending', 127, '2023-05-29', '2023-05-29 18:05:53'),
(39, 'PW2305290002', 'Jawa Timur', 72000, 5000, 'CONFI5K', 'Jawa Timur', 'Kabupaten Madiun', '-Pilih-', NULL, 0, 100, '9', 'Expired', 72, '2023-05-29', '2023-05-29 18:08:56'),
(40, 'PW2305290003', 'Jawa Timur', 48000, 20000, 'CBMGL', 'Jawa Timur', 'Kabupaten Madiun', 'JNE', '9000,OKE(Ongkos Kirim Ekonomis)', 9000, 50, '9', 'Expired', 48, '2023-05-29', '2023-05-29 18:10:36'),
(41, 'PW2306080001', 'Jawa Timur', 68000, 0, '', 'Jawa Timur', 'Kabupaten Madiun', 'JNE', '9000,OKE(Ongkos Kirim Ekonomis)', 9000, 50, '9', 'Terbayar', 68, '2023-06-08', '2023-06-08 10:11:42'),
(42, 'PW2308020001', 'Jawa Timur', 85000, 0, '', 'Jawa Timur', 'Kabupaten Madiun', 'JNE', '9000,OKE(Ongkos Kirim Ekonomis)', 9000, 100, '9', 'Belum Bayar', 0, '2023-08-02', '2023-08-02 06:01:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `price` varchar(32) DEFAULT NULL,
  `disc_price` varchar(12) DEFAULT NULL,
  `stock` varchar(8) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `howtouse` text DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `pic_1` varchar(32) DEFAULT NULL,
  `pic_2` varchar(32) DEFAULT NULL,
  `pic_3` varchar(32) DEFAULT NULL,
  `pic_4` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `slug`, `price`, `disc_price`, `stock`, `desc`, `howtouse`, `weight`, `pic_1`, `pic_2`, `pic_3`, `pic_4`) VALUES
(3, 'CeraMON Barrier Moistfull Gel 10mL', 'Moisturizer', '', '37000', '', '100', 'Moisturizer yang diformulasikan oleh 3 jenis hyaluronic acid dan polyglutamic acid untuk memberikan hidrasi kulit yang maksimal. Dikombinasikan dengan ceramide dan DNA salmon yang terbukti secara ilmiah dapat memperkuat skin barrier dan meningkatkan elastisitas kulit. ', NULL, 100, 'ceramon10ml.jpeg', 'ceramon10ml2.jpeg', '', ''),
(4, '2% PHA + BHA Gentle Exfoliating Toner 100mL', 'Toner', NULL, '59000', NULL, '100', 'Didesain untuk mengangkat sel kulit mati,membersihkan komedo dari pori pori yang tersumbat, merawat kulit berjerawat, mencerahkan wajah, menghaluskan tekstur kulit, exfoliating without disrupting your barrier.', NULL, 100, 'feelalive.jpeg', 'feelalive2.jpeg', 'feelalive3.jpeg', NULL),
(5, 'Reset & Restart Versatile Oil Serum', 'Face Oil', NULL, '41500', NULL, '100', 'Key Ingredients:\r\n1. Tamanu oil = memudarkan bekas jerawat hitam, merawat kulit berjerawat, bagus untuk kulit kering\r\n2. Sea buckthorn oil = membantu mengurangi garis halus/wrinkles, anti-aging, meremajakan kulit\r\n3. Grapeseed oil = meredakan jerawat yang meradang, sebagai antioxidant\r\n4. Sunflower oil + Vit E = menghaluskan kulit, dan dapat membantu mengurangi stretchmark\r\n5. Carrot oil = antibacterial dan anti-fungal agent.\r\n', NULL, 100, 'resetrestart.jpeg', 'resetrestart2.jpeg', NULL, NULL),
(6, 'Prettywell Confident Clay Mask', 'Clay Mask', NULL, '18000', NULL, '100', 'Kegunaan masker \"CONFIDENT\" : \r\n- Meredakan bruntusan atau jerawat dalam kondisi sedang-berat\r\n- Mengontrol produksi minyak berlebih pada wajah karna memiliki drying agent\r\n- Gentle exfoliator karena tekstur super halus', NULL, 100, 'confi.jpeg', 'confi2.jpeg', NULL, NULL),
(7, 'Prettywell Fancy Clay Mask', 'Clay Mask', NULL, '18000', NULL, '100', 'Manfaat Fancy+ :\r\n- Memudarkan bekas jerawat\r\n- Mencerahkan wajah\r\n- Antioxidant properties\r\n- Mengurangi hiperpigmentasi\r\n- Menjadikan wajah terasa lebih lembut\r\n- Good for all skin types especially dull skin\r\n', NULL, 100, 'fancy.jpeg', 'fancy2.jpeg', 'fancy3.jpeg', NULL),
(8, 'Prettywell Rare Clay Mask', 'Clay Mask', NULL, '18000', NULL, '0', 'Rare adalah clay mask yang diformulasikan oleh 6 optimum ingredients tanpa merusak skin barrier. \r\n\r\nAll-in-one clay mask yang didesain khusus untuk mengeksfoliasi sel kulit mati, mencerahkan kulit, dan meredakan jerawat secara optimal. \r\n', NULL, 100, 'rare.jpeg', 'rare2.jpeg', 'rare3.jpeg', 'rare4.jpeg'),
(9, 'Prettywell Bundle Ceramon + Exfoliating Toner', 'Bundling', NULL, '111320', NULL, '100', 'CeraMON Barrier Moistfull Gel adalah pelembab wajah dengan tekstur ringan untuk memperbaiki serta memperkuat fungsi skin barrier menenangkan kulit teriritasi,\r\nmemberikan kelembapan ekstra.\r\n<br><br>\r\nSedangkan Feel Alive Gentle Exfoliating Toner, Didesain untuk mengangkat sel kulit mati, mencerahkan wajah, dan membantu meregenerasi kulit secara maksimal. ', NULL, 100, 'bundling1.jpeg', 'ceramon3.jpeg', 'feelalive2.jpeg', NULL),
(10, 'Glowing Set (CeraMON 50 mL+ Restart & Reset Oil)', 'Bundling', NULL, '95220', NULL, '100', 'Key Ingredients CeraMON:\r\n- Ceramide\r\n- DNA Salmon\r\n- Triple Hyaluronic Acid \r\n- Mugwort\r\n- Cica\r\n- Algae Extract\r\n- Panthenol\r\n- Squalance\r\n- PGA \r\n\r\nKey Ingredients Reset & Restart Versatile Oil Serum:\r\n1. Tamanu oil = memudarkan bekas jerawat hitam, merawat kulit berjerawat, bagus untuk kulit kering\r\n2. Sea buckthorn oil = membantu mengurangi garis halus/wrinkles, anti-aging, meremajakan kulit\r\n3. Grapeseed oil = meredakan jerawat yg meradang, sebagai antioxidant\r\n4. Sunflower oil + Vit E = menghaluskan kulit, dan dapat membantu mengurangi stretchmark\r\n5. Carrot oil = antibacterial dan anti-fungal agent.', NULL, 100, 'bundling2.jpeg', 'ceramon4.jpeg', 'resetrestart2.jpeg', NULL),
(11, 'Prettywell CeraMON 50 mL x 2 Confident', 'Bundling', NULL, '90160', NULL, '100', 'Key Ingredients Confident:\r\nBentonite clay, camelia sinensis (matcha) leaf extract\r\n\r\nKegunaan masker Confident : \r\n- Meredakan bruntusan atau jerawat dalam kondisi sedang-berat\r\n- Mengontrol produksi minyak berlebih pada wajah karna memiliki drying agent\r\n- Gentle exfoliator karena tekstur super halus\r\n\r\nKey Ingredients CeraMON:\r\n- Ceramide\r\n- DNA Salmon\r\n- Triple Hyaluronic Acid \r\n- Mugwort\r\n- Cica\r\n- Algae Extract\r\n- Panthenol\r\n- Squalance\r\n- PGA ', NULL, 100, 'bundling3.jpeg', 'ceramon3.jpeg', 'confi2.jpeg', NULL),
(12, 'Prettywell Bundle 2 CeraMON 50mL', 'Bundling', NULL, '114080', NULL, '100', 'CERAMON BARRIER MOISTFULL GEL - FOR ALL SKIN TYPES\r\n\r\nMoisturizer yang diformulasikan oleh 3 jenis hyaluronic acid dan polyglutamic acid untuk memberikan hidrasi kulit yang maksimal. Dikombinasikan dengan ceramide dan DNA salmon yang terbukti secara ilmiah dapat memperkuat skin barrier dan meningkatkan elastisitas kulit. ', NULL, 100, 'bundling4.jpeg', 'ceramon2.jpeg', 'ceramon3.jpeg', 'ceramon4.jpeg'),
(13, 'Prettywell Bundle 3 Confident Clay Mask', 'Bundling', 'Slug 1, Slug 2', '49680', '', '100', 'Kegunaan masker \"CONFIDENT\" : \r\n- Meredakan bruntusan atau jerawat dalam kondisi sedang-berat\r\n- Mengontrol produksi minyak berlebih pada wajah karna memiliki drying agent\r\n- Gentle exfoliator karena tekstur super halus', NULL, 100, 'bundling5.jpeg', 'fancy2.jpeg', 'fancy3.jpeg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`) VALUES
(5, 'Moisturizer'),
(6, 'Face Oil'),
(7, 'Clay Mask');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `account_name` varchar(64) DEFAULT NULL,
  `stars` tinyint(1) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `account_name`, `stars`, `comment`, `created_at`) VALUES
(1, 2, NULL, 5, 'Mantap Jiwa', '2023-06-09 08:16:07'),
(2, 2, 'Rezy Andrean R', 4, 'Review 2', '2023-06-09 08:33:40'),
(3, 2, 'Rezy Andrean R', 5, 'Sangat Bagus', '2023-06-09 08:34:46'),
(64, 2, 'Rezy Andrean R', 5, 'Sangat bermanfaat', '2023-06-09 08:36:32'),
(65, 2, 'Rezy Andrean R', 5, 'Barang bagus', '2023-06-19 07:07:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reseller`
--

CREATE TABLE `reseller` (
  `id_reseller` int(4) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(16) DEFAULT NULL,
  `store_url` varchar(64) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `upload_ktp` varchar(32) DEFAULT NULL,
  `upload_npwp` varchar(32) DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reseller`
--

INSERT INTO `reseller` (`id_reseller`, `full_name`, `email`, `whatsapp`, `store_url`, `city`, `postal_code`, `address`, `upload_ktp`, `upload_npwp`, `date_created`) VALUES
(1, 'Rezy Andrean Rosyidin', 'rezzyandrean@gmail.com', '081567534281', '@rezystore', 'Madiun', '63152', 'Garon RT 21 RW 04', 'npwpp.jpg', 'npwpp.jpg', '2023-06-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slug`
--

CREATE TABLE `slug` (
  `id` int(11) NOT NULL,
  `name_slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slug`
--

INSERT INTO `slug` (`id`, `name_slug`) VALUES
(3, 'Acne'),
(4, 'Dryness'),
(5, 'Sensitive Skin'),
(6, 'Dark Spot'),
(7, 'Dry');

-- --------------------------------------------------------

--
-- Struktur dari tabel `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `store_name` varchar(50) DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `gambar` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id`, `store_name`, `location`, `address`, `phone`, `gambar`) VALUES
(2, 'Leora Cabang Pare', 'Depan Lapangan Canda Bhirawa', 'Jl. Panglima Sudirman, Tulungrejo, Kec. Pare, Kabupaten Kediri, Jawa Timur 64293', '0811-354-488', 'leora-pare.jpeg'),
(3, 'Leora Cabang Kediri', 'Depan Plaza Telkom', 'Jl. Hayam Wuruk No.8, Dandangan, Kec. Kota, Kota Kediri, Jawa Timur 64129', '0811-354-488', 'leora-kediri.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date_of_birth`, `phone`, `province`, `city`, `address`, `date_created`) VALUES
(1, 'Rezy Andrean R', 'rezyandrean@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '085156736325', NULL, NULL, 'Garon RT 21 RW 04 Balerejo', '2023-02-24 14:24:20'),
(2, 'Husna Nur Azizah', 'husnanzz@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, '082665261123', NULL, NULL, 'Krenceng, Kediri', '2023-02-24 14:24:49'),
(3, 'Muichiroo', 'muichiro@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, '088277262772', NULL, NULL, 'Garon RT 21 RW 04 Balerejo', '2023-02-24 14:30:24'),
(8, 'Novendra Ilham Windianto', 'novendrailham@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2023-05-29', '0109097317', '11', '248', 'Dusun Karanganyar Desa Nglanduk Kec. Wungu', '2023-05-29 15:51:32'),
(9, 'Rezy Andrean R', 'rezzyandrean@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '0000-00-00', '085156736325', '11', '247', 'Garon RT 21 RW 04, Balerejo MAdiun', '2023-05-29 17:58:04'),
(10, 'Super Rezy', 'rezy@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1997-01-13', '0812223334455', 'Jawa Timur', 'Kabupaten Madiun', 'Garon RT 21 RW 04, Balerejo', '2023-07-13 15:25:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`idD`);

--
-- Indeks untuk tabel `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`idM`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id_reseller`);

--
-- Indeks untuk tabel `slug`
--
ALTER TABLE `slug`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `idD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `order_master`
--
ALTER TABLE `order_master`
  MODIFY `idM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id_reseller` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `slug`
--
ALTER TABLE `slug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
