-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2019 a las 19:39:35
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `itec_test_2019-11-18`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'PHP'),
(2, 'Java'),
(3, 'Javascript'),
(4, 'Python');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizado` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `categoria_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `image`, `creado`, `actualizado`, `user_id`, `categoria_id`) VALUES
(1, 'Novedades de PHP 7.3', 'Hoy mientras comía me he visto esta charla de Rasmus Lerdorf (el creador de PHP) en la que habla de las novedades que trae la versión 7.3 de PHP y he decidido resumir en este artículo los principales puntos de la misma:', 'https://appinventiv.com/wp-content/uploads/sites/1/2018/06/PHP-Frameworks-Guide-Top-10-Best-PHP-Framework-2019.png', '2019-11-18 03:27:33', '2019-11-18 03:27:33', 1, 1),
(2, 'Las 3 mejores novedades de Python 3.5', 'Python 3.4 se lanzó hace más de un año y medio. Y es la versión con más acogida después de la 2.7 que sigue siendo la más usada hasta el momento. Hace unos días se hizo oficial el lanzamiento de Python 3.5.0; que estaba programado originalmente para final', 'https://library.kissclipart.com/20181208/pwe/kissclipart-python-programming-a-beginners-guide-to-learn-py-c106bf0c27f1f5a5.jpg', '2019-11-18 03:32:30', '2019-11-18 03:32:30', 1, 4),
(13, 'Prueba marcio java', 'contenido contenido contenido contenido contenido contenido contenido contenido contenido contenido contenido ', 'https://i.blogs.es/6091fa/java/450_1000.jpg', '2019-12-13 21:40:35', '2019-12-13 21:40:35', 20, 2),
(14, 'prueba3 editado js', ' js prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 prueba3 pru', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/1200px-Unofficial_JavaScript_logo_2.svg.png', '2019-12-14 19:11:11', '2019-12-14 19:11:11', 20, 3),
(16, 'P H P', 'php php php php php php php php php php php php php php php php php ', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png', '2019-12-14 19:12:23', '2019-12-14 19:12:23', 20, 1),
(17, 'prueba python 1 ', 'prueba python 1 prueba python 1 prueba python 1 ', 'https://img-cdn.hipertextual.com/files/2019/06/hipertextual-aprende-python-con-estos-cursos-online-2019911174.jpg?strip=all&lossy=1&quality=57&resize=740%2C490&ssl=1', '2019-12-15 00:39:18', '2019-12-15 00:39:18', 20, 4),
(18, 'javascript prueba 4', 'prueba 4prueba 4prueba 4prueba 4prueba 4prueba 4prueba 4prueba 4prueba 4', 'https://www.hostinger.es/tutoriales/wp-content/uploads/sites/7/2018/08/que-es-javascript.jpg', '2019-12-16 07:08:09', '2019-12-16 07:08:09', 23, 3),
(19, 'Lenguaje Python ', 'relleno relleno relleno relleno relleno relleno relleno relleno relleno relleno relleno relleno ', 'https://dev-res.thumbr.io/libraries/41/17/40/lib/1480692182829_2.jpg?size=854x493s&ext=jpg', '2019-12-16 07:14:01', '2019-12-16 07:14:01', 23, 4),
(20, 'java ', 'java java java java java java java java java java java java java java java java java java java java ', 'https://ep00.epimg.net/tecnologia/imagenes/2012/10/19/actualidad/1350638676_520867_1350638740_noticia_normal.jpg', '2019-12-16 07:26:35', '2019-12-16 07:26:35', 24, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `reg_date`, `avatar`) VALUES
(1, 'jose', 'perez', '4d186321c1a7f0f354b297e8914ab240', 'j.perez@itecriocuarto.org.ar', '2019-11-18 15:42:53', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFpAZq2cySRRYaBLuGkvdWMMEmbUuHK5PWHwW_h3R6iQQKeZqEmg&s'),
(20, 'marcio', 'martinelli ', '81dc9bdb52d04dc20036dbd8313ed055', 'marcio@itec.org.ar', '2019-12-16 04:20:43', 'https://previews.123rf.com/images/tuktukdesign/tuktukdesign1608/tuktukdesign160800055/61010890-icono-de-usuario-hombre-perfil-hombre-de-negocios-avatar-ilustraci%C3%B3n-vectorial-persona-glifo.jpg'),
(23, 'Juan', 'relleno', 'e10adc3949ba59abbe56e057f20f883e', 'marcio22martinelli@gmail.com', '2019-12-16 07:04:10', ''),
(24, 'Boca', 'Juniors', 'defac44447b57f152d14f30cea7a73cb', 'marciom_22@hotmail.com', '2019-12-16 07:28:36', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publicaciones_user_id` (`user_id`),
  ADD KEY `fk_publicaciones_categorias_id` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_publicaciones_categorias_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_publicaciones_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
