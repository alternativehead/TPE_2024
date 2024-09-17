-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2024 a las 16:37:20
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_2024`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `id_album` int(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `anio_de_lanzamiento` int(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `discografica` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `id_banda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`id_album`, `album`, `anio_de_lanzamiento`, `genero`, `discografica`, `descripcion`, `id_banda`) VALUES
(1, 'Bleach', 1989, 'Grunge', 'Sub pop', 'Bleach es el álbum de estudio debut de la banda de rock estadounidense Nirvana, lanzado el 15 de junio de 1989 por Sub Pop. Después del lanzamiento de su sencillo debut «Love Buzz» en noviembre de 1988, Nirvana ensayó durante dos o tres semanas en preparación para grabar un álbum de larga duración.', 1),
(2, 'Kill \'em all', 1983, 'Thrash Metal', 'Megaforce Records', 'Kill \'Em All es el álbum debut de la banda estadounidense de thrash metal Metallica, publicado el 25 de julio de 1983 por Megaforce Records.', 2),
(4, 'In Utero', 1993, 'Grunge', 'DGC Records', 'In Utero es el tercer y último álbum de estudio de la banda estadounidense de grunge Nirvana, lanzado en septiembre de 1993 por DGC Records. Nirvana pretendía que esta grabación sonara diferente a la pulida producción de su anterior álbum, Nevermind.', 1),
(5, 'Nevermind', 1991, 'Grunge', 'DGC Records', 'Nevermind es el segundo álbum de estudio de la banda estadounidense de grunge Nirvana, publicado el 24 de septiembre de 1991. Producido por Butch Vig, Nevermind fue el primer lanzamiento de la banda con DGC Records.', 1),
(6, 'Facelift', 1990, 'Grunge', 'Columbia Records', 'Facelift es el álbum debut de la banda de grunge estadounidense Alice in Chains, publicado el 21 de agosto de 1990 a través del sello discográfico Columbia Records. Como parte del movimiento grunge, fue el primer álbum del sonido de Seattle en ingresar al top 50 de Billboard.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandas`
--

CREATE TABLE `bandas` (
  `id_banda` int(255) NOT NULL,
  `banda` varchar(255) NOT NULL,
  `lugar_origen` varchar(255) NOT NULL,
  `anio_origen` int(255) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(255) NOT NULL,
  `miembros` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bandas`
--

INSERT INTO `bandas` (`id_banda`, `banda`, `lugar_origen`, `anio_origen`, `descripcion`, `estado`, `miembros`) VALUES
(1, 'Nirvana', 'Aberdeen', 1987, 'Nirvana fue una banda de rock estadounidense formada en Aberdeen, en 1987. Fundada por el cantante y guitarrista Kurt Cobain y el bajista Krist Novoselic, la banda pasó por una sucesión de bateristas, sobre todo Chad Channing, y luego reclutó a Dave Grohl en 1990.', 'separados', 'Kurt Cobain\r\nKrist Novoselic\r\nDave Grohl'),
(2, 'Metallica', 'Los Angeles', 1981, 'Metallica es una banda estadounidense de thrash metal​ originaria de Los Ángeles, pero con base en San Francisco desde febrero de 1981.', 'activos', 'Lars Ulrich\r\nJames Hetfield\r\nKirk Hammett\r\nRobert Trujillo'),
(3, 'Alice In Chains', 'Seattle', 1987, 'Alice in Chains es una banda de grunge estadounidense fundada en 1987 en Seattle, por Layne Staley, Jerry Cantrell, Mike Starr y Sean Kinney. En 1993 Mike Inez se uniría como reemplazo de Starr. Posteriormente William DuVall sería el vocalista, tras el fallecimiento de Staley en 2002.​', 'activos', 'Jerry Cantrell\r\nSean Kinney\r\nMike Inez\r\nWilliam DuVall');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `fk_id_banda` (`id_banda`);

--
-- Indices de la tabla `bandas`
--
ALTER TABLE `bandas`
  ADD PRIMARY KEY (`id_banda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `id_album` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bandas`
--
ALTER TABLE `bandas`
  MODIFY `id_banda` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD CONSTRAINT `fk_id_banda` FOREIGN KEY (`id_banda`) REFERENCES `bandas` (`id_banda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
