-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2014 at 02:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kip`
--

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE IF NOT EXISTS `informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `category`, `title`, `slug`, `description`, `attachment`, `created_at`, `updated_at`) VALUES
(10, 'Berkala', 'Prosedur Operasional Standar (POS) Ujian Nasional Tahun Pelajaran 2013/2014', 'prosedur-operasional-standar-pos-ujian-nasional-tahun-pelajaran-20132014', 'Berisi tentang prosedur penyelenggaran Ujian Nasional Tahun Pelajaran 2013/2014 beserta Peraturan Menteri dan Surat Edaran Resmi dari...', 'uploads/KLbJUTtY/Show-Hide-Password-Field-Text-with-jQuery-Bootstrap.zip', '2014-05-20 08:18:36', '2014-05-20 08:18:36'),
(11, 'Berkala', 'APBN 2009-2013', 'apbn-2009-2013', 'Alokasi dan Realisasi DIPA (APBN) 2009-2013 Dikes Provinsi...', 'uploads/OJIGFTWj/Report Fields.xlsx', '2014-05-20 08:20:39', '2014-05-20 08:20:39'),
(12, 'Sertamerta', 'Daftar Informasi Publik', 'daftar-informasi-publik', 'Berisi tentang program bidang pendidikan pemuda dan olahraga Dinas Dikpora Provinsi...\r\n', 'uploads/WAuVOcW1/status CHM CSK.doc', '2014-05-20 08:21:37', '2014-05-20 08:21:37'),
(13, 'Setiap saat', 'DPA DIKPORA 2013 (UPTD BPPSPO)', 'dpa-dikpora-2013-uptd-bppspo', 'Dokumen pelaksanaan perubahan anggaran satuan kerja Dinas Dikpora NTB Tahun anggaran 2013 (UPTD...\r\n', 'uploads/vcjc1m78/AIR PUTIH.pdf', '2014-05-20 08:37:18', '2014-05-20 09:47:54'),
(14, 'Dikecualikan', 'Kecuali Dia Ho uwo Uwos', 'kecuali-dia-ho-uwo-uwos', 'hahaha ahahahas', '', '2014-05-20 08:45:10', '2014-05-20 09:33:56'),
(16, 'Dikecualikan', 'PDIP klaim pengurus Golkar dan PPP Jabar dukung Jokowi-JK', 'pdip-klaim-pengurus-golkar-dan-ppp-jabar-dukung-jokowi-jk', 'Merdeka.com - PDIP Jabar klaim Jokowi-JK didukung dari Agus Gumiwang dan Rahmat Yasin\r\n\r\nKetua DPD PDIP Jawa Barat TB Hasanuddin mengklaim mendapatkan banyak dukungan dari luar partai koalisi untuk memenangkan pasangan Jokowi-Jusuf Kalla (JK). Tidak hanya mendapat pecahan suara dari Golkar, PDIP Jabar juga mengaku mendapat dukungan dari PPP.\r\n\r\nTB Hasanuddin melihat banyak kader muda Golkar masuk mendukung Jokowi-JK. Termasuk Ketua Bappilu Jabar Golkar, Agus Gumiwang.\r\n\r\n"Saya lihat di Jawa Barat cukup banyak, bukan hanya kader muda Golkar (Agus Gumiwang), tapi kader di grassroot lebih deket Jokowi-JK," kata TB Hasanuddin saat dihubungi, Jumat (23/5).\r\n\r\nDia juga melihat PPP Jabar pecah tidak satu suara mendukung pasangan Prabowo-Hatta. Dia yakin, Bupati Kabupaten Bogor Rahmat Yasin yang kini mendekam di KPK juga dukung Jokowi-JK.\r\n\r\n"Termasuk PPP juga terpecah, Jawa Barat Pak Rahmat Yasin sudah menyatakan ikut Jokowi-JK, jadi kita tidak sendirian," klaim dia.\r\n\r\nSeperti diketahui, pasangan Jokowi-JK diusung oleh lima parpol koalisi yakni, PDIP, PKB, NasDem, Hanura dan PKPI. Sementara Prabowo-Hatta diusung oleh Golkar, Gerindra, PAN, PPP, PKS dan PBB.\r\n\r\n[has]', '', '2014-05-23 07:27:54', '2014-05-23 07:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_06_114909_create_users_table', 1),
('2014_05_06_114932_create_requests_table', 1),
('2014_05_06_114947_create_responses_table', 1),
('2014_05_13_191341_create_password_reminders_table', 2),
('2014_05_19_120944_create_setting_table', 3),
('2014_05_20_101946_create_informations_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reminders`
--

INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
('ariez.id@gmail.com', '59f476d6ee06746ae0831b55bade7f4be9357bd1', '2014-05-16 03:26:47'),
('ariez.id@gmail.com', '77837206a4818808e4c849a97bb57d4aaf36704b', '2014-05-19 05:19:41'),
('ariez.id@gmail.com', 'eec0f5a31080543dd136c4f16e557a36633cac52', '2014-05-19 05:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `file_attach` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`key`, `value`) VALUES
('site_name', '{Aris Setyono}'),
('per_page', '10'),
('mail_driver', 'smtp'),
('mail_host', 'mail.arisst.com'),
('mail_port', '25'),
('mail_username', 'noreply@arisst.com'),
('mail_password', 'aris123'),
('site_theme', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ktp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activate_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `ktp`, `level`, `status`, `password`, `remember_token`, `activate_key`, `created_at`, `updated_at`) VALUES
(19, 'Aris Setyono', 'me@arisst.com', '085259838599', 'Jalan Raya Ragunan, Pasar Minggu, Jakarta Selatan, Indonesia', '900000000323423', 1, 1, '$2y$10$enbhWXmFaKzb24TJNtgltuioA2xTcNcr6eAszJi7idoJFMEQKg/Ye', 'zlG6YxOl5LiJJzkLj8BAr0Ty0lzHfq7W59wrIU3nl593fBem1zgZdjhT1xYC', NULL, '2014-05-14 08:10:37', '2014-05-23 03:14:18'),
(21, 'Aris Setyono', 'ariez.id@gmail.com', '085259838599', '123123', '9000000001232131', 3, 1, '$2y$10$ugSl/dzepTky7FzfKsdhZe1OIIiLeLoafzZ2cyKvM36JNTdmHTYx2', 'FkkgTf9kdzBiFpFoTyGXGJTpzN0wf10HaOsySqaYUWvWRtj0w2I8QfHhYFS8', '', '2014-05-14 09:02:40', '2014-05-20 08:09:14'),
(22, 'Embuh', 'ariez@gmail.com', NULL, NULL, NULL, 3, 1, '$2y$10$af2T9izWkKNtadI8omRhG.XITjvf7W043iqteBd0VWKDZWh/s/OsO', NULL, NULL, '2014-05-19 03:51:04', '2014-05-19 03:53:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
