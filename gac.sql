-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour gac
CREATE DATABASE IF NOT EXISTS `gac` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gac`;

-- Listage de la structure de la table gac. detail_appels
CREATE TABLE IF NOT EXISTS `detail_appels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpt_facture` varchar(50) NOT NULL,
  `n_facture` varchar(50) NOT NULL,
  `n_abonne` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `duree_vlm_reel` varchar(50) DEFAULT NULL,
  `duree_vlm_fac` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131071 DEFAULT CHARSET=latin1 COMMENT='cpt_facture,n_facture,n_abonne,@date,heure,duree_vlm_reel,duree_vlm_fac,type';

-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
