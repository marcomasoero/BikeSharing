<?php
require("../conf/db_config.php"); //connessione ad DB

//QUERY
$stmt = $conn->prepare("SELECT * FROM utenti WHERE user = ? AND psw = ?");
$stmt->bind_param("ss", $_POST['user'], $_POST['psw']);
$stmt->execute();

//Salvataggio dei dati della query
$result = $stmt->get_result();
$row = $result->fetch_assoc();

//chiusura la connessione
$conn->close();

if (($_POST['user']==$row['user'])&&($_POST['psw']==$row['psw'])){ //se il login è corretto rimanda alla homepage salvando nella SESSION i dati principali dello user
    session_start();
    $_SESSION['login']='ok';
    $_SESSION['id_utente']= $row['id'];
    $_SESSION['nome']=$row['nome'];
    $_SESSION['cognome']=$row['cognome'];
    $_SESSION['tipo']=$row['tipo'];
    header("location: ../templates/home_riservata.php");
}else{ //altrimenti rimando alla pagina del FORM di login una variabile "msg" che verrà letto in
    header("location: ../index.php?msg=ERR_ACCESSO");
}

?>