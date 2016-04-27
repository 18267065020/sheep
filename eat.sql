/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : eat

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2016-04-27 23:58:26
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
-- Records of choicemenu
-- ----------------------------
INSERT INTO `choicemenu` VALUES ('6', '8', '22', '2016-04-26', '0');
INSERT INTO `choicemenu` VALUES ('8', '8', '23', '2016-04-26', '0');
INSERT INTO `choicemenu` VALUES ('14', '8', '22', '2016-04-27', '0');

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
INSERT INTO `hotel` VALUES ('9', '发郭德纲', '0', '2016-04-24 23:54:17');
INSERT INTO `hotel` VALUES ('10', '而额外人', '1', '2016-04-24 23:54:20');

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
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '菜品1', '123', '2', '1', '1', '2016-04-26 00:30:09');
INSERT INTO `menu` VALUES ('2', '123', '43', '10', '1', '0', '2016-04-26 00:30:21');
INSERT INTO `menu` VALUES ('3', '滴答滴', '齐全', '9', '0', '0', '2016-04-26 00:31:27');
INSERT INTO `menu` VALUES ('4', 'sdf', '34', '10', '1', '0', '2016-04-26 22:36:56');
INSERT INTO `menu` VALUES ('5', '23432', '324', '10', '1', '0', '2016-04-26 22:36:59');
INSERT INTO `menu` VALUES ('6', '234234', '4234324', '10', '1', '0', '2016-04-26 22:37:02');
INSERT INTO `menu` VALUES ('7', '3213123', '213213', '10', '1', '0', '2016-04-26 22:37:04');
INSERT INTO `menu` VALUES ('8', '234324', '324324', '10', '1', '0', '2016-04-26 22:37:06');

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

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '哈哈', '342', '1', '2016-04-24 10:46:25', null);
INSERT INTO `user` VALUES ('22', '123', '123', '1', '2016-04-24 21:00:51', '1');
INSERT INTO `user` VALUES ('23', '1234', '1234', '2', '2016-04-24 21:01:47', '0');
INSERT INTO `user` VALUES ('25', 'dsfgfd123', 'g123', '1', '2016-04-24 21:02:51', null);
INSERT INTO `user` VALUES ('32', '4535', '345345', '1', '2016-04-24 22:41:07', null);
INSERT INTO `user` VALUES ('31', '打过', 'ret', '1', '2016-04-24 22:34:05', null);
INSERT INTO `user` VALUES ('33', '34543', '54354', '1', '2016-04-24 22:41:10', null);
INSERT INTO `user` VALUES ('34', '玩儿', '123', '2', '2016-04-24 22:41:12', null);
INSERT INTO `user` VALUES ('42', '324', '234', '1', '2016-04-25 00:40:41', null);
INSERT INTO `user` VALUES ('36', '2342342', '34324', '1', '2016-04-24 22:41:18', null);
INSERT INTO `user` VALUES ('38', '水电费水电费是', 'werewr', '2', '2016-04-24 22:41:29', null);
INSERT INTO `user` VALUES ('43', 'yyy', '123', '2', '2016-04-26 23:32:40', '0');
