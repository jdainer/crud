-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2026 a las 02:40:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`, `id_departamento`) VALUES
(1, 'Leticia', 1),
(2, 'Medellín', 2),
(3, 'Arauca', 3),
(4, 'Barranquilla', 4),
(5, 'Cartagena', 5),
(6, 'Tunja', 6),
(7, 'Manizales', 7),
(8, 'Florencia', 8),
(9, 'Yopal', 9),
(10, 'Popayán', 10),
(11, 'Valledupar', 11),
(12, 'Quibdó', 12),
(13, 'Montería', 13),
(14, 'Soacha', 14),
(15, 'Inírida', 15),
(16, 'San José del Guaviare', 16),
(17, 'Neiva', 17),
(18, 'Riohacha', 18),
(19, 'Santa Marta', 19),
(20, 'Villavicencio', 20),
(21, 'Pasto', 21),
(22, 'Cúcuta', 22),
(23, 'Mocoa', 23),
(24, 'Armenia', 24),
(25, 'Pereira', 25),
(26, 'San Andrés', 26),
(27, 'Bucaramanga', 27),
(28, 'Sincelejo', 28),
(29, 'Ibagué', 29),
(30, 'Cali', 30),
(31, 'Mitú', 31),
(32, 'Puerto Carreño', 32),
(33, 'Bogotá', 33),
(34, 'Bello', 2),
(35, 'Itagüí', 2),
(36, 'Envigado', 2),
(37, 'Apartadó', 2),
(38, 'Rionegro', 2),
(39, 'Turbo', 2),
(40, 'Caucasia', 2),
(41, 'Soledad', 4),
(42, 'Malambo', 4),
(43, 'Sabanalarga', 4),
(44, 'Baranoa', 4),
(45, 'Magangué', 5),
(46, 'Turbaco', 5),
(47, 'Arjona', 5),
(48, 'El Carmen de Bolívar', 5),
(49, 'Duitama', 6),
(50, 'Sogamoso', 6),
(51, 'Chiquinquirá', 6),
(52, 'Puerto Boyacá', 6),
(53, 'La Dorada', 7),
(54, 'Riosucio', 7),
(55, 'Villamaría', 7),
(56, 'Santander de Quilichao', 10),
(57, 'Puerto Tejada', 10),
(58, 'Patía', 10),
(59, 'Aguachica', 11),
(60, 'Agustín Codazzi', 11),
(61, 'Bosconia', 11),
(62, 'Lorica', 13),
(63, 'Cereté', 13),
(64, 'Sahagún', 13),
(65, 'Montelíbano', 13),
(66, 'Soacha', 14),
(67, 'Fusagasugá', 14),
(68, 'Facatativá', 14),
(69, 'Zipaquirá', 14),
(70, 'Girardot', 14),
(71, 'Mosquera', 14),
(72, 'Funza', 14),
(73, 'Pitalito', 17),
(74, 'Garzón', 17),
(75, 'La Plata', 17),
(76, 'Ciénaga', 19),
(77, 'Fundación', 19),
(78, 'El Banco', 19),
(79, 'Acacías', 20),
(80, 'Granada', 20),
(81, 'Puerto López', 20),
(82, 'Tumaco', 21),
(83, 'Ipiales', 21),
(84, 'Túquerres', 21),
(85, 'Ocaña', 22),
(86, 'Villa del Rosario', 22),
(87, 'Los Patios', 22),
(88, 'Pamplona', 22),
(89, 'Calarcá', 24),
(90, 'La Tebaida', 24),
(91, 'Montenegro', 24),
(92, 'Dosquebradas', 25),
(93, 'Santa Rosa de Cabal', 25),
(94, 'La Virginia', 25),
(95, 'Floridablanca', 27),
(96, 'Barrancabermeja', 27),
(97, 'Girón', 27),
(98, 'Piedecuesta', 27),
(99, 'San Gil', 27),
(100, 'Corozal', 28),
(101, 'San Marcos', 28),
(102, 'Espinal', 29),
(103, 'Melgar', 29),
(104, 'Mariquita', 29),
(105, 'Honda', 29),
(106, 'Líbano', 29),
(107, 'Chaparral', 29),
(108, 'Guamo', 29),
(109, 'Buenaventura', 30),
(110, 'Palmira', 30),
(111, 'Tuluá', 30),
(112, 'Yumbo', 30),
(113, 'Cartago', 30),
(114, 'Buga', 30),
(115, 'Jamundí', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `documento_v` int(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_g` int(11) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`documento_v`, `nombre`, `apellido`, `id_ciudad`, `id_g`, `id_genero`) VALUES
(66373, 'neider', 'lozano', 29, NULL, 3),
(8847878, 'juan', 'angarita', 29, NULL, 1),
(238949589, 'maria karina', 'arias', 29, NULL, 2),
(1110461599, 'jhon', 'arias', 100, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlántico'),
(5, 'Bolívar'),
(6, 'Boyacá'),
(7, 'Caldas'),
(8, 'Caquetá'),
(9, 'Casanare'),
(10, 'Cauca'),
(11, 'Cesar'),
(12, 'Chocó'),
(13, 'Córdoba'),
(14, 'Cundinamarca'),
(15, 'Guainía'),
(16, 'Guaviare'),
(17, 'Huila'),
(18, 'La Guajira'),
(19, 'Magdalena'),
(20, 'Meta'),
(21, 'Nariño'),
(22, 'Norte de Santander'),
(23, 'Putumayo'),
(24, 'Quindío'),
(25, 'Risaralda'),
(26, 'San Andrés y Providencia'),
(27, 'Santander'),
(28, 'Sucre'),
(29, 'Tolima'),
(30, 'Valle del Cauca'),
(31, 'Vaupés'),
(32, 'Vichada'),
(33, 'Bogotá D.C.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(10) NOT NULL,
  `nombre_genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `nombre_genero`) VALUES
(1, 'masculino'),
(2, 'femenino'),
(3, 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `edad`) VALUES
(1, 'Kely', '29'),
(2, 'Dilan', '10'),
(3, 'Maria', '15'),
(4, 'dainer', '38'),
(5, 'Kely', '29'),
(6, 'Dilan', '10'),
(7, 'Maria', '15'),
(8, 'jhon', '938'),
(9, 'Dilan', '11'),
(10, 'Maria', '15'),
(11, 'Madeleidy', '38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `fk_departamento` (`id_departamento`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`documento_v`),
  ADD KEY `fk_ciudad_cliente` (`id_ciudad`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `documento_v` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110461600;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fk_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_ciudad_cliente` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

