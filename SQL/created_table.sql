-- Adminer 4.8.1 MySQL 11.1.1-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `test_special_characters` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `test_special_characters`;

DROP TABLE IF EXISTS `test_special_characters`;
CREATE TABLE `test_special_characters` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `special_characters` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 2024-02-16 08:01:44