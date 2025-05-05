<?php
include_once("./header.php");
?>

<div id="central" style="width: 100%; text-align: center;">
    
    <p class="titolo_dark">Inserisci i tuoi dati</p>
    <form method="POST" action="../php/registra_utente.php">
        <div style="margin-top: 20px">
            <label for="nome">Nome</label><br>
            <input type="text" id="nome" name="nome" pattern=".{2,30}" required>
        </div>
        <div style="margin-top: 20px">
            <label for="cognome">Cognome</label><br>
            <input type="text" id="cognome" name="cognome" pattern=".{2,30}" required>
        </div>
        <div style="margin-top: 20px">
            <label for="telefono">Telefono</label><br>
            <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" required placeholder="Es: 0123456789">
        </div>
        <div style="margin-top: 20px">
            <label for="email">Email</label><br>
            <input type="email" id="email" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="50" required>
        </div>
        <div style="margin-top: 20px">
            <label for="data_nascita">Data di nascita</label><br>
            <input type="date" id="data_nascita" name="data_nascita" required>
        </div>
        <div style="margin-top: 20px">
            <label for="tessera">Numero tessera</label><br>
            <input type="text" id="tessera" name="tessera" pattern="[0-9]{10}" maxlength="10" required>
        </div>
        <div style="margin-top: 20px">
            <label for="scadenza_carta">Scadenza carta</label><br>
            <input type="month" id="scadenza_carta" name="scadenza_carta" required>
        </div>
        <div style="margin-top: 20px">
            <label for="codice_carta">Numero carta</label><br>
            <input type="text" id="codice_carta" name="codice_carta" pattern="[0-9]{16}" maxlength="16" required placeholder="Es: 1234567812345678">
        </div>
        <div style="margin-top: 20px">
            <label for="cvv_carta">CVV</label><br>
            <input type="text" id="cvv_carta" name="cvv_carta" pattern="[0-9]{3}" maxlength="3" required>
        </div>
        <div style="margin-top: 20px">
            <label for="via">Via</label><br>
            <input type="text" id="via" name="via" pattern=".{2,30}" required>
        </div>
        <div style="margin-top: 20px">
            <label for="citta">Città</label><br>
            <input type="text" id="citta" name="citta" pattern="[A-Za-z\s]{2,30}" required>
        </div>
        <div style="margin-top: 20px">
            <label for="user">User per accesso</label><br>
            <input type="text" id="user" name="user" pattern="[a-z]{2,20}" required>
        </div>
        <div style="margin-top: 20px">
            <label for="psw">Password</label><br>
            <input type="password" id="psw" name="psw" pattern=".{8,30}" required>
        </div>
        <div style="margin-top: 20px">
            <input type="submit" value="Registra" class="buttonform">
        </div>
        <div style="margin-top: 20px">
        <?php if (isset($_GET['msg'])){
                    if ($_GET['msg']=='KO') echo "<p style=\"color: red\">ATTENZIONE! operazione non andata a buon fine!</p>";
                    elseif ($_GET['msg']=='OK') echo "<p style=\"color: blue\">REGISTRATO! Operazione avvenuta con successo<br>ora puoi accedere al <a href=\"../index.php\">LOGIN</a></p>";
                  }        
          ?>
        </div>
    </form>
</div>

<?php
include ("./footer.php");
?>
