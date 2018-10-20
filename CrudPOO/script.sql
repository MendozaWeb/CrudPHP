

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para personas
CREATE DATABASE IF NOT EXISTS `personas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `personas`;

-- Volcando estructura para tabla personas.informacion
CREATE TABLE IF NOT EXISTS `informacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `pais` varchar(50) NOT NULL DEFAULT '0',
  `edad` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla personas.informacion: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `informacion` DISABLE KEYS */;
INSERT INTO `informacion` (`id`, `nombre`, `pais`, `edad`) VALUES
	(3, 'Esteban', 'Chile', '32'),
	(4, 'Carlos', 'Ecuador', '20'),
	(5, 'Manuel', 'Argentina', '18'),
	(6, 'María', 'Uruguay', '45'),
	(7, 'Mónica', 'Costa Rica', '19'),
	(8, 'Gabriela', 'Nicaragua', '28'),
	(9, 'Jesús Manuel', 'Colombia', '19'),
	(10, 'Viviana', 'Perú', '27'),
	(11, 'Julián', 'Colombia', '15'),
	(12, 'Natalia', 'Ecuador', '25'),
	(13, 'Eva', 'USA', '36'),
	(14, 'Sandra', 'Chile', '15'),
	(15, 'Luis', 'Panamá', '21'),
	(16, 'Mauro', 'Perú', '26'),
	(17, 'Estefanía R', 'Venezuela', '35'),
	(18, 'Alicia Machado', 'México', '21'),
	(19, 'Joseling', 'Nicaragüa', '22'),
	(20, 'Bernardo', 'Colombia', '24'),
	(21, 'Ignacio', 'Panamá', '45'),
	(23, 'Paulina', 'Colombia', '24');
/*!40000 ALTER TABLE `informacion` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
