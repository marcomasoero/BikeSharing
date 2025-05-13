<?php
require("../conf/db_config.php");

if (!isset($_SESSION['login']) || ($_SESSION['tipo'] != "A")) {
    header("Location: ../templates/header_riservata.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM classi WHERE nomeC = ?");
$stmt->bind_param("s", $_POST['nomeClasse']);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_assoc();

if($rows){
$stmt = $conn->prepare("DELETE FROM `classi` WHERE nomeC = ?");
$stmt->bind_param("s", $_POST['nomeClasse']);
$stmt->execute();
if($stmt->execute()){
    header("Location: ../templates/visualizzaClassi.php?msg=OK");
}
else{
    header("Location: ../templates/visualizzaClassi.php?msg=ERRORE");
}
}else{
    header("Location: ../templates/visualizzaClassi.php?msg=NESSUNA_CLASSE");
}
$conn->close();
?>