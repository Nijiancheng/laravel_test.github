/*
 Navicat Premium Data Transfer

 Source Server         : wordpress
 Source Server Type    : MySQL
 Source Server Version : 50727
 Source Host           : localhost:3306
 Source Schema         : java_test

 Target Server Type    : MySQL
 Target Server Version : 50727
 File Encoding         : 65001

 Date: 16/10/2019 23:08:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (7, 'faiz', '555faiz@faiz.com');
INSERT INTO `user` VALUES (14, 'zzz', 'zzzzzzz@zz.com');
INSERT INTO `user` VALUES (16, '张三', '1111@qq.com');
INSERT INTO `user` VALUES (17, 'ni', 'jiancheng@qq.com');
INSERT INTO `user` VALUES (19, '111haha', '1111111@11.com');
INSERT INTO `user` VALUES (22, 'aa', 'aaaa@aa.com');
INSERT INTO `user` VALUES (23, 'aaaa', 'aaaaa@ss.com');
INSERT INTO `user` VALUES (24, 'asaas', 'adas@aaaa.com');
INSERT INTO `user` VALUES (25, 'sssaa', 'ddada@ada.com');
INSERT INTO `user` VALUES (26, '❤❥웃유♋☮', '❤❥웃유♋☮@웃유.com');
INSERT INTO `user` VALUES (27, '倪建成', '18252531904@163.com');
INSERT INTO `user` VALUES (28, '倪建成', '18252531904@163.com');
INSERT INTO `user` VALUES (29, '柳启明', '18252531904@163.com');
INSERT INTO `user` VALUES (30, '柳启明', '18252531904@163.com');
INSERT INTO `user` VALUES (31, '殷世伟', '18252531904@163.com');
INSERT INTO `user` VALUES (32, '殷世伟', '18252531904@163.com');
INSERT INTO `user` VALUES (33, '殷世伟', '18252531904@163.com');
INSERT INTO `user` VALUES (34, '殷世伟', '18252531904@163.com');
INSERT INTO `user` VALUES (35, '陈伟平', '18252531904@163.com');
INSERT INTO `user` VALUES (36, '1121212', '18252531904@163.com');
INSERT INTO `user` VALUES (37, 'meizi', 'meizi@dd.com');
INSERT INTO `user` VALUES (38, 'kongwo', 'kongwo@gujia.com');
INSERT INTO `user` VALUES (39, '哈哈哈', '188588858@163.com');
INSERT INTO `user` VALUES (40, '扥森', 'qq@c.c');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '倪建成', '18252531904@163.com', NULL, '123456', NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, '刘其产能', '1825253190@163.com', NULL, '456123', NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, '柳启明1', '555faiz@faiz.com', NULL, '123456', NULL, '2019-10-16 14:13:53', '2019-10-16 14:53:44');
INSERT INTO `users` VALUES (5, 'nid', '18252519@163.com', NULL, '123456', NULL, '2019-10-16 15:04:20', '2019-10-16 15:04:20');

SET FOREIGN_KEY_CHECKS = 1;
