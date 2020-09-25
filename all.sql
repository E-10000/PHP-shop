create database shop;
use shop;

-- ----------------------------
-- Table structure for users
-- ----------------------------
CREATE TABLE `users` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT,
  `Uno` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` char(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`Uid`),
  UNIQUE KEY `Uno` (`Uno`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '123', '615cc71fb28dc51a888a2a36879e360b', 'bd392bd0c72a9ca539e596a2fe1dd36f', '742891270@qq.com');
INSERT INTO `users` VALUES ('7', '456', 'fa8160b8f91bdb1da8cf0095b942115a', 'b07d1f7416f62ca5e677a1133cddcf84', '1260743086@qq.com');
INSERT INTO `users` VALUES ('8', '789', '3ea7d50f22ee82794f07f862f0ac68c2', 'e22e2c7bd31cfe9950e129b8733f8b14', '123@qq.com');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `Pid` int(11) NOT NULL AUTO_INCREMENT,
  `Pname` varchar(20) NOT NULL,
  `Ptotal` float NOT NULL,
  `Pword` text,
  `PIMG` varchar(100) DEFAULT 'D:phpapachehtdocsgkPHPigWorkimagesdefault.jpg',
  PRIMARY KEY (`Pid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '2077 ', '450', '赛博朋克2077是由CDPJ制作的一款游戏，里面描绘了2077年的夜之城，故事的主角将从这里出发探索.....', '2077.jpg');
INSERT INTO `product` VALUES ('2', 'TLOU2 ', '500', '最后的生还者2，也称美国末日2', 'TLOU2.jpg');
INSERT INTO `product` VALUES ('3', 'P6', '398', '测试', 'P6.jpg');
INSERT INTO `product` VALUES ('7', '只狼 ', '150', '打铁吗？老哥', 'lang.jpg');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL AUTO_INCREMENT,
  `Uid` int(11) DEFAULT NULL,
  `Pid` int(11) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `Ototal_Amount` float NOT NULL,
  `Otime` datetime NOT NULL,
  PRIMARY KEY (`Oid`),
  KEY `fk_order_1` (`Uid`),
  KEY `fk_order_2` (`Pid`),
  CONSTRAINT `fk_order_1` FOREIGN KEY (`Uid`) REFERENCES `users` (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('35', '1', '3', '4', '1592', '2020-06-12 11:33:31');
INSERT INTO `orders` VALUES ('36', '1', '2', '2', '1000', '2020-06-12 11:33:32');
INSERT INTO `orders` VALUES ('37', '1', '1', '4', '1800', '2020-06-12 11:33:32');
INSERT INTO `orders` VALUES ('38', '1', '3', '3', '1194', '2020-06-12 11:36:23');
INSERT INTO `orders` VALUES ('39', '1', '2', '2', '1000', '2020-06-12 11:36:23');
INSERT INTO `orders` VALUES ('40', '1', '7', '2', '300', '2020-06-12 11:36:24');
INSERT INTO `orders` VALUES ('41', '8', '2', '3', '1500', '2020-06-12 11:37:37');
INSERT INTO `orders` VALUES ('42', '8', '1', '2', '900', '2020-06-12 11:37:37');
INSERT INTO `orders` VALUES ('43', '8', '7', '4', '600', '2020-06-12 11:37:37');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `adname` varchar(20) NOT NULL COMMENT '管理员账号',
  `password` char(32) NOT NULL COMMENT '管理员密码',
  `salt` char(32) NOT NULL COMMENT '管理员代码盐',
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `adname` (`adname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '5c4bac1847ae9d4204c8fa649c1c0bd0', 'bc00f564a9e599bf7e7ce67cacbedd4a');
