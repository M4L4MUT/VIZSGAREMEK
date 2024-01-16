-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Nov 15. 08:25
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `auto`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jarmuvek`
--

CREATE TABLE `jarmuvek` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `marka` varchar(100) NOT NULL,
  `modell` varchar(100) NOT NULL,
  `motor` varchar(100) NOT NULL,
  `uzemanyag` varchar(100) NOT NULL,
  `km` int(100) NOT NULL,
  `kaukcio` int(100) NOT NULL,
  `berletidij` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `jarmuvek`
--

INSERT INTO `jarmuvek` (`auto_id`, `marka`, `modell`, `motor`, `uzemanyag`, `km`, `kaukcio`, `berletidij`) VALUES
(2, 'Audi ', 'A4', '2.0 PDTDI', 'Dízel', 230354, 80000, 15000),
(3, 'Audi', 'A6', '3.0 v6 TDI quattro', 'Dízel', 220, 100000, 17000),
(4, 'Audi', 'A3', '1.6', 'Benzin', 410201, 60000, 10000),
(5, 'BMW', '320D', '2.0', 'Dízel', 290431, 70000, 13000),
(6, 'BMW', '530D', '3.0', 'Dízel', 230223, 80000, 15000),
(7, 'BMW', '316i', '1.6', 'Benzin', 430201, 60000, 13000),
(8, 'BMW', 'X6 xDrive35i', '3.0', 'Benzin', 187656, 100000, 18000),
(9, 'Dacia', 'Duster', '1.5', 'Benzin', 180340, 80000, 15000),
(10, 'MERCEDES-AMG', 'E 46', '5.5', 'Benzin', 140345, 200000, 30000),
(11, 'MERCEDES-BENZ', 'C220', '2.2', 'Dízel', 340321, 100000, 17000),
(12, 'MERCEDES-BENZ', 'E500', '5.0', 'Benzin', 45000, 80000, 15000),
(13, 'MERCEDES-BENZ', 'ML 500', '5.0', 'Benzin', 310321, 100000, 18000),
(14, 'Volkswagen ', 'Passat', '1.9', 'Dízel', 280432, 80000, 15000),
(15, 'Volkswagen', 'V Golf', '2.0', 'Dízel', 266341, 70000, 14000),
(16, 'Volkswagen', 'Jetta VI', '1.4', 'Benzin', 176976, 130000, 18000),
(17, 'Volkswagen', 'Arteon', '2.0', 'Dízel', 16703, 15000, 20000),
(18, 'Suzuki', 'Swift', '1.0', 'Benzin', 300000, 30000, 7000),
(19, 'Suzuki', 'Vitara', '1.6', 'Benzin', 280321, 80000, 15000),
(20, 'Suzuki', 'SX 4', '1.5', 'Benzin', 230322, 70000, 15000),
(21, 'Ford', 'C-Max', '2.0', 'Dízel', 380341, 80000, 15000),
(22, 'Ford', 'Mustang', '5.0', 'Benzin', 230454, 200000, 30000),
(23, 'Seat', 'Alhambra', '1.9', 'Dízel', 340201, 70000, 14000),
(24, 'Seat', 'Leon', '1.4', 'Benzin', 210202, 80000, 15000),
(25, 'Maserati', 'Gt 3200', '3200', 'Benzin', 140300, 200000, 30000);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `jarmuvek`
--
ALTER TABLE `jarmuvek`
  ADD PRIMARY KEY (`auto_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `jarmuvek`
--
ALTER TABLE `jarmuvek`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
