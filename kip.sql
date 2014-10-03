-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2014 at 07:47 PM
-- Server version: 5.6.17
-- PHP Version: 5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
`id` int(10) unsigned NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stats` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `category`, `title`, `slug`, `description`, `attachment`, `stats`, `created_at`, `updated_at`) VALUES
(10, 'Berkala', 'Prosedur Operasional Standar (POS) Ujian Nasional Tahun Pelajaran 2013/2014', 'prosedur-operasional-standar-pos-ujian-nasional-tahun-pelajaran-20132014', 'Berisi tentang prosedur penyelenggaran Ujian Nasional Tahun Pelajaran 2013/2014 beserta Peraturan Menteri dan Surat Edaran Resmi dari...', 'awQET0Kp/persons-0024.png', NULL, '2014-05-20 08:18:36', '2014-05-30 09:37:42'),
(11, 'Berkala', 'APBN 2009-2013', 'apbn-2009-2013', 'Alokasi dan Realisasi DIPA (APBN) 2009-2013 Dikes Provinsi...', 'pSGUUIit/persons-0019_large.png', NULL, '2014-05-20 08:20:39', '2014-05-30 09:37:50'),
(12, 'Sertamerta', 'Daftar Informasi Publik', 'daftar-informasi-publik', 'Berisi tentang program bidang pendidikan pemuda dan olahraga Dinas Dikpora Provinsi...\r\n', 'uUe1AS24/persons-0016.png', NULL, '2014-05-20 08:21:37', '2014-05-30 09:37:57'),
(13, 'Setiap saat', 'DPA DIKPORA 2013 (UPTD BPPSPO)', 'dpa-dikpora-2013-uptd-bppspo', 'Dokumen pelaksanaan perubahan anggaran satuan kerja Dinas Dikpora NTB Tahun anggaran 2013 (UPTD...\r\n', '6vwP4fNr/persons-0007.png', NULL, '2014-05-20 08:37:18', '2014-05-30 09:38:06'),
(18, 'Berkala', 'saPBN 2009-2013', 'sapbn-2009-2013', 'asd', '', NULL, '2014-06-02 07:59:33', '2014-06-02 07:59:33'),
(19, 'Sertamerta', 'Data Mahasiswa', 'data-mahasiswa', 'Data Mahasiswa Informatika UMM \r\n\r\nSumber : dump database elearning', 'D8ZlmFOJ/Query 1.xlsx', NULL, '2014-06-09 04:56:47', '2014-06-10 08:52:58'),
(20, 'Setiap saat', 'HA Exstension with Suse Linux', 'ha-exstension-with-suse-linux', 'Merupakan informasi mengenai bagaimana cara memanfaatkan SUSE linux sebagai Fail Over server atau disebut High Availability', 'EsTnG3Xi/SUSE Linux Enterprise High Availability Extension.pdf', NULL, '2014-06-10 03:24:51', '2014-06-10 03:33:10');

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
('2014_05_20_101946_create_informations_table', 4),
('2014_06_11_103844_create_pages_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(10) unsigned NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `cat`, `title`, `slug`, `description`, `attachment`, `created_at`, `updated_at`) VALUES
(10, 1, 'Cara Mengajukan Keberatan', 'cara-mengajukan-keberatan', 'Berikut adalah alur cara mengajukan keberatan', 'mengajukan_keberatan.jpg', '2014-06-12 07:05:08', '2014-06-12 07:05:08'),
(11, 1, 'Cara Memperoleh Informasi', 'cara-memperoleh-informasi', 'Carane ngene', 'peroleh_informasi.jpg', '2014-06-12 07:45:22', '2014-06-12 07:45:22'),
(12, 1, 'Cara Mengajukan Sengketa', 'cara-mengajukan-sengketa', 'des', 'mengajukan_sengketa.jpg', '2014-06-12 07:46:32', '2014-06-12 07:46:32'),
(13, 1, 'Cara Penyelesaian Sengketa', 'cara-penyelesaian-sengketa', 'prosedur', 'penyelesaian_sengketa.jpg', '2014-06-12 07:47:30', '2014-06-12 07:47:30'),
(14, 2, 'FAQ', 'faq', '1. Q : Apa yang dimaksud dengan PPID?\r\n\r\n    A : PPID atau Pejabat Pengelola Informasi dan Dokumentasi adalah pejabat yang bertanggung jawab di bidang penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi publik di lingkungan Kementerian Hukum dan HAM Republik Indonesia.\r\n\r\n \r\n\r\n2. Q : Apa yang dimaksud dengan informasi publik?\r\n\r\n    A : Informasi publik  adalah informasi yang dihasilkan, disimpan, dikelola dan dikirim oleh organisasi Badan Publik yang berkaitan dengan penyelenggara dan penyelenggaraan informasi organisasi Badan Publik dan/atau penyelenggaraan badan publik lainnya dalam kerangka koordinasi pengelolaan dan pelayanan informasi lain yang berkaitan dengan kepentingan publik.\r\n\r\n \r\n\r\n3. Q : Ada berapa macam informasi publik?\r\n\r\n    A : Berdasarkan Undang-Undang Nomor 14 tentang Keterbukaan Informasi Tahun 2008, ada 4 (empat) jenis informasi publik, yaitu:\r\n\r\na. informasi yang wajib disediakan dan diumumkan secara berkala;\r\n\r\nb. informasi yang wajib diumumkan secara serta-merta;\r\n\r\nc. informasi yang wajib tersedia setiap saat;\r\n\r\nd. informasi yang dikecualikan.\r\n\r\n \r\n\r\n4. Q : Informasi apa saja yang boleh diminta?\r\n\r\n    A : Semua informasi boleh diminta kecuali yang termasuk dalam informasi yang dikecualikan.\r\n\r\n \r\n\r\n5. Q : Bagaimana cara memperoleh informasi publik?\r\n\r\n    A : Pemohon dapat datang langsung ke loket informasi di ............. dan bisa melalui website ............\r\n\r\n \r\n\r\n6. Q : Siapa saja yang boleh meminta informasi publik?\r\n\r\n    A : Siapa saja boleh meminta informasi publik, baik perseorangan maupun badan hukum dengan menyertakan fotokopi identitas dan fotokopi akta badan hukum untuk pemohon dari badan hukum. \r\n\r\n \r\n\r\n7. Q : Berapa lama waktu yang dibutuhkan untuk mendapatkan informasi publik?\r\n\r\n    A : Informasi akan diberikan paling lama dalam waktu 10 (sepuluh) hari kerja dan dapat diperpanjang paling lambat 7 (tujuh) hari kerja berikutnya dengan memberikan dengan memberikan alasan secara tertulis.', '', '2014-06-12 07:48:16', '2014-06-12 07:48:16'),
(15, 3, 'Tentang PPID', 'tentang-ppid', 'SEJARAH\r\n\r\nPeraturan Pemerintah Nomor 2 tahun 1945 tentang Pembentukan Departemen-Departemen di Republik Indonesia\r\nPengumuman Pemerintah tanggal 19 Agustus 1945 tentang Pembentukan Kabinet I, untuk Departemen Kehakiman Republik Indonesia diangkat Prof.DR. MR. SUPOMO sebagai Menteri Kehakiman Republik Indonesia pertama kemudian pada tanggal 1 Oktober 1945 Departemen Kehakiman diperluas\r\n               * Kejaksaan berdasarkan Maklumat Pemerintah tahun 1945 tanggal 1 0ktober 1945.\r\n               * Jawatan Topograpi berdasarkan Penetapan pemerintah tahun 1945 Nomor 1/S.D.\r\n\r\nMahkamah Islam Tinggi dikeluarkan dari Departemen Kehakiman Republik Indonesia dan masuk ke Departemen Agama Republik Indonesia berdasarkan penetapan pemerintah tahun 1946 Nomor 5/S.D.\r\nJawatan Topograpi dikeluarkan dari Departemen Kehakiman Republik Indonesia dan masuk ke Departemen Pertahanan berdasarkan Penetapan Pemerintah tahun 1946 nomor 8/S.D.\r\nPada tanggal 5 Juli 1959 keluar DEKRIT Presiden untuk kembali ke Undang-undang Dasar 1945. Kemudian dibentuk Lembaga Pembinaan Hukum Nasional (LPHN) ber-dasarkan Keputusan Presiden Nomor 194 tahun 1961 kedudukan LPHN dipindahkan dari Perdana Menteri ke Departemen Kehakiman Republik Indonesia.\r\nUndang-Undang Pedoman 19 tahun 1964, Lembaran Negara nomor 107 tahun 1964 tentang Ketentuan Pokok-Pokok Kekuasaan Kehakiman, berlaku tanggal 31 Oktaber 1964, maka Peradilan Negara Republik Indonesia menjalankan dan melaksanakan hukum yang mempunyai fungsi PENGAYOMAN, yang dilaksanakan dalam lingkungan :\r\n                * Peradilan Umum;\r\n                * Peradilan Agama;\r\n                * Peradilan Militer.\r\n                * Peradilan Tata Usaha Negara\r\n\r\nPada lingkungan Peradilan Umum berdasarkan Undang-Undang Nomor 13 tahun 1965. Lembaran Negara Nomor 70 tahun 1965 menegaskan bahwa Kekuasaan Kehakiman dalam lingkungan Peradilan Umum dilaksanakan oleh :\r\n               * Mahkamah Agung;\r\n               * Pengadilan Tinggi;\r\n               * Pengadilan Negeri.\r\n\r\nUndang-Undang Nomor 19 tahun 1964, Lembaran Negara Nomor 107 tahun 1964 tentang Pokok-Pokok Kekuasaan Kehakiman dianggap tidak sesuai lagi dengan keadaan, maka dikeluarkan Undang-Undang Nomor 14 tahun 1970 tentang Ketentuan-Ketentuan Pokok Kekuasaan Kehakiman dan mulai berlaku tanggal 17 Desember 1970 yang menegaskan Kekuasaan Kehakiman adalah Kekuasaan yang Merdeka, dilaksanakan oleh :\r\n               * Peradilan Umum;\r\n               * Peradilan Agama;\r\n               * Peradilan Militer;\r\n               * Peradilan Tata Usaha Negara.\r\n\r\nKeputusan Presiden Republik Indonesia Nomor 44 tahun 1974 tentang Pokok-Pokok Organisasi Departemen. diatur tentang :\r\n               * Kedudukan Tugas Pokok dan Fungsi Departemen;\r\n               * Susunan 0rganisasi Departemen:\r\n\r\nTugas dan Fungsi Sekretariat Jenderal, Inspektorat Jenderal, Direktorat Jenderal, Staf Ahli dan unit-unit Vertikal di Daerah. Untuk susunan 0rganisasi Departemen Kehakiman Republik Indonesia diatur dalam Keputusan Presiden Republik Indonesia Nomor 45 tahun 1974, Lampiran 3, Keputusan Menteri Kehakiman Republik Indonesia Nomor J.S.4/3/7 tahun 1975 tentang Susunan Organisasi dan Tata Kerja Departemen Kehakiman Republik Indonesia\r\nKeputusan Menteri Kehakiman Republik Indonesia tanggal 23 September 1985 Nomor M.06-UM.01.06 tahun 1985 tentang penetapan Tanggal 30 Oktober Sebagai hari Kehakiman Republik Indonesia. Pada Pasal 2 Hari Kehakiman disebut dengan HARI DHARMA KARYADHIKA.\r\nSistem Holding Company ke Sistem Integrated di lingkungan Departemen Kehakiman Republik Indonesia dengan Surat Persetujuan MENPAN Nomor B 477/I/MENPAN/7/ 84 Tanggal 6 Juli 1984 KEPPRES RI Nomor 124/M Tahun 1984 dan KEPMENKEH RI Nomor M.05-PR.07.10 Tahun 1984 tentang Organisasi dan Tata Kerja Dep. Kehakiman R.I\r\nAkibat Reformasi, dikeluarkan Keputusan Presiden Republik Indonesia Nomor 136 tahun 1999 tentang Kedudukan, Tugas, Fungsi, Susunan Organisasi dan Tata Kerja Departemen. Keputusan Presiden Republik Indonesia Nomor 355/m tahun 1999 tentang Pengangkatan Menteri Hukum dan Perundang-Undangan Republik Indonesia. Keluarnya Undang-Undang Nomor 35 tahun 2000 tentang Perubahan Atas Undang-Undang Nomor 14 tahun 1970 tentang Ketentuan-Ketentuan Pokok Kekuasaan Kehakiman bahwa pada menegaskan untuk di lingkungan Peradilan Umum dikeluarkan dari Departemen Kehakiman Republik Indonesia ke Mahkamah Agung Republik Indonesia dengan masa transisi paling lama 5(lima) tahun (lebih kurang tahun 2003 sudah selesai). Berdasarkan Surat Persetujuan Menteri Negara pendayaan Aparatur Negara Nomor 24/M.PAN/I/2000 dikeluarkan Keputusan Menteri Hukum dan Perundang-Undangan Republik Indonesia Nomor M.O3-PR.07.10 tahun 2000 tanggal 5 April 2000 tentang Organisasi dan Tata Kerja Departemen Hukum dan Perundang-Undangan Republik Indonesia.\r\nSetelah Sidang Tahunan Majelis Permusyawaratan Rakyat Republik Indonesia pada tanggal 7 Agustus 2000 sampai dengan 14 Agustus 2000, Presiden Republik Indonesia KH. ABDURRAHMAN WAHID merampingkan Kabinet Kesatuan dengan mengeluarkan Keputusan Presiden Republik Indonesia Nomor 234/m 2000 tentang pengangkatan Menteri Kehakiman dan hak Asasi Manusia Prof. DR YUSRIL IHZA MAHENDRA', '', '2014-06-12 07:56:13', '2014-06-12 07:56:13'),
(16, 3, 'Visi & Misi', 'visi-misi', 'Visi\r\nMasyarakat Memperoleh Kepastian Hukum\r\n\r\n\r\nMisi\r\nMelindungi Hak Asasi Manusia\r\n', '', '2014-06-12 07:56:39', '2014-06-12 07:56:39'),
(17, 3, 'Struktur PPID', 'struktur-ppid', 'Struktur PPID', 'Unknown', '2014-06-12 07:57:55', '2014-06-12 07:57:55'),
(18, 4, 'Notification Center in OS X 10.10 Yosemite: A Dashboard replacement', 'notification-center-in-os-x-1010-yosemite-a-dashboard-replacement', 'Apple’s Notification Center is a central place to get small details about the status of various applications and system services on your Mac, allowing you to see anything from song information when iTunes changes tracks, to notices about software updates being available. In addition, Notification Center supports quickly tweeting and replying to messages, but in Yosemite the service has been revamped to mimic the Notification Center feature in iOS 7, and might even be geared to eventually replace Dashboard.\r\n\r\nWhile for the most part Yosemite’s Notification Center functions the same as in prior OS X versions by bringing you updates on application and system service activities, it now supports apps that will bring you information such as upcoming calendar events, stock information, weather details, and a world clock. There is also a calculator app that can be added, and a link to the App Store that will let you browse for new apps to add to Notification Center.\r\n\r\nNotification Center in OS X Yosemite\r\nNotification Center in Yosemite now supports apps that can be added and removed by clicking the green and red buttons in this view. New apps can also be found by clicking the App Store link at the bottom of the window (click image for larger view).\r\n\r\nEven though these new features augment the Notification Center service, they do directly overlap with Apple’s prior efforts at the use of the Dashboard to bring widgets to the OS X Desktop.\r\n\r\nWhile Dashboard has been exceptionally useful for some, its development never really took off and Apple has progressively shied away from it by changing the default F-key functions for it to activate LaunchPad instead of Dashboard, and not really promoting its Dashboard service very much. Apple has even removed Dashboard from being one of the default Dock icons in a new user account, instead opting for LaunchPad. As a result, new users that set up their Macs may not even know Dashboard exists.\r\n\r\nFurthermore, Apple’s widget explorer Web page has not changed for years, and remains a relatively inefficient way to locate new Dashboard services to install.\r\n\r\nFollowing these new changes to Yosemite’s Notification Center, it appears Apple is taking its Desktop widget efforts in a new direction, and instead of relying on the Dashboard, is now focusing on Notification Center for this functionality. While Dashboard is still fully supported in OS X Yosemite, the new notification center bridges Apple’s prior Dashboard features, again to an overlay that can be invoked by a gesture, hot corner, or menu bar icon, and brings its services to the Desktop in ways that might eventually be showing Dashboard the door.', 'YosemiteNotificationCenter.png', '2014-06-13 08:16:59', '2014-06-13 08:16:59'),
(19, 4, 'Laravel Quick Tip – get previous / next records.', 'laravel-quick-tip-get-previous-next-records', 'For one of my projects I needed to get an ID of the previous and next record in the DB.\r\n\r\nLet’s say we are logged in as an admin and we are on this user’s page and we want to see next/previous user’s id.\r\n\r\nThe following Eloquent code makes it easy to do that:\r\n\r\n?\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n// Get the current user that will be the origin of our operations\r\n$currentUser = User::find(10);\r\n \r\n// Get ID of a User whose autoincremented ID is less than the current user, but because some entries might have been deleted we need to get the max available ID of all entries whose ID is less than current user''s\r\n$previousUserID = User::where(''id'', ''<'', $currentUser->id)->max(''id'');\r\n \r\n// Same for the next user''s id as previous user''s but in the other direction\r\n$nextUserID = User::where(''id'', ''>'', $currentUser->id)->min(''id'');\r\nThis could go well with portfolios, orders, blog posts, all kinds of things where you need to display next/previous entry links.\r\nEnjoy!', 'LaravelQuickTip-620x390.jpg', '2014-06-13 08:40:58', '2014-06-13 08:40:58'),
(20, 4, 'no pic', 'no-pic', 'loaasdj asdashd sdfsa', '', '2014-08-14 03:46:33', '2014-08-14 03:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `information_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `information_id`, `title`, `description`, `status`, `added_on`) VALUES
(4, 21, 10, 'lorem ipsum', '\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2014-06-02 07:44:58'),
(5, 21, 13, 'Untuk kalangan sendiri', 'kami meminta dengan sangat data ini karena akan kami gunakan untuk keperluan kantor yang sangat mendesak, sehingga semakin cepat semakin baik ya tterimakasih sebelumnya dan selamat siang.', 1, '2014-06-02 07:58:11'),
(6, 24, 11, 'minta informasi detil', 'Untuk referensi studi kasus', 2, '2014-06-09 06:54:08'),
(7, 21, 19, 'Untuk Update data absensi kelas', 'Tight pants next level keffiyeh haven''t heard of them. Photo booth beard raw denim letterpress vegan messenger bag stumptown. Farm-to-table seitan, mcsweeney''s fixie sustainable quinoa 8-bit american apparel have a terry richardson vinyl chambray. Beard stumptown, cardigans banh mi lomo thundercats. Tofu biodiesel williamsburg marfa, four loko mcsweeney''s cleanse vegan chambray. A really ironic artisan whatever keytar, scenester farm-to-table banksy Austin twitter handle freegan cred raw denim single-origin coffee viral.', 1, '2014-06-10 08:44:51'),
(8, 21, 18, 'Ini data apa', 'Tolong dijelaskan', 2, '2014-06-10 08:46:11'),
(11, 31, 10, 'sdfsd', 'fsdfsdfs', 1, '2014-06-16 08:46:28'),
(12, 31, 18, 'sdfsdv', 'svdsvsds', 2, '2014-06-16 09:04:41'),
(13, 31, 11, 'dfgdf', 'dfgdfg', 1, '2014-06-19 04:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `file_attach` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `user_id`, `request_id`, `title`, `description`, `file_attach`, `added_on`) VALUES
(11, 19, 5, 'askda s', 'sdfjsdfsdfs', '0', '2014-06-05 07:39:06'),
(12, 23, 6, 'Mohon maaf', 'Permohonan anda tidak dapat kami terima, dikarenakan informasi yang Anda minta merupakan informasi yang dikecualikan', '0', '2014-06-09 06:56:50'),
(13, 23, 7, 'Data absensi', 'Silahkan digunakan sebaik baiknya', '0', '2014-06-10 08:47:27'),
(14, 23, 8, 'Penjelasan Data', 'Itu data coba coba', '0', '2014-06-10 08:48:06'),
(15, 19, 11, 'saya terima', 'nikah dan kawinnya', '0', '2014-06-18 04:18:09'),
(19, 19, 12, 'penolakan', 'alasan di tolak tidak jelas', '0', '2014-06-18 04:27:09'),
(21, 19, 4, 'sdfs', 'sdfsd', '0', '2014-06-19 05:55:14');

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
('address', 'Komplek Kejaksaan Agung Blok F – 20,\r\nJl. Raya Ragunan,\r\nKelurahan Pasar Minggu,\r\nKecamatan Pasar Minggu.\r\nJakarta Selatan 12520.\r\n\r\nTelp. 021-7805045'),
('logo', 'Logo_AirPutih.png'),
('mail_driver', 'smtp'),
('mail_encryption', 'tls'),
('mail_host', 'mail.arisst.com'),
('mail_password', 'eyJpdiI6IlRiYU9OQmIwSk1wblBBdGUrR1UyUW9DTThuMGhkdWJVdFZ2MUkrKzNXN289IiwidmFsdWUiOiJZbU10NEVGalZVeEEwTzlZUThpWjNrdnR5cFNrdDZNQXVEaGF4YUxoSk5nPSIsIm1hYyI6ImRkMTI4NjQ3OGQyYzE3M2Y4ZDI4ZTNmNThiMTZmYzYyMTJiY2UzYTExOTU4NjJkNjA0YzZkNmYwNTE2ZjE5NjkifQ=='),
('mail_port', '25'),
('mail_username', 'noreply@arisst.com'),
('per_page', '10'),
('site_name', 'KIP AirPutih'),
('site_theme', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `ktp`, `level`, `status`, `password`, `remember_token`, `activate_key`, `created_at`, `updated_at`) VALUES
(19, 'Admin', 'me@arisst.com', '', '', '', 1, 1, '$2y$10$enbhWXmFaKzb24TJNtgltuioA2xTcNcr6eAszJi7idoJFMEQKg/Ye', 'I4VFwrVR93Qepuuh2AdahAigqjl9Okada5Ei7u4ZdXyhBmyOBRJO09wVjFko', NULL, '2014-05-14 08:10:37', '2014-06-19 06:05:31'),
(23, 'admin', 'admin@kip.local', NULL, NULL, NULL, 1, 1, '$2y$10$Iy9RbSmgmGaEzhOMpzhSqes0alCScwmvz3YA/5/vkXhm/7WAhPFwu', 'yteVExFAwSPgMVFJrmzhGjCkesOuSH9ZXohrI42Ey3mEdLEUnpu6i1Bo6kB4', NULL, '2014-06-05 08:21:56', '2014-08-14 03:46:37'),
(24, 'Agung', 'agung@airputih.or.id', '0987654321', 'Jakarta', '5432167890', 3, 1, '$2y$10$LvXWfz2K9nqAw8Xp/AFUG.5OvBk9PQexfZudTNpYNgQouCashhRRS', 'wIsOppuFnzw9rvgNDM1MZ0xYTYrQJvr5SIrRzAPr4kjrxC67QbBUA6aHwBcS', '', '2014-06-09 06:52:02', '2014-06-09 07:03:08'),
(30, 'Aris', 'aris@airputih.or.id', '123', '123123', '123123', 2, 1, '$2y$10$yexHsRT6NxipHUC2IX.ixufu.lm4MF9N9TcccyYnKtUGl0uckQ.Iq', NULL, '', '2014-06-16 03:46:38', '2014-06-16 03:47:12'),
(31, 'Aris Setyono', 'ariez.id@gmail.com', '0812345678', 'Jalan Raya Kebon Jeruk\r\nJakarta Pusat\r\nDKI Jakarta\r\n11020', '908070120000001', 3, 1, '$2y$10$5nxhSO4r3P0O8VBvDI5FUONonpRYN40FIQNOluVDYV3PsxqAjsUSO', '9zn3ndSXiX78B4Wqsd3jo42zzYJ0Qi8v3xtCaO60dMXieBnXRmJN6bAErw9S', '', '2014-06-16 06:44:56', '2014-09-18 05:14:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `password_reminders`
 ADD KEY `password_reminders_email_index` (`email`), ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
 ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
