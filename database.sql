-- SMKN 5 Bantaeng Database Export
-- Generated: 2026-07-27 07:35:10
-- Database: `smkn5_bantaeng`
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Table structure for table `achievements`
--
DROP TABLE IF EXISTS `achievements`;
CREATE TABLE `achievements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `year` int DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participants` json DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--
INSERT INTO `achievements` VALUES ('1', 'Juara 1 LKS IT Networking Tingkat Provinsi', 'Competition', 'Meraih juara pertama bidang IT Networking pada Lomba Kompetensi Siswa tingkat Provinsi Sulawesi Selatan.', '2026', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1000&q=70', '[\"Rizky Ramadhan\"]', 'Province', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `achievements` VALUES ('2', 'Juara 2 Lomba Debat Bahasa Indonesia', 'Academic', 'Tim debat sekolah meraih juara kedua pada lomba debat bahasa Indonesia tingkat kabupaten.', '2025', 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1000&q=70', '[\"Nur Aisyah\", \"Fadhil Akbar\"]', 'District', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `achievements` VALUES ('3', 'Juara 1 LKS Pengelasan Tingkat Kabupaten', 'Competition', 'Siswa program Teknik Pemesinan meraih juara pertama bidang pengelasan pada Lomba Kompetensi Siswa tingkat kabupaten Bantaeng.', '2025', 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1000&q=70', '[\"Tim TP SMKN 5 Bantaeng\"]', 'District', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `achievements` VALUES ('4', 'Finalis Lomba Otomotif Tingkat Nasional', 'Competition', 'Siswa program TKR lolos hingga babak final lomba keterampilan otomotif tingkat nasional.', '2025', 'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?auto=format&fit=crop&w=1000&q=70', '[\"Muh. Ilham\"]', 'National', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `achievements` VALUES ('5', 'Juara 3 Lomba Kewirausahaan Agribisnis', 'Non-academic', 'Produk olahan hasil pertanian siswa Agribisnis Pertanian meraih juara ketiga lomba kewirausahaan tingkat provinsi.', '2024', 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=1000&q=70', '[\"Kelompok Wirausaha AP\"]', 'Province', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `achievements` VALUES ('6', 'Penghargaan Sekolah Adiwiyata Tingkat Kabupaten', 'Award', 'SMK Negeri 5 Bantaeng menerima penghargaan Adiwiyata atas komitmen terhadap lingkungan sekolah yang hijau dan sehat.', '2024', 'https://images.unsplash.com/photo-1519452575417-564c1401ecc0?auto=format&fit=crop&w=1000&q=70', '[\"SMK Negeri 5 Bantaeng\"]', 'District', '2026-07-27 07:08:08', '2026-07-27 07:08:08');

--
-- Table structure for table `cache`
--
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--
INSERT INTO `cache` VALUES ('smkn5bantaeng-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:2;', '1785136544');
INSERT INTO `cache` VALUES ('smkn5bantaeng-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1785136544;', '1785136544');

--
-- Table structure for table `cache_locks`
--
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `department_facility`
--
DROP TABLE IF EXISTS `department_facility`;
CREATE TABLE `department_facility` (
  `department_id` bigint unsigned NOT NULL,
  `facility_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`department_id`,`facility_id`),
  KEY `department_facility_facility_id_foreign` (`facility_id`),
  CONSTRAINT `department_facility_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `department_facility_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_facility`
--
INSERT INTO `department_facility` VALUES ('4', '1');
INSERT INTO `department_facility` VALUES ('1', '2');
INSERT INTO `department_facility` VALUES ('6', '3');
INSERT INTO `department_facility` VALUES ('2', '4');
INSERT INTO `department_facility` VALUES ('5', '5');
INSERT INTO `department_facility` VALUES ('3', '6');
INSERT INTO `department_facility` VALUES ('1', '7');
INSERT INTO `department_facility` VALUES ('2', '7');
INSERT INTO `department_facility` VALUES ('3', '7');
INSERT INTO `department_facility` VALUES ('4', '7');
INSERT INTO `department_facility` VALUES ('5', '7');
INSERT INTO `department_facility` VALUES ('6', '7');
INSERT INTO `department_facility` VALUES ('1', '8');
INSERT INTO `department_facility` VALUES ('2', '8');
INSERT INTO `department_facility` VALUES ('3', '8');
INSERT INTO `department_facility` VALUES ('4', '8');
INSERT INTO `department_facility` VALUES ('5', '8');
INSERT INTO `department_facility` VALUES ('6', '8');
INSERT INTO `department_facility` VALUES ('1', '9');
INSERT INTO `department_facility` VALUES ('2', '9');
INSERT INTO `department_facility` VALUES ('3', '9');
INSERT INTO `department_facility` VALUES ('4', '9');
INSERT INTO `department_facility` VALUES ('5', '9');
INSERT INTO `department_facility` VALUES ('6', '9');
INSERT INTO `department_facility` VALUES ('1', '10');
INSERT INTO `department_facility` VALUES ('2', '10');
INSERT INTO `department_facility` VALUES ('3', '10');
INSERT INTO `department_facility` VALUES ('4', '10');
INSERT INTO `department_facility` VALUES ('5', '10');
INSERT INTO `department_facility` VALUES ('6', '10');

--
-- Table structure for table `department_partner`
--
DROP TABLE IF EXISTS `department_partner`;
CREATE TABLE `department_partner` (
  `department_id` bigint unsigned NOT NULL,
  `partner_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`department_id`,`partner_id`),
  KEY `department_partner_partner_id_foreign` (`partner_id`),
  CONSTRAINT `department_partner_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `department_partner_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_partner`
--
INSERT INTO `department_partner` VALUES ('2', '1');
INSERT INTO `department_partner` VALUES ('2', '2');
INSERT INTO `department_partner` VALUES ('1', '3');
INSERT INTO `department_partner` VALUES ('6', '4');
INSERT INTO `department_partner` VALUES ('4', '5');
INSERT INTO `department_partner` VALUES ('5', '6');
INSERT INTO `department_partner` VALUES ('3', '7');

--
-- Table structure for table `departments`
--
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `mission` json DEFAULT NULL,
  `competencies` json DEFAULT NULL,
  `career_paths` json DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` json DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--
INSERT INTO `departments` VALUES ('1', 'Teknik Kendaraan Ringan', 'TKR', 'teknik-kendaraan-ringan', 'Teknologi & Rekayasa', 'Menguasai mesin, menggerakkan karier.', '<p>Program keahlian yang membekali siswa dengan kompetensi perawatan dan perbaikan mesin, kelistrikan, serta chassis kendaraan ringan sesuai standar industri otomotif.</p>', '<p>Menghasilkan teknisi otomotif profesional yang siap kerja dan berdaya saing.</p>', '[\"Melaksanakan praktik berbasis standar bengkel industri.\", \"Mengembangkan kelas industri bersama mitra otomotif.\", \"Membudayakan keselamatan dan kualitas kerja.\"]', '[\"Perawatan berkala mesin kendaraan\", \"Perbaikan sistem kelistrikan otomotif\", \"Perawatan chassis dan pemindah tenaga\", \"Diagnosis kerusakan kendaraan\"]', '[\"Teknisi Bengkel Resmi\", \"Mekanik Otomotif\", \"Service Advisor\", \"Wirausaha Bengkel\"]', 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1200&q=70', NULL, '1', '1', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `departments` VALUES ('2', 'Teknik Komputer dan Jaringan', 'TKJ', 'teknik-komputer-dan-jaringan', 'Teknologi & Rekayasa', 'Membangun jaringan, merakit masa depan digital.', '<p>Program keahlian yang membekali siswa dengan kemampuan merancang, membangun, dan mengelola jaringan komputer, administrasi server, serta pemrograman dasar sesuai kebutuhan industri teknologi informasi.</p>', '<p>Menghasilkan teknisi jaringan dan teknologi informasi yang kompeten dan adaptif terhadap perkembangan teknologi.</p>', '[\"Melaksanakan pembelajaran berbasis proyek dan sertifikasi industri.\", \"Mengembangkan kompetensi jaringan, server, dan keamanan dasar.\", \"Menjalin kerja sama dengan industri teknologi informasi.\"]', '[\"Instalasi dan konfigurasi jaringan LAN/WAN\", \"Administrasi server dan sistem operasi jaringan\", \"Pemrograman dasar dan pengembangan web\", \"Perawatan dan perbaikan perangkat keras komputer\"]', '[\"Teknisi Jaringan\", \"Administrator Server\", \"IT Support\", \"Web Developer Junior\"]', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=70', NULL, '1', '1', '2', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `departments` VALUES ('3', 'Agribisnis Pertanian', 'AP', 'agribisnis-pertanian', 'Agribisnis & Agroteknologi', 'Menumbuhkan pangan, memanen keberlanjutan.', '<p>Program keahlian yang mengembangkan kompetensi budidaya tanaman pangan dan hortikultura secara modern serta pengelolaan usaha agribisnis, dari pembibitan hingga pascapanen dan pemasaran hasil pertanian.</p>', '<p>Mencetak wirausahawan dan tenaga terampil agribisnis yang inovatif dan berwawasan lingkungan.</p>', '[\"Menyelenggarakan praktik budidaya berbasis teaching factory.\", \"Menerapkan teknologi pertanian ramah lingkungan.\", \"Mengembangkan jiwa kewirausahaan agribisnis.\"]', '[\"Pembibitan dan pembenihan tanaman\", \"Budidaya tanaman pangan dan hortikultura\", \"Pengendalian hama dan penyakit terpadu\", \"Penanganan pascapanen dan pemasaran hasil\"]', '[\"Teknisi Budidaya Tanaman\", \"Wirausaha Agribisnis\", \"Penyuluh Pertanian Lapangan\", \"Operator Green House\"]', 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=1200&q=70', NULL, '1', '1', '3', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `departments` VALUES ('4', 'Teknik Laboratorium Medik', 'TLM', 'teknik-laboratorium-medik', 'Kesehatan & Pekerjaan Sosial', 'Menganalisis dengan teliti, melayani dengan hati.', '<p>Program keahlian bidang kesehatan yang membekali siswa dengan kompetensi pemeriksaan laboratorium medik — hematologi, kimia klinik, dan mikrobiologi dasar — serta penanganan spesimen sesuai prosedur dan standar keselamatan kerja.</p>', '<p>Menghasilkan tenaga laboratorium medik yang teliti, jujur, dan kompeten untuk mendukung pelayanan kesehatan.</p>', '[\"Menyelenggarakan praktik laboratorium sesuai standar prosedur operasional.\", \"Menanamkan ketelitian, kejujuran, dan etika pelayanan kesehatan.\", \"Menjalin kerja sama dengan fasilitas kesehatan dan laboratorium klinik.\"]', '[\"Pengambilan dan penanganan spesimen (flebotomi)\", \"Pemeriksaan hematologi dan kimia klinik\", \"Mikrobiologi dan parasitologi dasar\", \"Penerapan keselamatan kerja laboratorium (K3)\"]', '[\"Asisten Analis Laboratorium\", \"Tenaga Laboratorium Klinik\", \"Petugas Flebotomi\", \"Staf Laboratorium Rumah Sakit\"]', 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=70', NULL, '1', '1', '4', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `departments` VALUES ('5', 'Desain Pemodelan dan Informasi Bangunan', 'DPIB', 'desain-pemodelan-dan-informasi-bangunan', 'Teknologi & Rekayasa', 'Merancang ruang, memodelkan bangunan.', '<p>Program keahlian yang membekali siswa dengan kompetensi menggambar teknik bangunan, perancangan dengan perangkat lunak CAD/BIM, estimasi biaya, serta pemodelan informasi bangunan sesuai kebutuhan industri konstruksi.</p>', '<p>Menghasilkan juru gambar dan drafter bangunan yang kreatif, teliti, dan menguasai teknologi desain terkini.</p>', '[\"Melaksanakan pembelajaran berbasis proyek desain dan pemodelan bangunan.\", \"Mengembangkan kompetensi perangkat lunak CAD dan BIM.\", \"Menjalin kerja sama dengan dunia usaha bidang konstruksi.\"]', '[\"Menggambar konstruksi bangunan dengan AutoCAD\", \"Pemodelan bangunan berbasis BIM (SketchUp/Revit)\", \"Estimasi biaya dan rencana anggaran bangunan\", \"Perancangan gambar kerja dan denah\"]', '[\"Drafter/Juru Gambar Bangunan\", \"Operator CAD/BIM\", \"Estimator Konstruksi\", \"Asisten Perencana Bangunan\"]', 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=70', NULL, '0', '1', '5', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `departments` VALUES ('6', 'Teknik Pemesinan', 'TP', 'teknik-pemesinan', 'Teknologi & Rekayasa', 'Membentuk logam, membentuk presisi.', '<p>Program keahlian yang membekali siswa dengan kompetensi pengerjaan logam menggunakan mesin bubut, frais, gerinda, serta pengelasan dan pembacaan gambar teknik sesuai standar industri manufaktur.</p>', '<p>Menghasilkan teknisi pemesinan yang presisi, disiplin, dan siap bekerja di industri manufaktur.</p>', '[\"Melaksanakan praktik pemesinan berbasis standar bengkel industri.\", \"Mengembangkan kompetensi pengelasan dan pembacaan gambar teknik.\", \"Menanamkan budaya keselamatan dan mutu kerja (K3).\"]', '[\"Pengoperasian mesin bubut dan frais\", \"Pengerjaan gerinda dan kerja bangku\", \"Pengelasan dasar (SMAW)\", \"Membaca dan membuat gambar teknik mesin\"]', '[\"Operator Mesin Bubut/Frais\", \"Teknisi Manufaktur\", \"Welder\", \"Quality Control Manufaktur\"]', 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1200&q=70', NULL, '1', '1', '6', '2026-07-27 07:08:07', '2026-07-27 07:08:07');

--
-- Table structure for table `extracurriculars`
--
DROP TABLE IF EXISTS `extracurriculars`;
CREATE TABLE `extracurriculars` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` bigint unsigned DEFAULT NULL,
  `schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `highlights` json DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `extracurriculars_slug_unique` (`slug`),
  KEY `extracurriculars_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `extracurriculars_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extracurriculars`
--
INSERT INTO `extracurriculars` VALUES ('1', 'Organisasi Siswa Intra Sekolah', 'OSIS', 'osis', 'Organisasi & Kepemimpinan', NULL, 'Jumat, 14.00-16.00 WITA', 'Ruang OSIS dan aula sekolah', 'users', 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1200&q=70', 'Sekelompok siswa berdiskusi dalam kegiatan organisasi', 'brand', '<p>OSIS menjadi ruang bagi siswa untuk mengembangkan kepemimpinan, tanggung jawab, dan kemampuan mengelola program secara terstruktur. Anggota terlibat dalam penyusunan agenda kesiswaan, koordinasi kegiatan sekolah, serta penyampaian aspirasi siswa dengan bimbingan pembina.</p>', 'Wadah utama siswa untuk belajar memimpin, berorganisasi, dan menggerakkan program sekolah.', '[\"Latihan dasar kepemimpinan dan manajemen organisasi\", \"Penyusunan serta evaluasi program kerja kesiswaan\", \"Koordinasi kegiatan sekolah dan peringatan hari besar\", \"Penyaluran aspirasi siswa secara tertib dan bertanggung jawab\"]', '1', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `extracurriculars` VALUES ('2', 'Pramuka', 'Pramuka', 'pramuka', 'Karakter & Keterampilan', NULL, 'Sabtu, 15.00-17.00 WITA', 'Lapangan sekolah dan area kegiatan luar ruang', 'compass', 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=70', 'Kegiatan luar ruang untuk melatih kemandirian dan kerja sama', 'yellow', '<p>Pramuka membentuk siswa yang mandiri, disiplin, tangguh, dan peduli terhadap lingkungan serta masyarakat.</p>', 'Pembinaan karakter melalui kegiatan lapangan, keterampilan hidup, kedisiplinan, dan kerja sama regu.', '[\"Latihan baris-berbaris, tali-temali, dan pionering\", \"Penjelajahan serta orientasi medan dasar\", \"Perkemahan dan kegiatan kerja sama regu\", \"Bakti sosial dan kepedulian terhadap lingkungan\"]', '1', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `extracurriculars` VALUES ('3', 'Majelis Perwakilan Kelas', 'MPK', 'mpk', 'Organisasi & Kepemimpinan', NULL, 'Rabu, 14.00-15.30 WITA', 'Ruang rapat siswa', 'landmark', 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=1200&q=70', 'Siswa bermusyawarah dalam sebuah pertemuan perwakilan kelas', 'blue', '<p>MPK mempertemukan perwakilan setiap kelas untuk membahas aspirasi, kebutuhan, dan evaluasi kegiatan kesiswaan.</p>', 'Forum perwakilan kelas yang mengawal aspirasi siswa dan mendukung tata kelola organisasi kesiswaan.', '[\"Forum penyampaian dan pengelolaan aspirasi kelas\", \"Musyawarah perwakilan siswa secara berkala\", \"Evaluasi program kerja organisasi kesiswaan\", \"Pelatihan komunikasi, argumentasi, dan pengambilan keputusan\"]', '0', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `extracurriculars` VALUES ('4', 'Pusat Informasi dan Konseling Remaja', 'PIK-R', 'pik-r', 'Pengembangan Diri', NULL, 'Kamis, 14.00-15.30 WITA', 'Ruang Bimbingan Konseling', 'heart-handshake', 'https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=1200&q=70', 'Remaja mengikuti kegiatan edukasi dan pendampingan kelompok', 'brand', '<p>PIK-R menyediakan ruang belajar yang aman bagi siswa untuk memperoleh informasi kesehatan remaja, perencanaan masa depan, dan keterampilan hidup.</p>', 'Ruang edukasi dan pendampingan teman sebaya untuk mendukung remaja yang sehat, terencana, dan berdaya.', '[\"Pelatihan pendidik dan konselor sebaya\", \"Edukasi kesehatan serta perencanaan kehidupan remaja\", \"Diskusi keterampilan hidup dan pengembangan diri\", \"Kampanye lingkungan sekolah yang sehat dan suportif\"]', '0', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `extracurriculars` VALUES ('5', 'Palang Merah Remaja', 'PMR', 'pmr', 'Kesehatan & Kemanusiaan', NULL, 'Jumat, 15.30-17.00 WITA', 'Ruang UKS dan lapangan sekolah', 'heart-pulse', 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=70', 'Pelatihan dasar kesehatan dan pertolongan pertama', 'red', '<p>PMR membekali siswa dengan pengetahuan dasar kesehatan, pertolongan pertama, kesiapsiagaan, dan pelayanan kemanusiaan.</p>', 'Pembinaan kepedulian kemanusiaan, hidup sehat, dan keterampilan pertolongan pertama bagi siswa.', '[\"Pelatihan pertolongan pertama dan penanganan cedera ringan\", \"Edukasi perilaku hidup bersih dan sehat\", \"Simulasi kesiapsiagaan dalam situasi darurat\", \"Dukungan layanan kesehatan pada kegiatan sekolah\"]', '0', '2026-07-27 07:08:08', '2026-07-27 07:08:08');

--
-- Table structure for table `facilities`
--
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `facilities_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--
INSERT INTO `facilities` VALUES ('1', 'Laboratorium Teknik Laboratorium Medik', 'laboratorium-teknik-laboratorium-medik', '<p>Laboratorium praktik bidang kesehatan yang dilengkapi mikroskop, peralatan hematologi dan kimia klinik, serta sarana penanganan spesimen untuk mendukung praktik program Teknik Laboratorium Medik.</p>', 'Laboratory', 'Gedung Praktik Kesehatan', 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=70', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('2', 'Bengkel Teknik Kendaraan Ringan', 'bengkel-teknik-kendaraan-ringan', '<p>Bengkel praktik otomotif dengan car lift, engine stand, dan peralatan diagnostik untuk praktik perawatan mesin, kelistrikan, dan chassis kendaraan.</p>', 'Workshop', 'Gedung Praktik, Sayap Timur', 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1200&q=70', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('3', 'Bengkel Teknik Pemesinan', 'bengkel-teknik-pemesinan', '<p>Bengkel praktik pemesinan yang dilengkapi mesin bubut, frais, gerinda, dan peralatan kerja bangku serta pengelasan untuk mendukung praktik program Teknik Pemesinan.</p>', 'Workshop', 'Gedung Praktik, Sayap Barat', 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1200&q=70', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('4', 'Laboratorium Komputer', 'laboratorium-komputer', '<p>Laboratorium komputer dengan perangkat jaringan dan koneksi internet untuk praktik instalasi jaringan, administrasi server, dan pemrograman program Teknik Komputer dan Jaringan.</p>', 'Computer Lab', 'Gedung A, Lantai 2', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=70', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('5', 'Laboratorium DPIB', 'laboratorium-dpib', '<p>Laboratorium desain yang dilengkapi komputer dan perangkat lunak CAD/BIM untuk praktik menggambar teknik dan pemodelan bangunan program Desain Pemodelan dan Informasi Bangunan.</p>', 'Computer Lab', 'Gedung B, Lantai 2', 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=70', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('6', 'Lahan Praktik Agribisnis Pertanian', 'lahan-praktik-agribisnis-pertanian', '<p>Lahan praktik dan green house untuk budidaya tanaman pangan dan hortikultura, pembibitan, serta penerapan pertanian ramah lingkungan program Agribisnis Pertanian.</p>', 'Agriculture', 'Area Belakang Sekolah', 'https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?auto=format&fit=crop&w=1200&q=70', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('7', 'Lapangan Olahraga', 'lapangan-olahraga', '<p>Lapangan serbaguna untuk pembelajaran olahraga dan kegiatan ekstrakurikuler seperti voli, basket, dan futsal.</p>', 'Sports', 'Halaman Tengah Sekolah', 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=1200&q=70', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('8', 'Perpustakaan', 'perpustakaan', '<p>Perpustakaan dengan koleksi buku kejuruan dan umum serta ruang baca yang nyaman untuk mendukung literasi dan belajar mandiri siswa.</p>', 'Library', 'Gedung A, Lantai 1', 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1200&q=70', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('9', 'Unit Kesehatan Sekolah (UKS)', 'uks', '<p>Ruang layanan kesehatan sekolah untuk pertolongan pertama, pemeriksaan sederhana, dan pembinaan pola hidup sehat bagi warga sekolah.</p>', 'General', 'Gedung A, Lantai 1', 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=1200&q=70', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `facilities` VALUES ('10', 'Musala', 'musala', '<p>Tempat ibadah di lingkungan sekolah untuk salat dan kegiatan keagamaan yang mendukung pembinaan karakter dan keimanan siswa.</p>', 'General', 'Area Tengah Sekolah', 'https://images.unsplash.com/photo-1584286595398-a59511e0668a?auto=format&fit=crop&w=1200&q=70', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');

--
-- Table structure for table `failed_jobs`
--
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `faqs`
--
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--
INSERT INTO `faqs` VALUES ('1', 'Bagaimana cara mendaftar PPDB di SMKN 5 Bantaeng?', 'Pendaftaran PPDB dilakukan secara online melalui portal resmi sekolah. Calon siswa dapat mengakses link pendaftaran yang akan diumumkan melalui website dan media sosial sekolah pada periode pendaftaran yang telah ditentukan.', 'PPDB', '1', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `faqs` VALUES ('2', 'Apa saja persyaratan mendaftar di SMKN 5 Bantaeng?', 'Persyaratan utama meliputi: ijazah/SKL SMP/MTs, fotokopi rapor kelas 7-9, pas foto terbaru, kartu keluarga, dan akta kelahiran. Persyaratan lengkap dapat dilihat di halaman PPDB.', 'PPDB', '2', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `faqs` VALUES ('3', 'Berapa lama masa pendidikan di SMKN 5 Bantaeng?', 'Masa pendidikan di SMKN 5 Bantaeng adalah 3 tahun (kelas X, XI, dan XII) dengan sistem pembelajaran yang mengintegrasikan teori dan praktik.', 'Akademik', '3', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `faqs` VALUES ('4', 'Apa saja program keahlian yang tersedia?', 'SMK Negeri 5 Bantaeng memiliki 6 program keahlian: Teknik Kendaraan Ringan (TKR), Teknik Komputer dan Jaringan (TKJ), Agribisnis Pertanian (AP), Teknik Laboratorium Medik (TLM), Desain Pemodelan dan Informasi Bangunan (DPIB), dan Teknik Pemesinan (TP).', 'Akademik', '4', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `faqs` VALUES ('5', 'Apakah SMKN 5 Bantaeng memiliki fasilitas asrama?', 'Saat ini SMKN 5 Bantaeng belum memiliki fasilitas asrama. Namun, sekolah berada di lokasi yang strategis dan mudah dijangkau dengan transportasi umum.', 'Umum', '5', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `faqs` VALUES ('6', 'Bagaimana prospek kerja lulusan SMKN 5 Bantaeng?', 'Lulusan SMKN 5 Bantaeng memiliki prospek kerja yang cerah. Dengan kompetensi yang dimiliki, lulusan dapat bekerja di industri sesuai bidang keahliannya, melanjutkan ke perguruan tinggi, atau berwirausaha. Sekolah juga memiliki mitra industri yang siap menyerap lulusan.', 'Umum', '6', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `faqs` VALUES ('7', 'Apa saja kegiatan ekstrakurikuler yang tersedia?', 'Tersedia berbagai kegiatan ekstrakurikuler seperti OSIS, Pramuka, MPK, PIK-R, dan PMR. Setiap siswa dapat memilih kegiatan yang sesuai dengan minatnya.', 'Kesiswaan', '7', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `faqs` VALUES ('8', 'Apakah ada program beasiswa untuk siswa berprestasi?', 'Ya, tersedia program beasiswa bagi siswa berprestasi, baik dari pemerintah maupun dari mitra industri. Informasi lebih lanjut dapat menghubungi bagian kesiswaan.', 'Kesiswaan', '8', '2026-07-27 07:08:08', '2026-07-27 07:08:08');

--
-- Table structure for table `galleries`
--
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('image','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `taken_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_department_id_foreign` (`department_id`),
  CONSTRAINT `galleries_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--
INSERT INTO `galleries` VALUES ('1', NULL, 'Upacara Bendera Hari Senin', 'Kegiatan Sekolah', 'image', 'https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1200&q=70', NULL, NULL, 'Suasana upacara bendera setiap hari Senin di SMKN 5 Bantaeng.', '1', '2026-01-15 07:30:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `galleries` VALUES ('2', NULL, 'Kegiatan Belajar Mengajar', 'Pembelajaran', 'image', 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1200&q=70', NULL, NULL, 'Suasana pembelajaran di kelas SMKN 5 Bantaeng.', '0', '2026-02-10 09:00:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `galleries` VALUES ('3', '2', 'Praktik Jaringan TKJ', 'Pembelajaran', 'image', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=70', NULL, NULL, 'Siswa TKJ sedang melakukan praktik konfigurasi jaringan.', '1', '2026-03-05 10:00:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `galleries` VALUES ('4', '1', 'Praktik Otomotif TKR', 'Pembelajaran', 'image', 'https://images.unsplash.com/photo-1487754180451-c456f719a1fc?auto=format&fit=crop&w=1200&q=70', NULL, NULL, 'Siswa TKR melakukan praktik perawatan mesin kendaraan.', '0', '2026-03-12 10:30:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `galleries` VALUES ('5', NULL, 'Profil Sekolah', 'Profil Sekolah', 'image', 'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=70', NULL, NULL, 'Gedung SMK Negeri 5 Bantaeng tampak depan.', '1', '2025-07-15 08:00:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');

--
-- Table structure for table `job_batches`
--
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `jobs`
--
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `migrations`
--
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--
INSERT INTO `migrations` VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2025_01_01_000001_create_departments_table', '1');
INSERT INTO `migrations` VALUES ('5', '2025_01_01_000002_create_teachers_table', '1');
INSERT INTO `migrations` VALUES ('6', '2025_01_01_000003_create_facilities_table', '1');
INSERT INTO `migrations` VALUES ('7', '2025_01_01_000004_create_department_facility_table', '1');
INSERT INTO `migrations` VALUES ('8', '2025_01_01_000005_create_partners_table', '1');
INSERT INTO `migrations` VALUES ('9', '2025_01_01_000006_create_department_partner_table', '1');
INSERT INTO `migrations` VALUES ('10', '2025_01_01_000007_create_news_categories_table', '1');
INSERT INTO `migrations` VALUES ('11', '2025_01_01_000008_create_news_table', '1');
INSERT INTO `migrations` VALUES ('12', '2025_01_01_000009_create_galleries_table', '1');
INSERT INTO `migrations` VALUES ('13', '2025_01_01_000010_create_achievements_table', '1');
INSERT INTO `migrations` VALUES ('14', '2025_01_01_000011_create_extracurriculars_table', '1');
INSERT INTO `migrations` VALUES ('15', '2025_01_01_000012_create_testimonials_table', '1');
INSERT INTO `migrations` VALUES ('16', '2025_01_01_000013_create_faqs_table', '1');
INSERT INTO `migrations` VALUES ('17', '2025_01_25_000001_create_ppdb_configs_table', '1');
INSERT INTO `migrations` VALUES ('18', '2025_01_25_000002_create_ppdb_applicants_table', '1');

--
-- Table structure for table `news`
--
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `tags` json DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_category_id_foreign` (`category_id`),
  CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `news_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--
INSERT INTO `news` VALUES ('1', '1', 'Siswa SMKN 5 Bantaeng Raih Juara LKS IT Networking Tingkat Provinsi 2026', 'smkn-5-bantaeng-juara-lks-it-networking-2026', 'Perwakilan program TKJ berhasil menyabet juara pertama Lomba Kompetensi Siswa bidang IT Networking tingkat Provinsi Sulawesi Selatan.', '<p>Prestasi membanggakan kembali diraih SMK Negeri 5 Bantaeng. Pada ajang Lomba Kompetensi Siswa (LKS) tingkat Provinsi Sulawesi Selatan 2026, siswa program Teknik Komputer dan Jaringan meraih juara pertama di bidang IT Networking. Kemenangan ini merupakan hasil pembinaan intensif serta dukungan fasilitas laboratorium jaringan yang memadai. Sekolah berharap capaian ini memotivasi siswa lain untuk terus berprestasi.</p>', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=70', 'Humas SMKN 5 Bantaeng', 'published', '[\"LKS\", \"TKJ\", \"Prestasi\", \"Jaringan\"]', '1', '2026-05-18 08:00:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `news` VALUES ('2', '2', 'Program Agribisnis Pertanian Gelar Panen Perdana Sayuran', 'panen-perdana-sayuran-program-agribisnis-pertanian', 'Lahan praktik sekolah menghasilkan panen perdana sayuran yang dipasarkan ke masyarakat sekitar.', '<p>Program keahlian Agribisnis Pertanian (AP) SMK Negeri 5 Bantaeng melaksanakan panen perdana sayuran hasil praktik siswa di lahan praktik sekolah. Kegiatan ini menjadi bagian dari teaching factory yang menghubungkan pembelajaran dengan praktik usaha nyata. Hasil panen berupa selada dan pakcoy dipasarkan langsung kepada masyarakat sekitar sekolah.</p>', 'https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?auto=format&fit=crop&w=1200&q=70', 'Tim Agribisnis Pertanian', 'published', '[\"Agribisnis Pertanian\", \"Teaching Factory\", \"Panen\"]', '1', '2026-04-30 09:30:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `news` VALUES ('3', '4', 'SMKN 5 Bantaeng Jalin Kerja Sama Kelas Industri dengan Astra Honda', 'penandatanganan-kerja-sama-astra-honda', 'Program TKR resmi membuka kelas industri otomotif melalui penandatanganan nota kesepahaman dengan Astra Honda.', '<p>SMK Negeri 5 Bantaeng menandatangani nota kesepahaman dengan PT Astra International – Honda untuk membuka kelas industri pada program Teknik Kendaraan Ringan. Kerja sama ini mencakup penyelarasan kurikulum, pelatihan guru, praktik kerja lapangan, hingga peluang rekrutmen lulusan.</p>', 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1200&q=70', 'Humas SMKN 5 Bantaeng', 'published', '[\"TKR\", \"Kelas Industri\", \"Kerja Sama\"]', '0', '2026-03-12 10:00:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `news` VALUES ('4', '3', 'Uji Kompetensi Keahlian 2026 Diikuti Seluruh Siswa Kelas XII', 'pelaksanaan-uji-kompetensi-keahlian-2026', 'Seluruh siswa kelas XII mengikuti Uji Kompetensi Keahlian bersama asesor dari dunia industri.', '<p>Sebanyak ratusan siswa kelas XII SMK Negeri 5 Bantaeng mengikuti Uji Kompetensi Keahlian (UKK) tahun 2026. Ujian menghadirkan asesor dari dunia usaha dan dunia industri untuk memastikan lulusan memiliki kompetensi sesuai standar kerja.</p>', 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1200&q=70', 'Waka Kurikulum', 'published', '[\"UKK\", \"Akademik\", \"Kelas XII\"]', '0', '2026-02-20 08:30:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `news` VALUES ('5', '2', 'Program TLM Gelar Pemeriksaan Kesehatan Gratis untuk Warga Sekitar', 'bakti-sosial-pemeriksaan-kesehatan-program-tlm', 'Sebagai bentuk pengabdian, program TLM menyelenggarakan pemeriksaan kesehatan dasar gratis bagi masyarakat sekitar sekolah.', '<p>Program keahlian Teknik Laboratorium Medik (TLM) SMK Negeri 5 Bantaeng menyelenggarakan kegiatan bakti sosial berupa pemeriksaan kesehatan dasar gratis bagi masyarakat di sekitar sekolah.</p>', 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=70', 'Tim Teknik Laboratorium Medik', 'published', '[\"TLM\", \"Bakti Sosial\", \"Kesehatan\"]', '0', '2026-01-25 09:00:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `news` VALUES ('6', '2', 'Semarak Peringatan Hari Guru Nasional 2025 di SMKN 5 Bantaeng', 'peringatan-hari-guru-nasional-2025', 'Peringatan Hari Guru Nasional diisi dengan upacara, penghargaan guru berprestasi, dan pentas seni siswa.', '<p>SMK Negeri 5 Bantaeng memperingati Hari Guru Nasional 2025 dengan menggelar upacara bendera dan pentas seni siswa.</p>', 'https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=1200&q=70', 'Humas SMKN 5 Bantaeng', 'published', '[\"Hari Guru\", \"Kegiatan\", \"Sekolah\"]', '0', '2025-11-25 11:00:00', '2026-07-27 07:08:08', '2026-07-27 07:08:08');

--
-- Table structure for table `news_categories`
--
DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE `news_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--
INSERT INTO `news_categories` VALUES ('1', 'Prestasi', 'prestasi', NULL, '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `news_categories` VALUES ('2', 'Kegiatan', 'kegiatan', NULL, '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `news_categories` VALUES ('3', 'Akademik', 'akademik', NULL, '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `news_categories` VALUES ('4', 'Kerja Sama', 'kerja-sama', NULL, '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `news_categories` VALUES ('5', 'Pengumuman', 'pengumuman', NULL, '2026-07-27 07:08:07', '2026-07-27 07:08:07');

--
-- Table structure for table `partners`
--
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collaboration_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `partners_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--
INSERT INTO `partners` VALUES ('1', 'PT Telkom Indonesia', NULL, NULL, 'Telekomunikasi', 'Menyediakan tempat praktik kerja lapangan dan pelatihan jaringan bagi siswa program Teknik Komputer dan Jaringan.', 'https://telkom.co.id', 'Internship', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `partners` VALUES ('2', 'Dinas Kominfo Kabupaten Bantaeng', NULL, NULL, 'Pemerintahan & Teknologi Informasi', 'Bermitra dalam penyelarasan kurikulum TKJ serta program magang di bidang infrastruktur teknologi informasi daerah.', 'https://bantaengkab.go.id', 'Curriculum Development', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `partners` VALUES ('3', 'PT Astra International – Honda', NULL, NULL, 'Otomotif', 'Mitra kelas industri otomotif yang menyediakan pelatihan teknisi dan peluang rekrutmen bagi lulusan TKR.', 'https://astra.co.id', 'Recruitment', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `partners` VALUES ('4', 'Industri Manufaktur & Pengelasan (DUDI Mitra)', NULL, NULL, 'Manufaktur & Pengelasan', 'Menyediakan praktik kerja lapangan pengerjaan logam, pemesinan, dan pengelasan bagi siswa program Teknik Pemesinan.', NULL, 'Internship', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `partners` VALUES ('5', 'Laboratorium Klinik & Fasilitas Kesehatan Mitra', NULL, NULL, 'Kesehatan', 'Menyediakan tempat praktik kerja lapangan pemeriksaan laboratorium dan penanganan spesimen bagi siswa program Teknik Laboratorium Medik.', NULL, 'Internship', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `partners` VALUES ('6', 'Konsultan Perencana & Konstruksi (DUDI Mitra)', NULL, NULL, 'Konstruksi & Perencanaan', 'Mendukung praktik menggambar teknik, pemodelan bangunan, dan estimasi biaya bagi siswa program Desain Pemodelan dan Informasi Bangunan.', NULL, 'Internship', '0', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `partners` VALUES ('7', 'PT Pertani (Persero)', NULL, NULL, 'Agribisnis', 'Menghadirkan praktisi sebagai guru tamu dan mendukung praktik agribisnis tanaman pangan dan hortikultura.', 'https://pertani.co.id', 'Guest Lecturer', '0', '2026-07-27 07:08:08', '2026-07-27 07:08:08');

--
-- Table structure for table `password_reset_tokens`
--
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `ppdb_applicants`
--
DROP TABLE IF EXISTS `ppdb_applicants`;
CREATE TABLE `ppdb_applicants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ppdb_config_id` bigint unsigned NOT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_rw` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jalur` enum('zonasi','afirmasi','perpindahan','prestasi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn_sekolah` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rata_rata_rapor` decimal(5,2) DEFAULT NULL,
  `prestasi` json DEFAULT NULL,
  `jurusan_1` bigint unsigned NOT NULL,
  `jurusan_2` bigint unsigned DEFAULT NULL,
  `jurusan_3` bigint unsigned DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ortu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ortu` decimal(12,2) DEFAULT NULL,
  `no_hp_ortu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('menunggu','diterima','ditolak','daftar_ulang','mengundurkan_diri') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ppdb_applicants_nisn_unique` (`nisn`),
  KEY `ppdb_applicants_ppdb_config_id_foreign` (`ppdb_config_id`),
  KEY `ppdb_applicants_jurusan_1_foreign` (`jurusan_1`),
  KEY `ppdb_applicants_jurusan_2_foreign` (`jurusan_2`),
  KEY `ppdb_applicants_jurusan_3_foreign` (`jurusan_3`),
  CONSTRAINT `ppdb_applicants_jurusan_1_foreign` FOREIGN KEY (`jurusan_1`) REFERENCES `departments` (`id`),
  CONSTRAINT `ppdb_applicants_jurusan_2_foreign` FOREIGN KEY (`jurusan_2`) REFERENCES `departments` (`id`),
  CONSTRAINT `ppdb_applicants_jurusan_3_foreign` FOREIGN KEY (`jurusan_3`) REFERENCES `departments` (`id`),
  CONSTRAINT `ppdb_applicants_ppdb_config_id_foreign` FOREIGN KEY (`ppdb_config_id`) REFERENCES `ppdb_configs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `ppdb_configs`
--
DROP TABLE IF EXISTS `ppdb_configs`;
CREATE TABLE `ppdb_configs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelombang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Gelombang 1',
  `pendaftaran_mulai` timestamp NULL DEFAULT NULL,
  `pendaftaran_selesai` timestamp NULL DEFAULT NULL,
  `pengumuman_mulai` timestamp NULL DEFAULT NULL,
  `daftar_ulang_mulai` timestamp NULL DEFAULT NULL,
  `daftar_ulang_selesai` timestamp NULL DEFAULT NULL,
  `daya_tampung_total` int NOT NULL DEFAULT '0',
  `persen_zonasi` decimal(5,2) NOT NULL DEFAULT '50.00',
  `persen_afirmasi` decimal(5,2) NOT NULL DEFAULT '15.00',
  `persen_perpindahan` decimal(5,2) NOT NULL DEFAULT '10.00',
  `persen_prestasi` decimal(5,2) NOT NULL DEFAULT '25.00',
  `usia_maksimal_tahun` int NOT NULL DEFAULT '21',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `pengumuman` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `sessions`
--
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--
INSERT INTO `sessions` VALUES ('FnwPHGfdQarEGSNhlhAVNFvgk5FAUCHlOdNADAxc', '2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJnT3BwWDh5dnU2ckUxcTVseTNSblVGWXNrNUVpMG5BcFNZMUs1M243IiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hZG1pblwvZmFxcyIsInJvdXRlIjoiZmlsYW1lbnQuYWRtaW4ucmVzb3VyY2VzLmZhcXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MiwicGFzc3dvcmRfaGFzaF93ZWIiOiJmZjBlMjI4OGRmZTQ5NTEyZWZmZTI1MmRiNDdiZDZkMmU1Mjk0Mjc4OGMyYTgzMmFkNDc0ZjUwMWQ1NTFiMWE4IiwidGFibGVzIjp7Ijc3NjViMTlkODY4OGQxYzU0YTk4NWZhMzUyMGEzMzRiX2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY2F0ZWdvcnkiLCJsYWJlbCI6IkthdGVnb3JpIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InF1ZXN0aW9uIiwibGFiZWwiOiJQZXJ0YW55YWFuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InNvcnRfb3JkZXIiLCJsYWJlbCI6IlVydXRhbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJjcmVhdGVkX2F0IiwibGFiZWwiOiJEaWJ1YXQiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfV19fQ==', '1785136509');

--
-- Table structure for table `teachers`
--
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_department_id_foreign` (`department_id`),
  CONSTRAINT `teachers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--
INSERT INTO `teachers` VALUES ('1', '1', 'Hasan Basri, S.Pd.', 'Ketua Program Keahlian TKR', 'https://images.unsplash.com/photo-1607013251379-e6eecfffe234?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Instruktur otomotif bersertifikat kompetensi, membina kelas industri bekerja sama dengan bengkel resmi.</p>', 'hasan.basri@smkn5bantaeng.sch.id', '0813-5500-1006', 'S1 Pendidikan Teknik Otomotif, Universitas Negeri Makassar', 'Sistem Mesin & Kelistrikan Kendaraan', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('2', '1', 'Rahmat Hidayat, S.T.', 'Guru Produktif TKR', 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Fokus pada praktik chassis dan pemindah tenaga, aktif mendampingi uji kompetensi keahlian.</p>', 'rahmat.hidayat@smkn5bantaeng.sch.id', '0852-7800-1007', 'S1 Teknik Mesin, Universitas Muslim Indonesia', 'Chassis & Pemindah Tenaga', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('3', '2', 'Andi Rahmawati, S.Kom.', 'Ketua Program Keahlian TKJ', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Guru produktif jaringan komputer yang aktif membina tim lomba kompetensi siswa bidang IT Networking.</p>', 'andi.rahmawati@smkn5bantaeng.sch.id', '0852-4200-1002', 'S1 Teknik Informatika, STMIK Dipanegara Makassar', 'Jaringan Komputer & Administrasi Server', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('4', '2', 'Muh. Fadli, S.T.', 'Guru Produktif TKJ', 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Mengampu pemrograman dasar dan pemeliharaan perangkat keras, membimbing proyek teknologi sederhana siswa.</p>', 'muh.fadli@smkn5bantaeng.sch.id', '0853-9600-1003', 'S1 Teknik Elektro, Universitas Hasanuddin', 'Perangkat Keras & Sistem Tertanam', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('5', '3', 'Ir. Sitti Aminah, M.P.', 'Ketua Program Keahlian Agribisnis Pertanian', 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Ahli budidaya hortikultura yang mengembangkan lahan praktik dan program pertanian ramah lingkungan sekolah.</p>', 'sitti.aminah@smkn5bantaeng.sch.id', '0812-4100-1004', 'S2 Agronomi, Universitas Hasanuddin', 'Budidaya Tanaman Hortikultura', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('6', '3', 'Abdul Rasyid, S.P.', 'Guru Produktif Agribisnis Pertanian', 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Membimbing praktik pembibitan dan pengendalian hama terpadu di lahan praktik sekolah.</p>', 'abdul.rasyid@smkn5bantaeng.sch.id', '0821-9000-1005', 'S1 Agroteknologi, Universitas Muhammadiyah Makassar', 'Pembibitan & Proteksi Tanaman', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('7', '4', 'Andi Tenri Abeng, S.ST., M.Kes.', 'Ketua Program Keahlian TLM', 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Mengembangkan laboratorium medik sekolah dan membimbing praktik pemeriksaan laboratorium sesuai standar prosedur.</p>', 'andi.tenri@smkn5bantaeng.sch.id', '0823-4300-1008', 'S2 Kesehatan Masyarakat, Universitas Hasanuddin', 'Teknologi Laboratorium Medik', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('8', '4', 'Rostina, S.Tr.Kes.', 'Guru Produktif TLM', 'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Mengampu praktik hematologi dan kimia klinik serta penanganan spesimen dan keselamatan kerja laboratorium.</p>', 'rostina@smkn5bantaeng.sch.id', '0851-0200-1009', 'S1 Terapan Teknologi Laboratorium Medik, Poltekkes Makassar', 'Hematologi & Kimia Klinik', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('9', '5', 'Baharuddin, S.T.', 'Ketua Program Keahlian DPIB', 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Membimbing praktik menggambar teknik bangunan dan pemodelan berbasis CAD/BIM di studio DPIB sekolah.</p>', 'baharuddin@smkn5bantaeng.sch.id', '0813-4200-1010', 'S1 Teknik Sipil, Universitas Hasanuddin', 'Perancangan & Pemodelan Bangunan', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('10', '5', 'Irwan Setiawan, S.Pd.', 'Guru Produktif DPIB', 'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Mengampu menggambar konstruksi dan estimasi biaya bangunan menggunakan perangkat lunak desain terkini.</p>', 'irwan.setiawan@smkn5bantaeng.sch.id', '0852-4100-1011', 'S1 Pendidikan Teknik Bangunan, Universitas Negeri Makassar', 'AutoCAD & BIM', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('11', '6', 'Muhammad Arifin, S.Pd., M.T.', 'Ketua Program Keahlian TP', 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Instruktur pemesinan yang membimbing praktik pengoperasian mesin bubut, frais, dan pengelasan sesuai standar industri.</p>', 'muhammad.arifin@smkn5bantaeng.sch.id', '0813-4400-1012', 'S2 Teknik Mesin, Universitas Negeri Makassar', 'Teknik Pemesinan & Pengelasan', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('12', '6', 'Saharuddin, S.Pd.', 'Guru Produktif TP', 'https://images.unsplash.com/photo-1552058544-f2b08422138a?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Mengampu praktik kerja bangku dan pembacaan gambar teknik mesin dengan penekanan pada ketelitian dan K3.</p>', 'saharuddin@smkn5bantaeng.sch.id', '0852-4200-1013', 'S1 Pendidikan Teknik Mesin, Universitas Negeri Makassar', 'Kerja Bangku & Gambar Teknik', '0', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `teachers` VALUES ('13', '2', 'Drs. H. Muhammad Yusuf, M.Pd.', 'Kepala Sekolah', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&crop=faces&w=400&q=70', '<p>Memimpin SMK Negeri 5 Bantaeng dengan fokus pada penguatan budaya kerja industri dan digitalisasi sekolah.</p>', 'kepsek@smkn5bantaeng.sch.id', '0813-4400-1001', 'S2 Manajemen Pendidikan, Universitas Negeri Makassar', 'Manajemen Pendidikan Kejuruan', '1', '2026-07-27 07:08:07', '2026-07-27 07:08:07');

--
-- Table structure for table `testimonials`
--
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `rating` tinyint unsigned NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--
INSERT INTO `testimonials` VALUES ('1', 'Andi Suryanto', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&crop=faces&w=200&q=70', 'Orang Tua Siswa', 'Saya sangat bersyukur anak saya bisa bersekolah di SMKN 5 Bantaeng. Pendidikan karakter dan keterampilan yang diberikan sangat membekali anak untuk masa depannya.', '5', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `testimonials` VALUES ('2', 'Siti Nurhaliza', 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&crop=faces&w=200&q=70', 'Alumni TKJ 2024', 'Berkat ilmu jaringan yang saya dapatkan di SMKN 5 Bantaeng, saya sekarang bekerja sebagai teknisi jaringan di salah satu perusahaan telekomunikasi terkemuka.', '5', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `testimonials` VALUES ('3', 'H. Muhammad Ramli', 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&crop=faces&w=200&q=70', 'Ketua Komite Sekolah', 'SMKN 5 Bantaeng terus menunjukkan kemajuan yang signifikan dalam hal fasilitas dan kualitas pendidikan. Kami sebagai komite sangat mendukung penuh program-program sekolah.', '4', '2026-07-27 07:08:08', '2026-07-27 07:08:08');
INSERT INTO `testimonials` VALUES ('4', 'Risma Dewi', 'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&crop=faces&w=200&q=70', 'Siswa Kelas XII AP', 'Saya senang belajar di jurusan Agribisnis Pertanian. Praktik di lahan pertanian sekolah sangat menyenangkan dan menambah wawasan kami tentang pertanian modern.', '5', '2026-07-27 07:08:08', '2026-07-27 07:08:08');

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--
INSERT INTO `users` VALUES ('1', 'Admin SMKN 5 Bantaeng', 'admin@smkn5bantaeng.sch.id', '2026-07-27 07:08:07', '$2y$12$aXNA.3DPgXY7qHMM9bgf/eEIMUaU8dGgQoQ3ox32qp.z9j2RL6RFO', 'fIC220oBKZ', '2026-07-27 07:08:07', '2026-07-27 07:08:07');
INSERT INTO `users` VALUES ('2', 'admin', 'admin@gmail.com', NULL, '$2y$12$jhA.8KKKKKmvNgYRZHsw9O26yqyF69wvrOTifxOfzU716kv9LW2nO', NULL, '2026-07-27 07:15:00', '2026-07-27 07:15:00');

COMMIT;
