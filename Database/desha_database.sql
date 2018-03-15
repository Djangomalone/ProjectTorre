-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 16, 2018 alle 00:01
-- Versione del server: 10.1.28-MariaDB
-- Versione PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desha_database`
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

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(11) NOT NULL,
  `Nome_Cognome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cellulare` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `lezione`
--

CREATE TABLE `lezione` (
  `Id_Lezione` int(11) NOT NULL,
  `Id_Admin_Lezione` int(11) NOT NULL,
  `Data_Ora_Lezione` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `Id_Prenotazione` int(11) NOT NULL,
  `Id_Utente_Prenotazione` int(11) NOT NULL,
  `Id_Lezione_Prenotazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Id_Utente` int(11) NOT NULL,
  `Nome_Cognome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cellulare` varchar(11) NOT NULL,
  `CodFiscale` varchar(16) NOT NULL,
  `Indirizzo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `Id_Abbonamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `lezione`
--
ALTER TABLE `lezione`
  MODIFY `Id_Lezione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `Id_Prenotazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `presenza`
--
ALTER TABLE `presenza`
  MODIFY `Id_Presenza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `Id_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `abbonamento`
--
ALTER TABLE `abbonamento`
  ADD CONSTRAINT `abbonamento_ibfk_1` FOREIGN KEY (`Id_Utente_Abbonamento`) REFERENCES `utente` (`Id_Utente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `lezione`
--
ALTER TABLE `lezione`
  ADD CONSTRAINT `lezione_ibfk_1` FOREIGN KEY (`Id_Admin_Lezione`) REFERENCES `admin` (`Id_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`Id_Utente_Prenotazione`) REFERENCES `utente` (`Id_Utente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenotazione_ibfk_2` FOREIGN KEY (`Id_Lezione_Prenotazione`) REFERENCES `lezione` (`Id_Lezione`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `presenza`
--
ALTER TABLE `presenza`
  ADD CONSTRAINT `presenza_ibfk_1` FOREIGN KEY (`Id_Utente_Presenza`) REFERENCES `utente` (`Id_Utente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presenza_ibfk_2` FOREIGN KEY (`Id_Admin_Presenza`) REFERENCES `admin` (`Id_Admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presenza_ibfk_3` FOREIGN KEY (`Id_Lezione_presenza`) REFERENCES `lezione` (`Id_Lezione`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
