-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2021 a las 11:48:10
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `makita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `ID` int(11) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`ID`, `Title`, `Descripcion`) VALUES
(1, 'Inicial', 'Album inicial'),
(2, 'paseo', 'paseo al mar'),
(3, 'cumple', 'celebracion de edad adulta'),
(4, 'familia', 'Este es el album para fotos de mi familia'),
(5, 'Mascotas', 'El album para los perros y gatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `PhotoID` int(11) NOT NULL,
  `PostDate` datetime NOT NULL,
  `Content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE `location` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Shortname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`ID`, `Name`, `Shortname`) VALUES
(1, 'Bogota DC', 'Bog'),
(2, 'Medellin', 'Med');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `member`
--

CREATE TABLE `member` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `PhoneNum` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `stats` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `member`
--

INSERT INTO `member` (`ID`, `RoleID`, `Email`, `Password`, `Name`, `PhoneNum`, `Address`, `stats`) VALUES
(3, 2, 'Jeisontamara1003@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Jeison Armando TÃ¡mara Barrera', '3223750946', 'Cr 19 a #84-1', 1),
(4, 1, 'admin@admin.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'admin', '3223750946', 'Cr 19 a #84-1', 1),
(5, 2, 'andres@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Andres', '3223750946', 'Cr 19 a #84-1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo`
--

CREATE TABLE `photo` (
  `ID` int(11) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `LocationID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Privacy` varchar(20) NOT NULL,
  `UploadDate` datetime NOT NULL,
  `View` int(11) NOT NULL,
  `ImagenPath` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `photo`
--

INSERT INTO `photo` (`ID`, `AlbumID`, `LocationID`, `MemberID`, `Title`, `Description`, `Privacy`, `UploadDate`, `View`, `ImagenPath`) VALUES
(15, 5, 2, 3, 'El michi', 'Este es el michi', '1', '2021-04-25 04:22:17', 1, './../../MODEL/photos/michi.2jpg.jpeg'),
(16, 5, 1, 3, 'el perri', 'Este es el perro', '1', '2021-04-25 04:22:55', 1, './../../MODEL/photos/perro.png'),
(17, 5, 2, 3, 'Otros michis', 'esta es una descripcion chingona', '1', '2021-04-25 04:23:31', 1, './../../MODEL/photos/masmichis.jfif'),
(18, 5, 2, 3, 'Otro michi', 'Este es el perro mihi', '1', '2021-04-25 04:24:08', 1, './../../MODEL/photos/michi.jpg'),
(19, 5, 1, 3, 'Perritos', 'Estos son los perros', '1', '2021-04-25 04:24:39', 1, './../../MODEL/photos/perros.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`ID`, `Description`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `ID` int(11) NOT NULL,
  `Title` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`ID`, `Title`) VALUES
(1, 'feliz'),
(2, 'pensativo'),
(3, 'loquillo'),
(4, 'epico'),
(5, 'azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_photo`
--

CREATE TABLE `tag_photo` (
  `TagID` int(11) NOT NULL,
  `PhotoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PhotoID` (`PhotoID`);

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indices de la tabla `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AlbumID` (`AlbumID`),
  ADD KEY `LocationID` (`LocationID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tag_photo`
--
ALTER TABLE `tag_photo`
  ADD KEY `TagID` (`TagID`),
  ADD KEY `PhotoID` (`PhotoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `location`
--
ALTER TABLE `location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `photo`
--
ALTER TABLE `photo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `rel_rol` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`);

--
-- Filtros para la tabla `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `rel_album` FOREIGN KEY (`AlbumID`) REFERENCES `album` (`ID`),
  ADD CONSTRAINT `rel_location` FOREIGN KEY (`LocationID`) REFERENCES `location` (`ID`),
  ADD CONSTRAINT `rel_member` FOREIGN KEY (`MemberID`) REFERENCES `member` (`ID`);

--
-- Filtros para la tabla `tag_photo`
--
ALTER TABLE `tag_photo`
  ADD CONSTRAINT `rel_photo` FOREIGN KEY (`PhotoID`) REFERENCES `photo` (`ID`),
  ADD CONSTRAINT `rel_tag` FOREIGN KEY (`TagID`) REFERENCES `tag` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
