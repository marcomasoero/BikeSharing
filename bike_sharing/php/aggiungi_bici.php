<?php
    require("../conf/db_config.php");

    $stmt = $conn->prepare("INSERT INTO biciclette (tag, idStazione) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['tag'], $_POST['idStazione']);
    if ($stmt->execute()) {
        header("Location: ../aggiungi_bici_form.php?msg=OK");
    } else {
        header("Location: ../aggiungi_bici_form.php?msg=KO");
    }
?>