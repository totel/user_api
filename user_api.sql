# ************************************************************
# Sequel Pro SQL dump
# Versión 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.17)
# Base de datos: user_api
# Tiempo de Generación: 2019-03-18 09:00:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla api_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `api_users`;

CREATE TABLE `api_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3016F139F85E0677` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `api_users` WRITE;
/*!40000 ALTER TABLE `api_users` DISABLE KEYS */;

INSERT INTO `api_users` (`id`, `name`, `username`, `password`, `roles`)
VALUES
	(8,'Admin','admin','$2y$13$nPXXzVPz5j5I1jTzBoByI.js4FDhE3mwA6Xeq8c.gjKZBsht1QySu','ROLE_ADMIN'),
	(9,'User1','user1','$2y$13$QzTENiDek.D/aWgjUGy9QOrxm/piXsNmg.j3G2b9FS4RVF8ZPs9Hu','ROLE_PAGE1'),
	(10,'User2','user2','$2y$13$MsStK8/KP8JLvrmPIvZxMuWbpWeS.BmIPY4fpp.yLC7cf4G8h7b3W','ROLE_PAGE2'),
	(11,'User3','user3','$2y$13$V.zZ9nZg5GfCWpQUCdmcROiA8qy4jd7vnJS26YFXbYJbKAXAEGHby','ROLE_USER');

/*!40000 ALTER TABLE `api_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
