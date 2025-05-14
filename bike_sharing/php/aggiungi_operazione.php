<?php
session_start();
require("../conf/db_config.php");

if (!isset($_SESSION['login']) || ($_SESSION['tipo'] != 'A')) {
    header("Location: ../home_riservata.php");
    exit();
}

$stmt = $conn->prepare("SELECT id_utente FROM utenti WHERE tessera=? AND statoUtente='A'");
$stmt->bind_param("s",$_POST["n_tessera"]);
$stmt->execute();
$result = $stmt->get_result();
$rowUtente = $result->fetch_assoc();

$stmt = $conn->prepare("SELECT id_bici FROM biciclette WHERE tag=?");
$stmt->bind_param("s",$_POST["tag"]);
$stmt->execute();
$result = $stmt->get_result();
$rowBici = $result->fetch_assoc();
if($rowBici && $rowUtente){
    
        $stmt = $conn->prepare("INSERT INTO operazioni(data_ora, tipo, id_utente, id_bici, id_stazione) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssiii", date('Y-m-d H:i:s'), $_POST["operazione"], $rowUtente["id_utente"],$rowBici["id_bici"],$_POST["id_stazione"]);
        $stmt->execute();
    
    $conn->close();
    header("Location: ../aggiungi_operazione_form.php?msg=OK");
}
else{
    $conn->close();
    header("Location: ../aggiungi_operazione_form.php?msg=NO_UTENTE_o_bici");
} 
?>