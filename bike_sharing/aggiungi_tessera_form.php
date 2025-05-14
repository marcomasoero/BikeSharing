<?php
include_once("./templates/header_riservata.php");
include_once("./templates/menu.php");
if (($_SESSION['tipo'] != 'A')) {
    header("Location: ./home_riservata.php");
    exit();
}

?>

<div>
    <form action="./php/aggiungi_tessera.php" method="POST">
        <label>N° tessera</label>
        <input type="text" id="n_tessera" name="n_tessera" required>
        <label>Nome Utente</label>
        <input type="text" id="nome_utente" name="nome_utente" required>
        <label>Cognome Utente</label>
        <input type="text" id="cognome_utente" name="cognome_utente" required>
        <button type="submit">Aggiungi</button>
</form>
</div>