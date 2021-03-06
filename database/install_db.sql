CREATE DATABASE IF NOT EXISTS `mydb`;

USE `mydb`;

-- ----------------------------
-- Table structure for products
-- ----------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX id_UNIQUE (id ASC)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
