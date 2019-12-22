/*
 Navicat Premium Data Transfer

 Source Server         : mySQL
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : pbw

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 22/12/2019 21:09:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agenda
-- ----------------------------
DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda`  (
  `id_agenda` int(255) NOT NULL AUTO_INCREMENT,
  `nama_agenda` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_mulai` date NULL DEFAULT NULL,
  `tanggal_selesai` date NULL DEFAULT NULL,
  `waktu_mulai` time(6) NULL DEFAULT NULL,
  `waktu_selesai` time(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id_agenda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for alumni
-- ----------------------------
DROP TABLE IF EXISTS `alumni`;
CREATE TABLE `alumni`  (
  `id_alumni` int(255) NOT NULL AUTO_INCREMENT,
  `nama_alumni` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_alumni` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `jurusan_alumni` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelas_alumni` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `thn_masuk` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `thn_lulus` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_alumni`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id_berita` int(5) NOT NULL AUTO_INCREMENT,
  `judul_berita` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kontent` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_berita`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `id_attachment` int(6) NOT NULL AUTO_INCREMENT,
  `path_attachment` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_attachment`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pengurus
-- ----------------------------
DROP TABLE IF EXISTS `pengurus`;
CREATE TABLE `pengurus`  (
  `id_pengurus` int(5) NOT NULL AUTO_INCREMENT,
  `id_alumni` int(5) NOT NULL,
  `nama_jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `order` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengurus`) USING BTREE,
  INDEX `id_alumni`(`id_alumni`) USING BTREE,
  CONSTRAINT `id_alumni` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
