<?php
session_start();
require("../conf/db_config.php");

if (!isset($_SESSION['login']) || ($_SESSION['tipo'] != 'A')) {
    header("Location: ../home_riservata.php");
    exit();
}

$stmt = $conn->prepare("SELECT COUNT(*) AS nBici FROM biciclette WHERE idStazione = ? GROUP BY idStazione");
$stmt->bind_param("s", $_POST["id_stazione"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_all();

if($row["nBici"]<50){
    $stmt = $conn->prepare("SELECT id_utente FROM utenti WHERE tessera=? AND statoUtente='A'");
    $stmt->bind_param("s",$_POST["n_tessera"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowUtente = $result->fetch_assoc();

    $stmt = $conn->prepare("SELECT id_bici FROM biciclette WHERE tag=? AND idStazione IS NOT NULL");
    $stmt->bind_param("s",$_POST["tag"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowBici = $result->fetch_assoc();
    if($rowBici && $rowUtente){
        
            $stmt = $conn->prepare("INSERT INTO operazioni(data_ora, tipo, id_utente, id_bici, id_stazione) VALUES (?,?,?,?,?)");
            $stmt->bind_param("ssiii", date('Y-m-d H:i:s'), $_POST["operazione"], $rowUtente["id_utente"],$rowBici["id_bici"],$_POST["id_stazione"]);
            $stmt->execute();

            if($_POST["operazione"]=='N'){
                $stmt = $conn->prepare("UPDATE biciclette SET idStazione = NULL WHERE id_bici=?");
                $stmt->bind_param("s", $rowBici["id_bici"]);
                $stmt->execute();
            }
            else{
                $stmt = $conn->prepare("UPDATE biciclette SET idStazione = ? WHERE id_bici=?");
                $stmt->bind_param("ss",$_POST["id_stazione"], $rowBici["id_bici"]);
                $stmt->execute();
            }
        
        $conn->close();
        header("Location: ../aggiungi_operazione_form.php?msg=OK");
    }
    else{
        if(!$rowUtente){
            $conn->close();
            header("Location: ../aggiungi_operazione_form.php?msg=ERROR_UTENTE");
        }
        elseif(!$rowBici){
            $conn->close();
            header("Location: ../aggiungi_operazione_form.php?msg=ERROR_BICI");
        }
        $conn->close();
        header("Location: ../aggiungi_operazione_form.php?msg=ERRORE");
    } 
}
$conn->close();
header("Location: ../aggiungi_operazione_form.php?msg=STAZIONE_PIENA");
?>