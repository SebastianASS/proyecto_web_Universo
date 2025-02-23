-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2025 a las 03:00:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(3, 'galaxias', 'Son enormes cúmulos de estrellas, gas, polvo y materia oscura'),
(4, 'Estrellas', 'Son cuerpos celestes de gran masa que producen energia y luz'),
(13, 'Agujeros Negros', 'Cuerpos celestes de gran masa y gravedad, absorben todo a su paso, incluso la luz'),
(14, 'lunas', 'Son satélites naturales que orbitan a los planetas'),
(18, 'planetas', 'Son cuerpos celestes que orbitan a las estrellas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `descripcion`, `id_usuario`, `id_publicacion`) VALUES
(8, 'Que buena imagen, me encanta!!!', 3, 3),
(11, 'Genial, tengo entendido que es la estrella mas cercana al sol', 12, 7),
(12, 'hola', 12, 5),
(13, 'Me gusta calisto', 12, 8),
(15, 'Es una luna muy linda', 12, 8),
(19, 'hola', 12, 3),
(20, 'Me gusta verla cuando estoy en campo abierto', 15, 3),
(21, 'Amo la luna', 15, 6),
(22, 'A mi también me gusta', 13, 6),
(23, 'Siempre he querido saber que hay dentro de un agujero negro.', 13, 15),
(24, 'No había visto una luna que no fuese tan redonda.', 15, 16),
(25, 'Es mi planeta preferido', 15, 17),
(26, 'Cuando voy al campo, puedo apreciarla bien.', 17, 3),
(27, 'Tiene la sima mas alta del sistema solar', 17, 24),
(28, 'Es algo imposible, nada razonaba puede llegar intacto a su centro.', 17, 15),
(29, 'Desde pequeño, sin que nadie me dijera, imaginaba que eso era lo que había en el centro de la galaxia.', 17, 5),
(30, 'So good', 17, 8),
(31, 'Es un agujero negro, enorme', 17, 5),
(32, 'Me gustaría viajar a esa estrella', 17, 7),
(33, 'Me gusta ver los eclipses lunares', 17, 6),
(34, 'Elonk Musk, el dueño de Marte jajajaj', 17, 24),
(35, '¿Quién sabe que es el horizonte de eventos?', 21, 5),
(36, 'Es lo mas lindo que le ha dado Dios a la humanidad para ver', 21, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `imagen_ruta` varchar(300) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` date NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `imagen_ruta`, `descripcion`, `fecha`, `categoria_id`) VALUES
(3, 'via lactea', '../../assets/imagenes/via_lactea.JPG', 'La Vía Láctea es una galaxia espiral que alberga nuestro sistema solar, compuesta por miles de millones de estrellas, planetas, gas, polvo y materia oscura. Su forma se caracteriza por un núcleo brillante central rodeado por varios brazos espirales que se extienden hacia el exterior. Con un diámetro de aproximadamente 100,000 años luz y un grosor de unos 1,000 años luz, la Vía Láctea es una de las muchas galaxias del universo, pero es única para nosotros, ya que es el hogar de la Tierra. En su centro se encuentra un agujero negro supermasivo, conocido como Sagitario A*, que juega un papel crucial en la dinámica de la galaxia.\r\n\r\nDesde la Tierra, la Vía Láctea se observa como una franja brillante de estrellas en el cielo nocturno, especialmente en áreas libres de contaminación lumínica. Esta galaxia es el escenario de una constante actividad estelar, donde las estrellas nacen, evolucionan y mueren. El Sol, una de sus más de 100 mil millones de estrellas, se encuentra en uno de los brazo', '2025-02-13', 3),
(5, 'sagitario a', '../../assets/imagenes/sagitario_a.webp', 'Sagitario A, es el nombre del agujero negro supermasivo ubicado en el centro de nuestra galaxia, la Vía Láctea. Este agujero negro es uno de los más estudiados debido a su proximidad, ya que está a unos 27,000 años luz de la Tierra, en la constelación de Sagitario, de donde proviene su nombre.', '2025-02-14', 13),
(6, 'Luna', '../../assets/imagenes/luna2.png', 'La Luna es el único satélite natural de la Tierra y el objeto más brillante en nuestro cielo nocturno. Es un cuerpo rocoso que orbita alrededor de la Tierra, y juega un papel importante tanto para la vida en la Tierra como en la evolución del sistema solar.', '2025-02-14', 14),
(7, 'Próxima Centauri', '../../assets/imagenes/proxima_centauri.webp', 'Próxima Centauri es la estrella más cercana al Sol, situada a aproximadamente 4.24 años luz de distancia en la constelación de Centaurus. Forma parte del sistema estelar Alfa Centauri, que es el sistema estelar más próximo a la Tierra. Próxima Centauri es una enana roja de tipo espectral M5.5Ve, lo que significa que es una estrella pequeña, fría y de baja masa en comparación con el Sol. Su masa es de aproximadamente 0.12 veces la masa del Sol, y su radio es de alrededor de 0.14 veces el radio solar, lo que la hace significativamente más pequeña que nuestra estrella. La temperatura superficial de Próxima Centauri es de unos 3,042 K, mucho más fría que los 5,778 K del Sol, y su luminosidad es solo el 0.0017% de la del Sol. Se estima que tiene una edad de alrededor de 4.85 mil millones de años, similar a la del Sol.\r\n\r\nUna de las características más destacadas de Próxima Centauri es su actividad estelar. Es una estrella propensa a emitir llamaradas estelares frecuentes, que son explosione', '2025-02-18', 4),
(8, 'Calisto', '../../assets/imagenes/calisto.webp', 'Calisto es una de las cuatro lunas galileanas de Júpiter, descubierta por el astrónomo Galileo Galilei en 1610. Es la tercera luna más grande del sistema solar y la segunda más grande de Júpiter, después de Ganímedes. Con un diámetro de aproximadamente 4.820 kilómetros, Calisto es solo un poco más pequeña que Mercurio, pero su baja densidad sugiere que está compuesta principalmente de hielo y roca.\r\n\r\nUna de las características más destacadas de Calisto es su superficie extremadamente craterizada, lo que la convierte en uno de los objetos más antiguos y menos alterados del sistema solar. Su superficie es un testimonio de los intensos bombardeos que ocurrieron durante los primeros miles de millones de años de la historia del sistema solar. Entre los cráteres más notables se encuentra Valhalla, una enorme estructura de impacto con un diámetro de aproximadamente 1.900 kilómetros, rodeada por anillos concéntricos que se extienden hasta 3.000 kilómetros desde el centro.', '2025-02-18', 14),
(15, 'TON 618', '../../assets/imagenes/ton_618.jpeg', 'TON 618 es el nombre de un cuásar extremadamente masivo ubicado a unos 10.37 mil millones de años luz de la Tierra, en la constelación de Leo. Es uno de los cuásares más brillantes y más distantes conocidos. Los cuásares son núcleos galácticos activos, en los que un agujero negro supermasivo se encuentra en el centro de la galaxia, y su intensa gravedad atrae una gran cantidad de materia, liberando enormes cantidades de energía.\r\n\r\nTON 618 es particularmente famoso porque contiene uno de los agujeros negros más grandes jamás detectados, con una masa estimada de aproximadamente 66 mil millones de veces la masa del Sol, lo que lo convierte en uno de los agujeros negros más masivos conocidos en el universo.', '2025-02-20', 13),
(16, 'Fobos', '../../assets/imagenes/fobos.jpg', 'Fobos es una de las dos lunas de Marte, siendo la más cercana de las dos al planeta. La otra luna se llama Deimos. Fobos es un pequeño satélite natural, que tiene un tamaño irregular y es mucho más pequeño que las lunas de la Tierra, como la Luna. De hecho, Fobos tiene un diámetro promedio de aproximadamente 22,4 kilómetros, lo que lo convierte en un objeto pequeño en comparación con la Luna de la Tierra.\r\n\r\nAlgunas características destacadas de Fobos incluyen:\r\n\r\nForma irregular: No es una esfera perfecta como la Luna de la Tierra. Su forma es más bien irregular y parecida a un cuerpo rocoso alargado.\r\n\r\nÓrbita muy cercana: Fobos tiene una órbita muy cercana a Marte, a solo 6.000 km de la superficie del planeta, lo que lo convierte en la luna más cercana a su planeta en todo el sistema solar. Debido a esta órbita tan cercana, Fobos completa una vuelta alrededor de Marte en solo 7 horas y 39 minutos, mucho menos que el día de Marte (que dura alrededor de 24 horas y 39 minutos).', '2025-02-20', 14),
(17, 'Saturno', '../../assets/imagenes/saturno.jpg', 'Saturno es el sexto planeta del sistema solar y uno de los más impresionantes, reconocido por sus vastos anillos, los cuales están compuestos por partículas de hielo y roca. Es un gigante gaseoso formado principalmente por hidrógeno y helio, sin una superficie sólida. Con un diámetro de más de 120,000 km, Saturno es el segundo planeta más grande después de Júpiter, y su atmósfera está llena de vientos extremadamente rápidos y tormentas. Además, Saturno posee más de 80 lunas, siendo Titán la más grande y una de las más fascinantes, con una atmósfera propia y mares de metano líquido en su superficie.\r\n\r\nEste planeta tiene un ciclo de rotación corto, completando un día en solo 10,7 horas, pero su órbita alrededor del Sol dura aproximadamente 29,5 años terrestres. Su exploración ha sido llevada a cabo principalmente por la misión Cassini de la NASA, que proporcionó datos cruciales sobre su atmósfera, anillos y lunas. Saturno continúa siendo un objeto de estudio importante para comprender l', '2025-02-21', 18),
(19, 'La Tierra', '../../assets/imagenes/tierra.jpeg', 'La Tierra es el tercer planeta del sistema solar y el único conocido hasta ahora que alberga vida. Con una atmósfera rica en oxígeno y nitrógeno, su superficie está cubierta en su mayoría por agua, lo que le da su distintivo color azul cuando se observa desde el espacio. La Tierra tiene una diversidad geológica impresionante, que incluye océanos, montañas, desiertos, bosques y llanuras, lo que crea una amplia gama de ecosistemas donde se desarrolla la vida. Su órbita alrededor del Sol y la inclinación de su eje son factores claves para la existencia de las estaciones y el clima que permiten la vida tal como la conocemos.\r\n\r\nEl planeta tiene una forma esférica ligeramente achatada en los polos debido a su rotación. Su núcleo está compuesto principalmente por hierro y níquel, y está rodeado por un manto de rocas fundidas y una corteza sólida. La Tierra tiene una luna, que influye en fenómenos como las mareas, y posee una capa protectora llamada ozono que filtra la radiación solar dañina.', '2025-02-21', 18),
(20, 'Andromeda', '../../assets/imagenes/andromeda.jpg', 'La galaxia de Andrómeda, también conocida como M31, es la galaxia espiral más cercana a la Vía Láctea y la más grande del Grupo Local de galaxias, que incluye a la Vía Láctea, la galaxia del Triángulo y otras más pequeñas. Andrómeda tiene un diámetro de aproximadamente 220,000 años luz, lo que la convierte en una galaxia significativamente más grande que nuestra propia Vía Láctea. Contiene alrededor de un billón de estrellas, muchas de las cuales podrían tener sistemas planetarios similares al nuestro. Andrómeda es conocida por sus brazos espirales prominentes y su núcleo brillante, que alberga un agujero negro supermasivo en su centro.\r\n\r\nA pesar de su impresionante tamaño, Andrómeda se encuentra en una trayectoria de colisión con la Vía Láctea. Se espera que ambas galaxias se fusionen dentro de unos 4,5 mil millones de años, lo que dará lugar a una nueva galaxia elíptica. ', '2025-02-21', 3),
(21, 'Betelgeuse', '../../assets/imagenes/betelgeuse.jpg', 'Betelgeuse es una de las estrellas más brillantes del cielo nocturno y se encuentra en la constelación de Orión. Es una supergigante roja, mucho más grande y luminosa que el Sol. A pesar de su tamaño masivo, Betelgeuse está en una fase avanzada de su vida, y su luminosidad varía significativamente debido a su naturaleza inestable. Se estima que tiene un diámetro más de 900 veces mayor que el del Sol, lo que significa que si estuviera en el lugar del Sol, su superficie podría extenderse hasta la órbita de Marte. Esta estrella está a unos 642 años luz de distancia de la Tierra, lo que la hace una de las estrellas más cercanas de su tipo.\r\n\r\nBetelgeuse se encuentra en una fase terminal de su evolución y se espera que explote en una supernova en un futuro relativamente cercano, aunque no se sabe con exactitud cuándo ocurrirá. Cuando esto suceda, será uno de los eventos más espectaculares del cielo nocturno, visible incluso durante el día. La explosión de Betelgeuse proporciona', '2025-02-21', 4),
(22, 'Zeta Puppis (Naos)', '../../assets/imagenes/naos.jpg', 'Es una de las estrellas más brillantes de la constelación de Puppis y es un ejemplo destacado de una supergigante azul de tipo espectral O. Con una temperatura superficial de aproximadamente 30,000 grados Celsius, Naos es mucho más caliente que el Sol, y su luminosidad es alrededor de 100,000 veces superior a la de nuestra estrella. Esta estrella masiva tiene un tamaño enormemente grande en comparación con el Sol, y se estima que su diámetro es unas 20 veces mayor que el del Sol. Su color azul es una característica típica de las estrellas de tipo O, las cuales emiten una radiación intensa debido a su temperatura extremadamente alta..', '2025-02-21', 4),
(24, 'Marte', 'https://www.eluniversal.com.mx/resizer/v2/SGUTNIU5P5BVJILOMWNRR4IOE4.png?auth=4c9b8ca4b31cc7d5f9d85cc6594a92f1026d4a6fc3670d36a84c0311db4e045b&smart=true&width=1100&height=666', ' Marte, el cuarto planeta del sistema solar, es conocido como el Planeta Rojo debido a su característico color rojizo, causado por la presencia de óxido de hierro (herrumbre) en su superficie. Tiene aproximadamente la mitad del tamaño de la Tierra y una atmósfera muy delgada compuesta principalmente de dióxido de carbono, nitrógeno y argón.\r\n\r\nEl paisaje marciano es variado, con enormes volcanes como el Olympus Mons, el volcán más grande del sistema solar, y grandes cañones como el Valles Marineris, que es un sistema de valles que se extiende por miles de kilómetros. La temperatura promedio en Marte es de aproximadamente -60 °C, aunque puede variar mucho dependiendo de la ubicación y la estación del año.', '2025-02-21', 18),
(27, 'Jupiter', 'https://img.asmedia.epimg.net/resizer/v2/FLJCGC7ELZG6VJGTKOBAHFU63I.jpg?auth=f6b05578553dbae776c315a1282d412c9c85a63cdaa54ab9d0aa4121680e3d41&width=1472&height=828&smart=true', 'Júpiter es el planeta más grande del sistema solar, con un diámetro de aproximadamente 142,984 kilómetros. Se encuentra a unos 778 millones de kilómetros del Sol y es conocido por su imponente atmósfera compuesta principalmente de hidrógeno y helio. Esta atmósfera está marcada por enormes tormentas, como la Gran Mancha Roja, una tormenta anticiclónica más grande que la Tierra, que ha estado activa durante siglos. Júpiter tiene una fuerte magnetosfera y una serie de anillos débiles, así como 92 lunas conocidas, entre las que destacan Ío, Europa, Ganimedes y Calisto, conocidos como los satélites galileanos.\r\n\r\nA pesar de su tamaño, Júpiter no tiene una superficie sólida como la Tierra. Se cree que su interior está compuesto por un núcleo rocoso o metálico rodeado por una capa de hidrógeno líquido y gas. Su atmósfera presenta bandas de nubes que giran a distintas velocidades, creando un efecto de franjas multicolores. Además, su fuerte gravedad influye enormemente en el sistema solar, afe', '2025-02-21', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidoUno` varchar(20) NOT NULL,
  `apellidoDos` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidoUno`, `apellidoDos`, `edad`, `correo`, `contraseña`, `rol`) VALUES
(1, 'sebastian', 'solano', 'sotelo', 23, 'sebastian@gmail.com', '$2y$10$CyxYJaOoBrM99DWpKiqEvOXQJObqDrmOCrOQVXMelwq6NYonuGliy', 1),
(3, 'Andres', 'montiel', 'paternina', 25, 'andres@gmail.com', '$2y$10$D/llm.9Jz607ehU/LHzdneVvB2Jcn.inSMEUmmf6lVfUVWK2iIxUu', 2),
(9, 'alicia', 'key', 'estrada', 28, 'alicia@gmail.com', '$2y$10$AO9X.Jm3L8HU.D/gT0z.KeKU6/s3rF0kDJNUC4Z.dTCwi0Bhun0Gy', 1),
(12, 'angel', 'Lopez', 'montiel', 22, 'angel@gmail.com', '$2y$10$0pweok8BT/31xj5WEuDi3eoGA.dFXfie4c2GDGUIlI3eN2Pi1S0zC', 2),
(13, 'rosa', 'maria', 'vega', 12, 'rosa@gmail.com', '$2y$10$IwmmF8/uIgX22xF.1v9zxOtQGNmtaTevkyr8EZdLkb/mpKHTZ4cZO', 2),
(15, 'keila', 'diaz', 'montiel', 20, 'keila@gmail.com', '$2y$10$Z.0fnUdX0UXirJ/nh9Zr1eS1q6LCZwqK3rGM8/OI0VGZHAFkNYj9m', 2),
(16, 'gabriel', 'antonio', 'perez', 18, 'gabriel@gmail.com', '$2y$10$fUj8iDmdFXoRmCkPmCNrMOMY58BN.uY0e5u0hCM0PBhUX4f.B3Uwq', 2),
(17, 'jamir', 'Peña', 'vergara', 18, 'jamir@gmail.com', '$2y$10$f826O2nRtMYO8HJLYYQLs.sbw5ct2ioOhsROEyBICSpNIrhl6.Oey', 2),
(18, 'armando', 'gomez', 'peña', 20, 'armando@gmail.com', '$2y$10$wbfCOZimN43cUtt9ZD4cW.250Jh1Wzcfq7rw9LVj97kjLHmP/5U0.', 2),
(19, 'nancy', 'contreras', 'contreras', 23, 'nancy@gmail.com', '$2y$10$t4dNeAn31ngg4lWY1oktL.9nlS/xF42UFSFPwwe3.LCA.wZqM0a0i', 2),
(20, 'victor', 'lozada', 'viloria', 16, 'victor@gmail.com', '$2y$10$Q/R7U8crrh1IxffT0BbuHO9lg6zLfnA/9PtUjqAAuIrVA8PmLmW3C', 2),
(21, 'cristian', 'buelvas', 'solano', 22, 'cristian@gmail.com', '$2y$10$Pf7PBvCcFlMvg8hnfNEvyO3cNn5JY/NffzaL65UpyzK4eOA.9CD1e', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_publicacion` (`id_publicacion`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
