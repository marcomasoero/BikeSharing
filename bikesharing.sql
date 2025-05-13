-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 13, 2025 alle 14:47
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
  `latitudine` varchar(10) NOT NULL,
  `longitudine` varchar(10) NOT NULL
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
  `tipo` char(1) NOT NULL COMMENT '"A" amministratore, "U" utente ',
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
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utente`, `nome`, `cognome`, `telefono`, `mail`, `data_nascita`, `tipo`, `tessera`, `scadenza_carta`, `codice_carta`, `cvv_carta`, `via`, `citta`, `user`, `psw`, `statoUtente`) VALUES
(1, 'Simone', 'Arrigoni', '1234567890', 'simone.arrigoni@email.com', '2006-01-15', '', '1234567890', '0000-00-00', '1234567812345678', '123', 'Via Milano 10', 'Roma', 'simonearrigoni', 'pass1234', 'A'),
(2, 'Noemi', 'Baruffolo', '0987654321', 'noemi.baruffolo@email.com', '2006-08-04', '', '6543219876', '0000-00-00', '2345678923456789', '456', 'Via Roma 20', 'Napoli', 'noemibaruffolo', 'abc12345', 'A'),
(3, 'Bendetta', 'Bergia', '5556667777', 'bendetta.bergia@email.com', '2006-01-16', '', '9876543210', '0000-00-00', '3456789034567890', '789', 'Viale Trieste 5', 'Milano', 'bendettabergia', '1234abcd', 'A'),
(4, 'Marco', 'Masoero', '3332221111', 'marco.masoero@email.com', '2006-03-02', '', '1122334455', '0000-00-00', '4567890145678901', '321', 'Via Torino 7', 'Genova', 'marcomasoero', 'masoero123', 'A'),
(5, 'admin', 'admin', '0123456789', 'admin@gmail.com', '2025-05-11', '', '0123456789', '0000-00-00', '1234678123456789', '123', 'admin', 'admin', 'admin', 'Admin1234@', 'A');

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
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
