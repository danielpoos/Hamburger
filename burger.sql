-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 12. 20:49
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `hamburgers`
--

CREATE DATABASE hamburgers;

--
-- Tábla szerkezet ehhez a táblához `burger`
--

CREATE TABLE `burger` (
  `id` int(11) NOT NULL,
  `nev` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `fajta` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ar` int(11) NOT NULL,
  `kaloria` int(11) NOT NULL,
  `lejarat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `burger`
--

INSERT INTO `burger` (`id`, `nev`, `fajta`, `ar`, `kaloria`, `lejarat`) VALUES
(1, 'Fishy', 'halas burger', 780, 330, '2021-11-16 12:00:00'),
(2, 'Flamingo', 'rózsaszín szószos csirkeburger', 650, 410, '2021-11-17 12:00:00');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `burger`
--
ALTER TABLE `burger`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
