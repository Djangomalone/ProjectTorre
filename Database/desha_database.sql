-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Apr 21, 2018 alle 11:46
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
  `NomeAdmin` varchar(50) NOT NULL,
  `CognomeAdmin` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cellulare` varchar(11) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`Id_Admin`, `NomeAdmin`, `CognomeAdmin`, `Email`, `Cellulare`, `Password`) VALUES
(1, 'Vania', 'Passini', 'vania@dayoga.it', '3291404888', 'superadmin');

-- --------------------------------------------------------

--
-- Struttura della tabella `lezione`
--

CREATE TABLE `lezione` (
  `Id_Lezione` int(11) NOT NULL,
  `Id_Admin_Lezione` int(11) NOT NULL,
  `Data_Ora_Lezione` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `lezione`
--

INSERT INTO `lezione` (`Id_Lezione`, `Id_Admin_Lezione`, `Data_Ora_Lezione`) VALUES
(1, 1, '2018-04-24 18:30:00');

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
(1, 2, 1);

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
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Id_Utente` int(11) NOT NULL,
  `NomeUtente` varchar(50) NOT NULL,
  `CognomeUtente` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cellulare` varchar(11) NOT NULL,
  `CodFiscale` varchar(16) NOT NULL,
  `Indirizzo` text NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Id_Utente`, `NomeUtente`, `CognomeUtente`, `Email`, `Cellulare`, `CodFiscale`, `Indirizzo`, `Password`) VALUES
(2, 'Nicolò', 'Torricelli', 'lordmips@gmail.com', '3279303146', 'TRRNCL98H04F257Z', 'via Bonvino 65, San Cesario S/P (MO)', 'Tnt23ernest+');

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
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `lezione`
--
ALTER TABLE `lezione`
  MODIFY `Id_Lezione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `Id_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
