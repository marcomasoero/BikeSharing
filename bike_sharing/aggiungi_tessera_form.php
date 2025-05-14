<?php
include_once("./templates/header_riservata.php");
include_once("./templates/menu.php");
if (($_SESSION['tipo'] != 'A')) {
header("Location: ./home_riservata.php");
exit();
}

?>

<div id="central" style="width: 100%; text-align: center;">

<form action="./php/aggiungi_tessera.php" method="POST">
    <p class="titolo_dark">Aggiungi tessera</p>
    <div style="margin-top: 20px" class="divlogin">
        <label>N° tessera</label>
        <input type="text" id="n_tessera" name="n_tessera" required>
    </div>
    <div style="margin-top: 20px" class="divlogin">
        <label>Nome Utente</label>
        <input type="text" id="nome_utente" name="nome_utente" required>
    </div>
    <div style="margin-top: 20px" class="divlogin">
        <label>Cognome Utente</label>
        <input type="text" id="cognome_utente" name="cognome_utente" required>
    </div>
    <div style="margin-top: 20px">
        <button type="submit" class="buttonform">Aggiungi</button>
    </div>
    <div style="margin-top: 20px">
            <?php if (isset($_GET['msg'])){
                    if ($_GET['msg']=='NO_UTENTE') echo "<p style=\"color: red\">ATTENZIONE! operazione non andata a buon fine!</p>";
                    elseif ($_GET['msg']=='OK') echo "<p style=\"color: blue\">Operazione avvenuta con successo</p>";
                }        
        ?>
    </div>
</form>
</div>