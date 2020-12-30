-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2017 a las 01:09:02
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `nombreYapellido` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `mensaje` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_ingreso` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `nombreYapellido`, `correo`, `tel`, `mensaje`, `fecha_ingreso`) VALUES
(15, 'ojsisj', 'sanchez.m.nicolas@gmail.com', 2147483647, 'lcfeuhboieugyvorei', '2017-06-09 19:11:37'),
(16, 'nicolas sanchez', 'sanchez.m.nicolas@gmail.com', 2147483647, 'hola como te vas?', '2017-06-14 00:57:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double(11,0) NOT NULL,
  `stock` int(100) NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` enum('0','1') COLLATE utf8_spanish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `marca`, `color`, `precio`, `stock`, `modelo`, `descripcion`, `imagen`, `estado`) VALUES
(6, 'samsung', 'blanco', 2300, 3, 'nv-2500', 'disco samsung.', './assets/uploads/notebook.jpg', '1'),
(7, 'Hitachi', ' ', 1500, 4, 'disco rigido 1 tb ', '5600rpm sata', './assets/uploads/743.jpg', '1'),
(8, 'hp', 'negro', 5600, 1, 'hp 4562', 'impresora multifuncion hp 4562 ', './assets/uploads/hp.jpg', '1'),
(9, 'hp', 'negro', 8500, 1, 'hp mfp5555', 'impresora multifuncion ho mfp5555', './assets/uploads/hpempresa.jpg', '1'),
(10, 'hp', 'plata', 8500, 5, 'dv-5666', 'notebook hp vd5666 4gb ram 1tb i3', './assets/uploads/hp1-.jpg', '1'),
(11, 'dell', 'plata', 9600, 5, 'dell pfg222', 'notebook dell pfg222 1tb 8gb ram i5', './assets/uploads/notebook.jpg', '1'),
(12, 'apple', 'blanco', 8650, 1, 'ipad 4', 'apple ipad 4 blanco 16gb', './assets/uploads/ipad.jpg', '1'),
(13, 'bultaco', 'negro', 530, 10, 'bultaco ms-56', 'mouse gamer bultaco ms-56 negro con led rojo, 2100 dpi.', './assets/uploads/bultaco.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_apellido` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_alias` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_password` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('administrador','usuario') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'usuario',
  `estado` enum('0','1') COLLATE utf8_spanish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario_nombre`, `usuario_apellido`, `correo`, `usuario_alias`, `usuario_password`, `tipo`, `estado`) VALUES
(4, 'Nicolas', 'Sanchez', 'sanchez.m.nicolas@gmail.com', 'admin', 'MTIzNDU2Nzg=', 'administrador', '1'),
(5, 'diego', 'almeida', 'diego@pp.com', 'diego', 'MTIzNDU2Nzg=', 'usuario', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_detalle` int(11) NOT NULL,
  `usuario_alias` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `nombre_pro` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_detalle`, `usuario_alias`, `producto_id`, `nombre_pro`, `cantidad`, `precio`, `fecha`) VALUES
(1, 'admin', 13, 'bultaco', 1, 530, '2017-06-11 20:33:32'),
(2, 'admin', 10, 'hp', 1, 8500, '2017-06-14 00:56:25'),
(3, 'diego', 11, 'dell', 1, 9600, '2017-06-14 01:05:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario_alias` (`usuario_alias`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `usuario_alias` (`usuario_alias`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`usuario_alias`) REFERENCES `usuarios` (`usuario_alias`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
