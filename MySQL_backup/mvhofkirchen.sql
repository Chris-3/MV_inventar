-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 05:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvhofkirchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `dateiregister`
--

CREATE TABLE `dateiregister` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `Instrumenten_ID` smallint(6) NOT NULL,
  `hinzugefuegt_am` date NOT NULL,
  `Dateityp` varchar(20) NOT NULL,
  `Dateigroesse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instrumente`
--

CREATE TABLE `instrumente` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `Seriennummer` smallint(6) NOT NULL,
  `Bezeichnung` varchar(100) NOT NULL,
  `Hersteller` varchar(50) NOT NULL,
  `Baujahr` smallint(6) NOT NULL,
  `Instrumententyp` tinyint(4) NOT NULL,
  `Stimmung` varchar(20) NOT NULL,
  `Namenszusatz` varchar(50) NOT NULL,
  `Ausgegeben` tinyint(1) NOT NULL,
  `Zubehör` text NOT NULL,
  `Anmerkung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instrumente`
--

INSERT INTO `instrumente` (`ID`, `Seriennummer`, `Bezeichnung`, `Hersteller`, `Baujahr`, `Instrumententyp`, `Stimmung`, `Namenszusatz`, `Ausgegeben`, `Zubehör`, `Anmerkung`) VALUES
(1, 12345, 'Alt-Klarinette \r\n         in B', 'Test', 2005, 1, 'B', 'Alt', 1, 'Koffer', 'Test'),
(2, 32767, 'Groß-Pauke \r\n         in T', 'FFFF', 2012, 2, 'T', 'Groß', 1, 'Sack', 'bitte ordentlich schlagen'),
(3, 674, 'Querflöte \r\n         in C', 'tyrr', 2010, 3, 'C', '', 1, '', ''),
(4, 32767, 'Querflöte \r\n         in C', 'tyrr', 2010, 3, 'C', '', 1, '', ''),
(5, 32767, 'Querflöte \r\n         in C', 'tyrr', 2010, 3, 'C', '', 1, '', ''),
(6, 32767, 'Querflöte \r\n         in C', 'tyrr', 2010, 3, 'C', '', 1, '', ''),
(7, 32767, 'Querflöte \r\n         in C', 'tyrr', 2010, 3, 'C', '', 1, '', ''),
(8, 32767, 'Klarinette \r\n        ', 'Test', 2015, 1, '', '', 0, '', ''),
(9, 12672, 'fluegl-Trompete \r\n         in A', 'Hans', 0, 4, 'A', 'fluegl', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `instrumententypen`
--

CREATE TABLE `instrumententypen` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `Instrumententyp` varchar(50) NOT NULL,
  `Register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instrumententypen`
--

INSERT INTO `instrumententypen` (`ID`, `Instrumententyp`, `Register`) VALUES
(1, 'Klarinette', 1),
(2, 'Pauke', 3),
(3, 'Querflöte', 1),
(4, 'Trompete', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leihregister`
--

CREATE TABLE `leihregister` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `Instrumenten_ID` smallint(6) NOT NULL,
  `Musiker_ID` smallint(6) NOT NULL,
  `ausgegeben_am` date NOT NULL,
  `zurückgegeben_am` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leihregister`
--

INSERT INTO `leihregister` (`ID`, `Instrumenten_ID`, `Musiker_ID`, `ausgegeben_am`, `zurückgegeben_am`) VALUES
(1, 1, 1, '2020-09-01', '0000-00-00'),
(2, 2, 2, '2009-07-23', '0000-00-00'),
(3, 3, 3, '2020-09-23', '0000-00-00'),
(4, 4, 4, '2020-09-10', '0000-00-00'),
(5, 5, 5, '2020-09-10', '0000-00-00'),
(6, 6, 6, '2020-09-10', '0000-00-00'),
(7, 7, 7, '2020-09-10', '0000-00-00'),
(8, 9, 8, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `musiker`
--

CREATE TABLE `musiker` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `Vorname` varchar(50) NOT NULL,
  `Nachname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musiker`
--

INSERT INTO `musiker` (`ID`, `Vorname`, `Nachname`) VALUES
(1, '0', '0'),
(2, 'Michael', 'Öffler'),
(3, 'oiter', 'fota'),
(4, 'oiter', 'fota'),
(5, 'oiter', 'fota'),
(6, 'oiter', 'fota'),
(7, 'oiter', 'fota'),
(8, 'Hans', 'Wurst');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dateiregister`
--
ALTER TABLE `dateiregister`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `instrumente`
--
ALTER TABLE `instrumente`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `instrumententypen`
--
ALTER TABLE `instrumententypen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `leihregister`
--
ALTER TABLE `leihregister`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `musiker`
--
ALTER TABLE `musiker`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dateiregister`
--
ALTER TABLE `dateiregister`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instrumente`
--
ALTER TABLE `instrumente`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `instrumententypen`
--
ALTER TABLE `instrumententypen`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leihregister`
--
ALTER TABLE `leihregister`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `musiker`
--
ALTER TABLE `musiker`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
