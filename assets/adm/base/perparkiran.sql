-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.3.0.6369
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table perparkiran.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` varchar(255) NOT NULL,
  `j_blog` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `isi` longtext,
  `sampul` longtext,
  `c_sampul` longtext,
  `publish` enum('Y','N') NOT NULL,
  `bn` enum('Y','N') NOT NULL,
  `hn` enum('Y','N') NOT NULL,
  `adm_blog` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_blog`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.blog: ~10 rows (lebih kurang)
INSERT INTO `blog` (`id_blog`, `j_blog`, `slug`, `isi`, `sampul`, `c_sampul`, `publish`, `bn`, `hn`, `adm_blog`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('00998428351696011609', 'Besok Mesin EDC Diluncurkan untuk Pembayaran Parkir Non-tunai', '442-besok-mesin-edc-diluncurkan-untuk-pembayaran-parkir-non-tunai', '<p style="text-align:justify;"><strong>PEKANBARU</strong> - Dinas Perhubungan (Dishub) Kota Pekanbaru bersama PT. YSM bakal meluncurkan mesin Elektronik Data Capture (EDC) awal Oktober 2021. Mesin EDC sebagai salah satu alat pembayaran parkir non-tunai.&nbsp;</p><p style="text-align:justify;">"Besok kita launching alat non-tunai di beberapa titik. Langsung kita gunakan," ujar Kepala Dinas Perhubungan (Dishub) Kota Pekanbaru, Yuliarso, Kamis (30/9).&nbsp;</p><p style="text-align:justify;">PT. YSM selaku rekanan Pemko Pekanbaru dalam pengelolaan parkir tepi jalan umum menempatkan mesin EDC di sejumlah ruas jalan secara bertahap.&nbsp;</p><p style="text-align:justify;">Tahap awal, sebanyak 250 mesin EDC dipasang di titik potensial di ruas jalan protokol. Alat pembayaran non-tunai guna memaksimalkan pendapatan dari jasa layanan parkir tepi jalan umum.&nbsp;</p><p style="text-align:justify;">Yuliarso menilai, sejak jauh hari telah dilakukan sosialisasi pembayaran non-tunai kepada masyarakat oleh pihaknya bersama PT. YSM.&nbsp;</p><p style="text-align:justify;">Penggunaan mesin secara bertahap dilakukan seiring sosialisasi dan pemantapan penggunaan mesin oleh para juru parkir (jukir).&nbsp;</p><p style="text-align:justify;">"Secara bertahap, karena ini yang mengoperasikan nya ini kan harus mengerti dan paham," pungkasnya.</p>', '305-besok-mesin-edc-diluncurkan-untuk-pembayaran-parkir-non-tunai-021020212129.jpg', 'Kepala Dinas Perhubungan (Dishub) Kota Pekanbaru Yuliarso', 'Y', 'N', 'Y', 'USR-99999', '2021-10-02 14:29:38', '2021-10-28 15:58:36', NULL),
	('21606794114970369940', 'Wali Kota Pekanbaru Dampingi Dirjen Perhubungan Darat Deklarasi "Zero ODOL Tahun 2023"', '695-wali-kota-pekanbaru-dampingi-dirjen-perhubungan-darat-deklarasi-zero-odol-tahun-2023', '<p><strong>PEKANBARU</strong> - Walikota Pekanbaru Dr. H. Firdaus, S.T, M.T, mendampingi Direktur Jenderal Perhubungan Darat Budi Setiyadi, dalam deklarasi mendukung pelaksanaan zero angkutan barang Over Dimensi Over Loading (ODOL), Selasa (16/2). Deklarasi ini berlangsung di komplek Terminal Bandar Raya Payung Sekaki (BRPS). Deklarasi ini untuk mendukung penegakan hukum terhadap kendaraan angkutan ODOL. Dirjen Perhubungan Darat, Budi Setiyadi menyebut ini merupakan satu jalan untuk mendukung pelaksanaan zero ODOL tahun 2023. Diharapkan nanti angkutan barang mengangkut barang dengan sesuai kapasitas muatan yang telah ditentukan. Kelebihan muatan ini menyebabkan ruas jalan rusak akibat menahan beban terlalu berat. Tidak sesuai dengan kemampuan daya beban jalan. "Karena pemerintah mengeluarkan anggaran Rp43 triliun untuk perbaikan jalan satu tahun," terangnya.&nbsp;<br>Sementara, Walikota Pekanbaru Dr. H. Firdaus, S.T, M.T menyebut, Pemerintah Kota (Pemko) Pekanbaru siap mendukung untuk terwujudnya zero kendaraan angkutan ODOL ini. Melalui Dinas Perhubungan (Dishub) Kota Pekanbaru, pemerintah kota bakal melakukan pengawasan dilapangan. Pengawasan untuk menertibkan kendaraan yang melebihi dimensi dan melebihi kapasitas angkutan. "Tentu ini akan menjadi tugas kita bersama. Pemerintah kota siap untuk menyukseskan zero angkutan ODOL ini," terangnya. Firdaus juga berharap dan mengimbau kepada pengusaha angkutan barang untuk tertib dalam mengikuti regulasi. Agar terciptanya keselamatan dalam berkendara di jalan raya.&nbsp;<br>Dalam kesempatan ini, Firdaus bersama Dirjen Perhubungan Darat juga melakukan pemotongan kendaraan ODOL. Pemotongan ini dilakukan secara sombolis dengan menggunakan mesin las.</p>', '695-wali-kota-pekanbaru-dampingi-dirjen-perhubungan-darat-deklarasi-zero-odol-tahun-2023-281020211925.jpeg', 'Walikota Pekanbaru bersama Dirjen Perhubungan Darat', 'Y', 'N', 'N', 'USR-99999', '2021-10-28 12:25:29', NULL, NULL),
	('36115892756196518748', 'Mesin EDC Sebagai Pilihan Pembayaran Parkir Non-tunai Resmi Diluncurkan', '331-mesin-edc-sebagai-pilihan-pembayaran-parkir-non-tunai-resmi-diluncurkan', '<p><strong>PEKANBARU </strong>- Dinas Perhubungan (Dishub) Kota Pekanbaru bersama pihak ketiga resmi meluncurkan mesin Elektronik Data Capture (EDC) sebagai alat pembayaran parkir non-tunai, Jumat (1/10). Tahap awal ada sebanyak 250 mesin EDC yang bakal di sebar oleh PT. YSM selaku pihak ketiga pengelolaan parkir tepi jalan umum di sejumlah ruas jalan di Kota Pekanbaru. Secara seremonial mesin EDC ini diluncurkan langsung oleh Kepala Dishub Pekanbaru, Yuliarso, bersama Kepala UPT Parkir Radinal, Perwakilan PT YSM Ichwan Sunadi dan jajaran di Pasar Buah Jalan Jendral Sudirman."Sesuai dengan yang sudah kita rancang bersama pihak ketiga, bahwa pengelolaan parkir di beberapa ruas jalan kita beri opsional dalam pemilihan pembayaran non-tunai," terang Kepala Dishub Kota Pekanbaru, Yuliarso. Ia mengajak masyarakat Kota Pekanbaru untuk menggunakan opsi pembayaran parkir secara non-tunai. Supaya apa yang menjadi permasalahan seperti ini seperti pendapatan, pendataan parkir dapat terjawab. Menurutnya, dengan penggunaan EDC ini seluruh transaksi dalam jasa layanan parkir terekam. Sehingga seluruh transaksi dapat diketahui dalam sebuah database. "Jadi lebih transparan, akuntabel. EDC ini bisa diaplikasikan dengan uang elektronik (E-money). Juga bisa digunakan dengan debet atau kartu ATM, dan dengan QRIS," pungkasnya.</p>', '463-mesin-edc-sebagai-pilihan-pembayaran-parkir-non-tunai-resmi-diluncurkan-021020212120.jpg', 'Dinas Perhubungan (Dishub) Kota Pekanbaru bersama pihak ketiga resmi meluncurkan mesin Elektronik Data Capture (EDC) sebagai alat pembayaran parkir non-tunai, Jumat (1/10).', 'Y', 'Y', 'Y', 'USR-99999', '2021-10-02 14:20:46', '2021-10-10 15:08:51', NULL),
	('43888224593692599076', 'Jalan S Parman Terapkan One Way', '940-jalan-s-parman-terapkan-one-way', '<p><strong>PEKANBARU -</strong> Ruas Jalan S Parman yang berada tepat di samping Kantor Polda Riau, kini diberlakukan satu arah. Ruas jalan ini berlakukan satu arah dari Jalan Pattimura hingga Jalan Ronggowarsito.Kepala Dinas Perhubungan (Dishub) Yuliarso, melalui Kepala Bidang Manajemen Rekayasa Lalulintas (MRL) Edi Sofyan mengatakan, pemberlakuan satu arah ini terhitung mulai, Senin (18/1/2021). "Iya, Jalan S Parman dari Pattimura kita berlakukan one way (satu arah) menuju Ronggowarsito," kata Edi, Selasa (19/1). Ia mengungkapkan, hal ini berdasarkan hasil rapat Forum LLAJ dan MRL tentang lalulintas kawasan Mapolda Riau. Menurutnya, hal lainnya dikarenakan sempitnya ruas jalan dan banyaknya kendaraan roda empat yang parkir di sepanjang jalan tersebut.Edi mengatakan, pemberlakuan jalan satu arah Jalan S Parman dari Simpang Pattimura menuju Ronggowarsito hanya berlaku dari pukul 06.00-18.00 WIB. Dalam penerapan di lapangan nanti, pihaknya akan melakukan pemasangan rambu lalu lintas."Kita akan memasang papan tambahan waktu 06.00-18.00 WIB pada rambu dilarang masuk di ruas Jalan S Parman dari perempatan Ronggowarsito menuju ruas Jalan Pattimura," terangnya. Saat penerapannya, Dishub Pekanbaru akan melakukan sosialisasi bersama BPTD Wilayah Riau, Dishub Provinsi Riau, Satlantas Polresta Pekanbaru, selama satu minggu.</p>', '940-jalan-s-parman-terapkan-one-way-281020212053.jpg', 'Personel Dishub Pekanbaru, BPTD Riau, dan kepolisian memasang rambu jalan satu arah di ruas Jalan S Parman.', 'Y', 'N', 'N', 'USR-99999', '2021-10-28 13:53:50', NULL, NULL),
	('50175059584679106666', 'Bus Vaksinasi Tunggu Ketersediaan Vaksin dari Dinas Kesehatan', '921-bus-vaksinasi-tunggu-ketersediaan-vaksin-dari-dinas-kesehatan', '<p><strong>PEKANBARU </strong>- Dinas Perhubungan (Dishub) Kota Pekanbaru, masih menunggu ketersediaan vaksin dari Dinas Kesehatan untuk pengoperasian bus vaksinasi keliling.Kepala Dishub Pekanbaru Yuliarso melalui Kepala Bidang Angkutan Khairunnas menyebutkan, saat ini pengoperasian ke-10 bus vaksinasi dihentikan sementara jelang adanya vaksin."Kalau kita standby saja. Begitu ada vaksin, kita operasikan. Jadi, sekarang tergantung dari Dinas Kesehatan untuk menyiapkan vaksin," ucapnya, Senin (27/9).Dikatakan Khairunnas, sejauh ini pihaknya terus berkoordinasi dengan Dinas Kesehatan untuk memenuhi kebutuhan vaksin di 10 bus vaksinasi keliling."Malahan kita mendesak, karena ada berbagai pihak yang menanyakan ke kita, kenapa bus vaksinasi tidak lagi beroperasi, sementara janjinya sampai akhir Desember," ujarnya."Kita tentu ingin sesuai komitmen. Tapi kata Diskes, vaksin tidak ada. Kalau vaksin tidak ada, bagaimana kita mau melayani masyarakat," ulas Khairunnas.Lebih jauh disampaikannya, untuk satu bus vaksinasi keliling dibutuhkan 20 vial vaksin dalam satu hari. "20 vial ini bisa untuk 200 orang. Jadi kalau 10 bus, butuh 200 vial vaksin dalam satu kali pelayanan," tutupnya.</p>', '543-bus-vaksinasi-tunggu-ketersediaan-vaksin-dari-dinas-kesehatan-021020212134.png', 'Kepala Bidang Angkutan Dinas Perhubungan Kota Pekanbaru Khairunnas', 'Y', 'N', 'N', 'USR-99999', '2021-10-02 14:34:43', '2021-10-28 15:58:05', NULL),
	('66251029841392860537', 'Sosialisasi Pembayaran Parkir Non Tunai Dilakukan Dishub Bersama Rekanan', '378-sosialisasi-pembayaran-parkir-non-tunai-dilakukan-dishub-bersama-rekanan', '<p><strong>PEKANBARU -</strong> Dinas Perhubungan (Dishub) Kota Pekanbaru, bersama rekanan pemenang lelang pengelolaan parkir tepi jalan umum masih melakukan sosialisasi pembayaran non tunai.&nbsp;<br>Mereka melakukan sosialisasi kepada masyarakat terkait aplikasi pembayaran non tunai yang digunakan rekanan saat ini. Pasalnya, sejumlah titik di ruas Jalan Jendral Sudirman telah menerapkan pembayaran non tunai. "Mereka, PT komitmen dalam penggunaan alat ini. Saat ini alat pembayaran parkir non tunai ini ada di Jalan Sudirman," terang Kepala UPT Perparkiran Dishub Pekanbaru, Radinal Munandar, Kamis (28/10). Metode pembayaran parkir secara non tunai terus dimatangkan agar masyarakat familiar. Mereka mensosialisasikan penggunaan mesin Elektronic Data Capture (EDC) dalam pembayaran parkir non tunai sejak diluncurkan awal Oktober. Menurutnya, penerapan alat pembayaran parkir non tunai ini dilakukan secara bertahap seiring sosialisasi kepada masyarakat."Maka kami setiap hari juga melakukan sosialisasi dan pemahaman," pungkasnya.</p>', '378-sosialisasi-pembayaran-parkir-non-tunai-dilakukan-dishub-bersama-rekanan-281020211921.jpeg', 'Kepala UPT Perparkiran Dishub Pekanbaru, Radinal Munandar', 'Y', 'Y', 'Y', 'USR-99999', '2021-10-28 12:21:50', '2021-10-28 15:59:18', NULL),
	('69524179615558173022', 'Dishub Kekurangan Kendaraan Operasional Perbaiki LPJU', '540-dishub-kekurangan-kendaraan-operasional-perbaiki-lpju', '<p><strong>PEKANBARU </strong>- Dinas Perhubungan (Dishub) Kota Pekanbaru saat ini kendaraan operasional dalam melakukan perbaikan Lampu Penerangan Jalan Umum (LPJU). Namun demikian, Dishub berupaya maksimal dalam memberikan pelayanan kepada masyarakat.Kekurangan kendaraan operasional ini disampaikan Kepala Dishub Kota Pekanbaru, Yuliarso kepada media, Senin (27/9) malam.Dari beberapa unit kendaraan yang dimiliki oleh Dishub Kota Pekanbaru, hanya satu kendaraan operasional yang baru, yakni dimiliki sejak tahun 2020, sisanya berusia di atas 10 tahun."Dishub cuma punya satu unit kendaraan operasional yang baru dimiliki tahun 2020 lalu. Sisanya sudah usia di atas 10 tahun yang sudah harus diremajakan karena terlalu besar cost untuk perawatan dan perbaikan," ujar Yuliarso.Senin (27/9) malam, pihak Diahub Pekanbaru terjun ke Jalan Dwikora Kelurahan Sukamulia, Kecamatan Sail untuk memperbaiki LPJU yang rusak.Yuliarso didampingi pegawai, saat perbaikan berlangsung. Selain itu turut hadir Ketua Komisi II Dewan Perwakilan Rakyat Daerah Pekanbaru, Fathullah.Saat perbaikan LPJU, pihak Dishub mengerahkan satu unit mobil skylift. Perbaikan juga disaksikan warga bersama Ketua RT setempat yang sangat mengapresiasiasi agenda yang dilaksanakan malam itu.</p>', '872-dishub-kekurangan-kendaraan-operasional-perbaiki-lpju-021020212133.jpg', 'Kepala Dinas Perhubungan (Dishub) Kota Pekanbaru Yuliarso', 'Y', 'N', 'N', 'USR-99999', '2021-10-02 14:33:26', '2021-10-10 15:07:48', NULL),
	('73704880695227223843', 'Dishub Gencarkan Sosialisasi Pembayaran Parkir Non-Tunai', '573-dishub-gencarkan-sosialisasi-pembayaran-parkir-non-tunai', '<p><strong>PEKANBARU -</strong> Dinas Perhubungan (Dishub) Kota Pekanbaru terus melakukan sosialisai pembayaran non-tunai dalam jasa layanan parkir tepi jalan umum. Sosialisasi gencar dilakukan guna masyarakat dapat mengakses pembayaran non-tunai dengan mudah nantinya.Apalagi Oktober mendatang PT. YSM, selaku rekanan Pemko Pekanbaru bakal meluncurkan mesin Elektronik Data Capture (EDC) sebagai pilihan pembayaran jasa layanan parkir tepi jalan umum. "Tetap kita sosialisasikan supaya masyarakat dapat menggunakan pembayaran non-tunai kedepannya," ujar Kepala Dinas Perhubungan Kota Pekanbaru, Yuliarso, Senin (27/9). Sosialisasi dilakukan secara langsung kepada masyarakat dan melalui media masa maupun media sosial. Ia menyebut, beberapa pekan lalu telah dimulai untuk pembayaran non-tunai menggunakan QRIS. Ada pilihan pembayaran yang dapat dilakukan melalui aplikasi alat pembayaran elektronik.Setiap juru parkir (Jukir) PT YSM di beberapa ruas jalan telah dilengkapi dengan kode barcode untuk pembayaran non-tunai. "Untuk kendala saat ini, perlu sosialisasi lagi untuk pembayaran non-tunai. Perlu waktu untuk peralihan ke non-tunai," pungkasnya.</p>', '268-dishub-gencarkan-sosialisasi-pembayaran-parkir-non-tunai-021020212135.jpg', 'Kepala Dinas Perhubungan (Dishub) Kota Pekanbaru Yuliarso', 'Y', 'Y', 'Y', 'USR-99999', '2021-10-02 14:35:59', '2021-10-10 15:07:26', NULL),
	('86803484694911984167', 'UPT Perparkiran Dishub Dorong Kesiapan Pengelola Jelang Pembayaran Jasa Layanan Parkir Non Tunai', '910-upt-perparkiran-dishub-dorong-kesiapan-pengelola-jelang-pembayaran-jasa-layanan-parkir-non-tunai', '<p><strong>PEKANBARU -</strong> Pembayaran jasa layanan parkir secara non tunai bakal dimulai pada 1 Oktober 2021 mendatang. Tahap awal ada 250 unit EDC mendukung transaksi non tunai dengan memakai e money untuk pembayaran jasa layanan parkir."Kita sudah berkordinasi dengan pengelola jasa layanan parkir terkait kesiapan pembayaran non tunai," papar Kepala UPT Perparkiran Dinas Perhubungan Kota Pekanbaru, Radinal Munandar, Senin (27/9).Pihaknya mendorong PT. Yabisa Sukses Mandiri (YSM) sudah menyiapkan fasilitas pendukung pembayaran non tunai. Apalagi jadwal penerapannya tinggal beberapa hari lagi."Mereka sudah menyiapkan peralatan, sebagian besar sudah di Kota Pekanbaru," jelasnya.Pengelola juga sudah melakukan sosialisasi kepada para kordinator parkir di 88 ruas jalan. Lokasinya menyebar di sembilan kecamatan yakni Bukit Raya, Kulim, Limapuluh, Marpoyan Damai dan Pekanbaru Kota.Kemudian Sail, Senapelan, Sukajadi dan Tenayan Raya. Pengelola masih juga menyiapkan integrasi sistem pembayaran non tunai.&nbsp; Proses pembayarannya nanti terintegrasi dengan semua bank. Para juru parkir juga menjalani pelatihan untuk mengoperasikan EDC.Radinal tidak menampik sejumlah juru parkir belum memahami pemakaian EDC. Ia mendorong pengelola bisa melatih para juru parkir agar bisa memakai EDC."Mereka harus memahami penggunaan mesin EDC. Apalagi pengelola sudah memberi tahu terkait penerapan parkir non tunai kepada para koordinator dan juru parkir," ujarnya.</p>', '833-upt-perparkiran-dishub-dorong-kesiapan-pengelola-jelang-pembayaran-jasa-layanan-parkir-non-tunai-021020212137.jpeg', 'Kepala UPT Perparkiran Dinas Perhubungan Kota Pekanbaru, Radinal Munandar', 'Y', 'Y', 'Y', 'USR-99999', '2021-10-02 14:37:12', '2021-10-10 15:43:31', NULL),
	('98653079279646273606', 'Dishub Sebut Pihak Ketiga Penuhi Target Pendapatan Parkir', '663-dishub-sebut-pihak-ketiga-penuhi-target-pendapatan-parkir', '<p><strong>PEKANBARU</strong> - Dinas Perhubungan (Dishub) Kota Pekanbaru menyatakan, tiga pekan pasca peralihan pengelolaan parkir tepi jalan umum pihak ketiga penuhi target pendapatan. Sebagimana diketahui, pihak ketiga sebagai rekanan Pemko Pekanbaru harus menyetorkan hampir Rp20 juta per hari dari jasa layanan parkir tepi jalan umum. "Sejauh ini kerjasama masih berjalan sesuai kontrak. Kan semua butuh proses untuk penataan," ujar Kepala Dishub Kota Pekanbaru, Yuliarso, melalui Kepala UPT Parkir, Radinal, Kamis (23/9). Menurutnya, tiga pekan sejak peralihan pengelolaan parkir, PT. YSM selaku rekanan memenuhi seluruh poin kontrak kerjasama. Mereka saat ini juga masih melakukan pemenuhan kelengkapan para juru parkir (Jukir). Seperti atribut, tanda pengenal, rompi, topi, payung, dan jas hujan. PT. YSM juga tengah menyediakan fasilitas jaminan kesehatan kepada jukir yang terdata. "Target yang diberikan, setiap hari terpenuhi. Mereka setiap hari menyetor Rp19 juta lebih ke kas," jelasnya.</p>', '109-dishub-sebut-pihak-ketiga-penuhi-target-pendapatan-parkir-021020212139.jpg', 'Kepala Dishub Kota Pekanbaru, Yuliarso', 'Y', 'Y', 'Y', 'USR-06782', '2021-10-02 14:39:14', '2021-10-10 15:08:31', NULL);

-- membuang struktur untuk table perparkiran.dokumen
CREATE TABLE IF NOT EXISTS `dokumen` (
  `id_dokumen` varchar(255) NOT NULL,
  `n_dokumen` longtext,
  `adm_dokumen` varchar(255) DEFAULT NULL,
  `x_dokumen` char(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.dokumen: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.d_blog
CREATE TABLE IF NOT EXISTS `d_blog` (
  `id_d_blog` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_blog` varchar(255) NOT NULL DEFAULT 'NULL',
  `n_d_blog` longtext,
  `x_blog` char(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_d_blog`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.d_blog: ~32 rows (lebih kurang)
INSERT INTO `d_blog` (`id_d_blog`, `id_blog`, `n_d_blog`, `x_blog`, `created_at`) VALUES
	(108, '36115892756196518748', '463-mesin-edc-sebagai-pilihan-pembayaran-parkir-non-tunai-resmi-diluncurkan-0021020212120.jpg', 'jpg', '2021-10-02 14:20:45'),
	(109, '36115892756196518748', '463-mesin-edc-sebagai-pilihan-pembayaran-parkir-non-tunai-resmi-diluncurkan-1021020212120.jpeg', 'jpeg', '2021-10-02 14:20:46'),
	(110, '00998428351696011609', '305-besok-mesin-edc-diluncurkan-untuk-pembayaran-parkir-non-tunai-0021020212129.jpg', 'jpg', '2021-10-02 14:29:38'),
	(111, '69524179615558173022', '872-dishub-kekurangan-kendaraan-operasional-perbaiki-lpju-0021020212133.jpg', 'jpg', '2021-10-02 14:33:26'),
	(112, '69524179615558173022', '872-dishub-kekurangan-kendaraan-operasional-perbaiki-lpju-1021020212133.jpeg', 'jpeg', '2021-10-02 14:33:26'),
	(113, '50175059584679106666', '543-bus-vaksinasi-tunggu-ketersediaan-vaksin-dari-dinas-kesehatan-0021020212134.png', 'png', '2021-10-02 14:34:43'),
	(114, '50175059584679106666', '543-bus-vaksinasi-tunggu-ketersediaan-vaksin-dari-dinas-kesehatan-1021020212134.jpg', 'jpg', '2021-10-02 14:34:43'),
	(115, '73704880695227223843', '268-dishub-gencarkan-sosialisasi-pembayaran-parkir-non-tunai-0021020212135.jpg', 'jpg', '2021-10-02 14:35:59'),
	(116, '73704880695227223843', '268-dishub-gencarkan-sosialisasi-pembayaran-parkir-non-tunai-1021020212135.png', 'png', '2021-10-02 14:35:59'),
	(117, '73704880695227223843', '268-dishub-gencarkan-sosialisasi-pembayaran-parkir-non-tunai-2021020212135.jpg', 'jpg', '2021-10-02 14:35:59'),
	(118, '86803484694911984167', '833-upt-perparkiran-dishub-dorong-kesiapan-pengelola-jelang-pembayaran-jasa-layanan-parkir-non-tunai-0021020212137.jpeg', 'jpeg', '2021-10-02 14:37:12'),
	(119, '86803484694911984167', '833-upt-perparkiran-dishub-dorong-kesiapan-pengelola-jelang-pembayaran-jasa-layanan-parkir-non-tunai-1021020212137.jpg', 'jpg', '2021-10-02 14:37:12'),
	(120, '86803484694911984167', '833-upt-perparkiran-dishub-dorong-kesiapan-pengelola-jelang-pembayaran-jasa-layanan-parkir-non-tunai-2021020212137.png', 'png', '2021-10-02 14:37:13'),
	(121, '86803484694911984167', '833-upt-perparkiran-dishub-dorong-kesiapan-pengelola-jelang-pembayaran-jasa-layanan-parkir-non-tunai-3021020212137.jpg', 'jpg', '2021-10-02 14:37:13'),
	(122, '98653079279646273606', '109-dishub-sebut-pihak-ketiga-penuhi-target-pendapatan-parkir-0021020212139.jpg', 'jpg', '2021-10-02 14:39:13'),
	(123, '98653079279646273606', '109-dishub-sebut-pihak-ketiga-penuhi-target-pendapatan-parkir-1021020212139.jpeg', 'jpeg', '2021-10-02 14:39:14'),
	(124, '98653079279646273606', '109-dishub-sebut-pihak-ketiga-penuhi-target-pendapatan-parkir-2021020212139.jpg', 'jpg', '2021-10-02 14:39:14'),
	(125, '98653079279646273606', '109-dishub-sebut-pihak-ketiga-penuhi-target-pendapatan-parkir-3021020212139.png', 'png', '2021-10-02 14:39:14'),
	(126, '98653079279646273606', '109-dishub-sebut-pihak-ketiga-penuhi-target-pendapatan-parkir-4021020212139.jpg', 'jpg', '2021-10-02 14:39:14'),
	(127, '66251029841392860537', '378-sosialisasi-pembayaran-parkir-non-tunai-dilakukan-dishub-bersama-rekanan-0281020211921.jpeg', 'jpeg', '2021-10-28 12:21:49'),
	(128, '66251029841392860537', '378-sosialisasi-pembayaran-parkir-non-tunai-dilakukan-dishub-bersama-rekanan-1281020211921.jpg', 'jpg', '2021-10-28 12:21:51'),
	(129, '66251029841392860537', '378-sosialisasi-pembayaran-parkir-non-tunai-dilakukan-dishub-bersama-rekanan-2281020211921.jpeg', 'jpeg', '2021-10-28 12:21:51'),
	(130, '66251029841392860537', '378-sosialisasi-pembayaran-parkir-non-tunai-dilakukan-dishub-bersama-rekanan-3281020211921.jpg', 'jpg', '2021-10-28 12:21:51'),
	(131, '66251029841392860537', '378-sosialisasi-pembayaran-parkir-non-tunai-dilakukan-dishub-bersama-rekanan-4281020211921.png', 'png', '2021-10-28 12:21:51'),
	(132, '66251029841392860537', '378-sosialisasi-pembayaran-parkir-non-tunai-dilakukan-dishub-bersama-rekanan-5281020211921.jpg', 'jpg', '2021-10-28 12:21:51'),
	(133, '21606794114970369940', '695-wali-kota-pekanbaru-dampingi-dirjen-perhubungan-darat-deklarasi-zero-odol-tahun-2023-0281020211925.jpeg', 'jpeg', '2021-10-28 12:25:28'),
	(134, '21606794114970369940', '695-wali-kota-pekanbaru-dampingi-dirjen-perhubungan-darat-deklarasi-zero-odol-tahun-2023-1281020211925.jpeg', 'jpeg', '2021-10-28 12:25:29'),
	(135, '21606794114970369940', '695-wali-kota-pekanbaru-dampingi-dirjen-perhubungan-darat-deklarasi-zero-odol-tahun-2023-2281020211925.jpg', 'jpg', '2021-10-28 12:25:29'),
	(136, '21606794114970369940', '695-wali-kota-pekanbaru-dampingi-dirjen-perhubungan-darat-deklarasi-zero-odol-tahun-2023-3281020211925.jpg', 'jpg', '2021-10-28 12:25:29'),
	(137, '43888224593692599076', '940-jalan-s-parman-terapkan-one-way-0281020212053.jpg', 'jpg', '2021-10-28 13:53:50'),
	(138, '43888224593692599076', '940-jalan-s-parman-terapkan-one-way-1281020212053.jpeg', 'jpeg', '2021-10-28 13:53:51'),
	(139, '43888224593692599076', '940-jalan-s-parman-terapkan-one-way-2281020212053.jpeg', 'jpeg', '2021-10-28 13:53:51');

-- membuang struktur untuk table perparkiran.d_giat
CREATE TABLE IF NOT EXISTS `d_giat` (
  `id_d_giat` int(11) NOT NULL AUTO_INCREMENT,
  `id_giat` varchar(255) CHARACTER SET latin1 NOT NULL,
  `n_d_giat` longtext CHARACTER SET latin1,
  `x_giat` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_d_giat`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel perparkiran.d_giat: ~16 rows (lebih kurang)
INSERT INTO `d_giat` (`id_d_giat`, `id_giat`, `n_d_giat`, `x_giat`, `created_at`) VALUES
	(1, 'GIATIWV7GPPDX0PARKIR', 'giat_007092021131051.jpg', 'jpg', '2021-09-07 06:10:52'),
	(2, 'GIATIWV7GPPDX0PARKIR', 'giat_107092021131052.jpg', 'jpg', '2021-09-07 06:10:53'),
	(3, 'GIATIWV7GPPDX0PARKIR', 'giat_207092021131053.jpg', 'jpg', '2021-09-07 06:10:53'),
	(4, 'GIATIWV7GPPDX0PARKIR', 'giat_307092021131054.mp4', 'mp4', '2021-09-07 06:10:55'),
	(9, 'penertipan-parkir-22', 'giat_008092021134834.jpg', 'jpg', '2021-09-08 06:48:35'),
	(10, 'penertipan-parkir-22', 'giat_108092021134835.jpg', 'jpg', '2021-09-08 06:48:36'),
	(11, 'penertipan-parkir-22', 'giat_208092021134836.jpg', 'jpg', '2021-09-08 06:48:36'),
	(12, 'pengecekan-atribut-jukir-19', 'giat_009092021215553.jpg', 'jpg', '2021-09-09 14:55:53'),
	(13, 'pengecekan-atribut-jukir-19', 'giat_109092021215553.jpg', 'jpg', '2021-09-09 14:55:53'),
	(14, 'pengecekan-atribut-jukir-19', 'giat_209092021215554.jpg', 'jpg', '2021-09-09 14:55:54'),
	(15, 'pengecekan-atribut-jukir-19', 'giat_309092021215554.jpg', 'jpg', '2021-09-09 14:55:54'),
	(16, 'pengecekan-atribut-jukir-19', 'giat_409092021215554.jpg', 'jpg', '2021-09-09 14:55:54'),
	(17, '45-penertiban-parkir-fdg-dg', 'giat_009092021224321.jpg', 'jpg', '2021-09-09 15:43:22'),
	(18, '65-pengecekan-atribut-jukir-dsfdsf-dsf-dsf', 'giat_009092021225106.jpg', 'jpg', '2021-09-09 15:51:06'),
	(19, '71-parkir-liar-di-daerah-panam-sebelah-amora', 'giat_009092021232517.jpg', 'jpg', '2021-09-09 16:25:18'),
	(20, '71-parkir-liar-di-daerah-panam-sebelah-amora', 'giat_109092021232518.jpg', 'jpg', '2021-09-09 16:25:18');

-- membuang struktur untuk table perparkiran.d_pengaduan
CREATE TABLE IF NOT EXISTS `d_pengaduan` (
  `id_d_peng` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_peng` varchar(255) DEFAULT NULL,
  `n_d_peng` longtext,
  `x_peng` char(10) DEFAULT NULL,
  `created_at` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_d_peng`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.d_pengaduan: ~58 rows (lebih kurang)
INSERT INTO `d_pengaduan` (`id_d_peng`, `id_peng`, `n_d_peng`, `x_peng`, `created_at`) VALUES
	(6, '0Q68HF9Z62M7', '0Q68HF9Z62M7-008092021141637.jpg', 'jpg', '2021-09-08'),
	(7, '0Q68HF9Z62M7', '0Q68HF9Z62M7-108092021141637.jpg', 'jpg', '2021-09-08'),
	(8, '0Q68HF9Z62M7', '0Q68HF9Z62M7-208092021141637.jpg', 'jpg', '2021-09-08'),
	(9, 'YE8IKT4VERLA', 'YE8IKT4VERLA-008092021210246.jpg', 'jpg', '2021-09-08'),
	(10, 'YE8IKT4VERLA', 'YE8IKT4VERLA-108092021210247.jpg', 'jpg', '2021-09-08'),
	(11, 'YE8IKT4VERLA', 'YE8IKT4VERLA-208092021210247.jpg', 'jpg', '2021-09-08'),
	(12, '9QFB8IWWWB2P', '9QFB8IWWWB2P-008092021210347.jpg', 'jpg', '2021-09-08'),
	(13, '9QFB8IWWWB2P', '9QFB8IWWWB2P-108092021210347.jpg', 'jpg', '2021-09-08'),
	(14, '9QFB8IWWWB2P', '9QFB8IWWWB2P-208092021210347.jpg', 'jpg', '2021-09-08'),
	(15, 'O4MQZGMM6FCX', 'O4MQZGMM6FCX-008092021211344.jpg', 'jpg', '2021-09-08'),
	(16, 'O4MQZGMM6FCX', 'O4MQZGMM6FCX-108092021211344.jpg', 'jpg', '2021-09-08'),
	(17, 'AVZQ6S8E2GBW', 'AVZQ6S8E2GBW-008092021213242.jpg', 'jpg', '2021-09-08'),
	(20, '10ZMD2TXVC9P', '10ZMD2TXVC9P-009092021223221.jpg', 'jpg', '2021-09-09'),
	(21, '10ZMD2TXVC9P', '10ZMD2TXVC9P-109092021223222.jpg', 'jpg', '2021-09-09'),
	(22, '10ZMD2TXVC9P', '10ZMD2TXVC9P-209092021223222.jpg', 'jpg', '2021-09-09'),
	(24, 'AVZQ6S8E2GBW', 'AVZQ6S8E2GBW-009092021233057.jpg', 'jpg', '2021-09-09'),
	(25, 'AVZQ6S8E2GBW', 'AVZQ6S8E2GBW-109092021233057.jpg', 'jpg', '2021-09-09'),
	(26, 'AVZQ6S8E2GBW', 'AVZQ6S8E2GBW-209092021233058.jpg', 'jpg', '2021-09-09'),
	(27, 'YE8IKT4VERLA', 'YE8IKT4VERLA-009092021234119.jpg', 'jpg', '2021-09-09'),
	(28, '4AUTD8SI8F2B', '4AUTD8SI8F2B-011092021091137.jpg', 'jpg', '2021-09-11'),
	(29, '4AUTD8SI8F2B', '4AUTD8SI8F2B-111092021091137.jpg', 'jpg', '2021-09-11'),
	(30, '4AUTD8SI8F2B', '4AUTD8SI8F2B-211092021091137.jpg', 'jpg', '2021-09-11'),
	(55, 'CB7IK18FDF4K', 'CB7IK18FDF4K-014112021011209.jpg', 'jpg', '2021-11-14'),
	(56, 'CB7IK18FDF4K', 'CB7IK18FDF4K-114112021011209.jpeg', 'jpeg', '2021-11-14'),
	(57, 'CB7IK18FDF4K', 'CB7IK18FDF4K-214112021011209.jpeg', 'jpeg', '2021-11-14'),
	(82, '543V2D6SDRF8', '543V2D6SDRF8-014112021011247.jpg', 'jpg', '2021-11-14'),
	(83, '543V2D6SDRF8', '543V2D6SDRF8-114112021011248.jpeg', 'jpeg', '2021-11-14'),
	(84, '543V2D6SDRF8', '543V2D6SDRF8-214112021011248.jpeg', 'jpeg', '2021-11-14'),
	(85, '11E0D1UTDLUT', '11E0D1UTDLUT-014112021011417.jpg', 'jpg', '2021-11-14'),
	(86, '11E0D1UTDLUT', '11E0D1UTDLUT-114112021011417.jpeg', 'jpeg', '2021-11-14'),
	(87, '11E0D1UTDLUT', '11E0D1UTDLUT-214112021011417.jpeg', 'jpeg', '2021-11-14'),
	(91, '0LKCIKXJKQ1Q', '0LKCIKXJKQ1Q-014112021011710.jpg', 'jpg', '2021-11-14'),
	(92, '0LKCIKXJKQ1Q', '0LKCIKXJKQ1Q-114112021011710.jpeg', 'jpeg', '2021-11-14'),
	(93, '0LKCIKXJKQ1Q', '0LKCIKXJKQ1Q-214112021011710.jpeg', 'jpeg', '2021-11-14'),
	(106, 'I4A4W0945P8C', 'I4A4W0945P8C-014112021011730.jpg', 'jpg', '2021-11-14'),
	(107, 'I4A4W0945P8C', 'I4A4W0945P8C-114112021011730.jpeg', 'jpeg', '2021-11-14'),
	(108, 'I4A4W0945P8C', 'I4A4W0945P8C-214112021011730.jpeg', 'jpeg', '2021-11-14'),
	(115, 'XX7GKM7IXV3Y', 'XX7GKM7IXV3Y-014112021011742.jpg', 'jpg', '2021-11-14'),
	(116, 'XX7GKM7IXV3Y', 'XX7GKM7IXV3Y-114112021011742.jpeg', 'jpeg', '2021-11-14'),
	(117, 'XX7GKM7IXV3Y', 'XX7GKM7IXV3Y-214112021011742.jpeg', 'jpeg', '2021-11-14'),
	(127, 'PJB8XSX2DREW', 'PJB8XSX2DREW-014112021011801.jpg', 'jpg', '2021-11-14'),
	(128, 'PJB8XSX2DREW', 'PJB8XSX2DREW-114112021011801.jpeg', 'jpeg', '2021-11-14'),
	(129, 'PJB8XSX2DREW', 'PJB8XSX2DREW-214112021011801.jpeg', 'jpeg', '2021-11-14'),
	(133, '3IQH7Q6JAG85', '3IQH7Q6JAG85-019112021115357.jpg', 'jpg', '2021-11-19'),
	(134, '3IQH7Q6JAG85', '3IQH7Q6JAG85-119112021115358.jpg', 'jpg', '2021-11-19'),
	(135, '3IQH7Q6JAG85', '3IQH7Q6JAG85-219112021115359.jpg', 'jpg', '2021-11-19'),
	(136, '3IQH7Q6JAG85', '3IQH7Q6JAG85-319112021115400.jpg', 'jpg', '2021-11-19'),
	(143, 'HVAYNKAIMFG6', 'HVAYNKAIMFG6-021112021165650.jpg', 'jpg', '2021-11-21'),
	(144, 'HVAYNKAIMFG6', 'HVAYNKAIMFG6-121112021165651.jpg', 'jpg', '2021-11-21'),
	(145, 'HVAYNKAIMFG6', 'HVAYNKAIMFG6-221112021165652.jpg', 'jpg', '2021-11-21'),
	(146, 'HVAYNKAIMFG6', 'HVAYNKAIMFG6-321112021165652.jpg', 'jpg', '2021-11-21'),
	(147, 'FKO06S0GIANC', 'FKO06S0GIANC-022112021121204.jpg', 'jpg', '2021-11-22');

-- membuang struktur untuk table perparkiran.d_selesai
CREATE TABLE IF NOT EXISTS `d_selesai` (
  `id_d_sel` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_sel` varchar(255) NOT NULL DEFAULT '0',
  `n_d_sel` longtext,
  `x_sel` char(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_d_sel`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.d_selesai: ~12 rows (lebih kurang)
INSERT INTO `d_selesai` (`id_d_sel`, `id_sel`, `n_d_sel`, `x_sel`, `created_at`) VALUES
	(1, 'ZJQQNDBWOIY3', 'ZJQQNDBWOIY3-009092021014647.jpg', 'jpg', '2021-09-08 18:46:47'),
	(2, 'ZJQQNDBWOIY3', 'ZJQQNDBWOIY3-109092021014647.jpg', 'jpg', '2021-09-08 18:46:48'),
	(3, 'ZJQQNDBWOIY3', 'ZJQQNDBWOIY3-209092021014648.jpg', 'jpg', '2021-09-08 18:46:48'),
	(4, 'ZJQQNDBWOIY3', 'ZJQQNDBWOIY3-309092021014648.mp4', 'mp4', '2021-09-08 18:46:48'),
	(5, 'RML3KY8HCCN4', 'RML3KY8HCCN4-009092021015223.jpg', 'jpg', '2021-09-08 18:52:23'),
	(6, 'RML3KY8HCCN4', 'RML3KY8HCCN4-109092021015223.jpg', 'jpg', '2021-09-08 18:52:23'),
	(7, 'RML3KY8HCCN4', 'RML3KY8HCCN4-209092021015223.jpg', 'jpg', '2021-09-08 18:52:24'),
	(8, 'RML3KY8HCCN4', 'RML3KY8HCCN4-309092021015224.mp4', 'mp4', '2021-09-08 18:52:24'),
	(9, 'XRKI5PDCNAJ7', 'XRKI5PDCNAJ7-011092021092223.jpg', 'jpg', '2021-09-11 02:22:23'),
	(10, 'XRKI5PDCNAJ7', 'XRKI5PDCNAJ7-111092021092224.jpg', 'jpg', '2021-09-11 02:22:24'),
	(11, 'XNM468EHK3ZX', 'XNM468EHK3ZX-011092021092434.jpg', 'jpg', '2021-09-11 02:24:34'),
	(12, 'SJSQJ15DNG7L', 'SJSQJ15DNG7L-011092021134731.jpg', 'jpg', '2021-09-11 06:47:31');

-- membuang struktur untuk table perparkiran.giat
CREATE TABLE IF NOT EXISTS `giat` (
  `id_giat` varchar(255) NOT NULL,
  `no_giat` varchar(150) DEFAULT NULL,
  `tgl_giat` timestamp NOT NULL,
  `regu` varchar(255) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `ket_giat` longtext,
  `adm_giat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_giat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.giat: ~5 rows (lebih kurang)
INSERT INTO `giat` (`id_giat`, `no_giat`, `tgl_giat`, `regu`, `kegiatan`, `ket_giat`, `adm_giat`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('45-penertiban-parkir-fdg-dg', '06.719/Keg-Par/DP-KP/PRK/IX/2021', '2021-09-09 15:43:00', 'REGU-87851', 'Penertiban parkir fdg dg', '<p>dfgfdgsdfg dfs gsdfg sd df gsdf</p>', 'USR-99999', '2021-09-09 15:43:22', '2021-09-09 15:43:22', NULL),
	('65-pengecekan-atribut-jukir-dsfdsf-dsf-dsf', '06.863/Keg-Par/DP-KP/PRK/IX/2021', '2021-09-09 15:50:00', 'REGU-62216', 'Pengecekan atribut jukir dsfdsf dsf dsf', '<p>sdf sdaf asdf asdfasdf</p>', 'USR-12496', '2021-09-09 15:51:06', '2021-09-09 15:51:06', NULL),
	('GIATIWV7GPPDX0PARKIR', '06.115/Keg-Par/DP-KP/PRK/IX/2021', '2021-09-07 06:05:00', 'REGU-62216', 'Penertipan parkir', '<ol><li>sdfdfdsf</li><li>sdfdsf</li><li>sdfdsfdsf</li></ol><p><span style="font-family:Arial, Helvetica, sans-serif;">sdfdsfdsfdsfdsfdsfdsfsdfsdfsfffsfdsfdsfsdf sdfsfjhdsfhgi dfgfg dgfdfgdfgdfgdfg dfgfdgfdg dfgdfgdfgsdfgsdfg&nbsp;</span><br><span style="font-family:Arial, Helvetica, sans-serif;">DFWFFDS</span><br><span style="font-family:Arial, Helvetica, sans-serif;">dsafsdfjgkdsjfkdsl</span><br><span style="font-family:Arial, Helvetica, sans-serif;">sdlkfl;dskf;ldksfl;ksd;</span><br><span style="font-family:Arial, Helvetica, sans-serif;">sdkl;fkdskf;sdkf;</span><br><span style="font-family:Arial, Helvetica, sans-serif;">dsl;fksd;lfk</span><br>&nbsp;</p>', 'USR-99999', '2021-09-07 06:10:56', '2021-09-07 06:10:56', NULL),
	('penertipan-parkir-22', '06.026/Keg-Par/DP-KP/PRK/IX/2021', '2021-09-08 06:48:00', 'REGU-62216', 'Penertipan Parkir', '<ol><li>STC</li><li>Pasar Buah</li><li>Pasar Bawah</li><li>dll.</li></ol>', 'USR-99999', '2021-09-08 06:48:37', '2021-09-08 06:48:37', NULL),
	('pengecekan-atribut-jukir-19', '06.569/Keg-Par/DP-KP/PRK/IX/2021', '2021-09-09 14:47:00', 'REGU-62216', 'Pengecekan atribut jukir', '<p>asdfsda asd s hasdiu haisud&nbsp;</p><ol><li>sdasda</li><li>asdasd</li><li>asdasd</li></ol>', 'USR-06782', '2021-09-09 14:55:55', '2021-09-09 14:55:55', NULL);

-- membuang struktur untuk table perparkiran.hal_utama
CREATE TABLE IF NOT EXISTS `hal_utama` (
  `id_hal` int(11) DEFAULT NULL,
  `id_tags` bigint(20) DEFAULT NULL,
  `adm_hal` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.hal_utama: ~2 rows (lebih kurang)
INSERT INTO `hal_utama` (`id_hal`, `id_tags`, `adm_hal`, `updated_at`) VALUES
	(1, 1, 'USR-99999', '2021-09-26 16:26:17'),
	(2, 3, 'USR-99999', '2021-09-26 16:26:29');

-- membuang struktur untuk table perparkiran.pengaduan
CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id_peng` varchar(255) NOT NULL,
  `nama_p` varchar(255) DEFAULT NULL,
  `email_p` varchar(255) DEFAULT NULL,
  `no_hp_p` char(50) DEFAULT NULL,
  `j_peng` text,
  `slug` varchar(255) NOT NULL,
  `peng` longtext,
  `status` enum('P','T','S','X') DEFAULT NULL,
  `sifat` enum('R','TR') DEFAULT NULL,
  `regu` varchar(255) DEFAULT NULL,
  `adm_peng` varchar(255) NOT NULL,
  `tgl_peng` timestamp NULL DEFAULT NULL,
  `ket_peng` longtext,
  `tgl_teruskan` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_peng`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.pengaduan: ~12 rows (lebih kurang)
INSERT INTO `pengaduan` (`id_peng`, `nama_p`, `email_p`, `no_hp_p`, `j_peng`, `slug`, `peng`, `status`, `sifat`, `regu`, `adm_peng`, `tgl_peng`, `ket_peng`, `tgl_teruskan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('0Q68HF9Z62M7', 'Rahmad Riskiadi', 'rahmad.looker@gmail.com', '082284487674', 'Parkir liar di daerah panam sebelah amora.', '14-parkir-liar-di-daerah-panam-sebelah-amora', '<p>asdhuiahsg diuahsiudhasiudhas uhdaisuhdiuasd sdas asdasdasdhkashd ashdiuhasd</p>', 'S', 'TR', 'REGU-62216', 'USR-99999', '2021-09-08 07:16:42', NULL, '2021-09-08 15:36:36', '2021-09-08 07:16:42', '2021-09-08 18:52:29', NULL),
	('10ZMD2TXVC9P', 'Nadine Khairunisa', 'emi.ngasirun@gmail.com', '085156199556', 'Parkira Meresahkan', '19-parkira-meresahkan', '<p>asdas asd asd as dasd asdasd asd</p>', 'X', 'TR', 'NULL', 'USR-12496', '2021-09-09 15:32:27', '<p>Bukti laporan tidak terlampir, Silahkan lengkapi laporan beserta bukti yang jelas (ex: Foto/Video)</p>', NULL, '2021-09-09 15:32:27', '2021-09-11 02:56:46', NULL),
	('3IQH7Q6JAG85', 'Radevanka Albiansyah Rahmadi', 'rahmad.rizki.adi@students.uin-suska.ac.id', '', 'Juru Parkir meminta tarif lebih dari 2000 hfhgfh', '12-juru-parkir-meminta-tarif-lebih-dari-2000-hfhgfh', '<p>oigoidjfogijdfog fodigjod</p>', 'P', 'TR', 'NULL', 'USR-95579', '2021-11-19 04:54:11', 'Sedang diverifikasi', NULL, '2021-11-19 04:54:11', '2021-11-19 04:54:11', NULL),
	('4AUTD8SI8F2B', 'Nadine Khairunisa', 'emi.ngasirun@gmail.com', '085156199556', 'Parkira Meresahkan asd asd a', '43-parkira-meresahkan-asd-asd-a', '<ol><li>asd asd</li><li>asdsad</li><li>asdasd</li></ol>', 'S', 'TR', 'REGU-87851', 'USR-12496', '2021-09-11 02:11:43', 'telah diproses dan ditindak lanjuti oleh Regu Raider', '2021-09-11 02:16:01', '2021-09-11 02:11:43', '2021-09-11 02:24:38', NULL),
	('9QFB8IWWWB2P', 'Rahmad Riskiadi', 'rahmad.looker@gmail.com', '082284487674', 'Pengaduan Perparkiran.zxc', '36-pengaduan-perparkiranzxc', '<p>zxczxcxzcxzcxzcxzc zxcxzc zxc zxc zxz xzc</p>', 'T', 'TR', 'REGU-87851', 'USR-99999', '2021-09-08 14:03:52', '<p>Bukti laporan tidak terlampir, Silahkan lengkapi laporan beserta bukti yang jelas (ex: Foto/Video)</p>', '2021-09-08 15:44:20', '2021-09-08 14:03:52', '2021-09-08 14:03:52', NULL),
	('AVZQ6S8E2GBW', 'Aprina Suryandari', 'rahmad.looker@gmail.com', '082284487674', 'Parkir liar di daerah panam sebelah amora.', '71-parkir-liar-di-daerah-panam-sebelah-amora', '<p>gfdhfgh fgh fgh fgh fgh fgh</p><ol><li>sdf sdf</li><li>sdfdsfds</li><li>sdfdsfsdf</li><li>sdfdsf</li><li>&nbsp;</li></ol>', 'P', 'TR', 'NULL', 'USR-99999', '2021-09-08 14:32:48', NULL, NULL, '2021-09-08 14:32:48', '2021-09-09 16:30:58', NULL),
	('FKO06S0GIANC', 'Radevanka Albiansyah Rahmadi', 'rahmad.rizki.adi@students.uin-suska.ac.id', '', 'Test laporan baru tentang perparkiran.', '20-test-laporan-baru-tentang-perparkiran', '<p>Pengaduan parkir di daerah tersebut</p>', 'P', 'TR', 'NULL', 'USR-95579', '2021-11-22 05:12:10', 'Sedang diverifikasi', NULL, '2021-11-22 05:12:10', '2021-11-22 05:12:10', NULL),
	('HVAYNKAIMFG6', 'Radevanka Albiansyah Rahmadi', 'rahmad.rizki.adi@students.uin-suska.ac.id', '', 'Juru Parkir meminta tarif lebih dari 2000', '48-juru-parkir-meminta-tarif-lebih-dari-2000', '<p>Isi Pengaduanjjj</p>', 'P', 'TR', 'NULL', 'USR-95579', '2021-11-21 09:56:57', 'Sedang diverifikasi', NULL, '2021-11-21 09:56:57', '2021-11-21 09:56:57', NULL),
	('O4MQZGMM6FCX', 'Aprina Suryandari', 'rahmad.looker@gmail.com', '082284487674', 'Pengaduan Parkir Now', '36-pengaduan-parkir-now', '<p>sDSA AS &nbsp;asdsad sa dasd&nbsp;</p>', 'S', 'TR', 'REGU-62216', 'USR-06782', '2021-09-08 14:13:49', 'telah diproses dan ditindak lanjuti oleh Regu Bravo', '2021-09-08 16:22:20', '2021-09-08 14:13:49', '2021-09-11 06:47:36', NULL),
	('YE8IKT4VERLA', 'Rahmad Riskiadi', 'aprina.suryandari@gmail.com', '082284487674', 'Pengaduan Parkir', '89-pengaduan-parkir', '<p>sdfdsfdfdsfdsfds sdfdsf sdfsd sdf &nbsp;sdfdsf</p>', 'P', 'TR', 'NULL', 'USR-99999', '2021-09-08 14:02:51', NULL, NULL, '2021-09-08 14:02:51', '2021-09-09 16:41:20', NULL);

-- membuang struktur untuk table perparkiran.privacy_policy
CREATE TABLE IF NOT EXISTS `privacy_policy` (
  `id` int(11) DEFAULT NULL,
  `privacy` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.privacy_policy: ~1 rows (lebih kurang)
INSERT INTO `privacy_policy` (`id`, `privacy`) VALUES
	(1, '<h1>Kebijakan Privasi untuk Website SiParkir Kota Pekanbaru</h1>\r\n\r\n<p>SiParkir Kota Pekanbaru, dapat diakses dari https://lapor.dishub.pekanbaru.go.id/perparkiran, salah satu prioritas utama kami adalah privasi pengunjung kami. Dokumen Kebijakan Privasi ini berisi jenis informasi yang dikumpulkan dan dicatat oleh SiParkir Kota Pekanbaru dan bagaimana kami menggunakannya.</p>\r\n\r\n<p>Jika Anda memiliki pertanyaan tambahan atau memerlukan informasi lebih lanjut tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami.</p>\r\n\r\n<h2>Log Files</h2>\r\n\r\n<p>SiParkir Kota Pekanbaru mengikuti prosedur standar menggunakan file log. File-file ini mencatat pengunjung ketika mereka mengunjungi situs web. Semua perusahaan hosting melakukan ini dan merupakan bagian dari analisis layanan hosting. Informasi yang dikumpulkan oleh file log termasuk alamat protokol internet (IP), jenis browser, Penyedia Layanan Internet (ISP), cap tanggal dan waktu, halaman rujukan/keluar, dan mungkin jumlah klik. Ini tidak terkait dengan informasi apa pun yang dapat diidentifikasi secara pribadi. Tujuan dari informasi ini adalah untuk menganalisis tren, mengelola situs, melacak pergerakan pengguna di situs web, dan mengumpulkan informasi demografis. Kebijakan Privasi kami dibuat dengan bantuan dari <a href="https://www.privacypolicyonline.com/privacy-policy-generator/">Privacy Policy Generator</a>.</p>\r\n\r\n<h2>Cookie dan Web Beacon</h2>\r\n\r\n<p>Seperti situs web lainnya, SiParkir Kota Pekanbaru menggunakan \'cookies\'. Cookie ini digunakan untuk menyimpan informasi termasuk preferensi pengunjung, dan halaman di situs web yang diakses atau dikunjungi pengunjung. Informasi tersebut digunakan untuk mengoptimalkan pengalaman pengguna dengan menyesuaikan konten halaman web kami berdasarkan jenis browser pengunjung dan/atau informasi lainnya.</p>\r\n\r\n<p>Untuk informasi lebih umum tentang cookie, silakan baca<a href="https://www.generateprivacypolicy.com/#cookies">"Cookies" article from the Privacy Policy Generator</a>.</p>\r\n\r\n<h2>Cookie Google DoubleClick DART</h2>\r\n\r\n<p>Google adalah salah satu vendor pihak ketiga di situs kami. Ini juga menggunakan cookie, yang dikenal sebagai cookie DART, untuk menayangkan iklan kepada pengunjung situs kami berdasarkan kunjungan mereka ke www.website.com dan situs lain di internet. Namun, pengunjung dapat memilih untuk menolak penggunaan cookie DART dengan mengunjungi Kebijakan Privasi jaringan iklan dan konten Google di URL berikut  <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a></p>\r\n\r\n\r\n<h2>Kebijakan Privasi</h2>\r\n\r\n<P>Anda dapat berkonsultasi dengan daftar ini untuk menemukan Kebijakan Privasi masing-masing mitra periklanan SiParkir Kota Pekanbaru.</p>\r\n\r\n<p>Server iklan atau jaringan iklan pihak ketiga menggunakan teknologi seperti cookie, JavaScript, atau Web Beacon yang digunakan di masing-masing iklan dan tautan yang muncul di SiParkir Kota Pekanbaru, yang dikirim langsung ke browser pengguna. Mereka secara otomatis menerima alamat IP Anda ketika ini terjadi. Teknologi ini digunakan untuk mengukur efektivitas kampanye iklan mereka dan/atau untuk mempersonalisasi konten iklan yang Anda lihat di situs web yang Anda kunjungi.</p>\r\n\r\n<p>Perhatikan bahwa SiParkir Kota Pekanbaru tidak memiliki akses atau kontrol terhadap cookie ini yang digunakan oleh pengiklan pihak ketiga.</p>\r\n\r\n<h2>Kebijakan Privasi Pihak Ketiga</h2>\r\n\r\n<p>Kebijakan Privasi Pihak Ketiga Oleh karena itu, kami menyarankan Anda untuk berkonsultasi dengan Kebijakan Privasi masing-masing dari server iklan pihak ketiga ini untuk informasi lebih rinci. Ini mungkin termasuk praktik dan instruksi mereka tentang cara memilih keluar dari opsi tertentu. </p>\r\n\r\n<p>Anda dapat memilih untuk menonaktifkan cookie melalui opsi browser individual Anda. Untuk mengetahui informasi lebih rinci tentang manajemen cookie dengan browser web tertentu, dapat ditemukan di situs web masing-masing browser. Apa Itu Cookie?</p>');

-- membuang struktur untuk table perparkiran.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `nm_apl` varchar(255) DEFAULT NULL,
  `nm_instansi` varchar(255) DEFAULT NULL,
  `nm_upt` varchar(255) DEFAULT NULL,
  `alamat` longtext,
  `no_telp` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `no_wa` varchar(50) DEFAULT NULL,
  `no_fax` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `deskripsi` longtext,
  `fb` varchar(255) DEFAULT NULL,
  `tw` varchar(255) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `yt` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `vim` varchar(255) DEFAULT NULL,
  `yah` varchar(255) DEFAULT NULL,
  `lik` varchar(255) DEFAULT NULL,
  `git` varchar(255) DEFAULT NULL,
  `sky` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `web` longtext,
  `maps` longtext,
  `usr_update` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.profile: ~1 rows (lebih kurang)
INSERT INTO `profile` (`id`, `nm_apl`, `nm_instansi`, `nm_upt`, `alamat`, `no_telp`, `no_hp`, `no_wa`, `no_fax`, `email`, `deskripsi`, `fb`, `tw`, `ig`, `yt`, `pin`, `vim`, `yah`, `lik`, `git`, `sky`, `logo`, `icon`, `web`, `maps`, `usr_update`, `updated_at`) VALUES
	(1, 'SiParkir Kota Pekanbaru', 'Dinas Perhubungan Kota Pekanbaru', 'UPT Perparkiran', 'Jalan Abdul Rahman Hamid Komplek Perkantoran Tenayan Raya, Gedung B.9 Lt 1 dan 2, Sail, Kec. Tenayan Raya, Kota Pekanbaru, Riau 28285', '(0761) XXXX', '08XX-XXXX-XXXX', '6281266397770', '(0761) XXXX', 'rra.code@gmail.com', '<p> Sistem Informasi Perparkiran Dinas Perhubungan Kota Pekanbaru, <br> Dikelola oleh tim IT UPT Perparkiran Dinas Perhubungan Kota Pekanbaru </p>', 'dishub.pku', 'dishub.pku', 'upt.perparkiranpku', 'atcs.kotapekanbaru', '-', '-', '-', '-', '-', '-', NULL, NULL, 'perparkiran.bangameck.dev', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15958.626645132448!2d101.5435486!3d0.5157777!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x946d5a25a6c6eb46!2sArea%20Traffic%20Control%20System%20(ATCS)%20Dinas%20Perhubungan%20Kota%20Pekanbaru!5e0!3m2!1sen!2sid!4v1632665696592!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', 'USR-9999', '2021-09-26 14:15:22');

-- membuang struktur untuk table perparkiran.rate_pengaduan
CREATE TABLE IF NOT EXISTS `rate_pengaduan` (
  `id_rate_peng` int(11) NOT NULL AUTO_INCREMENT,
  `id_peng` varchar(255) DEFAULT NULL,
  `rate_peng` double DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_rate_peng`),
  UNIQUE KEY `id_peng` (`id_peng`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.rate_pengaduan: ~3 rows (lebih kurang)
INSERT INTO `rate_pengaduan` (`id_rate_peng`, `id_peng`, `rate_peng`, `create_at`, `updated_at`) VALUES
	(1, '0Q68HF9Z62M7', 5, '2021-10-02 08:54:55', '2021-10-02 08:54:57'),
	(2, '4AUTD8SI8F2B', 4.5, '2021-10-02 09:16:24', '2021-10-02 09:16:25'),
	(3, 'O4MQZGMM6FCX', 4, '2021-10-02 09:17:12', '2021-10-02 09:17:12');

-- membuang struktur untuk table perparkiran.regu
CREATE TABLE IF NOT EXISTS `regu` (
  `id_regu` varchar(255) NOT NULL DEFAULT '',
  `nm_regu` varchar(255) DEFAULT NULL,
  `karu` varchar(255) NOT NULL DEFAULT '',
  `f_regu` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_regu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.regu: ~3 rows (lebih kurang)
INSERT INTO `regu` (`id_regu`, `nm_regu`, `karu`, `f_regu`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('REGU-19932', 'Ranger', 'USR-79955', '', '2021-11-13 07:26:48', '2021-11-13 07:27:34', NULL),
	('REGU-62216', 'Bravo', 'USR-91697', 'Bravo_13072021230950.jpg', '2021-07-13 15:33:34', '2021-07-13 16:09:51', NULL),
	('REGU-87851', 'Raider', 'USR-57899', 'Raider_13072021231210.jpeg', '2021-07-13 15:36:48', '2021-07-13 16:12:10', NULL);

-- membuang struktur untuk table perparkiran.selesai
CREATE TABLE IF NOT EXISTS `selesai` (
  `id_sel` varchar(255) NOT NULL,
  `id_peng` varchar(255) DEFAULT NULL,
  `ket_sel` longtext,
  `adm_sel` varchar(50) NOT NULL,
  `tgl_sel` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.selesai: ~3 rows (lebih kurang)
INSERT INTO `selesai` (`id_sel`, `id_peng`, `ket_sel`, `adm_sel`, `tgl_sel`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('RML3KY8HCCN4', '0Q68HF9Z62M7', '<p>jukir sudah diperingati dan berjanji tidak akan mengulangi lagi kesalahan yang sama, jukir meminta maaf atas perilakunya.</p>', 'USR-06782', '2021-09-08 18:52:29', '2021-09-08 18:52:29', NULL, NULL),
	('SJSQJ15DNG7L', 'O4MQZGMM6FCX', '<p>Sudah diproses, jukir berjanji tidak mengulanginya dan sudah membuat surat perjanjian.</p>', 'USR-06782', '2021-09-11 06:47:36', '2021-09-11 06:47:36', NULL, NULL),
	('XNM468EHK3ZX', '4AUTD8SI8F2B', '<p>aasdasdasd</p><ol><li>asdasdas</li><li>dasd</li><li>asd</li></ol>', 'USR-32229', '2021-09-11 02:24:38', '2021-09-11 02:24:38', NULL, NULL);

-- membuang struktur untuk table perparkiran.session
CREATE TABLE IF NOT EXISTS `session` (
  `username` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `br` varchar(255) DEFAULT NULL,
  `token` longtext,
  `created_at` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.session: ~3 rows (lebih kurang)
INSERT INTO `session` (`username`, `ip`, `os`, `br`, `token`, `created_at`) VALUES
	('hilham', '192.168.100.138', 'Linux', 'Google Chrome v.92.0.4515.159', 'AezoD8c5ljW0N6eKF2Z+laUmLJUEvcTfRUIuoVB0oe8=', '2021-09-21 11:29:04'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', 'exbt2DrO4VeEyr6IfkfnZD7yjtO9J/MG1soRlSHzgYw=', '2021-11-22 11:28:39'),
	('albian', '192.168.123.17', 'Linux', 'Google Chrome v.96.0.4664.45', 'C9Yg6ziIWKsbxjj1voqJJ4pvkQ9vBgWmWUrMQYVVtJ0=', '2021-11-22 12:09:27');

-- membuang struktur untuk table perparkiran.session_log
CREATE TABLE IF NOT EXISTS `session_log` (
  `username` longtext,
  `ip` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.session_log: ~49 rows (lebih kurang)
INSERT INTO `session_log` (`username`, `ip`, `os`, `browser`, `time`) VALUES
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.71', '2021-10-10 16:34:40'),
	('bangameck', '::1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-25 10:23:59'),
	('bangameck', '::1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-25 11:45:39'),
	('sutor_risman', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-25 15:20:12'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-25 15:21:28'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-25 15:21:55'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 12:08:04'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 13:51:01'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 15:57:25'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 06:11:27'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 06:15:33'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 06:15:53'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 07:26:14'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 15:34:07'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 15:34:29'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 16:10:52'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 16:12:23'),
	('bangameck', '192.168.43.1', 'Linux', 'Google Chrome v.95.0.4638.69', '2021-11-13 16:20:57'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 16:29:48'),
	('albian', '192.168.43.1', 'Linux', 'Google Chrome v.95.0.4638.69', '2021-11-13 16:58:43'),
	('albian', '192.168.43.1', 'Linux', 'Google Chrome v.95.0.4638.69', '2021-11-13 17:00:31'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 17:24:59'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 17:27:24'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 17:29:12'),
	('albian', '192.168.43.1', 'Linux', 'Google Chrome v.95.0.4638.69', '2021-11-13 17:35:04'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 17:36:18'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 17:58:33'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 18:19:10'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-18 11:11:16'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-18 15:53:47'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 04:34:21'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 04:40:56'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 04:52:02'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 05:09:16'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-19 06:36:49'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 06:41:54'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 06:42:48'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 06:48:04'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 06:49:06'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 06:55:19'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 07:05:20'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 07:11:47'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-19 07:12:21'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-21 09:38:20'),
	('albian', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-21 09:38:46'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-22 02:53:30'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-22 04:27:33'),
	('bangameck', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-22 04:28:39'),
	('albian', '192.168.123.17', 'Linux', 'Google Chrome v.96.0.4664.45', '2021-11-22 05:09:27');

-- membuang struktur untuk table perparkiran.session_view_blog
CREATE TABLE IF NOT EXISTS `session_view_blog` (
  `id_blog` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.session_view_blog: ~159 rows (lebih kurang)
INSERT INTO `session_view_blog` (`id_blog`, `ip`, `os`, `browser`, `time`) VALUES
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 07:49:56'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 07:50:00'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 07:50:11'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 07:50:13'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 07:50:13'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 07:53:15'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 07:53:49'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 07:54:05'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:04:39'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:05:33'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:06:49'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:14:18'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:14:39'),
	('86803484694911984167', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-19 08:17:37'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:29:52'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:30:11'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:31:12'),
	('86803484694911984167', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-19 08:31:30'),
	('98653079279646273606', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-19 08:32:00'),
	('98653079279646273606', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-19 08:33:35'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-19 08:37:36'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:25:38'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:29:49'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:32:51'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:34:31'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:36:05'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:37:28'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:38:37'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:39:11'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:39:23'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:39:31'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:40:06'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:40:25'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:40:44'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:41:08'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:41:24'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:41:34'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:41:47'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:42:11'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:42:45'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:43:21'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:43:57'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:45:06'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:45:15'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:46:08'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:47:19'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:48:29'),
	('69524179615558173022', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 14:48:35'),
	('69524179615558173022', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 15:42:52'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 15:47:16'),
	('36115892756196518748', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 15:53:16'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 15:56:33'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 16:02:31'),
	('36115892756196518748', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 16:52:18'),
	('36115892756196518748', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 16:53:13'),
	('73704880695227223843', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 16:53:22'),
	('98653079279646273606', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 16:53:29'),
	('00998428351696011609', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 16:53:56'),
	('00998428351696011609', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 16:54:07'),
	('00998428351696011609', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 16:54:39'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 16:54:45'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:02:52'),
	('00998428351696011609', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:03:00'),
	('86803484694911984167', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:03:12'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:08:37'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:09:30'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:09:42'),
	('86803484694911984167', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:10:12'),
	('86803484694911984167', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:10:16'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:10:40'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:10:52'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:10:56'),
	('00998428351696011609', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:11:05'),
	('98653079279646273606', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:11:12'),
	('36115892756196518748', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:11:17'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:11:46'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:11:57'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:12:03'),
	('69524179615558173022', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:12:15'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:16:49'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:18:58'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:19:39'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:19:56'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:20:01'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:21:38'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:22:33'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:25:14'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:26:58'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:27:15'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:27:36'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:28:11'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:28:30'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:29:12'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:30:56'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:31:24'),
	('50175059584679106666', '127.0.0.1', 'Windows 10', 'Google Chrome v.94.0.4606.81', '2021-10-20 17:35:21'),
	('69524179615558173022', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:39:21'),
	('69524179615558173022', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:40:41'),
	('36115892756196518748', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:41:21'),
	('98653079279646273606', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 17:45:48'),
	('98653079279646273606', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-20 18:43:09'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-21 02:21:18'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-21 02:22:31'),
	('98653079279646273606', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 15:30:21'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 16:24:49'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 16:29:06'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 16:30:23'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 16:32:03'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 16:32:29'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 16:32:38'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 16:32:55'),
	('36115892756196518748', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-24 16:34:54'),
	('36115892756196518748', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-24 16:44:25'),
	('36115892756196518748', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-24 16:54:08'),
	('00998428351696011609', '::1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-25 10:21:18'),
	('36115892756196518748', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-26 13:29:29'),
	('36115892756196518748', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 11:27:24'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 11:33:54'),
	('86803484694911984167', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 11:34:06'),
	('36115892756196518748', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 12:04:05'),
	('21606794114970369940', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 12:26:06'),
	('21606794114970369940', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 13:54:18'),
	('21606794114970369940', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 13:56:04'),
	('43888224593692599076', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 14:01:16'),
	('00998428351696011609', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 15:46:25'),
	('00998428351696011609', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 15:47:59'),
	('36115892756196518748', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 15:48:09'),
	('36115892756196518748', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 15:48:31'),
	('21606794114970369940', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 15:48:49'),
	('66251029841392860537', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-28 15:53:50'),
	('43888224593692599076', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-28 15:54:38'),
	('66251029841392860537', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-28 15:55:02'),
	('43888224593692599076', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-28 15:55:29'),
	('66251029841392860537', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-28 15:55:32'),
	('21606794114970369940', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-28 16:00:27'),
	('21606794114970369940', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 16:00:32'),
	('43888224593692599076', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-28 16:01:44'),
	('21606794114970369940', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-29 10:30:32'),
	('21606794114970369940', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-29 10:36:55'),
	('66251029841392860537', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-29 10:37:19'),
	('21606794114970369940', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-29 11:32:04'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-29 14:23:14'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-29 14:23:23'),
	('66251029841392860537', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-29 14:24:06'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-10-29 14:24:20'),
	('66251029841392860537', '192.168.43.1', 'Linux', 'Google Chrome v.94.0.4606.71', '2021-10-29 14:31:54'),
	('21606794114970369940', '192.168.43.1', 'Linux', 'Google Chrome v.4.0', '2021-10-29 14:34:35'),
	('21606794114970369940', '192.168.43.1', 'Linux', 'Google Chrome v.4.0', '2021-10-29 14:35:02'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-11-12 15:51:34'),
	('00998428351696011609', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-11-12 15:52:04'),
	('43888224593692599076', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-11-12 15:52:18'),
	('43888224593692599076', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-11-12 15:53:39'),
	('43888224593692599076', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.54', '2021-11-12 15:53:49'),
	('66251029841392860537', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 03:26:20'),
	('73704880695227223843', '127.0.0.1', 'Windows 10', 'Google Chrome v.95.0.4638.69', '2021-11-13 05:47:25'),
	('98653079279646273606', '114.125.6.142', 'Linux', 'Google Chrome v.95.0.4638.69', '2021-11-18 15:41:45'),
	('98653079279646273606', '114.125.6.142', 'Linux', 'Google Chrome v.95.0.4638.69', '2021-11-18 15:44:11'),
	('66251029841392860537', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-19 03:56:56'),
	('21606794114970369940', '127.0.0.1', 'Windows 10', 'Google Chrome v.96.0.4664.45', '2021-11-22 05:34:03');

-- membuang struktur untuk table perparkiran.session_view_dokumen
CREATE TABLE IF NOT EXISTS `session_view_dokumen` (
  `id_dok` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.session_view_dokumen: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.session_view_kegiatan
CREATE TABLE IF NOT EXISTS `session_view_kegiatan` (
  `id_giat` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.session_view_kegiatan: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.session_view_pc
CREATE TABLE IF NOT EXISTS `session_view_pc` (
  `id_pc` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.session_view_pc: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.session_view_pengaduan
CREATE TABLE IF NOT EXISTS `session_view_pengaduan` (
  `id_peng` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.session_view_pengaduan: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id_tags` bigint(20) NOT NULL AUTO_INCREMENT,
  `nm_tags` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `usr_tags` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tags`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.tags: ~6 rows (lebih kurang)
INSERT INTO `tags` (`id_tags`, `nm_tags`, `url`, `usr_tags`, `created_at`, `updated_at`) VALUES
	(1, 'Perparkiran', 'perparkiran', 'USR-99999', '2021-09-12 05:27:17', NULL),
	(2, 'Edukasi', 'edukasi', 'USR-99999', '2021-09-12 05:27:27', NULL),
	(3, 'Berita', 'berita', 'USR-99999', '2021-09-13 13:41:46', NULL),
	(4, 'Hiburan', 'hiburan', 'USR-99999', '2021-09-13 13:41:56', NULL),
	(5, 'Pekanbaru', 'pekanbaru', 'USR-99999', '2021-09-13 13:42:22', NULL),
	(6, 'Dishub', 'dishub', 'USR-99999', '2021-10-02 14:30:36', NULL);

-- membuang struktur untuk table perparkiran.tags_blog
CREATE TABLE IF NOT EXISTS `tags_blog` (
  `id_tb` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_blog` varchar(255) DEFAULT NULL,
  `id_tags` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tb`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.tags_blog: ~37 rows (lebih kurang)
INSERT INTO `tags_blog` (`id_tb`, `id_blog`, `id_tags`, `created_at`) VALUES
	(132, '00998428351696011609', 3, '2021-10-10 15:06:40'),
	(133, '00998428351696011609', 6, '2021-10-10 15:06:40'),
	(134, '00998428351696011609', 5, '2021-10-10 15:06:40'),
	(135, '00998428351696011609', 1, '2021-10-10 15:06:40'),
	(136, '50175059584679106666', 3, '2021-10-10 15:06:59'),
	(137, '50175059584679106666', 6, '2021-10-10 15:06:59'),
	(138, '50175059584679106666', 5, '2021-10-10 15:06:59'),
	(139, '73704880695227223843', 3, '2021-10-10 15:07:26'),
	(140, '73704880695227223843', 6, '2021-10-10 15:07:26'),
	(141, '73704880695227223843', 1, '2021-10-10 15:07:26'),
	(142, '69524179615558173022', 3, '2021-10-10 15:07:48'),
	(143, '69524179615558173022', 6, '2021-10-10 15:07:48'),
	(144, '69524179615558173022', 5, '2021-10-10 15:07:48'),
	(145, '98653079279646273606', 3, '2021-10-10 15:08:31'),
	(146, '98653079279646273606', 6, '2021-10-10 15:08:31'),
	(147, '98653079279646273606', 5, '2021-10-10 15:08:31'),
	(148, '98653079279646273606', 1, '2021-10-10 15:08:31'),
	(149, '36115892756196518748', 3, '2021-10-10 15:08:51'),
	(150, '36115892756196518748', 6, '2021-10-10 15:08:51'),
	(151, '36115892756196518748', 5, '2021-10-10 15:08:51'),
	(152, '36115892756196518748', 1, '2021-10-10 15:08:51'),
	(177, '86803484694911984167', 3, '2021-10-10 15:43:30'),
	(178, '86803484694911984167', 6, '2021-10-10 15:43:31'),
	(179, '86803484694911984167', 5, '2021-10-10 15:43:31'),
	(180, '86803484694911984167', 1, '2021-10-10 15:43:31'),
	(181, '01258618167150730981', 3, '2021-10-25 10:45:35'),
	(182, '01258618167150730981', 6, '2021-10-25 10:45:35'),
	(183, '01258618167150730981', 5, '2021-10-25 10:45:35'),
	(184, '66251029841392860537', 3, '2021-10-28 12:21:52'),
	(185, '66251029841392860537', 6, '2021-10-28 12:21:52'),
	(186, '66251029841392860537', 5, '2021-10-28 12:21:52'),
	(187, '66251029841392860537', 1, '2021-10-28 12:21:52'),
	(188, '21606794114970369940', 3, '2021-10-28 12:25:29'),
	(189, '21606794114970369940', 2, '2021-10-28 12:25:29'),
	(190, '43888224593692599076', 3, '2021-10-28 13:53:51'),
	(191, '43888224593692599076', 6, '2021-10-28 13:53:51'),
	(192, '43888224593692599076', 5, '2021-10-28 13:53:51');

-- membuang struktur untuk table perparkiran.trems
CREATE TABLE IF NOT EXISTS `trems` (
  `id` int(11) DEFAULT NULL,
  `trems` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.trems: ~1 rows (lebih kurang)
INSERT INTO `trems` (`id`, `trems`) VALUES
	(1, '<h2><strong>Persyaratan dan Ketentuan</strong></h2>\r\n\r\n<p>Selamat datang di Website SiParkir Kota Pekanbaru!</p>\r\n\r\n<p>Syarat dan ketentuan ini menguraikan aturan dan ketentuan penggunaan Situs Web SiParkir Kota Pekanbaru yang beralamat di https://lapor.dishub.pekanbaru.go.id/perparkiran.</p>\r\n\r\n<p>Dengan mengakses situs web ini, kami menganggap Anda menerima syarat dan ketentuan ini. Jangan melanjutkan penggunaan SiParkir Kota Pekanbaru jika Anda tidak setuju untuk mengikuti semua syarat dan ketentuan yang tertera di halaman ini.</p>\r\n\r\n<p>Terminologi berikut berlaku untuk Syarat dan Ketentuan ini, Pernyataan Privasi dan Pemberitahuan Penafian dan semua Perjanjian: "Klien", "Anda" dan "Anda" mengacu pada Anda, orang yang masuk ke situs web ini dan mematuhi persyaratan dan kondisi. "Perusahaan", "Kami Sendiri", "Kami", "Kami" dan "Kami", mengacu pada Perusahaan kami. "Pihak", "Para Pihak", atau "Kami", mengacu pada Klien dan kami sendiri. Semua istilah mengacu pada penawaran, penerimaan, dan pertimbangan pembayaran yang diperlukan untuk melakukan proses bantuan kami kepada Klien dengan cara yang paling tepat untuk tujuan yang jelas dalam memenuhi kebutuhan Klien sehubungan dengan penyediaan layanan yang dinyatakan Perusahaan, sesuai dengan dan tunduk pada, hukum yang berlaku di Belanda. Setiap penggunaan terminologi di atas atau kata-kata lain dalam bentuk tunggal, jamak, huruf besar dan/atau dia, dianggap dapat dipertukarkan dan oleh karena itu mengacu pada yang sama. Persyaratan dan Ketentuan kami dibuat dengan bantuan <a href="https://www.privacypolicyonline.com/terms-conditions-generator/">Pembuat Persyaratan & Ketentuan</a>.</p>\r\n\r\n<h3><strong>Cookie</strong></h3>\r\n\r\n<p>Kami menerapkan penggunaan cookie. Dengan mengakses SiParkir Kota Pekanbaru, Anda setuju untuk menggunakan cookie sesuai dengan Kebijakan Privasi SiParkir Kota Pekanbaru.</p>\r\n\r\n<p>Sebagian besar situs web interaktif menggunakan cookie untuk memungkinkan kami mengambil detail pengguna untuk setiap kunjungan. Cookie digunakan oleh situs web kami untuk mengaktifkan fungsionalitas area tertentu untuk memudahkan orang mengunjungi situs web kami. Beberapa mitra afiliasi/iklan kami juga dapat menggunakan cookie.</p>\r\n\r\n<h3><strong>Lisensi</strong></h3>\r\n\r\n<p>Kecuali dinyatakan lain, SiParkir Kota Pekanbaru dan/atau pemberi lisensinya memiliki hak kekayaan intelektual untuk semua materi di SiParkir Kota Pekanbaru. Semua hak kekayaan intelektual dilindungi. Anda dapat mengakses ini dari SiParkir Kota Pekanbaru untuk penggunaan pribadi Anda dengan batasan yang diatur dalam syarat dan ketentuan ini.</p>\r\n\r\n<p>Anda tidak boleh:</p>\r\n<ul>\r\n    <li>Menerbitkan ulang materi dari SiParkir Kota Pekanbaru</li>\r\n    <li>Menjual, menyewakan, atau mensublisensikan materi dari SiParkir Kota Pekanbaru</li>\r\n    <li>Mereproduksi, menggandakan, atau menyalin materi dari SiParkir Kota Pekanbaru</li>\r\n    <li>Mendistribusikan ulang konten dari SiParkir Kota Pekanbaru</li>\r\n</ul>\r\n\r\n<p>Perjanjian ini akan dimulai pada tanggal perjanjian ini.</p>\r\n\r\n<p>Bagian dari situs web ini menawarkan kesempatan bagi pengguna untuk memposting dan bertukar pendapat dan informasi di area tertentu dari situs web. SiParkir Kota Pekanbaru tidak memfilter, mengedit, menerbitkan, atau meninjau Komentar sebelum kehadirannya di situs web. Komentar tidak mencerminkan pandangan dan pendapat SiParkir Kota Pekanbaru, agen dan/atau afiliasinya. Komentar mencerminkan pandangan dan pendapat orang yang memposting pandangan dan pendapat mereka. Sejauh diizinkan oleh undang-undang yang berlaku, SiParkir Kota Pekanbaru tidak bertanggung jawab atas Komentar atau kewajiban, kerusakan atau pengeluaran yang disebabkan dan/atau diderita sebagai akibat dari penggunaan dan/atau posting dan/atau tampilan Komentar di situs web ini.</p>\r\n\r\n<p>SiParkir Kota Pekanbaru berhak untuk memantau semua Komentar dan menghapus Komentar yang dianggap tidak pantas, menyinggung, atau menyebabkan pelanggaran terhadap Syarat dan Ketentuan ini.</p>\r\n\r\n<p>Anda menjamin dan menyatakan bahwa:</p>\r\n\r\n<ul>\r\n    <li>Anda berhak memposting Komentar di situs web kami dan memiliki semua lisensi dan persetujuan yang diperlukan untuk melakukannya;</li>\r\n    <li>Komentar tidak melanggar hak kekayaan intelektual apa pun, termasuk namun tidak terbatas pada hak cipta, paten, atau merek dagang pihak ketiga mana pun;</li>\r\n    <li>Komentar tidak mengandung materi yang memfitnah, memfitnah, menyinggung, tidak senonoh, atau melanggar hukum yang merupakan pelanggaran privasi</li>\r\n    <li>Komentar tidak akan digunakan untuk meminta atau mempromosikan bisnis atau kebiasaan atau menyajikan aktivitas komersial atau aktivitas yang melanggar hukum.</li>\r\n</ul>\r\n\r\n<p>Dengan ini Anda memberi SiParkir Kota Pekanbaru lisensi non-eksklusif untuk menggunakan, mereproduksi, mengedit, dan mengizinkan orang lain untuk menggunakan, mereproduksi, dan mengedit Komentar Anda dalam segala bentuk, format, atau media.</p>\r\n\r\n<h3><strong>Hyperlink ke Konten kami</strong></h3>\r\n\r\n<p>Organisasi berikut dapat menautkan ke Situs Web kami tanpa persetujuan tertulis sebelumnya:</p>\r\n\r\n<ul>\r\n    <li>Instansi pemerintah;</li>\r\n    <li>Mesin telusur;</li>\r\n    <li>Organisasi berita;</li>\r\n    <li>Distributor direktori online dapat menautkan ke Situs Web kami dengan cara yang sama seperti mereka melakukan hyperlink ke Situs Web bisnis lain yang terdaftar; dan</li>\r\n    <li>Bisnis Terakreditasi di seluruh sistem kecuali meminta organisasi nirlaba, pusat perbelanjaan amal, dan kelompok penggalangan dana amal yang mungkin tidak hyperlink ke situs Web kami.</li>\r\n</ul>\r\n\r\n<p>Organisasi-organisasi ini dapat menautkan ke beranda kami, ke publikasi, atau ke informasi Situs Web lainnya selama tautan tersebut: (a) sama sekali tidak menipu; (b) tidak secara keliru menyiratkan sponsor, dukungan atau persetujuan dari pihak yang menghubungkan dan produk dan/atau layanannya; dan (c) sesuai dengan konteks situs pihak yang menautkan.</p>\r\n\r\n<p>Kami dapat mempertimbangkan dan menyetujui permintaan tautan lain dari jenis organisasi berikut:</p>\r\n\r\n<ul>\r\n    <li>sumber informasi konsumen dan/atau bisnis yang umum dikenal;</li>\r\n    <li>situs komunitas dot.com;</li>\r\n    <li>asosiasi atau kelompok lain yang mewakili badan amal;</li>\r\n    <li>distributor direktori online;</li>\r\n    <li>portal internet;</li>\r\n    <li>perusahaan akuntansi, hukum dan konsultan; dan</li>\r\n    <li>lembaga pendidikan dan asosiasi perdagangan.</li>\r\n</ul>\r\n\r\n<p>Kami akan menyetujui permintaan tautan dari organisasi-organisasi ini jika kami memutuskan bahwa: (a) tautan tersebut tidak akan membuat kami terlihat buruk bagi diri kami sendiri atau bisnis terakreditasi kami; (b) organisasi tidak memiliki catatan negatif apapun dengan kami; (c) manfaat bagi kami dari visibilitas hyperlink mengkompensasi ketiadaan SiParkir Kota Pekanbaru; dan (d) tautannya berada dalam konteks informasi sumber daya umum.</p>\r\n\r\n<p>Organisasi ini dapat menautkan ke beranda kami selama tautan tersebut: (a) sama sekali tidak menipu; (b) tidak secara keliru menyiratkan sponsorship, dukungan atau persetujuan dari pihak yang menghubungkan dan produk atau layanannya; dan (c) sesuai dengan konteks situs pihak yang menautkan.</p>\r\n\r\n<p>Jika Anda salah satu organisasi yang tercantum dalam paragraf 2 di atas dan tertarik untuk menautkan ke situs web kami, Anda harus memberi tahu kami dengan mengirimkan email ke SiParkir Kota Pekanbaru. Harap sertakan nama Anda, nama organisasi Anda, informasi kontak serta URL situs Anda, daftar URL apa pun yang ingin Anda tautkan ke Situs Web kami, dan daftar URL di situs kami yang ingin Anda tuju tautan. Tunggu 2-3 minggu untuk tanggapan.</p>\r\n\r\n<p>Organisasi yang disetujui dapat membuat hyperlink ke Situs Web kami sebagai berikut:</p>\r\n\r\n<ul>\r\n    <li>Dengan menggunakan nama perusahaan kami; atau</li>\r\n    <li>Dengan menggunakan pencari sumber daya seragam yang ditautkan ke; atau</li>\r\n    <li>Dengan menggunakan deskripsi lain dari Situs Web kami yang ditautkan, yang masuk akal dalam konteks dan format konten di situs pihak yang menautkan.</li>\r\n</ul>\r\n\r\n<p>Tidak ada penggunaan logo SiParkir Kota Pekanbaru atau karya seni lainnya yang diizinkan untuk menghubungkan jika tidak ada perjanjian lisensi merek dagang.</p>\r\n\r\n<h3><strong>iFrames</strong></h3>\r\n\r\n<p>Tanpa persetujuan dan izin tertulis sebelumnya, Anda tidak boleh membuat bingkai di sekitar Halaman Web kami yang mengubah presentasi visual atau tampilan Situs Web kami dengan cara apa pun.</p>\r\n\r\n<h3><strong>Kewajiban Konten</strong></h3>\r\n\r\n<p>Kami tidak bertanggung jawab atas konten apa pun yang muncul di Situs Web Anda. Anda setuju untuk melindungi dan membela kami dari semua klaim yang muncul di Situs Web Anda. Tautan tidak boleh muncul di Situs Web mana pun yang dapat ditafsirkan sebagai fitnah, cabul, atau kriminal, atau yang melanggar, jika tidak, melanggar, atau mendukung pelanggaran atau pelanggaran lain terhadap, hak pihak ketiga mana pun.</p>\r\n\r\n<h3><strong>Reservasi Hak</strong></h3>\r\n\r\n<p>Kami berhak meminta Anda menghapus semua tautan atau tautan tertentu ke Situs Web kami. Anda menyetujui untuk segera menghapus semua tautan ke Situs Web kami berdasarkan permintaan. Kami juga berhak untuk mengubah syarat dan ketentuan ini dan kebijakan tautannya kapan saja. Dengan terus menautkan ke Situs Web kami, Anda setuju untuk terikat dan mengikuti syarat dan ketentuan penautan ini.</p>\r\n\r\n<h3><strong>Penghapusan tautan dari situs web kami</strong></h3>\r\n\r\n<p>Jika Anda menemukan tautan apa pun di Situs Web kami yang menyinggung karena alasan apa pun, Anda bebas untuk menghubungi dan memberi tahu kami kapan saja. Kami akan mempertimbangkan permintaan untuk menghapus tautan tetapi kami tidak berkewajiban untuk atau lebih atau untuk menanggapi Anda secara langsung.</p>\r\n\r\n<p>Kami tidak memastikan bahwa informasi di situs web ini benar, kami tidak menjamin kelengkapan atau keakuratannya; kami juga tidak berjanji untuk memastikan bahwa situs web tetap tersedia atau materi di situs web selalu diperbarui.</p>\r\n\r\n<h3><strong>Penafian</strong></h3>\r\n\r\n<p>Sejauh yang diizinkan oleh hukum yang berlaku, kami mengecualikan semua pernyataan, jaminan, dan ketentuan yang berkaitan dengan situs web kami dan penggunaan situs web ini. Tidak ada dalam penafian ini yang akan:</p>\r\n\r\n<ul>\r\n    <li>membatasi atau mengecualikan tanggung jawab kami atau Anda atas kematian atau cedera pribadi;</li>\r\n    <li>membatasi atau mengecualikan tanggung jawab kami atau Anda atas penipuan atau pernyataan keliru yang menipu;</li>\r\n    <li>membatasi kewajiban kami atau Anda dengan cara apa pun yang tidak diizinkan menurut hukum yang berlaku; atau</li>\r\n    <li>mengecualikan salah satu kewajiban kami atau Anda yang mungkin tidak dikecualikan menurut hukum yang berlaku.</li>\r\n</ul>\r\n\r\n<p>Batasan dan larangan tanggung jawab yang diatur dalam Bagian ini dan di tempat lain dalam penafian ini: (a) tunduk pada paragraf sebelumnya; dan (b) mengatur semua kewajiban yang timbul berdasarkan penafian, termasuk kewajiban yang timbul dalam kontrak, dalam gugatan, dan untuk pelanggaran kewajiban hukum.</p>\r\n\r\n<p>Selama situs web dan informasi serta layanan di situs web disediakan secara gratis, kami tidak akan bertanggung jawab atas kehilangan atau kerusakan apa pun.</p>');

-- membuang struktur untuk table perparkiran.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `no_hp` varchar(255) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `alamat` longtext,
  `t_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` timestamp NULL DEFAULT NULL,
  `jk` enum('M','W') DEFAULT NULL,
  `level` bigint(20) NOT NULL DEFAULT '0',
  `regu` varchar(255) DEFAULT NULL,
  `bio` longtext,
  `f_usr` longtext,
  `token` longtext,
  `batas_waktu` timestamp NULL DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.users: ~8 rows (lebih kurang)
INSERT INTO `users` (`id`, `username`, `password`, `email`, `no_hp`, `nama`, `pendidikan`, `alamat`, `t_lahir`, `tgl_lahir`, `jk`, `level`, `regu`, `bio`, `f_usr`, `token`, `batas_waktu`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	('USR-06782', 'anonymeck', '$2y$10$R2i9S0lwaM0bXPcor1fFw.fXIrwNrnNPuhA7W5A8FwHLZGsACMQq.', 'anonymeckrra@gmail.com', '08098888', 'Mamad', 'S-1 SEDERAJAT', '  ', 'Pekanbaru', '1995-03-30 17:00:00', 'M', 2, 'REGU-62216', NULL, 'USR-06782_05072021102552.jpg', '9VrwDszTtmP4PHZhpqbsLby26/H1LqPKYsk9cwqnkGs=', '2021-07-12 03:25:52', 'Y', '2021-07-05 03:25:57', '2021-07-13 15:35:02', NULL),
	('USR-12496', 'aprina_suryandari', '$2y$10$/NKyy2Bj2dtzlYj8NjlKtO.1ncfDuTzxex3dUg6L5gYorzePYQgIK', 'aprina.uryandari@gmail.com', '082284487674', 'Aprina Suryandari', 'S-1 TEKNIK INFORMATIKA', ' ', 'Kp. Godang', '1994-03-31 17:00:00', 'W', 2, 'REGU-62216', NULL, 'USR-12496_05072021102639.jpg', 'DyGzJEBwkEAYlDD16XjVtqrIwk/fYsXFwbyRUE6SN0g=', '2021-07-11 15:49:49', 'Y', '2021-07-04 15:49:56', '2021-07-28 14:58:29', '2021-07-05 02:00:14'),
	('USR-32229', 'affan', '$2y$10$LKb3ZGc9fi/GVU71QwbbouP5CMPG1caR1HwUPXzuYe86ZDeIDYEg.', 'm.affan.r.putra@gmail.com', '082288445265', 'Muhammad Affan Rasya Putra', 'S-1 SEDERAJAT', '        Jl. Sudimoro Harapan Raya, Pekanbaru, Riau', 'Pekanbaru', '1999-12-31 17:00:00', 'M', 2, 'REGU-87851', NULL, 'USR-32229_08072021215544.jpg', 'k7ISKO3zPsKgpI5ZLyWTBqJIDZ09D6hfs/eld80k0R4=', '2021-07-12 07:28:37', 'Y', '2021-07-05 07:28:41', '2021-09-11 02:20:21', NULL),
	('USR-57899', 'hilham', '$2y$10$g25qMpiHC5XtVWWNr28yPOCi1nOl/Ac2R49BSEU7odz.T1HBWArG.', 'oranggilajuga@gmail.com', '085213369345', 'Hilham', 'S-1 ADMINISTRASI NEGARA', '    ', 'Pekanbaru', '1993-08-13 17:00:00', 'M', 3, 'REGU-87851', NULL, 'USR-57899_05072021111415.jpg', 'AezoD8c5ljW0N6eKF2Z+laUmLJUEvcTfRUIuoVB0oe8=', '2021-07-12 04:14:15', 'Y', '2021-07-05 04:14:20', '2021-08-08 12:04:14', '2021-07-05 04:14:20'),
	('USR-79955', 'sutor_risman', '$2y$10$Dd5NyqbgU35gvc4AVgo6be2W8Qh.m..dbceEL/sLJG88CR.0v9tW.', 'emi.ngasirun@gmail.com', '', 'Sutor Risman', '', '', '', '0000-00-00 00:00:00', '', 3, 'REGU-19932', '', '', 'jbzvhqR6mdphPXx4dCgyPh750YuyYgmltqvKyWexeiKolcEVkF9nz0eaw3dCGQSInkAtEGGn4eeFJNN3ewqY7Q20u8s4oda2pdPfo4SVWcSPrGfmWsXIhdRkuyvAZjX0KETulb3E4mR8uUlM24ebmZ', '2021-11-02 07:01:03', 'Y', '2021-10-26 07:01:08', '2021-10-26 07:02:41', NULL),
	('USR-91697', 'alfisyahrin', '$2y$10$00yZz8ghdVtwNtsqT.g70ObfkpvMvYi4.ZFmQ9qyhtUo0RCvQxl1u', 'alfisyahrin@gmail.com', '081206102013', 'Alfi Syahrin Tambunan', 'S-1 ILMU KOMUNIKASI', ' Jl. Sonokeling', 'Langsa', '1991-03-29 17:00:00', 'M', 3, 'REGU-62216', NULL, 'USR-91697_13072021212039.jpg', 'NUh22P2tiLI63TTMPaPrcN78oRlL9xDT8Dt7ZbSeXI8mc9eDzlqU9MPCbKL6XQcvUXMtOHhA8BH', '2021-07-20 14:20:39', 'Y', '2021-07-13 14:20:45', '2021-07-13 15:33:04', NULL),
	('USR-95579', 'albian', '$2y$10$d9BV/RnWNMibVwn1rdQI6.1.wC6YyHDignP3zCNZs34PYx2aX6s3y', 'rahmad.rizki.adi@students.uin-suska.ac.id', '', 'Radevanka Albiansyah Rahmadi', '', '', '', '0000-00-00 00:00:00', '', 7, '', '', '', 'C9Yg6ziIWKsbxjj1voqJJ4pvkQ9vBgWmWUrMQYVVtJ0=', '2021-11-20 16:57:02', 'Y', '2021-11-13 16:57:09', '2021-11-13 16:58:22', NULL),
	('USR-99999', 'bangameck', '$2y$10$5gaemdHEQtAJewgE.Wonp.R96wYuxQKqD2EGMpOpTUD8KBwctVAz2', 'rahmad.looker@gmail.com', '08316969993', 'Rahmad Riskiadi', 'S-1 TEKNIK INFORMATIKA', ' Jalan Soedimoro', 'Pekanbaroe', '1995-03-30 17:00:00', 'M', 1, '', NULL, NULL, 'exbt2DrO4VeEyr6IfkfnZD7yjtO9J/MG1soRlSHzgYw=', NULL, 'Y', NULL, '2021-07-08 17:23:50', '2021-07-04 13:35:01');

-- membuang struktur untuk table perparkiran.views_blog
CREATE TABLE IF NOT EXISTS `views_blog` (
  `id_blog` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.views_blog: ~37 rows (lebih kurang)
INSERT INTO `views_blog` (`id_blog`, `time`, `jumlah`) VALUES
	('86803484694911984167', '2021-10-19', 4),
	('98653079279646273606', '2021-10-19', 17),
	('98653079279646273606', '2021-10-20', 20),
	('73704880695227223843', '2021-10-20', 12),
	('69524179615558173022', '2021-10-20', 2),
	('36115892756196518748', '2021-10-20', 3),
	('00998428351696011609', '2021-10-20', 3),
	('98653079279646273606', '2021-10-21', 12),
	('00998428351696011609', '2021-10-21', 2),
	('86803484694911984167', '2021-10-21', 3),
	('36115892756196518748', '2021-10-21', 2),
	('50175059584679106666', '2021-10-21', 18),
	('69524179615558173022', '2021-10-21', 3),
	('73704880695227223843', '2021-10-21', 2),
	('98653079279646273606', '2021-10-24', 1),
	('86803484694911984167', '2021-10-24', 7),
	('36115892756196518748', '2021-10-24', 3),
	('00998428351696011609', '2021-10-25', 1),
	('36115892756196518748', '2021-10-26', 1),
	('36115892756196518748', '2021-10-28', 4),
	('73704880695227223843', '2021-10-28', 1),
	('86803484694911984167', '2021-10-28', 1),
	('21606794114970369940', '2021-10-28', 6),
	('43888224593692599076', '2021-10-28', 4),
	('00998428351696011609', '2021-10-28', 2),
	('66251029841392860537', '2021-10-28', 3),
	('21606794114970369940', '2021-10-29', 5),
	('66251029841392860537', '2021-10-29', 3),
	('73704880695227223843', '2021-10-29', 3),
	('73704880695227223843', '2021-11-12', 1),
	('00998428351696011609', '2021-11-12', 1),
	('43888224593692599076', '2021-11-12', 3),
	('66251029841392860537', '2021-11-13', 1),
	('73704880695227223843', '2021-11-13', 1),
	('98653079279646273606', '2021-11-18', 2),
	('66251029841392860537', '2021-11-19', 1),
	('21606794114970369940', '2021-11-22', 1);

-- membuang struktur untuk table perparkiran.views_dokumen
CREATE TABLE IF NOT EXISTS `views_dokumen` (
  `id_dok` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.views_dokumen: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.views_kegiatan
CREATE TABLE IF NOT EXISTS `views_kegiatan` (
  `id_giat` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.views_kegiatan: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.views_pc
CREATE TABLE IF NOT EXISTS `views_pc` (
  `id_pc` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.views_pc: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.views_pengaduan
CREATE TABLE IF NOT EXISTS `views_pengaduan` (
  `id_peng` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.views_pengaduan: ~0 rows (lebih kurang)

-- membuang struktur untuk table perparkiran.views_site
CREATE TABLE IF NOT EXISTS `views_site` (
  `time` date DEFAULT NULL,
  `jumlah` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.views_site: ~20 rows (lebih kurang)
INSERT INTO `views_site` (`time`, `jumlah`) VALUES
	('2021-10-11', 1),
	('2021-10-12', 7),
	('2021-10-13', 2),
	('2021-10-17', 2),
	('2021-10-18', 2),
	('2021-10-19', 174),
	('2021-10-20', 99),
	('2021-10-21', 115),
	('2021-10-24', 66),
	('2021-10-25', 150),
	('2021-10-26', 7),
	('2021-10-28', 370),
	('2021-10-29', 43),
	('2021-11-12', 135),
	('2021-11-13', 516),
	('2021-11-14', 509),
	('2021-11-18', 90),
	('2021-11-19', 577),
	('2021-11-21', 848),
	('2021-11-22', 871);

-- membuang struktur untuk table perparkiran.w_instagram
CREATE TABLE IF NOT EXISTS `w_instagram` (
  `id` int(11) DEFAULT NULL,
  `embed` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.w_instagram: ~1 rows (lebih kurang)
INSERT INTO `w_instagram` (`id`, `embed`) VALUES
	(1, '<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CUwGaRyvofc/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CUwGaRyvofc/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CUwGaRyvofc/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by DISHUB KOTA PEKANBARU (@upt.perparkiranpku)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>');

-- membuang struktur untuk table perparkiran.w_twitter
CREATE TABLE IF NOT EXISTS `w_twitter` (
  `id` int(11) NOT NULL,
  `embed` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.w_twitter: ~1 rows (lebih kurang)
INSERT INTO `w_twitter` (`id`, `embed`) VALUES
	(1, '<blockquote class="twitter-tweet"><p lang="in" dir="ltr">INI SIAPA YG BIKIN??? ??? <a href="https://t.co/bK8nv3Vxna">pic.twitter.com/bK8nv3Vxna</a></p>&mdash; cap übermensch (@fajartujuhbelas) <a href="https://twitter.com/fajartujuhbelas/status/1450173208208961541?ref_src=twsrc%5Etfw">October 18, 2021</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>');

-- membuang struktur untuk table perparkiran.w_youtube
CREATE TABLE IF NOT EXISTS `w_youtube` (
  `id` int(11) DEFAULT NULL,
  `embed` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel perparkiran.w_youtube: ~1 rows (lebih kurang)
INSERT INTO `w_youtube` (`id`, `embed`) VALUES
	(1, '<iframe width="853" height="480" src="https://www.youtube.com/embed/BNPSCcx637E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
