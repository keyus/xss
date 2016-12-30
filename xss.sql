/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tutu

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-30 10:45:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tu_message`
-- ----------------------------
DROP TABLE IF EXISTS `tu_message`;
CREATE TABLE `tu_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie` varchar(250) NOT NULL,
  `href` varchar(250) DEFAULT NULL,
  `tophref` varchar(250) DEFAULT NULL,
  `opener` varchar(250) DEFAULT NULL,
  `userAgent` varchar(250) NOT NULL,
  `create_time` varchar(50) NOT NULL,
  `read_state` tinyint(1) NOT NULL DEFAULT '0',
  `hostname` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tu_message
-- ----------------------------
INSERT INTO `tu_message` VALUES ('284', 'pgv_pvi=2810585088; it_boombar_first_visit=1480533616; __utma=138229305.716135822.1480562425.1480562425.1480642400.2; __utmz=138229305.1480562425.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=eevee4b99frk0rhaaiobqqef71', 'http://xs.com/a/web.php', 'http://xs.com/a/web.php', '', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1481189638', '0', 'xs.com');
INSERT INTO `tu_message` VALUES ('282', 'pgv_pvi=2810585088; it_boombar_first_visit=1480533616; __utma=138229305.716135822.1480562425.1480562425.1480642400.2; __utmz=138229305.1480562425.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=eevee4b99frk0rhaaiobqqef71', 'http://xs.com/a/web.php', 'http://xs.com/a/web.php', '', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1481189638', '0', 'xs.com');
INSERT INTO `tu_message` VALUES ('281', 'pgv_pvi=2810585088; it_boombar_first_visit=1480533616; __utma=138229305.716135822.1480562425.1480562425.1480642400.2; __utmz=138229305.1480562425.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=eevee4b99frk0rhaaiobqqef71', 'http://xs.com/a/web.php', 'http://xs.com/a/web.php', '', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1481189637', '0', 'xs.com');
INSERT INTO `tu_message` VALUES ('280', 'pgv_pvi=2810585088; it_boombar_first_visit=1480533616; __utma=138229305.716135822.1480562425.1480562425.1480642400.2; __utmz=138229305.1480562425.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=eevee4b99frk0rhaaiobqqef71', 'http://xs.com/a/web.php', 'http://xs.com/a/web.php', '', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1481189637', '0', 'xs.com');
INSERT INTO `tu_message` VALUES ('279', 'pgv_pvi=2810585088; it_boombar_first_visit=1480533616; __utma=138229305.716135822.1480562425.1480562425.1480642400.2; __utmz=138229305.1480562425.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=eevee4b99frk0rhaaiobqqef71', 'http://xs.com/a/web.php', 'http://xs.com/a/web.php', '', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1481189637', '0', 'xs.com');
INSERT INTO `tu_message` VALUES ('278', 'pgv_pvi=2810585088; it_boombar_first_visit=1480533616; __utma=138229305.716135822.1480562425.1480562425.1480642400.2; __utmz=138229305.1480562425.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=eevee4b99frk0rhaaiobqqef71', 'http://xs.com/a/web.php', 'http://xs.com/a/web.php', '', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1481189637', '0', 'xs.com');
INSERT INTO `tu_message` VALUES ('275', '__atuvc=423%7C35%2C13%7C36%2C22%7C37%2C160%7C38%2C38%7C39; CNZZDATA5893770=cnzz_eid%3D1229189288-1480321606-%26ntime%3D1480325750; Hm_lvt_b61318fa81cbff0aa55cdec79ac5ef4c=1480328820,1480402364; Hm_lvt_85541ca621844a7003343ff1122a2052=1480328820,14804', 'http://localhost:63342/hook/test.html?_ijt=n2jmd262jfbo7tbboc5sq6ujpa', 'http://localhost:63342/hook/test.html?_ijt=n2jmd262jfbo7tbboc5sq6ujpa', '', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '1481188888', '0', 'localhost');
INSERT INTO `tu_message` VALUES ('277', 'pgv_pvi=2810585088; it_boombar_first_visit=1480533616; __utma=138229305.716135822.1480562425.1480562425.1480642400.2; __utmz=138229305.1480562425.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=eevee4b99frk0rhaaiobqqef71', 'http://xs.com/a/web.php', 'http://xs.com/a/web.php', '', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1481189635', '0', 'xs.com');
INSERT INTO `tu_message` VALUES ('276', 'pgv_pvi=2810585088; it_boombar_first_visit=1480533616; __utma=138229305.716135822.1480562425.1480562425.1480642400.2; __utmz=138229305.1480562425.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); PHPSESSID=eevee4b99frk0rhaaiobqqef71', 'http://xs.com/a/web.php', 'http://xs.com/a/web.php', '', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36', '1481189632', '0', 'xs.com');
