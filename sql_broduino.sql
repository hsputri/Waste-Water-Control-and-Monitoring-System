/*
 Navicat Premium Data Transfer

 Source Server         : local MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : broduino

 Target Server Type    : MariaDB
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 03/12/2021 21:13:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for control
-- ----------------------------
DROP TABLE IF EXISTS `control`;
CREATE TABLE `control`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nilai` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of control
-- ----------------------------
INSERT INTO `control` VALUES (1, 'pump1', 0);
INSERT INTO `control` VALUES (2, 'pump2', 1);
INSERT INTO `control` VALUES (3, 'mode', 0);

-- ----------------------------
-- Table structure for data
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp(0) NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `level` float NOT NULL,
  `pump1` tinyint(1) NOT NULL,
  `pump2` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data
-- ----------------------------
INSERT INTO `data` VALUES (1, '2021-11-06 10:53:28', 3, 1, 0);
INSERT INTO `data` VALUES (2, '2021-11-06 10:53:33', 3, 0, 1);
INSERT INTO `data` VALUES (3, '2021-11-06 10:53:35', 3, 1, 0);
INSERT INTO `data` VALUES (4, '2021-11-06 10:53:38', 5.2, 1, 0);
INSERT INTO `data` VALUES (5, '2021-11-06 10:56:42', 10, 1, 0);
INSERT INTO `data` VALUES (6, '2021-11-06 10:59:49', 20, 1, 1);
INSERT INTO `data` VALUES (7, '2021-11-07 13:27:49', 5, 1, 1);
INSERT INTO `data` VALUES (8, '2021-11-07 13:28:09', 6, 0, 1);
INSERT INTO `data` VALUES (9, '2021-11-07 16:36:41', 3.8, 0, 0);
INSERT INTO `data` VALUES (10, '2021-11-07 17:01:37', 5, 0, 0);
INSERT INTO `data` VALUES (11, '2021-11-07 17:01:42', 4.5, 0, 0);
INSERT INTO `data` VALUES (12, '2021-11-07 17:01:44', 3, 0, 0);
INSERT INTO `data` VALUES (14, '2021-11-28 20:24:50', 4, 1, 1);
INSERT INTO `data` VALUES (15, '2021-11-28 20:24:56', 5, 0, 0);
INSERT INTO `data` VALUES (16, '2021-12-02 20:00:52', 7, 1, 0);

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification`  (
  `id` int(11) NOT NULL,
  `connect` tinyint(1) NOT NULL,
  `alarm` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notification
-- ----------------------------
INSERT INTO `notification` VALUES (1, 1, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Hanas Setyani Putri', 'hsp@mail.com', 'hsputri', 'asdasd123');
INSERT INTO `users` VALUES (6, '', 'jobseekercdc@gmail.com', 'jdtest', '7815696ecbf1c96e6894b779456d330e');
INSERT INTO `users` VALUES (7, '', 'setyani.putri23@gmail.com', 'hsputri23', 'b23cf2d0fb74b0ffa0cf4c70e6e04926');
INSERT INTO `users` VALUES (8, 'test akun', 'test123@gmail.com', 'test123', '0cc175b9c0f1b6a831c399e269772661');

SET FOREIGN_KEY_CHECKS = 1;
