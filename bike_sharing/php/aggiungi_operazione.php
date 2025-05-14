<?php
require("../conf/db_config.php");

if (!isset($_SESSION['login']) || ($_SESSION['tipo'] != 'A')) {
    header("Location: ../templates/header_riservata.php");
    exit();
}

$stmt = $conn->prepare("SELECT id_utente FROM utenti WHERE tessera=?");
$stmt->bind_param($_POST["n_tessara"]);
$stmt->execute();
$result = $stmt->get_result();
$idUtente = $result->fetchone();

$stmt = $conn->prepare("SELECT id_bici FROM bici WHERE tag=?");
$stmt->bind_param($_POST["tag"]);
$stmt->execute();
$result = $stmt->get_result();
$idBici = $result->fetchone();
if($idBici && $idUtente){
    
        $stmt = $conn->prepare("INSERT INTO operazioni(data_ora, tipo, id_utente, id_bici, id_stazione) VALUES (?,?,?,?,?)");
        $stmt->bind_param(date('Y-m-d H:i:s'), $_POST["operazione"],$idBici,$idUtente,$_POST["id_stazione"]);
        $stmt->execute();
    
    $conn->close();
    header("Location: ../templates/aggiungi_tessera.php?msg=OK");
}
else{
    $conn->close();
    header("Location: ../templates/aggiungi_tessera.php?msg=NO_UTENTE");
} 
?>