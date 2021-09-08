-- Adminer 4.8.1-dev MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `bus_vaksin` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bus_vaksin`;

DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus` (
  `id_bus` varchar(255) NOT NULL,
  `no_bus` bigint(20) DEFAULT NULL,
  `nopol_bus` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `f_bus` longtext,
  PRIMARY KEY (`id_bus`),
  UNIQUE KEY `nopol_bus` (`nopol_bus`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bus` (`id_bus`, `no_bus`, `nopol_bus`, `slug`, `f_bus`) VALUES
('BUS-06908',	4,	'BM 7028 A',	'bm-7028-a',	''),
('BUS-16137',	7,	'BM 7632 JU',	'bm-7632-ju',	''),
('BUS-19970',	9,	'BM 7638 JU',	'bm-7638-ju',	''),
('BUS-20792',	3,	'BM 7027 A',	'bm-7027-a',	''),
('BUS-23473',	2,	'BM 7026 A',	'bm-7026-a',	''),
('BUS-60547',	1,	'BM 7025 A',	'bm-7025-a',	''),
('BUS-68885',	10,	'BM 7636 JU',	'bm-7636-ju',	''),
('BUS-78025',	5,	'BM 7362 AP',	'bm-7362-ap',	''),
('BUS-83354',	8,	'BM 7633 JU',	'bm-7633-ju',	''),
('BUS-84276',	6,	'BM 7631 JU',	'bm-7631-ju',	'');

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE `galeri` (
  `id_galeri` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_layanan` varchar(255) NOT NULL DEFAULT '0',
  `foto` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `galeri` (`id_galeri`, `id_layanan`, `foto`, `created_at`, `updated_at`) VALUES
(22,	'LYN-0188059462',	'LYN-0188059462_016062021115453.jpg',	'2021-06-16 04:54:53',	'2021-06-16 04:54:53'),
(23,	'LYN-2940944859',	'LYN-2940944859_016062021115944.jpg',	'2021-06-16 04:59:44',	'2021-06-16 04:59:44'),
(24,	'LYN-9624230244',	'LYN-9624230244_016062021120212.jpg',	'2021-06-16 05:02:12',	'2021-06-16 05:02:12'),
(25,	'LYN-9128592544',	'LYN-9128592544_016062021120609.jpg',	'2021-06-16 05:06:09',	'2021-06-16 05:06:09'),
(26,	'LYN-4051726965',	'LYN-4051726965_016062021121228.jpg',	'2021-06-16 05:12:29',	'2021-06-16 05:12:29'),
(27,	'LYN-7933259724',	'LYN-7933259724_016062021151901.png',	'2021-06-16 08:19:01',	'2021-06-16 08:19:01'),
(28,	'LYN-3604496065',	'LYN-3604496065_016062021152247.jpg',	'2021-06-16 08:22:47',	'2021-06-16 08:22:47');

DROP TABLE IF EXISTS `kec`;
CREATE TABLE `kec` (
  `id_kec` varchar(255) NOT NULL,
  `nm_kec` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kec` (`id_kec`, `nm_kec`) VALUES
('KEC-02342',	'Kecamatan Pekanbaru Kota'),
('KEC-15031',	'Kecamatan Sail'),
('KEC-16513',	'Kecamatan Marpoyan Damai'),
('KEC-23386',	'Kecamatan Tenayan Raya'),
('KEC-25031',	'Kecamatan Tuah Madani'),
('KEC-41434',	'Kecamatan Kulim'),
('KEC-43280',	'Kecamatan Lima Puluh'),
('KEC-48501',	'Kecamatan Rumbai'),
('KEC-51894',	'Kecamatan Rumbai Timur'),
('KEC-74990',	'Kecamatan Bukit Raya'),
('KEC-77810',	'Kecamatan Binawidya'),
('KEC-79774',	'Kecamatan Rumbai Barat'),
('KEC-81344',	'Kecamatan Sukajadi'),
('KEC-87397',	'Kecamatan Senapelan'),
('KEC-92509',	'Kecamatan Payung Sekaki');

DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `id_layanan` varchar(255) NOT NULL,
  `bus` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `driver` varchar(255) DEFAULT NULL,
  `pendamping` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `rute` longtext,
  `lk` bigint(20) DEFAULT NULL,
  `pr` bigint(20) DEFAULT NULL,
  `ln` bigint(20) DEFAULT NULL,
  `tv` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `permasalahan` longtext,
  `usr_created` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `layanan` (`id_layanan`, `bus`, `tgl`, `driver`, `pendamping`, `kecamatan`, `rute`, `lk`, `pr`, `ln`, `tv`, `total`, `permasalahan`, `usr_created`, `created_at`, `updated_at`) VALUES
('LYN-0188059462',	'BUS-60547',	'2021-05-30',	'M. Fadillah Iskandar',	'Nanang Abdillah',	'KEC-41434',	'Jl. Bukit Barisan Depan SMAN 10 Pekanbaru',	55,	39,	5,	6,	93,	'1. 2 orang peserta ditunda vaksin karena tensi tinggi .\r\n2. 3 orang belum sampai tiga bulan positif cvd.\r\n3. 1 orang mengkonsumsi obat pengencer darah.',	'USR-00001',	'2021-06-16 04:54:53',	'2021-06-16 04:54:53'),
('LYN-2940944859',	'BUS-23473',	'2021-05-30',	'Tanta Priguna',	'Hendra Prima',	'KEC-81344',	'Jalan Bunga Harum',	50,	40,	6,	10,	86,	'1. 2 orang tidak datang konsul.\r\n2. 1 orang diabetes.\r\n3. 3 orang belum sampai tiga bulan sembuh dari cvd.\r\n4. 1 orang jantung dan diabetes.\r\n5. 1 orang belum cek gula darah.\r\n6. 1 orang kontrol gangguan jiwa.\r\n7. 1 orang KTP jadul.\r\n\r\n',	'USR-00001',	'2021-06-16 04:59:44',	'2021-06-16 04:59:44'),
('LYN-3604496065',	'BUS-23473',	'2021-06-17',	'Ade Budhi Adrian',	'Rio Putra',	'KEC-23386',	'Didalam alamayang',	48,	23,	7,	8,	70,	'4 Orang tidak bisa vaksin karena baru sembuh covid,\r\n4 orang tidak bisa divaksin karena penyakit lainnya.\r\n\r\n',	'USR-00001',	'2021-06-16 08:22:47',	'2021-06-16 08:22:47'),
('LYN-4051726965',	'BUS-78025',	'2021-05-30',	'Nur Arif Rahman',	'Tubagus M. Firdaus .K',	'KEC-77810',	'	Masjid Paripurna Az-Zikra',	52,	45,	6,	3,	100,	'1. 3 orang tidak bisa vaksin keran tensi tinggi',	'USR-00001',	'2021-06-16 05:12:29',	'2021-06-16 05:12:29'),
('LYN-7933259724',	'BUS-60547',	'2021-06-17',	'M. Febryana',	'Ardino Hidayat',	'KEC-77810',	'Simpang tabek gadang',	13,	34,	5,	2,	50,	'\r\n2 Orang tidak di vaksin karena tensi tinggi\r\n',	'USR-00001',	'2021-06-16 08:19:01',	'2021-06-16 08:19:01'),
('LYN-9128592544',	'BUS-06908',	'2021-05-30',	'Abdul Tin Adha',	'Ridho Indra Perdana',	'KEC-51894',	'Masjid Nurul Amal',	48,	45,	0,	5,	88,	'1. 5 orang peserta ditunda vaksin karena tensi tinggi\r\n',	'USR-00001',	'2021-06-16 05:06:09',	'2021-06-16 05:06:09'),
('LYN-9624230244',	'BUS-20792',	'2021-05-30',	'Ade Budhi Adrian',	'Rio Putra',	'KEC-92509',	'Jalan Harapan Jaya',	51,	48,	4,	7,	69,	'1. 7 orang perserta ditunda vaksin karena tensi tinggi',	'USR-00001',	'2021-06-16 05:02:12',	'2021-06-16 05:02:12');

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `username` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `br` varchar(255) DEFAULT NULL,
  `token_csrf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `token_csrf` (`token_csrf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `session` (`username`, `ip`, `os`, `br`, `token_csrf`, `created_at`) VALUES
('wulan',	'127.0.0.1',	'Windows 10',	'Google Chrome v.91.0.4472.106',	'FqEziXT6tl1UNKFrsiYeMheqPdV6n74YOKMS1yNUZhM=',	'2021-06-22 13:53:59'),
('bangameck',	'127.0.0.1',	'Windows 10',	'Google Chrome v.91.0.4472.106',	'X+A06Xwsu3rJdDpgMrhMS3t/2CWEgh43unP5n/jQY2E=',	'2021-06-22 14:02:33'),
('wulan',	'127.0.0.1',	'Windows 10',	'Google Chrome v.91.0.4472.106',	'Xk9eWp7a3NJPyo/2nkf99y9faj5fivg2W+kyfdiUArg=',	'2021-06-22 14:27:37');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '1. Admin | 2. Driver | 3. Atasan',
  `f_usr` longtext,
  `token_csrf` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `level`, `f_usr`, `token_csrf`, `created_at`, `updated_at`) VALUES
('USR-00001',	'bangameck',	'$2y$10$E1mN2xLa.YU9drANFY3jluDaijNXESEEjf1.MkbDf/ja.mQvxybJu',	'Rahmad Riskiadi',	1,	'USR-00001_22062021205551.png',	'X+A06Xwsu3rJdDpgMrhMS3t/2CWEgh43unP5n/jQY2E=',	'2021-06-08 09:40:58',	'2021-06-22 13:58:14'),
('USR-10512',	'nanang',	'$2y$10$Hhe0HgMALCD4bBnI5.m8WuCrVUA5uWm3aOf27YC0KtqozaHytXNK6',	'Nanang Abdillah',	3,	'',	'',	'2021-06-16 04:30:23',	'2021-06-16 04:30:23'),
('USR-12556',	'rajafadel',	'$2y$10$7WrOjNwTC2iTqlccemCg5O2jT47gSL5Muzg9W0mZcPMQ7CFnMR/uW',	'Raja Fadel',	3,	'',	'',	'2021-06-16 04:33:07',	'2021-06-16 04:33:07'),
('USR-13491',	'gandi',	'$2y$10$w9jYMkuS.XzEKPZQhOXqlebpwNPZzrngpsbkzAPZgRlaqZS2lHPSC',	'Gandi Prianto',	3,	'',	'',	'2021-06-16 04:27:14',	'2021-06-16 04:27:14'),
('USR-20473',	'usertest',	'$2y$10$dYK3OxWZ.M7261kAJTcO0.xbd2WuI33lGcqH8HWwUlLbVuDc4GXv6',	'User Test',	2,	'',	'',	'2021-06-16 08:28:22',	'2021-06-16 08:28:22'),
('USR-23544',	'huddi',	'$2y$10$0ri1FsxdISpuTcizSS1F0.OrihVJvfINNJEDG/ZRTWOkax7iOMlvS',	'Huddi Prayudi',	2,	'',	'',	'2021-06-16 04:32:45',	'2021-06-16 04:32:45'),
('USR-28522',	'fadhil',	'$2y$10$3RwcBCD6geWiT.5fE4OWTOBdb4z/NNBE5S6NW9.PVmx/vBk49KOGm',	'Muhammad Fadhil Iqbal',	3,	'',	'',	'2021-06-16 04:35:04',	'2021-06-16 04:35:04'),
('USR-33636',	'tubagus',	'$2y$10$jXmkvjUwkNAmqGSEapqQyuv.JbKuB.ZTlKKEhAOC40E0hpn1Zmnye',	'Tubagus M. Firdaus .K',	3,	'',	'',	'2021-06-16 04:29:16',	'2021-06-16 04:29:16'),
('USR-36770',	'rio',	'$2y$10$QhLcppgjPJjJnLd9IDq/Qu6KCSQ3Ym4S0vTzFaPVxrxoqajDitLlW',	'Rio Putra',	3,	'',	'NKZcT/Slb3F6ykn+HoR8EcyrV2WfN3tUvS2y2+3lqbE=',	'2021-06-16 04:28:05',	'2021-06-16 04:28:05'),
('USR-39102',	'ridho',	'$2y$10$.2VydC3e0uHoHwl76obDNOUhrg5.LCJOsK9tpKsrv3fy5ojLMxw6q',	'Ridho Indra Perdana',	3,	'',	'',	'2021-06-16 04:26:23',	'2021-06-16 04:26:23'),
('USR-52604',	'arif',	'$2y$10$8QFPV/pd2jA4H9VROAFG7..0aEqz6uZffYdSHKwsOlfMN6ZHoSkr2',	'Nur Arif Rahman',	2,	'',	'',	'2021-06-16 04:29:54',	'2021-06-16 04:29:54'),
('USR-54426',	'febryana',	'$2y$10$ctb.HHaG7BEgQjSQUJ7pa.YA9EaMJMRtj6f6Vk.HZ3SI9Kg5Xdkda',	'M. Febryana',	2,	'',	'',	'2021-06-16 04:30:53',	'2021-06-16 04:30:53'),
('USR-56713',	'hendra',	'$2y$10$oAQtRpMN46MOc6oWD78NkuwV6I8wEZYcpQthgeoAm48CAdfcaXcH.',	'Hendra Prima',	3,	'',	'',	'2021-06-16 04:55:51',	'2021-06-16 04:55:51'),
('USR-59810',	'ardino',	'$2y$10$xeUxQtkz9M8iA5uMAxM40.5v3JncMAvmUqz2cPcB3YOSKwiHut6Bq',	'Ardino Hidayat',	3,	'',	'',	'2021-06-16 04:31:23',	'2021-06-16 04:31:23'),
('USR-71667',	'tanta',	'$2y$10$QIirJfOqvbA3u2Gpwv.xd.Az3EOdTi6ICChEQZmBz97tDQF7l8PwO',	'Tanta Priguna',	2,	'',	'',	'2021-06-16 04:26:47',	'2021-06-16 04:26:47'),
('USR-75705',	'akbar',	'$2y$10$ANJUtStbgLHexJatQk5/me5nfKtXVVRZhyUVraDbVqV9A9tozUEJi',	'Nur Fadilah Akbar',	3,	'',	'',	'2021-06-16 04:33:49',	'2021-06-16 04:33:49'),
('USR-81845',	'maikel',	'$2y$10$3PfC7mjrEKITyI6lyVCwIuU1IbhAedUrlCsN0mhev1/9GoZgLMKAa',	'Maikel Nahuway',	3,	'',	'',	'2021-06-16 04:32:21',	'2021-06-16 04:32:21'),
('USR-83331',	'adebudhi',	'$2y$10$8MpmKZGleAvtu8VhbKsmmeHxelsquYluBZt1h/cCGtFTdtrMt9nWW',	'Ade Budhi Adrian',	2,	'',	'',	'2021-06-16 04:27:45',	'2021-06-16 04:27:45'),
('USR-84856',	'imam',	'$2y$10$l7ElVdP7tnDTQAsNg7tqo.S2tpVBHuXcLqCsVcFnL6zoj2lO2PFcy',	'Ishanul Imam',	2,	'',	'',	'2021-06-16 04:31:42',	'2021-06-16 04:31:42'),
('USR-91371',	'jumaris',	'$2y$10$p6Qk8msH7jZOCuOZyRc9YuV8zAMozrtLhPnBCDGJzsFvlz0Y9l45G',	'Jumaris Saputra',	2,	'',	'',	'2021-06-16 04:33:27',	'2021-06-16 04:33:27'),
('USR-92265',	'ekawahyu',	'$2y$10$3zldx..A0HQbXjoA//PHFeyaXNNCgosIIh2GyjCYhtPQWcSyXIfgS',	'Eka Wahyu Saputra',	2,	'',	'',	'2021-06-16 04:34:25',	'2021-06-16 04:34:25'),
('USR-92858',	'abdultin',	'$2y$10$Q8etpfcaJincO/jYG4CIGu40kfbJL/.pPYe.SgM766LAhq1SFuAMq',	'Abdul Tin Adha',	2,	'',	'',	'2021-06-16 04:28:43',	'2021-06-16 04:28:43'),
('USR-93838',	'wulan',	'$2y$10$3a0e/9L5aq1vCd0iaprBQuC45UM4xvJ0/2JtuAQTBzX.Yh5YdlOG2',	'Wulan Puspita Anggraini',	1,	'',	'Xk9eWp7a3NJPyo/2nkf99y9faj5fivg2W+kyfdiUArg=',	'2021-06-16 04:35:38',	'2021-06-22 13:53:35'),
('USR-97787',	'm.fadilah',	'$2y$10$zN4L3rBahJRpx0.EmObQfesL7l37Oa4ES6ArSLLfj0GORN73T7Yz6',	'M. Fadillah Iskandar',	2,	'',	'',	'2021-06-16 04:25:55',	'2021-06-16 04:25:55');

-- 2021-06-22 14:37:14
