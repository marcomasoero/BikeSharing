<?php
session_start();
require("../conf/db_config.php");

$stmt = $conn->prepare("SELECT id_utente FROM utenti WHERE user = ? AND id_utente != ?");
$stmt->bind_param("si", $_POST['user'], $_SESSION['id_utente']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$conn->close();
if($user){
    header("Location: ../modifica_dati_form.php?msg=USER_PRESENTE");
}

require("../conf/db_config.php");

$stmt = $conn->prepare("SELECT * FROM utenti WHERE id_utente = ?");
$stmt->bind_param("i", $_SESSION['id_utente']);
$stmt->execute();
$result = $stmt->get_result();
$utente = $result->fetch_assoc();
$conn->close();

print_r($utente["user"]);

if($_POST["nome"] == NULL){
    $nome = $utente["nome"];
}else{
    $nome = $_POST["nome"];
}
if($_POST["cognome"] == NULL){
    $cognome = $utente["cognome"];
}else{
    $cognome = $_POST["cognome"];
}
if($_POST["telefono"] == NULL){
    $telefono = $utente["telefono"];
}else{
    $telefono = $_POST["telefono"];
}
if($_POST["mail"] == NULL){
    $mail = $utente["mail"];
}else{
    $mail = $_POST["mail"];
}
if($_POST["data_nascita"] == NULL){
    $data_nascita = $utente["data_nascita"];
}else{
    $data_nascita = $_POST["data_nascita"];
}
if($_POST["scadenza_carta"] == NULL){
    $scadenza_carta = $utente["scadenza_carta"];
}else{
    $scadenza_carta = $_POST["scadenza_carta"];
}
if($_POST["codice_carta"] == NULL){
    $codice_carta = $utente["codice_carta"];
}else{
    $codice_carta = $_POST["codice_carta"];
}
if($_POST["cvv_carta"] == NULL){
    $cvv_carta = $utente["cvv_carta"];
}else{
    $cvv_carta = $_POST["cvv_carta"];
}
if($_POST["via"] == NULL){
    $via = $utente["via"];
}else{
    $via = $_POST["via"];
}
if($_POST["citta"] == NULL){
    $citta = $utente["citta"];
}else{
    $citta = $_POST["citta"];
}
if($_POST["user"] == NULL){
    $user = $utente["user"];
}else{
    $user = $_POST["user"];
}
if($_POST["psw"] == NULL){
    $psw = $utente["psw"];
}else{
    $psw = $_POST["psw"];
}

require("../conf/db_config.php");

$stmt = $conn->prepare("UPDATE utenti SET nome = ?, cognome = ?, telefono = ?, mail = ?, data_nascita = ?, scadenza_carta = ?, codice_carta = ?, cvv_carta = ?, via = ?, citta = ?, user = ?, psw = ? WHERE id_utente = ?");

$stmt->bind_param(
    "ssssssssssssi",
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
    $user,
    $psw,
    $_SESSION['id_utente']   
);

if ($stmt->execute()) {
    header("Location: ../visualizza_dati.php?msg=OK");
} else {
    header("Location: ../visualizza_dati.php?msg=KO");
}
?>