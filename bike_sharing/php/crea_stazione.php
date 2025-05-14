<?php
    require("../conf/db_config.php");

    $stmt = $conn->prepare("INSERT INTO stazioni (nomeStazione, via, citta, latitudine, longitudine) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $_POST['nomeStazione'], $_POST['via'], $_POST['citta'], $_POST['latitudine'], $_POST['longitudine']);
    if ($stmt->execute()) {
        header("Location: ../crea_stazione_form.php?msg=OK");
    } else {
        header("Location: ../crea_stazione_form.php?msg=KO");
    }
?>