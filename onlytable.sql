/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : eat

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2016-04-27 23:58:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for choicemenu
-- ----------------------------
DROP TABLE IF EXISTS `choicemenu`;
CREATE TABLE `choicemenu` (
  `id` int(11) NOT NULL auto_increment,
  `menu_id` int(11) default NULL,
  `user_id` int(11) default NULL,
  `daydate` date default NULL,
  `isover` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dayhotel
-- ----------------------------
DROP TABLE IF EXISTS `dayhotel`;
CREATE TABLE `dayhotel` (
  `id` int(11) NOT NULL auto_increment,
  `hotel_id` int(11) default NULL,
  `daydate` date default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `isdefault` tinyint(4) default NULL,
  `addtime` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `price` varchar(50) default NULL,
  `hotel_id` int(11) default NULL,
  `isuse` tinyint(4) default '1',
  `isdelete` tinyint(4) default '0',
  `addtime` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  `role_id` int(11) default NULL,
  `addtime` datetime default NULL,
  `isnext` tinyint(4) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
