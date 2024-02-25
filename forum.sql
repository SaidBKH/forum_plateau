-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Listage de la structure de table forum. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 

-- Listage des données de la table forum.category : ~0 rows (environ)
INSERT INTO `category` (`id_category`, `name`) VALUES
	(1, 'Informatique'),
	(2, 'Musique'),
	(3, 'Sport'),
	(4, 'Cuisine'),
	(5, 'Mode');

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `text` varchar(50) DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `topic_id` int DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `user_id` (`user_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table forum.post : ~0 rows (environ)
INSERT INTO `post` (`id_post`, `text`, `creationDate`, `user_id`, `topic_id`) VALUES
	(1, 'Bonjourmon...', '2024-02-23', 1, 1),
	(2, 'Qui est excité po', '2024-02-23', 2, 2),
	(3, 'Voici ma recette préférée de la.', '2024-02-23', 4, 4),
	(4, 'Je suis à la recherche des dernières ', '2024-02-23', 5, 5),
	(6, 'rien', '2024-02-23', 3, 3),
	(7, 'Voici ma recette préférée de la.', '2024-02-23', 4, 4),
	(8, 'Je suis à la recherche des dernières ', '2024-02-23', 5, 5);

-- Listage de la structure de table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `closed` varchar(50) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.topic : ~0 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `closed`, `user_id`, `category_id`) VALUES
	(1, 'Discussion sur Python', '2023-05-10', 'Non', 1, 1),
	(2, 'Concert de rock', '2023-06-15', 'Non', 2, 2),
	(3, 'Entraînement de foot', '2023-07-20', 'Non', 3, 3),
	(4, 'Recette de lasagnes', '2023-08-25', 'Non', 4, 4),
	(5, 'Nouvelles tendances de mode', '2023-09-30', 'Non', 5, 5);

-- Listage de la structure de table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.user : ~6 rows (environ)
INSERT INTO `user` (`id_user`, `nickname`, `email`, `role`, `password`) VALUES
	(1, 'john_doe', 'john.doe@example.com', 'Utilisateur', 'motdepasse1'),
	(2, 'jane_smith', 'jane.smith@example.com', 'Modérateur', 'motdepasse2'),
	(3, 'bob_jones', 'bob.jones@example.com', 'Administrateur', 'motdepasse3'),
	(4, 'alice_williams', 'alice.williams@example.com', 'Utilisateur', 'motdepasse4'),
	(5, 'sam_brown', 'sam.brown@example.com', 'Modérateur', 'motdepasse5'),
	(16, 'micka', 'micka@exemple.com', 'Utilisateur', '$2y$10$1HV.CV1xLmb5f/hp8fl2MepQIDgOnjg4f/11dPRjFjoPSNW8CuVZ2');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
