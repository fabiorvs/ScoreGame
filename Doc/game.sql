-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.5.21-MariaDB-0+deb11u1 - Debian 11
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela game_gui.scores
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `todosdias` varchar(15) DEFAULT NULL,
  `game` varchar(100) DEFAULT NULL,
  `pontuacao` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `atual` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Copiando dados para a tabela game_gui.scores: ~20 rows (aproximadamente)
INSERT INTO `scores` (`id`, `nome`, `email`, `telefone`, `todosdias`, `game`, `pontuacao`, `data`, `atual`, `created_at`, `update_at`, `deleted_at`) VALUES
	(1, 'Fulano', 'fulano@email.com', '11999999999', 'Sim', 'PacMan', 1000, '2023-11-26 16:51:12', 1, '2023-11-26 13:51:12', '2023-11-26 14:01:46', NULL),
	(2, 'Fulano 2', 'fulano2@email.com', '11999999999', 'Sim', 'PacMan', 1001, '2023-11-26 16:51:25', 1, '2023-11-26 13:51:25', '2023-11-26 14:01:49', NULL),
	(3, 'Fulano 3', 'fulano3@email.com', '11999999999', 'Não', 'PacMan', 100, '2023-11-26 16:51:34', 1, '2023-11-26 13:51:34', '2023-11-26 14:01:52', NULL),
	(4, 'Fulano 4', 'fulano4@email.com', '11999999999', 'Não', 'PacMan', 200, '2023-11-26 16:53:32', 1, '2023-11-26 13:53:32', '2023-11-26 14:01:54', NULL),
	(5, 'Fulano 5', 'fulano5@email.com', '11999999999', 'Sim', 'PacMan', 2000, '2023-11-26 17:05:44', 1, '2023-11-26 14:05:44', '2023-11-26 14:09:14', NULL),
	(6, 'Fulano 6', 'fulano6@email.com', '11999999999', 'Não', 'PacMan', 2001, '2023-11-26 17:06:22', 1, '2023-11-26 14:06:22', '2023-11-26 14:09:16', NULL),
	(7, 'Fulano 7', 'fulano7@email.com', '11999999999', 'Sim', 'PacMan', 2004, '2023-11-26 17:08:34', 1, '2023-11-26 14:08:34', '2023-11-26 14:23:04', NULL),
	(8, 'Fulano 8', 'fulano8@email.com', '11999999999', 'Sim', 'PacMan', 2002, '2023-11-26 17:10:11', 1, '2023-11-26 14:10:11', NULL, NULL),
	(9, 'Fulano 9', 'fulano9@email.com', '11999999999', 'Sim', 'PacMan', 2003, '2023-11-26 17:11:02', 1, '2023-11-26 14:11:02', NULL, NULL),
	(10, 'Fulano 10', 'fulano10@email.com', '11999999999', 'Sim', 'PacMan', 2500, '2023-11-26 17:12:24', 1, '2023-11-26 14:12:24', NULL, NULL),
	(11, 'Fulano 11', 'fulano11@email.com', '11999999999', 'Sim', 'PacMan', 2501, '2023-11-26 17:12:49', 1, '2023-11-26 14:12:49', NULL, NULL),
	(12, 'Fulano 12', 'fulano12@email.com', '11999999999', 'Sim', 'PacMan', 2502, '2023-11-26 17:13:02', 1, '2023-11-26 14:13:02', NULL, NULL),
	(13, 'Fulano 1', 'fulano1@email.com', '11999999999', 'Sim', 'Navinha', 2502, '2023-11-26 17:13:22', 1, '2023-11-26 14:13:22', NULL, NULL),
	(14, 'Fulano 1', 'fulano1@email.com', '11999999999', 'Sim', 'Enduro', 2502, '2023-11-26 17:13:38', 1, '2023-11-26 14:13:38', NULL, NULL),
	(15, 'Fulano 2', 'fulano2@email.com', '11999999999', 'Sim', 'Enduro', 2600, '2023-11-26 17:13:50', 1, '2023-11-26 14:13:50', NULL, NULL),
	(16, 'Fulano 3', 'fulano3@email.com', '11999999999', 'Sim', 'Enduro', 2601, '2023-11-26 17:24:58', 1, '2023-11-26 14:24:58', NULL, NULL),
	(17, 'Fulano 13', 'fulano13@email.com', '11999999999', 'Sim', 'PacMan', 3001, '2023-11-26 19:10:20', 0, '2023-11-26 16:10:20', '2023-11-26 19:39:43', NULL),
	(18, 'Fulano 13', 'fulano13@email.com', '11999999999', 'Sim', 'PacMan', 3002, '2023-11-26 22:39:43', 0, '2023-11-26 19:39:43', '2023-11-26 19:41:00', NULL),
	(19, 'Fulano 13', 'fulano13@email.com', '11999999999', 'Sim', 'PacMan', 3003, '2023-11-26 22:41:00', 0, '2023-11-26 19:41:00', '2023-11-26 19:42:09', NULL),
	(20, 'Fulano 13', 'fulano13@email.com', '11999999999', 'Sim', 'PacMan', 3004, '2023-11-26 22:42:09', 0, '2023-11-26 19:42:09', '2023-11-26 19:55:18', NULL),
	(21, 'Fulano 13', 'fulano13@email.com', '11999999999', 'Sim', 'PacMan', 3005, '2023-11-26 22:55:18', 0, '2023-11-26 19:55:18', '2023-11-26 19:55:32', NULL),
	(22, 'Fulano 13', 'fulano13@email.com', '11999999999', 'Sim', 'PacMan', 3005, '2023-11-26 22:55:23', 0, '2023-11-26 19:55:23', NULL, NULL),
	(23, 'Fulano 13', 'fulano13@email.com', '11999999999', 'Sim', 'PacMan', 3004, '2023-11-26 22:55:28', 0, '2023-11-26 19:55:28', NULL, NULL),
	(24, 'Fulano 13', 'fulano13@email.com', '11999999999', 'Sim', 'PacMan', 3010, '2023-11-26 22:55:32', 1, '2023-11-26 19:55:32', NULL, NULL),
	(25, 'Fulano 14', 'fulano14@email.com', '11999999999', 'Sim', 'PacMan', 3011, '2023-11-26 22:55:39', 1, '2023-11-26 19:55:39', NULL, NULL),
	(26, 'Fulano 14', 'fulano14@email.com', '11999999999', 'Sim', 'PacMan', 301, '2023-11-26 22:55:47', 0, '2023-11-26 19:55:47', NULL, NULL),
	(27, 'Fulano 1', 'fulano1@email.com', '11999999999', 'Sim', 'PacMan', 301, '2023-11-26 22:57:27', 1, '2023-11-26 19:57:27', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
