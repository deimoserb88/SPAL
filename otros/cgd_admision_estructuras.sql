-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2016 a las 22:39:59
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cgd_admision`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deleg`
--

CREATE TABLE `deleg` (
  `id` int(10) UNSIGNED NOT NULL,
  `delegacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `des`
--

CREATE TABLE `des` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_deleg` int(10) UNSIGNED NOT NULL,
  `plant` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `nomplant` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `siglas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int(10) UNSIGNED NOT NULL,
  `ver` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `feap` date NOT NULL,
  `id_deleg` int(10) UNSIGNED NOT NULL,
  `plant` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `id_programa` int(10) UNSIGNED NOT NULL,
  `gene1` tinyint(3) UNSIGNED NOT NULL,
  `gene2` tinyint(3) UNSIGNED NOT NULL,
  `gene3` tinyint(3) UNSIGNED NOT NULL,
  `gene4` tinyint(3) UNSIGNED NOT NULL,
  `gene5` tinyint(3) UNSIGNED NOT NULL,
  `ipa1` tinyint(3) UNSIGNED NOT NULL,
  `ipa2` tinyint(3) UNSIGNED NOT NULL,
  `ipa3` tinyint(3) UNSIGNED NOT NULL,
  `ipa4` tinyint(3) UNSIGNED NOT NULL,
  `ipa5` tinyint(3) UNSIGNED NOT NULL,
  `en1` tinyint(3) UNSIGNED NOT NULL,
  `en2` tinyint(3) UNSIGNED NOT NULL,
  `en3` tinyint(3) UNSIGNED NOT NULL,
  `en4` tinyint(3) UNSIGNED NOT NULL,
  `en5` tinyint(3) UNSIGNED NOT NULL,
  `cp1` tinyint(3) UNSIGNED NOT NULL,
  `cp2` tinyint(3) UNSIGNED NOT NULL,
  `cp3` tinyint(3) UNSIGNED NOT NULL,
  `cp4` tinyint(3) UNSIGNED NOT NULL,
  `cp5` tinyint(3) UNSIGNED NOT NULL,
  `pa1` text COLLATE utf8_unicode_ci NOT NULL,
  `pa2` text COLLATE utf8_unicode_ci NOT NULL,
  `pa3` text COLLATE utf8_unicode_ci NOT NULL,
  `pa4` text COLLATE utf8_unicode_ci NOT NULL,
  `pa5` text COLLATE utf8_unicode_ci NOT NULL,
  `coment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE `inscritos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_programa` int(10) UNSIGNED NOT NULL,
  `insc` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomcarr` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `carr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `plant` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE `sistema` (
  `id` int(10) UNSIGNED NOT NULL,
  `uso` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `feactivo` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deleg`
--
ALTER TABLE `deleg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `des`
--
ALTER TABLE `des`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `des_plant_unique` (`plant`),
  ADD KEY `des_id_deleg_foreign` (`id_deleg`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `encuesta_id_programa_foreign` (`id_programa`),
  ADD KEY `encuesta_plant_foreign` (`plant`);

--
-- Indices de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscritos_id_programa_foreign` (`id_programa`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programa_plant_foreign` (`plant`);

--
-- Indices de la tabla `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deleg`
--
ALTER TABLE `deleg`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `des`
--
ALTER TABLE `des`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT de la tabla `inscritos`
--
ALTER TABLE `inscritos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `des`
--
ALTER TABLE `des`
  ADD CONSTRAINT `des_id_deleg_foreign` FOREIGN KEY (`id_deleg`) REFERENCES `deleg` (`id`);

--
-- Filtros para la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `encuesta_id_programa_foreign` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id`),
  ADD CONSTRAINT `encuesta_plant_foreign` FOREIGN KEY (`plant`) REFERENCES `des` (`plant`);

--
-- Filtros para la tabla `inscritos`
--
ALTER TABLE `inscritos`
  ADD CONSTRAINT `inscritos_id_programa_foreign` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `programa_plant_foreign` FOREIGN KEY (`plant`) REFERENCES `des` (`plant`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
