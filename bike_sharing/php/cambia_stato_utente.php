<?php
    require("../conf/db_config.php");
    $stmt = $conn->prepare("UPDATE utenti SET statoUtente = ? WHERE id_utente = ?");
    $stmt->bind_param("si", $_POST["statoUtente"], $_GET["id_utente"]);
    if($stmt->execute()){
        header("Location: ../visualizza_utente.php?id_utente=".$_GET["id_utente"]."&msg=OK");
    }
?>