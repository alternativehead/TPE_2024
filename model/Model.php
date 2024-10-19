<?php
require_once './config.php';

class Model {
    protected $db;
    public function __construct(){
        $this->db =  new PDO('mysql:host='. MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->deploy();
    }

    private function deploy()
    {
        $adminpassword = '$2y$10$y8MDrSe2BlYkUgnx8z9P7.uB09jCCf.xfyznt3I2jPCQJIKri2YMe';
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = <<<END
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
  `imagen` varchar(255) NOT NULL,
  `id_banda` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`id_album`, `album`, `anio_de_lanzamiento`, `genero`, `discografica`, `descripcion`, `imagen`, `id_banda`) VALUES
(4, 'In Utero', 1993, 'Grunge', 'DGC Records', 'In Utero es el tercer y último álbum de estudio de la banda estadounidense de grunge Nirvana, lanzado en septiembre de 1993 por DGC Records. Nirvana pretendía que esta grabación sonara diferente a la pulida producción de su anterior álbum, Nevermind.', 'https://indierocks.sfo3.digitaloceanspaces.com/wp-content/uploads/2023/09/In-Utero-Nirvana.jpg', 1),
(10, 'Facelift', 1990, 'Grunge', 'Columbia Records', 'Facelift es el álbum debut de la banda de grunge estadounidense Alice in Chains, publicado el 21 de agosto de 1990 a través del sello discográfico Columbia Records. Como parte del movimiento grunge, fue el primer álbum del sonido de Seattle en ingresar al top 50 de Billboard.', 'https://i.scdn.co/image/ab67616d0000b2731f829ea9c2c7ffcec1a3c857', 3),
(11, 'Bleach', 1989, 'Grunge', 'Sub Pop', 'Bleach es el álbum de estudio debut de la banda de rock estadounidense Nirvana, lanzado el 15 de junio de 1989 por Sub Pop. Después del lanzamiento de su sencillo debut «Love Buzz» en noviembre de 1988, Nirvana ensayó durante dos o tres semanas en preparación para grabar un álbum de larga duración.', 'https://i.scdn.co/image/ab67616d0000b27397507fd22fb690cb9085a864', 1),
(12, 'Nevermind', 1991, 'Grunge', 'DGC Records', 'Nevermind es el segundo álbum de estudio de la banda estadounidense de grunge Nirvana, publicado el 24 de septiembre de 1991. Producido por Butch Vig, Nevermind fue el primer lanzamiento de la banda con DGC Records.', 'https://i.discogs.com/XoAXkLe03Vk0Kt-oQqw7V9uW5nBzQdNvZd0zar5mOiQ/rs:fit/g:sm/q:90/h:592/w:600/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTM2NzA4/NC0xMjYzMDk1NTUz/LmpwZWc.jpeg', 1),
(13, 'Dirt', 1992, 'Grunge, Heavy metal, Rock alternativo, Hard rock, Metal alternativo, Sludge metal', 'Columbia Records', 'Dirt es el segundo álbum de estudio de la banda de grunge estadounidense Alice in Chains, grabado entre marzo y mayo de 1992 y publicado por Columbia Records el 29 de septiembre del mismo año.​', 'https://i.scdn.co/image/ab67616d0000b2731cd131e5e9ad887ad8c1ecb7', 3),
(14, 'Jar of Flies', 1994, 'Grunge, Música acústica, Hard rock', 'Columbia Records', 'Jar of Flies es el segundo EP acústico de la banda de grunge Alice in Chains. Fue escrito y grabado en una semana, ​ siendo lanzado a principios de 1994 y llegando a lo más alto en las listas de Estados Unidos, convirtiéndose en el primer EP en debutar en el puesto N.º 1 del ranking Billboard 200.', 'https://i.scdn.co/image/ab67616d0000b27325b42be683b8d3c6500db726', 3),
(15, 'Cowboys from Hell', 1990, 'groove metal', 'Atco Records', 'Cowboys from Hell es el quinto álbum de la banda norteamericana de groove metal Pantera. Fue editado y producido por Terry Date, y posteriormente publicado el 24 de julio de 1990. Es el primer álbum editado por la banda en el sello Atco Records, fue grabado en The Dallas Sound Lab en Irving, Texas. ', 'https://i.scdn.co/image/ab67616d0000b2730ce52f4ba340a1e459e6a978', 5),
(16, 'Vulgar Display of Power', 1992, 'groove metal', 'Atco Records', 'Vulgar Display of Power es el sexto álbum de la banda de groove metal Pantera publicado el 25 de febrero de 1992.', 'https://i.scdn.co/image/ab67616d0000b273347c0a40c1e3f0c890a6d9d6', 5),
(17, 'Far Beyond Driven', 1994, 'groove metal', 'East West Records', 'Far Beyond Driven es el séptimo álbum de estudio de la banda estadounidense de groove metal, Pantera, lanzado en el año 1994. Originalmente fue vendido con una portada explícita que fue reemplazada por la actual. Este disco es considerado como uno de los álbumes más extremos en debutar en el número 1 en los EE. UU, llegando a Disco de Platino por la venta de 1 000 000 de copias.', 'https://i.scdn.co/image/ab67616d0000b27364fa027e7ef7ce20fa8b46f2', 5),
(18, 'The Great Southern Trendkill', 1996, 'groove metal', 'East West Records', 'The Great Southern Trendkill es el octavo álbum de la banda de groove metal Pantera, publicado en mayo de 1996 con la breve integración de Seth Putnam, líder de Anal Cunt, después de que Phil Anselmo grabase para dicha banda el álbum 40 More Reasons to Hate Us.', 'https://i.scdn.co/image/ab67616d0000b273e698b41c758c1a49fecbc1cf', 5),
(19, 'Kill \'em all', 1983, 'Thrash Metal', 'Megaforce Records', 'Kill \'Em All es el álbum debut de la banda estadounidense de thrash metal Metallica, publicado el 25 de julio de 1983 por Megaforce Records', 'https://i.scdn.co/image/ab67616d0000b273b9d81ca2b0884641e321be4f', 6),
(20, 'South of Heaven', 1988, 'thrash metal', 'Def Jam Recordings', 'South of Heaven es el cuarto álbum de estudio de la banda estadounidense de thrash metal Slayer. Fue lanzado al mercado el 11 de julio de 1988.', 'https://i.discogs.com/rvi2XetTrLAAQUdAVT8RYzjjA-h7S6b_DFobW_qwUxg/rs:fit/g:sm/q:90/h:585/w:600/czM6Ly9kaXNjb2dz/LWRhdGFiYXNlLWlt/YWdlcy9SLTYzOTA4/NTMtMTQxODA3MDE1/NS01NzQzLmpwZWc.jpeg', 9);

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
  `estado` tinyint(1) NOT NULL,
  `miembros` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bandas`
--

INSERT INTO `bandas` (`id_banda`, `banda`, `lugar_origen`, `anio_origen`, `descripcion`, `estado`, `miembros`) VALUES
(1, 'Nirvana', 'Aberdeen', 1987, 'Nirvana fue una banda de rock estadounidense formada en Aberdeen, en 1987. Fundada por el cantante y guitarrista Kurt Cobain y el bajista Krist Novoselic, la banda pasó por una sucesión de bateristas, sobre todo Chad Channing, y luego reclutó a Dave Grohl en 1990.', 0, 'Kurt Cobain\r\nKrist Novoselic\r\nDave Grohl'),
(3, 'Alice In Chains', 'Seattle', 1987, 'Alice in Chains es una banda de grunge estadounidense fundada en 1987 en Seattle, por Layne Staley, Jerry Cantrell, Mike Starr y Sean Kinney. En 1993 Mike Inez se uniría como reemplazo de Starr. Posteriormente William DuVall sería el vocalista, tras el fallecimiento de Staley en 2002.​', 1, 'Jerry Cantrell\r\nSean Kinney\r\nMike Inez\r\nWilliam DuVall'),
(5, 'Pantera', 'Arlington', 1981, 'Pantera es una banda estadounidense de groove metal fundada en 1981 por los hermanos Abbott, Darrell y Vinnie Paul, en Arlington, Texas.', 1, 'Phil Anselmo\r\nRex Brown\r\nZakk Wylde\r\nCharlie Benante\r\nDimebag Darrell (fallecido)\r\nVinnie Paul (fallecido)\r\nDonnie Hart\r\nTerry Glaze\r\nTommy Bradford'),
(6, 'Metallica', 'Los Angeles', 1981, 'Metallica es una banda estadounidense de heavy metal​ fundada en 1981 en Los Ángeles, aunque ha estado radicada en San Francisco durante la mayor parte de su carrera.​', 1, 'James Hetfield\r\nLars Ulrich\r\nKirk Hammett\r\nRobert Trujillo\r\nRon McGovney\r\nDave Mustaine\r\nCliff Burton (fallecido)\r\nJason Newsted'),
(9, 'Slayer', 'Huntington Park, California', 1981, 'Slayer es una banda estadounidense de thrash metal proveniente de Huntington Park, California. Fundada en 1981 por los guitarristas Kerry King y Jeff Hanneman, el baterista de origen cubano Dave Lombardo y el bajista y vocalista de origen chileno Tom Araya.', 1, 'Kerry KingTom ArayaPaul BostaphGary HoltJeff Hanneman (fallecido)Dave LombardoJon Dette');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(255) NOT NULL,
  `usuario` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `contrasenia` varchar(300) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `email`, `contrasenia`, `fecha_creacion`) VALUES
(1, 'Demo', 'Demo@gmail.com',  '$adminpassword', '2024-09-23');

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `id_album` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `bandas`
--
ALTER TABLE `bandas`
  MODIFY `id_banda` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD CONSTRAINT `fk_id_banda` FOREIGN KEY (`id_banda`) REFERENCES `bandas` (`id_banda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
END;
            $this->db->query($sql);
        }
    }

}
?>