-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2022 a las 01:07:22
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `metrocardservices`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cards_by_user` (IN `param_user` VARCHAR(25))   Begin
	set @s = "SELECT * FROM users_cards WHERE usr_doc = ?";
    prepare stmt from @s;
    set @a = param_user;  
    execute stmt USING @a;
    deallocate prepare stmt;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_register_card` (IN `param_user` VARCHAR(25), IN `param_car_id` INT)   Begin
	set @s = "INSERT INTO users_cards(usr_doc, card_id) VALUES(?, ?)";
    prepare stmt from @s;
    set @a = param_user;
    set @b = param_car_id;    
    execute stmt USING @a, @b;
    deallocate prepare stmt;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_register_user` (IN `param_user` VARCHAR(25) CHARSET utf8, IN `param_pass` VARCHAR(25) CHARSET utf8, IN `param_mail` VARCHAR(255) CHARSET utf8, IN `param_name` VARCHAR(25) CHARSET utf8, IN `param_lastname` VARCHAR(25) CHARSET utf8)   Begin
	set @s = "INSERT INTO users_tbl(usr_doc, name, lastname, mail,  passwd) VALUES(?, ?, ?, ?, ?)";
    prepare stmt from @s;
    set @a = param_name;
    set @b = param_lastname;
    set @c = param_mail;
    set @d = param_user;
    set @e = param_pass;
    
    execute stmt USING @d, @a, @b, @c, @e;
    deallocate prepare stmt;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validate_login` (IN `param_user` VARCHAR(25), IN `param_pass` VARCHAR(25))   Begin

    set @s = concat("select count(*) from users_tbl where usr_doc = '", param_user, "' And passwd = '", param_pass, "'");

    prepare stmt from @s;
    execute stmt;
    deallocate prepare stmt;

End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validate_mail` (IN `param_mail` VARCHAR(25))   BEGIN
	SET @s = "SELECT COUNT(*) FROM users_tbl WHERE mail = ?";
    PREPARE stmt FROM @s;
    SET @a = param_mail;
    EXECUTE stmt USING @a;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validate_username` (IN `param_user` VARCHAR(25))   BEGIN
	SET @s = "SELECT COUNT(*) FROM users_tbl WHERE usr_doc = ?";
    PREPARE stmt FROM @s;
    SET @a = param_user;
    EXECUTE stmt USING @a;
    DEALLOCATE PREPARE stmt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_cards`
--

CREATE TABLE `users_cards` (
  `usr_doc` varchar(50) DEFAULT NULL,
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users_cards`
--

INSERT INTO `users_cards` (`usr_doc`, `card_id`) VALUES
('8-977-1599', 123456789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_tbl`
--

CREATE TABLE `users_tbl` (
  `usr_doc` varchar(50) NOT NULL,
  `name` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `passwd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users_tbl`
--

INSERT INTO `users_tbl` (`usr_doc`, `name`, `lastname`, `mail`, `passwd`) VALUES
('8-4546-5469', 'Jose', 'Kamp', 'sdlkfnsdf@sdfh.vp', 'pass123'),
('8-977-1599', 'Ernesto', 'Campos', 'ernesto.campos@utp.ac.pa', 'admin123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users_cards`
--
ALTER TABLE `users_cards`
  ADD KEY `usr_doc` (`usr_doc`);

--
-- Indices de la tabla `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`usr_doc`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users_cards`
--
ALTER TABLE `users_cards`
  ADD CONSTRAINT `users_cards_ibfk_1` FOREIGN KEY (`usr_doc`) REFERENCES `users_tbl` (`usr_doc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
