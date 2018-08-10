/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost:3306
 Source Schema         : xqb

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : 65001

 Date: 10/08/2018 18:10:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for xqb_admin_users
-- ----------------------------
DROP TABLE IF EXISTS `xqb_admin_users`;
CREATE TABLE `xqb_admin_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `create_time` int(11) NULL DEFAULT NULL,
  `update_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xqb_admin_users
-- ----------------------------
INSERT INTO `xqb_admin_users` VALUES (3, 'admin', '27c82c3a5d50ad99aef8c5d76ee7629c', 'admin', NULL, NULL, 1533893159, 1533893159);

-- ----------------------------
-- Table structure for xqb_article
-- ----------------------------
DROP TABLE IF EXISTS `xqb_article`;
CREATE TABLE `xqb_article`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章标题',
  `type` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章类型',
  `link` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章链接',
  `cover` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '封面',
  `state` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态0-下架1-上架',
  `use_times` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分享次数',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `type`(`type`) USING BTREE,
  INDEX `state`(`state`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '文章表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for xqb_article_type
-- ----------------------------
DROP TABLE IF EXISTS `xqb_article_type`;
CREATE TABLE `xqb_article_type`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '分类名称',
  `state` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态0-下架1-上架',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `state`(`state`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '文章分类' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xqb_article_type
-- ----------------------------
INSERT INTO `xqb_article_type` VALUES (3, 'Canon', 1, 1533891775, 1533891775);
INSERT INTO `xqb_article_type` VALUES (8, 'Yanni', 1, 1533894583, 1533894583);

-- ----------------------------
-- Table structure for xqb_location
-- ----------------------------
DROP TABLE IF EXISTS `xqb_location`;
CREATE TABLE `xqb_location`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `locate_for` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '定位谁',
  `people_ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '被定位的人的ip',
  `people_point` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '被定位的人的坐标',
  `share_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分享文章的时间',
  `read_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '阅读文章的时间',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '定位表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for xqb_recharge
-- ----------------------------
DROP TABLE IF EXISTS `xqb_recharge`;
CREATE TABLE `xqb_recharge`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `code_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '密钥id',
  `origin_amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '原始金额',
  `current_amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '充值后金额',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `code_id`(`code_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '充值记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for xqb_recharge_code
-- ----------------------------
DROP TABLE IF EXISTS `xqb_recharge_code`;
CREATE TABLE `xqb_recharge_code`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '充值金额',
  `code` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '卡密',
  `is_used` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否使用',
  `used_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '使用时间',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `is_used`(`is_used`) USING BTREE,
  INDEX `amount`(`amount`) USING BTREE,
  INDEX `code`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '卡密表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for xqb_user_log
-- ----------------------------
DROP TABLE IF EXISTS `xqb_user_log`;
CREATE TABLE `xqb_user_log`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '1-注册2-登陆',
  `login_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '登陆时间',
  `login_ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '登陆ip',
  `add_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '用户log' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for xqb_users
-- ----------------------------
DROP TABLE IF EXISTS `xqb_users`;
CREATE TABLE `xqb_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '用户名',
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '手机号',
  `passwd` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '密码',
  `amount` decimal(10, 2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT '金额',
  `reg_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '注册时间',
  `login_times` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '登陆次数',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `phone`(`phone`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xqb_users
-- ----------------------------
INSERT INTO `xqb_users` VALUES (1, NULL, '15068705890', '82824e8c7241790a5d7996cdacc670f1', 0.00, 1533883399, 14, 1533894953);
INSERT INTO `xqb_users` VALUES (2, NULL, '15068705891', '82824e8c7241790a5d7996cdacc670f1', 0.00, 1533886077, 1, 1533886077);

SET FOREIGN_KEY_CHECKS = 1;
