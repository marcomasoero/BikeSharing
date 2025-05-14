<?php
session_start();
require("../conf/db_config.php");
echo $_SESSION['tipo'];
if (($_SESSION['tipo'] != 'A')) {
    header("Location: ../home_riservata.php");
    exit();
}

$stmt = $conn->prepare("SELECT id_utente FROM utenti WHERE nome = ? AND cognome = ? AND tessera IS NULL");
$stmt->bind_param("ss",$_POST["nome_utente"],$_POST["cognome_utente"]);
$stmt->execute();
$result = $stmt->get_result();
$rowUtente = $result->fetch_assoc();
if($rowUtente){
    $stmt = $conn->prepare("UPDATE utenti SET tessera = ? WHERE utenti.id_utente = ?");
    $stmt->bind_param("ss",$_POST["n_tessera"],$rowUtente["id_utente"]);
    $stmt->execute();
    $conn->close();
    header("Location: ../aggiungi_tessera_form.php?msg=OK");
}
else{
    $conn->close();
    header("Location: ../aggiungi_tessera_form.php?msg=NO_UTENTE");
} 
?>