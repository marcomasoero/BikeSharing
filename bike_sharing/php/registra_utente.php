<?php
//con il require riporto il codice di connessione ad DB
require("../conf/db_config.php");

//PROCEDURA ESEGUIRE QUERY (rimando al materiale presente su classroom)
$stmt = $conn->prepare("INSERT INTO utenti(nome, cognome, telefono, mail, data_nascita, tipo, tessera, scadenza_carta, codice_carta, cvv_carta, via, citta, user, psw, statoUtente) VALUES (?,?,?,?,?,'U',?,?,?,?,?,?,?,?,'A')");
$stmt->bind_param("sssssssssssss", $_POST['nome'], $_POST['cognome'],$_POST['telefono'],$_POST['mail'],$_POST['data_nascita'],$_POST['scadenza_carta'],$_POST['codice_carta'],$_POST['cvv_carta'],$_POST['via'],$_POST['citta'],$_POST['user'], $_POST['psw']);
if ($stmt->execute()){
    header("location: ../registra_utente_form.php?msg=OK");
}else{
    header("location: ../registra_utente_form.php?msg=KO");
}

//chiudo la connessione
$conn->close();

?>