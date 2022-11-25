-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Nov 2022 pada 16.21
-- Versi server: 10.3.37-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokojeru_amerta_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id_content` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id_content`, `judul`, `deskripsi`, `url`) VALUES
('1cc276794959', 'Contact us', 'Contact us', 'home'),
('2ec2e04bf1c9', 'Shop Now, and get best price from us!', 'Since 2022, Amerta Botanicals has been supplying pure, potent, premium botanical supplements to health-conscious people located throughout the country.', 'home'),
('32fbf0e205f1', 'Amerta Botanical', ' We deliver high quality kratom products with GMP standardized production and will always give you the best price', 'home');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content_image`
--

CREATE TABLE `content_image` (
  `id_content_image` int(11) NOT NULL,
  `id_content` varchar(128) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `content_image`
--

INSERT INTO `content_image` (`id_content_image`, `id_content`, `image`) VALUES
(14, 'about', 'logo-sm.png'),
(16, 'about', 'sg.jpg'),
(17, 'about', 'WhatsApp_Image_2022-10-01_at_21_57_41.jpeg'),
(18, 'about', 'WhatsApp_Image_2022-10-01_at_21_57_42.jpeg'),
(20, '32fbf0e205f1', 'logo-sm1.png'),
(21, '2ec2e04bf1c9', 'image.jpg'),
(22, '1cc276794959', 'IMG-20221101-WA0000.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `url`) VALUES
(3, 'IMG-20221026-WA0002.jpg'),
(4, 'IMG-20221026-WA0001.jpg'),
(5, 'IMG-20221026-WA0003.jpg'),
(6, 'IMG-20221026-WA0000.jpg'),
(7, 'IMG-20221101-WA0000.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `id_inbox` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`id_inbox`, `name`, `email`, `subject`, `message`) VALUES
('e0aabe0a12ac', 'Sophia Moore', 'sophiamoore.ontime@gmail.com', 'Re: Increase traffic to your website', 'Greeting of the day!\r\n\r\nWe are interested to increase traffic to your website, please get back to us in order to discuss the possibility in further detail.\r\n\r\nPlease mention your phone number and suitable time to talk.\r\n\r\nWell Wishes\r\nSophia\r\n\r\n\r\n (https://amertabotanical.com/contact)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pesanan` varchar(128) NOT NULL,
  `total_pesanan` varchar(128) NOT NULL,
  `status_pesanan` int(11) NOT NULL,
  `contact_number` varchar(128) NOT NULL,
  `contact_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_bukti_tf`
--

CREATE TABLE `pesanan_bukti_tf` (
  `id_bukti_tf` int(11) NOT NULL,
  `id_pesanan` varchar(128) NOT NULL,
  `bukti_tf` text NOT NULL,
  `date_added` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` varchar(128) NOT NULL,
  `id_produk` varchar(128) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_item` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `preorder`
--

CREATE TABLE `preorder` (
  `id_po` varchar(128) NOT NULL,
  `nama_customer` varchar(128) NOT NULL,
  `tanggal_po` varchar(128) NOT NULL,
  `jumlah_po` varchar(128) NOT NULL,
  `modal_po` varchar(128) NOT NULL,
  `uang_kembali` varchar(128) NOT NULL,
  `total` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(128) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `harga_lama` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `deskripsi_panjang` text NOT NULL,
  `stok` int(11) NOT NULL,
  `date_created` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `harga_lama`, `deskripsi`, `deskripsi_panjang`, `stok`, `date_created`) VALUES
('2f3d2e1404f0', 'SUPER GREEN AMERTA', '40', '0', 'Nano', ' happens to be the newest hit in the Kratom space. This type of pure Kratom is quickly becoming popular as it causes relation as well as stimulation simultaneously! You read that right! This particular strain will not only get you high but it will also give you a calming effect. This strain is popular for its effectiveness and it has enabled people to have an easy time while studying, working or even when they need to focus more.\r\n\r\nThe excitement that this brings can be compared to the one experienced when one takes red veined Kratom. Having an elevated mood, great confidence as well as socializing helps a person in communicating better. In that case, it works very well for different occasions such as parties.\r\n\r\nWhatsApp:+6281281963747\r\n\r\nBecause this is a super Kratom strain, you do not need a high dosage and about 2g is good to go. In case the desired effects are not experienced, you can take another gram or two in a span of 30 minutes until you get the sweet spot for you. High doses lessen the effects and in this case, one should avoid this. High doses can also lead to nausea as well as headaches.\r\n\r\nIt works on the Opiate receptors found in our brain as well as the periphery to produce stimulation while evoking intense responses. It works in a similar manner to Opiates in making one high while inducing euphoria as well as mood enhancement. The stimulation effects of this strain also work in the promotion of motivation for one to keep working or studying as well as being awake.', 1, '1664852009'),
('5a31ca90784f', 'GREEN MAENGDA', '40', '0', 'Nano', 'GREEN MAENG DA Natural mood enhancer\r\n\r\nThis strain is used recreationally quite often since it provides a natural mood enhancement to those who use it. It can be a great way to help someone relax and to even help them deal with certain kinds of anxiety. This strain could be useful for someone who suffers from social anxiety before going into a big crowd, for example. \r\n\r\nA natural and powerful boost of energy\r\n\r\nLike other kinds of kratom, this strain can provide energy-boosting effects similar to that of caffeine, but without the jitters, at lower doses. Instead of making you feel all hyped up, you will feel enhanced sharpness and mental clarity, making this strain a great way to wake yourself up in the morning without needing to reach for the coffee pot.\r\n\r\nThese are just a few of the reasons kratom users enjoy Green Maeng Da kratom, for both medical as well as recreational uses. If any of these benefits sound like they could be of use to you, then you might find this strain of kratom to be one of the best choices for you, as long as you are purchasing quality kratom.\r\n\r\nWhatsApp: +6281281963747\r\nFast Response\r\n\r\nGreen Maeng Da kratom is one of the more potent strains you will be able to find anywhere, so it is strongly advised for new users to start off with small doses before jumping into the bigger ones. You should start off with one gram, and slowly work your way up as you get used to how higher dosages affect you.\r\n\r\nThree to five grams of this strain should be enough to show you how its effects work, while higher dosages of six to eight grams should be left only to those who are experienced enough with kratom to know how it is going to affect them.  Once you find the right dosage for you, it is only a matter of adjusting over time, since your tolerance will go up the more you use any strain of kratom.', 1, '1665297990'),
('ae306994be32', 'GREAT WHITE AMERTA', '40', '0', 'Nano', 'Great White Amerta \r\nGreat White Amerta vein kratom is known as a stimulant and positive mood enhancer. The effect of each strain off course depends on numerous factors such as the quality of the product, lifestyle and tolerance level of the individual. However, the trend is that the white veins are most stimulating and euphoric of all kratom strains. White kratom is increasingly taken instead of coffee (caffeine) for alertness, concentration and cheerfulness. Many have come to take white kratom for increased concentration, motivation and stamina during long working days.\r\n\r\nFor those who experience gloomy periods or at times feel very exhausted experience the best results when using this strain of kratom. Advisable is to not take this too late in the day as this can lead to restless sleep. It is common practice to mix white vein powder with red vein strains in order to achieve a more balanced boost in energy.\r\n\r\nPerfect Dosage\r\nIf you are good to go, you can choose from the various packaging available for purchase. White Maeng Da does not have a proper dosage guideline but ideally your consumption should depend on your body type, physique, food intake, and other drug consumption. \r\n\r\nUsually, it is recommended to take small doses, twice or thrice a week and not daily to avoid dependence and build-up of tolerance. In powder form, it can be taken 2-4 grams in one serving for medicinal purposes which is recommended for most adults having ideal body weight. \r\n\r\nPeople who are heavy need to consume extra 0.5 kg per 10 kg increase from ideal body weight. This dosage lasts for 5 to 7 hours and sometimes may even last for as long as 10-12 hours. If you consume it after having food, the effects may appear after 3-4 hours and if you take it on an empty stomach, the effects will appear within 15-30 minutes.', 1, '1664887731'),
('e207dfc1eaa9', 'GREAT RED AMERTA', '40', '0', 'Nano', 'Great Red Amerta\r\nmay be used by individuals experiencing withdrawal symptoms from heroin and cocaine. It works by binding with opioid receptors in the brain, giving you a relaxing feeling.\r\n\r\nWhite-veined strains may suit people who want to boost their energy levels while stimulating their bodies so that they can work for a prolonged time with optimal concentration. When taken in large quantities, it may work as a sedative helping people struggling with insomnia and chronic pains.\r\n\r\nRed Maeng da is an intermediary between the white and red leaf types. Most users of this strain are looking for a safe way to improve their moods and balance their emotions. \r\n\r\nWhatsApp: +6281281963747\r\n\r\nGreat Red Anerta Strains tend to be filled with the most full body tranquility and relaxation of Kratom (other than Yellow Strains). Red Kratom is usually dried longer than Green or White Kratom. The leaves considered Red Kratom are also most often on the taller part of the Kratom trees; therefore, they receive the most sunlight. Red Kratom Strains also often help those most looking for pain relief, sleep and other physical discomforts.', 1, '1664852031');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_image`
--

CREATE TABLE `produk_image` (
  `id_image` int(11) NOT NULL,
  `id_produk` varchar(128) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk_image`
--

INSERT INTO `produk_image` (`id_image`, `id_produk`, `gambar`) VALUES
(2, '0ec884a1d7f7', 'redhaki.png'),
(7, '5499b27a55f0', 'haki.png'),
(28, '5a31ca90784f', 'green-up.jpg'),
(29, '5a31ca90784f', 'green1.jpg'),
(30, 'e207dfc1eaa9', 'red.jpg'),
(31, 'e207dfc1eaa9', 'red-up.jpg'),
(32, 'ae306994be32', 'white.jpg'),
(33, 'ae306994be32', 'white-up.jpg'),
(34, '2f3d2e1404f0', 'sg.jpg'),
(35, '2f3d2e1404f0', 'sg-up.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_review`
--

CREATE TABLE `produk_review` (
  `id_review` int(11) NOT NULL,
  `id_produk` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `review` text NOT NULL,
  `tanggal_review` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `country` varchar(128) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  `email_valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `country`, `role_id`, `is_active`, `date_created`, `email_valid`) VALUES
(1, 'super admin', 'dev@amertabotanical.com', 'user.png', '$2y$10$uVBi7SDDc8lsI2mXehSFOu/yebR/LCfq3SRyknKUuACYdpc7h03uG', '', 1, 1, '1664729882', 0),
(2, 'Admin', 'admin@amertabotanical.com', 'user.png', '$2y$10$uVBi7SDDc8lsI2mXehSFOu/yebR/LCfq3SRyknKUuACYdpc7h03uG', 'Indonesia', 1, 1, '1664729935', 0),
(3, 'Raihan Ramadhan', 'reyhanrmdhn1@gmail.com', 'raihan.jpg', '$2y$10$hpxiyqI4lozn8vaGSlLoOOz8Jbq5.OSwh6aqlNUVl5Weti8UYOAGi', 'Indonesia', 2, 1, '1664909920', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(16, 1, 8),
(17, 1, 4),
(18, 1, 3),
(19, 1, 2),
(21, 1, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` text NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 'Dashboard', 'admin/dashboard', 'uim uim-analysis', 0),
(2, 'Orders', 'admin/orders', 'uim uim-airplay', 1),
(3, 'Customers', 'admin/customers', 'uim uim-at', 1),
(4, 'Products', 'admin/products', 'uim uim-box', 1),
(5, 'Gallery', 'admin/gallery', 'uim uim-scenery', 1),
(6, 'Inbox', 'admin/inbox', 'uim uim-comment-alt-message', 1),
(7, 'Content Managemet', 'admin/content', 'uim uim-web-grid', 1),
(8, 'User Management', 'admin/users', 'uim uim-briefcase', 1),
(9, 'Pre-Order', 'admin/preorder', 'uim uim-calender', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Sales Marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` text NOT NULL,
  `date_created` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'reyhanrmdhn1@gmail.com', 'i/su+iZeTYIyoTYz/Bv9O0dpoSqgYoyLdzRqHIR1CPg=', '1665401372');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`);

--
-- Indeks untuk tabel `content_image`
--
ALTER TABLE `content_image`
  ADD PRIMARY KEY (`id_content_image`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id_inbox`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `pesanan_bukti_tf`
--
ALTER TABLE `pesanan_bukti_tf`
  ADD PRIMARY KEY (`id_bukti_tf`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `preorder`
--
ALTER TABLE `preorder`
  ADD PRIMARY KEY (`id_po`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_image`
--
ALTER TABLE `produk_image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indeks untuk tabel `produk_review`
--
ALTER TABLE `produk_review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `content_image`
--
ALTER TABLE `content_image`
  MODIFY `id_content_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan_bukti_tf`
--
ALTER TABLE `pesanan_bukti_tf`
  MODIFY `id_bukti_tf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk_image`
--
ALTER TABLE `produk_image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `produk_review`
--
ALTER TABLE `produk_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
