/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : video

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-03-17 20:59:02
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `video_admin`
-- ----------------------------
DROP TABLE IF EXISTS `video_admin`;
CREATE TABLE `video_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_pwd` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video_admin
-- ----------------------------
INSERT INTO video_admin VALUES ('1', 'admin', '12345', '2020-03-16 21:28:17', '2020-03-17 13:53:28');

-- ----------------------------
-- Table structure for `video_list`
-- ----------------------------
DROP TABLE IF EXISTS `video_list`;
CREATE TABLE `video_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `video_cover` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video_list
-- ----------------------------
INSERT INTO video_list VALUES ('4', 'demo', 'original', '1:30', '20200317202758835674183.jpg', '20200317194231334817510.mp4', '2020-03-28 12:12:00');
INSERT INTO video_list VALUES ('5', 'demo2', 'facebook', '12:01:03', '202003172053422072304348.jpg', '20200317205247716916946.mp4', '2020-03-17 12:12:00');
