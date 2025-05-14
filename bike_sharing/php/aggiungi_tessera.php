<?php
require("../conf/db_config.php");

if (!isset($_SESSION['login']) || ($_SESSION['tipo'] != 'A')) {
    header("Location: ../templates/header_riservata.php");
    exit();
}

$stmt = $conn->prepare("SELECT id_utente FROM utenti WHERE nome=? AND cognome=?");
$stmt->bind_param($_POST["nome_utente"],$_POST["cognome_utente"]);
$stmt->execute();
$result = $stmt->get_result();
$idUtente = $result->fetchone();
if($idUtente){
    $stmt = $conn->prepare("UPDATE utenti SET tessera = ? WHERE utenti.id_utente = ?");
    $stmt->bind_param($_POST["n_tessera"],$idUtente);
    $stmt->execute();
    $conn->close();
    header("Location: ../templates/aggiungi_tessera.php?msg=OK");
}
else{
    $conn->close();
    header("Location: ../templates/aggiungi_tessera.php?msg=NO_UTENTE");
} 
?>