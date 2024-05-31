-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.30 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных project
CREATE DATABASE IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `project`;

-- Дамп структуры для таблица project.comments_dolls
CREATE TABLE IF NOT EXISTS `comments_dolls` (
  `idcomments` int NOT NULL AUTO_INCREMENT,
  `user` int DEFAULT NULL,
  `comm` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `doll` int DEFAULT NULL,
  PRIMARY KEY (`idcomments`),
  KEY `user1_idx` (`user`),
  KEY `doll1_idx` (`doll`),
  CONSTRAINT `doll1` FOREIGN KEY (`doll`) REFERENCES `dolls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user1` FOREIGN KEY (`user`) REFERENCES `users` (`idusers`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы project.comments_dolls: ~0 rows (приблизительно)

-- Дамп структуры для таблица project.comments_dress
CREATE TABLE IF NOT EXISTS `comments_dress` (
  `idcomments_dress` int NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `comm` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dress` int DEFAULT NULL,
  PRIMARY KEY (`idcomments_dress`),
  KEY `user2_idx` (`user`),
  KEY `dress1_idx` (`dress`),
  CONSTRAINT `dress1` FOREIGN KEY (`dress`) REFERENCES `dress` (`iddress`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user2` FOREIGN KEY (`user`) REFERENCES `users` (`idusers`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы project.comments_dress: ~0 rows (приблизительно)

-- Дамп структуры для таблица project.dolls
CREATE TABLE IF NOT EXISTS `dolls` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы project.dolls: ~18 rows (приблизительно)
REPLACE INTO `dolls` (`id`, `description`, `date`, `image`, `type`) VALUES
	(1, '17см, ручки и ножки подвижные, голова поворачивается и наклоняется в любую сторону.', '2024-05-24', '/project/images/Куклы/1.jpg', 'doll'),
	(2, '17см, ручки и ножки подвижные, голова поворачивается и наклоняется в любую сторону. Волосы искусственные', '2024-05-24', '/project/images/Куклы/2.jpg', 'doll'),
	(4, 'Паола Рейна', '2024-05-24', '/project/images/Одежда/1.jpg', 'dress'),
	(5, 'Паола Рейна', '2024-05-24', '/project/images/Одежда/2.jpg', 'dress'),
	(6, 'Паола Рейна', '2024-05-24', '/project/images/Одежда/3.jpg', 'dress'),
	(9, 'Паола Рейна', '2024-05-24', '/project/images/Одежда/4.jpg', 'dress'),
	(10, 'Паола Рейна', '2024-05-24', '/project/images/Одежда/5.jpg', 'dress'),
	(11, 'Паола Рейна мини', '2024-05-24', '/project/images/Одежда/6.jpg', 'dress'),
	(12, 'Паола Рейна мини', '2024-05-24', '/project/images/Одежда/7.jpg', 'dress'),
	(13, 'Паола Рейна', '2024-05-24', '/project/images/Одежда/8.jpg', 'dress'),
	(14, 'Паола Рейна мини', '2024-05-24', '/project/images/Одежда/9.jpg', 'dress'),
	(15, 'Паола Рейна', '2024-05-24', '/project/images/Одежда/10.jpg', 'dress'),
	(16, '17см, ручки и ножки подвижные, голова поворачивается и наклоняется в любую сторону. Волосы натуральные (ангорская козочка)', '2024-05-24', '/project/images/Куклы/4.jpg', 'doll'),
	(17, '17см, ручки и ножки подвижные, голова поворачивается и наклоняется в любую сторону. Волосы натуральные (ангорская козочка)', '2024-05-24', '/project/images/Куклы/5.jpg', 'doll'),
	(18, '17см, ручки и ножки подвижные, голова поворачивается и наклоняется в любую сторону. Волосы натуральные (ангорская козочка)', '2024-05-24', '/project/images/Куклы/6.jpg', 'doll'),
	(19, '17см, ручки и ножки подвижные, голова поворачивается и наклоняется в любую сторону. Волосы натуральные (ангорская козочка)', '2024-05-24', '/project/images/Куклы/7.jpg', 'doll'),
	(21, '17см, ручки и ножки подвижные, голова поворачивается и наклоняется в любую сторону. Волосы искусственные', '2024-05-24', '/project/images/Куклы/9.jpg', 'doll'),
	(22, '17см, ручки и ножки подвижные, голова поворачивается и наклоняется в любую сторону. Волосы натуральные (ангорская козочка)', '2024-05-24', '/project/images/Куклы/10.jpg', 'doll');

-- Дамп структуры для таблица project.users
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `paswd` varchar(45) DEFAULT NULL,
  `index_admin` int DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы project.users: ~3 rows (приблизительно)
REPLACE INTO `users` (`idusers`, `name`, `mail`, `paswd`, `index_admin`) VALUES
	(1, '1', '1', '1', 1),
	(2, '2', '2', '2', 0),
	(3, '3', '3@3', '3', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
