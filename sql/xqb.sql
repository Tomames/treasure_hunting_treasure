/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xqb

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-06 18:29:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `xqb_user`
-- ----------------------------
DROP TABLE IF EXISTS `xqb_user`;
CREATE TABLE `xqb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `money` double(11,2) NOT NULL DEFAULT '0.00',
  `createTime` datetime NOT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xqb_user
-- ----------------------------
INSERT INTO `xqb_user` VALUES ('2', 'test', '47ec2dd791e31e2ef2076caf64ed9b3d', '1.00', '2018-08-06 18:23:22');
