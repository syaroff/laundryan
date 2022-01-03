/*
 Navicat Premium Data Transfer

 Source Server         : local_konek
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : adelalaundry

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 03/01/2022 07:31:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_jenis
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jenis`;
CREATE TABLE `tbl_jenis`  (
  `id_jenis_laundry` int NOT NULL AUTO_INCREMENT,
  `jenis_laundryan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `harga` decimal(32, 0) NOT NULL,
  PRIMARY KEY (`id_jenis_laundry`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_jenis
-- ----------------------------
INSERT INTO `tbl_jenis` VALUES (1, 'Cuci Basah', 3000);
INSERT INTO `tbl_jenis` VALUES (2, 'Cuci Kering', 4500);
INSERT INTO `tbl_jenis` VALUES (3, 'Cuci Kering + Setrika', 5500);
INSERT INTO `tbl_jenis` VALUES (4, 'Setrika', 5000);

-- ----------------------------
-- Table structure for tbl_member
-- ----------------------------
DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE `tbl_member`  (
  `id_member` int NOT NULL AUTO_INCREMENT,
  `nama_member` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_promo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diskon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_member
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_order
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order`  (
  `id_order` int NOT NULL AUTO_INCREMENT,
  `nama_pengorder` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_laudry` int NOT NULL,
  `harga` decimal(32, 0) NOT NULL,
  `alamat` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ongkir` decimal(32, 0) NOT NULL,
  `statuss` int NOT NULL,
  `kode_promo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jumlah` decimal(32, 0) NOT NULL,
  `status_order` int NOT NULL,
  `no_wa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_order`) USING BTREE,
  INDEX `fk_id_jenis`(`jenis_laudry`) USING BTREE,
  CONSTRAINT `fk_id_jenis` FOREIGN KEY (`jenis_laudry`) REFERENCES `tbl_jenis` (`id_jenis_laundry`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_order
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_penghasilan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_penghasilan`;
CREATE TABLE `tbl_penghasilan`  (
  `id_penghasilan` int NOT NULL AUTO_INCREMENT,
  `id_order` int NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `jumlah` decimal(32, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_penghasilan`) USING BTREE,
  INDEX `fk_order`(`id_order`) USING BTREE,
  CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `tbl_order` (`id_order`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_penghasilan
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pasword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` int NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);
INSERT INTO `tbl_user` VALUES (2, 'kurir', '81dc9bdb52d04dc20036dbd8313ed055', 2);

SET FOREIGN_KEY_CHECKS = 1;
