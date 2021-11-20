-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Nov 2021 um 12:20
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 7.3.31

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
CREATE DATABASE IF NOT EXISTS `mvhofkirchen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mvhofkirchen`;

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
(15, 'Bilder/1_3.jpg', 1, '2021-11-17', 'jpg', 2785451),
(16, 'Bilder/1_4.jpg', 1, '2021-11-17', 'jpg', 8485103),
(17, 'Bilder/3.jpg', 3, '2021-11-17', 'jpg', 271042),
(18, 'Bilder/1_5.jpg', 1, '2021-11-19', 'jpg', 7170340),
(19, 'Bilder/4.jpg', 4, '2021-11-20', 'jpg', 57002),
(20, 'Bilder/5.jpg', 5, '2021-11-20', 'jpg', 92488),
(21, 'Bilder/6.jpg', 6, '2021-11-20', 'jpg', 139731),
(22, 'Bilder/9.jpg', 9, '2021-11-20', 'jpg', 119315),
(23, 'Bilder/10.jpg', 10, '2021-11-20', 'jpg', 63374);

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
(11, 12, 10, '0000-00-00', '0000-00-00'),
(12, 0, 11, '0000-00-00', '0000-00-00'),
(13, 0, 12, '2021-11-01', '2021-11-26'),
(14, 0, 13, '2021-11-01', '2021-11-27'),
(15, 0, 14, '2021-11-02', '0000-00-00'),
(16, 1, 15, '2021-11-05', '2021-11-26'),
(17, 1, 16, '2021-11-02', '0000-00-00'),
(18, 22, 17, '2019-06-18', '2021-11-09'),
(19, 9, 18, '2021-08-19', '2021-11-17'),
(20, 1, 19, '2021-11-03', '2021-11-17');

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
(10, 'weweq', 'tutut'),
(11, 'vortest', 'nachtest'),
(12, 'eara', 'gdafs'),
(13, 'vortest', 'nachtest'),
(14, 'neuertest', 'sdfls'),
(15, ';sdlfk;k', 'dfgsd'),
(16, 'dfsdf', 'itiisddf'),
(17, 'hallo', 'inge'),
(18, 'zuhh', 'bla'),
(19, 'Hallo ', 'inge');

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
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `musiker`
--
ALTER TABLE `musiker`
  MODIFY `ID` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Datenbank: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Daten für Tabelle `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"mvhofkirchen\",\"table\":\"dateiregister\"},{\"db\":\"mvhofkirchen\",\"table\":\"leihregister\"},{\"db\":\"mvhofkirchen\",\"table\":\"musiker\"}]');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Daten für Tabelle `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2021-11-20 11:20:40', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"de\"}');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indizes für die Tabelle `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indizes für die Tabelle `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indizes für die Tabelle `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indizes für die Tabelle `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indizes für die Tabelle `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indizes für die Tabelle `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indizes für die Tabelle `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indizes für die Tabelle `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indizes für die Tabelle `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indizes für die Tabelle `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indizes für die Tabelle `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indizes für die Tabelle `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indizes für die Tabelle `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indizes für die Tabelle `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indizes für die Tabelle `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indizes für die Tabelle `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indizes für die Tabelle `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Datenbank: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
