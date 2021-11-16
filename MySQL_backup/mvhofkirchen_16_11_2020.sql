-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Nov 2021 um 22:09
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mvhofkirchen`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dateiregister`
--

CREATE TABLE `dateiregister` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `Instrumenten_ID` smallint(6) NOT NULL,
  `hinzugefuegt_am` date NOT NULL,
  `Dateityp` varchar(20) NOT NULL,
  `Dateigroesse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `dateiregister`
--

INSERT INTO `dateiregister` (`ID`, `filepath`, `Instrumenten_ID`, `hinzugefuegt_am`, `Dateityp`, `Dateigroesse`) VALUES
(1, 'Bilder/1_4.jpg', 1, '2020-09-27', 'jpg', 174353),
(2, 'Bilder/1_5.jpg', 1, '2020-10-11', 'jpg', 10529),
(5, 'Bilder/1_6.jpg', 1, '2020-10-12', 'jpg', 10010553),
(7, 'Bilder/3.jpg', 3, '2020-10-12', 'jpg', 14616),
(8, 'Bilder/10.jpg', 10, '2021-10-28', 'jpg', 11738),
(9, 'Bilder/11.jpg', 11, '2021-10-29', 'jpg', 92488),
(10, 'Bilder/3.png', 3, '2021-10-31', 'png', 2409924),
(11, 'Bilder/.jpg', 0, '2021-11-01', 'jpg', 170284),
(12, 'Bilder/1_7.jpg', 1, '2021-11-01', 'jpg', 2626043),
(13, 'Bilder/1_12.jpg', 1, '2021-11-04', 'jpg', 235462),
(14, 'Bilder/27.png', 27, '2021-11-04', 'png', 209758);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `instrumente`
--

CREATE TABLE `instrumente` (
  `Bezeichnung` varchar(100) NOT NULL,
  `Seriennummer` smallint(6) NOT NULL,
  `Hersteller` varchar(50) NOT NULL,
  `Baujahr` smallint(6) NOT NULL,
  `Anschaffungskosten` int(11) NOT NULL,
  `Instrumententyp` tinyint(4) NOT NULL,
  `Stimmung` varchar(20) NOT NULL,
  `Namenszusatz` varchar(50) NOT NULL,
  `Ausgegeben` tinyint(1) NOT NULL,
  `Zubehör` text NOT NULL,
  `Anmerkung` text NOT NULL,
  `ID` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `instrumente`
--

INSERT INTO `instrumente` (`Bezeichnung`, `Seriennummer`, `Hersteller`, `Baujahr`, `Anschaffungskosten`, `Instrumententyp`, `Stimmung`, `Namenszusatz`, `Ausgegeben`, `Zubehör`, `Anmerkung`, `ID`) VALUES
('fgh-Klarinette ', 123, 'wersa', 0, 0, 1, '', 'fgh', 1, '', 'neu sdjflk', 1),
('Querflöte ', 0, '', 0, 0, 3, '', 'neu', 1, '', '', 3),
('neuer zusatz-Querflöte  in r', 0, 'asdf', 0, 1000, 3, 'r', 'neuer zusatz', 1, 'neu', 'neue Anmerkung', 4),
('Querflöte \r\n         in C', 32767, 'tyrr', 2010, 0, 3, 'C', '', 1, '', '', 5),
('Querflöte ', 0, '', 0, 0, 3, '', '', 1, '', 'test', 6),
('fluegl-Trompete \r\n         in A', 12672, 'Hans', 0, 0, 4, 'A', 'fluegl', 1, '', '', 9),
('Klarinette ', 0, '', 0, 0, 1, '', 'some', 0, '', '', 10),
('irgendwas-Querflöte \r\n         in B', 1829, 'Herman', 2009, 0, 3, 'B', 'irgendwas', 1, 'll', 'bb', 11),
('Trompete \r\n        ', 0, 'bdfb', 0, 0, 4, '', '', 1, '', '', 12),
('Klarinette  in test', 5555, 'test2', 0, 0, 1, 'test', '', 0, 'ein bissl Zeug', '', 13),
('', 5555, 'test2', 0, 0, 1, 'test', '', 0, '', '', 14),
('', 32767, 'hhhhh', 2017, 2342, 1, 'ttt', 'kkkk', 0, 'alles', 'asd', 15),
('Klarinette ', 32767, 'sss', 0, 0, 1, '', '', 0, '', '', 16),
('Querflöte ', 32767, 'dfgg', 2019, 9999, 3, '', '', 0, '', '', 17),
('Trompete ', 32767, 'hgff', 0, 0, 4, '', '', 0, '', '', 18),
('Trompete ', 32767, 'hgff', 0, 0, 4, '', '', 0, '', '', 19),
('zus-Klarinette  in y', 12389, 'jjjj', 2017, 1234, 1, 'y', 'zus', 0, 'zubehoer', 'anmerk', 20),
('Querflöte ', 32767, 'fghd', 0, 0, 3, '', '', 0, '', '', 21),
('Querflöte ', 32767, 'fghd', 0, 0, 3, '', '', 0, '', '', 22),
('Klarinette ', 32767, 'test', 2004, 0, 1, '', '', 0, '', '', 23),
('Klarinette ', 32767, 'hfdgh', 0, 0, 1, '', '', 0, '', '', 24),
('Klarinette ', 32767, 'jshdkfjh', 0, 0, 1, '', '', 0, '', '', 25),
('Klarinette ', 32767, 'jshdkfjh', 0, 0, 1, '', '', 0, '', '', 26),
('Pauke ', 32767, 'Hallo', 0, 0, 2, '', '', 0, '', '', 27);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `instrumententypen`
--

CREATE TABLE `instrumententypen` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `Instrumententyp` varchar(50) NOT NULL,
  `Register` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `instrumententypen`
--

INSERT INTO `instrumententypen` (`ID`, `Instrumententyp`, `Register`) VALUES
(1, 'Klarinette', 1),
(2, 'Pauke', 3),
(3, 'Querflöte', 1),
(4, 'Trompete', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `leihregister`
--

CREATE TABLE `leihregister` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `Instrumenten_ID` smallint(6) NOT NULL,
  `Musiker_ID` smallint(6) NOT NULL,
  `ausgegeben_am` date NOT NULL,
  `zurückgegeben_am` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `leihregister`
--

INSERT INTO `leihregister` (`ID`, `Instrumenten_ID`, `Musiker_ID`, `ausgegeben_am`, `zurückgegeben_am`) VALUES
(1, 1, 1, '2020-09-01', '0000-00-00'),
(3, 3, 3, '2020-09-23', '0000-00-00'),
(4, 4, 4, '2020-09-10', '0000-00-00'),
(5, 5, 5, '2020-09-10', '0000-00-00'),
(6, 6, 6, '2020-09-10', '0000-00-00'),
(8, 9, 8, '0000-00-00', '0000-00-00'),
(9, 11, 9, '2021-10-14', '0000-00-00'),
(10, 3, 4, '2019-09-23', '2020-09-23'),
(11, 12, 10, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `musiker`
--

CREATE TABLE `musiker` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `Vorname` varchar(50) NOT NULL,
  `Nachname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `musiker`
--

INSERT INTO `musiker` (`ID`, `Vorname`, `Nachname`) VALUES
(1, 'lksjdf1', 'tetsdf1'),
(2, 'sdppr2', 'N2'),
(3, 'oiter', 'fota'),
(4, 'test4', 'Ntest4'),
(5, 'test5', 'Ntest5'),
(6, 'test6', 'test6_N'),
(7, 'V7', 'N7'),
(8, 'V8', 'N8'),
(9, 'V9', 'N9'),
(10, 'weweq', 'tutut');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `dateiregister`
--
ALTER TABLE `dateiregister`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `instrumente`
--
ALTER TABLE `instrumente`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `instrumententypen`
--
ALTER TABLE `instrumententypen`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `leihregister`
--
ALTER TABLE `leihregister`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `musiker`
--
ALTER TABLE `musiker`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `dateiregister`
--
ALTER TABLE `dateiregister`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `instrumente`
--
ALTER TABLE `instrumente`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `instrumententypen`
--
ALTER TABLE `instrumententypen`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `leihregister`
--
ALTER TABLE `leihregister`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `musiker`
--
ALTER TABLE `musiker`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
