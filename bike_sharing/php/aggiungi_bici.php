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
    $stmt = $conn->prepare("INSERT INTO biciclette (tag, idStazione) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['tag'], $_POST['idStazione']);
    if ($stmt->execute()) {
        header("Location: ../aggiungi_bici_form.php?msg=OK");
    } else {
        header("Location: ../aggiungi_bici_form.php?msg=KO");
    }
?>