-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 02, 2025 alle 11:19
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikesharing`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `biciclette`
--

CREATE TABLE `biciclette` (
  `id_bici` int(11) NOT NULL,
  `tag` varchar(10) NOT NULL CHECK (`tag` regexp '^TAG[0-9]+$'),
  `idStazione` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `operazioni`
--

CREATE TABLE `operazioni` (
  `id_operazione` int(11) NOT NULL,
  `data_ora` datetime NOT NULL,
  `tipo` char(1) NOT NULL CHECK (`tipo` in ('N','R')),
  `id_utente` int(11) NOT NULL,
  `id_bici` int(11) NOT NULL,
  `id_stazione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `stazioni`
--

CREATE TABLE `stazioni` (
  `id_stazione` int(11) NOT NULL,
  `nomeStazione` varchar(20) NOT NULL,
  `via` varchar(30) NOT NULL,
  `citta` varchar(30) NOT NULL,
  `coordinate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id_utente` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `data_nascita` date NOT NULL,
  `tessera` varchar(10) DEFAULT NULL,
  `scadenza_carta` date NOT NULL,
  `codice_carta` char(16) NOT NULL,
  `cvv_carta` char(3) NOT NULL,
  `via` varchar(30) NOT NULL,
  `citta` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL,
  `psw` varchar(30) NOT NULL,
  `statoUtente` char(1) NOT NULL CHECK (`statoUtente` in ('A','D'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `biciclette`
--
ALTER TABLE `biciclette`
  ADD PRIMARY KEY (`id_bici`),
  ADD UNIQUE KEY `tag` (`tag`),
  ADD KEY `idStazione` (`idStazione`);

--
-- Indici per le tabelle `operazioni`
--
ALTER TABLE `operazioni`
  ADD PRIMARY KEY (`id_operazione`),
  ADD KEY `id_utente` (`id_utente`),
  ADD KEY `id_bici` (`id_bici`),
  ADD KEY `id_stazione` (`id_stazione`);

--
-- Indici per le tabelle `stazioni`
--
ALTER TABLE `stazioni`
  ADD PRIMARY KEY (`id_stazione`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utente`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `biciclette`
--
ALTER TABLE `biciclette`
  MODIFY `id_bici` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `operazioni`
--
ALTER TABLE `operazioni`
  MODIFY `id_operazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `stazioni`
--
ALTER TABLE `stazioni`
  MODIFY `id_stazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `biciclette`
--
ALTER TABLE `biciclette`
  ADD CONSTRAINT `biciclette_ibfk_1` FOREIGN KEY (`idStazione`) REFERENCES `stazioni` (`id_stazione`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `operazioni`
--
ALTER TABLE `operazioni`
  ADD CONSTRAINT `operazioni_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id_utente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `operazioni_ibfk_2` FOREIGN KEY (`id_bici`) REFERENCES `biciclette` (`id_bici`) ON UPDATE CASCADE,
  ADD CONSTRAINT `operazioni_ibfk_3` FOREIGN KEY (`id_stazione`) REFERENCES `stazioni` (`id_stazione`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
