-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Servidor: db623787019.db.1and1.com
-- Tiempo de generación: 21-09-2016 a las 15:53:12
-- Versión del servidor: 5.5.50-0+deb7u2-log
-- Versión de PHP: 5.4.45-0+deb7u5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db623787019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `achievement`
--

CREATE TABLE IF NOT EXISTS `achievement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_spanish_ci NOT NULL,
  `url` text COLLATE latin1_spanish_ci NOT NULL,
  `description` text COLLATE latin1_spanish_ci NOT NULL,
  `condition` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `achievement`
--

INSERT INTO `achievement` (`id`, `name`, `url`, `description`, `condition`) VALUES
(1, 'Anillo único ', '/img/achievement/anillo.png', 'Los Anillos de Poder son joyas mágicas ficticias que aparecen en las obras que escribió J. R. R. Tolkien acerca de la Tierra Media, en particular, en su trilogía de la novela El Señor de los Anillos, la cual en una de ellas, el Anillo Único, cumple un papel esencial en la narración.', 'Consigue más puntos que nadie de tu clase un día'),
(2, 'Botas de amstrong', '/img/achievement/botas.png', 'Neil Amstrong fue un astronauta estadounidense y el primer ser humano que pisó la Luna.', 'Completa la misión de Neil Armstrong.'),
(4, 'Corona de Isabel I', '/img/achievement/corona.png', 'Isabel I de Castilla fue reina de Castillaa desde 1474 hasta 1504. Es llamada «la Católica», título que les fue otorgado a ella y a su marido por el papa Alejandro VI mediante la bula ''Si convenit'', el 19 de diciembre de 1496. Es por lo que se conoce a la pareja real con el nombre de Reyes Católicos, título que usarían en adelante prácticamente todos los reyes de España.', 'Resuelve una ecuación muy difícil con al menos 6 términos.'),
(5, 'La pólvora', '/img/achievement/dinamita.png', 'La pólvora fue inventada en China cuando los taoístas intentaban crear una poción para la inmortalidad.', 'Resuelve una ecuación de dificultad media con al menos 4 términos'),
(6, 'El dinero', '/img/achievement/dinero.png', 'Las primeras monedas acuñadas con carácter oficial fueron hechas en Lidia, (hoy Turquía), un pueblo de Asia Menor, aproximadamente entre los años 680 y 560 a. C. ', 'Completa una unidad didáctica'),
(7, 'Excalibur', '/img/achievement/espada.png', 'Excálibur es el nombre de la espada legendaria del Rey Arturo', 'Gana un duelo'),
(8, 'El fuego', '/img/achievement/fuego.png', 'El descubrimiento del fuego es uno de los hechos más importantes en la historia de la humanidad, ya que nos ha permitido evolucionar hasta lo que hoy somos y desarrollar nuestra inteligencia. En la actualidad se sabe que el Hombre descubrió el fuego hace 790.000 años.', 'Entra en un aula'),
(9, 'El diario de Darwin', '/img/achievement/libro.png', 'Escrito durante el Viaje del Beagle. El joven Darwin dedicó la mayor parte de su tiempo a investigaciones geológicas en tierra firme y a recopilar ejemplares de animales. De este diario aparecería el libro ''El origen de las especies''.', 'Mira el perfil de un compañero de aula'),
(10, 'Penicilina', '/img/achievement/penicilina.png', 'Las penicilinas son antibióticos empleados profusamente en el tratamiento de infecciones provocadas por bacterias sensibles. Su descubrimiento ha sido atribuido a Alexander Fleming en 1928.', 'Resuelve tu primera ecuación'),
(11, 'Queso', '/img/achievement/queso.png', 'La palabra queso procede del latín ''caseus'' y para los antiguos griegos el queso era un regalo de los dioses.', 'Alcanza el nivel 5'),
(12, 'El reloj de Hafele-Keating', '/img/achievement/reloj.png', 'En octubre de 1971, cuatro relojes de haces atómicos de cesio, dieron dos veces la vuelta al mundo en vuelos regulares de aviones comerciales, una vez hacia el Este y otra vez hacia el Oeste, para probar la teoría de la relatividad de Einstein con relojes macroscópicos', 'Cambia de avatar'),
(13, 'Telescopio de Galileo', '/img/achievement/telescopio.png', 'Se denomina telescopio al instrumento óptico que permite ver objetos lejanos con mucho más detalle que a simple vista. Gracias al telescopio —desde que Galileo Galilei en 1610 lo usó para mirar la Luna, el planeta Júpiter y las estrellas— el ser humano pudo, por fin, empezar a conocer la verdadera naturaleza de los cuerpos celestes que nos rodean y nuestra ubicación en el universo.', 'Completa un ejercicio en cooperativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avatar`
--

CREATE TABLE IF NOT EXISTS `avatar` (
  `name` text COLLATE latin1_spanish_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text COLLATE latin1_spanish_ci NOT NULL,
  `experienceRequirement` float NOT NULL,
  `random` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=120 ;

--
-- Volcado de datos para la tabla `avatar`
--

INSERT INTO `avatar` (`name`, `id`, `url`, `experienceRequirement`, `random`) VALUES
('apu', 4, '/img/avatar/apu.png', 0, 0),
('bart', 5, '/img/avatar/bart.png', 4637.59, 0),
('batman', 6, '/img/avatar/batman.png', 0, 1),
('blanka', 7, '/img/avatar/blanka.png', 0, 1),
('bobba', 8, '/img/avatar/bobba.png', 1779.04, 0),
('bomberman', 9, '/img/avatar/bomberman.png', 0, 0),
('bowser', 10, '/img/avatar/bowser.png', 0, 1),
('c3po', 11, '/img/avatar/c3po.png', 75.76, 0),
('calimero', 12, '/img/avatar/calimero.png', 0, 1),
('chewbacca', 14, '/img/avatar/chewbacca.png', 75.76, 0),
('comandateclon', 15, '/img/avatar/comandanteclon.png', 75.76, 0),
('comandanteimperial', 16, '/img/avatar/comandanteimperial.png', 626.24, 0),
('daredevil', 17, '/img/avatar/daredevil.png', 0, 0),
('duke', 18, '/img/avatar/duke.png', 4637.59, 0),
('ezzio', 19, '/img/avatar/ezzio.png', 0, 1),
('flanders', 20, '/img/avatar/flanders.png', 0, 0),
('flash', 21, '/img/avatar/flash.png', 626.24, 0),
('freeman', 22, '/img/avatar/freeman.png', 0, 0),
('gadget', 23, '/img/avatar/gadget.png', 0, 0),
('goku', 24, '/img/avatar/goku.png', 0, 1),
('guille', 25, '/img/avatar/guille.png', 0, 1),
('han', 26, '/img/avatar/han.png', 0, 0),
('homer', 27, '/img/avatar/homer.png', 0, 1),
('hulk', 28, '/img/avatar/hulk.png', 75.76, 0),
('ironman', 29, '/img/avatar/ironman.png', 0, 0),
('james', 30, '/img/avatar/james.png', 0, 0),
('jefemaestro', 31, '/img/avatar/jefemaestro.png', 626.24, 0),
('lamasa', 32, '/img/avatar/lamasa.png', 626.24, 0),
('lando', 33, '/img/avatar/lando.png', 75.76, 0),
('leia', 34, '/img/avatar/leia.png', 626.24, 0),
('link', 35, '/img/avatar/link.png', 0, 1),
('naruto', 51, '/img/avatar/naruto.png', 0, 1),
('obiwan', 52, '/img/avatar/obiwan.png', 1779.04, 0),
('oficial', 53, '/img/avatar/oficial.png', 626.24, 0),
('osorojo', 57, '/img/avatar/osorojo.png', 0, 0),
('osorosa', 58, '/img/avatar/osorosa.png', 0, 0),
('pacman', 59, '/img/avatar/pacman.png', 0, 0),
('pilot', 60, '/img/avatar/pilot.png', 75.76, 0),
('pirata', 61, '/img/avatar/pirata.png', 1779.04, 0),
('r2d2', 62, '/img/avatar/r2d2.png', 0, 1),
('yoda', 119, '/img/avatar/yoda.png', 4637.59, 0),
('sonic', 67, '/img/avatar/sonic.png', 0, 1),
('windu', 117, '/img/avatar/windu.png', 1779.04, 0),
('spock', 69, '/img/avatar/spock.png', 0, 0),
('stuart', 70, '/img/avatar/stuart.png', 4637.59, 0),
('superman', 71, '/img/avatar/superman.png', 4637.59, 0),
('trooper', 114, '/img/avatar/trooper.png', 0, 0),
('linternaverde', 76, '/img/avatar/linternaverde.png', 75.76, 0),
('lisa', 77, '/img/avatar/lisa.png', 0, 1),
('lobezno', 78, '/img/avatar/lobezno.png', 4637.59, 0),
('luigi', 79, '/img/avatar/luigi.png', 626.24, 0),
('luke', 80, '/img/avatar/luke.png', 0, 1),
('magneto', 81, '/img/avatar/magneto.png', 626.24, 0),
('marge', 82, '/img/avatar/marge.png', 75.76, 0),
('mario', 83, '/img/avatar/mario.png', 4637.59, 0),
('marsupilami', 84, '/img/avatar/marsupilami.png', 0, 1),
('maul', 85, '/img/avatar/maul.png', 4637.59, 0),
('medieval', 86, '/img/avatar/medieval.png', 75.76, 0),
('megaman', 87, '/img/avatar/megaman.png', 75.76, 0),
('metroid', 88, '/img/avatar/metroid.png', 75.76, 0),
('mike', 89, '/img/avatar/mike.png', 626.24, 0),
('minecraft', 90, '/img/avatar/minecraft.png', 4637.59, 0),
('osoamarillo', 94, '/img/avatar/osoamarillo.png', 0, 0),
('osoazul', 95, '/img/avatar/osoazul.png', 0, 0),
('osonaranja', 96, '/img/avatar/osonaranja.png', 0, 0),
('rabbid', 103, '/img/avatar/rabbid.png', 1779.04, 0),
('robin', 104, '/img/avatar/robin.png', 626.24, 0),
('seath', 106, '/img/avatar/seath.png', 0, 1),
('xiunli', 118, '/img/avatar/xiunli.png', 626.24, 0),
('spiderman', 108, '/img/avatar/spiderman.png', 4637.59, 0),
('vaquero', 116, '/img/avatar/vaquero.png', 1779.04, 0),
('vader', 115, '/img/avatar/vader.png', 0, 1),
('tortuga', 113, '/img/avatar/tortuga.png', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classroom`
--

CREATE TABLE IF NOT EXISTS `classroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_spanish_ci NOT NULL,
  `code` varchar(6) COLLATE latin1_spanish_ci NOT NULL,
  `description` text COLLATE latin1_spanish_ci,
  `teacher` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `classroom`
--

INSERT INTO `classroom` (`id`, `name`, `code`, `description`, `teacher`) VALUES
(2, 'probando', 'ihgkQz', '', 'profesor'),
(6, 'Prueba', 'K8mh7o', 'prueba', 'profesor'),
(8, 'Prueba 2', 'iDF97M', 'prueba2', 'profesor'),
(9, 'PRI', 'ExqDXl', '', 'profesor'),
(10, '2B', 'Ya1SG8', '', 'paco'),
(11, '3A eso', 'WQZRs4', '', 'paco'),
(12, '2ºA', 'MycUCo', 'Aula para los alumnos de 2ºA', 'profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classroom_didactic`
--

CREATE TABLE IF NOT EXISTS `classroom_didactic` (
  `classroom_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `unit_id` int(11) NOT NULL,
  `step` int(11) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `tries` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`classroom_id`,`username`,`unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `classroom_didactic`
--

INSERT INTO `classroom_didactic` (`classroom_id`, `username`, `unit_id`, `step`, `visible`, `tries`, `time`) VALUES
(11, 'irene', 1, 7, 1, 5, 230),
(10, 'ainara', 1, 0, 1, 0, 0),
(11, 'eric', 1, 6, 1, 1, 150),
(11, 'nieves1', 1, 0, 1, 0, 0),
(10, 'lola', 1, 7, 1, 1, 100),
(2, 'adri', 1, 7, 1, 0, 308);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classroom_equation`
--

CREATE TABLE IF NOT EXISTS `classroom_equation` (
  `classroom_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `equation` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `mode` int(11) NOT NULL,
  `terms` int(11) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `experience` float NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`classroom_id`,`username`,`equation`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `classroom_equation`
--

INSERT INTO `classroom_equation` (`classroom_id`, `username`, `equation`, `mode`, `terms`, `done`, `experience`, `timestamp`) VALUES
(10, 'ainara', 'x-10+x=x', 0, 4, 0, 0, '2016-06-08 07:20:15'),
(10, 'ainara', '3+7=x+x', 0, 4, 0, 0, '2016-06-08 07:20:17'),
(10, 'ainara', '-x+9+5=-2', 0, 4, 1, 0, '2016-06-08 07:20:19'),
(10, 'ainara', '13x+27=14x', 1, 3, 0, 0, '2016-06-08 07:20:29'),
(10, 'ainara', '19x+30=21x', 1, 3, 0, 0, '2016-06-08 07:20:31'),
(10, 'ainara', '14x=15x-28', 1, 3, 0, 0, '2016-06-08 07:20:34'),
(10, 'ainara', '-3=-x', 0, 2, 0, 0, '2016-06-16 17:05:20'),
(10, 'ainara', '-x=-3', 0, 2, 0, 0, '2016-06-16 17:05:27'),
(10, 'ainara', '-x=-10', 0, 2, 0, 0, '2016-06-16 17:05:31'),
(10, 'ainara', '-x=-2', 0, 2, 0, 0, '2016-06-16 17:05:40'),
(10, 'ainara', '-5=-x', 0, 2, 0, 0, '2016-06-16 17:05:58'),
(10, 'ainara', '2x=10', 0, 2, 0, 0, '2016-06-16 17:06:07'),
(10, 'ainara', '-x+3=-3', 0, 3, 0, 0, '2016-06-16 17:06:18'),
(10, 'ainara', '12-x=x', 0, 3, 0, 0, '2016-06-16 17:06:25'),
(10, 'ainara', '-1=-x+5', 0, 3, 0, 0, '2016-06-16 17:06:29'),
(11, 'eric', '-x=-4', 0, 2, 0, 0, '2016-06-16 17:10:56'),
(11, 'eric', '2x=6', 0, 2, 0, 0, '2016-06-16 17:10:57'),
(11, 'eric', '-3=-x', 0, 2, 1, 0, '2016-06-16 17:10:58'),
(11, 'eric', '4=2x', 0, 2, 0, 0, '2016-06-16 17:10:59'),
(11, 'eric', '10=2x', 0, 2, 0, 0, '2016-06-16 17:11:00'),
(11, 'eric', '3x=9', 0, 2, 0, 0, '2016-06-16 17:11:00'),
(11, 'eric', '-2x=-8', 0, 2, 1, 0, '2016-06-16 17:11:00'),
(11, 'eric', '-8=-x', 0, 2, 1, 0, '2016-06-16 17:11:00'),
(11, 'eric', '9-x=1', 0, 3, 0, 0, '2016-06-16 17:30:35'),
(11, 'eric', '5-x=-2', 0, 3, 0, 0, '2016-06-16 17:30:36'),
(11, 'eric', '3+3-1-x=-1', 0, 5, 0, 0, '2016-06-16 17:30:59'),
(11, 'eric', '5+12=4+2x-3', 0, 5, 0, 0, '2016-06-16 17:31:16'),
(11, 'eric', '2x+5+x=-5+4x', 0, 5, 0, 0, '2016-06-16 17:31:18'),
(2, 'adri', '-3+1=5-x-4+4', 0, 6, 0, 0, '2016-06-20 10:45:55'),
(2, 'adri', '-9=-x', 0, 2, 1, 0, '2016-06-20 10:46:30'),
(2, 'adri', '-193=-71x', 4, 2, 0, 0, '2016-06-20 10:46:48'),
(2, 'adri', '-135-175-195+50x-117x=96x-84x-118x', 4, 8, 0, 0, '2016-06-20 10:46:50'),
(2, 'adri', '-75+191x=109x+133x-193-116x-101x+168x', 4, 8, 1, 0, '2016-06-20 10:46:55'),
(2, 'adri', '2x=4', 0, 2, 0, 0, '2016-06-26 17:17:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `didactic_unit`
--

CREATE TABLE IF NOT EXISTS `didactic_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `didactic_unit`
--

INSERT INTO `didactic_unit` (`id`, `name`) VALUES
(1, 'Unidad didáctica 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equation`
--

CREATE TABLE IF NOT EXISTS `equation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `equation` text COLLATE latin1_spanish_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nterms` int(11) NOT NULL,
  `mode` int(11) NOT NULL,
  `tries` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `experience` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `equation`
--

INSERT INTO `equation` (`id`, `username`, `equation`, `timestamp`, `nterms`, `mode`, `tries`, `time`, `experience`) VALUES
(1, 'alu', '2x=6', '2016-05-23 19:33:18', 2, 0, 1, 3, 32),
(2, 'alu', '153x-61x-115x=151x-150', '2016-05-23 19:33:40', 5, 4, 1, 6, 55),
(3, 'alu', '198x-133=181x', '2016-05-23 19:48:46', 3, 4, 1, 3, 45),
(4, 'sonia', '43x+63+87=44x-54', '2016-05-24 12:47:25', 5, 2, 1, 2, 90),
(5, 'sonia', '45x-39=44x+96', '2016-05-24 12:47:34', 4, 2, 1, 2, 87),
(6, 'sonia', '-27x+81=-48-24x', '2016-05-24 12:48:51', 4, 2, 1, 3, 87),
(7, 'sonia', '152=-154-175+99x', '2016-05-24 16:13:08', 4, 4, 1, 3, 120),
(8, 'sonia', '104-100x=-127-196', '2016-05-24 16:13:33', 4, 4, 1, 2, 120),
(9, 'sonia', '173x=167x-94-191-134+164x', '2016-05-24 16:13:53', 6, 4, 1, 8, 135),
(10, 'sonia', '-200-198=96x-111x', '2016-05-24 16:24:36', 4, 4, 1, 6, 125),
(11, 'sonia', '-171=109x-127x+136', '2016-05-24 16:24:45', 4, 4, 1, 3, 125),
(12, 'sonia', '131+168+45x=76+88x-59', '2016-05-24 16:28:21', 6, 3, 1, 2, 129),
(13, 'sonia', '-74x+167-37x=-119', '2016-05-24 16:28:30', 4, 4, 1, 2, 125),
(14, 'borjaruam', '-3=-x', '2016-05-24 18:34:48', 2, 0, 1, 1, 17),
(15, 'adri', '-42x+126+151=-26x-64', '2016-05-25 20:19:00', 5, 3, 1, 3, 30),
(16, 'adri', '3=-3+x', '2016-05-27 00:10:01', 3, 0, 2, 14, 71.5),
(17, 'borjaruam', '-89x-56x=-55x-126x+198x-169', '2016-05-27 11:04:35', 6, 4, 1, 6, 50),
(18, 'borjaruam', '13x+49=14x', '2016-05-28 13:23:00', 3, 1, 1, 4, 26),
(19, 'adri', '-x=-7', '2016-06-07 19:00:31', 2, 0, 1, 2, 77),
(20, 'alexia', '8=2x', '2016-06-08 07:10:45', 2, 0, 3, 8, 5.66667),
(21, 'jesusymencey', '4=2x', '2016-06-08 07:11:36', 2, 0, 1, 11, 7),
(22, 'jesusymencey', '8-x=-4', '2016-06-08 07:12:12', 3, 0, 1, 15, 13),
(23, 'jesusymencey', '-3+x=5', '2016-06-08 07:12:50', 3, 0, 1, 22, 13),
(24, 'alexia', '2=6-x', '2016-06-08 07:17:27', 3, 0, 2, 13, 21.5),
(25, 'TayTayy', '-7=-x', '2016-06-08 07:18:35', 2, 0, 1, 5, 22),
(26, 'alexia', '4-x=-10-2', '2016-06-08 07:19:35', 4, 0, 1, 12, 24),
(27, 'ainhoa', '2x-3x=-4-1', '2016-06-08 07:20:54', 4, 0, 1, 11, 24),
(28, 'ainhoa', '-x=5-11', '2016-06-08 07:21:59', 3, 0, 1, 6, 23),
(29, 'ainhoa', '-4=-x+2+1', '2016-06-08 07:22:15', 4, 0, 1, 7, 24),
(30, 'ainhoa', '-x=-6', '2016-06-08 07:22:29', 2, 0, 1, 4, 22),
(31, 'ainhoa', '8-3=x-2', '2016-06-08 07:22:48', 4, 0, 1, 11, 24),
(32, 'javi', '-3=-x', '2016-06-08 07:23:10', 2, 0, 1, 9, 22),
(33, 'ainhoa', '171=66x+150x', '2016-06-08 07:23:17', 3, 4, 4, 16, 23.75),
(34, 'ainhoa', 'x-5=6', '2016-06-08 07:23:37', 3, 0, 1, 3, 28),
(35, 'Minecraft', '-x=-2', '2016-06-08 07:26:02', 2, 0, 1, 8, 22),
(36, 'TayTayy', '6=-3+3+2x', '2016-06-08 07:36:09', 4, 0, 1, 20, 29),
(37, 'alexia', '41+16x+41=17x', '2016-06-08 07:37:08', 4, 1, 3, 4, 22.6667),
(38, 'jesusymencey', '-x=-8-1', '2016-06-08 07:48:03', 3, 0, 1, 16, 33),
(39, 'jesusymencey', '-x-2=-5-5', '2016-06-08 07:48:27', 4, 0, 2, 7, 32),
(40, 'jesusymencey', '-4=-x', '2016-06-08 07:48:55', 2, 0, 1, 9, 32),
(41, 'ainara', '-x+9+5=-2', '2016-06-08 07:52:52', 4, 0, 1, 8, 29),
(42, 'ainara', '-66x+157=103-115', '2016-06-08 07:54:36', 4, 4, 3, 6, 36.6667),
(43, 'ainara', '-25x+27x=51+75+88', '2016-06-08 07:55:12', 5, 2, 1, 4, 45),
(44, 'ainara', '-98-102=-51x-128', '2016-06-08 07:55:32', 4, 3, 2, 11, 43),
(45, 'ainara', '120=77x', '2016-06-08 07:56:03', 2, 4, 1, 3, 45),
(46, 'borjaruam', '182x-124=89x+117-143', '2016-06-08 21:52:49', 5, 4, 2, 110, 37.5),
(47, 'borjaruam', '78x=193+190x-122x', '2016-06-08 21:53:31', 4, 4, 1, 22, 45),
(48, 'borjaruam', '-121=-105x', '2016-06-08 21:54:23', 2, 4, 6, 36, 26.6667),
(49, 'eric', '-2x=-8', '2016-06-16 17:12:50', 2, 0, 1, 7, 12),
(50, 'eric', '-2x=-8', '2016-06-16 17:13:14', 2, 0, 1, 2, 17),
(51, 'irene', '-9=-x', '2016-06-16 17:22:47', 2, 0, 1, 3, 7),
(52, 'eric', '-2x=-8', '2016-06-16 17:34:51', 2, 0, 1, 3, 32),
(53, 'eric', '-3=-x', '2016-06-16 17:36:01', 2, 0, 2, 10, 31),
(54, 'eric', '-8=-x', '2016-06-16 17:36:47', 2, 0, 1, 3, 32),
(55, 'nieves1', '-7=-x', '2016-06-16 17:51:46', 2, 0, 1, 3, 12),
(56, 'alu', '-x=-6', '2016-06-20 10:42:25', 2, 0, 1, 4, 5777),
(57, 'adri', '-9=-x', '2016-06-21 15:23:33', 2, 0, 1, 3, 77),
(58, 'jese', '-118=-74x', '2016-06-22 17:56:12', 2, 4, 1, 8, 80),
(59, 'alexia2', '-x=-4', '2016-06-23 17:11:20', 2, 0, 1, 3, 7),
(60, 'angel2', '-x=-7', '2016-06-23 17:17:58', 2, 0, 1, 2, 7),
(61, 'angel2', '8=1+x', '2016-06-23 17:18:55', 3, 0, 1, 8, 13),
(62, 'angel2', '-197-99x=-123x', '2016-06-23 17:19:38', 3, 4, 1, 30, 25),
(63, 'adri', '2x=4', '2016-06-26 14:51:18', 2, 0, 1, 5, 82),
(64, 'adri', '-75+191x=109x+133x-193-116x-101x+168x', '2016-07-07 13:41:27', 8, 4, 4, 22, 100),
(65, 'juan', '153-46x=-68', '2016-07-19 19:29:18', 3, 3, 2, 5, 16),
(66, 'potamo', '6=2x', '2016-07-21 17:43:19', 2, 0, 1, 6, 7),
(67, 'potamo', '-34x=-49x+91', '2016-07-21 17:44:13', 3, 3, 3, 10, 14),
(68, 'potamo', '2x=23+5', '2016-07-21 17:45:24', 3, 0, 1, 9, 13),
(69, 'potamo', '4=x-2', '2016-07-21 17:45:50', 3, 0, 1, 7, 18),
(70, 'potamo', '5=-4+x', '2016-07-21 17:53:34', 3, 0, 1, 6, 18),
(71, 'juan33', '2x=6', '2016-07-21 18:24:46', 2, 0, 1, 5, 7),
(72, 'juan33', '2x-9=7', '2016-07-21 18:25:20', 3, 0, 1, 21, 13),
(73, 'juan33', '-x=-4', '2016-07-21 18:25:35', 2, 0, 2, 6, 11),
(74, 'juan33', '-6=-x', '2016-07-21 18:25:52', 2, 0, 2, 4, 16),
(75, 'juan33', '-x=-7', '2016-07-21 18:26:06', 2, 0, 2, 5, 16),
(76, 'juan33', '-2-2x=4-3x', '2016-07-21 18:26:19', 4, 0, 1, 4, 19),
(77, 'potamo11', '-6=-x', '2016-07-22 08:39:26', 2, 0, 1, 10, 7),
(78, 'potamo11', '-200-140-185=-172+85x-102x', '2016-07-22 08:40:05', 6, 4, 2, 21, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equation_cooperative`
--

CREATE TABLE IF NOT EXISTS `equation_cooperative` (
  `id` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `player1` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `player2` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `player3` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `player4` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `equation` text COLLATE latin1_spanish_ci NOT NULL,
  `mode` int(11) NOT NULL,
  `answer1` text COLLATE latin1_spanish_ci,
  `answer2` text COLLATE latin1_spanish_ci,
  `answer3` text COLLATE latin1_spanish_ci,
  `answer4` text COLLATE latin1_spanish_ci,
  `solution1` text COLLATE latin1_spanish_ci NOT NULL,
  `solution2` text COLLATE latin1_spanish_ci NOT NULL,
  `solution3` text COLLATE latin1_spanish_ci NOT NULL,
  `solution4` text COLLATE latin1_spanish_ci NOT NULL,
  `solution5` text COLLATE latin1_spanish_ci NOT NULL,
  `state1` tinyint(1) NOT NULL DEFAULT '0',
  `state2` tinyint(1) NOT NULL DEFAULT '0',
  `state3` tinyint(1) NOT NULL DEFAULT '0',
  `state4` tinyint(1) NOT NULL DEFAULT '0',
  `rightAnswers` int(11) NOT NULL DEFAULT '0',
  `experience` float NOT NULL DEFAULT '0',
  `finished` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `equation_cooperative`
--

INSERT INTO `equation_cooperative` (`id`, `player1`, `player2`, `player3`, `player4`, `equation`, `mode`, `answer1`, `answer2`, `answer3`, `answer4`, `solution1`, `solution2`, `solution3`, `solution4`, `solution5`, `state1`, `state2`, `state3`, `state4`, `rightAnswers`, `experience`, `finished`) VALUES
('hPyS6NAoPBUg6xtqlBMD2cruZHvJvUzNJ7FQUgeKS90YGup25cF7o6CoN87i2G5MOLCJ2RtU0uTHYiJ3vobTuOiiWpBZ6HMVspEu', 'adri', 'sonia', 'alu', 'jese', '-9x=-27', 1, '3', '3', '3', '3', '17', '0', '-12', '21', '3', 1, 0, 0, 0, 0, 0, 1),
('MUMQeAbGtWlPAUJVDHknuwDmfLLdNxWArJqFjCmMzHCaBm5f4pCyWfVb0HpOeloG4OmorIb0qOa2aghfGTND9JOareYFzmmEbJ2DseES', 'jese', 'adri', 'alu', 'sonia', '-3-3+x+x=2x+8-x', 0, '14', '-1', '26', '14', '-1', '26', '19', '-6', '14', 1, 0, 0, 0, 0, 0, 1),
('EBRLP78ATEwPEM5y4G9fIcNhqro13UDIwvtlCCWwgslVfruj7EyPQm6gNviRqWzWr2i3FezVGVRWnlfuZOkPar6YXoPnlokNrCQ6Qq2xmTtJeJ', 'adri', 'sonia', 'alu', 'jese', '48+14x=15x', 1, '48', '48', '48', '48', '68', '57', '60', '52', '48', 1, 0, 0, 0, 0, 0, 1),
('lY7hdH8tXmwXWHnd8SpnXjcFBoJJIUK3SSl5zuzwQ6tNNR1VKrjHKvnlT65C0PGSI1YhwxOmDi9r9bmTCFAmbXI44NG4DnXlpVDV', 'adri', 'sonia', 'alu', 'jese', '31x=-63+32x-35-50', 2, '148', '148', '160', '154', '150', '160', '144', '154', '148', 1, 0, 0, 0, 0, 0, 1),
('3r74N38S5Jws8tWmV5I80BMxb23QFByI3FNRJVJOEfhMJd9EjSMjtzQFBTvhv30zJNqsIahnqza9MkN5cAoF9fkL9Q2EU2eDQF6zP', 'adri', 'sonia', 'jese', 'alu', '-14x+26+25+21x+15x=-31+26x+34', 1, '12', '12', '12', '12', '25', '26', '28', '21', '12', 1, 0, 0, 0, 4, 0, 1),
('FLHaDmCvAf2WC0W7YiLXqaTBqwgCWxZCjHNW3qrDGtAiuwqsPbpgmjRMP8pMFopY5cU9DmNjQoBkU2MKdc0AwSnl0M8GbxFgKAqnWdH', 'adri', 'sonia', 'alu', 'jese', '-124+81x+91-35x=176+138', 3, '7.5435', '7.5435', '7.5435', '7.5435', '-5.9145', '26.1575', '0.7325', '2.1805', '7.5435', 1, 0, 0, 0, 4, 44, 1),
('xFACkAOu0daiJeAHpvbk8842BGyxpH0XnAzIbndbBotkC422zdnHmrKY7ivw0vto627hqlt1JWmm1ooACLiYd3WkmsRnYlM5oTnO', 'adri', 'alu', 'sonia', 'jese', '-12x+19x=42+31+29-17+34', 1, '17', '-2', '17', '17', '2', '11', '30', '-2', '17', 1, 0, 0, 0, 3, 42, 1),
('4hmzjQEMX3QMDm1JIlMl21OT42wGOOnS5KrpA6bx92kMplw8HitKkiDpka58Ys03cstNyEkHHEu600eIjHsDZ62kh8tfBujNWMAur', 'adri', 'sonia', 'alu', 'jese', '-14x+26+25+21x+15x=-31+26x+34', 4, '12', '12', '12', '12', '25', '26', '28', '21', '12', 1, 0, 0, 0, 4, 640, 1),
('Ld7uTG4WnnauG8gK8A9avEsoTAGm56GQkOkdup9SMjmtsCdBdmLI1d7UNOgTUWJeL4sftB7gVtKo6XZkkL3lZbgNZwGUtq9euBuY', 'sonia', 'jese', 'alu', 'adri', '-28-11x+41=-21-9x-26', 1, '29', '30', '47', '32', '32', '29', '23', '47', '30', 1, 1, 1, 1, 1, 12, 1),
('4dpA0UOhoDKO8zYFpUVHwCOtgB8KLwJQJ8qK2e1rSMf0leGL9CsFfg9vShfEOYux7Uia9kB16R2s5IdelGUAX46QmluakYIsS0C1', 'jese', 'borjaruam', 'sonia', 'adri', '39=-14x+17x', 1, '13', '24', '13', '13', '14', '24', '18', '-3', '13', 1, 1, 1, 1, 3, 54, 1),
('yrciTUY4ubwVK1buMXrM0lUUE5sRi5lQwy9ps7uXi0T324xO2ZB3kwXZBqQTvbK2KTrd0WaiW3lZ7TOaTpdeWbdyC4s7gca05Cd6', 'alexia', 'ainara', 'ainhoa', 'TayTayy', '41x+63=-45+42x', 2, '110', '108', '123', '123', '95', '98', '123', '110', '108', 1, 1, 1, 1, 1, 12, 1),
('KvNvgEORReo0Dr13dGmMCtuW0wtxcLKXhysychp4wO49g5duLzgo2Lk3hOAuzlrRUUp6cPaIEeSUk5o5FFuIrOLJCmdcIF3CAtIM', 'alexia', 'ainara', 'kevinleon', 'Minecraft', '-11x+25+13x=40-30+42+41+52', 1, '60', '49', '52', '80', '46', '52', '80', '49', '60', 1, 1, 1, 1, 1, 16, 1),
('5G55vBVHyGGaWxSUErf57GOizXGAKdqQTwVp7Q6FwNQtlIoZaD4ijSATQhuBuUrnqmMxdTdKH4d2MC1Xf6fzZQsP7WrBRTZhfMPt', 'NayrayLourdes', 'TayTayy', 'ainhoa', 'javi', '-44x=-128', 3, '2.9091', '4.4531', '80', '46', '8.3461', '8.3571', '4.4531', '16.2411', '2.9091', 1, 1, 1, 1, 0, 0, 1),
('4RPCZ2uebEORKlfEwcUyCJZ1Oz0PxW9COZeO1J2cnR47ckLJwGh9phbeRc4o8e1XdfLfYOsmFwtSQfCnWTxmbIA2UFr3Ts07IMmG', 'Minecraft', 'TayTayy', 'ainhoa', 'ainara', '93+29x-48=30x-57-43-49', 2, '192', '194', '192', '192', '192', '187', '196', '203', '194', 1, 1, 1, 1, 1, 21, 1),
('rHa3JCnCatANrjLrtyLU38Lk5qTDShnkYxoIaMklfV8HfT8IsUDw3oQ8PJMI1920GqIQc3bsYj9ediWFdAbhY2pNLbvNlyN1ZvSc', 'Minecraft', 'jesusymencey', 'ainara', 'ainhoa', '-31x=-62', 2, '2', '2', '2', '2', '21', '16', '-1', '20', '2', 1, 1, 1, 1, 4, 96, 1),
('mcWj19c9mDGyybhi0APDSZrb7kNNdX2zaYTb85kvI13hdkzdVpRNojZwDMkRKmqVlk6tprZ8t2pGnYUinM6M55jJSDADZ1yllFOK', 'borjaruam', 'alu', 'alexia', 'javi', '5+6+4=x+2-5+6', 0, '12', '13', '12', '12', '18', '2', '-5', '13', '12', 1, 0, 0, 1, 3, 63, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equation_duel`
--

CREATE TABLE IF NOT EXISTS `equation_duel` (
  `id` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `player1` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `player2` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `equation` text COLLATE latin1_spanish_ci NOT NULL,
  `solution1` float NOT NULL,
  `solution2` float DEFAULT NULL,
  `winner` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `mode` int(11) NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `equation_duel`
--

INSERT INTO `equation_duel` (`id`, `player1`, `player2`, `equation`, `solution1`, `solution2`, `winner`, `mode`, `finished`, `time`) VALUES
('O0C7xyzxPqSYfvcOoQMsI8BCITplwqYkqArY91vYroXGU9vj0iLJrml9fKvLat5B3xzdz5c0u9HoidHjvs2WOn648BPj5VV9tvm3By45', 'alu', 'sonia', '-2x+x-6=-2x+4+2', 215, 12, 'sonia', 0, 1, 2),
('wMSXxTh2tEA4G5GL57qtUVaVTx89udb1Z3YxXfzqUauBfbmkiNOdIY8BwhL0uX1u002YgCoaMTL248nmVczEbIgH01IvYJZZK2X0', 'alu', 'sonia', '38x=186+178+114-91', 10.1842, 10.1842, 'alu', 3, 1, 2),
('I4NEcpCo6XUEhKcVFRqED1AzqII3wQFeUtT7SvwZsrDKcPFRH6vk76UyPDCltiAoLuwEZ3DsuhdG7SyOZ496a4F0HimbAXAmr71raEUF', 'sonia', 'alu', '19x+49=20x', 49, 49, 'alu', 1, 1, 2),
('N8BLCl9RpXsztIYPgq5X2oRKlsoXnMfaURVxc4oB2RbvAakRApODOGn98L7vynFseBZrGn3IfeePpyG0YvDMb1WkN4PlrvNG7M7Nabwpq', 'sonia', 'alu', '-56x+158+163=-45x', 29.1818, 29.1818, 'sonia', 3, 1, 4),
('sFcvkIwhDlO8cc38lkJLLipvI2KedSjGyvbSeHaR3Y0fa4owo7h9pHF8KpmYhGEQcQIqxSiBRjR2nfyLnQVMyBVi0ihhYW7aMQBk', 'sonia', 'alu', '157=74x', 2.1216, 2.1216, 'sonia', 4, 1, 9),
('EJzKsF4kUfUYT7ilSvHfKXwn9zQXvcq9V0ToFYIAeDz7KRtDnaS77pvhYmetyFDtFxRlwAVKevRZmkCKvvSDUnUTK9niO0MuyEQ4eM', 'sonia', 'alu', '76+89=-64-32x+70+36x-37', 49, 49, 'sonia', 2, 1, 3),
('CRXMDbhOymM2beaRpjOTobUnNnaWBrUejR0W3iLCFyEQMPIc8w5xIZVvn6sYxmdQeeNiwzUc7z2ToK6xhb50b0wy6YxElKuAYiSvRNHYm', 'alu', 'sonia', '78x-182+149x=-93x+200-119x+154x', -2.9986, 1.3404, 'sonia', 4, 1, 4),
('vyRAVILEoxXDAvhA1999WS4fJLowwyn26eC1XoFmVD0w8h7argjn9oDSa2oGALJG0lHYKnlF0lc9Djj4ADsJ26Bc9ZTJLCqMY7KJ', 'alu', 'sonia', '29x+85+86=-49-53+30x', 291, 273, 'sonia', 2, 1, 3),
('nw0lxrgQncEN62X5jKVRoNfS4rGwkN7Hk83RAjIXwmKDpIIJtEBRsRKwiq2CeakyioqTI8QevBRVjAFNfgFH7pdqQg24rnCJM3Du', 'alu', 'sonia', '10x=30', 21, 3, 'sonia', 1, 1, 3),
('GdauClQEhYg50lOv88ghEANT4XAXGBWmO6RqrH4JFkPFGDbOMr5q1Tk5QU2xvZUj5LKxtPg8a5OQIZEuqKVsDfxuaA1GAV0FHKcaz', 'alu', 'sonia', '112+123x-117x=-108+103x', 13.62, 2.268, 'sonia', 4, 1, 2),
('mWAmQR3dP2Oor9sCUwLby73fBOtOR9Pe6qBWhEa7HYw88YL2uwe3Eiif7L3YVSd2jOYAt9Ia8ejgc4jHByKfQ3uXPxWKq9MJXLkq', 'adri', 'sonia', '-33+42+34+21x-11x-11x=-32+36', 3, 39, 'sonia', 1, 1, 3),
('A9OASyECjbiZtkl2BcBXENwjA7QMHUCi4rSWZwyjIRjcbFeNRPKvDhOdpF07zCpE3hA3N9mw1FIdkW0cMLHp2wCrbCyLfXpifZl3', 'adri', 'sonia', '-x-10-6+3x=3x-2x+4', 20, 20, 'adri', 0, 1, 2),
('ZO2b7ge1epZUgHr1LvArDrtKT4Q2LEQLtTXA9bCnBBiSjKT4fuwSVZDO4tRP8IBBCybMKN9lpsdJc7OsBklxkYlosdeAWPcynnk7', 'ainara', 'TayTayy', '1=x-10', 11, 11, 'TayTayy', 0, 1, 9),
('sZLT4hWJpfV6iHkOfvYasaxKqJeYiNQKMBERTABjQwp9eKXtgVDI6btwUIvdvmYiYCaRcLa2izbwk90A4EjbPMIKudX0zViyytpK', 'alexia', 'NayrayLourdes', '-25x+26x-51=77-41-34-48+52', 57, 56, 'alexia', 2, 1, 13),
('BKVojUCwLPOMKydVc9eVBkelhUTb7ALJkG8EAKalAY7kxkgKuuF5PUr6OkhWU2GfJOTkz3F92Nuz8LjDfZJ5UacJutFpwlEgayAJ', 'TayTayy', 'NayrayLourdes', '44+32=16x+28-15x', 48, 63, 'TayTayy', 1, 1, 27),
('Nt6HppvlMDKDWMEREZh3Px8Lpdqtz1PmvW3Ulyf8b0L8MqZrqgufND0dRqGqswMXsQROo6WA6IIT8HkzYPOMtPZkfGKIdxGGnxuM', 'alexia', 'jesusymencey', '38=19x', 2, 2, 'jesusymencey', 1, 1, 3),
('Z87Yvuzw1lC8Nz6pCSolYZq2qS2NkAdkJljfPSMReoZ2Y5rBYPXWPoZfg12ACfVmAeBp6nhlMgnLmOnlDkisIhHZjKAWZvjAKV0R', 'ainara', 'jesusymencey', '47x-76=186+95', 5.4517, 7.5957, 'jesusymencey', 3, 1, 56),
('AEzJIgZNFfsLtle2cI0bjMk20LWL0iiBWRlF7ksNAVy4hM7uu7GOU0RULNFM6Xn2PJHW4aJE6iIn4PSzXynRyeMk2r68oubddSah', 'alexia', 'TayTayy', '101x-77-108-78=161+60x', -6.0035, 10.3415, 'TayTayy', 3, 1, 6),
('WPnMAmxHYl288FsG53sEEBiPaeZuEfbB4yoFVVmThp2p4u59yyOca61kl0P0f0Bky0ZtVmndLpDPUJZshNFrUGMfHBgXBSiaSiEN', 'jesusymencey', 'tontoelquelolea', '49+45+19x-18+36=-28+20x', 154, 0, NULL, 1, 0, 201),
('aRo151wCjt36DDNNcs3qgVYXdz4EsG6DyvFDxbfQEiXiWK59d9zt5xqi6vXzb3dJzSm63CXIVV0RF60TgAml7NEeiBNtF1dfTAlW', 'NayrayLourdes', 'kevinleon', '1+4=x-7', 12, 12, 'NayrayLourdes', 0, 1, 34),
('etfqfeKMIm1HNypIPac2bdfD62S0Y83cCjDRynDgJFYxdof2yr5JEknLngLlpOy18bSGzwXibVQpj5rSxxCcRZYffJAEy9GGkynT', 'tontoelquelolea', 'Minecraft', '200-40x+182+75=50x+196-104', 22.9866, 4.0556, 'Minecraft', 3, 1, 72),
('TsfEzoFNpubPCAS6nl0vsXWykUeqUtgNVwruU6ikBuad43krplXRiUqDPF4J8kw3QXyL4Q6FlhTpkdRJyPBRJ1uyGyhOTOSKMrvQ', 'Minecraft', 'tontoelquelolea', '-59-32x+33x=66+86+53', 281, 0, NULL, 2, 0, 43),
('uHSHJOWaeRckjz4s74LznYEJjaPN7SiBzbijZfue7HyqgCTnHEX4DCNXMDLUv4w5fPof4StbA1CQEvemabrNOeLASwvnB1sQQR5V', 'kevinleon', 'NayrayLourdes', '-92-70x+147x+163=104+187', 2.8571, 18.0911, 'kevinleon', 4, 1, 98),
('O4QZE0bdiZWBNLN1VsyY1KAfkDVeeEy3Io3npeAIdwj1i62dzAcAlMQFqLUFqsI8RMwh06ZeDifVpi9YTmze8qUzbOeChXL9JhqK', 'NayrayLourdes', 'Minecraft', '16x=48', 3, 1, 'NayrayLourdes', 1, 1, 48),
('PG3J19X2JaGWQeJkaPiwUz51n5mbxeVnUZ6W94YTfFP5Tzq3oIAihGkFLGQjUMGPLMMURKN7qDdjcDmAmXTEDdjpUaIPWoFIbrC3', 'NayrayLourdes', 'tontoelquelolea', '-127-176+97x+158x-86x+176x=151x+193x', 300.059, 0, NULL, 4, 0, 13),
('WzIbk2G4a9Zo8Q0FxYNOdQODNnYhROdNnVZIYFM8PLxYCyD9wrYJhMn5alm1azPyvOgtu3CkP9irIWBeozYGllLvH7xRGnqbcGFH', 'NayrayLourdes', 'kevinleon', '45=15x', -16, 0, NULL, 1, 0, 6),
('dVtpgLhwStlaiqQcfp01nKIcv5Mh15nf1RFiCXPvqaFJAvVQVWSjGBwcGiuIoSYpJDImBxR1IwLj2G9YD2hjDNwk603uS1TBFCYg', 'borjaruam', 'adri', '-57+49x+41x=54-57+45x+90+43x', 72, 72, 'adri', 2, 1, 4),
('m0cWEob01kLGlo0dtjsF1z6r79Eq0VAmVNjzbvAdQlTbKTpedRTfrZGy9kY9fzwbmQLyllLbHEnsyMGMEz15zHEI2DSicpuzff7A', 'sonia', 'alexia', '-77x+53x+156-73=-116-180', 23.6237, 0, NULL, 4, 0, 7),
('wmoW34kpeq9JFq1RqRBxpI853OvCjowPLVMOZ7ddxnWdOY4eQFMgnVlrJR43gAT1vFQvN4IkrFygECuuihKGc68WYcZeNTgjy6Om', 'borjaruam', 'alu', '55-51=-30x+29x+72', 68, 68, 'borjaruam', 2, 1, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `name` text COLLATE latin1_spanish_ci NOT NULL,
  `email` text COLLATE latin1_spanish_ci NOT NULL,
  `password` text COLLATE latin1_spanish_ci NOT NULL,
  `code` text COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `request`
--

INSERT INTO `request` (`id`, `username`, `name`, `email`, `password`, `code`) VALUES
('P3gC9XbLc15ZJkoGi7DoPCZA1AEILN4BQkdZhpKtqQtaaRQtZtRO5Qp7r3PcQTOHe1GvrrZRht2slSVklM9rCzz4Cohti5bw7R2y', 'borja', 'Borja Ruiz', 'borja.ruiz.amantegui@gmail.com', '/GLlaelXrh62P6b6BQ94Ry6BxHZpQP79OwlojY2ptW0=', '38300'),
('HdCmKvzkJMRHJfqz2IiNXfZKjhK1Q81ymEU69urThiA0x1zAJRnG7mrqEbrukt3G7XMhseaJwLJ4MjFvb2cipDI3Pay9DBPLzC21', 'potamo1', 'Pepe', 'kdj36451@zasod.com', 'TqBdt8mdbiDpckMthzoPLqIJHX55i0JKdJSTwE6NOPY=', 'kdj36451@zasod.com'),
('PUY15f0hRuykthSSbrxA9r871S5eXhcNbaOgpPyhj7BNotFAVca5EidGaiU8z6VLhJ1HyAYSHzG63mGZzR4d9hUkAPs9WnVd7WUG', 'mito', 'Pota', 'kdj36451@zasod.com', 'duIkzKnGg+OnZbbz8tKABUyRy+4ZCZ+1REGciXAxoFA=', 'kdj36451@zasod.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_classroom`
--

CREATE TABLE IF NOT EXISTS `student_classroom` (
  `username` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_classroom` int(11) NOT NULL,
  PRIMARY KEY (`username`,`id_classroom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `student_classroom`
--

INSERT INTO `student_classroom` (`username`, `id_classroom`) VALUES
('adri', 2),
('ainara', 10),
('ainhoa', 10),
('alexia', 10),
('alu', 2),
('borjaruam', 2),
('eric', 11),
('irene', 11),
('javi', 10),
('jesusymencey', 10),
('juan', 2),
('kevinleon', 10),
('lola', 10),
('Minecraft', 10),
('NayrayLourdes', 10),
('nieves1', 11),
('sonia', 10),
('TayTayy', 10),
('tontoelquelolea', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeline`
--

CREATE TABLE IF NOT EXISTS `timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text COLLATE latin1_spanish_ci NOT NULL,
  `classroom_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=172 ;

--
-- Volcado de datos para la tabla `timeline`
--

INSERT INTO `timeline` (`id`, `username`, `timestamp`, `content`, `classroom_id`) VALUES
(1, 'alexia', '2016-06-08 07:10:46', 'alexia ha alcanzado el nivel 2.', -1),
(2, 'alexia', '2016-06-08 07:10:46', 'alexia ha desbloqueado un logro nuevo.', -1),
(3, 'TayTayy', '2016-06-08 07:11:31', 'Tayri ha alcanzado el nivel 2.', -1),
(4, 'TayTayy', '2016-06-08 07:11:31', 'Tayri ha desbloqueado un logro nuevo.', -1),
(5, 'jesusymencey', '2016-06-08 07:11:36', 'jesus y mencey ha alcanzado el nivel 2.', -1),
(6, 'jesusymencey', '2016-06-08 07:11:36', 'jesus y mencey ha desbloqueado un logro nuevo.', -1),
(7, 'alexia', '2016-06-08 07:11:49', 'alexia ha alcanzado el nivel 3.', -1),
(8, 'alexia', '2016-06-08 07:11:49', 'alexia ha desbloqueado un logro nuevo.', -1),
(9, 'ainara', '2016-06-08 07:12:09', 'ainara ha alcanzado el nivel 2.', -1),
(10, 'ainara', '2016-06-08 07:12:09', 'ainara ha desbloqueado un logro nuevo.', -1),
(11, 'jesusymencey', '2016-06-08 07:12:50', 'jesus y mencey ha alcanzado el nivel 3.', -1),
(12, 'ainhoa', '2016-06-08 07:13:05', 'ainhoa ha alcanzado el nivel 2.', -1),
(13, 'ainhoa', '2016-06-08 07:13:05', 'ainhoa ha desbloqueado un logro nuevo.', -1),
(14, 'jesusymencey', '2016-06-08 07:13:29', 'jesus y mencey ha desbloqueado un logro nuevo.', -1),
(15, 'ainara', '2016-06-08 07:14:12', 'ainara ha alcanzado el nivel 3.', 10),
(16, 'ainara', '2016-06-08 07:14:12', 'ainara ha desbloqueado un logro nuevo.', 10),
(17, 'TayTayy', '2016-06-08 07:14:35', 'Tayri ha alcanzado el nivel 3.', 10),
(18, 'TayTayy', '2016-06-08 07:14:35', 'Tayri ha desbloqueado un logro nuevo.', 10),
(19, 'Minecraft', '2016-06-08 07:14:37', 'Jeremi ha alcanzado el nivel 2.', 10),
(20, 'Minecraft', '2016-06-08 07:14:37', 'Jeremi ha desbloqueado un logro nuevo.', 10),
(21, 'ainhoa', '2016-06-08 07:14:42', 'ainhoa ha alcanzado el nivel 3.', 10),
(22, 'ainhoa', '2016-06-08 07:14:42', 'ainhoa ha desbloqueado un logro nuevo.', 10),
(23, 'kevinleon', '2016-06-08 07:14:42', 'kevin ha alcanzado el nivel 2.', 10),
(24, 'kevinleon', '2016-06-08 07:14:42', 'kevin ha desbloqueado un logro nuevo.', 10),
(25, 'alexia', '2016-06-08 07:14:42', 'alexia ha alcanzado el nivel 4.', 10),
(26, 'alexia', '2016-06-08 07:14:42', 'alexia ha desbloqueado un logro nuevo.', 10),
(27, 'javi', '2016-06-08 07:14:43', 'javi ha alcanzado el nivel 2.', 10),
(28, 'javi', '2016-06-08 07:14:43', 'javi ha desbloqueado un logro nuevo.', 10),
(29, 'NayrayLourdes', '2016-06-08 07:14:45', 'Nayra y Lourdes ha alcanzado el nivel 2.', 10),
(30, 'NayrayLourdes', '2016-06-08 07:14:45', 'Nayra y Lourdes ha desbloqueado un logro nuevo.', 10),
(31, 'ainara', '2016-06-08 07:15:23', 'ainara ha alcanzado el nivel 4.', 10),
(32, 'ainara', '2016-06-08 07:15:23', 'ainara ha desbloqueado un logro nuevo.', 10),
(33, 'TayTayy', '2016-06-08 07:15:59', 'Tayri ha alcanzado el nivel 4.', 10),
(34, 'TayTayy', '2016-06-08 07:15:59', 'Tayri ha desbloqueado un logro nuevo.', 10),
(35, 'tontoelquelolea', '2016-06-08 07:16:20', 'josejoel1 ha alcanzado el nivel 2.', 10),
(36, 'tontoelquelolea', '2016-06-08 07:16:20', 'josejoel1 ha desbloqueado un logro nuevo.', 10),
(37, 'jesusymencey', '2016-06-08 07:17:43', 'jesus y mencey ha alcanzado el nivel 4.', 10),
(38, 'jesusymencey', '2016-06-08 07:17:43', 'jesus y mencey ha desbloqueado un logro nuevo.', 10),
(39, 'Minecraft', '2016-06-08 07:17:45', 'Jeremi ha alcanzado el nivel 3.', 10),
(40, 'Minecraft', '2016-06-08 07:17:45', 'Jeremi ha desbloqueado un logro nuevo.', 10),
(41, 'tontoelquelolea', '2016-06-08 07:17:45', 'josejoel1 ha alcanzado el nivel 3.', 10),
(42, 'tontoelquelolea', '2016-06-08 07:17:45', 'josejoel1 ha desbloqueado un logro nuevo.', 10),
(43, 'javi', '2016-06-08 07:17:46', 'javi ha alcanzado el nivel 3.', 10),
(44, 'javi', '2016-06-08 07:17:46', 'javi ha desbloqueado un logro nuevo.', 10),
(45, 'kevinleon', '2016-06-08 07:17:46', 'kevin ha alcanzado el nivel 3.', 10),
(46, 'kevinleon', '2016-06-08 07:17:46', 'kevin ha desbloqueado un logro nuevo.', 10),
(47, 'ainhoa', '2016-06-08 07:17:50', 'ainhoa ha alcanzado el nivel 4.', 10),
(48, 'ainhoa', '2016-06-08 07:17:50', 'ainhoa ha desbloqueado un logro nuevo.', 10),
(49, 'TayTayy', '2016-06-08 07:18:35', 'Tayri ha desbloqueado un logro nuevo.', 10),
(50, 'alexia', '2016-06-08 07:18:37', 'alexia ha desbloqueado un logro nuevo.', 10),
(51, 'jesusymencey', '2016-06-08 07:18:44', 'jesus y mencey ha desbloqueado un logro nuevo.', 10),
(52, 'TayTayy', '2016-06-08 07:19:09', 'Tayri ha alcanzado el nivel 5.', 10),
(53, 'TayTayy', '2016-06-08 07:19:09', 'Tayri ha desbloqueado un logro nuevo.', 10),
(54, 'TayTayy', '2016-06-08 07:19:09', 'Tayri ha desbloqueado un logro nuevo.', 10),
(55, 'ainhoa', '2016-06-08 07:20:54', 'ainhoa ha desbloqueado un logro nuevo.', 10),
(56, 'javi', '2016-06-08 07:21:11', 'javi ha alcanzado el nivel 4.', 10),
(57, 'javi', '2016-06-08 07:21:11', 'javi ha desbloqueado un logro nuevo.', 10),
(58, 'tontoelquelolea', '2016-06-08 07:21:43', 'josejoel1 ha alcanzado el nivel 4.', 10),
(59, 'tontoelquelolea', '2016-06-08 07:21:43', 'josejoel1 ha desbloqueado un logro nuevo.', 10),
(60, 'Minecraft', '2016-06-08 07:21:54', 'Jeremi ha alcanzado el nivel 4.', 10),
(61, 'Minecraft', '2016-06-08 07:21:54', 'Jeremi ha desbloqueado un logro nuevo.', 10),
(62, 'kevinleon', '2016-06-08 07:21:59', 'kevin ha alcanzado el nivel 4.', 10),
(63, 'kevinleon', '2016-06-08 07:21:59', 'kevin ha desbloqueado un logro nuevo.', 10),
(64, 'NayrayLourdes', '2016-06-08 07:22:30', 'Nayra y Lourdes ha alcanzado el nivel 3.', 10),
(65, 'NayrayLourdes', '2016-06-08 07:22:30', 'Nayra y Lourdes ha desbloqueado un logro nuevo.', 10),
(66, 'jesusymencey', '2016-06-08 07:22:53', 'jesus y mencey ha alcanzado el nivel 5.', 10),
(67, 'jesusymencey', '2016-06-08 07:22:53', 'jesus y mencey ha desbloqueado un logro nuevo.', 10),
(68, 'jesusymencey', '2016-06-08 07:22:53', 'jesus y mencey ha desbloqueado un logro nuevo.', 10),
(69, 'javi', '2016-06-08 07:23:10', 'javi ha desbloqueado un logro nuevo.', 10),
(70, 'ainhoa', '2016-06-08 07:23:17', 'ainhoa ha alcanzado el nivel 5.', 10),
(71, 'ainhoa', '2016-06-08 07:23:17', 'ainhoa ha desbloqueado un logro nuevo.', 10),
(72, 'Minecraft', '2016-06-08 07:24:54', 'Jeremi ha desbloqueado un logro nuevo.', 10),
(73, 'Minecraft', '2016-06-08 07:26:02', 'Jeremi ha alcanzado el nivel 5.', 10),
(74, 'Minecraft', '2016-06-08 07:26:02', 'Jeremi ha desbloqueado un logro nuevo.', 10),
(75, 'Minecraft', '2016-06-08 07:26:02', 'Jeremi ha desbloqueado un logro nuevo.', 10),
(76, 'Minecraft', '2016-06-08 07:32:57', 'Jeremi ha alcanzado el nivel 6.', 10),
(77, 'jesusymencey', '2016-06-08 07:32:57', 'jesus y mencey ha alcanzado el nivel 6.', 10),
(78, 'TayTayy', '2016-06-08 07:37:55', 'Tayri ha alcanzado el nivel 6.', 10),
(79, 'TayTayy', '2016-06-08 07:37:55', 'Tayri ha desbloqueado un logro nuevo.', 10),
(80, 'ainhoa', '2016-06-08 07:40:34', 'ainhoa ha alcanzado el nivel 6.', 10),
(81, 'ainhoa', '2016-06-08 07:40:34', 'ainhoa ha desbloqueado un logro nuevo.', 10),
(82, 'Minecraft', '2016-06-08 07:40:51', 'Jeremi ha desbloqueado un logro nuevo.', 10),
(83, 'alexia', '2016-06-08 07:41:00', 'alexia ha alcanzado el nivel 5.', 10),
(84, 'alexia', '2016-06-08 07:41:00', 'alexia ha desbloqueado un logro nuevo.', 10),
(85, 'alexia', '2016-06-08 07:41:00', 'alexia ha desbloqueado un logro nuevo.', 10),
(86, 'jesusymencey', '2016-06-08 07:41:08', 'jesus y mencey ha desbloqueado un logro nuevo.', 10),
(87, 'ainara', '2016-06-08 07:42:03', 'ainara ha alcanzado el nivel 5.', 10),
(88, 'ainara', '2016-06-08 07:42:03', 'ainara ha desbloqueado un logro nuevo.', 10),
(89, 'ainara', '2016-06-08 07:42:03', 'ainara ha desbloqueado un logro nuevo.', 10),
(90, 'tontoelquelolea', '2016-06-08 07:42:36', 'josejoel1 ha desbloqueado un logro nuevo.', 10),
(91, 'alexia', '2016-06-08 07:42:54', 'alexia ha alcanzado el nivel 6.', 10),
(92, 'kevinleon', '2016-06-08 07:43:21', 'Kevin y Javi ha desbloqueado un logro nuevo.', 10),
(93, 'jesusymencey', '2016-06-08 07:48:55', 'jesus y mencey ha desbloqueado un avatar nuevo.', 10),
(94, 'NayrayLourdes', '2016-06-08 07:48:57', 'Nayra y Lourdes ha alcanzado el nivel 4.', 10),
(95, 'NayrayLourdes', '2016-06-08 07:48:57', 'Nayra y Lourdes ha desbloqueado un logro nuevo.', 10),
(96, 'ainara', '2016-06-08 07:52:52', 'ainara ha desbloqueado un avatar nuevo.', 10),
(97, 'ainara', '2016-06-08 07:52:52', 'ainara ha alcanzado el nivel 6.', 10),
(98, 'ainara', '2016-06-08 07:52:52', 'ainara ha desbloqueado un logro nuevo.', 10),
(99, 'ainara', '2016-06-08 07:55:12', 'ainara ha desbloqueado un avatar nuevo.', 10),
(100, 'ainara', '2016-06-08 07:55:12', 'ainara ha desbloqueado un logro nuevo.', 10),
(101, 'ainara', '2016-06-08 07:55:12', 'ainara ha alcanzado el nivel 7.', 10),
(102, 'ainara', '2016-06-08 07:56:03', 'ainara ha desbloqueado un avatar nuevo.', 10),
(103, 'eric', '2016-06-16 17:09:37', 'eric ha alcanzado el nivel 2.', 11),
(104, 'eric', '2016-06-16 17:09:37', 'eric ha desbloqueado un logro nuevo.', 11),
(105, 'eric', '2016-06-16 17:12:50', 'eric ha alcanzado el nivel 3.', 11),
(106, 'eric', '2016-06-16 17:12:50', 'eric ha desbloqueado un logro nuevo.', 11),
(107, 'eric', '2016-06-16 17:14:57', 'eric ha alcanzado el nivel 4.', 11),
(108, 'eric', '2016-06-16 17:14:57', 'eric ha desbloqueado un logro nuevo.', 11),
(109, 'eric', '2016-06-16 17:19:11', 'eric ha alcanzado el nivel 5.', 11),
(110, 'eric', '2016-06-16 17:19:11', 'eric ha desbloqueado un logro nuevo.', 11),
(111, 'eric', '2016-06-16 17:19:42', 'eric ha alcanzado el nivel 6.', 11),
(112, 'eric', '2016-06-16 17:19:42', 'eric ha desbloqueado un logro nuevo.', 11),
(113, 'irene', '2016-06-16 17:22:48', 'irene ha alcanzado el nivel 2.', -1),
(114, 'irene', '2016-06-16 17:22:48', 'irene ha desbloqueado un logro nuevo.', -1),
(115, 'irene', '2016-06-16 17:24:04', 'irene ha alcanzado el nivel 3.', 11),
(116, 'irene', '2016-06-16 17:24:04', 'irene ha desbloqueado un logro nuevo.', 11),
(117, 'irene', '2016-06-16 17:25:13', 'irene ha alcanzado el nivel 4.', 11),
(118, 'irene', '2016-06-16 17:25:13', 'irene ha desbloqueado un logro nuevo.', 11),
(119, 'irene', '2016-06-16 17:28:57', 'irene ha alcanzado el nivel 5.', 11),
(120, 'irene', '2016-06-16 17:28:57', 'irene ha desbloqueado un logro nuevo.', 11),
(121, 'irene', '2016-06-16 17:29:35', 'irene ha alcanzado el nivel 6.', 11),
(122, 'irene', '2016-06-16 17:29:35', 'irene ha desbloqueado un logro nuevo.', 11),
(123, 'nieves1', '2016-06-16 17:46:24', 'nieves1 ha alcanzado el nivel 2.', 11),
(124, 'nieves1', '2016-06-16 17:46:24', 'nieves1 ha desbloqueado un logro nuevo.', 11),
(125, 'nieves1', '2016-06-16 17:51:46', 'nieves1 ha alcanzado el nivel 3.', 11),
(126, 'nieves1', '2016-06-16 17:51:46', 'nieves1 ha desbloqueado un logro nuevo.', 11),
(127, 'borjaruam', '2016-06-19 21:04:47', 'Borja Ruiz Amantegui ha alcanzado el nivel 6.', 2),
(128, 'borjaruam', '2016-06-19 21:04:47', 'Borja Ruiz Amantegui ha desbloqueado un logro nuevo.', 2),
(129, 'borjaruam', '2016-06-20 18:25:21', 'Borja Ruiz Amantegui ha desbloqueado un logro nuevo.', 2),
(130, 'borjaruam', '2016-06-20 18:27:44', 'Borja Ruiz Amantegui ha alcanzado el nivel 7.', 2),
(131, 'adri', '2016-06-21 15:21:29', 'adri ha desbloqueado un logro nuevo.', 2),
(132, 'adri', '2016-06-21 15:24:36', 'adri ha alcanzado el nivel 16.', 2),
(133, 'adri', '2016-06-21 15:24:36', 'adri ha desbloqueado un logro nuevo.', 2),
(134, 'jese', '2016-06-22 17:56:12', 'jese ha alcanzado el nivel 15.', -1),
(135, 'jese', '2016-06-22 17:56:12', 'jese ha desbloqueado un logro nuevo.', -1),
(136, 'alexia2', '2016-06-23 17:11:21', 'alexia2 ha alcanzado el nivel 2.', -1),
(137, 'alexia2', '2016-06-23 17:11:21', 'alexia2 ha desbloqueado un logro nuevo.', -1),
(138, 'angel2', '2016-06-23 17:17:59', 'angel2 ha alcanzado el nivel 2.', -1),
(139, 'angel2', '2016-06-23 17:17:59', 'angel2 ha desbloqueado un logro nuevo.', -1),
(140, 'angel2', '2016-06-23 17:19:38', 'angel2 ha alcanzado el nivel 3.', -1),
(141, 'adri', '2016-06-29 15:51:56', 'adri ha alcanzado el nivel 17.', 2),
(142, 'alu', '2016-07-04 12:34:01', 'MARIA ha alcanzado el nivel 1155.', 2),
(143, 'alu', '2016-07-04 12:34:01', 'MARIA ha alcanzado el nivel 1155.', 2),
(144, 'sonia', '2016-07-04 17:24:24', 'sonia ha alcanzado el nivel 27.', 10),
(145, 'lola', '2016-07-04 17:29:15', 'lola ha alcanzado el nivel 2.', 10),
(146, 'lola', '2016-07-04 17:29:15', 'lola ha desbloqueado un logro nuevo.', 10),
(147, 'lola', '2016-07-04 17:30:02', 'lola ha alcanzado el nivel 3.', 10),
(148, 'lola', '2016-07-04 17:30:02', 'lola ha desbloqueado un logro nuevo.', 10),
(149, 'lola', '2016-07-04 17:30:36', 'lola ha alcanzado el nivel 4.', 10),
(150, 'lola', '2016-07-04 17:31:02', 'lola ha alcanzado el nivel 5.', 10),
(151, 'lola', '2016-07-04 17:31:02', 'lola ha desbloqueado un logro nuevo.', 10),
(152, 'lola', '2016-07-04 17:31:21', 'lola ha alcanzado el nivel 6.', 10),
(153, 'adri', '2016-07-07 13:41:27', 'adri ha alcanzado el nivel 18.', 2),
(154, 'adri', '2016-07-07 13:41:27', 'adri ha desbloqueado un logro nuevo.', 2),
(155, 'juan', '2016-07-19 18:41:58', 'juan ha alcanzado el nivel 2.', -1),
(156, 'juan', '2016-07-19 18:41:58', 'juan ha desbloqueado un logro nuevo.', -1),
(157, 'juan', '2016-07-19 19:29:19', 'juan ha alcanzado el nivel 3.', -1),
(158, 'juan', '2016-07-19 19:29:19', 'juan ha desbloqueado un logro nuevo.', -1),
(159, 'juan', '2016-07-21 16:02:14', 'juan ha alcanzado el nivel 4.', 2),
(160, 'juan', '2016-07-21 16:02:14', 'juan ha desbloqueado un logro nuevo.', 2),
(161, 'potamo', '2016-07-21 17:43:19', 'Pepe ha alcanzado el nivel 2.', -1),
(162, 'potamo', '2016-07-21 17:43:19', 'Pepe ha desbloqueado un logro nuevo.', -1),
(163, 'potamo', '2016-07-21 17:45:24', 'Pepe ha alcanzado el nivel 3.', -1),
(164, 'juan33', '2016-07-21 18:24:46', 'Juan33 ha desbloqueado un avatar nuevo.', -1),
(165, 'juan33', '2016-07-21 18:24:47', 'Juan33 ha alcanzado el nivel 2.', -1),
(166, 'juan33', '2016-07-21 18:24:47', 'Juan33 ha desbloqueado un logro nuevo.', -1),
(167, 'juan33', '2016-07-21 18:25:35', 'Juan33 ha alcanzado el nivel 3.', -1),
(168, 'potamo11', '2016-07-22 08:39:26', 'Potamo ha alcanzado el nivel 2.', -1),
(169, 'potamo11', '2016-07-22 08:39:26', 'Potamo ha desbloqueado un logro nuevo.', -1),
(170, 'potamo11', '2016-07-22 08:40:05', 'Potamo ha alcanzado el nivel 3.', -1),
(171, 'potamo11', '2016-07-22 08:40:05', 'Potamo ha desbloqueado un logro nuevo.', -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `name` text COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `password` text COLLATE latin1_spanish_ci NOT NULL,
  `isTeacher` tinyint(1) NOT NULL DEFAULT '0',
  `avatar_id` int(11) NOT NULL DEFAULT '69',
  `experience` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  UNIQUE KEY `email_3` (`email`),
  KEY `email` (`email`),
  KEY `email_2` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`username`, `name`, `email`, `password`, `isTeacher`, `avatar_id`, `experience`) VALUES
('alumno', 'Jesé Romero Arbelo', 'amansio@panama.com', 'VPiJ8viUS6+7KcY4zaXaIWEedD9FIipYdtMa7Mp+a1g=', 0, 69, 50),
('profesor', 'profesor', 'profe@profe.com', 'YtZM63GHkFeeBvCga1+LCGAcMac4eR+Xh6bpWap4gcw=', 1, 69, 50),
('alu', 'MARIA', 'borja.29@hotmail.com', '3MFKj6rPBmhSPDHSWd5moV8r/YaNifhwkDKfq7S0Q/U=', 0, 69, 100082000),
('sonia', 'sonia', 'mujicagadrian@gmail.com', 'HCEpsqpaZTOcPQlboJhtFTnFp8PTMJYg5Gf43qqm8to=', 0, 90, 46477.2),
('borjaruam', 'Borja Ruiz Amantegui', 'borja.ruiz.amantegui@gmail.com', '3MFKj6rPBmhSPDHSWd5moV8r/YaNifhwkDKfq7S0Q/U=', 0, 82, 4346.79),
('Nieves', 'Nieves', 'nieves@gmail.com', 'rwTrBdP7MY/cxMo+C+Gac0EL3+tvGbshc5O9JWsJ/xQ=', 0, 69, 0),
('adri', 'adri', 'adrian555_5@hotmail.com', 'NlgvL6y97aU7BFlezvxtKbkkKh6STgRri1DtJ774Nq4=', 0, 5, 20096.5),
('jese', 'jese', 'jese_134@hotmail.com', 'GhJXm8wO1F6BirSv/kWwnEFuBXsrN3ugqZ3hbClviGs=', 0, 69, 13172),
('paco', 'Francisco', 'jese540728@gmail.com', 'E98xggtQFT+aqHG+bp27ty12rDMNrzhmEjm+lGK+Pl8=', 1, 4, 150),
('jesusymencey', 'jesus y mencey', 'mencey20012@hotmail.com', '/ttMTl8UYLmDX3nPDfmHNKPmFK1ZO7EBwyb6CEIQTe3eOP79mHcnNIQ9ahpfOThi', 0, 27, 1647.49),
('ainhoa', 'ainhoa', 'ainhoa13@gmail.com', 'cef/aJ2H26Qq3/0X56agr1N+L946bEq6jTvS1hvD1JE=', 0, 31, 1500.5),
('ainara', 'ainara', 'ainaragoonzalezz@hotmail.com', 'w0B7QKetXqmMbU7SbM42OFZywSQuLCtwMhCyWvp70bs=', 0, 0, 1899.75),
('NayrayLourdes', 'Nayra y Lourdes', 'NayrayLourdes@gmail.com', 'tcYSBB5PcptRwaA1fdwF1exU4QEONdlcFtzZA3jFH20=', 0, 22, 312),
('kevinleon', 'Kevin y Javi', 'kevin@gmail.com', '+LXqrrpRYcwF/5RUFmu3Sh+S6cy6baozA27yykTdKUA=', 0, 20, 586.515),
('TayTayy', 'Tayri', 'tayri28@hotmail.com', 'fgUZy+pFWal+ssQRzOzd7mSVankSL/AwlTae3h++WMU=', 0, 30, 1539.86),
('Josejoelputosamos', 'josejoel', 'jose@gmail.com', 'zT5aXgoJYRZZl9aD62Kx8a9pLK/Te0rhc60Pj0dxYqw=', 0, 69, 0),
('javiercabreravega', 'javi', 'javier@gmail.com', 'JR2Lb8SsZu9fC66FyGOIYLGv3+dLnNXSFizwlnwgLdM=', 0, 69, 0),
('alexia', 'alexia', 'alexiamr2001@gmail.com', '3MFKj6rPBmhSPDHSWd5moV8r/YaNifhwkDKfq7S0Q/U=', 0, 89, 1640.85),
('Minecraft', 'Jeremi', 'superdani286@gmail.com', 'h4AfO18okge1kHlxwO3XqXEhSqSaIa8EdXL3Y5+d8cwo+16mRX3niSFj11L9ywoN', 0, 114, 1688.96),
('eric', 'eric', 'eric@gmail.com', 'DOMVLbmRyiMFh5/GdHaTxXpfLyb7+9/UhvQzmzfKwFQ=', 0, 20, 1309.91),
('javi', 'javi', 'javi@gmail.com', '3MFKj6rPBmhSPDHSWd5moV8r/YaNifhwkDKfq7S0Q/U=', 0, 0, 585),
('tontoelquelolea', 'josejoel1', 'joelfutbol-10@hotmail.es', '3MFKj6rPBmhSPDHSWd5moV8r/YaNifhwkDKfq7S0Q/U=', 0, 15, 596.584),
('irene', 'irene', 'irene@gmail.com', 'IMdtnEQIxoHihSavF5QqmR95E+VXPNaQtz1691Xuonw=', 0, 69, 1135.34),
('nieves1', 'nieves1', 'nieves1@gmail.com', 'utIyLefvt74rN8r0YiFsHNj9iRsAl+KkzeMtKe6gcXk=', 0, 69, 162),
('alexia2', 'alexia2', 'alexia2@gmail.com', 'VHWCGHxUKJSo3qFj4RRdJsDnA+upAkbH8npcJFWZUtw=', 0, 69, 57),
('angel2', 'angel2', 'angel2@gmail.com', '19iA9C4UG79e00TDnleHQdF29q3OQIxL/xhhJZD5iKQ=', 0, 69, 95),
('alumno1', 'alumno1', 'odsajkodas@hotmail.com', 'TJhhuqtyVGUQxJjYJrmo7nFrCE4qKtu1oj43eZrwLqM=', 0, 69, 0),
('alumno2', 'alumno2', 'alumno2@hotmail.com', '5TADQgoFKOOhvn2KuCz+JOBni5tODanmvQioaG4QvQQ=', 0, 69, 0),
('alumno3', 'alumno3', 'alumno3@hotmail.com', 'MVl8UKSw4u/QlBYpks4eyivFb/B6ycfoLjb7Y22cvU4=', 0, 69, 0),
('alumno4', 'alumno4', 'alumno4@gmail.com', 'YPtSzR/N9UQCXtPVe1WkmO915B1q6HHCDcU3sHd4G5s=', 0, 69, 0),
('lola', 'lola', 'lola@gmail.com', 'yjw0QgVxPMRkQQoPlLcZGifOJGIYPXGJldiAijt8HtI=', 0, 69, 1298.22),
('juan', 'juan', 'juan@juan.es', 'F6rm/8iEdrZh97vSVSpRx67FQk0H8UFpptqg15/6mwQ=', 0, 59, 316),
('potamo', 'Pepe', 'lgg44152@zasod.com', 'q9dtujfIhghAG3V8NIm+sgNl1rjSQrfro4M+/EG00vW2VzOU4B66O+EwpQkDeuX0h50DMU6xZEoKoIv4KZuVows9xQDiZ2CURKfiHGTQHxfFXkZSzH3b/P/U46HXsXfOFbuFRCV97k6lmWls+3uzULluTWt/HiC59GDkgHZjpL4p8qxB8KAdZqnhZBaoyZAztXyrBQfo6SEoMFWGFz6kA1eJN+oLKPgOjaNmHsrQwhKEqLmz8Sg3yJcjbMRbg9oBfcFSrrKfeEgyvDVkHQI+CgInhxRHSwVo287Kcrs1v4rStJeOIV+NCNg6atwjFEEYtmJp2bKZqe/1Rm2PFFXX+JLbgNl7H3WjUXh+RhJmybaIC1ndSi+Y6KakCE3OCWyNUQSBksbmhHQaVDUKZDZqSLZ32QE51Y1AuD45eQ73WdBcklb3pDgqMZPKRzO6zP1BqeqKNuPOuv7iufEA6LqBw8IQ8GSV23lil8yh+/OHCYNPS7sCXyaHw19fCtco6evS2uCl5FPZwgucjaQJFAMqgJmUGThIBe+z+NSuQDNvfRawXkGCTiBEAeIAgXLaPaITL16SVu8U5eHQEmjQO9ypbh1kdra3rKlGBBjEkP6bFq4bqQ7lfHPJOaMocDNgM591UhKK/LmZLYPFKs7xZn+kbKTiHuAhffRYZe+CwnDtKrtgHHIj6l6AcheBu3nVij1OrdqYItjcfmsSWQYJ1FhTUw==', 0, 69, 120),
('qwe', 'qwe', 'kdj36451@zasod.com', 'C1naIICj3sVilMtikcwg3dtjadO7+N2PF3lpjxwOy0Y=', 0, 69, 0),
('juan33', 'Juan33', 'qwerr@gmail.com', 'RpxcBwh0jTuHvwQCBcU5i7XJ+yRNvCONPBeARF42Ptw=', 0, 69, 132),
('potamo11', 'Potamo', 'asd@asd.es', 'R6LAu3OnJ/jMgKQrsiUwhZt+Ho2PlQC/5PPhARd6Plc=', 0, 69, 187),
('Videojuego educativo para dispositivos móviles', 'en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo', 'dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada', 'logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones., Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.,asd@es.es,i28FdxWBJIk3j3jiTWk0TnJc+d9C0JqQaVMIlBttC/I=', 0, 69, 0);
INSERT INTO `user` (`username`, `name`, `email`, `password`, `isTeacher`, `avatar_id`, `experience`) VALUES
('asdert', 'Videojuego educativo para dispositivos móviles', 'en el que el principal objetivo es la formación de palabras a partir de las letras que van aparecien', 'dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.lkkjhkjhhj Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.kjhkjhjkhkjhkj Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.v Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, loasdasdadsdaasd Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.jlkjlkjlkjlkj Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.lkjlkjlkjlkjkljljljkljkljlkj Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.lkjlkjlkjlkjlkjlkjlk Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones. Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.oiopuuuiou Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.uouiouoiuoiuoiu Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.oiuouoiuoiuoiu Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.oiuoiuoiuoiuoiuoiuuiouo Videojuego educativo para dispositivos móviles, en el que el principal objetivo es la formación de palabras a partir de las letras que van apareciendo por pantalla. Al tratarse de un videojuego educativo, dichas palabras formadas por los jugadores deberán validar un criterio gramatical específico en cada caso, logrando con esto reforzar los conocimientos de lengua española de los jugadores.  La verificación de que las palabras introducidas cumplan con los objetivos requeridos en cada momento se ha realizado mediante una conexión a un servicio web proporcionado por los miembros de Text & Information Processing (TIP), del Instituto Universitario de Análisis y Aplicaciones Textuales (IATEXT) de la Universidad de Las Palmas de Gran Canaria (ULPGC). El videojuego cuenta con tres modos de juego diferentes y adicionalmente se han incluido diversas funcionalidades extra con el fin de añadir a la aplicación nuevas mecánicas y más diversidad, como potenciadores, logros o clasificaciones.gros o clasificaciones.sdasdas,zxzxczxc@asd.es,IFBs7Tsj4whbfYtCy4hvx0SUxan2v+qR1kFvHBoDv7k=', 0, 69, 0);
INSERT INTO `user` (`username`, `name`, `email`, `password`, `isTeacher`, `avatar_id`, `experience`) VALUES
('abcdef', 'Al igual que en la estructura Al igual que en la estructura de datos', 'hay infinidad de posibilidades a la hora de seleccionar la arquitectura', 'Matemapp es una aplicacio n web por los siguientes motivos: o Escalabilidad: disponemos de un servidor el cua l gestiona las peticiones, esto, si el servidor esta bien configurado, nos proporciona garantí as sin importar cua ntas personas este n usando nuestra aplicacio n simulta neamente, tampoco implica costes adicionales con cada nuevo usuario. o Multiplataforma: para poder usar Matemapp lo u nico que se necesita es un navegador web, la aplicacio n ha sido testeada y funciona correctamente en los navegadores Google Chrome, Mozilla Firefox e Internet Explorer 8.0. Hoy en dí a hay herramientas que nos generan una App partiendo de una pa gina web, pudiendo ser instalada en Smartphone. Por todas estas ventajas se decidio hacer una aplicacio n web. o Centralización de los datos: al ser una aplicacio n web todo el almacenamiento de informacio n esta en el lado del servidor, esto libera el dispositivo del cliente de almacenar grandes cantidades de datos. o Requisitos mínimos: otra ventaja de ser una aplicacio n web es que no requiere grandes especificaciones en cuanto al hardware se refiere para usar la aplicacio n. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 10 o Disponibilidad: al estar alojado en un servidor, e stos ya tienen varias opciones en cuanto a soporte si alguno de los discos fallase, por ejemplo sistemas RAID. o Integridad: todos los datos que puedan comprometer al usuario han sido cifrados utilizando algoritmos de encriptacio n, uno de ellos ha sido AES (Advanced Encryption Standard). o Portabilidad: como aplicacio n web tan so lo necesitamos un navegador e Internet para poder acceder a Matemapp. o Actualizaciones automáticas: toda nueva actualizacio n que se realice en la aplicacio n la podra n disfrutar sin necesidad de descargar ninguna nueva versio n. 2.1.1.3 Desarrollo Una vez establecida la arquitectura que sera una aplicacio n web, llega el momento de ver y seleccionar que opciones dentro de aplicaciones web son las ma s favorables para el desarrollo del proyecto. o Back-End: Por parte del servidor, una tecnologí a que esta creciendo a gran velocidad es Node JS, su gran versatilidad y flexibilidad en el lado del cliente esta popularizando esta tecnologí a cada vez ma s. Se valoro en un primer momento desarrollar usando esta tecnologí a, pero nos encontramos dos inconvenientes; el desconocimiento de esta tecnologí a hací a que la curva de aprendizaje fuera muy lenta a la hora del desarrollo y en consecuencia no se habrí a podido programar haciendo uso de las buenas pra cticas. Otro inconveniente que se nos presenta al usar esta tecnologí a es la eleccio n de un hosting, actualmente no todos los hostings soportan la tecnologí a Node JS y los que dan este soporte son de un coste econo mico que no se podí a asumir para este trabajo de fin de tí tulo. Finalmente la opcio n considerada ma s acertada fue usar PHP, ya tení amos conocimientos previos de esta tecnologí a puesto que la estudiamos en el grado, no so lo por eso decidimos escoger PHP, actualmente la mayor cuota de mercado en el desarrollo web por parte del servidor la tiene PHP, esto nos da una gran fiabilidad y soporte a la hora de desarrollar. Tambie n hay una gran variedad de hostings que ofertan esta tecnologí a y a un precio ma s asequible. Tambie n se ha usado la tecnologí a AJAX para realizar cambios en la base de datos así ncronamente, sin necesidad de recargar la pa gina. o Front-End: Para desarrollar el lado del cliente se han usado las siguientes tecnologí as: ? HTML5: Hyper Text Markup Languaje, es la quinta versio n del lenguaje ba sico de la Word Wide Web. Es un lenguaje de etiquetado para el desarrollo de pa ginas webs. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 11 ? CSS3: Cascading Style Sheets, es un lenguaje usado para definir y crear el disen o de pa ginas web. Lo novedoso de CSS3 es que sus funcionalidades esta n divididas en varios documentos llamados mo dulos. Cada mo dulo an ade nuevas funcionalidades a las definidas en CSS2, preserva las anteriores versiones para mantener la compatibilidad. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 12 ? BootStrap: desarrollado por el equipo de Twitter, es una librerí a que trae una serie de clases con sus correspondientes disen os predefinidos, la ventaja de usar bootstrap es que reduces tiempo definiendo el estilo y, aplicando las clases correspondientes al disen o de los elementos HTML tendremos una pa gina web responsiva. ? SASS: Syntactically Awesome Stylesheet es un lenguaje de hoja de estilos, es un lenguaje script que es traducido a CSS. SASS contiene dos sintaxis, la sintaxis indentada, usa la indentacio n para separar bloques de co digo y el cara cter nueva lí nea para separar reglas. La otra sintaxis es SCSS, un formato de bloques como CSS, usa llaves para denotar bloques de co digo y punto y coma para separar las lí neas dentro de un bloque. ? JavaScript: lenguaje de programacio n principalmente orientado al lado del cliente. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 13 ? jQuery: es una librerí a de JavaScript que permite simplificar la manera de interactuar con los documentos HTML, manejar eventos, desarrollar animaciones y agregar interaccio n haciendo uso de la te cnica AJAX a pa ginas web. ? AJAX: Asynchronous JavaScript And XML, es una te cnica de desarrollo web, se ejecuta en el cliente mientras se mantiene la comunicacio n así ncrona con el servidor en segundo plano. 2.1.1.4 Entornos de desarrollo y producción Para este proyecto se ha dispuesto de un servicio de hosting en el cua l se ha alojado la aplicacio n web, el servicio de hosting tambie n proporcionaba una herramienta para trabajar con bases de datos. Para el desarrollo se uso el IDE PhpStorm, esta herramienta nos permite trabajar con CSS, HTML, JavaScript y PHP, aporta muchas facilidades a la hora de estructurar los ficheros, tambie n para refactorizar, notificando errores en el co digo, sugiriendo mejoras en el co digo y muchas cosas ma s. Se ha instalado un plugin a este IDE que nos permite conectarnos por FTP al servidor, abriendo ficheros directamente y modificarlos a medida que escribimos co digo por lo tanto se actualizan al momento, sin necesidad de usar clientes FTP adicionales, tenemos “todo en uno”, con esto agilizamos el trabajo. Ilustración 8: Logotipo PhpStorm MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 14 2.1.1.5 Control de versiones Matemapp es un proyecto tan grande que se ha dividido en tres trabajos de fin de tí tulo, este apartado es fundamental para el correcto desarrollo del proyecto, la sincronizacio n entre los desarrolladores es muy importante cuando estamos trabajando simulta neamente. Para el control de versiones se ha utilizado el sistema Git. El co digo de Matemapp se encuentra en un repositorio privado en Bitbucket. Para la sincronizacio n entre los avances que hací amos cada uno de los desarrolladores utiliza bamos SourceTree, esta herramienta nos permití a subir nuestros avances a Bitbucket y descargarnos los avances que hací an los otros desarrolladores en sus respectivos mo dulos, llevando un control para no entorpecer el trabajo de los dema s. 2.1.1.6 Metodologías de desarrollo El desarrollo del proyecto se ha llevado a cabo utilizando la metodologí a a gil SCRUM. Se pretendí a llevar una estrategia de desarrollo incremental, el objetivo era estar constantemente en contacto con el cliente a trave s de reuniones. Se creo un documento denominado backlog donde se reu nen todos los requisitos estimados que requiere el proyecto. Una vez establecido se le asigna una prioridad y el periodo de tiempo que conlleva su desarrollo, esto son los sprints del proyecto, su duracio n era de dos semanas. Al final de cada sprint el equipo se reuní a y mostraba los avances. Algunos de los puntos realizados son los siguientes: ? Daily meetings, reuniones en las que decí amos que se habí a hecho el dí a anterior y que se iba a hacer hoy. ? Actualizacio n de la gra fica Burn Down y de las historias de usuario. ? Desarrollo. 2.1.2 Diseño Ingenierí a del software: a continuacio n se describe las etapas por las cuales se llevo a cabo esta fase del proyecto. ? Captura y análisis de requisitos: este proceso se realizo mediante reuniones con el tutor Francisco J. Gil Cordeiro, profesor de ensen anza secundaria. En ellas Francisco detallaba el proceso de aprendizaje de los alumnos de segundo de la ESO respecto a las ecuaciones de primer grado. ? Evaluación técnica: se estudiaba que decisiones en cuanto a arquitectura del software serí an las ma s adecuadas para implementar. ? Refinar requisitos: acto seguido volví amos a reunirnos para mostrar el trabajo realizado durante las semanas previas, de estas reuniones saca bamos en claro que aspectos debí amos cambiar y mejorar. 2.1.3 Desarrollo Esta seccio n se explicara ma s detalladamente en el capí tulo de desarrollo, aquí se comentara algunas tareas que se llevaban a cabo en el desarrollo: ? Inicializacio n y puesta a punto del repositorio. ? Preparacio n del Sprint (Pueda ser el primero o el u ltimo) ? Comienzo del sprint con un Daily Meeting, que es lo que hicimos el dí a anterior y que vamos a hacer hoy. ? Actualizacio n de la gra fica Burn Down. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 15 ? Desarrollo. Es una aproximacio n al planning que tiene cada ciclo de desarrollo de la aplicacio n. 2.2 CII02 Capacidad para planificar, concebir, desplegar y dirigir proyectos, servicios y sistemas informáticos en todos los ámbitos, liderando su puesta en marcha y mejora continua y valorando su impacto económico y social. La planificacio n de este proyecto se ha desarrollado mediante reuniones con los dos tutores, ellos especificaban los requisitos y daban las pautas a seguir en cada una de las reuniones. Tambie n en estas reuniones se definio el alcance que tendrí a este trabajo fin de tí tulo. El backlog ha tomado un papel fundamental en la planificacio n puesto que ahí se registraban las historias de usuario a desarrollar en el proyecto. UAl igual que en la estructura de datos, hay infinidad de posibilidades a la hora de seleccionar la arquitectura, Matemapp es una aplicacio n web por los siguientes motivos: o Escalabilidad: disponemos de un servidor el cua l gestiona las peticiones, esto, si el servidor esta bien configurado, nos proporciona garantí as sin importar cua ntas personas este n usando nuestra aplicacio n simulta neamente, tampoco implica costes adicionales con cada nuevo usuario. o Multiplataforma: para poder usar Matemapp lo u nico que se necesita es un navegador web, la aplicacio n ha sido testeada y funciona correctamente en los navegadores Google Chrome, Mozilla Firefox e Internet Explorer 8.0. Hoy en dí a hay herramientas que nos generan una App partiendo de una pa gina web, pudiendo ser instalada en Smartphone. Por todas estas ventajas se decidio hacer una aplicacio n web. o Centralización de los datos: al ser una aplicacio n web todo el almacenamiento de informacio n esta en el lado del servidor, esto libera el dispositivo del cliente de almacenar grandes cantidades de datos. o Requisitos mínimos: otra ventaja de ser una aplicacio n web es que no requiere grandes especificaciones en cuanto al hardware se refiere para usar la aplicacio n. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 10 o Disponibilidad: al estar alojado en un servidor, e stos ya tienen varias opciones en cuanto a soporte si alguno de los discos fallase, por ejemplo sistemas RAID. o Integridad: todos los datos que puedan comprometer al usuario han sido cifrados utilizando algoritmos de encriptacio n, uno de ellos ha sido AES (Advanced Encryption Standard). o Portabilidad: como aplicacio n web tan so lo necesitamos un navegador e Internet para poder acceder a Matemapp. o Actualizaciones automáticas: toda nueva actualizacio n que se realice en la aplicacio n la podra n disfrutar sin necesidad de descargar ninguna nueva versio n. 2.1.1.3 Desarrollo Una vez establecida la arquitectura que sera una aplicacio n web, llega el momento de ver y seleccionar que opciones dentro de aplicaciones web son las ma s favorables para el desarrollo del proyecto. o Back-End: Por parte del servidor, una tecnologí a que esta creciendo a gran velocidad es Node JS, su gran versatilidad y flexibilidad en el lado del cliente esta popularizando esta tecnologí a cada vez ma s. Se valoro en un primer momento desarrollar usando esta tecnologí a, pero nos encontramos dos inconvenientes; el desconocimiento de esta tecnologí a hací a que la curva de aprendizaje fuera muy lenta a la hora del desarrollo y en consecuencia no se habrí a podido programar haciendo uso de las buenas pra cticas. Otro inconveniente que se nos presenta al usar esta tecnologí a es la eleccio n de un hosting, actualmente no todos los hostings soportan la tecnologí a Node JS y los que dan este soporte son de un coste econo mico que no se podí a asumir para este trabajo de fin de tí tulo. Finalmente la opcio n considerada ma s acertada fue usar PHP, ya tení amos conocimientos previos de esta tecnologí a puesto que la estudiamos en el grado, no so lo por eso decidimos escoger PHP, actualmente la mayor cuota de mercado en el desarrollo web por parte del servidor la tiene PHP, esto nos da una gran fiabilidad y soporte a la hora de desarrollar. Tambie n hay una gran variedad de hostings que ofertan esta tecnologí a y a un precio ma s asequible. Tambie n se ha usado la tecnologí a AJAX para realizar cambios en la base de datos así ncronamente, sin necesidad de recargar la pa gina. o Front-End: Para desarrollar el lado del cliente se han usado las siguientes tecnologí as: ? HTML5: Hyper Text Markup Languaje, es la quinta versio n del lenguaje ba sico de la Word Wide Web. Es un lenguaje de etiquetado para el desarrollo de pa ginas webs. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 11 ? CSS3: Cascading Style Sheets, es un lenguaje usado para definir y crear el disen o de pa ginas web. Lo novedoso de CSS3 es que sus funcionalidades esta n divididas en varios documentos llamados mo dulos. Cada mo dulo an ade nuevas funcionalidades a las definidas en CSS2, preserva las anteriores versiones para mantener la compatibilidad. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 12 ? BootStrap: desarrollado por el equipo de Twitter, es una librerí a que trae una serie de clases con sus correspondientes disen os predefinidos, la ventaja de usar bootstrap es que reduces tiempo definiendo el estilo y, aplicando las clases correspondientes al disen o de los elementos HTML tendremos una pa gina web responsiva. ? SASS: Syntactically Awesome Stylesheet es un lenguaje de hoja de estilos, es un lenguaje script que es traducido a CSS. SASS contiene dos sintaxis, la sintaxis indentada, usa la indentacio n para separar bloques de co digo y el cara cter nueva lí nea para separar reglas. La otra sintaxis es SCSS, un formato de bloques como CSS, usa llaves para denotar bloques de co digo y punto y coma para separar las lí neas dentro de un bloque. ? JavaScript: lenguaje de programacio n principalmente orientado al lado del cliente. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 13 ? jQuery: es una librerí a de JavaScript que permite simplificar la manera de interactuar con los documentos HTML, manejar eventos, desarrollar animaciones y agregar interaccio n haciendo uso de la te cnica AJAX a pa ginas web. ? AJAX: Asynchronous JavaScript And XML, es una te cnica de desarrollo web, se ejecuta en el cliente mientras se mantiene la comunicacio n así ncrona con el servidor en segundo plano. 2.1.1.4 Entornos de desarrollo y producción Para este proyecto se ha dispuesto de un servicio de hosting en el cua l se ha alojado la aplicacio n web, el servicio de hosting tambie n proporcionaba una herramienta para trabajar con bases de datos. Para el desarrollo se uso el IDE PhpStorm, esta herramienta nos permite trabajar con CSS, HTML, JavaScript y PHP, aporta muchas facilidades a la hora de estructurar los ficheros, tambie n para refactorizar, notificando errores en el co digo, sugiriendo mejoras en el co digo y muchas cosas ma s. Se ha instalado un plugin a este IDE que nos permite conectarnos por FTP al servidor, abriendo ficheros directamente y modificarlos a medida que escribimos co digo por lo tanto se actualizan al momento, sin necesidad de usar clientes FTP adicionales, tenemos “todo en uno”, con esto agilizamos el trabajo. Ilustración 8: Logotipo PhpStorm MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 14 2.1.1.5 Control de versiones Matemapp es un proyecto tan grande que se ha dividido en tres trabajos de fin de tí tulo, este apartado es fundamental para el correcto desarrollo del proyecto, la sincronizacio n entre los desarrolladores es muy importante cuando estamos trabajando simulta neamente. Para el control de versiones se ha utilizado el sistema Git. El co digo de Matemapp se encuentra en un repositorio privado en Bitbucket. Para la sincronizacio n entre los avances que hací amos cada uno de los desarrolladores utiliza bamos SourceTree, esta herramienta nos permití a subir nuestros avances a Bitbucket y descargarnos los avances que hací an los otros desarrolladores en sus respectivos mo dulos, llevando un control para no entorpecer el trabajo de los dema s. 2.1.1.6 Metodologías de desarrollo El desarrollo del proyecto se ha llevado a cabo utilizando la metodologí a a gil SCRUM. Se pretendí a llevar una estrategia de desarrollo incremental, el objetivo era estar constantemente en contacto con el cliente a trave s de reuniones. Se creo un documento denominado backlog donde se reu nen todos los requisitos estimados que requiere el proyecto. Una vez establecido se le asigna una prioridad y el periodo de tiempo que conlleva su desarrollo, esto son los sprints del proyecto, su duracio n era de dos semanas. Al final de cada sprint el equipo se reuní a y mostraba los avances. Algunos de los puntos realizados son los siguientes: ? Daily meetings, reuniones en las que decí amos que se habí a hecho el dí a anterior y que se iba a hacer hoy. ? Actualizacio n de la gra fica Burn Down y de las historias de usuario. ? Desarrollo. 2.1.2 Diseño Ingenierí a del software: a continuacio n se describe las etapas por las cuales se llevo a cabo esta fase del proyecto. ? Captura y análisis de requisitos: este proceso se realizo mediante reuniones con el tutor Francisco J. Gil Cordeiro, profesor de ensen anza secundaria. En ellas Francisco detallaba el proceso de aprendizaje de los alumnos de segundo de la ESO respecto a las ecuaciones de primer grado. ? Evaluación técnica: se estudiaba que decisiones en cuanto a arquitectura del software serí an las ma s adecuadas para implementar. ? Refinar requisitos: acto seguido volví amos a reunirnos para mostrar el trabajo realizado durante las semanas previas, de estas reuniones saca bamos en claro que aspectos debí amos cambiar y mejorar. 2.1.3 Desarrollo Esta seccio n se explicara ma s detalladamente en el capí tulo de desarrollo, aquí se comentara algunas tareas que se llevaban a cabo en el desarrollo: ? Inicializacio n y puesta a punto del repositorio. ? Preparacio n del Sprint (Pueda ser el primero o el u ltimo) ? Comienzo del sprint con un Daily Meeting, que es lo que hicimos el dí a anterior y que vamos a hacer hoy. ? Actualizacio n de la gra fica Burn Down. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 15 ? Desarrollo. Es una aproximacio n al planning que tiene cada ciclo de desarrollo de la aplicacio n. 2.2 CII02 Capacidad para planificar, concebir, desplegar y dirigir proyectos, servicios y sistemas informáticos en todos los ámbitos, liderando su puesta en marcha y mejora continua y valorando su impacto económico y social. La planificacio n de este proyecto se ha desarrollado mediante reuniones con los dos tutores, ellos especificaban los requisitos y daban las pautas a seguir en cada una de las reuniones. Tambie n en estas reuniones se definio el alcance que tendrí a este trabajo fin de tí tulo. El backlog ha tomado un papel fundamental en la planificacio n puesto que ahí se registraban las historias de usuario a desarrollar en el proyecto. UAl igual que en la estructura de datos, hay infinidad de posibilidades a la hora de seleccionar la arquitectura, Matemapp es una aplicacio n web por los siguientes motivos: o Escalabilidad: disponemos de un servidor el cua l gestiona las peticiones, esto, si el servidor esta bien configurado, nos proporciona garantí as sin importar cua ntas personas este n usando nuestra aplicacio n simulta neamente, tampoco implica costes adicionales con cada nuevo usuario. o Multiplataforma: para poder usar Matemapp lo u nico que se necesita es un navegador web, la aplicacio n ha sido testeada y funciona correctamente en los navegadores Google Chrome, Mozilla Firefox e Internet Explorer 8.0. Hoy en dí a hay herramientas que nos generan una App partiendo de una pa gina web, pudiendo ser instalada en Smartphone. Por todas estas ventajas se decidio hacer una aplicacio n web. o Centralización de los datos: al ser una aplicacio n web todo el almacenamiento de informacio n esta en el lado del servidor, esto libera el dispositivo del cliente de almacenar grandes cantidades de datos. o Requisitos mínimos: otra ventaja de ser una aplicacio n web es que no requiere grandes especificaciones en cuanto al hardware se refiere para usar la aplicacio n. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 10 o Disponibilidad: al estar alojado en un servidor, e stos ya tienen varias opciones en cuanto a soporte si alguno de los discos fallase, por ejemplo sistemas RAID. o Integridad: todos los datos que puedan comprometer al usuario han sido cifrados utilizando algoritmos de encriptacio n, uno de ellos ha sido AES (Advanced Encryption Standard). o Portabilidad: como aplicacio n web tan so lo necesitamos un navegador e Internet para poder acceder a Matemapp. o Actualizaciones automáticas: toda nueva actualizacio n que se realice en la aplicacio n la podra n disfrutar sin necesidad de descargar ninguna nueva versio n. 2.1.1.3 Desarrollo Una vez establecida la arquitectura que sera una aplicacio n web, llega el momento de ver y seleccionar que opciones dentro de aplicaciones web son las ma s favorables para el desarrollo del proyecto. o Back-End: Por parte del servidor, una tecnologí a que esta creciendo a gran velocidad es Node JS, su gran versatilidad y flexibilidad en el lado del cliente esta popularizando esta tecnologí a cada vez ma s. Se valoro en un primer momento desarrollar usando esta tecnologí a, pero nos encontramos dos inconvenientes; el desconocimiento de esta tecnologí a hací a que la curva de aprendizaje fuera muy lenta a la hora del desarrollo y en consecuencia no se habrí a podido programar haciendo uso de las buenas pra cticas. Otro inconveniente que se nos presenta al usar esta tecnologí a es la eleccio n de un hosting, actualmente no todos los hostings soportan la tecnologí a Node JS y los que dan este soporte son de un coste econo mico que no se podí a asumir para este trabajo de fin de tí tulo. Finalmente la opcio n considerada ma s acertada fue usar PHP, ya tení amos conocimientos previos de esta tecnologí a puesto que la estudiamos en el grado, no so lo por eso decidimos escoger PHP, actualmente la mayor cuota de mercado en el desarrollo web por parte del servidor la tiene PHP, esto nos da una gran fiabilidad y soporte a la hora de desarrollar. Tambie n hay una gran variedad de hostings que ofertan esta tecnologí a y a un precio ma s asequible. Tambie n se ha usado la tecnologí a AJAX para realizar cambios en la base de datos así ncronamente, sin necesidad de recargar la pa gina. o Front-End: Para desarrollar el lado del cliente se han usado las siguientes tecnologí as: ? HTML5: Hyper Text Markup Languaje, es la quinta versio n del lenguaje ba sico de la Word Wide Web. Es un lenguaje de etiquetado para el desarrollo de pa ginas webs. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 11 ? CSS3: Cascading Style Sheets, es un lenguaje usado para definir y crear el disen o de pa ginas web. Lo novedoso de CSS3 es que sus funcionalidades esta n divididas en varios documentos llamados mo dulos. Cada mo dulo an ade nuevas funcionalidades a las definidas en CSS2, preserva las anteriores versiones para mantener la compatibilidad. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 12 ? BootStrap: desarrollado por el equipo de Twitter, es una librerí a que trae una serie de clases con sus correspondientes disen os predefinidos, la ventaja de usar bootstrap es que reduces tiempo definiendo el estilo y, aplicando las clases correspondientes al disen o de los elementos HTML tendremos una pa gina web responsiva. ? SASS: Syntactically Awesome Stylesheet es un lenguaje de hoja de estilos, es un lenguaje script que es traducido a CSS. SASS contiene dos sintaxis, la sintaxis indentada, usa la indentacio n para separar bloques de co digo y el cara cter nueva lí nea para separar reglas. La otra sintaxis es SCSS, un formato de bloques como CSS, usa llaves para denotar bloques de co digo y punto y coma para separar las lí neas dentro de un bloque. ? JavaScript: lenguaje de programacio n principalmente orientado al lado del cliente. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 13 ? jQuery: es una librerí a de JavaScript que permite simplificar la manera de interactuar con los documentos HTML, manejar eventos, desarrollar animaciones y agregar interaccio n haciendo uso de la te cnica AJAX a pa ginas web. ? AJAX: Asynchronous JavaScript And XML, es una te cnica de desarrollo web, se ejecuta en el cliente mientras se mantiene la comunicacio n así ncrona con el servidor en segundo plano. 2.1.1.4 Entornos de desarrollo y producción Para este proyecto se ha dispuesto de un servicio de hosting en el cua l se ha alojado la aplicacio n web, el servicio de hosting tambie n proporcionaba una herramienta para trabajar con bases de datos. Para el desarrollo se uso el IDE PhpStorm, esta herramienta nos permite trabajar con CSS, HTML, JavaScript y PHP, aporta muchas facilidades a la hora de estructurar los ficheros, tambie n para refactorizar, notificando errores en el co digo, sugiriendo mejoras en el co digo y muchas cosas ma s. Se ha instalado un plugin a este IDE que nos permite conectarnos por FTP al servidor, abriendo ficheros directamente y modificarlos a medida que escribimos co digo por lo tanto se actualizan al momento, sin necesidad de usar clientes FTP adicionales, tenemos “todo en uno”, con esto agilizamos el trabajo. Ilustración 8: Logotipo PhpStorm MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 14 2.1.1.5 Control de versiones Matemapp es un proyecto tan grande que se ha dividido en tres trabajos de fin de tí tulo, este apartado es fundamental para el correcto desarrollo del proyecto, la sincronizacio n entre los desarrolladores es muy importante cuando estamos trabajando simulta neamente. Para el control de versiones se ha utilizado el sistema Git. El co digo de Matemapp se encuentra en un repositorio privado en Bitbucket. Para la sincronizacio n entre los avances que hací amos cada uno de los desarrolladores utiliza bamos SourceTree, esta herramienta nos permití a subir nuestros avances a Bitbucket y descargarnos los avances que hací an los otros desarrolladores en sus respectivos mo dulos, llevando un control para no entorpecer el trabajo de los dema s. 2.1.1.6 Metodologías de desarrollo El desarrollo del proyecto se ha llevado a cabo utilizando la metodologí a a gil SCRUM. Se pretendí a llevar una estrategia de desarrollo incremental, el objetivo era estar constantemente en contacto con el cliente a trave s de reuniones. Se creo un documento denominado backlog donde se reu nen todos los requisitos estimados que requiere el proyecto. Una vez establecido se le asigna una prioridad y el periodo de tiempo que conlleva su desarrollo, esto son los sprints del proyecto, su duracio n era de dos semanas. Al final de cada sprint el equipo se reuní a y mostraba los avances. Algunos de los puntos realizados son los siguientes: ? Daily meetings, reuniones en las que decí amos que se habí a hecho el dí a anterior y que se iba a hacer hoy. ? Actualizacio n de la gra fica Burn Down y de las historias de usuario. ? Desarrollo. 2.1.2 Diseño Ingenierí a del software: a continuacio n se describe las etapas por las cuales se llevo a cabo esta fase del proyecto. ? Captura y análisis de requisitos: este proceso se realizo mediante reuniones con el tutor Francisco J. Gil Cordeiro, profesor de ensen anza secundaria. En ellas Francisco detallaba el proceso de aprendizaje de los alumnos de segundo de la ESO respecto a las ecuaciones de primer grado. ? Evaluación técnica: se estudiaba que decisiones en cuanto a arquitectura del software serí an las ma s adecuadas para implementar. ? Refinar requisitos: acto seguido volví amos a reunirnos para mostrar el trabajo realizado durante las semanas previas, de estas reuniones saca bamos en claro que aspectos debí amos cambiar y mejorar. 2.1.3 Desarrollo Esta seccio n se explicara ma s detalladamente en el capí tulo de desarrollo, aquí se comentara algunas tareas que se llevaban a cabo en el desarrollo: ? Inicializacio n y puesta a punto del repositorio. ? Preparacio n del Sprint (Pueda ser el primero o el u ltimo) ? Comienzo del sprint con un Daily Meeting, que es lo que hicimos el dí a anterior y que vamos a hacer hoy. ? Actualizacio n de la gra fica Burn Down. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 15 ? Desarrollo. Es una aproximacio n al planning que tiene cada ciclo de desarrollo de la aplicacio n. 2.2 CII02 Capacidad para planificar, concebir, desplegar y dirigir proyectos, servicios y sistemas informáticos en todos los ámbitos, liderando su puesta en marcha y mejora continua y valorando su impacto económico y social. La planificacio n de este proyecto se ha desarrollado mediante reuniones con los dos tutores, ellos especificaban los requisitos y daban las pautas a seguir en cada una de las reuniones. Tambie n en estas reuniones se definio el alcance que tendrí a este trabajo fin de tí tulo. El backlog ha tomado un papel fundamental en la planificacio n puesto que ahí se registraban las historias de usuario a desarrollar en el proyecto. UsssAl igual que en la estructura de datos, hay infinidad de posibilidades a la hora de seleccionar la arquitectura, Matemapp es una aplicacio n web por los siguientes motivos: o Escalabilidad: disponemos de un servidor el cua l gestiona las peticiones, esto, si el servidor esta bien configurado, nos proporciona garantí as sin importar cua ntas personas este n usando nuestra aplicacio n simulta neamente, tampoco implica costes adicionales con cada nuevo usuario. o Multiplataforma: para poder usar Matemapp lo u nico que se necesita es un navegador web, la aplicacio n ha sido testeada y funciona correctamente en los navegadores Google Chrome, Mozilla Firefox e Internet Explorer 8.0. Hoy en dí a hay herramientas que nos generan una App partiendo de una pa gina web, pudiendo ser instalada en Smartphone. Por todas estas ventajas se decidio hacer una aplicacio n web. o Centralización de los datos: al ser una aplicacio n web todo el almacenamiento de informacio n esta en el lado del servidor, esto libera el dispositivo del cliente de almacenar grandes cantidades de datos. o Requisitos mínimos: otra ventaja de ser una aplicacio n web es que no requiere grandes especificaciones en cuanto al hardware se refiere para usar la aplicacio n. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 10 o Disponibilidad: al estar alojado en un servidor, e stos ya tienen varias opciones en cuanto a soporte si alguno de los discos fallase, por ejemplo sistemas RAID. o Integridad: todos los datos que puedan comprometer al usuario han sido cifrados utilizando algoritmos de encriptacio n, uno de ellos ha sido AES (Advanced Encryption Standard). o Portabilidad: como aplicacio n web tan so lo necesitamos un navegador e Internet para poder acceder a Matemapp. o Actualizaciones automáticas: toda nueva actualizacio n que se realice en la aplicacio n la podra n disfrutar sin necesidad de descargar ninguna nueva versio n. 2.1.1.3 Desarrollo Una vez establecida la arquitectura que sera una aplicacio n web, llega el momento de ver y seleccionar que opciones dentro de aplicaciones web son las ma s favorables para el desarrollo del proyecto. o Back-End: Por parte del servidor, una tecnologí a que esta creciendo a gran velocidad es Node JS, su gran versatilidad y flexibilidad en el lado del cliente esta popularizando esta tecnologí a cada vez ma s. Se valoro en un primer momento desarrollar usando esta tecnologí a, pero nos encontramos dos inconvenientes; el desconocimiento de esta tecnologí a hací a que la curva de aprendizaje fuera muy lenta a la hora del desarrollo y en consecuencia no se habrí a podido programar haciendo uso de las buenas pra cticas. Otro inconveniente que se nos presenta al usar esta tecnologí a es la eleccio n de un hosting, actualmente no todos los hostings soportan la tecnologí a Node JS y los que dan este soporte son de un coste econo mico que no se podí a asumir para este trabajo de fin de tí tulo. Finalmente la opcio n considerada ma s acertada fue usar PHP, ya tení amos conocimientos previos de esta tecnologí a puesto que la estudiamos en el grado, no so lo por eso decidimos escoger PHP, actualmente la mayor cuota de mercado en el desarrollo web por parte del servidor la tiene PHP, esto nos da una gran fiabilidad y soporte a la hora de desarrollar. Tambie n hay una gran variedad de hostings que ofertan esta tecnologí a y a un precio ma s asequible. Tambie n se ha usado la tecnologí a AJAX para realizar cambios en la base de datos así ncronamente, sin necesidad de recargar la pa gina. o Front-End: Para desarrollar el lado del cliente se han usado las siguientes tecnologí as: ? HTML5: Hyper Text Markup Languaje, es la quinta versio n del lenguaje ba sico de la Word Wide Web. Es un lenguaje de etiquetado para el desarrollo de pa ginas webs. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 11 ? CSS3: Cascading Style Sheets, es un lenguaje usado para definir y crear el disen o de pa ginas web. Lo novedoso de CSS3 es que sus funcionalidades esta n divididas en varios documentos llamados mo dulos. Cada mo dulo an ade nuevas funcionalidades a las definidas en CSS2, preserva las anteriores versiones para mantener la compatibilidad. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 12 ? BootStrap: desarrollado por el equipo de Twitter, es una librerí a que trae una serie de clases con sus correspondientes disen os predefinidos, la ventaja de usar bootstrap es que reduces tiempo definiendo el estilo y, aplicando las clases correspondientes al disen o de los elementos HTML tendremos una pa gina web responsiva. ? SASS: Syntactically Awesome Stylesheet es un lenguaje de hoja de estilos, es un lenguaje script que es traducido a CSS. SASS contiene dos sintaxis, la sintaxis indentada, usa la indentacio n para separar bloques de co digo y el cara cter nueva lí nea para separar reglas. La otra sintaxis es SCSS, un formato de bloques como CSS, usa llaves para denotar bloques de co digo y punto y coma para separar las lí neas dentro de un bloque. ? JavaScript: lenguaje de programacio n principalmente orientado al lado del cliente. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 13 ? jQuery: es una librerí a de JavaScript que permite simplificar la manera de interactuar con los documentos HTML, manejar eventos, desarrollar animaciones y agregar interaccio n haciendo uso de la te cnica AJAX a pa ginas web. ? AJAX: Asynchronous JavaScript And XML, es una te cnica de desarrollo web, se ejecuta en el cliente mientras se mantiene la comunicacio n así ncrona con el servidor en segundo plano. 2.1.1.4 Entornos de desarrollo y producción Para este proyecto se ha dispuesto de un servicio de hosting en el cua l se ha alojado la aplicacio n web, el servicio de hosting tambie n proporcionaba una herramienta para trabajar con bases de datos. Para el desarrollo se uso el IDE PhpStorm, esta herramienta nos permite trabajar con CSS, HTML, JavaScript y PHP, aporta muchas facilidades a la hora de estructurar los ficheros, tambie n para refactorizar, notificando errores en el co digo, sugiriendo mejoras en el co digo y muchas cosas ma s. Se ha instalado un plugin a este IDE que nos permite conectarnos por FTP al servidor, abriendo ficheros directamente y modificarlos a medida que escribimos co digo por lo tanto se actualizan al momento, sin necesidad de usar clientes FTP adicionales, tenemos “todo en uno”, con esto agilizamos el trabajo. Ilustración 8: Logotipo PhpStorm MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 14 2.1.1.5 Control de versiones Matemapp es un proyecto tan grande que se ha dividido en tres trabajos de fin de tí tulo, este apartado es fundamental para el correcto desarrollo del proyecto, la sincronizacio n entre los desarrolladores es muy importante cuando estamos trabajando simulta neamente. Para el control de versiones se ha utilizado el sistema Git. El co digo de Matemapp se encuentra en un repositorio privado en Bitbucket. Para la sincronizacio n entre los avances que hací amos cada uno de los desarrolladores utiliza bamos SourceTree, esta herramienta nos permití a subir nuestros avances a Bitbucket y descargarnos los avances que hací an los otros desarrolladores en sus respectivos mo dulos, llevando un control para no entorpecer el trabajo de los dema s. 2.1.1.6 Metodologías de desarrollo El desarrollo del proyecto se ha llevado a cabo utilizando la metodologí a a gil SCRUM. Se pretendí a llevar una estrategia de desarrollo incremental, el objetivo era estar constantemente en contacto con el cliente a trave s de reuniones. Se creo un documento denominado backlog donde se reu nen todos los requisitos estimados que requiere el proyecto. Una vez establecido se le asigna una prioridad y el periodo de tiempo que conlleva su desarrollo, esto son los sprints del proyecto, su duracio n era de dos semanas. Al final de cada sprint el equipo se reuní a y mostraba los avances. Algunos de los puntos realizados son los siguientes: ? Daily meetings, reuniones en las que decí amos que se habí a hecho el dí a anterior y que se iba a hacer hoy. ? Actualizacio n de la gra fica Burn Down y de las historias de usuario. ? Desarrollo. 2.1.2 Diseño Ingenierí a del software: a continuacio n se describe las etapas por las cuales se llevo a cabo esta fase del proyecto. ? Captura y análisis de requisitos: este proceso se realizo mediante reuniones con el tutor Francisco J. Gil Cordeiro, profesor de ensen anza secundaria. En ellas Francisco detallaba el proceso de aprendizaje de los alumnos de segundo de la ESO respecto a las ecuaciones de primer grado. ? Evaluación técnica: se estudiaba que decisiones en cuanto a arquitectura del software serí an las ma s adecuadas para implementar. ? Refinar requisitos: acto seguido volví amos a reunirnos para mostrar el trabajo realizado durante las semanas previas, de estas reuniones saca bamos en claro que aspectos debí amos cambiar y mejorar. 2.1.3 Desarrollo Esta seccio n se explicara ma s detalladamente en el capí tulo de desarrollo, aquí se comentara algunas tareas que se llevaban a cabo en el desarrollo: ? Inicializacio n y puesta a punto del repositorio. ? Preparacio n del Sprint (Pueda ser el primero o el u ltimo) ? Comienzo del sprint con un Daily Meeting, que es lo que hicimos el dí a anterior y que vamos a hacer hoy. ? Actualizacio n de la gra fica Burn Down. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 15 ? Desarrollo. Es una aproximacio n al planning que tiene cada ciclo de desarrollo de la aplicacio n. 2.2 CII02 Capacidad para planificar, concebir, desplegar y dirigir proyectos, servicios y sistemas informáticos en todos los ámbitos, liderando su puesta en marcha y mejora continua y valorando su impacto económico y social. La planificacio n de este proyecto se ha desarrollado mediante reuniones con los dos tutores, ellos especificaban los requisitos y daban las pautas a seguir en cada una de las reuniones. Tambie n en estas reuniones se definio el alcance que tendrí a este trabajo fin de tí tulo. El backlog ha tomado un papel fundamental en la planificacio n puesto que ahí se registraban las historias de usuario a desarrollar en el proyecto. UAl igual que en la estructura de datos, hay infinidad de posibilidades a la hora de seleccionar la arquitectura, Matemapp es una aplicacio n web por los siguientes motivos: o Escalabilidad: disponemos de un servidor el cua l gestiona las peticiones, esto, si el servidor esta bien configurado, nos proporciona garantí as sin importar cua ntas personas este n usando nuestra aplicacio n simulta neamente, tampoco implica costes adicionales con cada nuevo usuario. o Multiplataforma: para poder usar Matemapp lo u nico que se necesita es un navegador web, la aplicacio n ha sido testeada y funciona correctamente en los navegadores Google Chrome, Mozilla Firefox e Internet Explorer 8.0. Hoy en dí a hay herramientas que nos generan una App partiendo de una pa gina web, pudiendo ser instalada en Smartphone. Por todas estas ventajas se decidio hacer una aplicacio n web. o Centralización de los datos: al ser una aplicacio n web todo el almacenamiento de informacio n esta en el lado del servidor, esto libera el dispositivo del cliente de almacenar grandes cantidades de datos. o Requisitos mínimos: otra ventaja de ser una aplicacio n web es que no requiere grandes especificaciones en cuanto al hardware se refiere para usar la aplicacio n. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 10 o Disponibilidad: al estar alojado en un servidor, e stos ya tienen varias opciones en cuanto a soporte si alguno de los discos fallase, por ejemplo sistemas RAID. o Integridad: todos los datos que puedan comprometer al usuario han sido cifrados utilizando algoritmos de encriptacio n, uno de ellos ha sido AES (Advanced Encryption Standard). o Portabilidad: como aplicacio n web tan so lo necesitamos un navegador e Internet para poder acceder a Matemapp. o Actualizaciones automáticas: toda nueva actualizacio n que se realice en la aplicacio n la podra n disfrutar sin necesidad de descargar ninguna nueva versio n. 2.1.1.3 Desarrollo Una vez establecida la arquitectura que sera una aplicacio n web, llega el momento de ver y seleccionar que opciones dentro de aplicaciones web son las ma s favorables para el desarrollo del proyecto. o Back-End: Por parte del servidor, una tecnologí a que esta creciendo a gran velocidad es Node JS, su gran versatilidad y flexibilidad en el lado del cliente esta popularizando esta tecnologí a cada vez ma s. Se valoro en un primer momento desarrollar usando esta tecnologí a, pero nos encontramos dos inconvenientes; el desconocimiento de esta tecnologí a hací a que la curva de aprendizaje fuera muy lenta a la hora del desarrollo y en consecuencia no se habrí a podido programar haciendo uso de las buenas pra cticas. Otro inconveniente que se nos presenta al usar esta tecnologí a es la eleccio n de un hosting, actualmente no todos los hostings soportan la tecnologí a Node JS y los que dan este soporte son de un coste econo mico que no se podí a asumir para este trabajo de fin de tí tulo. Finalmente la opcio n considerada ma s acertada fue usar PHP, ya tení amos conocimientos previos de esta tecnologí a puesto que la estudiamos en el grado, no so lo por eso decidimos escoger PHP, actualmente la mayor cuota de mercado en el desarrollo web por parte del servidor la tiene PHP, esto nos da una gran fiabilidad y soporte a la hora de desarrollar. Tambie n hay una gran variedad de hostings que ofertan esta tecnologí a y a un precio ma s asequible. Tambie n se ha usado la tecnologí a AJAX para realizar cambios en la base de datos así ncronamente, sin necesidad de recargar la pa gina. o Front-End: Para desarrollar el lado del cliente se han usado las siguientes tecnologí as: ? HTML5: Hyper Text Markup Languaje, es la quinta versio n del lenguaje ba sico de la Word Wide Web. Es un lenguaje de etiquetado para el desarrollo de pa ginas webs. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 11 ? CSS3: Cascading Style Sheets, es un lenguaje usado para definir y crear el disen o de pa ginas web. Lo novedoso de CSS3 es que sus funcionalidades esta n divididas en varios documentos llamados mo dulos. Cada mo dulo an ade nuevas funcionalidades a las definidas en CSS2, preserva las anteriores versiones para mantener la compatibilidad. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 12 ? BootStrap: desarrollado por el equipo de Twitter, es una librerí a que trae una serie de clases con sus correspondientes disen os predefinidos, la ventaja de usar bootstrap es que reduces tiempo definiendo el estilo y, aplicando las clases correspondientes al disen o de los elementos HTML tendremos una pa gina web responsiva. ? SASS: Syntactically Awesome Stylesheet es un lenguaje de hoja de estilos, es un lenguaje script que es traducido a CSS. SASS contiene dos sintaxis, la sintaxis indentada, usa la indentacio n para separar bloques de co digo y el cara cter nueva lí nea para separar reglas. La otra sintaxis es SCSS, un formato de bloques como CSS, usa llaves para denotar bloques de co digo y punto y coma para separar las lí neas dentro de un bloque. ? JavaScript: lenguaje de programacio n principalmente orientado al lado del cliente. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 13 ? jQuery: es una librerí a de JavaScript que permite simplificar la manera de interactuar con los documentos HTML, manejar eventos, desarrollar animaciones y agregar interaccio n haciendo uso de la te cnica AJAX a pa ginas web. ? AJAX: Asynchronous JavaScript And XML, es una te cnica de desarrollo web, se ejecuta en el cliente mientras se mantiene la comunicacio n así ncrona con el servidor en segundo plano. 2.1.1.4 Entornos de desarrollo y producción Para este proyecto se ha dispuesto de un servicio de hosting en el cua l se ha alojado la aplicacio n web, el servicio de hosting tambie n proporcionaba una herramienta para trabajar con bases de datos. Para el desarrollo se uso el IDE PhpStorm, esta herramienta nos permite trabajar con CSS, HTML, JavaScript y PHP, aporta muchas facilidades a la hora de estructurar los ficheros, tambie n para refactorizar, notificando errores en el co digo, sugiriendo mejoras en el co digo y muchas cosas ma s. Se ha instalado un plugin a este IDE que nos permite conectarnos por FTP al servidor, abriendo ficheros directamente y modificarlos a medida que escribimos co digo por lo tanto se actualizan al momento, sin necesidad de usar clientes FTP adicionales, tenemos “todo en uno”, con esto agilizamos el trabajo. Ilustración 8: Logotipo PhpStorm MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 14 2.1.1.5 Control de versiones Matemapp es un proyecto tan grande que se ha dividido en tres trabajos de fin de tí tulo, este apartado es fundamental para el correcto desarrollo del proyecto, la sincronizacio n entre los desarrolladores es muy importante cuando estamos trabajando simulta neamente. Para el control de versiones se ha utilizado el sistema Git. El co digo de Matemapp se encuentra en un repositorio privado en Bitbucket. Para la sincronizacio n entre los avances que hací amos cada uno de los desarrolladores utiliza bamos SourceTree, esta herramienta nos permití a subir nuestros avances a Bitbucket y descargarnos los avances que hací an los otros desarrolladores en sus respectivos mo dulos, llevando un control para no entorpecer el trabajo de los dema s. 2.1.1.6 Metodologías de desarrollo El desarrollo del proyecto se ha llevado a cabo utilizando la metodologí a a gil SCRUM. Se pretendí a llevar una estrategia de desarrollo incremental, el objetivo era estar constantemente en contacto con el cliente a trave s de reuniones. Se creo un documento denominado backlog donde se reu nen todos los requisitos estimados que requiere el proyecto. Una vez establecido se le asigna una prioridad y el periodo de tiempo que conlleva su desarrollo, esto son los sprints del proyecto, su duracio n era de dos semanas. Al final de cada sprint el equipo se reuní a y mostraba los avances. Algunos de los puntos realizados son los siguientes: ? Daily meetings, reuniones en las que decí amos que se habí a hecho el dí a anterior y que se iba a hacer hoy. ? Actualizacio n de la gra fica Burn Down y de las historias de usuario. ? Desarrollo. 2.1.2 Diseño Ingenierí a del software: a continuacio n se describe las etapas por las cuales se llevo a cabo esta fase del proyecto. ? Captura y análisis de requisitos: este proceso se realizo mediante reuniones con el tutor Francisco J. Gil Cordeiro, profesor de ensen anza secundaria. En ellas Francisco detallaba el proceso de aprendizaje de los alumnos de segundo de la ESO respecto a las ecuaciones de primer grado. ? Evaluación técnica: se estudiaba que decisiones en cuanto a arquitectura del software serí an las ma s adecuadas para implementar. ? Refinar requisitos: acto seguido volví amos a reunirnos para mostrar el trabajo realizado durante las semanas previas, de estas reuniones saca bamos en claro que aspectos debí amos cambiar y mejorar. 2.1.3 Desarrollo Esta seccio n se explicara ma s detalladamente en el capí tulo de desarrollo, aquí se comentara algunas tareas que se llevaban a cabo en el desarrollo: ? Inicializacio n y puesta a punto del repositorio. ? Preparacio n del Sprint (Pueda ser el primero o el u ltimo) ? Comienzo del sprint con un Daily Meeting, que es lo que hicimos el dí a anterior y que vamos a hacer hoy. ? Actualizacio n de la gra fica Burn Down. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 15 ? Desarrollo. Es una aproximacio n al planning que tiene cada ciclo de desarrollo de la aplicacio n. 2.2 CII02 Capacidad para planificar, concebir, desplegar y dirigir proyectos, servicios y sistemas informáticos en todos los ámbitos, liderando su puesta en marcha y mejora continua y valorando su impacto económico y social. La planificacio n de este proyecto se ha desarrollado mediante reuniones con los dos tutores, ellos especificaban los requisitos y daban las pautas a seguir en cada una de las reuniones. Tambie n en estas reuniones se definio el alcance que tendrí a este trabajo fin de tí tulo. El backlog ha tomado un papel fundamental en la planificacio n puesto que ahí se registraban las historias de usuario a desarrollar en el proyecto. Udatos, hay infinidad de posibilidades a la hora de seleccionar la arquitectura, Matemapp es una aplicacio n web por los siguientes motivos: o Escalabilidad: disponemos de un servidor el cua l gestiona las peticiones, esto, si el servidor esta bien configurado, nos proporciona garantí as sin importar cua ntas personas este n usando nuestra aplicacio n simulta neamente, tampoco implica costes adicionales con cada nuevo usuario. o Multiplataforma: para poder usar Matemapp lo u nico que se necesita es un navegador web, la aplicacio n ha sido testeada y funciona correctamente en los navegadores Google Chrome, Mozilla Firefox e Internet Explorer 8.0. Hoy en dí a hay herramientas que nos generan una App partiendo de una pa gina web, pudiendo ser instalada en Smartphone. Por todas estas ventajas se decidio hacer una aplicacio n web. o Centralización de los datos: al ser una aplicacio n web todo el almacenamiento de informacio n esta en el lado del servidor, esto libera el dispositivo del cliente de almacenar grandes cantidades de datos. o Requisitos mínimos: otra ventaja de ser una aplicacio n web es que no requiere grandes especificaciones en cuanto al hardware se refiere para usar la aplicacio n. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 10 o Disponibilidad: al estar alojado en un servidor, e stos ya tienen varias opciones en cuanto a soporte si alguno de los discos fallase, por ejemplo sistemas RAID. o Integridad: todos los datos que puedan comprometer al usuario han sido cifrados utilizando algoritmos de encriptacio n, uno de ellos ha sido AES (Advanced Encryption Standard). o Portabilidad: como aplicacio n web tan so lo necesitamos un navegador e Internet para poder acceder a Matemapp. o Actualizaciones automáticas: toda nueva actualizacio n que se realice en la aplicacio n la podra n disfrutar sin necesidad de descargar ninguna nueva versio n. 2.1.1.3 Desarrollo Una vez establecida la arquitectura que sera una aplicacio n web, llega el momento de ver y seleccionar que opciones dentro de aplicaciones web son las ma s favorables para el desarrollo del proyecto. o Back-End: Por parte del servidor, una tecnologí a que esta creciendo a gran velocidad es Node JS, su gran versatilidad y flexibilidad en el lado del cliente esta popularizando esta tecnologí a cada vez ma s. Se valoro en un primer momento desarrollar usando esta tecnologí a, pero nos encontramos dos inconvenientes; el desconocimiento de esta tecnologí a hací a que la curva de aprendizaje fuera muy lenta a la hora del desarrollo y en consecuencia no se habrí a podido programar haciendo uso de las buenas pra cticas. Otro inconveniente que se nos presenta al usar esta tecnologí a es la eleccio n de un hosting, actualmente no todos los hostings soportan la tecnologí a Node JS y los que dan este soporte son de un coste econo mico que no se podí a asumir para este trabajo de fin de tí tulo. Finalmente la opcio n considerada ma s acertada fue usar PHP, ya tení amos conocimientos previos de esta tecnologí a puesto que la estudiamos en el grado, no so lo por eso decidimos escoger PHP, actualmente la mayor cuota de mercado en el desarrollo web por parte del servidor la tiene PHP, esto nos da una gran fiabilidad y soporte a la hora de desarrollar. Tambie n hay una gran variedad de hostings que ofertan esta tecnologí a y a un precio ma s asequible. Tambie n se ha usado la tecnologí a AJAX para realizar cambios en la base de datos así ncronamente, sin necesidad de recargar la pa gina. o Front-End: Para desarrollar el lado del cliente se han usado las siguientes tecnologí as: ? HTML5: Hyper Text Markup Languaje, es la quinta versio n del lenguaje ba sico de la Word Wide Web. Es un lenguaje de etiquetado para el desarrollo de pa ginas webs. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 11 ? CSS3: Cascading Style Sheets, es un lenguaje usado para definir y crear el disen o de pa ginas web. Lo novedoso de CSS3 es que sus funcionalidades esta n divididas en varios documentos llamados mo dulos. Cada mo dulo an ade nuevas funcionalidades a las definidas en CSS2, preserva las anteriores versiones para mantener la compatibilidad. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 12 ? BootStrap: desarrollado por el equipo de Twitter, es una librerí a que trae una serie de clases con sus correspondientes disen os predefinidos, la ventaja de usar bootstrap es que reduces tiempo definiendo el estilo y, aplicando las clases correspondientes al disen o de los elementos HTML tendremos una pa gina web responsiva. ? SASS: Syntactically Awesome Stylesheet es un lenguaje de hoja de estilos, es un lenguaje script que es traducido a CSS. SASS contiene dos sintaxis, la sintaxis indentada, usa la indentacio n para separar bloques de co digo y el cara cter nueva lí nea para separar reglas. La otra sintaxis es SCSS, un formato de bloques como CSS, usa llaves para denotar bloques de co digo y punto y coma para separar las lí neas dentro de un bloque. ? JavaScript: lenguaje de programacio n principalmente orientado al lado del cliente. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 13 ? jQuery: es una librerí a de JavaScript que permite simplificar la manera de interactuar con los documentos HTML, manejar eventos, desarrollar animaciones y agregar interaccio n haciendo uso de la te cnica AJAX a pa ginas web. ? AJAX: Asynchronous JavaScript And XML, es una te cnica de desarrollo web, se ejecuta en el cliente mientras se mantiene la comunicacio n así ncrona con el servidor en segundo plano. 2.1.1.4 Entornos de desarrollo y producción Para este proyecto se ha dispuesto de un servicio de hosting en el cua l se ha alojado la aplicacio n web, el servicio de hosting tambie n proporcionaba una herramienta para trabajar con bases de datos. Para el desarrollo se uso el IDE PhpStorm, esta herramienta nos permite trabajar con CSS, HTML, JavaScript y PHP, aporta muchas facilidades a la hora de estructurar los ficheros, tambie n para refactorizar, notificando errores en el co digo, sugiriendo mejoras en el co digo y muchas cosas ma s. Se ha instalado un plugin a este IDE que nos permite conectarnos por FTP al servidor, abriendo ficheros directamente y modificarlos a medida que escribimos co digo por lo tanto se actualizan al momento, sin necesidad de usar clientes FTP adicionales, tenemos “todo en uno”, con esto agilizamos el trabajo. Ilustración 8: Logotipo PhpStorm MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 14 2.1.1.5 Control de versiones Matemapp es un proyecto tan grande que se ha dividido en tres trabajos de fin de tí tulo, este apartado es fundamental para el correcto desarrollo del proyecto, la sincronizacio n entre los desarrolladores es muy importante cuando estamos trabajando simulta neamente. Para el control de versiones se ha utilizado el sistema Git. El co digo de Matemapp se encuentra en un repositorio privado en Bitbucket. Para la sincronizacio n entre los avances que hací amos cada uno de los desarrolladores utiliza bamos SourceTree, esta herramienta nos permití a subir nuestros avances a Bitbucket y descargarnos los avances que hací an los otros desarrolladores en sus respectivos mo dulos, llevando un control para no entorpecer el trabajo de los dema s. 2.1.1.6 Metodologías de desarrollo El desarrollo del proyecto se ha llevado a cabo utilizando la metodologí a a gil SCRUM. Se pretendí a llevar una estrategia de desarrollo incremental, el objetivo era estar constantemente en contacto con el cliente a trave s de reuniones. Se creo un documento denominado backlog donde se reu nen todos los requisitos estimados que requiere el proyecto. Una vez establecido se le asigna una prioridad y el periodo de tiempo que conlleva su desarrollo, esto son los sprints del proyecto, su duracio n era de dos semanas. Al final de cada sprint el equipo se reuní a y mostraba los avances. Algunos de los puntos realizados son los siguientes: ? Daily meetings, reuniones en las que decí amos que se habí a hecho el dí a anterior y que se iba a hacer hoy. ? Actualizacio n de la gra fica Burn Down y de las historias de usuario. ? Desarrollo. 2.1.2 Diseño Ingenierí a del software: a continuacio n se describe las etapas por las cuales se llevo a cabo esta fase del proyecto. ? Captura y análisis de requisitos: este proceso se realizo mediante reuniones con el tutor Francisco J. Gil Cordeiro, profesor de ensen anza secundaria. En ellas Francisco detallaba el proceso de aprendizaje de los alumnos de segundo de la ESO respecto a las ecuaciones de primer grado. ? Evaluación técnica: se estudiaba que decisiones en cuanto a arquitectura del software serí an las ma s adecuadas para implementar. ? Refinar requisitos: acto seguido volví amos a reunirnos para mostrar el trabajo realizado durante las semanas previas, de estas reuniones saca bamos en claro que aspectos debí amos cambiar y mejorar. 2.1.3 Desarrollo Esta seccio n se explicara ma s detalladamente en el capí tulo de desarrollo, aquí se comentara algunas tareas que se llevaban a cabo en el desarrollo: ? Inicializacio n y puesta a punto del repositorio. ? Preparacio n del Sprint (Pueda ser el primero o el u ltimo) ? Comienzo del sprint con un Daily Meeting, que es lo que hicimos el dí a anterior y que vamos a hacer hoy. ? Actualizacio n de la gra fica Burn Down. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 15 ? Desarrollo. Es una aproximacio n al planning que tiene cada ciclo de desarrollo de la aplicacio n. 2.2 CII02 Capacidad para planificar, concebir, desplegar y dirigir proyectos, servicios y sistemas informáticos en todos los ámbitos, liderando su puesta en marcha y mejora continua y valorando su impacto económico y social. La planificacio n de este proyecto se ha desarrollado mediante reuniones con los dos tutores, ellos especificaban los requisitos y daban las pautas a seguir en cada una de las reuniones. Tambie n en estas reuniones se definio el alcance que tendrí a este trabajo fin de tí tulo. El backlog ha tomado un papel fundamental en la planificacio n puesto que ahí se registraban las historias de usuario a Al igual que en la estructura de datos, hay infinidad de posibilidades a la hora de seleccionar la arquitectura, Matemapp es una aplicacio n web por los siguientes motivos: o Escalabilidad: disponemos de un servidor el cua l gestiona las peticiones, esto, si el servidor esta bien configurado, nos proporciona garantí as sin importar cua ntas personas este n usando nuestra aplicacio n simulta neamente, tampoco implica costes adicionales con cada nuevo usuario. o Multiplataforma: para poder usar Matemapp lo u nico que se necesita es un navegador web, la aplicacio n ha sido testeada y funciona correctamente en los navegadores Google Chrome, Mozilla Firefox e Internet Explorer 8.0. Hoy en dí a hay herramientas que nos generan una App partiendo de una pa gina web, pudiendo ser instalada en Smartphone. Por todas estas ventajas se decidio hacer una aplicacio n web. o Centralización de los datos: al ser una aplicacio n web todo el almacenamiento de informacio n esta en el lado del servidor, esto libera el dispositivo del cliente de almacenar grandes cantidades de datos. o Requisitos mínimos: otra ventaja de ser una aplicacio n web es que no requiere grandes especificaciones en cuanto al hardware se refiere para usar la aplicacio n. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 10 o Disponibilidad: al estar alojado en un servidor, e stos ya tienen varias opciones en cuanto a soporte si alguno de los discos fallase, por ejemplo sistemas RAID. o Integridad: todos los datos que puedan comprometer al usuario han sido cifrados utilizando algoritmos de encriptacio n, uno de ellos ha sido AES (Advanced Encryption Standard). o Portabilidad: como aplicacio n web tan so lo necesitamos un navegador e Internet para poder acceder a Matemapp. o Actualizaciones automáticas: toda nueva actualizacio n que se realice en la aplicacio n la podra n disfrutar sin necesidad de descargar ninguna nueva versio n. 2.1.1.3 Desarrollo Una vez establecida la arquitectura que sera una aplicacio n web, llega el momento de ver y seleccionar que opciones dentro de aplicaciones web son las ma s favorables para el desarrollo del proyecto. o Back-End: Por parte del servidor, una tecnologí a que esta creciendo a gran velocidad es Node JS, su gran versatilidad y flexibilidad en el lado del cliente esta popularizando esta tecnologí a cada vez ma s. Se valoro en un primer momento desarrollar usando esta tecnologí a, pero nos encontramos dos inconvenientes; el desconocimiento de esta tecnologí a hací a que la curva de aprendizaje fuera muy lenta a la hora del desarrollo y en consecuencia no se habrí a podido programar haciendo uso de las buenas pra cticas. Otro inconveniente que se nos presenta al usar esta tecnologí a es la eleccio n de un hosting, actualmente no todos los hostings soportan la tecnologí a Node JS y los que dan este soporte son de un coste econo mico que no se podí a asumir para este trabajo de fin de tí tulo. Finalmente la opcio n considerada ma s acertada fue usar PHP, ya tení amos conocimientos previos de esta tecnologí a puesto que la estudiamos en el grado, no so lo por eso decidimos escoger PHP, actualmente la mayor cuota de mercado en el desarrollo web por parte del servidor la tiene PHP, esto nos da una gran fiabilidad y soporte a la hora de desarrollar. Tambie n hay una gran variedad de hostings que ofertan esta tecnologí a y a un precio ma s asequible. Tambie n se ha usado la tecnologí a AJAX para realizar cambios en la base de datos así ncronamente, sin necesidad de recargar la pa gina. o Front-End: Para desarrollar el lado del cliente se han usado las siguientes tecnologí as: ? HTML5: Hyper Text Markup Languaje, es la quinta versio n del lenguaje ba sico de la Word Wide Web. Es un lenguaje de etiquetado para el desarrollo de pa ginas webs. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 11 ? CSS3: Cascading Style Sheets, es un lenguaje usado para definir y crear el disen o de pa ginas web. Lo novedoso de CSS3 es que sus funcionalidades esta n divididas en varios documentos llamados mo dulos. Cada mo dulo an ade nuevas funcionalidades a las definidas en CSS2, preserva las anteriores versiones para mantener la compatibilidad. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 12 ? BootStrap: desarrollado por el equipo de Twitter, es una librerí a que trae una serie de clases con sus correspondientes disen os predefinidos, la ventaja de usar bootstrap es que reduces tiempo definiendo el estilo y, aplicando las clases correspondientes al disen o de los elementos HTML tendremos una pa gina web responsiva. ? SASS: Syntactically Awesome Stylesheet es un lenguaje de hoja de estilos, es un lenguaje script que es traducido a CSS. SASS contiene dos sintaxis, la sintaxis indentada, usa la indentacio n para separar bloques de co digo y el cara cter nueva lí nea para separar reglas. La otra sintaxis es SCSS, un formato de bloques como CSS, usa llaves para denotar bloques de co digo y punto y coma para separar las lí neas dentro de un bloque. ? JavaScript: lenguaje de programacio n principalmente orientado al lado del cliente. MATEMAPP | ADRIÁN MUJICA GONZÁLEZ 13 ? jQuery: es una librerí a de JavaScript que permite simplificar la manera de interactuar con los documentos HTML, manejar eventos, desarrollar animaciones y agregar interaccio n haciendo uso de la te cnica AJAX a pa ginas web. ? AJAX: Asynchronous JavaScript And XML, es una te cnica de desarrollo web, se ejecuta en el cliente mientras se mantiene la comunicacio n así ncrona con el servidor ', 0, 69, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_achievement`
--

CREATE TABLE IF NOT EXISTS `user_achievement` (
  `id_achievement` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_achievement`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `user_achievement`
--

INSERT INTO `user_achievement` (`id_achievement`, `username`) VALUES
(2, 'adri'),
(2, 'ainara'),
(2, 'ainhoa'),
(2, 'alexia'),
(2, 'alu'),
(2, 'borjaruam'),
(2, 'eric'),
(2, 'irene'),
(2, 'jesusymencey'),
(2, 'kevinleon'),
(2, 'lola'),
(2, 'Minecraft'),
(2, 'sonia'),
(2, 'TayTayy'),
(2, 'tontoelquelolea'),
(4, 'adri'),
(4, 'borjaruam'),
(4, 'potamo11'),
(4, 'sonia'),
(5, 'ainara'),
(5, 'sonia'),
(7, 'adri'),
(7, 'jesusymencey'),
(7, 'Minecraft'),
(7, 'sonia'),
(7, 'TayTayy'),
(8, 'adri'),
(8, 'ainara'),
(8, 'ainhoa'),
(8, 'alexia'),
(8, 'alu'),
(8, 'alumno'),
(8, 'borjaruam'),
(8, 'eric'),
(8, 'irene'),
(8, 'javi'),
(8, 'jesusymencey'),
(8, 'juan'),
(8, 'kevinleon'),
(8, 'lola'),
(8, 'Minecraft'),
(8, 'NayrayLourdes'),
(8, 'nieves1'),
(8, 'sonia'),
(8, 'TayTayy'),
(8, 'tontoelquelolea'),
(9, 'adri'),
(9, 'ainara'),
(9, 'ainhoa'),
(9, 'alexia'),
(9, 'alu'),
(9, 'borjaruam'),
(9, 'irene'),
(9, 'javi'),
(9, 'jesusymencey'),
(9, 'kevinleon'),
(9, 'Minecraft'),
(9, 'NayrayLourdes'),
(9, 'paco'),
(9, 'profesor'),
(9, 'sonia'),
(9, 'TayTayy'),
(9, 'tontoelquelolea'),
(10, 'adri'),
(10, 'ainara'),
(10, 'ainhoa'),
(10, 'alexia'),
(10, 'alexia2'),
(10, 'alu'),
(10, 'angel2'),
(10, 'borjaruam'),
(10, 'eric'),
(10, 'irene'),
(10, 'javi'),
(10, 'jese'),
(10, 'jesusymencey'),
(10, 'juan'),
(10, 'juan33'),
(10, 'Minecraft'),
(10, 'nieves1'),
(10, 'potamo'),
(10, 'potamo11'),
(10, 'sonia'),
(10, 'TayTayy'),
(11, 'ainara'),
(11, 'ainhoa'),
(11, 'alexia'),
(11, 'alu'),
(11, 'borjaruam'),
(11, 'eric'),
(11, 'irene'),
(11, 'jesusymencey'),
(11, 'lola'),
(11, 'Minecraft'),
(11, 'sonia'),
(11, 'TayTayy'),
(12, 'adri'),
(12, 'ainara'),
(12, 'ainhoa'),
(12, 'alexia'),
(12, 'borjaruam'),
(12, 'eric'),
(12, 'javi'),
(12, 'jesusymencey'),
(12, 'juan'),
(12, 'kevinleon'),
(12, 'Minecraft'),
(12, 'NayrayLourdes'),
(12, 'paco'),
(12, 'sonia'),
(12, 'TayTayy'),
(12, 'tontoelquelolea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_avatar`
--

CREATE TABLE IF NOT EXISTS `user_avatar` (
  `username` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `id_avatar` int(11) NOT NULL,
  PRIMARY KEY (`username`,`id_avatar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `user_avatar`
--

INSERT INTO `user_avatar` (`username`, `id_avatar`) VALUES
('ainara', 6),
('ainara', 12),
('ainara', 27),
('alu', 7),
('alu', 10),
('alu', 67),
('borjaruam', 27),
('borjaruam', 67),
('jesusymencey', 27),
('juan33', 62),
('sonia', 24),
('sonia', 77),
('sonia', 80);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
