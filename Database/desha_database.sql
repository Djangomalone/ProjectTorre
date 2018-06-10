-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 10, 2018 alle 13:13
-- Versione del server: 10.1.29-MariaDB
-- Versione PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desha database`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `abbonamento`
--

CREATE TABLE `abbonamento` (
  `Id_Abbonamento` int(11) NOT NULL,
  `Id_Utente_Abbonamento` int(11) NOT NULL,
  `Tipologia` text NOT NULL,
  `Data_Scadenza` date NOT NULL,
  `Data_Attivazione` date NOT NULL,
  `Lezioni_Rimaste` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `abbonamento`
--

INSERT INTO `abbonamento` (`Id_Abbonamento`, `Id_Utente_Abbonamento`, `Tipologia`, `Data_Scadenza`, `Data_Attivazione`, `Lezioni_Rimaste`) VALUES
(1, 2, '8 lezioni x 2 mesi', '2018-04-30', '2018-04-21', 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(11) NOT NULL,
  `NomeAdmin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CognomeAdmin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cellulare` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`Id_Admin`, `NomeAdmin`, `CognomeAdmin`, `Email`, `Cellulare`, `Password`) VALUES
(2, 'Tommaso', 'Ricchi', 'tomma@gmail.com', '3333456677', '473856c979caf794b04ae5dbc21a8110544da77b'),
(3, 'Vania', 'Passini', 'vania@dayoga.it', '3291404888', '32668cae1c8fdf3b24a8afc40edc78c0b7da39ca');

-- --------------------------------------------------------

--
-- Struttura della tabella `lezione`
--

CREATE TABLE `lezione` (
  `Id_Lezione` int(11) NOT NULL,
  `Id_Admin_Lezione` int(11) NOT NULL,
  `Data_Lezione` date NOT NULL,
  `Ora_Lezione` time NOT NULL,
  `Descrizione` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `lezione`
--

INSERT INTO `lezione` (`Id_Lezione`, `Id_Admin_Lezione`, `Data_Lezione`, `Ora_Lezione`, `Descrizione`) VALUES
(31, 1, '2018-06-27', '15:00:00', 'Lezione Guidata');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `Id_Prenotazione` int(11) NOT NULL,
  `Id_Utente_Prenotazione` int(11) NOT NULL,
  `Id_Lezione_Prenotazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`Id_Prenotazione`, `Id_Utente_Prenotazione`, `Id_Lezione_Prenotazione`) VALUES
(4, 3, 8),
(5, 2, 31);

-- --------------------------------------------------------

--
-- Struttura della tabella `presenza`
--

CREATE TABLE `presenza` (
  `Id_Presenza` int(11) NOT NULL,
  `Id_Utente_Presenza` int(11) NOT NULL,
  `Id_Admin_Presenza` int(11) NOT NULL,
  `Id_Lezione_presenza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `presenza`
--

INSERT INTO `presenza` (`Id_Presenza`, `Id_Utente_Presenza`, `Id_Admin_Presenza`, `Id_Lezione_presenza`) VALUES
(1, 2, 1, 1),
(2, 2, 1, 16);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Id_Utente` int(11) NOT NULL,
  `NomeUtente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CognomeUtente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cellulare` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodFiscale` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Indirizzo` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Id_Utente`, `NomeUtente`, `CognomeUtente`, `Email`, `Cellulare`, `CodFiscale`, `Indirizzo`, `Password`) VALUES
(7, 'Nicolò', 'Torricelli', 'lordmips@gmail.com', '3279303146', 'TRRNCL98H04F257Z', 'via Bonvino 65, San Cesario S/P', 'dab5616a76c219518461f2f1f732decffb645f8b'),
(8, 'Barbara', 'Vecchi', 'bvmips@hotmail.com', '3392654755', 'VCCBBR70D69F257O', 'via Bonvino 65, San Cesario S/P', 'a2bc776ac5d36e160d684b137777cc69608f3ce8');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `abbonamento`
--
ALTER TABLE `abbonamento`
  ADD PRIMARY KEY (`Id_Abbonamento`),
  ADD KEY `Id_Utente_Abbonamento` (`Id_Utente_Abbonamento`);

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indici per le tabelle `lezione`
--
ALTER TABLE `lezione`
  ADD PRIMARY KEY (`Id_Lezione`),
  ADD KEY `Id_Admin_Lezione` (`Id_Admin_Lezione`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`Id_Prenotazione`),
  ADD KEY `Id_Utente_Prenotazione` (`Id_Utente_Prenotazione`),
  ADD KEY `Id_Lezione_Prenotazione` (`Id_Lezione_Prenotazione`);

--
-- Indici per le tabelle `presenza`
--
ALTER TABLE `presenza`
  ADD PRIMARY KEY (`Id_Presenza`),
  ADD KEY `Id_Utente_Presenza` (`Id_Utente_Presenza`),
  ADD KEY `Id_Admin_Presenza` (`Id_Admin_Presenza`),
  ADD KEY `Id_Lezione_presenza` (`Id_Lezione_presenza`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Id_Utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `abbonamento`
--
ALTER TABLE `abbonamento`
  MODIFY `Id_Abbonamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `lezione`
--
ALTER TABLE `lezione`
  MODIFY `Id_Lezione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `Id_Prenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `presenza`
--
ALTER TABLE `presenza`
  MODIFY `Id_Presenza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `Id_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
