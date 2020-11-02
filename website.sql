/*
 Navicat Premium Data Transfer

 Source Server         : Localhost 57
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : website

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 02/11/2020 15:48:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner`  (
  `banner_id` bigint(20) NOT NULL,
  `banner_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`banner_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `berita_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `berita_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `berita_isi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `berita_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `berita_author` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kategori_berita_id` bigint(20) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`berita_id`) USING BTREE,
  INDEX `berita_kategori_berita_id_foreign`(`kategori_berita_id`) USING BTREE,
  CONSTRAINT `berita_kategori_berita_id_foreign` FOREIGN KEY (`kategori_berita_id`) REFERENCES `kategori_berita` (`kategori_berita_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES (4, 'Wali Kota Ikuti Peringatan Hari Kesaktian Pancasila 1 Oktober 2020', '<p><span style=\"color: rgb(130, 130, 130); font-family: Rubik, sans-serif; font-size: 15px;\">Wali Kota Mataram menghadiri acara peringatan Hari Kesaktian Pancasila 1 Oktober 2020 bertempat di Aula Pendopo Wali Kota Mataram yang terhubung dengan Monumen Pancasila Sakti, Kawasan Lubang Buaya, Jakarta Timur, melalui Video Conference.</span><br></p>', '/uploads/berita/1603165758xfq8T4lOloqTKzof.jpg', 'Administrator', NULL, '2020-10-20 03:49:18', '2020-10-20 03:49:18');
INSERT INTO `berita` VALUES (5, 'Kantin SMPN 2 Mataram Mulai Berlakukan Non Tunai', '<p><span style=\"font-size: 1rem;\">Kantin SMPN 2 Mataram mulai melayani siswa yang berbelanja dengan menggunakan transakasi non tunai, begitu pula juga dengan koperasi. Transaksi menggunakan non tunia ni sebagai salah satu upaya SMPN</span><br></p>', '/uploads/berita/1603166129Jh7ZnuUpIav4w0C7.jpg', 'Administrator', NULL, '2020-10-20 03:55:29', '2020-10-20 03:55:29');
INSERT INTO `berita` VALUES (6, 'SMP 2 Mataram Umumkan Kelulusan Via WhatsAPP', '<p><span style=\"color: rgb(130, 130, 130); font-family: Rubik, sans-serif; font-size: 15px;\">Menyikapi pandemi Covid-19, pengumuman kelulusan SMP digelar dengan cara yang sangat sederhana. ”Alhamdulillah, kami sudah umumkan hasilnya lewat grup WA forum kelas,” kata Kepala SMPN 2 Mataram Muhammad Nazuhi.</span><br></p>', '/uploads/berita/1603166144MgHHiXoZ8n2paDxG.jpg', 'Administrator', NULL, '2020-10-20 03:55:44', '2020-10-20 03:55:44');

-- ----------------------------
-- Table structure for carousel
-- ----------------------------
DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel`  (
  `carousel_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `carousel_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `carousel_uraian` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `carousel_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`carousel_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carousel
-- ----------------------------
INSERT INTO `carousel` VALUES (2, 'Excellent Education', 'Proyeksi masa depan yang gemilang dimulai dari proses pendidikan yang baik pada masa sekarang oleh tenaga pendidik yang kompeten.', '/uploads/carousel/16031512091ciIjf3ARtRu3BQP.jpg');

-- ----------------------------
-- Table structure for ekskul
-- ----------------------------
DROP TABLE IF EXISTS `ekskul`;
CREATE TABLE `ekskul`  (
  `ekskul_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ekskul_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ekskul_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ekskul_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ekskul_uraian` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`ekskul_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ekskul
-- ----------------------------
INSERT INTO `ekskul` VALUES (2, 'adsf', '/uploads/ekskul/1604303009GG0bwQMSaImdgItq.png', NULL, '<p>asdf</p>');

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `gallery_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gallery_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gallery_gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `sembunyikan` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`gallery_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for halaman
-- ----------------------------
DROP TABLE IF EXISTS `halaman`;
CREATE TABLE `halaman`  (
  `halaman_jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `halaman_uraian` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `halaman_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `halaman_gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of halaman
-- ----------------------------
INSERT INTO `halaman` VALUES ('fasilitassekolah', '<p><span style=\"color: rgb(33, 37, 41); font-weight: 700;\">Uraianasdfas d</span><br></p>', 'Judul', NULL);
INSERT INTO `halaman` VALUES ('denahsekolah', NULL, NULL, '/uploads/denah/1604299210jucP8PWW8eqseBHg.png');
INSERT INTO `halaman` VALUES ('kontak', '<h1 class=\"m-0 text-dark\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 1.8rem; background-color: rgb(244, 246, 249);\">Kontak</h1>', NULL, NULL);

-- ----------------------------
-- Table structure for jadwal_belajar
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_belajar`;
CREATE TABLE `jadwal_belajar`  (
  `jadwal_belajar_id` bigint(20) NOT NULL,
  `jadwal_belajar_uraian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jadwal_belajar_waktu` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`jadwal_belajar_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kalender_akademik
-- ----------------------------
DROP TABLE IF EXISTS `kalender_akademik`;
CREATE TABLE `kalender_akademik`  (
  `kalender_akademik_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kalender_akademik_mulai` date NULL DEFAULT NULL,
  `kalender_akademik_selesai` date NULL DEFAULT NULL,
  `kalender_akademik_tanggal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kalender_akademik_uraian` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`kalender_akademik_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kalender_akademik
-- ----------------------------
INSERT INTO `kalender_akademik` VALUES (2, '2020-10-02', '2020-10-23', '02 October 2020 - 23 October 2020', 'Keterangan');

-- ----------------------------
-- Table structure for kategori_berita
-- ----------------------------
DROP TABLE IF EXISTS `kategori_berita`;
CREATE TABLE `kategori_berita`  (
  `kategori_berita_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kategori_berita_uraian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kategori_berita_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kategori_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kategori_kegiatan`;
CREATE TABLE `kategori_kegiatan`  (
  `kategori_kegiatan_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kategori_kegiatan_uraian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kategori_kegiatan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori_kegiatan
-- ----------------------------
INSERT INTO `kategori_kegiatan` VALUES (1, 'Ekstrakurikuler');

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan`  (
  `kegiatan_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kegiatan_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kegiatan_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kategori_kegiatan_id` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`kegiatan_id`) USING BTREE,
  INDEX `kegiatan_kategori_kegiatan_id_foreign`(`kategori_kegiatan_id`) USING BTREE,
  CONSTRAINT `kegiatan_kategori_kegiatan_id_foreign` FOREIGN KEY (`kategori_kegiatan_id`) REFERENCES `kategori_kegiatan` (`kategori_kegiatan_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kegiatan
-- ----------------------------
INSERT INTO `kegiatan` VALUES (1, 'Bermain Basket', '/uploads/kegiatan/1603168121ilMBrB9cCD038oRp.jpg', 1);

-- ----------------------------
-- Table structure for mapel
-- ----------------------------
DROP TABLE IF EXISTS `mapel`;
CREATE TABLE `mapel`  (
  `mapel_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mapel_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mapel_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mapel
-- ----------------------------
INSERT INTO `mapel` VALUES (2, 'TIK');
INSERT INTO `mapel` VALUES (3, 'Matematika');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `pengguna_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengguna_sandi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pengguna_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pengguna_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES ('administrator', '$2y$10$x4jdMD9gGy17lLChhUxfU.o1Y./A9xp9WeR1sUtgkMo5aT1om.S6G', 'Administrator');

-- ----------------------------
-- Table structure for peserta_didik
-- ----------------------------
DROP TABLE IF EXISTS `peserta_didik`;
CREATE TABLE `peserta_didik`  (
  `peserta_didik_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `peserta_didik_file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `peserta_didik_kelas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `peserta_didik_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`peserta_didik_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of peserta_didik
-- ----------------------------
INSERT INTO `peserta_didik` VALUES (1, '/uploads/pesertadidik/1604297346KQIBpvKgmLREnkMU.pdf', 'VII', '2020');

-- ----------------------------
-- Table structure for posting
-- ----------------------------
DROP TABLE IF EXISTS `posting`;
CREATE TABLE `posting`  (
  `posting_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `posting_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posting_uraian` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `posting_jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posting_file` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`posting_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posting
-- ----------------------------
INSERT INTO `posting` VALUES (4, 'asdf', '<p>asdf1212</p>', 'modulbelajar', NULL);

-- ----------------------------
-- Table structure for prestasi
-- ----------------------------
DROP TABLE IF EXISTS `prestasi`;
CREATE TABLE `prestasi`  (
  `prestasi_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `prestasi_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prestasi_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prestasi_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`prestasi_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prestasi
-- ----------------------------
INSERT INTO `prestasi` VALUES (2, 'asdf', '/uploads/prestasi/1603147468FsKa01VrB63RNpjm.jpeg', 'KabupatenKota');

-- ----------------------------
-- Table structure for profil
-- ----------------------------
DROP TABLE IF EXISTS `profil`;
CREATE TABLE `profil`  (
  `profil_jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `profil_uraian` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `profil_gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profil
-- ----------------------------
INSERT INTO `profil` VALUES ('Sejarah Sekolah', '<p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\"><b>SMP Negeri (SMPN) 2 Mataram</b>, merupakan salah satu&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sekolah_Menengah_Pertama\" class=\"mw-redirect\" title=\"Sekolah Menengah Pertama\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Sekolah Menengah Pertama</a>&nbsp;Negeri yang ada di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Provinsi\" title=\"Provinsi\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Provinsi</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/Nusa_Tenggara_Barat\" title=\"Nusa Tenggara Barat\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Nusa Tenggara Barat</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Indonesia\" title=\"Indonesia\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Indonesia</a>. Sama dengan SMP pada umumnya di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Indonesia\" title=\"Indonesia\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Indonesia</a>&nbsp;masa&nbsp;<a href=\"https://id.wikipedia.org/wiki/Pendidikan\" title=\"Pendidikan\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">pendidikan</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sekolah\" title=\"Sekolah\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">sekolah</a>&nbsp;di SMPN 2 Mataram ditempuh dalam waktu tiga tahun pelajaran, mulai dari Kelas VII sampai Kelas IX</p><h2 style=\"color: rgb(0, 0, 0); margin: 1em 0px 0.25em; padding: 0px; overflow: hidden; border-bottom: 1px solid rgb(162, 169, 177); font-size: 1.5em; font-family: &quot;Linux Libertine&quot;, Georgia, Times, serif; line-height: 1.3;\"><span class=\"mw-headline\" id=\"Fasilitas\">Fasilitas</span></h2><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">Berbagai fasilitas dimiliki SMPN 2 Mataram untuk menunjang kegiatan belajar mengajar. Fasilitas tersebut antara lain:</p><ul style=\"list-style-image: url(&quot;/w/skins/Vector/resources/skins.vector.styles/images/bullet-icon.svg?d4515&quot;); margin: 0.3em 0px 0px 1.6em; padding: 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\"><li style=\"margin-bottom: 0.1em;\"><a href=\"https://id.wikipedia.org/wiki/Kelas\" class=\"mw-disambig\" title=\"Kelas\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Kelas</a></li><li style=\"margin-bottom: 0.1em;\">Studio Musik</li><li style=\"margin-bottom: 0.1em;\">Aula</li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://id.wikipedia.org/wiki/Perpustakaan\" title=\"Perpustakaan\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Perpustakaan</a></li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://id.wikipedia.org/wiki/Laboratorium\" title=\"Laboratorium\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Laboratorium</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/Biologi\" title=\"Biologi\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Biologi</a></li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://id.wikipedia.org/wiki/Laboratorium\" title=\"Laboratorium\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Laboratorium</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/Fisika\" title=\"Fisika\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Fisika</a></li><li style=\"margin-bottom: 0.1em;\"><a href=\"https://id.wikipedia.org/wiki/Laboratorium_Komputer\" class=\"mw-redirect\" title=\"Laboratorium Komputer\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Laboratorium Komputer</a></li></ul>', '/uploads/profil/1603160712yot94c5yUfslp3i3.jpg');
INSERT INTO `profil` VALUES ('Visi Misi', '<p class=\"MsoNormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana; font-size: 12px;\"><span style=\"font-weight: bolder;\">Visi</span></p><p class=\"MsoNormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana; font-size: 12px;\">Berilmu dan berketerampilan yang dilandasi Iman dan Taqwa kepada Tuhan Yama Maha Esa</p><p class=\"MsoNormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana; font-size: 12px;\"><span style=\"font-weight: bolder;\">Misi</span></p><ol style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana; font-size: 12px;\"><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Menyelenggarakan kegiatan belajar mengajar yang efektif, efisien dan bermutu</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Menyediakan sarana dan prasarana serta sumber belajar yang sesuai</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Menyediakan fasilitas dan sarana kegiatan ekstrakurikuler untuk menunjang bakat non akademik dan memberikan vokasional skill kepada siswa</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Menciptakan kondisi sekolah yang tertib dan disiplin</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Membina dan meningkatkan profesional guru</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Menyelenggarakan kegiatan imtaq dan kegiatan keagamaan lainnya untuk membina keimanan, ketaqwaan dan akhlaq terpuji bagi siswa</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Membangun hubungan yang lebih komunikatif antara sekolah dengan masyarakat dalam menyusun program sekolah dan juga pihak lain yang berkiprah dan memiliki katian dengan masalah pendidikan</li></ol><p class=\"MsoNormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana; font-size: 12px;\"><span style=\"font-weight: bolder;\">Tujuan</span></p><p class=\"MsoNormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana; font-size: 12px;\">Meningkatkan kualitas pendidikan di SMA Negeri 2 Mataram dengan indikator:</p><ol style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 15px; color: rgb(51, 51, 51); font-family: Arial, Tahoma, Verdana; font-size: 12px;\"><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Menghasilkan siswa yang beraklaq mulia dan berbudi pekerti yang luhur</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Meningkatkan hasil belajar siswa, baik dilihat dari hasilujian maupun jumlah siswa yang diterima di perguruan tinggi negeri maupun swasta yang ternama dari tahun ke tahun</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Meningkatkan kemampuan siswa untuk mengembangkan diri sejalan dengan perkembangan IPTEK dengan kesenian</li><li style=\"margin: 0px 0px 0px 20px; padding: 0px;\">Meningkatkan kemampuan siswa dalam memiliki pengetahuan dan keterampilan dasar untuk hidup dalam masyarakat</li></ol>', '/uploads/profil/1603160941t5uNJnLlVEqtcSdz.jpg');
INSERT INTO `profil` VALUES ('Kepala Sekolah', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 15px; color: rgb(130, 130, 130); font-family: Rubik, sans-serif;\">SMPN 2 Mataram memiliki visi&nbsp;<span style=\"margin: 0px; padding: 0px; border: none; outline: none; font-weight: bolder;\">membentuk manusia yang berlandaskan iman dan taqwa</span>&nbsp;serta memiliki akhlak yang mulia dan berprestasi.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 15px; color: rgb(130, 130, 130); font-family: Rubik, sans-serif;\">Visi dan misi tersebut sejalan dengan misi Pemerintah Kota Mataram untuk membentuk manusia yang beriman dan bertaqwa.</p>', '/uploads/profil/1603160961FMgMVWOoSyb7NdIC.jpg');
INSERT INTO `profil` VALUES ('Komite Sekolah', '<p>Komite Sekolah</p>', '/uploads/profil/1603161103SfnojRAk9ipmBlPw.jpg');

-- ----------------------------
-- Table structure for struktur_organisasi
-- ----------------------------
DROP TABLE IF EXISTS `struktur_organisasi`;
CREATE TABLE `struktur_organisasi`  (
  `struktur_organisasi_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `struktur_organisasi_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `struktur_organisasi_pejabat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `struktur_organisasi_pejabat_nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `struktur_organisasi_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `struktur_organisasi_urutan` tinyint(255) NULL DEFAULT NULL,
  PRIMARY KEY (`struktur_organisasi_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of struktur_organisasi
-- ----------------------------
INSERT INTO `struktur_organisasi` VALUES (1, 'Kepala Sekolah', 'Mukh. Nazuhi', '-', '/uploads/strukturorganisasi/1603166601OyAxhJLR1RqvNgpv.jpg', 1);

-- ----------------------------
-- Table structure for tata_usaha
-- ----------------------------
DROP TABLE IF EXISTS `tata_usaha`;
CREATE TABLE `tata_usaha`  (
  `tata_usaha_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tata_usaha_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tata_usaha_pejabat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tata_usaha_pejabat_nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tata_usaha_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tata_usaha_urutan` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`tata_usaha_id`) USING BTREE,
  UNIQUE INDEX `tata_usaha_jabatan_unique`(`tata_usaha_jabatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tenaga_pendidik
-- ----------------------------
DROP TABLE IF EXISTS `tenaga_pendidik`;
CREATE TABLE `tenaga_pendidik`  (
  `tenaga_pendidik_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tenaga_pendidik_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mapel_id` bigint(255) NULL DEFAULT NULL,
  `tenaga_pendidik_kriteria` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tenaga_pendidik_nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tenaga_pendidik_foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`tenaga_pendidik_id`) USING BTREE,
  INDEX `tenaga_pendidik_mapel_id_foreign`(`mapel_id`) USING BTREE,
  CONSTRAINT `tenaga_pendidik_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`mapel_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tenaga_pendidik
-- ----------------------------
INSERT INTO `tenaga_pendidik` VALUES (1, 'tesa2123', 2, 'PNS', NULL, NULL);
INSERT INTO `tenaga_pendidik` VALUES (2, 'asdfasdf', 3, 'Non PNS', NULL, NULL);

-- ----------------------------
-- Table structure for video
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video`  (
  `video_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `video_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video_uraian` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `video_link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`video_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES (2, 'Serba - Serbi', 'Dokumentasi visual serba serbi sekolah', '<iframe width=\"370\" height=\"250\" src=\"https://www.youtube.com/embed/_IkDDj-UmzI\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

SET FOREIGN_KEY_CHECKS = 1;
