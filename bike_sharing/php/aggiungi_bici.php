<?php
    require("../conf/db_config.php");

    $stmt = $conn->prepare("SELECT id_bici FROM biciclette WHERE tag = ?");
    $stmt->bind_param("s", $_POST['tag']);
    $stmt->execute();
    $result = $stmt->get_result();
    $tag = $result->fetch_assoc();
    if($tag){
        header("Location: ../aggiungi_bici_form.php?msg=BICI_PRESENTE");
    }

    $stmt = $conn->prepare("SELECT COUNT(*) AS nBici FROM stazioni, biciclette WHERE stazioni.id_stazione = biciclette.idStazione AND stazioni.idStazione = ?");
    $stmt->bind_param("i", $_POST['idStazione']);
    $stmt->execute();
    $result = $stmt->get_result();
    $nBici = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    if($nBici == 50){
        header("Location: ../aggiungi_bici_form.php?msg=STAZIONE_PIENA");
    }

    $stmt = $conn->prepare("INSERT INTO biciclette (tag, idStazione) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['tag'], $_POST['idStazione']);
    if ($stmt->execute()) {
        header("Location: ../aggiungi_bici_form.php?msg=OK");
    } else {
        header("Location: ../aggiungi_bici_form.php?msg=KO");
    }
?>