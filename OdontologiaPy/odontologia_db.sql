-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 03:08:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `odontologia_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_tratamiento` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` enum('Activa','Finalizada','Cancelada') DEFAULT 'Activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `Nombre`, `id_doctor`, `id_tratamiento`, `fecha`, `hora`, `estado`) VALUES
(1, 'Felipe', 3, 2, '2024-12-10', '10:00:00', ''),
(2, '2', 2, 2, '2024-12-11', '15:00:00', 'Activa'),
(3, '1', 3, 3, '2024-12-12', '09:00:00', 'Activa'),
(4, 'Ana', 4, 1, '2024-12-17', '21:18:00', 'Activa'),
(5, 'Pedro', 5, 4, '2024-12-13', '22:54:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doctor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `nombre`, `especialidad`, `telefono`, `email`, `fecha_registro`) VALUES
(1, 'Dr. Juan Pérez', 'Ortodoncia', '987654321', 'juan.perez@odontologia.com', '2024-12-01 23:45:44'),
(2, 'Dra. María López', 'Endodoncia', '976543210', 'maria.lopez@odontologia.com', '2024-12-01 23:45:44'),
(3, 'Dr. Carlos García', 'Implantes', '965432109', 'carlos.garcia@odontologia.com', '2024-12-01 23:45:44'),
(4, 'Dr. Ricardo Torres', 'Periodoncia', '987654323', 'ricardo.torres@odontologia.com', '2024-12-02 00:20:39'),
(5, 'Dra. María Ruiz', 'Endodoncia', '987654324', 'maria.ruiz@odontologia.com', '2024-12-02 00:20:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_citas`
--

CREATE TABLE `registro_citas` (
  `id_registro` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `Estado` enum('Finalizado','Pendiente','Cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_citas`
--

INSERT INTO `registro_citas` (`id_registro`, `id_cita`, `observaciones`, `fecha_registro`, `Estado`) VALUES
(46, 5, 'Cita finalizada', '2024-12-03 01:56:06', 'Finalizado'),
(47, 1, 'Cita finalizada', '2024-12-03 02:01:35', 'Finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id_tratamiento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL,
  `duracion_estimada` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id_tratamiento`, `nombre`, `descripcion`, `costo`, `duracion_estimada`, `fecha_creacion`) VALUES
(1, 'Limpieza Dental', 'Eliminación de placa y sarro', 50.00, '30 minutos', '2024-12-01 23:45:45'),
(2, 'Blanqueamiento Dental', 'Tratamiento para aclarar el tono dental', 120.00, '1 hora', '2024-12-01 23:45:45'),
(3, 'Implantes Dentales', 'Colocación de implantes', 800.00, '2 horas', '2024-12-01 23:45:45'),
(4, 'Implante dental', 'Procedimiento quirúrgico para insertar un implante dental.', 1200.00, '3-6 meses', '2024-12-02 00:19:22'),
(5, 'Blanqueamiento dental', 'Tratamiento estético para aclarar el color de los dientes.', 200.00, '2 horas', '2024-12-02 00:19:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `tipo_usuario` enum('administrador','paciente') DEFAULT 'paciente',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `telefono`, `direccion`, `tipo_usuario`, `fecha_registro`) VALUES
(1, 'Ana Gómez', 'ana.gomez@pacientes.com', 'contrasena', '987654321', 'Av. Siempre Viva 123', 'paciente', '2024-12-01 23:45:45'),
(2, 'Luis Torres', 'luis.torres@pacientes.com', 'contrasena', '976543210', 'Jr. Los Olivos 456', 'paciente', '2024-12-01 23:45:45'),
(3, 'Admin', 'admin@odontologia.com', 'contrasena', NULL, NULL, 'administrador', '2024-12-01 23:45:45'),
(6, 'Admin1', 'admin1@odontologia.com', 'contraseña_hash', NULL, NULL, 'administrador', '2024-12-02 01:14:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_usuario` (`Nombre`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_tratamiento` (`id_tratamiento`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctor`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `registro_citas`
--
ALTER TABLE `registro_citas`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id_tratamiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro_citas`
--
ALTER TABLE `registro_citas`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_tratamiento`) REFERENCES `tratamientos` (`id_tratamiento`);

--
-- Filtros para la tabla `registro_citas`
--
ALTER TABLE `registro_citas`
  ADD CONSTRAINT `registro_citas_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
