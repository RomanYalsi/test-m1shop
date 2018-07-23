-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.26 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for m1-shop.blog
CREATE DATABASE IF NOT EXISTS `m1-shop.blog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `m1-shop.blog`;

-- Dumping structure for table m1-shop.blog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` longtext NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table m1-shop.blog.posts: ~2 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `body`, `createdDate`, `image`) VALUES
	(4, 'Dr. Elda Bashirian PhD', 'Дытракжйт толлйт ыёюз дытракжйт конгуы. Мыа тота дёзсэнтёаш шэа кюм мацим. Еюж альиквуандо апэриам эжт.', '2018-07-23 16:10:05', '1079260.jpg'),
	(5, 'Порфирий Воробьев', 'Consequuntur nostrum qui totam fugiat eum. Blanditiis quis ut omnis in odit. Praesentium quia voluptas ut ea. Eveniet nesciunt eum aut alias.', '2018-07-23 16:27:15', '124003905855.jpg');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
