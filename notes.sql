/*
Navicat MySQL Data Transfer

Source Server         : ks
Source Server Version : 50613
Source Host           : 127.0.0.1:3306
Source Database       : notes

Target Server Type    : MYSQL
Target Server Version : 50613
File Encoding         : 65001

Date: 2016-06-25 13:38:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for appendix
-- ----------------------------
DROP TABLE IF EXISTS `appendix`;
CREATE TABLE `appendix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `location` varchar(64) NOT NULL,
  `n_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `n_id` (`n_id`),
  CONSTRAINT `appendix_ibfk_1` FOREIGN KEY (`n_id`) REFERENCES `note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appendix
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for note
-- ----------------------------
DROP TABLE IF EXISTS `note`;
CREATE TABLE `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publish_time` datetime NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `note_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of note
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70');
INSERT INTO `user` VALUES ('2', 'wdt', '202cb962ac59075b964b07152d234b70');
INSERT INTO `user` VALUES ('3', 'pwp', '202cb962ac59075b964b07152d234b70');
INSERT INTO `user` VALUES ('4', '161320118', '202cb962ac59075b964b07152d234b70');
INSERT INTO `user` VALUES ('5', 'nuaa', '6efef13f2a55a4ff356fab3b04f48d57');
