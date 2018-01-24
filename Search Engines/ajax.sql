/*
Navicat MySQL Data Transfer

Source Server         : testdb
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : ajax

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2018-01-22 19:14:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `record`
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增长主键',
  `title` varchar(20) NOT NULL COMMENT '词条或博客标题,标题唯一',
  `content` varchar(255) NOT NULL COMMENT '词条或博客内容',
  `click` int(10) unsigned DEFAULT NULL COMMENT '词条点击量',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of record
-- ----------------------------
INSERT INTO `record` VALUES ('1', 'php', '我居然用sql写php是世界上最好的语言', '1000');
INSERT INTO `record` VALUES ('2', 'php入门', '我居然在JavaScript作业中写php是世界上最好的语言', '5000');
INSERT INTO `record` VALUES ('3', 'php入门到精通', 'php是世界上最好的语言之一', '300');
INSERT INTO `record` VALUES ('4', 'javascript', '我居然用sql写javascript是世界上最好的语言', '10000');
INSERT INTO `record` VALUES ('5', 'javascript入门', '两链一包很重要', '200');
INSERT INTO `record` VALUES ('6', 'javascript入门到精通', 'javascript是世界上最好的语言之一', '100');
