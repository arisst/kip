-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2014 at 07:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kip`
--

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `category`, `title`, `slug`, `description`, `attachment`, `stats`, `created_at`, `updated_at`) VALUES
(10, 'Berkala', 'Prosedur Operasional Standar (POS) Ujian Nasional Tahun Pelajaran 2013/2014', 'prosedur-operasional-standar-pos-ujian-nasional-tahun-pelajaran-20132014', 'Berisi tentang prosedur penyelenggaran Ujian Nasional Tahun Pelajaran 2013/2014 beserta Peraturan Menteri dan Surat Edaran Resmi dari...', 'awQET0Kp/persons-0024.png', NULL, '2014-05-20 08:18:36', '2014-05-30 09:37:42'),
(11, 'Berkala', 'APBN 2009-2013', 'apbn-2009-2013', 'Alokasi dan Realisasi DIPA (APBN) 2009-2013 Dikes Provinsi...', 'pSGUUIit/persons-0019_large.png', NULL, '2014-05-20 08:20:39', '2014-05-30 09:37:50'),
(12, 'Sertamerta', 'Daftar Informasi Publik', 'daftar-informasi-publik', 'Berisi tentang program bidang pendidikan pemuda dan olahraga Dinas Dikpora Provinsi...\r\n', 'uUe1AS24/persons-0016.png', NULL, '2014-05-20 08:21:37', '2014-05-30 09:37:57'),
(13, 'Setiap saat', 'DPA DIKPORA 2013 (UPTD BPPSPO)', 'dpa-dikpora-2013-uptd-bppspo', 'Dokumen pelaksanaan perubahan anggaran satuan kerja Dinas Dikpora NTB Tahun anggaran 2013 (UPTD...\r\n', '6vwP4fNr/persons-0007.png', NULL, '2014-05-20 08:37:18', '2014-05-30 09:38:06'),
(14, 'Dikecualikan', 'Kecuali Dia Ho uwo Uwos', 'kecuali-dia-ho-uwo-uwos', 'hahaha ahahahas', 'ImejAX9L/o-EMOTICON-facebook.jpg', NULL, '2014-05-20 08:45:10', '2014-05-30 09:38:14'),
(16, 'Dikecualikan', 'PDIP klaim pengurus Golkar dan PPP Jabar dukung Jokowi-JK', 'pdip-klaim-pengurus-golkar-dan-ppp-jabar-dukung-jokowi-jk', 'Merdeka.com - PDIP Jabar klaim Jokowi-JK didukung dari Agus Gumiwang dan Rahmat Yasin\r\n\r\nKetua DPD PDIP Jawa Barat TB Hasanuddin mengklaim mendapatkan banyak dukungan dari luar partai koalisi untuk memenangkan pasangan Jokowi-Jusuf Kalla (JK). Tidak hanya mendapat pecahan suara dari Golkar, PDIP Jabar juga mengaku mendapat dukungan dari PPP.\r\n\r\nTB Hasanuddin melihat banyak kader muda Golkar masuk mendukung Jokowi-JK. Termasuk Ketua Bappilu Jabar Golkar, Agus Gumiwang.\r\n\r\n"Saya lihat di Jawa Barat cukup banyak, bukan hanya kader muda Golkar (Agus Gumiwang), tapi kader di grassroot lebih deket Jokowi-JK," kata TB Hasanuddin saat dihubungi, Jumat (23/5).\r\n\r\nDia juga melihat PPP Jabar pecah tidak satu suara mendukung pasangan Prabowo-Hatta. Dia yakin, Bupati Kabupaten Bogor Rahmat Yasin yang kini mendekam di KPK juga dukung Jokowi-JK.\r\n\r\n"Termasuk PPP juga terpecah, Jawa Barat Pak Rahmat Yasin sudah menyatakan ikut Jokowi-JK, jadi kita tidak sendirian," klaim dia.\r\n\r\nSeperti diketahui, pasangan Jokowi-JK diusung oleh lima parpol koalisi yakni, PDIP, PKB, NasDem, Hanura dan PKPI. Sementara Prabowo-Hatta diusung oleh Golkar, Gerindra, PAN, PPP, PKS dan PBB.\r\n\r\n[has]', '3COPpSYB/BkT_eKCCYAIld-9.png', NULL, '2014-05-23 07:27:54', '2014-05-30 09:38:22'),
(17, 'Sertamerta', 'cx', 'cx', 'asd', '', NULL, '2014-06-02 07:59:02', '2014-06-02 07:59:02'),
(18, 'Berkala', 'saPBN 2009-2013', 'sapbn-2009-2013', 'asd', '', NULL, '2014-06-02 07:59:33', '2014-06-02 07:59:33');

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

--
-- Dumping data for table `password_reminders`
--

INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
('ariez.id@gmail.com', '59f476d6ee06746ae0831b55bade7f4be9357bd1', '2014-05-16 03:26:47'),
('ariez.id@gmail.com', '77837206a4818808e4c849a97bb57d4aaf36704b', '2014-05-19 05:19:41'),
('ariez.id@gmail.com', 'eec0f5a31080543dd136c4f16e557a36633cac52', '2014-05-19 05:23:47');

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `information_id`, `title`, `description`, `status`, `added_on`) VALUES
(1, 21, 12, 'Pendidikan', 'Tak gawe ngrepek', 0, '0000-00-00 00:00:00'),
(2, 21, 12, 'sdfsd', 'sdfsdfsdf', 0, '0000-00-00 00:00:00'),
(4, 21, 13, 'lorem ipsum', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2014-06-02 07:44:58'),
(5, 21, 13, 'Untuk kalangan sendiri', 'kami meminta dengan sangat data ini karena akan kami gunakan untuk keperluan kantor yang sangat mendesak, sehingga semakin cepat semakin baik ya tterimakasih sebelumnya dan selamat siang.', 0, '2014-06-02 07:58:11');

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`key`, `value`) VALUES
('site_name', 'KIP'),
('per_page', '5'),
('mail_driver', 'smtp'),
('mail_host', 'mail.arisst.com'),
('mail_port', '25'),
('mail_username', 'noreply@arisst.com'),
('mail_password', 'aris123'),
('site_theme', 'default');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `ktp`, `level`, `status`, `password`, `remember_token`, `activate_key`, `created_at`, `updated_at`) VALUES
(19, 'Aris Setyono', 'me@arisst.com', '085259838599', 'Jalan Raya Ragunan, Pasar Minggu, Jakarta Selatan, Indonesia', '900000000323423', 1, 1, '$2y$10$enbhWXmFaKzb24TJNtgltuioA2xTcNcr6eAszJi7idoJFMEQKg/Ye', 'y1IqtHYhk0rw47LohrvIukJjSdseGvMSsfBJA7bo6BfL60db6zMeO4M3sAMd', NULL, '2014-05-14 08:10:37', '2014-06-02 12:06:52'),
(21, 'Aris Setyono', 'ariez.id@gmail.com', '085259838599', '123123', '9000000001232131', 3, 1, '$2y$10$ugSl/dzepTky7FzfKsdhZe1OIIiLeLoafzZ2cyKvM36JNTdmHTYx2', 'MH9B0L6IkfPCV8nnd4fEfblsNI78bRcxcs2HnD4BfvkrR0oPwHD1iSKaTO18', '', '2014-05-14 09:02:40', '2014-06-02 07:58:34'),
(22, 'Embuh', 'ariez@gmail.com', NULL, NULL, NULL, 3, 1, '$2y$10$af2T9izWkKNtadI8omRhG.XITjvf7W043iqteBd0VWKDZWh/s/OsO', NULL, NULL, '2014-05-19 03:51:04', '2014-05-19 03:53:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
