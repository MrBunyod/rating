/*
Navicat MySQL Data Transfer

Source Server         : denwer
Source Server Version : 50541
Source Host           : 127.0.0.1:3306
Source Database       : Reyting

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-06-04 16:54:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for baho
-- ----------------------------
DROP TABLE IF EXISTS `baho`;
CREATE TABLE `baho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fan_id` int(11) DEFAULT NULL,
  `uquvchi_id` int(11) DEFAULT NULL,
  `1_chorak` int(11) DEFAULT NULL,
  `2_chorak` int(11) DEFAULT NULL,
  `3_chorak` int(11) DEFAULT NULL,
  `4_chorak` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baho
-- ----------------------------
INSERT INTO `baho` VALUES ('1', '1', '0', null, null, null, null);
INSERT INTO `baho` VALUES ('2', '1', '0', null, null, null, null);
INSERT INTO `baho` VALUES ('3', '1', '4', null, null, null, null);
INSERT INTO `baho` VALUES ('4', '44', '4', null, null, null, null);
INSERT INTO `baho` VALUES ('5', '46', '4', null, null, null, null);
INSERT INTO `baho` VALUES ('6', '1', '4', null, null, null, null);
INSERT INTO `baho` VALUES ('7', '1', '4', null, null, null, null);
INSERT INTO `baho` VALUES ('8', '46', '7', null, null, null, null);
INSERT INTO `baho` VALUES ('9', '47', '3', null, null, null, null);
INSERT INTO `baho` VALUES ('10', '47', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('11', '49', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('12', '51', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('13', '52', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('14', '47', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('15', '48', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('16', '47', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('17', '51', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('18', '47', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('19', '47', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('20', '48', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('21', '47', '6', null, null, null, null);
INSERT INTO `baho` VALUES ('22', '48', '6', null, null, null, null);
INSERT INTO `baho` VALUES ('23', '49', '6', null, null, null, null);
INSERT INTO `baho` VALUES ('24', '50', '6', null, null, null, null);
INSERT INTO `baho` VALUES ('25', '47', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('26', '47', '4', null, null, null, null);
INSERT INTO `baho` VALUES ('27', '47', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('28', '49', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('29', '50', '8', null, null, null, null);
INSERT INTO `baho` VALUES ('30', '48', '8', '0', '0', '0', '0');
INSERT INTO `baho` VALUES ('31', '48', '8', '0', '0', '0', '0');
INSERT INTO `baho` VALUES ('32', '48', '8', '0', '0', '0', '0');
INSERT INTO `baho` VALUES ('33', '48', '8', '0', '0', '0', '0');
INSERT INTO `baho` VALUES ('34', '48', '3', '5', '5', '5', '5');
INSERT INTO `baho` VALUES ('35', '49', '3', '4', '4', '3', '4');
INSERT INTO `baho` VALUES ('36', '54', '3', '5', '4', '5', '4');
INSERT INTO `baho` VALUES ('37', '57', '3', '4', '3', '3', '3');
INSERT INTO `baho` VALUES ('38', '56', '3', '5', '5', '5', '5');
INSERT INTO `baho` VALUES ('39', '59', '3', '5', '5', '5', '5');
INSERT INTO `baho` VALUES ('40', '58', '3', '5', '5', '4', '4');
INSERT INTO `baho` VALUES ('41', '54', '3', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for fanlar
-- ----------------------------
DROP TABLE IF EXISTS `fanlar`;
CREATE TABLE `fanlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fan_nomi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fanlar
-- ----------------------------
INSERT INTO `fanlar` VALUES ('48', 'Ingliz tili');
INSERT INTO `fanlar` VALUES ('49', 'Rus tili');
INSERT INTO `fanlar` VALUES ('54', 'Fizika');
INSERT INTO `fanlar` VALUES ('56', 'Ona tili');
INSERT INTO `fanlar` VALUES ('57', 'Jismoniy tarbiya');
INSERT INTO `fanlar` VALUES ('58', 'Kimyo');
INSERT INTO `fanlar` VALUES ('59', 'Odobnoma');

-- ----------------------------
-- Table structure for Sinf
-- ----------------------------
DROP TABLE IF EXISTS `Sinf`;
CREATE TABLE `Sinf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sinf` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Sinf
-- ----------------------------
INSERT INTO `Sinf` VALUES ('1', '5-A');
INSERT INTO `Sinf` VALUES ('2', '5-B');
INSERT INTO `Sinf` VALUES ('3', '5-C');
INSERT INTO `Sinf` VALUES ('4', '5-D');
INSERT INTO `Sinf` VALUES ('5', '6-A');
INSERT INTO `Sinf` VALUES ('6', '6-B');
INSERT INTO `Sinf` VALUES ('7', '6-C');
INSERT INTO `Sinf` VALUES ('8', '6-D');
INSERT INTO `Sinf` VALUES ('9', '7-A');
INSERT INTO `Sinf` VALUES ('10', '7-B');
INSERT INTO `Sinf` VALUES ('11', '7-C');
INSERT INTO `Sinf` VALUES ('12', '7-D');
INSERT INTO `Sinf` VALUES ('13', '8-A');
INSERT INTO `Sinf` VALUES ('14', '8-B');
INSERT INTO `Sinf` VALUES ('15', '8-D');
INSERT INTO `Sinf` VALUES ('16', '9-A');
INSERT INTO `Sinf` VALUES ('17', '9-B');
INSERT INTO `Sinf` VALUES ('18', '9-C');
INSERT INTO `Sinf` VALUES ('19', '9-D');
INSERT INTO `Sinf` VALUES ('20', '9-E');

-- ----------------------------
-- Table structure for uquvchi
-- ----------------------------
DROP TABLE IF EXISTS `uquvchi`;
CREATE TABLE `uquvchi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sinf_id` int(20) DEFAULT NULL,
  `ism` varchar(255) DEFAULT NULL,
  `familiya` varchar(255) DEFAULT NULL,
  `otasining_ismi` varchar(255) DEFAULT NULL,
  `millati` varchar(255) DEFAULT NULL,
  `yashash_joyi` varchar(255) DEFAULT NULL,
  `rasm_url` varchar(255) DEFAULT NULL,
  `jinsi` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `uy_telefon` varchar(255) DEFAULT NULL,
  `otasi_ish` varchar(255) DEFAULT NULL,
  `onasi_ish` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of uquvchi
-- ----------------------------
INSERT INTO `uquvchi` VALUES ('3', '20', 'Aziza', 'Bahodirova', 'Otajon qizi', 'O\'zbek', 'Urganch P.Mahmud 155 uy', '', 'ayol', '', '', '', '');
INSERT INTO `uquvchi` VALUES ('6', '2', 'Muslima', 'Babajanova', 'Oybek qizi', 'O\'zbek', 'Urganch Oybek 8', '', 'ayol', '', '', '', '');
INSERT INTO `uquvchi` VALUES ('7', '2', 'Jumaniyoz', 'Jumaniyozov', 'Jumaniyozovich', 'O\'zbek', 'Urganch Oybek 8', '', 'erkak', null, null, null, null);
INSERT INTO `uquvchi` VALUES ('8', '2', 'Ismoyil', 'Boltaboyeva', 'Muhammadovich', 'O\'zbek', 'Urganch', '', 'erkak', '', '2258787', '', '');
INSERT INTO `uquvchi` VALUES ('9', '18', 'Otajon', 'Bekchanov', 'Bekdurdievich', 'O\'zbek', 'Urganch', '', 'erkak', '', '', '', '');
INSERT INTO `uquvchi` VALUES ('11', '2', 'Davron', 'Yunusovich', 'Sarvarbek o\'g\'li', 'o\'zbek', 'Urganch 8 mart', '', 'erkak', '5112525', '2295484', 'Nefte gaz XK', '40 maktab o\'qituvchi');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  `user_ip` int(10) unsigned NOT NULL DEFAULT '0',
  `display_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=cp1251;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'user', '1f32aa4c9a1d2ea010adcf2348166a04', 'd5765908ea9bccae2a4a2a525996abef', '2130706433', 'admin');
