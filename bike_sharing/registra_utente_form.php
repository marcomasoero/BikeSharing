<?php
include_once("./templates/header.php");
?>

<div id="central" style="width: 100%; text-align: center;">

    <form method="POST" action="./php/registra_utente.php" class="formlogin">
        <p class="titolo_dark">Inserisci i tuoi dati</p>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="nome" name="nome" pattern=".{2,30}" placeholder="nome" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="cognome" name="cognome" pattern=".{2,30}" placeholder="cognome"required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" required placeholder="Telefono Es: 0123456789">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="email" id="email" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="50" placeholder="email" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="date" id="data_nascita" name="data_nascita" placeholder="data di nascita" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="month" id="scadenza_carta" name="scadenza_carta" placeholder="scadenza carta" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="codice_carta" name="codice_carta" pattern="[0-9]{16}" maxlength="16" required placeholder="Numero cartaEs: 1234567812345678">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="cvv_carta" name="cvv_carta" pattern="[0-9]{3}" maxlength="3" placeholder="CVV" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="via" name="via" pattern=".{2,30}" placeholder="via" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="citta" name="citta" pattern="[A-Za-z\s]{2,30}" placeholder="città" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="user" name="user" pattern="[a-z]{2,20}" placeholder="user per accesso" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="password" id="psw" name="psw" pattern=".{8,30}" placeholder="password" required>
        </div>
        <div style="margin-top: 20px">
            <input type="submit" value="Registra" class="buttonform">
        </div>
        <div style="margin-top: 20px">
        <?php if (isset($_GET['msg'])){
                    if ($_GET['msg']=='KO') echo "<p style=\"color: red\">ATTENZIONE! operazione non andata a buon fine!</p>";
                    elseif ($_GET['msg']=='OK') echo "<p style=\"color: blue\">REGISTRATO! Operazione avvenuta con successo<br>ora puoi accedere al <a href=\"./index.php\">LOGIN</a></p>";
                  }        
          ?>
        </div>
    </form>
</div>

<?php
include ("./templates/footer.php");
?>
