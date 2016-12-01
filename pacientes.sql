
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2016 at 10:36 AM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a3642120_pacient`
--

-- --------------------------------------------------------

--
-- Table structure for table `emfermedad`
--

CREATE TABLE `emfermedad` (
  `id_enf` int(11) NOT NULL AUTO_INCREMENT,
  `enf_nom` varchar(30) NOT NULL,
  `enf_cod` varchar(6) NOT NULL,
  PRIMARY KEY (`id_enf`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `emfermedad`
--

INSERT INTO `emfermedad` VALUES(1, 'DIABETES', 'DB1');
INSERT INTO `emfermedad` VALUES(2, 'OBESIDAD', 'OB1');
INSERT INTO `emfermedad` VALUES(3, 'HIPERTENSION', 'HT1');

-- --------------------------------------------------------

--
-- Table structure for table `eps`
--

CREATE TABLE `eps` (
  `id_eps` int(11) NOT NULL AUTO_INCREMENT,
  `nom_eps` varchar(100) DEFAULT NULL,
  `cod` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_eps`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `eps`
--

INSERT INTO `eps` VALUES(1, ' CAMACOL', 'CCF001');
INSERT INTO `eps` VALUES(2, ' COMFAMA', 'CCF002');
INSERT INTO `eps` VALUES(3, 'COMFAMILIAR CARTAGENA', 'CCF007');
INSERT INTO `eps` VALUES(4, ' COMFABOY', 'CCF009');
INSERT INTO `eps` VALUES(5, 'COMFACOR', 'CCF015');
INSERT INTO `eps` VALUES(6, ' CAJA DE COMPENSACION FAMILIAR CAFAM', 'CCF018');
INSERT INTO `eps` VALUES(7, 'Caja de Compensación Familiar de la Guajira', 'CCF023');
INSERT INTO `eps` VALUES(8, 'COMFAMILIAR', 'CCF024');
INSERT INTO `eps` VALUES(9, 'COMFAMILIAR NARIÑO', 'CCF027');
INSERT INTO `eps` VALUES(10, 'CAJASAN', 'CCF031');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `contra` varchar(40) NOT NULL,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` VALUES(1, 'ALBERTO RINCÓN', 'a80c387990bbd790764fb07bb1f05708', 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Table structure for table `programa`
--

CREATE TABLE `programa` (
  `id_prog` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_ing` date NOT NULL,
  `fecha_eg` date DEFAULT NULL,
  `activo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_prog`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `programa`
--

INSERT INTO `programa` VALUES(1, '2016-11-12', NULL, 1);
INSERT INTO `programa` VALUES(2, '2016-11-12', NULL, 1);
INSERT INTO `programa` VALUES(3, '2016-11-12', NULL, 1);
INSERT INTO `programa` VALUES(4, '2016-11-12', NULL, 0);
INSERT INTO `programa` VALUES(5, '2016-11-12', NULL, 1);
INSERT INTO `programa` VALUES(6, '2016-11-12', NULL, 1);
INSERT INTO `programa` VALUES(7, '2016-11-12', NULL, 1);
INSERT INTO `programa` VALUES(8, '2016-11-12', NULL, 1);
INSERT INTO `programa` VALUES(9, '2016-11-12', NULL, 1);
INSERT INTO `programa` VALUES(10, '2016-11-12', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_usu` bigint(20) NOT NULL AUTO_INCREMENT,
  `doc_num` varchar(15) CHARACTER SET utf8 NOT NULL,
  `doc_tipo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nom_1` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nom_2` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `ape_1` varchar(20) CHARACTER SET ucs2 NOT NULL,
  `ape_2` varchar(20) CHARACTER SET utf8 NOT NULL,
  `sexo` varchar(1) CHARACTER SET utf8 NOT NULL,
  `fecha_nac` date NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 NOT NULL,
  `dir` varchar(20) CHARACTER SET utf8 NOT NULL,
  `vivo` tinyint(1) NOT NULL,
  `eps_id_eps` int(11) NOT NULL,
  `fecha_ing` date NOT NULL,
  `fecha_eg` date DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usu`),
  KEY `eps_id_eps` (`eps_id_eps`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(29, ' 97086732 ', ' cc ', 'José', 'Roberto', 'Mayorga', 'Patiño', 'M', '1976-06-24', ' 3203066767 ', 'cra17#345-5', 1, 1, '2016-11-12', NULL, 1);
INSERT INTO `user` VALUES(30, ' 1100968640 ', ' cc ', 'Nubia', 'Catalina', 'Mayorga', 'de Rincón', 'F', '1996-01-15', ' 3046363398 ', 'cra17#345-5', 1, 6, '2016-11-12', NULL, 1);
INSERT INTO `user` VALUES(33, ' 1100959689 ', ' cc ', 'Alberto', 'Luis', 'Rincón', 'Barajas', 'M', '1991-10-04', ' 3167570928 ', 'Cra6#12-49', 1, 1, '2016-11-14', NULL, 1);
INSERT INTO `user` VALUES(34, ' 28378135 ', ' cc ', 'Maria', 'Magdalena', 'Cespedes', 'Garcia', 'F', '1951-10-11', ' 3158275024 ', 'Cra6#12-49', 1, 10, '2016-11-14', NULL, 1);
INSERT INTO `user` VALUES(38, ' 37886112 ', ' cc ', 'Alba', 'Lucia', 'Gonzalez', 'Henandez', 'F', '1959-08-28', ' 7237978 ', 'cra17#345-5', 1, 1, '2016-11-15', NULL, 1);
INSERT INTO `user` VALUES(39, ' 1234566 ', ' cc ', 'Pepito', 'Juanito', 'Perez', 'Guerrero', 'M', '0000-00-00', ' 123456 ', 'cra123#456', 1, 4, '2016-11-16', NULL, 1);
INSERT INTO `user` VALUES(40, ' 91045729 ', ' cc ', 'Victor', 'Manuel', 'PinzÃ²n', 'CÃ¨spedes', 'M', '1979-05-15', ' 312342543 ', 'Cll 17A 5-51', 1, 3, '2016-11-16', NULL, 1);
INSERT INTO `user` VALUES(41, ' 91077023 ', ' cc ', 'Edwin', 'Yamith', 'Olaya', 'Mantilla', 'M', '1978-12-31', ' 1234567 ', 'cra 123', 1, 2, '2016-11-17', NULL, 1);
INSERT INTO `user` VALUES(42, ' 1100968720 ', ' cc ', 'Adriana', 'Lucia', 'Mayorga', 'Gonzales', 'F', '1998-07-07', '  ', '', 1, 1, '2016-11-18', NULL, 1);
INSERT INTO `user` VALUES(43, ' 1100958533 ', ' cc ', 'Lida', 'Samara', 'Gonzales', 'Hernadez', 'F', '1992-10-13', ' 316355389 ', 'cra456 Madrid', 1, 10, '2016-11-18', NULL, 1);
INSERT INTO `user` VALUES(44, ' 1018505565 ', ' cc ', 'LucÃ­a ', '', 'GonzÃ¡lez', '', 'F', '1998-09-07', ' 3209578550 ', 'cra 8 # 45-32', 0, 10, '2016-11-27', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_enfermedad`
--

CREATE TABLE `usuario_enfermedad` (
  `id_usuario_enfermedad` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado_enf` text,
  `usuario_id_usuario` bigint(20) NOT NULL,
  `enfermedad_id_enf` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_enfermedad`),
  KEY `usuario_id_usuario` (`usuario_id_usuario`),
  KEY `enfermedad_id_enf` (`enfermedad_id_enf`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `usuario_enfermedad`
--

INSERT INTO `usuario_enfermedad` VALUES(5, '  maso gordito ', 29, 2);
INSERT INTO `usuario_enfermedad` VALUES(6, '  Algo dulce... ', 30, 1);
INSERT INTO `usuario_enfermedad` VALUES(8, '  Debe relajarse un poco... ', 33, 3);
INSERT INTO `usuario_enfermedad` VALUES(9, '  Moderada ', 34, 1);
INSERT INTO `usuario_enfermedad` VALUES(10, '  Algo de estres ', 38, 3);
INSERT INTO `usuario_enfermedad` VALUES(11, '  dulce ', 39, 1);
INSERT INTO `usuario_enfermedad` VALUES(12, '  Por culpa del colegio ', 40, 3);
INSERT INTO `usuario_enfermedad` VALUES(13, '  aaaaaa ', 41, 1);
INSERT INTO `usuario_enfermedad` VALUES(14, '   ', 42, 1);
INSERT INTO `usuario_enfermedad` VALUES(15, '  Mucho estrÃ©s. ', 43, 3);
INSERT INTO `usuario_enfermedad` VALUES(16, '   ', 44, 2);

-- --------------------------------------------------------

--
-- Table structure for table `visita`
--

CREATE TABLE `visita` (
  `id_visita` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_visita` date NOT NULL,
  `clari` varchar(50) NOT NULL,
  `talla` double NOT NULL,
  `peso` double NOT NULL,
  `imc` double NOT NULL,
  `riesgo` varchar(50) NOT NULL,
  `tension_sis` double NOT NULL,
  `tension_dia` double NOT NULL,
  `observaciones` text NOT NULL,
  `programa_id_prog` bigint(20) NOT NULL,
  PRIMARY KEY (`id_visita`),
  KEY `programa_id_prog` (`programa_id_prog`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `visita`
--

