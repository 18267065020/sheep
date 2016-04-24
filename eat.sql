/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : eat

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2016-04-25 01:20:31
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
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of choicemenu
-- ----------------------------

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
-- Records of dayhotel
-- ----------------------------

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
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES ('1', '111111', '0', '2016-04-24 23:29:53');
INSERT INTO `hotel` VALUES ('2', '22222', '0', '2016-04-24 23:29:55');
INSERT INTO `hotel` VALUES ('9', '发郭德纲', '1', '2016-04-24 23:54:17');
INSERT INTO `hotel` VALUES ('10', '而额外人', '0', '2016-04-24 23:54:20');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `price` decimal(8,0) default NULL,
  `hotel_id` int(11) default NULL,
  `isuser` tinyint(4) default '1',
  `isdelete` tinyint(4) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------

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
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '哈哈', '342', '1', '2016-04-24 10:46:25');
INSERT INTO `user` VALUES ('22', '123', '123', '1', '2016-04-24 21:00:51');
INSERT INTO `user` VALUES ('23', '234', '234', '1', '2016-04-24 21:01:47');
INSERT INTO `user` VALUES ('25', 'dsfgfd123', 'g123', '1', '2016-04-24 21:02:51');
INSERT INTO `user` VALUES ('32', '4535', '345345', '1', '2016-04-24 22:41:07');
INSERT INTO `user` VALUES ('31', '打过', 'ret', '1', '2016-04-24 22:34:05');
INSERT INTO `user` VALUES ('33', '34543', '54354', '1', '2016-04-24 22:41:10');
INSERT INTO `user` VALUES ('34', '玩儿', '123', '2', '2016-04-24 22:41:12');
INSERT INTO `user` VALUES ('42', '324', '234', '1', '2016-04-25 00:40:41');
INSERT INTO `user` VALUES ('36', '2342342', '34324', '1', '2016-04-24 22:41:18');
INSERT INTO `user` VALUES ('38', '水电费水电费是', 'werewr', '2', '2016-04-24 22:41:29');
