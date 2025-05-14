<?php
require("../conf/db_config.php");

// Verifica che il campo "user" sia presente
if (!isset($_POST['user']) || $_POST['user'] === '') {
    die("Errore: campo 'user' mancante.");
}

$user = $_POST['user'];

// Recupera i dati esistenti
$stmt_select = $conn->prepare("SELECT * FROM utenti WHERE user = ?");
$stmt_select->bind_param("s", $user);
$stmt_select->execute();
$result = $stmt_select->get_result();

if ($result->num_rows === 0) {
    die("Errore: utente non trovato.");
}

$existing = $result->fetch_assoc();

if($_SESSION['tipo'] == "U"){
// Sostituisce i valori POST vuoti con quelli esistenti
$nome           = $_POST['nome']           !== '' ? $_POST['nome']           : $existing['nome'];
$cognome        = $_POST['cognome']        !== '' ? $_POST['cognome']        : $existing['cognome'];
$telefono       = $_POST['telefono']       !== '' ? $_POST['telefono']       : $existing['telefono'];
$mail           = $_POST['mail']           !== '' ? $_POST['mail']           : $existing['mail'];
$data_nascita   = $_POST['data_nascita']   !== '' ? $_POST['data_nascita']   : $existing['data_nascita'];
$scadenza_carta = $_POST['scadenza_carta'] !== '' ? $_POST['scadenza_carta'] : $existing['scadenza_carta'];
$codice_carta   = $_POST['codice_carta']   !== '' ? $_POST['codice_carta']   : $existing['codice_carta'];
$cvv_carta      = $_POST['cvv_carta']      !== '' ? $_POST['cvv_carta']      : $existing['cvv_carta'];
$via            = $_POST['via']            !== '' ? $_POST['via']            : $existing['via'];
$citta          = $_POST['citta']          !== '' ? $_POST['citta']          : $existing['citta'];
$psw            = $_POST['psw']            !== '' ? $_POST['psw']            : $existing['psw'];
$stmt = $conn->prepare("
    UPDATE utenti SET 
        nome = ?, 
        cognome = ?, 
        telefono = ?, 
        mail = ?, 
        data_nascita = ?, 
        scadenza_carta = ?, 
        codice_carta = ?, 
        cvv_carta = ?, 
        via = ?, 
        citta = ?, 
        psw = ?
    WHERE user = ?
");

$stmt->bind_param(
    "ssssssssssss",
    $nome,
    $cognome,
    $telefono,
    $mail,
    $data_nascita,
    $scadenza_carta,
    $codice_carta,
    $cvv_carta,
    $via,
    $citta,
    $psw,
    $_SESSION["user"]
);
}
else{
$psw            = $_POST['psw']            !== '' ? $_POST['psw']            : $existing['psw'];
$stmt = $conn->prepare("
    UPDATE utenti SET 
        psw = ?
    WHERE user = ?
");

$stmt->bind_param(
    "ss",
    $psw,
    $_SESSION["user"]
);
}

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        header("Location: ../visualizza_dati.php?msg=OK");
    } else {
        header("Location: ../visualizza_dati.php?msg=NessunaModifica");
    }
} else {
    header("Location: ../visualizza_dati.php?msg=ErroreQuery");
}
?>
