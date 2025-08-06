-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: database:3306
-- Tiempo de generación: 06-08-2025 a las 02:12:37
-- Versión del servidor: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Versión de PHP: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `boomcopia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bom`
--

CREATE TABLE `bom` (
  `cod_bom` int(11) NOT NULL,
  `cod_cli_bom` int(11) DEFAULT NULL COMMENT 'codigo cliente',
  `pro_bom` varchar(200) DEFAULT NULL COMMENT 'nombre proyecto',
  `des_bom` text DEFAULT NULL COMMENT 'descripcion',
  `not_bom` varchar(200) DEFAULT NULL,
  `fec_bom` date DEFAULT NULL,
  `cgo_bom` varchar(20) DEFAULT NULL COMMENT 'codigo',
  `mar_bom` float DEFAULT NULL,
  `sta_bom` varchar(20) DEFAULT NULL,
  `tim_bom` text NOT NULL COMMENT 'tiempo estimado de ejecucion',
  `per_bom` text NOT NULL COMMENT 'cantidad de personas',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `bom`
--

INSERT INTO `bom` (`cod_bom`, `cod_cli_bom`, `pro_bom`, `des_bom`, `not_bom`, `fec_bom`, `cgo_bom`, `mar_bom`, `sta_bom`, `tim_bom`, `per_bom`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(15, 3, 'leonardo', '', NULL, NULL, NULL, NULL, 'En Proceso', 'se estima dos semanas ', '5 personas ', '2022-09-06 14:48:34', '2023-03-10 13:14:40', NULL, '2023-03-10 13:14:40'),
(16, 58, 'instalación camaras nueva porteria ', 'Instalar dos camaras sobre un poste de 3 metros, se suministra camara adicional.', NULL, NULL, NULL, NULL, 'En Proceso', '2 dias', '2 tecnicos', '2022-11-08 11:43:47', '2023-02-02 14:17:19', NULL, '2023-02-02 14:17:19'),
(17, 58, '', '', NULL, NULL, NULL, NULL, 'En Proceso', '', '', '2022-11-23 15:23:01', '2022-11-23 15:23:05', NULL, '2022-11-23 15:23:05'),
(18, 58, 'Camaras Porteria', 'Instalación 6 cámaras en la nueva portera', NULL, NULL, NULL, NULL, 'En Proceso', '1 semana', '3 personas', '2023-02-02 14:18:16', '2023-07-17 12:11:12', NULL, NULL),
(19, 58, 'DATOS OFICINA NUEVA', 'INTALACION 50 PUESTOS DE TRBAJO', NULL, NULL, NULL, NULL, 'En Proceso', '1 MES ', '4 PERSONAS', '2023-03-10 14:42:40', '2023-03-10 14:44:51', NULL, NULL),
(20, 65, 'Bom Julio', 'una descripcion', NULL, NULL, NULL, NULL, 'En Proceso', 'Tiempo de ejecucicion:\n', 'Personal estimado:\n', '2023-07-17 15:45:31', '2023-08-18 17:41:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabezotebomdetalle`
--

CREATE TABLE `cabezotebomdetalle` (
  `cod_cab` int(11) NOT NULL,
  `cod_bom_cab` int(11) DEFAULT NULL COMMENT 'codigo del bom',
  `tip_det_cab` int(11) DEFAULT NULL COMMENT 'tipo de seleccion grupo de items(partida, subpartida, material)',
  `cod_tip_cab` int(11) DEFAULT NULL COMMENT 'codigo de la seleccion del grupo',
  `nom_det_cab` varchar(200) DEFAULT NULL COMMENT 'el nombre del tipo de agrupacion',
  `cod_cap_cab` int(11) NOT NULL COMMENT 'codigo del capitulo',
  `can_cab` int(11) NOT NULL COMMENT 'cantidad',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cabezotebomdetalle`
--

INSERT INTO `cabezotebomdetalle` (`cod_cab`, `cod_bom_cab`, `tip_det_cab`, `cod_tip_cab`, `nom_det_cab`, `cod_cap_cab`, `can_cab`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(15, 12, 1, 1, 'partidas', 4, 5, '2022-07-11 16:13:49', '2022-07-11 16:13:49', NULL, NULL),
(16, 13, 1, 1, 'partidas', 2, 10, '2022-07-11 16:33:39', '2022-07-11 16:33:39', NULL, NULL),
(17, 12, 1, 1, 'partidas', 4, 10, '2022-07-11 16:53:42', '2022-07-11 16:53:42', NULL, NULL),
(18, 12, 1, 1, 'partidas', 2, 20, '2022-07-11 17:08:54', '2022-07-11 17:08:54', NULL, NULL),
(19, 12, 1, 1, 'partidas', 2, 5, '2022-07-11 17:27:52', '2022-07-11 17:27:52', NULL, NULL),
(20, 13, 1, 2, 'partidas', 2, 20, '2022-07-12 15:58:24', '2022-07-12 15:58:24', NULL, NULL),
(21, 13, 1, 4, 'partidas', 2, 20, '2022-07-12 16:00:12', '2022-07-12 16:00:12', NULL, NULL),
(22, 12, 3, 13, 'materiales', 2, 1, '2022-09-06 14:42:39', '2022-09-06 14:42:39', NULL, NULL),
(23, 12, 3, 13, 'materiales', 2, 1, '2022-09-06 14:42:47', '2022-09-06 14:42:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE `capitulos` (
  `cod_cap` int(11) NOT NULL,
  `nom_cap` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `capitulos`
--

INSERT INTO `capitulos` (`cod_cap`, `nom_cap`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Datos', NULL, NULL, NULL),
(2, 'Eléctrico', NULL, NULL, NULL),
(3, 'S.D.I', NULL, NULL, NULL),
(4, 'Alarmas', NULL, NULL, NULL),
(5, 'Mantenimiento', NULL, NULL, NULL),
(6, 'Iluminacion', NULL, NULL, NULL),
(7, 'CCTV', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulosbom`
--

CREATE TABLE `capitulosbom` (
  `cod_cbo` int(11) NOT NULL,
  `cod_bom_cbo` int(11) NOT NULL COMMENT 'codigo del bom',
  `nom_cbo` varchar(250) DEFAULT NULL COMMENT 'nombere del capitulo',
  `can_cbo` int(11) NOT NULL COMMENT 'cantidad de veces de este capitulo',
  `tip_cbo` varchar(50) DEFAULT NULL COMMENT 'tipo de capitulo',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `capitulosbom`
--

INSERT INTO `capitulosbom` (`cod_cbo`, `cod_bom_cbo`, `nom_cbo`, `can_cbo`, `tip_cbo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 15, 'nombre iluminacion', 123, '6', '2022-09-06 18:25:40', '2022-10-15 17:14:03', '2022-10-15 17:14:03'),
(2, 15, 'nombre 2dffdfdf', 22, '2', '2022-09-06 18:27:02', '2022-10-15 17:21:41', '2022-10-15 17:14:03'),
(3, 15, 'nombre 3', 33, '5', '2022-09-06 18:27:18', '2022-10-15 17:10:23', '2022-10-15 17:14:03'),
(4, 15, 'salida a toma regulada', 10, '2', '2022-09-07 11:15:27', '2022-09-07 11:15:27', '2022-10-15 17:14:03'),
(5, 15, 'alarma test', 10, '4', '2022-10-06 11:52:22', '2022-10-06 11:52:22', '2022-10-15 17:14:03'),
(6, 15, 'mi partida modificada4444 65656565', 5, '4', '2022-10-06 17:55:48', '2022-12-23 14:56:10', '2022-12-23 14:56:10'),
(7, 15, 'dfsdfsdf', 1, '2', '2022-10-15 17:22:52', '2022-10-15 17:44:06', '2022-10-15 17:44:06'),
(8, 15, 'leonardo modificado', 105, '3', '2022-10-15 17:23:08', '2022-12-23 14:56:07', '2022-12-23 14:56:07'),
(9, 15, '67676', 676767, '3', '2022-10-15 17:27:54', '2022-10-15 17:30:07', '2022-10-15 17:30:07'),
(10, 15, 'sdfdssd', 454545, '3', '2022-10-15 17:29:27', '2022-10-15 17:30:03', '2022-10-15 17:30:03'),
(11, 15, '4545', 565656, '3', '2022-10-15 17:34:14', '2022-10-15 17:44:30', '2022-10-15 17:44:30'),
(12, 15, 'para ver q cambia 2 cmbia muy rapidote', 800, '2', '2022-10-15 17:36:32', '2022-10-15 17:46:52', '2022-10-15 17:46:52'),
(13, 15, '333', 333, '3', '2022-10-15 17:37:01', '2022-10-15 17:43:01', '2022-10-15 17:43:01'),
(14, 15, '454545', 77, '2', '2022-10-15 17:39:05', '2022-10-15 17:43:44', '2022-10-15 17:43:44'),
(15, 15, '9998887777', 77, '2', '2022-10-15 17:39:40', '2022-12-23 14:56:04', '2022-12-23 14:56:04'),
(16, 15, 'para borrar', 9, '4', '2022-10-15 17:45:17', '2022-10-15 17:45:24', '2022-10-15 17:45:24'),
(17, 15, 'partida de mante', 5, '5', '2022-10-19 13:14:41', '2022-12-23 14:56:00', '2022-12-23 14:56:00'),
(18, 15, '4545', 676767, '2', '2022-10-19 13:16:29', '2022-10-19 14:10:14', '2022-10-19 14:10:14'),
(19, 15, 'partida de uli cambio mantenimient6o', 100, '5', '2022-10-19 13:19:15', '2022-12-23 14:55:56', '2022-12-23 14:55:56'),
(20, 15, 'Panel de incendios', 1, '3', '2022-10-21 12:00:09', '2022-12-23 14:53:56', '2022-12-23 14:53:56'),
(21, 16, 'SUMINISTRO E INSTALACIÓN CÁMARA IP SISTEMA CCTV PARQUEADEROS CASETA INGRESO, INCLUYE SOPORTE CAMARAS', 1, '5', '2022-11-08 11:48:58', '2022-12-23 14:53:40', '2022-12-23 14:53:40'),
(22, 16, 'SUMINISTRO E INSTALACIÓN DE SALIDA TELECOMUNICACIONES CAT. 6A', 1, '5', '2022-11-08 11:49:35', '2022-12-23 14:53:35', '2022-12-23 14:53:35'),
(23, 16, 'SUMINISTRO E INSTALACIÓN DE CANALIZACIÓN CON TUBERIA METALICA EMT', 3, '5', '2022-11-08 11:50:19', '2022-12-23 14:53:52', '2022-12-23 14:53:52'),
(24, 16, 'Sumnistro e instalcion puntos de datos', 20, '1', '2022-12-28 16:14:00', '2022-12-28 16:14:00', NULL),
(25, 15, 'ewerwer', 5, '2', '2023-01-13 17:27:52', '2023-01-13 17:27:52', NULL),
(26, 16, 'cámara dos megapixeles', 5, '7', '2023-01-31 08:45:16', '2023-01-31 08:45:16', NULL),
(27, 18, 'Camaras tipo Domo 2 Megapixeles', 6, '7', '2023-02-02 14:20:56', '2023-02-02 14:20:56', NULL),
(28, 18, 'partida general', 10, '6', '2023-02-27 09:20:02', '2023-02-27 09:20:02', NULL),
(29, 19, 'PUESTOS DE TRABAJO', 50, '1', '2023-03-10 14:43:14', '2023-03-10 14:43:14', NULL),
(30, 19, 'mi partida', 5, '3', '2023-07-17 15:38:16', '2023-07-17 15:38:16', NULL),
(31, 20, 'capitulo uno', 5, '3', '2023-07-25 15:44:01', '2023-07-25 15:44:01', NULL),
(32, 20, 'Partida 2', 10, '4', '2023-07-25 15:44:54', '2023-07-25 15:44:54', NULL),
(33, 20, 'aaaa', 1, '6', '2023-07-25 15:47:01', '2023-07-25 15:47:01', NULL),
(40, 20, 'EMT ', 30, '7', '2023-07-26 15:10:45', '2023-07-26 15:10:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cod_cli` int(11) NOT NULL,
  `nom_cli` varchar(50) DEFAULT NULL,
  `con_cli` varchar(50) DEFAULT NULL,
  `dir_cli` varchar(200) DEFAULT NULL,
  `tel_cli` varchar(50) DEFAULT NULL,
  `rso_cli` varchar(50) DEFAULT NULL,
  `mail_cli` varchar(50) DEFAULT NULL,
  `nit_cli` varchar(50) DEFAULT NULL,
  `obs_cli` text DEFAULT NULL,
  `cod_usu_cli` int(11) DEFAULT NULL COMMENT 'codigo del usuario responsable',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cli`, `nom_cli`, `con_cli`, `dir_cli`, `tel_cli`, `rso_cli`, `mail_cli`, `nit_cli`, `obs_cli`, `cod_usu_cli`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(2, 'la empresa tec', 'Leonardo Cortes', 'la calle 100', '89365656 -454545- 454545454878', 'lys', 'correo@correo.co', '7', 'mis anotaciones', 3, NULL, '2022-10-06 18:28:19', NULL, '2022-10-06 18:28:19'),
(3, 'la empresa 3', 'Leonardo Cortes', 'la calle 100', '89365656 -454545- 454545454878', 'lys', 'correo@correo.co', '77', 'mis anotaciones', 0, NULL, '2022-10-06 18:28:17', NULL, '2022-10-06 18:28:17'),
(4, 'la empresa 4', 'Leonardo Cortes', 'la calle 100', '89365656 -454545- 454545454878', 'lys', 'correo@correo.co', '777', 'mis anotacionesasdasdasdasdasdadasdsdsdsdsdsd asdasdasdasdasd', 0, NULL, '2022-08-08 18:29:41', NULL, '2022-08-08 18:29:41'),
(10, '111119999911111111', '3333', '4444', '555', '2222', 'user@mottif.com', '666', '7777', 3, '2022-03-22 03:21:00', '2022-08-06 17:24:35', NULL, '2022-08-06 17:24:35'),
(11, 'SEYTEC SAS', 'Daniel ', 'Calle', '601', 'seytec', 'dmar', '900', 'observacioen importantes sdfsdfsdfsfadasdasdasd', 1, '2022-03-30 14:31:40', '2023-02-03 09:33:01', NULL, '2023-02-03 09:33:01'),
(49, '1111', '333333', '444', '5655555', '2222', '66666', '88888', '77777', 2, '2022-08-05 18:34:11', '2022-08-05 18:35:38', NULL, '2022-08-05 18:35:38'),
(50, '56756756756756', '756756757567567', NULL, NULL, '756756756', NULL, NULL, NULL, NULL, '2022-08-05 18:35:04', '2022-08-05 18:35:35', NULL, '2022-08-05 18:35:35'),
(51, '2121231234234234', '234234234234234', NULL, NULL, '234234234', NULL, NULL, NULL, NULL, '2022-08-05 18:35:49', '2022-08-06 17:20:19', NULL, '2022-08-06 17:20:19'),
(52, 'un campotrwerewrwerwerwer', '6666666', 'asdasdasd', NULL, '555555555', NULL, NULL, NULL, NULL, '2022-08-05 19:10:02', '2022-08-06 16:26:59', NULL, '2022-08-06 16:26:59'),
(53, '56756756757567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-06 16:27:05', '2022-08-06 17:17:53', NULL, '2022-08-06 17:17:53'),
(54, '9912121212', '7745456456', '45645666', '55456456', '328845234234', '44456456', '33456456', '22456456456456', NULL, '2022-08-06 16:38:57', '2022-08-06 17:20:58', NULL, '2022-08-06 17:20:58'),
(55, '111119', '33339', '44449', '5559', '22229', '6669', '77779', '8888896666', 2, '2022-08-06 17:10:53', '2022-08-06 17:22:09', NULL, '2022-08-06 17:22:09'),
(56, '333333333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-06 17:35:29', '2022-08-06 17:41:00', NULL, '2022-08-06 17:41:00'),
(57, '111', '333', '444', '555', '222', '666', '777', '88888', 3, '2022-08-08 18:38:06', '2022-10-06 18:28:15', NULL, '2022-10-06 18:28:15'),
(58, 'Pomar', 'Victor Ortiz', 'Cajica', '3165217737', 'Sabanalac - Pomar', 'victor.ortiz@elpomar.com.co', '860512466-6', '', 2, '2022-11-08 11:41:42', '2023-02-03 08:25:05', NULL, NULL),
(59, '111', '3333', '4444', '', '222', '', '', '', 0, '2023-01-10 15:26:08', '2023-01-10 15:26:15', NULL, '2023-01-10 15:26:15'),
(60, 'COMESTIBLES RICOS', 'SERGIO VARGAS', 'Cl. 17d #116-15', '3104906987', '', 'sergio.vargas@superricas.com', '8600203089', '', 0, '2023-02-03 09:32:46', '2023-02-03 09:32:46', NULL, NULL),
(61, 'BMIND', 'CESAR TRIANA', 'Cra. 45a #93-77, Barrios Unidos', ' 321 3190127', 'BMIND S.A.S', 'gerente.cuenta.bogota2@bmind.com', '9001059791', '', 0, '2023-02-03 09:53:28', '2023-02-03 09:53:28', NULL, NULL),
(62, 'FACTORES Y MERCADEO', 'IVAN GONZALEZ', 'CARRERA 116 # 14 B 95', '3173700431', 'FACTORES Y MERCADEO', 'coordinador.admin@factoresymercadeo.com', '8000778284', '', 0, '2023-02-04 01:31:25', '2023-02-04 01:31:25', NULL, NULL),
(63, 'LACTALIS - PARMALAT', 'ORLANDO CAMACHO', 'Diagonal 182 # 20-84 Bogotá', '6799998', 'LACTALIS COLOMBIA LTDA', 'Orlando.camacho@co.lactalis.com ', '8002457950', '', 0, '2023-02-04 01:37:11', '2023-02-04 01:37:11', NULL, NULL),
(64, 'PPU', 'Maria Fernanda Acero', 'Cr 9 # 74 - 08', ' 3268600', 'Philippi Prietocarrizosa Ferrero DU & Uría PPU', 'fernanda.acero@ppulegal.com', '8002404502', '', 0, '2023-02-04 01:40:05', '2023-02-04 01:40:05', NULL, NULL),
(65, 'G4S', 'ANDERSON PARRA', 'CARRERA 85 D # 46 A 65 BOD. 15', '3213110154', 'G4S Secure Solutions Colombia S.A ', 'anderson.parra@co.g4s.com', '86001139516', '', 0, '2023-02-04 01:46:37', '2023-02-04 01:46:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpobomdetalle`
--

CREATE TABLE `cuerpobomdetalle` (
  `cod_cub` int(11) NOT NULL,
  `cod_bom_cub` int(11) DEFAULT NULL COMMENT 'codigo del bom',
  `cod_hed_cub` int(11) DEFAULT NULL COMMENT 'codigo del maestro header tabla capitulosbom',
  `cod_mat_cub` int(11) DEFAULT NULL COMMENT 'codigo del material',
  `cos_mat_cub` int(11) NOT NULL COMMENT 'costo final del material al cerrar el bom',
  `cod_cap_cub` int(11) NOT NULL COMMENT 'codigo de tipo de capitulo',
  `fac_can_cub` decimal(10,0) DEFAULT NULL COMMENT 'cantidad por el factor ',
  `can_hed_cub` int(11) DEFAULT NULL COMMENT 'cantidad del material',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cuerpobomdetalle`
--

INSERT INTO `cuerpobomdetalle` (`cod_cub`, `cod_bom_cub`, `cod_hed_cub`, `cod_mat_cub`, `cos_mat_cub`, `cod_cap_cub`, `fac_can_cub`, `can_hed_cub`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(1, 15, 1, 157, 2, 0, '1', NULL, '2022-09-06 19:45:18', '2022-09-06 19:45:18', NULL, NULL),
(2, 15, 1, 157, 2, 0, '1', NULL, '2022-09-06 19:45:29', '2022-09-06 19:45:29', NULL, NULL),
(3, 15, 1, 157, 2, 0, '1', NULL, '2022-09-06 19:45:32', '2022-09-06 19:45:32', NULL, NULL),
(4, 15, 1, 14, 22, 0, '11', NULL, '2022-09-06 19:46:15', '2022-09-06 19:46:15', NULL, NULL),
(5, 15, 4, 13, 2000, 0, '2', NULL, '2022-09-07 11:30:09', '2022-09-07 11:30:09', NULL, NULL),
(6, 15, 1, 14, 50000, 0, '50', NULL, '2022-09-15 16:48:27', '2022-09-15 16:48:27', NULL, NULL),
(7, 15, 1, 170, 0, 0, '0', NULL, '2022-09-15 16:54:35', '2022-09-15 16:54:35', NULL, NULL),
(8, 15, 19, 170, 666666, 0, '4444', 100, '2022-09-15 16:56:14', '2022-09-15 16:56:14', NULL, NULL),
(9, 15, 19, 91, 5000, 0, '50', 50, '2022-09-15 16:57:06', '2022-09-15 16:57:06', NULL, NULL),
(10, 15, 16, 49, 350, 0, NULL, NULL, '2022-10-06 14:33:09', '2022-10-06 14:33:09', NULL, NULL),
(11, 15, 19, 49, 350, 0, NULL, 8, '2022-10-06 14:35:20', '2022-10-06 14:35:20', NULL, NULL),
(12, 15, 6, 0, 0, 0, NULL, NULL, '2022-10-06 17:59:44', '2022-10-06 17:59:44', NULL, NULL),
(13, 15, 6, 171, 48000, 0, NULL, 10, '2022-10-19 12:46:26', '2022-10-19 12:46:26', NULL, NULL),
(14, 15, 6, 14, 3061, 0, '1', 777, '2022-10-19 14:37:45', '2022-10-19 14:37:45', NULL, NULL),
(16, 15, 6, 136, 162240, 0, NULL, 7777, '2022-10-19 14:46:30', '2022-10-19 14:46:30', NULL, NULL),
(17, 15, 6, 171, 48000, 0, NULL, 98989, '2022-10-19 14:47:10', '2022-10-19 14:47:10', NULL, NULL),
(18, 15, 6, 132, 80000, 0, NULL, 1010, '2022-10-19 14:52:47', '2022-10-19 14:52:47', NULL, NULL),
(19, 15, 6, 84, 120000, 0, NULL, 123456, '2022-10-19 15:22:40', '2022-10-19 15:22:40', NULL, NULL),
(20, 15, 8, 68, 5300, 0, NULL, 50, '2022-10-19 15:40:37', '2022-10-19 15:40:37', NULL, NULL),
(21, 15, 8, 1, 794, 0, NULL, 20, '2022-10-19 15:40:49', '2022-10-19 15:40:49', NULL, NULL),
(22, 15, 8, 59, 640, 0, NULL, 100, '2022-10-19 15:40:59', '2022-10-19 15:40:59', NULL, NULL),
(23, 15, 6, 13, 3061, 0, NULL, 5, '2022-10-19 15:47:36', '2022-10-19 15:47:36', NULL, NULL),
(24, 15, 6, 102, 35000, 0, NULL, 2, '2022-10-19 15:47:57', '2022-10-19 15:47:57', NULL, NULL),
(25, 15, 19, 49, 350, 0, NULL, 44, '2022-10-19 15:50:36', '2022-10-19 15:50:36', NULL, NULL),
(26, 15, 19, 103, 52000, 0, NULL, 1, '2022-10-19 15:50:57', '2022-10-19 15:50:57', NULL, NULL),
(27, 15, 19, 23, 1973, 0, NULL, 89, '2022-10-19 15:53:15', '2022-10-19 15:53:15', NULL, NULL),
(28, 15, 19, 74, 1650, 0, NULL, 8, '2022-10-19 15:55:54', '2022-10-19 15:55:54', NULL, NULL),
(29, 15, 6, 70, 26229, 0, NULL, 50, '2022-10-20 16:15:53', '2022-10-20 16:15:53', NULL, NULL),
(30, 15, 6, 14, 3061, 0, NULL, 50, '2022-10-21 11:54:42', '2022-10-21 11:54:42', NULL, NULL),
(31, 16, 21, 0, 0, 0, NULL, 0, '2022-11-23 15:25:55', '2022-11-23 15:25:55', NULL, NULL),
(32, 16, 21, 117, 10000, 0, NULL, 10, '2022-11-23 15:26:13', '2022-11-23 15:26:13', NULL, NULL),
(33, 16, 24, 0, 0, 0, NULL, 0, '2022-12-28 16:14:32', '2022-12-28 16:14:32', NULL, NULL),
(34, 16, 24, 0, 0, 0, NULL, 0, '2022-12-28 16:15:00', '2022-12-28 16:15:00', NULL, NULL),
(35, 15, 25, 10, 81011, 0, NULL, 10, '2023-01-13 17:28:10', '2023-01-13 17:28:10', NULL, NULL),
(36, 18, 27, 185, 125000, 0, NULL, 6, '2023-02-02 14:29:35', '2023-02-02 14:29:35', NULL, NULL),
(37, 18, 27, 0, 0, 0, NULL, 0, '2023-02-02 14:30:16', '2023-02-02 14:30:16', NULL, NULL),
(38, 16, 24, 0, 0, 0, NULL, 0, '2023-02-20 11:06:03', '2023-02-20 11:06:03', NULL, NULL),
(39, 18, 28, 9, 63770, 0, NULL, 1, '2023-02-27 09:20:17', '2023-02-27 09:20:17', NULL, NULL),
(40, 15, 25, 4, 1703, 0, NULL, 5, '2023-02-27 11:17:45', '2023-02-27 11:17:45', NULL, NULL),
(41, 18, 27, 0, 0, 0, NULL, 0, '2023-02-27 11:18:21', '2023-02-27 11:18:21', NULL, NULL),
(42, 19, 29, 0, 0, 0, NULL, 0, '2023-03-10 14:43:36', '2023-03-10 14:43:36', NULL, NULL),
(43, 19, 29, 0, 0, 0, NULL, 0, '2023-03-10 14:43:58', '2023-03-10 14:43:58', NULL, NULL),
(44, 19, 29, 0, 0, 0, NULL, 0, '2023-03-10 14:44:45', '2023-03-10 14:44:45', NULL, NULL),
(45, 18, 27, 160, 6500, 0, NULL, 5, '2023-07-17 12:11:08', '2023-07-17 12:11:08', NULL, NULL),
(46, 18, 27, 103, 39496, 0, NULL, 8, '2023-07-17 12:12:05', '2023-07-17 12:12:05', NULL, NULL),
(47, 18, 27, 0, 0, 0, NULL, 0, '2023-07-17 12:12:26', '2023-07-17 12:12:26', NULL, NULL),
(48, 19, 30, 92, 20588, 0, NULL, 50, '2023-07-17 15:38:29', '2023-07-17 15:38:29', NULL, NULL),
(49, 19, 30, 92, 20588, 0, NULL, 50, '2023-07-17 15:38:34', '2023-07-17 15:38:34', NULL, NULL),
(104, 20, 33, 112, 5182, 0, '1', 1, '2023-07-25 17:40:05', '2023-07-25 17:40:05', NULL, NULL),
(105, 20, 33, 114, 1703, 0, '1', 1, '2023-07-25 17:40:05', '2023-07-25 17:40:05', NULL, NULL),
(106, 20, 33, 117, 531, 0, '2', 2, '2023-07-25 17:40:05', '2023-07-25 17:40:05', NULL, NULL),
(107, 20, 33, 118, 21778, 0, '1', 1, '2023-07-25 17:40:05', '2023-07-25 17:40:05', NULL, NULL),
(108, 20, 33, 119, 16000, 0, '10', 10, '2023-07-25 17:40:05', '2023-07-25 17:40:05', NULL, NULL),
(109, 20, 33, 120, 10555, 0, '1', 1, '2023-07-25 17:40:05', '2023-07-25 17:40:05', NULL, NULL),
(110, 20, 33, 138, 788, 0, '100', 100, '2023-07-25 17:40:05', '2023-07-25 17:40:05', NULL, NULL),
(111, 20, 33, 139, 2500, 0, '5000', 5000, '2023-07-25 17:40:05', '2023-07-25 17:40:05', NULL, NULL),
(112, 20, 34, 112, 5182, 0, '1', 1, '2023-07-26 14:51:23', '2023-07-26 14:51:23', NULL, NULL),
(113, 20, 34, 114, 1703, 0, '1', 1, '2023-07-26 14:51:23', '2023-07-26 14:51:23', NULL, NULL),
(114, 20, 34, 117, 531, 0, '2', 2, '2023-07-26 14:51:23', '2023-07-26 14:51:23', NULL, NULL),
(115, 20, 34, 118, 21778, 0, '1', 1, '2023-07-26 14:51:23', '2023-07-26 14:51:23', NULL, NULL),
(116, 20, 34, 119, 16000, 0, '10', 10, '2023-07-26 14:51:23', '2023-07-26 14:51:23', NULL, NULL),
(117, 20, 34, 120, 10555, 0, '1', 1, '2023-07-26 14:51:23', '2023-07-26 14:51:23', NULL, NULL),
(118, 20, 34, 138, 788, 0, '100', 100, '2023-07-26 14:51:23', '2023-07-26 14:51:23', NULL, NULL),
(119, 20, 34, 139, 2500, 0, '5000', 5000, '2023-07-26 14:51:23', '2023-07-26 14:51:23', NULL, NULL),
(120, 20, 34, 3, 1975, 0, NULL, 2, '2023-07-26 14:51:52', '2023-07-26 14:51:52', NULL, NULL),
(121, 20, 34, 123, 12000, 0, '1', 1, '2023-07-26 14:52:44', '2023-07-26 14:52:44', NULL, NULL),
(122, 20, 34, 124, 1550, 0, '1', 1, '2023-07-26 14:52:44', '2023-07-26 14:52:44', NULL, NULL),
(123, 20, 34, 131, 3607, 0, '1', 1, '2023-07-26 14:55:33', '2023-07-26 14:55:33', NULL, NULL),
(124, 20, 34, 133, 21429, 0, '2', 2, '2023-07-26 14:55:33', '2023-07-26 14:55:33', NULL, NULL),
(125, 20, 34, 134, 5800, 0, '1', 1, '2023-07-26 14:55:33', '2023-07-26 14:55:33', NULL, NULL),
(126, 20, 34, 136, 558, 0, '1', 1, '2023-07-26 14:55:33', '2023-07-26 14:55:33', NULL, NULL),
(127, 20, 34, 137, 2500, 0, '2', 2, '2023-07-26 14:55:33', '2023-07-26 14:55:33', NULL, NULL),
(128, 20, 35, 131, 3607, 0, '1', 1, '2023-07-26 14:57:07', '2023-07-26 14:57:07', NULL, NULL),
(129, 20, 35, 133, 21429, 0, '2', 2, '2023-07-26 14:57:07', '2023-07-26 14:57:07', NULL, NULL),
(130, 20, 35, 134, 5800, 0, '1', 1, '2023-07-26 14:57:07', '2023-07-26 14:57:07', NULL, NULL),
(131, 20, 35, 136, 558, 0, '1', 1, '2023-07-26 14:57:07', '2023-07-26 14:57:07', NULL, NULL),
(132, 20, 35, 137, 2500, 0, '2', 2, '2023-07-26 14:57:07', '2023-07-26 14:57:07', NULL, NULL),
(133, 20, 37, 140, 28655, 0, '0', 0, '2023-07-26 15:05:12', '2023-07-26 15:05:12', NULL, NULL),
(134, 20, 37, 141, 1303, 0, '0', 0, '2023-07-26 15:05:12', '2023-07-26 15:05:12', NULL, NULL),
(135, 20, 38, 142, 28655, 0, '2', 2, '2023-07-26 15:07:40', '2023-07-26 15:07:40', NULL, NULL),
(136, 20, 38, 143, 1303, 0, '2', 2, '2023-07-26 15:07:40', '2023-07-26 15:07:40', NULL, NULL),
(137, 20, 39, 142, 28655, 0, '2', 2, '2023-07-26 15:09:29', '2023-07-26 15:09:29', NULL, NULL),
(138, 20, 39, 143, 1303, 0, '2', 2, '2023-07-26 15:09:29', '2023-07-26 15:09:29', NULL, NULL),
(139, 20, 39, 123, 12000, 0, '1', 1, '2023-07-26 15:09:39', '2023-07-26 15:09:39', NULL, NULL),
(140, 20, 39, 124, 1550, 0, '1', 1, '2023-07-26 15:09:39', '2023-07-26 15:09:39', NULL, NULL),
(141, 20, 40, 144, 28655, 0, '1', 1, '2023-07-26 15:10:54', '2023-07-26 15:10:54', NULL, NULL),
(142, 20, 40, 145, 1303, 0, '2', 2, '2023-07-26 15:10:54', '2023-07-26 15:10:54', NULL, NULL),
(143, 20, 33, 3, 1975, 0, NULL, 10, '2023-07-26 15:14:46', '2023-07-26 15:14:46', NULL, NULL),
(144, 20, 40, 1, 5555, 0, NULL, 1111, '2023-08-09 16:49:29', '2023-08-09 16:49:29', NULL, NULL),
(145, 20, 40, 49, 4500, 0, NULL, 10, '2023-08-18 17:20:34', '2023-08-18 17:20:34', NULL, NULL),
(146, 20, 40, 115, 208319, 0, NULL, 20, '2023-08-18 17:22:44', '2023-08-18 17:22:44', NULL, NULL),
(147, 20, 40, 68, 104299, 0, NULL, 25, '2023-08-18 17:24:02', '2023-08-18 17:24:02', NULL, NULL),
(148, 20, 40, 71, 245, 0, NULL, 150, '2023-08-18 17:38:36', '2023-08-18 17:38:36', NULL, NULL),
(149, 20, 40, 179, 47000, 0, NULL, 12, '2023-08-18 17:39:22', '2023-08-18 17:39:22', NULL, NULL),
(150, 20, 40, 135, 330998, 0, NULL, 3, '2023-08-18 17:48:39', '2023-08-18 17:48:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detplantillaitem`
--

CREATE TABLE `detplantillaitem` (
  `cod_dpi` int(11) NOT NULL,
  `cod_pla_dpi` int(11) NOT NULL,
  `cod_ite_dpi` int(11) NOT NULL,
  `fac_ite_dpi` double DEFAULT NULL COMMENT 'factor del producto',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `detplantillaitem`
--

INSERT INTO `detplantillaitem` (`cod_dpi`, `cod_pla_dpi`, `cod_ite_dpi`, `fac_ite_dpi`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(2, 1, 3, NULL, '2022-02-14 18:08:22', '2022-02-14 18:08:22', NULL, NULL),
(3, 1, 4, NULL, '2022-02-14 18:08:31', '2022-02-14 18:08:31', NULL, NULL),
(6, 1, 4, NULL, NULL, NULL, NULL, NULL),
(32, 13, 3, NULL, NULL, NULL, NULL, NULL),
(33, 13, 13, NULL, NULL, NULL, NULL, NULL),
(34, 13, 57, NULL, NULL, NULL, NULL, NULL),
(36, 14, 4, NULL, NULL, NULL, NULL, NULL),
(38, 14, 150, NULL, NULL, NULL, NULL, NULL),
(39, 14, 117, NULL, NULL, NULL, NULL, NULL),
(40, 15, 42, NULL, NULL, NULL, NULL, NULL),
(41, 15, 44, NULL, NULL, NULL, NULL, NULL),
(42, 16, 113, NULL, NULL, NULL, NULL, NULL),
(43, 17, 4, NULL, NULL, NULL, NULL, NULL),
(44, 17, 17, NULL, NULL, NULL, NULL, NULL),
(45, 17, 66, NULL, NULL, NULL, NULL, NULL),
(46, 14, 3, NULL, NULL, NULL, NULL, NULL),
(47, 14, 27, NULL, NULL, NULL, NULL, NULL),
(48, 14, 34, NULL, NULL, NULL, NULL, NULL),
(49, 18, 3, NULL, NULL, NULL, NULL, NULL),
(50, 19, 15, NULL, NULL, '2022-07-12 15:42:03', NULL, '2022-07-12 15:42:03'),
(51, 19, 27, NULL, NULL, '2022-07-12 15:41:59', NULL, '2022-07-12 15:41:59'),
(52, 19, 77, NULL, NULL, '2022-07-12 15:41:57', NULL, '2022-07-12 15:41:57'),
(53, 21, 14, NULL, NULL, NULL, NULL, NULL),
(54, 2, 20, NULL, '2022-05-19 15:13:14', '2022-05-19 15:13:14', NULL, NULL),
(56, 24, 13, NULL, '2022-05-25 17:48:22', '2022-05-25 17:48:22', NULL, NULL),
(57, 24, 15, NULL, '2022-05-25 18:10:05', '2022-05-25 18:10:05', NULL, NULL),
(58, 24, 14, NULL, '2022-05-25 18:11:37', '2022-05-25 18:11:37', NULL, NULL),
(60, 24, 30, NULL, '2022-05-25 18:22:41', '2022-05-25 18:22:41', NULL, NULL),
(61, 0, 0, NULL, '2022-05-26 16:29:44', '2022-05-26 16:29:44', NULL, NULL),
(62, 25, 13, NULL, '2022-05-31 15:10:36', '2022-05-31 15:10:36', NULL, NULL),
(63, 25, 15, NULL, '2022-05-31 15:10:57', '2022-05-31 15:10:57', NULL, NULL),
(64, 25, 147, NULL, '2022-06-14 15:42:00', '2022-06-14 15:42:00', NULL, NULL),
(65, 26, 14, NULL, '2022-07-06 14:30:35', '2022-07-06 14:30:35', NULL, NULL),
(66, 26, 81, NULL, '2022-07-06 14:30:42', '2022-07-06 14:30:42', NULL, NULL),
(67, 26, 58, NULL, '2022-07-06 14:31:07', '2022-07-06 14:31:07', NULL, NULL),
(68, 27, 158, NULL, '2022-07-06 14:32:58', '2022-07-06 14:32:58', NULL, NULL),
(69, 27, 103, NULL, '2022-07-06 14:33:10', '2022-07-06 14:33:10', NULL, NULL),
(70, 27, 101, NULL, '2022-07-06 14:34:11', '2022-07-06 14:34:11', NULL, NULL),
(71, 27, 116, NULL, '2022-07-11 16:28:40', '2022-07-11 16:28:40', NULL, NULL),
(72, 19, 42, NULL, '2022-07-12 15:42:30', '2022-09-15 16:36:14', NULL, '2022-09-15 16:36:14'),
(73, 19, 170, NULL, '2022-07-12 15:46:02', '2022-09-15 16:36:17', NULL, '2022-09-15 16:36:17'),
(74, 19, 150, NULL, '2022-07-12 15:46:41', '2022-09-15 16:36:19', NULL, '2022-09-15 16:36:19'),
(75, 19, 171, NULL, '2022-07-12 15:49:18', '2022-09-15 16:36:21', NULL, '2022-09-15 16:36:21'),
(76, 28, 74, NULL, '2022-09-15 15:59:45', '2022-10-06 11:17:34', NULL, '2022-10-06 11:17:34'),
(77, 28, 47, NULL, '2022-09-15 16:20:33', '2022-10-06 11:17:37', NULL, '2022-10-06 11:17:37'),
(78, 28, 16, NULL, '2022-09-15 16:21:12', '2022-10-06 11:17:40', NULL, '2022-10-06 11:17:40'),
(79, 28, 106, NULL, '2022-09-15 16:22:33', '2022-10-06 11:17:44', NULL, '2022-10-06 11:17:44'),
(80, 28, 15, NULL, '2022-09-15 16:23:25', '2022-10-06 11:19:56', NULL, '2022-10-06 11:19:56'),
(81, 19, 14, NULL, '2022-09-15 16:25:15', '2022-09-15 16:36:23', NULL, '2022-09-15 16:36:23'),
(82, 19, 170, NULL, '2022-09-15 16:25:26', '2022-09-15 16:36:25', NULL, '2022-09-15 16:36:25'),
(83, 19, 88, NULL, '2022-09-15 16:27:03', '2022-09-15 16:36:27', NULL, '2022-09-15 16:36:27'),
(84, 19, 13, NULL, '2022-09-15 16:29:10', '2022-09-15 16:36:29', NULL, '2022-09-15 16:36:29'),
(85, 19, 13, NULL, '2022-09-15 16:29:54', '2022-09-15 16:36:32', NULL, '2022-09-15 16:36:32'),
(86, 19, 15, 101, '2022-09-15 16:32:55', '2022-10-04 20:00:31', NULL, '2022-10-04 20:00:31'),
(87, 19, 171, 89, '2022-09-15 16:33:16', '2022-09-15 16:33:16', NULL, NULL),
(88, 19, 108, 1, '2022-09-15 16:36:37', '2022-09-15 16:36:37', NULL, NULL),
(89, 19, 13, 90, '2022-09-15 16:37:46', '2022-09-15 16:37:46', NULL, NULL),
(90, 19, 171, 115, '2022-09-15 16:39:02', '2022-09-15 16:39:02', NULL, NULL),
(91, 19, 156, 222, '2022-09-15 16:39:52', '2022-09-15 16:39:52', NULL, NULL),
(92, 19, 11, 555, '2022-09-15 16:41:46', '2022-09-15 16:41:46', NULL, NULL),
(93, 28, 125, 45, '2022-09-15 18:44:14', '2022-10-06 11:19:58', NULL, '2022-10-06 11:19:58'),
(94, 28, 1, 0, '2022-10-06 11:14:55', '2022-10-06 11:20:00', NULL, '2022-10-06 11:20:00'),
(95, 28, 154, 20, '2022-10-06 11:15:20', '2022-10-06 11:33:17', NULL, '2022-10-06 11:33:17'),
(96, 28, 154, 20, '2022-10-06 11:15:23', '2022-10-06 11:32:00', NULL, '2022-10-06 11:32:00'),
(97, 28, 13, 111, '2022-10-06 11:16:56', '2022-10-06 11:31:57', NULL, '2022-10-06 11:31:57'),
(98, 28, 171, 50, '2022-10-06 11:17:54', '2022-10-06 11:33:15', NULL, '2022-10-06 11:33:15'),
(99, 28, 49, 56, '2022-10-06 11:18:37', '2022-10-06 11:32:29', NULL, '2022-10-06 11:32:29'),
(100, 28, 171, 99, '2022-10-06 11:20:09', '2022-10-06 11:31:55', NULL, '2022-10-06 11:31:55'),
(101, 28, 84, 122, '2022-10-06 11:22:20', '2022-10-06 11:32:27', NULL, '2022-10-06 11:32:27'),
(102, 28, 88, 500, '2022-10-06 11:24:58', '2022-10-06 11:32:25', NULL, '2022-10-06 11:32:25'),
(103, 28, 13, 999, '2022-10-06 11:27:26', '2022-10-06 11:30:39', NULL, '2022-10-06 11:30:39'),
(104, 28, 48, 888, '2022-10-06 11:28:13', '2022-10-06 11:30:37', NULL, '2022-10-06 11:30:37'),
(105, 28, 83, 4444, '2022-10-06 11:28:51', '2022-10-06 11:30:35', NULL, '2022-10-06 11:30:35'),
(106, 28, 170, 88888, '2022-10-06 11:30:47', '2022-10-06 11:32:19', NULL, '2022-10-06 11:32:19'),
(107, 28, 138, 8989, '2022-10-06 11:31:06', '2022-10-06 11:32:22', NULL, '2022-10-06 11:32:22'),
(108, 28, 70, 2, '2022-10-06 11:32:11', '2022-10-06 11:34:39', NULL, '2022-10-06 11:34:39'),
(109, 28, 170, 1, '2022-10-06 11:32:37', '2022-10-06 11:34:37', NULL, '2022-10-06 11:34:37'),
(110, 28, 63, 6, '2022-10-06 11:33:42', '2022-10-06 11:34:34', NULL, '2022-10-06 11:34:34'),
(111, 28, 48, 1, '2022-10-06 11:33:52', '2022-10-06 11:34:32', NULL, '2022-10-06 11:34:32'),
(112, 28, 45, 1, '2022-10-06 11:34:46', '2022-10-06 11:34:46', NULL, NULL),
(113, 28, 107, 5, '2022-10-06 11:34:55', '2022-10-06 11:51:36', NULL, '2022-10-06 11:51:36'),
(114, 28, 4, 1, '2022-10-06 11:35:37', '2022-10-06 11:35:37', NULL, NULL),
(115, 28, 14, 90, '2022-10-06 11:36:59', '2022-10-06 11:51:28', NULL, '2022-10-06 11:51:28'),
(116, 28, 14, 10, '2022-10-06 11:38:01', '2022-10-06 11:51:26', NULL, '2022-10-06 11:51:26'),
(117, 28, 70, 1.5, '2022-10-06 11:39:35', '2022-10-06 11:39:35', NULL, NULL),
(118, 28, 48, 1.1, '2022-10-06 11:50:03', '2022-10-06 11:50:03', NULL, NULL),
(119, 28, 171, 9.9, '2022-10-06 11:50:25', '2022-10-06 11:50:25', NULL, NULL),
(120, 28, 15, 0.6, '2022-10-06 11:51:16', '2022-10-06 11:51:16', NULL, NULL),
(121, 19, 170, 1.2, '2022-10-06 17:59:30', '2022-10-06 17:59:30', NULL, NULL),
(122, 29, 81, 1, '2022-11-09 09:02:56', '2022-12-28 16:08:07', NULL, '2022-12-28 16:08:07'),
(123, 29, 147, 0.5, '2022-11-09 09:03:52', '2022-11-09 09:03:52', NULL, NULL),
(124, 29, 38, 1, '2022-12-28 16:08:43', '2022-12-28 16:08:43', NULL, NULL),
(125, 30, 169, 1, '2022-12-28 16:09:59', '2023-03-10 13:15:13', NULL, '2023-03-10 13:15:13'),
(126, 30, 70, 1, '2022-12-28 16:10:46', '2023-03-10 13:15:15', NULL, '2023-03-10 13:15:15'),
(127, 30, 70, 1, '2022-12-28 16:11:00', '2023-03-10 13:15:17', NULL, '2023-03-10 13:15:17'),
(128, 30, 64, 0, '2022-12-28 16:11:10', '2022-12-28 16:11:23', NULL, '2022-12-28 16:11:23'),
(129, 30, 64, 1, '2022-12-28 16:11:34', '2023-03-10 13:15:18', NULL, '2023-03-10 13:15:18'),
(130, 28, 10, 5656, '2023-01-13 17:27:26', '2023-01-13 17:27:32', NULL, '2023-01-13 17:27:32'),
(131, 30, 23, 1, '2023-03-10 13:15:52', '2023-03-10 13:15:52', NULL, NULL),
(132, 30, 93, 1, '2023-03-10 13:16:43', '2023-03-10 13:17:09', NULL, '2023-03-10 13:17:09'),
(133, 30, 93, 2, '2023-03-10 13:17:28', '2023-03-10 13:17:28', NULL, NULL),
(134, 30, 86, 1, '2023-03-10 13:17:51', '2023-03-10 13:17:51', NULL, NULL),
(135, 30, 186, 1, '2023-03-10 13:24:55', '2023-03-10 13:25:04', NULL, '2023-03-10 13:25:04'),
(136, 30, 186, 1, '2023-03-10 13:26:17', '2023-03-10 13:26:17', NULL, NULL),
(137, 30, 187, 2, '2023-03-10 14:39:21', '2023-03-10 14:39:21', NULL, NULL),
(138, 28, 104, 100, '2023-07-25 15:59:56', '2023-07-25 15:59:56', NULL, NULL),
(139, 28, 187, 5000, '2023-07-25 17:31:25', '2023-07-25 17:31:25', NULL, NULL),
(140, 31, 120, 0.33, '2023-07-26 15:01:48', '2023-07-26 15:01:48', NULL, NULL),
(141, 31, 113, 0.25, '2023-07-26 15:02:24', '2023-07-26 15:02:24', NULL, NULL),
(142, 32, 120, 1.5, '2023-07-26 15:06:10', '2023-07-26 15:06:10', NULL, NULL),
(143, 32, 113, 2, '2023-07-26 15:06:42', '2023-07-26 15:06:42', NULL, NULL),
(144, 33, 120, 1, '2023-07-26 15:10:14', '2023-07-26 15:10:14', NULL, NULL),
(145, 33, 113, 2, '2023-07-26 15:10:27', '2023-07-26 15:10:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detsubpartidas`
--

CREATE TABLE `detsubpartidas` (
  `cod_dsu` int(11) NOT NULL,
  `cod_par_dsu` int(11) NOT NULL,
  `cod_sub_dsu` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `detsubpartidas`
--

INSERT INTO `detsubpartidas` (`cod_dsu`, `cod_par_dsu`, `cod_sub_dsu`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(9, 2, 19, '2022-05-19 15:41:53', '2022-05-19 15:46:36', NULL, '2022-05-19 15:46:36'),
(10, 2, 20, '2022-05-19 15:46:48', '2022-05-19 15:47:05', NULL, '2022-05-19 15:47:05'),
(11, 2, 21, '2022-05-19 15:47:15', '2022-05-19 15:47:18', NULL, '2022-05-19 15:47:18'),
(12, 2, 21, '2022-05-19 15:48:55', '2022-05-19 15:51:05', NULL, '2022-05-19 15:51:05'),
(13, 2, 20, '2022-05-19 15:49:01', '2022-05-19 15:49:01', NULL, NULL),
(14, 2, 19, '2022-05-19 15:49:05', '2022-05-25 18:13:19', NULL, '2022-05-25 18:13:19'),
(15, 2, 21, '2022-05-19 15:51:13', '2022-05-25 18:13:17', NULL, '2022-05-25 18:13:17'),
(17, 2, 21, '2022-05-19 15:55:42', '2022-05-19 15:55:46', NULL, '2022-05-19 15:55:46'),
(18, 2, 22, '2022-05-25 18:12:58', '2022-05-25 18:13:14', NULL, '2022-05-25 18:13:14'),
(19, 2, 24, '2022-05-25 18:13:32', '2022-05-25 18:13:32', NULL, NULL),
(20, 2, 19, '2022-05-25 18:18:05', '2022-05-25 18:18:05', NULL, NULL),
(22, 2, 25, '2022-05-31 15:51:14', '2022-05-31 15:51:14', NULL, NULL),
(24, 1, 24, '2022-06-14 16:26:05', '2022-06-14 16:26:05', NULL, NULL),
(25, 1, 25, '2022-06-14 16:30:34', '2022-06-14 16:30:34', NULL, NULL),
(26, 1, 27, '2022-07-06 14:34:43', '2022-07-06 14:34:43', NULL, NULL),
(27, 4, 19, '2022-07-12 15:53:19', '2022-07-12 15:53:19', NULL, NULL),
(28, 4, 20, '2022-09-15 15:59:24', '2022-09-15 15:59:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interfaz`
--

CREATE TABLE `interfaz` (
  `cod_int` int(11) NOT NULL,
  `nom_int` char(100) DEFAULT NULL,
  `ico_int` char(200) DEFAULT NULL,
  `rou_int` varchar(50) NOT NULL COMMENT 'router',
  `cod_mod_int` int(11) DEFAULT NULL,
  `ord_int` int(11) DEFAULT NULL COMMENT 'orden de la interfaz',
  `rut_man_int` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `interfaz`
--

INSERT INTO `interfaz` (`cod_int`, `nom_int`, `ico_int`, `rou_int`, `cod_mod_int`, `ord_int`, `rut_man_int`) VALUES
(1, 'BOM', 'pi pi-fw pi-box', '/bom', 1, 10, ''),
(2, 'Capitulos', 'pi pi-fw pi-list', '/plantilla', 1, 20, ''),
(3, 'Materiales', 'pi pi-fw pi-bookmark', '/item', 1, 30, ''),
(4, 'Clientes', 'pi pi-fw pi-building', '/cliente', 2, 40, ''),
(5, 'Cotizaciones', 'pi pi-fw pi-id-card', '/cotizacion', 2, 50, ''),
(6, 'Compras', 'pi pi-fw pi-tags', '/compras', 3, 10, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `cod_ite` int(11) NOT NULL,
  `nom_ite` varchar(200) DEFAULT NULL,
  `des_ite` varchar(200) DEFAULT NULL,
  `mar_ite` varchar(50) DEFAULT NULL COMMENT 'marca',
  `cod_uni_ite` int(11) DEFAULT NULL COMMENT 'unidad de medida',
  `pre_ite` int(11) DEFAULT NULL COMMENT 'precio',
  `fac_ite` int(11) DEFAULT NULL,
  `ser_ite` varchar(50) DEFAULT NULL COMMENT 'codificacion',
  `pro_ite` varchar(250) NOT NULL COMMENT 'proveedor',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`cod_ite`, `nom_ite`, `des_ite`, `mar_ite`, `cod_uni_ite`, `pre_ite`, `fac_ite`, `ser_ite`, `pro_ite`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(1, 'ABRAZADERA COLGANTE 1 1/2 SELLO UL', NULL, 'Nacional', 3, 1206, NULL, 'IEG-NACXD3/2', '', NULL, NULL, NULL, NULL),
(2, 'ABRAZADERA COLGANTE FIJA 1\"', NULL, 'Nacional', 3, 989, NULL, 'IEG-NACXD1', '', NULL, NULL, NULL, NULL),
(3, 'TAPA RAWELLT 5800', NULL, 'Rawelt', 3, 1975, NULL, 'IEG-WTYXF580', '', NULL, NULL, NULL, NULL),
(4, 'ALAMBRE DESNUDO 12 AWG COBRE PROCABLES', NULL, 'Procables', 1, 1703, NULL, 'IEC-RADXC12', '', NULL, NULL, NULL, NULL),
(5, 'ALQUILER DE ESCALERA DIELECTRICA EN FIBRA 8 PASOS', NULL, 'Nacional', 3, 20000, NULL, 'AEG-NEDXP8', '', NULL, NULL, NULL, NULL),
(6, 'AMARRE PL¡STICO 20CM PAQ 100 NEGRO DEXSON', NULL, 'Dexson', 3, 7143, NULL, 'IEG-GA2NU100', '', NULL, NULL, NULL, NULL),
(7, 'ARANDELA 3/8\"', NULL, 'Nacional', 3, 126, NULL, 'IEG-NANXD3/8', '', NULL, NULL, NULL, NULL),
(8, 'CINTA AISLANTE X18mtr AMARILLA', NULL, '3M', 3, 2762, NULL, 'IEG-3NAML18', '', NULL, NULL, NULL, NULL),
(9, 'BANDEJA PORTA CABLES 20 CM REJIBAND', NULL, 'Rejiband', 1, 63770, NULL, 'IEG-JBPXN20', '', NULL, NULL, NULL, NULL),
(10, 'BANDEJA PORTA CABLES 30 CM REJIBAND', NULL, 'Rejiband', 1, 81011, NULL, 'IEG-JBPXN30', '', NULL, NULL, NULL, NULL),
(11, 'BANDEJA PORTA CABLES 40 CM REJIBAND', NULL, 'Rejiband', 1, 97140, NULL, 'IEG-JBPXN40', '', NULL, NULL, NULL, NULL),
(12, 'BANDEJA PORTA CABLES 60 CM REJIBAND', NULL, 'Rejiband', 1, 126056, NULL, 'IEG-JBPXN60', '', NULL, NULL, NULL, NULL),
(13, 'VARILLA ROSCADA 3/8\" X 3 MTS', NULL, 'Nacional', 3, 10896, NULL, 'IEG-NBSXD3/8', '', NULL, NULL, NULL, NULL),
(14, 'BORNERA ESCALERILLA CABLOFIL', NULL, 'Nacional', 3, 1921, NULL, 'IEG-NBOXU', '', NULL, NULL, NULL, NULL),
(15, 'BREAKER ENCHUFABLE 1*20 AMP SCHNEIDER', NULL, 'Schneider', 3, 10555, NULL, 'IEE-HB1XA20', '', NULL, NULL, NULL, NULL),
(16, 'BREAKER ENCHUFABLE 1X20A LUMINEX', NULL, 'Luminex', 3, 10242, NULL, 'IEE-XB1XA20', '', NULL, NULL, NULL, NULL),
(17, 'BREAKER ENCHUFABLE 1X40A LUMINEX', NULL, 'Luminex', 3, 10242, NULL, 'IEE-XB1XA40', '', NULL, NULL, NULL, NULL),
(18, 'BREAKER ENCHUFABLE 1X60A LUMINEX', NULL, 'Luminex', 3, 10177, NULL, 'IEE-XB1XA60', '', NULL, NULL, NULL, NULL),
(19, 'BREAKER ENCHUFABLE 3*20AMP SCHNEIDER', NULL, 'Schneider', 3, 79940, NULL, 'IEE-HB3XA20', '', NULL, NULL, NULL, NULL),
(20, 'BREAKER TRIPOLAR 30AMP EZC100N3030 SCHNEIDER', NULL, 'Schneider', 3, 79940, NULL, 'IEE-HB6XA30', '', NULL, NULL, NULL, NULL),
(21, 'BROCA ACERO RAPIDO HSS 015 1/4\"', NULL, 'Nacional', 3, 3697, NULL, 'HEG-NBAXD1/4', '', NULL, NULL, NULL, NULL),
(22, 'BROCA TUNGSTENO 04 SDS-PLUS 5/16\" X 6\" plus 5 x', NULL, 'Nacional', 3, 8824, NULL, 'HEG-NT5XL6', '', NULL, NULL, NULL, NULL),
(23, 'CABLE F/UTP CAT 6A LS0H COMMSCOPE', NULL, 'Commscope - AMP', 1, 3607, NULL, 'IEG-DC7XO6a', '', NULL, NULL, NULL, NULL),
(24, 'CABLE DUPLEX No 10 LIBRE HALOGENOS 90?C 600V AMARILLO', NULL, 'Procables', 1, 7100, NULL, 'IEE-RCHMC10', '', NULL, NULL, NULL, NULL),
(25, 'CABLE No 10 LIBRE HALOGENOS 90?C 600V AZUL', NULL, 'Procables', 1, 3195, NULL, 'IEE-RCHAC10', '', NULL, NULL, NULL, NULL),
(26, 'CABLE No 10 LIBRE HALOGENOS 90?C 600V BLANCO', NULL, 'Procables', 1, 3195, NULL, 'IEE-RCHBC10', '', NULL, NULL, NULL, NULL),
(27, 'CABLE No 10 LIBRE HALOGENOS 90?C 600V NEGRO', NULL, 'Procables', 1, 3195, NULL, 'IEE-RCHNC10', '', NULL, NULL, NULL, NULL),
(28, 'CABLE No 10 LIBRE HALOGENOS 90?C 600V ROJO', NULL, 'Procables', 1, 3195, NULL, 'IEE-RCHRC10', '', NULL, NULL, NULL, NULL),
(29, 'CABLE No 10 LIBRE HALOGENOS 90?C 600V VERDE', NULL, 'Procables', 1, 3195, NULL, 'IEE-RCHVC10', '', NULL, NULL, NULL, NULL),
(30, 'CABLE No 12 LIBRE HALOGENOS 90?C 600V AMARILLO', NULL, 'Procables', 1, 2048, NULL, 'IEE-RCHMC12', '', NULL, NULL, NULL, NULL),
(31, 'CABLE No 12 LIBRE HALOGENOS 90?C 600V AZUL', NULL, 'Procables', 1, 2048, NULL, 'IEE-RCHAC12', '', NULL, NULL, NULL, NULL),
(32, 'CABLE No 12 LIBRE HALOGENOS 90?C 600V BLANCO', NULL, 'Procables', 1, 2048, NULL, 'IEE-RCHBC12', '', NULL, NULL, NULL, NULL),
(33, 'CABLE No 12 LIBRE HALOGENOS 90?C 600V NE', NULL, 'Procables', 1, 2048, NULL, 'IEE-RCHNC12', '', NULL, NULL, NULL, NULL),
(34, 'CABLE No 12 LIBRE HALOGENOS 90?C 600V ROJO', NULL, 'Procables', 1, 2048, NULL, 'IEE-RCHRC12', '', NULL, NULL, NULL, NULL),
(35, 'CABLE No 12 LIBRE HALOGENOS 90?C 600V VERDE', NULL, 'Procables', 1, 2048, NULL, 'IEE-RCHVC12', '', NULL, NULL, NULL, NULL),
(36, 'CABLE No 14 LIBRE HALOGENOS 90?C 600V AMARILLO', NULL, 'Procables', 1, 1550, NULL, 'IEE-RCHMC14', '', NULL, NULL, NULL, NULL),
(37, 'CABLE No 14 LIBRE HALOGENOS 90?C 600V AZUL', NULL, 'Procables', 1, 1550, NULL, 'IEE-RCHAC14', '', NULL, NULL, NULL, NULL),
(38, 'CABLE No 14 LIBRE HALOGENOS 90?C 600V BLANCO', NULL, 'Procables', 1, 1550, NULL, 'IEE-RCHBC14', '', NULL, NULL, NULL, NULL),
(39, 'CABLE No 14 LIBRE HALOGENOS 90?C 600V NEGRO', NULL, 'Procables', 1, 1550, NULL, 'IEE-RCHNC14', '', NULL, NULL, NULL, NULL),
(40, 'CABLE No 14 LIBRE HALOGENOS 90?C 600V ROJO', NULL, 'Procables', 1, 1550, NULL, 'IEE-RCHRC14', '', NULL, NULL, NULL, NULL),
(41, 'CABLE No 14 LIBRE HALOGENOS 90?C 600V VERDE', NULL, 'Procables', 1, 1550, NULL, 'IEE-RCHVC14', '', NULL, NULL, NULL, NULL),
(42, 'CABLE No 8 LIBRE HALOGENOS 90?C 600V AMARILLO', NULL, 'Procables', 1, 5182, NULL, 'IEE-RCHMC8', '', NULL, NULL, NULL, NULL),
(43, 'CABLE No 8 LIBRE HALOGENOS 90?C 600V AZUL', NULL, 'Procables', 1, 5182, NULL, 'IEE-RCHAC8', '', NULL, NULL, NULL, NULL),
(44, 'CABLE No 8 LIBRE HALOGENOS 90?C 600V BLANCO', NULL, 'Procables', 1, 5182, NULL, 'IEE-RCHBC8', '', NULL, NULL, NULL, NULL),
(45, 'CABLE No 8 LIBRE HALOGENOS 90?C 600V NEGRO', NULL, 'Procables', 1, 5182, NULL, 'IEE-RCHNC8', '', NULL, NULL, NULL, NULL),
(46, 'CABLE No 8 LIBRE HALOGENOS 90?C 600V ROJO', NULL, 'Procables', 1, 5182, NULL, 'IEE-RCHRC8', '', NULL, NULL, NULL, NULL),
(47, 'CABLE No 8 LIBRE HALOGENOS 90?C 600V VERDE', NULL, 'Procables', 1, 5182, NULL, 'IEE-RCHVC8', '', NULL, NULL, NULL, NULL),
(48, 'CABLE PARA FIBRA OPTICA F.O. MULTIMODO 50/125 UM OM4 12 HILOS INDOOR /', NULL, 'Siemons', 1, 21778, NULL, 'IEG-FCOXH12', '', NULL, NULL, NULL, NULL),
(49, 'CABLE S/FTP CATEGORÕA 7A  COMMSCOPE', NULL, 'Commscope - AMP', 1, 4500, NULL, 'IEG-DC7XO7a', '', NULL, NULL, NULL, NULL),
(50, 'CABLE S/FTP CATEGORÕA 7A PANDUIT', NULL, 'Panduit', 1, 12490, NULL, 'IEG-PC7XO6a', '', NULL, NULL, NULL, NULL),
(51, 'CABLE S/FTP CATEGORÕA 7A SIEMONS', NULL, 'Siemons', 1, 6557, NULL, 'IEG-FC7XO6a', '', NULL, NULL, NULL, NULL),
(52, 'CINTA AISLANTE X18mtr AZUL', NULL, '3M', 3, 2762, NULL, 'IEG-3NAAL18', '', NULL, NULL, NULL, NULL),
(53, 'CABLE TRENZADO SINTOX 3X12 LSZH AZUL', NULL, 'Centelsa', 1, 7252, NULL, 'IEE-CCNAC12', '', NULL, NULL, NULL, NULL),
(54, 'CABLE TRENZADO SINTOX 3X12 LSZH ROJO', NULL, 'Centelsa', 1, 7252, NULL, 'IEE-CCNRC12', '', NULL, NULL, NULL, NULL),
(55, 'CAJA RAWELLT 2400 4 HUECOS 3/4', NULL, 'Rawelt', 3, 14571, NULL, 'IEE-WCFXD3/4', '', NULL, NULL, NULL, NULL),
(56, 'CAJA RAWELLT 5800 2 HUECOS 3/4', NULL, 'Rawelt', 3, 9139, NULL, 'IEE-WC9XD3/4', '', NULL, NULL, NULL, NULL),
(57, 'CINTA AISLANTE X18mtr BLANCA', NULL, '3M', 3, 2762, NULL, 'IEG-3NABL18', '', NULL, NULL, NULL, NULL),
(58, 'CINTA AISLANTE X18mtr NEGRA ADLER', NULL, '3M', 3, 2762, NULL, 'IEG-3NANL18', '', NULL, NULL, NULL, NULL),
(59, 'CINTA AISLANTE X18mtr ROJA ADLER', NULL, '3M', 3, 2762, NULL, 'IEG-3NARL18', '', NULL, NULL, NULL, NULL),
(60, 'TAPA RAWELLT 2400', NULL, 'Rawelt', 3, 3067, NULL, 'IEG-WTYXF240', '', NULL, NULL, NULL, NULL),
(61, 'VARILLA ROSCADA 1/4X3M ZINC', NULL, 'Nacional', 3, 6134, NULL, 'IEG-NV3XD1/4', '', NULL, NULL, NULL, NULL),
(62, 'VARILLA ROSCADA 3/8X3M ZINC', NULL, 'Nacional', 3, 11891, NULL, 'IEG-NV3XD3/8', '', NULL, NULL, NULL, NULL),
(63, 'ADAPTADOR ANGULAR PARA FACEPLATE CT', NULL, 'Nacional', 3, 2353, NULL, 'IEG-NAPBTCT', '', NULL, NULL, NULL, NULL),
(64, 'ARBOL SIERRA COPA BIMETAL 1-1/4\"A6\"', NULL, 'Makita', 3, 28319, NULL, 'HEG-MS1XL6', '', NULL, NULL, NULL, NULL),
(65, 'CABLE TERMOFLEX 3X16 600V 90?C (ENCAUCHETADO)', NULL, 'Centelsa', 1, 3727, NULL, 'IEE-CCTXC16', '', NULL, NULL, NULL, NULL),
(66, 'CANALETA METALICA DB 12*5 BLANCA', NULL, 'Nacional', 1, 73361, NULL, 'IEG-NCMBN5', '', NULL, NULL, NULL, NULL),
(67, 'CARTUCHO CINTA ADHESIVA 1\" 25 MM BLANCO P/IMPRESORA MP', NULL, 'Panduit', 3, 149304, NULL, 'IEG-PCCBN1', '', NULL, NULL, NULL, NULL),
(68, 'CARTUCHO CINTA ADHESIVA 1/2\" 12 MM BLANCO P/IMPRESORA MP', NULL, 'Panduit', 3, 104299, NULL, 'IEG-PCCBN1/2', '', NULL, NULL, NULL, NULL),
(69, 'CARTUCHO MP DE ETIQUETA AUTOLAMINABLE VINILO 1\" X 1.5\" TRANSPARENTE / BLANCO', NULL, 'Panduit', 3, 7539, NULL, 'IEG-PCVBN1', '', NULL, NULL, NULL, NULL),
(70, 'CHAZO DE 1/4 PLASTCO SUPRA CON TORNILLO', NULL, 'Nacional', 3, 531, NULL, 'IEG-NZSXN1/4', '', NULL, NULL, NULL, NULL),
(71, 'CHAZO PUNTILLA 1/4 *1/4', NULL, 'Nacional', 3, 245, NULL, 'IEG-NZPXN1/4', '', NULL, NULL, NULL, NULL),
(72, 'CHAZO PUNTILLA 1/4 *5/8', NULL, 'Nacional', 3, 294, NULL, 'IEG-NZPXD5/8', '', NULL, NULL, NULL, NULL),
(73, 'CHAZO RL 1/4', NULL, 'Nacional', 3, 380, NULL, 'IEG-NZRXN1/4', '', NULL, NULL, NULL, NULL),
(74, 'CHAZO RL 3/8', NULL, 'Nacional', 3, 520, NULL, 'IEG-NZRXN3/8', '', NULL, NULL, NULL, NULL),
(75, 'CINTA SUPER 33', NULL, 'Scotch', 3, 18706, NULL, 'IEG-TNANL20', '', NULL, NULL, NULL, NULL),
(76, 'CINTA VELCRO 1.9 CM X 10 MTS ROLLO', NULL, 'Panduit', 3, 15882, NULL, 'IEG-PCRNL10', '', NULL, NULL, NULL, NULL),
(77, 'CONECTOR AUTODESFORRE 10-12 3M', NULL, '3M', 3, 1428, NULL, 'IEG-3NDXC12', '', NULL, NULL, NULL, NULL),
(78, 'PATCH CORD CONECTOR LC/LC PARA FIBRA OPTICA', NULL, 'Nacional', 3, 22437, NULL, 'IEG-NL4XU1', '', NULL, NULL, NULL, NULL),
(79, 'CONECTOR RESORTE NARANJA/AZUL', NULL, '3M', 3, 630, NULL, 'IEE-3NRJC12', '', NULL, NULL, NULL, NULL),
(80, 'CONECTOR RESORTE ROJO AMARLLO 3M', NULL, '3M', 3, 1450, NULL, 'IEE-3NRRC12', '', NULL, NULL, NULL, NULL),
(81, 'CURVAS EMT 1', NULL, 'Steel', 3, 2689, NULL, 'IEE-SCEXD1', '', NULL, NULL, NULL, NULL),
(82, 'CURVAS EMT 1 1/2', NULL, 'Steel', 3, 8697, NULL, 'IEE-SCEXD1/2', '', NULL, NULL, NULL, NULL),
(83, 'CURVAS EMT 3/4', NULL, 'Steel', 3, 1900, NULL, 'IEE-SCEXD3/4', '', NULL, NULL, NULL, NULL),
(84, 'DISCO 03 CORTE ACERO INOX EXTRAD T1 4.1/2\"X 1.2mm', NULL, 'Nacional', 3, 3613, NULL, 'IEG-NDCXN4,5', '', NULL, NULL, NULL, NULL),
(85, 'FACE PLATE 2 SALIDAS HUESO CON ICONO DE IDENTIFICACION MINICOM', NULL, 'Minicom', 3, 5800, NULL, 'IED-IFPBS2', '', NULL, NULL, NULL, NULL),
(86, 'FACEPLATE DOBLE', NULL, 'Nacional', 3, 5800, NULL, 'IEG-NFPXS2', '', NULL, NULL, NULL, NULL),
(87, 'FACEPLATE SENCILLO', NULL, 'Nacional', 3, 5800, NULL, 'IEG-NFPXS1', '', NULL, NULL, NULL, NULL),
(88, 'GRAPA 1 1/2 DOBLE OREJA GALV. TB EMT', NULL, 'Steel', 3, 1134, NULL, 'IEE-SGDXD1,5', '', NULL, NULL, NULL, NULL),
(89, 'GRAPA 1 1/4 DOBLE OREJA GALV. TB EMT', NULL, 'Steel', 3, 1008, NULL, 'IEE-SGDXD1,75', '', NULL, NULL, NULL, NULL),
(90, 'JACK RJ 45 CAT 6A COLOR BLANCO  PANDUIT', NULL, 'Panduit', 3, 21429, NULL, 'IEG-PJ6BO6a', '', NULL, NULL, NULL, NULL),
(91, 'JACK RJ 45 CAT 6A COLOR BLANCO COMMSCOPE', NULL, 'Commscope - AMP', 3, 23109, NULL, 'IEG-DJ6BO6a', '', NULL, NULL, NULL, NULL),
(92, 'JACK RJ 45 CAT 6A COLOR BLANCO SIEMONS', NULL, 'Siemons', 3, 20588, NULL, 'IEG-FJ6BO6a', '', NULL, NULL, NULL, NULL),
(93, 'JACK RJ 45 CAT 6A COLOR NEGRO COMMSCOPE', NULL, 'Commscope - AMP', 3, 21429, NULL, 'IEG-DJ6NO6a', '', NULL, NULL, NULL, NULL),
(94, 'JACK RJ 45 CAT 6A COLOR NEGRO PANDUIT', NULL, 'Panduit', 3, 23109, NULL, 'IEG-PJ6NO6a', '', NULL, NULL, NULL, NULL),
(95, 'JACK RJ 45 CAT 6A COLOR NEGRO SIEMONS', NULL, 'Siemons', 3, 20588, NULL, 'IEG-FJ6NO6a', '', NULL, NULL, NULL, NULL),
(96, 'JACK RJ45 CAT. 6A NEGRO MINICOM', NULL, 'Panduit', 3, 21429, NULL, 'IED-PJ6XTJ45', '', NULL, NULL, NULL, NULL),
(97, 'JACK TERA 4 PARES COLOR NEGRO', NULL, 'Siemons', 3, 23109, NULL, 'IEG-FJ6NO7', '', NULL, NULL, NULL, NULL),
(98, 'GRAPA 1 DOBLE OREJA GALV. TB EMT', NULL, 'Steel', 3, 348, NULL, 'IEE-SGDXD1', '', NULL, NULL, NULL, NULL),
(99, 'GRAPA 3/4 DOBLE OREJA GALV. TB EMT', NULL, 'Steel', 3, 329, NULL, 'IEE-SGDXD3/4', '', NULL, NULL, NULL, NULL),
(100, 'PATCH CORD CAT. 6A 1 MTS AZUL ( 3,5 FT) F/UTP LSZH MINICOM', NULL, 'Panduit', 3, 25400, NULL, 'IEG-PP6AL1', '', NULL, NULL, NULL, NULL),
(101, 'PATCH CORD CAT. 6A 1.5 MTS AZUL ( 5 FT) F/UTP LSZH MINICOM', NULL, 'Panduit', 3, 28000, NULL, 'IED-PP6AL1,5', '', NULL, NULL, NULL, NULL),
(102, 'PATCH CORD CAT. 6A 2 MTS AZUL ( 7 FT) F/UTP LSZH MINICOM', NULL, 'Panduit', 3, 31400, NULL, 'IED-PP6AL2', '', NULL, NULL, NULL, NULL),
(103, 'PATCH CORD TERA 4 PARES A RJ45 2 MTS LARGO CON BOTAS', NULL, 'Siemons', 3, 39496, NULL, 'IEG-FP8XTTra', '', NULL, NULL, NULL, NULL),
(104, 'GRAPA COLGANTE BE-CLAMP VARILLA 1/4-3/8', NULL, 'B-clamp', 3, 788, NULL, 'IEE-BGCXD3/8', '', NULL, NULL, NULL, NULL),
(105, 'HERRAJE PATCH PANEL 24 PUERTOS CAT 6A PLANO MODULAR 1RU MINICOM', NULL, 'Panduit', 3, 75000, NULL, 'IED-PCIXE24', '', NULL, NULL, NULL, NULL),
(106, 'MANDRIL SIERRA COPA SHEETE METAL 5/8\" X 1 3/8\"', NULL, 'Makita', 3, 16723, NULL, 'HEG-MM5XD3/8', '', NULL, NULL, NULL, NULL),
(107, 'MULTITOMA 8 SALIDAS C/POLO AISL. HORIZONTAL GRADO IND.NARANJA', NULL, 'Axxis', 3, 186218, NULL, 'IEE-AMTJS8', '', NULL, NULL, NULL, NULL),
(108, 'REDUCCION DE 1 A 3/4', NULL, 'Nacional', 3, 9160, NULL, 'IEE-NR1XD3/4', '', NULL, NULL, NULL, NULL),
(109, 'SIERRA COPA 1.1/8\"  29MM', NULL, 'Makita', 3, 24958, NULL, 'HEG-MS8XD1/8', '', NULL, NULL, NULL, NULL),
(110, 'TERMINAL 1 1/2 EMT-ACERO UL STEEL', NULL, 'Steel', 3, 4328, NULL, 'IEE-STLXD1,5', '', NULL, NULL, NULL, NULL),
(111, 'TERMINAL 1 1/4 EMT-ACERO UL STEEL', NULL, 'Steel', 3, 3445, NULL, 'IEE-STLXD1,75', '', NULL, NULL, NULL, NULL),
(112, 'TERMINAL 1 EMT-ACERO UL STEEL', NULL, 'Steel', 3, 2101, NULL, 'IEE-STLXD1', '', NULL, NULL, NULL, NULL),
(113, 'TERMINAL 3/4 EMT-ACERO UL STEEL', NULL, 'Steel', 3, 1303, NULL, 'IEE-STLXD3/4', '', NULL, NULL, NULL, NULL),
(114, 'SIERRA COPA BIMETAL 1-3/8\"  35MM', NULL, 'Makita', 3, 30252, NULL, 'HEG-MS3XD3/8', '', NULL, NULL, NULL, NULL),
(115, 'TABLERO 12 NTQ-T C/ESPACIO TRIF.SCHNEIDER ZA000611096', NULL, 'Schneider', 3, 208319, NULL, 'IEE-HTEXF12', '', NULL, NULL, NULL, NULL),
(116, 'TERMINAL PLUG RJ 45 CAT 6A/6/5E ENSAMBLE CON TAPA BLINDADO', NULL, 'Panduit', 3, 42000, NULL, 'IED-PPGXO6a', '', NULL, NULL, NULL, NULL),
(117, 'TUBO 1 1/2 EMT-X 3MTRS COLMENA', NULL, 'Colmena', 3, 71218, NULL, 'IEE-OTBXD1,5', '', NULL, NULL, NULL, NULL),
(118, 'TUBO 1 1/4 EMT-X 3MTRS COLMENA', NULL, 'Colmena', 3, 66387, NULL, 'IEE-OTBXD1,75', '', NULL, NULL, NULL, NULL),
(119, 'TUBO 1 EMT-X 3MTRS COLMENA', NULL, 'Colmena', 3, 44202, NULL, 'IEE-OTBXD1', '', NULL, NULL, NULL, NULL),
(120, 'TUBO 3/4 EMT-X 3MTRS COLMENA', NULL, 'Colmena', 3, 28655, NULL, 'IEE-OTBXD3/4', '', NULL, NULL, NULL, NULL),
(121, 'TUERCA 1/4 ZINC', NULL, 'Nacional', 3, 184, NULL, 'IEG-NTAXD1/4', '', NULL, NULL, NULL, NULL),
(122, 'TUERCA 3/8 ZINC', NULL, 'Nacional', 3, 344, NULL, 'IEG-NTAXD3/8', '', NULL, NULL, NULL, NULL),
(123, 'UNION 1 1/2 EMT-ACERO UL STEEL', NULL, 'Steel', 3, 3571, NULL, 'IEE-SUEXD1,5', '', NULL, NULL, NULL, NULL),
(124, 'UNION 1 1/4 EMT-ACERO UL STEEL', NULL, 'Colmena', 3, 3361, NULL, 'IEE-OUEXD1,75', '', NULL, NULL, NULL, NULL),
(125, 'UNION 1 EMT-ACERO UL STEEL', NULL, 'Steel', 3, 3109, NULL, 'IEE-SUEXD1', '', NULL, NULL, NULL, NULL),
(126, 'UNION 3/4 EMT-ACERO UL STEEL', NULL, 'Steel', 3, 1933, NULL, 'IEE-SUEXD3/4', '', NULL, NULL, NULL, NULL),
(127, 'TROQUEL DATOS 12*5 BLANCO', NULL, 'Nacional', 3, 7143, NULL, 'IEG-NTDBL5', '', NULL, NULL, NULL, NULL),
(128, 'TROQUEL ELECTRICO 12*5 BLANCO', NULL, 'Nacional', 3, 7143, NULL, 'IEG-NTOBL5', '', NULL, NULL, NULL, NULL),
(129, 'VELCRO ROLLO DE 25 METROS NEGRO NACIONAL', NULL, 'Nacional', 3, 61261, NULL, 'IEG-NCRNL25', '', NULL, NULL, NULL, NULL),
(130, 'M,O. DESINSTALACIÓN BANDEJA PORTA CABLES', NULL, 'Nacional', 1, 4200, NULL, 'MEG-NPT2M', '', NULL, NULL, NULL, NULL),
(131, 'M,O. DESINSTALACIÓN CANALETA MET¡LICA', NULL, 'Nacional', 3, 3000, NULL, 'MEG-NCM2M', '', NULL, NULL, NULL, NULL),
(132, 'M,O. DESINSTALACIÓN PUNTO DATOS', NULL, 'Nacional', 3, 10500, NULL, 'MED-NPD2U', '', NULL, NULL, NULL, NULL),
(133, 'M,O. DESINSTALACIÓN PUNTO ELEÉCTRICO', NULL, 'Nacional', 3, 9500, NULL, 'MEE-NPE2U', '', NULL, NULL, NULL, NULL),
(134, 'M,O. DESINSTALACIÓN TUBERIÍA EMT', NULL, 'Nacional', 1, 3100, NULL, 'MEE-NTB2M', '', NULL, NULL, NULL, NULL),
(135, 'M,O. INSTALACI”N ARMARIO ELEÉCTRICO', NULL, 'Nacional', 3, 410000, NULL, 'MEE-NAE1U', '', NULL, NULL, NULL, NULL),
(136, 'M,O. INSTALACI”N BARRA DE TIERRA PARA RACK 1 A 5', NULL, 'Nacional', 3, 90000, NULL, 'MEE-NBR1U5', '', NULL, NULL, NULL, NULL),
(137, 'M,O. INSTALACI”N BARRA DE TIERRA PARA RACK 5 A 10', NULL, 'Nacional', 3, 120000, NULL, 'MEE-NBR1U10', '', NULL, NULL, NULL, NULL),
(138, 'M,O. INSTALACI”N BARRA DE TIERRA TMGB', NULL, 'Nacional', 3, 25000, NULL, 'MEE-NBR1Ugb', '', NULL, NULL, NULL, NULL),
(139, 'M,O. INSTALACI”N CANALETA PL¡STICA', NULL, 'Nacional', 1, 4500, NULL, 'MEG-NCP1M', '', NULL, NULL, NULL, NULL),
(140, 'M,O. INSTALACI”N CORAZA', NULL, 'Nacional', 1, 3500, NULL, 'MEG-NCZ1M', '', NULL, NULL, NULL, NULL),
(141, 'M,O. INSTALACI”N GABINETE DE DATOS PARED', NULL, 'Nacional', 3, 140000, NULL, 'MED-NGT1U', '', NULL, NULL, NULL, NULL),
(142, 'M,O. INSTALACI”N GABINETE DE DATOS PISO', NULL, 'Nacional', 3, 250000, NULL, 'MED-NGP1U', '', NULL, NULL, NULL, NULL),
(143, 'M,O. INSTALACI”N ORGANIZADOR DE CABLES', NULL, 'Nacional', 3, 7000, NULL, 'MEG-NOC1U', '', NULL, NULL, NULL, NULL),
(144, 'M,O. INSTALACI”N RACK DE PISO', NULL, 'Nacional', 3, 200000, NULL, 'MEG-NRP1U', '', NULL, NULL, NULL, NULL),
(145, 'M,O. INSTALACI”N TABLERO ELECTRICO', NULL, 'Nacional', 3, 230000, NULL, 'MEE-NTE1U', '', NULL, NULL, NULL, NULL),
(146, 'M,O. INSTALACI”N UPS (HASTA 10 KVA)', NULL, 'Nacional', 3, 170000, NULL, 'MEE-NUP1U', '', NULL, NULL, NULL, NULL),
(147, 'M,O. MONTAJE SWITCH DATOS', NULL, 'Nacional', 3, 12000, NULL, 'MED-NSW1U', '', NULL, NULL, NULL, NULL),
(148, 'M,O. PEINADO RACK / GABINETE (MINIMO POR INTERVENCION)', NULL, 'Nacional', 3, 220000, NULL, 'MED-NGP4U', '', NULL, NULL, NULL, NULL),
(149, 'M,O. PONCHADO PUNTOS DATOS CAT 5E - 6 - 6A hasta 10 puntos', NULL, 'Nacional', 3, 7000, NULL, 'MED-NPD5U6a', '', NULL, NULL, NULL, NULL),
(150, 'M,O. PONCHADO PUNTOS DATOS CAT 7A', NULL, 'Nacional', 3, 7000, NULL, 'MED-NPD5U7a', '', NULL, NULL, NULL, NULL),
(151, 'M,O. PUNTO DATOS 5E - 6 - 6A', NULL, 'Nacional', 3, 51000, NULL, 'MED-NPD1U6a', '', NULL, NULL, NULL, NULL),
(152, 'M,O. PUNTO DATOS TERA 7A', NULL, 'Nacional', 3, 51000, NULL, 'MED-NPD1U7a', '', NULL, NULL, NULL, NULL),
(153, 'M,O. PUNTO INTERRUPTOR ILUMINACI”N', NULL, 'Nacional', 3, 37000, NULL, 'MEE-NII1U', '', NULL, NULL, NULL, NULL),
(154, 'M,O. REUBICACI”N PUNTO DATOS (CABLEADO)', NULL, 'Nacional', 3, 35000, NULL, 'MED-NPD3U', '', NULL, NULL, NULL, NULL),
(155, 'M,O. REUBICACI”N PUNTO ELECTRICO (CABLEADO)', NULL, 'Nacional', 3, 35000, NULL, 'MEE-NPE3U', '', NULL, NULL, NULL, NULL),
(156, 'M,O. SALIDA ILUMINACI”N', NULL, 'Nacional', 3, 52000, NULL, 'MEE-NSI1U', '', NULL, NULL, NULL, NULL),
(157, 'M,O. TOMA EL…CTRICA NO REGULADA', NULL, 'Nacional', 3, 48000, NULL, 'MEE-NTM1U', '', NULL, NULL, NULL, NULL),
(158, 'M,O. TOMA EL…CTRICA REGULADA', NULL, 'Nacional', 3, 48000, NULL, 'MEE-NTR1U', '', NULL, NULL, NULL, NULL),
(159, 'M,O. TUBERIÍA EMT', NULL, 'Nacional', 1, 9000, NULL, 'MEE-NTB1U', '', NULL, NULL, NULL, NULL),
(160, 'M,O. TUBERIA PVC', NULL, 'Nacional', 1, 6500, NULL, 'MEG-NTC1U', '', NULL, NULL, NULL, NULL),
(161, 'M.O INSTALACI”N BOTON DE ACCESO, CANTONERA, NO TOUCH', NULL, 'Nacional', 3, 24000, NULL, 'MEE-NBC1U', '', NULL, NULL, NULL, NULL),
(162, 'M.O INSTALACI”N CABLE 6 AWG PARA PUESTA A TIERRA', NULL, 'Nacional', 1, 1300, NULL, 'MED-NCB1C6', '', NULL, NULL, NULL, NULL),
(163, 'M.O INSTALACI”N CABLE COAXIAL', NULL, 'Nacional', 1, 1250, NULL, 'MED-NCX1M', '', NULL, NULL, NULL, NULL),
(164, 'M.O INSTALACI”N CABLE DE AUDIO', NULL, 'Nacional', 1, 1300, NULL, 'MED-NCU1M', '', NULL, NULL, NULL, NULL),
(165, 'M.O INSTALACI”N CABLE F.O. TIPO ARMADA O EXTERIOR', NULL, 'Nacional', 1, 6500, NULL, 'MED-NFO1M', '', NULL, NULL, NULL, NULL),
(166, 'M.O INSTALACI”N CABLE F.O. TIPO INTERIOR', NULL, 'Nacional', 1, 2800, NULL, 'MED-NCI1M', '', NULL, NULL, NULL, NULL),
(167, 'M.O INSTALACI”N CABLE HDMI / DISPLAY PORT', NULL, 'Nacional', 3, 40000, NULL, 'MED-NHD1M', '', NULL, NULL, NULL, NULL),
(168, 'M.O INSTALACI”N CABLE USB', NULL, 'Nacional', 3, 40000, NULL, 'MED-NUB1M', '', NULL, NULL, NULL, NULL),
(169, 'M.O INSTALACI”N CABLE VGA', NULL, 'Nacional', 3, 40000, NULL, 'MED-NVG1M', '', NULL, NULL, NULL, NULL),
(170, 'M.O INSTALACI”N CAJAS DE PASO (DESDE 20X20)', NULL, 'Nacional', 3, 10000, NULL, 'MEG-NJP1U', '', NULL, NULL, NULL, NULL),
(171, 'M.O INSTALACI”N CONECTORES CABLE COAXIAL', NULL, 'Nacional', 3, 16000, NULL, 'MED-NCO1U', '', NULL, NULL, NULL, NULL),
(172, 'M.O INSTALACI”N CONECTORES PARA AUDIO', NULL, 'Nacional', 3, 16000, NULL, 'MED-NOA1U', '', NULL, NULL, NULL, NULL),
(173, 'M.O INSTALACI”N CONTACTORES', NULL, 'Nacional', 3, 55000, NULL, 'MEG-NAR1U', '', NULL, NULL, NULL, NULL),
(174, 'M.O INSTALACI”N DE BANDEJA FIBRA ”PTICA (PARED)', NULL, 'Nacional', 3, 20000, NULL, 'MED-NBF1MPR', '', NULL, NULL, NULL, NULL),
(175, 'M.O INSTALACI”N DE BANDEJA FIBRA ”PTICA (RACK)', NULL, 'Nacional', 3, 20000, NULL, 'MED-NBF1MRK', '', NULL, NULL, NULL, NULL),
(176, 'M.O INSTALACI”N DE CAMARA DE SEGURIDAD', NULL, 'Nacional', 3, 27000, NULL, 'MED-NCA1U', '', NULL, NULL, NULL, NULL),
(177, 'M.O INSTALACI”N ELECTROIMAN SIN CONEX Y CABLE A 0 MTRS', NULL, 'Nacional', 3, 85000, NULL, 'MEE-NEI1U', '', NULL, NULL, NULL, NULL),
(178, 'M.O INSTALACI”N LECTORA', NULL, 'Nacional', 3, 50000, NULL, 'MED-NLC1U', '', NULL, NULL, NULL, NULL),
(179, 'M.O INSTALACI”N TOTALIZADORES', NULL, 'Nacional', 3, 47000, NULL, 'MEE-NTZ1U', '', NULL, NULL, NULL, NULL),
(180, 'M.O POR COMPLEJIDAD TIPO 1', NULL, 'Nacional', 3, 60000, NULL, 'MEG-NPJ1U', '', NULL, NULL, NULL, NULL),
(181, 'M.O POR COMPLEJIDAD TIPO 2', NULL, 'Nacional', 3, 110000, NULL, 'MEG-NPJ1U1', '', NULL, NULL, NULL, NULL),
(182, 'M.O POR COMPLEJIDAD TIPO 3', NULL, 'Nacional', 3, 160000, NULL, 'MEG-NPJ1U2', '', NULL, NULL, NULL, NULL),
(183, 'MANDRIL SIERRA COPA SHEETE METAL 5/8\" X 1 3/8\"', NULL, 'Makita', 3, 75000, NULL, 'HEG-MM5XD3/8', '', NULL, NULL, NULL, NULL),
(184, '2227', NULL, NULL, 3, 3337, NULL, '1117', '447', '2023-01-13 17:16:19', '2023-01-13 17:16:43', NULL, '2023-01-13 17:16:43'),
(185, 'Camara ip 2 megapíxeles hik', NULL, NULL, 3, 125000, NULL, '1CAM1PRU', 'GSP', '2023-02-02 14:23:05', '2023-02-02 14:24:33', NULL, NULL),
(186, 'BLANK INSERT (BOTON CIEGO) BLANCO   MINICOM\n', NULL, NULL, 3, 558, NULL, 'CMBWH-X ', 'INTERNACIONAL DE ELECTRICOS', '2023-03-10 13:23:00', '2023-03-10 13:25:55', NULL, NULL),
(187, 'MARQUILLA DATOS', NULL, NULL, 3, 2500, NULL, 'IEDPBBMC1', 'INTERNACIONAL DE ELECTRICOS', '2023-03-10 14:38:55', '2023-03-10 14:38:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item-old`
--

CREATE TABLE `item-old` (
  `cod_ite` int(11) NOT NULL,
  `nom_ite` varchar(200) NOT NULL,
  `des_ite` varchar(200) DEFAULT NULL,
  `cod_uni_ite` int(11) DEFAULT NULL,
  `fac_ite` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_final`
--

CREATE TABLE `items_final` (
  `cod_ite` int(11) NOT NULL,
  `nom_ite` varchar(50) DEFAULT NULL,
  `des_ite` varchar(200) DEFAULT NULL,
  `mar_ite` varchar(50) DEFAULT NULL COMMENT 'marca',
  `cod_uni_ite` varchar(6) DEFAULT NULL COMMENT 'unidad de medida',
  `pre_ite` varchar(8) DEFAULT NULL COMMENT 'precio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `items_final`
--

INSERT INTO `items_final` (`cod_ite`, `nom_ite`, `des_ite`, `mar_ite`, `cod_uni_ite`, `pre_ite`) VALUES
(1, 'ALDES12CO', 'ALAMBRE DESNUDO 12 AWG COBRE PROCABLES', 'PROCABLES/CENTELSA', '1', '1557'),
(2, 'RED1A3/4', 'REDUCCION DE 1 A 3/4', '', '3', '2240'),
(3, 'CAB14BL', 'CABLE No 14 LIBRE HALOGENOS 90°C 600V BLANCO', 'PROCABLES/CENTELSA', '1', '1451'),
(4, 'CAB14RO', 'CABLE No 14 LIBRE HALOGENOS 90°C 600V ROJO', 'PROCABLES/CENTELSA', '1', '1451'),
(5, 'CAB14VE', 'CABLE No 14 LIBRE HALOGENOS 90°C 600V VERDE', 'PROCABLES/CENTELSA', '1', '1451'),
(6, 'CAB14AM', 'CABLE No 14 LIBRE HALOGENOS 90°C 600V AMARILLO', 'PROCABLES/CENTELSA', '1', '1451'),
(7, 'CAB14AZ', 'CABLE No 14 LIBRE HALOGENOS 90°C 600V AZUL', 'PROCABLES/CENTELSA', '1', '1451'),
(8, 'CAB14NE', 'CABLE No 14 LIBRE HALOGENOS 90°C 600V NEGRO', 'PROCABLES/CENTELSA', '1', '1451'),
(9, 'CAB12BL', 'CABLE No 12 LIBRE HALOGENOS 90°C 600V BLANCO', 'PROCABLES/CENTELSA', '1', '1973'),
(10, 'CAB12RO', 'CABLE No 12 LIBRE HALOGENOS 90°C 600V ROJO', 'PROCABLES/CENTELSA', '1', '1973'),
(11, 'CAB12VE', 'CABLE No 12 LIBRE HALOGENOS 90°C 600V VERDE', 'PROCABLES/CENTELSA', '1', '1973'),
(12, 'CAB12AM', 'CABLE No 12 LIBRE HALOGENOS 90°C 600V AMARILLO', 'PROCABLES/CENTELSA', '1', '1973'),
(13, 'CAB12AZ', 'CABLE No 12 LIBRE HALOGENOS 90°C 600V AZUL', 'PROCABLES/CENTELSA', '1', '1973'),
(14, 'CAB12NE', 'CABLE No 12 LIBRE HALOGENOS 90°C 600V NE', 'PROCABLES/CENTELSA', '1', '1973'),
(15, 'CAB10BL', 'CABLE No 10 LIBRE HALOGENOS 90°C 600V BLANCO', 'PROCABLES/CENTELSA', '1', '3061'),
(16, 'CAB10RO', 'CABLE No 10 LIBRE HALOGENOS 90°C 600V ROJO', 'PROCABLES/CENTELSA', '1', '3061'),
(17, 'CAB10VE', 'CABLE No 10 LIBRE HALOGENOS 90°C 600V VERDE', 'PROCABLES/CENTELSA', '1', '3061'),
(18, 'CAB10AM', 'CABLE No 10 LIBRE HALOGENOS 90°C 600V AMARILLO', 'PROCABLES/CENTELSA', '1', '3061'),
(19, 'CAB10AZ', 'CABLE No 10 LIBRE HALOGENOS 90°C 600V AZUL', 'PROCABLES/CENTELSA', '1', '3061'),
(20, 'CAB10NE', 'CABLE No 10 LIBRE HALOGENOS 90°C 600V NEGRO', 'PROCABLES/CENTELSA', '1', '3061'),
(21, 'CAB8BL', 'CABLE No 8 LIBRE HALOGENOS 90°C 600V BLANCO', 'PROCABLES/CENTELSA', '1', '4584'),
(22, 'CAB8RO', 'CABLE No 8 LIBRE HALOGENOS 90°C 600V ROJO', 'PROCABLES/CENTELSA', '1', '4584'),
(23, 'CAB8VE', 'CABLE No 8 LIBRE HALOGENOS 90°C 600V VERDE', 'PROCABLES/CENTELSA', '1', '4584'),
(24, 'CAB8AM', 'CABLE No 8 LIBRE HALOGENOS 90°C 600V AMARILLO', 'PROCABLES/CENTELSA', '1', '4584'),
(25, 'CAB8AZ', 'CABLE No 8 LIBRE HALOGENOS 90°C 600V AZUL', 'PROCABLES/CENTELSA', '1', '4584'),
(26, 'CAB8NE', 'CABLE No 8 LIBRE HALOGENOS 90°C 600V NEGRO', 'PROCABLES/CENTELSA', '1', '4584'),
(27, 'CABTRE3X12RO', 'CABLE TRENZADO SINTOX 3X12 LSZH ROJO', 'PROCABLES/CENTELSA', '1', '6150'),
(28, 'CABTRE3X12AZ', 'CABLE TRENZADO SINTOX 3X12 LSZH AZUL', 'PROCABLES/CENTELSA', '1', '6150'),
(29, 'TTR-35RX0', 'CINTA VELCRO 1.9 CM X 10 MTS ROLLO', 'PANDUIT', '3', '42310'),
(30, 'CINNE', 'CINTA AISLANTE X18mtr NEGRA ADLER', '3M', '3', '3000'),
(31, 'CINRO', 'CINTA AISLANTE X18mtr ROJA ADLER', '3M', '3', '3000'),
(32, 'CINAM', 'CINTA AISLANTE X18mtr AMARILLA', '3M', '3', '3000'),
(33, 'CINAZ', 'CINTA AISLANTE X18mtr AZUL', '3M', '3', '3000'),
(34, 'CINBL', 'CINTA AISLANTE X18mtr BLANCA', '3M', '3', '3000'),
(35, 'CINSUPER33', 'CINTA SUPER 33', '3M', '3', '18000'),
(36, 'CJ6X88TGBL', 'JACK RJ45 CAT. 6A NEGRO MINICOM', 'PANDUIT', '3', '26229,6'),
(37, 'CFPE2IWY', 'FACE PLATE 2 SALIDAS HUESO CON ICONO DE IDENTIFICACION MINICOM', 'PANDUIT', '3', '2951'),
(38, 'FPS6X88MTG', 'TERMINAL PLUG RJ 45 CAT 6A/6/5E ENSAMBLE CON TAPA BLINDADO', 'PANDUIT', '3', '35355,28'),
(39, 'S100X150VAM', 'CARTUCHO MP DE ETIQUETA AUTOLAMINABLE VINILO 1\" X 1.5\" TRANSPARENTE / BLANCO', 'PANDUIT', '3', '113323'),
(40, 'T100X000VPM-BK', 'CARTUCHO CINTA ADHESIVA 1\" 25 MM BLANCO P/IMPRESORA MP', 'PANDUIT', '3', '122980'),
(41, 'T050X000VPM-BK', 'CARTUCHO CINTA ADHESIVA 1/2\" 12 MM BLANCO P/IMPRESORA MP', 'PANDUIT', '3', '70928'),
(42, 'STP28X2MBU', 'PATCH CORD CAT. 6A 2 MTS AZUL ( 7 FT) F/UTP LSZH MINICOM', 'PANDUIT', '3', '21888'),
(43, 'CPPL24WBLY', 'HERRAJE PATCH PANEL 24 PUERTOS CAT 6A PLANO MODULAR 1RU MINICOM', 'PANDUIT', '3', '51323'),
(44, 'STP28X1.5MBU', 'PATCH CORD CAT. 6A 1.5 MTS AZUL ( 5 FT) F/UTP LSZH MINICOM', 'PANDUIT', '3', '21785'),
(45, 'AXMH-8INS', 'MULTITOMA 8 SALIDAS C/POLO AISL. HORIZONTAL GRADO IND.NARANJA', 'AXXIS', '3', '162240'),
(46, 'CONROAM', 'CONECTOR RESORTE ROJO AMARLLO 3M', '3M', '3', '640'),
(47, 'AUTODES', 'CONECTOR AUTODESFORRE 10-12 3M', '3M', '3', '101'),
(48, 'CONRONA', 'CONECTOR RESORTE NARANJA/AZUL ', '3M', '3', '452'),
(49, 'BREA1X20', 'BREAKER ENCHUFABLE 1X20A LUMINEX', 'LEGRAND', '3', '9100'),
(50, 'BREA1X40', 'BREAKER ENCHUFABLE 1X40A LUMINEX', 'LEGRAND', '3', '9100'),
(51, 'BREA1X60', 'BREAKER ENCHUFABLE 1X60A LUMINEX', 'LEGRAND', '3', '9100'),
(52, 'CABEN3X16', 'CABLE TERMOFLEX 3X16 600V 90°C (ENCAUCHETADO)', 'PROCABLES/CENTELSA', '1', '2812'),
(53, 'TUBCOL3/4EMT', 'TUBO 3/4 EMT-X 3MTRS COLMENA', 'COLMENA', '3', '24780'),
(54, 'TER3/4EMT', 'TERMINAL 3/4 EMT-ACERO UL STEEL', 'STEEL', '3', '1600'),
(55, 'UNI3/4EMT', 'UNION 3/4 EMT-ACERO UL STEEL', 'STEEL', '3', '955'),
(56, 'CUEMT3/4', 'CURVAS EMT 3/4', 'STEEL', '3', '0'),
(57, 'TUBCOL1EMT', 'TUBO 1 EMT-X 3MTRS COLMENA', 'COLMENA', '3', '36380'),
(58, 'TER1EMT', 'TERMINAL 1 EMT-ACERO UL STEEL', 'STEEL', '3', '1650'),
(59, 'UNI1EMT', 'UNION 1 EMT-ACERO UL STEEL', 'STEEL', '3', '1647'),
(60, 'CUEMT1', 'CURVAS EMT 1', 'STEEL', '3', '0'),
(61, 'TUBCOL1-1/2EMT', 'TUBO 1 1/2 EMT-X 3MTRS COLMENA', 'COLMENA', '3', '63850'),
(62, 'TER1-1/2EMT', 'TERMINAL 1 1/2 EMT-ACERO UL STEEL', 'STEEL', '3', '2458'),
(63, 'UNI1-1/2EMT', 'UNION 1 1/2 EMT-ACERO UL STEEL', 'STEEL', '3', '3391'),
(64, 'CUEMT1-1/2', 'CURVAS EMT 1 1/2', 'STEEL', '3', '7162'),
(65, 'GRPDO3/4EMT', 'GRAPA 3/4 DOBLE OREJA GALV. TB EMT', 'STEEL', '3', '335'),
(66, 'GRPDO1EMT', 'GRAPA 1 DOBLE OREJA GALV. TB EMT', 'STEEL', '3', '335'),
(67, 'GRPDO1-1/2EMT', 'GRAPA 1 1/2 DOBLE OREJA GALV. TB EMT', 'STEEL', '3', '400'),
(68, '', 'ABRAZADERA COLGANTE 1 SELLO UL', '', '3', '794'),
(69, 'VR1/4Z', 'VARILLA ROSCADA 1/4X3M ZINC', '', '3', '3955'),
(70, 'VR3/8Z', 'VARILLA ROSCADA 3/8X3M ZINC', '', '3', '0'),
(71, 'CH1/4RL', 'CHAZO RL 1/4 ', '', '3', '240'),
(72, 'TUR1/4Z', 'TUERCA 1/4 ZINC', '', '3', '50'),
(73, 'CH3/8RL', 'CHAZO RL 3/8 ', '', '3', '350'),
(74, 'TUR3/8Z', 'TUERCA 3/8 ZINC', '', '3', '50'),
(75, 'CHASUPRA', 'CHAZO DE 1/4 PLASTCO SUPRA', '', '3', '106'),
(76, 'CHAPUNT1/4', 'CHAZO PUNTILLA 1/4 *1/4', '', '3', '0'),
(77, 'CARA2400-3/4 4H', 'CAJA RAWELLT 2400 4 HUECOS 3/4', '', '3', '10340'),
(78, 'CARA5800-3/4 2H', 'CAJA RAWELLT 5800 2 HUECOS 3/4', '', '3', '6003'),
(79, 'TARA2400', 'TAPA RAWELLT 2400', '', '3', '2118'),
(80, 'TARA5800', 'TAPA RAWELLT 5800', '', '3', '1647'),
(81, 'ARBOL5/8', 'MANDRIL SIERRA COPA SHEETE METAL 5/8\" X 1 3/8\" ', 'MAKITA', '3', '15126'),
(82, 'COSI1/8', 'SIERRA COPA 1.1/8\"  29MM', 'MAKITA', '3', '17647'),
(83, 'COSI3/8', 'SIERRA COPA BIMETAL 1-3/8\"  35MM', 'MAKITA', '3', '19328'),
(84, 'ARBOL1-1/4', 'ARBOL SIERRA COPA BIMETAL 1-1/4\"A6\" ', 'MAKITA', '3', '25210'),
(85, 'CAME12X5BL', 'CANALETA METALICA DB 12*5 BLANCA', '', '3', '63780'),
(86, 'TRDA12X5BL', 'TROQUEL DATOS 12*5 BLANCO', '', '3', '3511'),
(87, 'TREL12X5BL', 'TROQUEL ELECTRICO 12*5 BLANCO', '', '3', '3511'),
(88, 'ZA000611096', 'TABLERO 12 NTQ-T C/ESPACIO TRIF.SCHNEIDER ZA000611096', 'SCHNEIDER', '3', '192534'),
(89, 'BREEN1X20SCH', 'BREAKER ENCHUFABLE 1*20 AMP SCHNEIDER', 'SCHNEIDER', '3', '9113'),
(90, 'BREEN3X20SCH', 'BREAKER ENCHUFABLE 3*20AMP SCHNEIDER', 'SCHNEIDER', '3', '45862'),
(91, 'BRETRI30ASCH', 'BREAKER TRIPOLAR 30AMP EZC100N3030 SCHNEIDER', 'SCHNEIDER', '3', '133460'),
(92, '', 'ALQUILER DE ESCALERA DIELECTRICA EN FIBRA 8 PASOS (5 DIAS)', 'HERMA', '3', '65460'),
(93, 'BROACE1/4', 'BROCA ACERO RAPIDO HSS 015 1/4\"', '', '3', '7050'),
(94, 'BROTUS5/16', 'BROCA TUNGSTENO 04 SDS-PLUS 5/16\" X 6\" plus 5 x', '', '3', '20500'),
(95, 'DISCOTPEQ', 'DISCO 03 CORTE ACERO INOX EXTRAD T1 4.1/2\"X 1.2mm', '', '3', '3350'),
(96, 'BE-CLAMP', 'GRAPA COLGANTE BE-CLAMP VARILLA 1/4-3/8', 'MAELECTRICOS', '3', '5300'),
(97, '', 'M,O. TOMA ELÉCTRICA NO REGULADA', '', '3', '48000'),
(98, '', 'M,O. TOMA ELÉCTRICA REGULADA', '', '3', '48000'),
(99, '', 'M,O. INSTALACIÓN TABLERO ELECTRICO', '', '3', '230000'),
(100, '', 'M,O. INSTALACIÓN ARMARIO ELÉCTRICO', '', '3', '410000'),
(101, '', 'M,O. INSTALACIÓN GABINETE DE DATOS PARED', '', '3', '140000'),
(102, '', 'M,O. INSTALACIÓN GABINETE DE DATOS PISO', '', '3', '250000'),
(103, '', 'M,O. PUNTO DATOS TERA 7A', '', '3', '51000'),
(104, '', 'M,O. PUNTO DATOS 5E - 6 - 6A', '', '3', '51000'),
(105, '', 'M,O. INSTALACIÓN RACK DE PISO', '', '3', '200000'),
(106, '', 'M,O. SALIDA ILUMINACIÓN', '', '3', '52000'),
(107, '', 'M,O. PUNTO INTERRUPTOR ILUMINACIÓN', '', '3', '37000'),
(108, '', 'M,O. CANALETA METALICA', '', '1', '7500'),
(109, '', 'M,O. BANDEJA PORTA CABLES', '', '1', '12000'),
(110, '', 'M,O. INSTALACIÓN CANALETA PLÁSTICA', '', '1', '4500'),
(111, '', 'M,O. INSTALACIÓN CORAZA', '', '1', '3500'),
(112, '', 'M,O. TUBERÍA EMT', '', '1', '9000'),
(113, '', 'M,O. TUBERIA PVC', '', '1', '6500'),
(114, '', 'M,O. CAMBIO DE TOMAS', '', '3', '8000'),
(115, '', 'M,O. PEINADO RACK / GABINETE (MINIMO POR INTERVENCION)', '', '3', '220000'),
(116, '', 'M,O. PONCHADO PUNTOS DATOS CAT 5E - 6 - 6A hasta 10 puntos ', '', '3', '7000'),
(117, '', 'M,O. PONCHADO PUNTOS DATOS CAT 7A', '', '3', '7000'),
(118, '', 'M,O. ALIMENTADORES EQUIPOS - TABLEROS (12 AWG A 4 AWG)', '', '1', '12000'),
(119, '', 'M,O. ALIMENTADORES EQUIPOS - TABLEROS (2 AWG EN ADELANTE)', '', '1', '18000'),
(120, '', 'M,O. CABLE TRENZADO ELECTRICO', '', '1', '1650'),
(121, '', 'M,O. INSTALACIÓN BARRA DE TIERRA PARA RACK 1 A 5', '', '3', '90000'),
(122, '', 'M,O. INSTALACIÓN BARRA DE TIERRA PARA RACK 5 A 10', '', '', '120000'),
(123, '', 'M,O. REUBICACIÓN PUNTO ELECTRICO (CABLEADO)', '', '3', '35000'),
(124, '', 'M,O. REUBICACIÓN PUNTO DATOS (CABLEADO)', '', '3', '35000'),
(125, '', 'M,O. INSTALACIÓN ORGANIZADOR DE CABLES', '', '3', '7000'),
(126, '', 'M,O. MONTAJE SWITCH DATOS', '', '3', '12000'),
(127, '', 'M,O. INSTALACIÓN BARRA DE TIERRA TMGB', '', '3', '25000'),
(128, '', 'M,O. DESINSTALACIÓN PUNTO ELÉCTRICO', '', '3', '9500'),
(129, '', 'M,O. DESINSTALACIÓN PUNTO DATOS', '', '3', '10500'),
(130, '', 'M,O. DESINSTALACIÓN CANALETA METÁLICA', '', '1', '3000'),
(131, '', 'M,O. DESINSTALACIÓN TUBERÍA EMT', '', '1', '3100'),
(132, '', 'MO. DESINSTALACIÓN TUBERÍA PVC', '', '1', '2700'),
(133, '', 'M,O. DESINSTALACIÓN BANDEJA PORTA CABLES', '', '1', '4200'),
(134, '', 'M,O. INSTALACIÓN UPS (HASTA 10 KVA)', '', '3', '170000'),
(135, '', 'M.O INSTALACIÓN CONTACTORES', '', '3', '55000'),
(136, '', 'M.O INSTALACIÓN TOTALIZADORES ', '', '3', '47000'),
(137, '', 'M.O INSTALACIÓN CABLE USB', '', '3', '40000'),
(138, '', 'M.O INSTALACIÓN CABLE HDMI / DISPLAY PORT', '', '3', '40000'),
(139, '', 'M.O INSTALACIÓN CABLE VGA ', '', '3', '40000'),
(140, '', 'MO DIA TECNICO', '', '2', '80000'),
(141, '', 'MO VISITA TECNICA ESPECIALIZADA', '', '2', '120000'),
(142, '', 'MO. VISITA FALLIDA  COSTO X TECNICO ', '', '3', '38000'),
(143, '', 'M.O INSTALACIÓN CABLE F.O. TIPO INTERIOR', '', '1', '2800'),
(144, '', 'M.O INSTALACIÓN CABLE F.O. TIPO ARMADA O EXTERIOR', '', '1', '6500'),
(145, '', 'M.O INSTALACIÓN CAJAS DE PASO (DESDE 20X20)', '', '3', '10000'),
(146, '', 'M.O INSTALACIÓN DE BANDEJA FIBRA ÓPTICA (RACK)', '', '3', '20000'),
(147, '', 'M.O INSTALACIÓN DE BANDEJA FIBRA ÓPTICA (PARED)', '', '3', '20000'),
(148, '', 'M.O INSTALACIÓN CABLE COAXIAL', '', '1', '1250'),
(149, '', 'M.O INSTALACIÓN CABLE 6 AWG PARA PUESTA A TIERRA', '', '1', '1300'),
(150, '', 'M.O INSTALACIÓN CABLE DE AUDIO', '', '1', '1300'),
(151, '', 'M.O INSTALACIÓN CONECTORES PARA AUDIO', '', '3', '16000'),
(152, '', 'M.O INSTALACIÓN CONECTORES CABLE COAXIAL', '', '3', '16000'),
(153, '', 'M.O INSTALACIÓN ELECTROIMAN SIN CONEX Y CABLE A 0 MTRS', '', '3', '85000'),
(154, '', 'M.O INSTALACIÓN LECTORA', '', '3', '50000'),
(155, '', 'M.O INSTALACIÓN BOTON DE ACCESO, CANTONERA, NO TOUCH', '', '3', '24000'),
(156, '', 'M.O INSTALACIÓN DE A.P', '', '3', '15000'),
(157, '', 'M.O INSTALACIÓN DE CAMARA DE SEGURIDAD', '', '3', '27000'),
(158, '', 'M.O POR COMPLEJIDAD TIPO 1', '', '3', '60000'),
(159, '', 'M.O POR COMPLEJIDAD TIPO 2', '', '3', '110000'),
(160, '', 'M.O POR COMPLEJIDAD TIPO 3', '', '3', '160000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `cod_mod` int(11) NOT NULL,
  `nom_mod` char(20) DEFAULT NULL,
  `cla_mod` varchar(50) NOT NULL COMMENT 'Clase del modulo',
  `act_hom_mod` int(11) NOT NULL COMMENT 'Activar en el home',
  `rut_mod` varchar(50) DEFAULT NULL COMMENT 'ruta modulo',
  `com_mod` varchar(250) DEFAULT NULL COMMENT 'comentario modulo',
  `ord_mod` int(11) NOT NULL COMMENT 'orden del modulo',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`cod_mod`, `nom_mod`, `cla_mod`, `act_hom_mod`, `rut_mod`, `com_mod`, `ord_mod`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(1, 'Opeación', 'pi pi-fw pi-bookmark', 0, NULL, NULL, 0, '2022-02-09 10:30:33', '2022-02-09 10:30:33', NULL, NULL),
(2, 'Comercial', 'pi pi-fw pi-bookmark', 0, NULL, NULL, 0, '2022-02-09 10:32:36', '2022-02-09 10:32:36', NULL, NULL),
(3, 'Compras', 'pi pi-fw pi-tags', 0, NULL, NULL, 0, '2022-02-09 10:32:36', '2022-02-09 10:32:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `cod_par` int(11) NOT NULL,
  `nom_par` varchar(50) NOT NULL,
  `fac_par` varchar(5) NOT NULL COMMENT 'factor de la partida',
  `cod_cap_par` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`cod_par`, `nom_par`, `fac_par`, `cod_cap_par`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(1, 'partida test ', '1.2', 6, '2022-05-17 18:59:34', '2022-07-06 14:34:58', NULL, NULL),
(2, 'SUMINISTRO E INSTALACIÓN DE SALIDAS ELÉCTRICAS NOR', '1.5', 1, '2022-05-18 19:27:55', '2022-06-14 16:21:33', NULL, NULL),
(3, 'qqqq', '1', 2, '2022-07-11 16:29:24', '2022-09-07 12:13:56', NULL, NULL),
(4, 'SUMINISTRO E INSTALACIÓN DE SALIDAS ELÉCTRICAS NOR', '1', 2, '2022-07-12 15:53:08', '2022-07-12 15:53:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `cod_pla` int(11) NOT NULL,
  `nom_pla` varchar(50) NOT NULL,
  `fac_pla` varchar(5) NOT NULL COMMENT 'factor de la subpartida',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`cod_pla`, `nom_pla`, `fac_pla`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(28, 'leo', '0', '2022-09-07 11:21:58', '2022-10-06 18:28:34', NULL, NULL),
(29, 'SUMINISTRO E INSTALACIÓN DE CANALIZACIÓN CON TUBER', '0', '2022-11-08 11:50:58', '2022-12-28 16:08:47', NULL, NULL),
(30, 'SUMINISTRO E INSTALACIÓN DE PUNTOS DE VOZ Y DATOS ', '0', '2022-12-28 16:09:36', '2023-03-10 14:41:00', NULL, NULL),
(31, 'T EMT  3/4', '0', '2023-07-26 14:59:46', '2023-07-26 15:05:35', NULL, '2023-07-26 15:05:35'),
(32, 'T EMT 3/4', '0', '2023-07-26 15:05:50', '2023-07-26 15:06:44', NULL, NULL),
(33, 'EMT - 2', '0', '2023-07-26 15:10:01', '2023-07-26 15:10:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadesmedida`
--

CREATE TABLE `unidadesmedida` (
  `cod_uni` int(11) NOT NULL,
  `nom_uni` varchar(50) DEFAULT NULL,
  `sig_uni` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `unidadesmedida`
--

INSERT INTO `unidadesmedida` (`cod_uni`, `nom_uni`, `sig_uni`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(1, 'Metro Lineal', 'ML', NULL, NULL, NULL, NULL),
(2, 'GL', 'GL', NULL, '2022-05-17 19:21:53', NULL, NULL),
(3, 'Unidades', 'UN', NULL, NULL, NULL, NULL),
(4, '2222333', '', '2022-05-17 19:14:32', '2022-05-17 19:15:19', NULL, '2022-05-17 19:15:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usu` int(11) NOT NULL,
  `nom_usu` varchar(50) DEFAULT NULL,
  `mai_usu` varchar(50) DEFAULT NULL,
  `pas_usu` varchar(200) DEFAULT NULL,
  `tel_usu` varchar(50) DEFAULT NULL COMMENT 'telefono',
  `car_usu` varchar(50) DEFAULT NULL COMMENT 'cargo',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usu`, `nom_usu`, `mai_usu`, `pas_usu`, `tel_usu`, `car_usu`, `created_at`, `updated_at`, `usu_acce`, `deleted_at`) VALUES
(1, 'Leonardo', 'leo@leo.com', '123', '777777', 'test', '2022-03-22 02:50:01', '2022-03-22 02:50:01', NULL, NULL),
(2, 'Vendedor 1', 'leo@leo.com', '123', '777777', 'test', '2022-03-22 02:50:01', '2022-03-22 02:50:01', NULL, NULL),
(3, 'Vendedor 5', 'leo@leo.com', '123', '777777', 'test', '2022-03-22 02:50:01', '2022-03-22 02:50:01', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`cod_bom`);

--
-- Indices de la tabla `cabezotebomdetalle`
--
ALTER TABLE `cabezotebomdetalle`
  ADD PRIMARY KEY (`cod_cab`);

--
-- Indices de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`cod_cap`);

--
-- Indices de la tabla `capitulosbom`
--
ALTER TABLE `capitulosbom`
  ADD PRIMARY KEY (`cod_cbo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cli`);

--
-- Indices de la tabla `cuerpobomdetalle`
--
ALTER TABLE `cuerpobomdetalle`
  ADD PRIMARY KEY (`cod_cub`);

--
-- Indices de la tabla `detplantillaitem`
--
ALTER TABLE `detplantillaitem`
  ADD PRIMARY KEY (`cod_dpi`);

--
-- Indices de la tabla `detsubpartidas`
--
ALTER TABLE `detsubpartidas`
  ADD PRIMARY KEY (`cod_dsu`);

--
-- Indices de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  ADD PRIMARY KEY (`cod_int`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`cod_ite`);

--
-- Indices de la tabla `item-old`
--
ALTER TABLE `item-old`
  ADD PRIMARY KEY (`cod_ite`);

--
-- Indices de la tabla `items_final`
--
ALTER TABLE `items_final`
  ADD PRIMARY KEY (`cod_ite`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`cod_mod`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`cod_par`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`cod_pla`);

--
-- Indices de la tabla `unidadesmedida`
--
ALTER TABLE `unidadesmedida`
  ADD PRIMARY KEY (`cod_uni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bom`
--
ALTER TABLE `bom`
  MODIFY `cod_bom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cabezotebomdetalle`
--
ALTER TABLE `cabezotebomdetalle`
  MODIFY `cod_cab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `cod_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `capitulosbom`
--
ALTER TABLE `capitulosbom`
  MODIFY `cod_cbo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `cuerpobomdetalle`
--
ALTER TABLE `cuerpobomdetalle`
  MODIFY `cod_cub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `detplantillaitem`
--
ALTER TABLE `detplantillaitem`
  MODIFY `cod_dpi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `detsubpartidas`
--
ALTER TABLE `detsubpartidas`
  MODIFY `cod_dsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `cod_ite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `item-old`
--
ALTER TABLE `item-old`
  MODIFY `cod_ite` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items_final`
--
ALTER TABLE `items_final`
  MODIFY `cod_ite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `cod_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
  MODIFY `cod_par` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `cod_pla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `unidadesmedida`
--
ALTER TABLE `unidadesmedida`
  MODIFY `cod_uni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
