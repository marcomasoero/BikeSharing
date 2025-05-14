<?php
include_once("./templates/header.php");
?>

<?php
    include_once("./templates/menu.php");
?>

<div id="central" style="width: 100%; text-align: center;">

    <?php
        require("./conf/db_config.php");

        $stmt = $conn->prepare("SELECT * FROM utenti WHERE id_utente = ?");
        $stmt->bind_param("i", $_SESSION['id_utente']);
        $stmt->execute();
        $result = $stmt->get_result();
        $utente = $result->fetch_assoc();
        $conn->close();
    ?>

    <form method="POST" action="./php/modifica_dati.php" class="formlogin">
        <p class="titolo_dark">Inserisci i tuoi dati</p>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="nome" name="nome" pattern=".{2,30}" placeholder="nome: <?php echo $utente['nome']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="cognome" name="cognome" pattern=".{2,30}" placeholder="cognome: <?php echo $utente['cognome']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" placeholder="Telefono Es: 0123456789">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="email" id="email" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="50" placeholder="email: <?php echo $utente['mail']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="date" id="data_nascita" name="data_nascita" placeholder="data di nascita: <?php echo $utente['data_nascita']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="month" id="scadenza_carta" name="scadenza_carta" placeholder="scadenza carta: <?php echo $utente['scadenza_carta']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="codice_carta" name="codice_carta" pattern="[0-9]{16}" maxlength="16" placeholder="Numero carta: <?php echo $utente['codice_carta']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="cvv_carta" name="cvv_carta" pattern="[0-9]{3}" maxlength="3" placeholder="CVV: <?php echo $utente['cvv_carta']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="via" name="via" pattern=".{2,30}" placeholder="via: <?php echo $utente['via']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="citta" name="citta" pattern="[A-Za-z\s]{2,30}" placeholder="città: <?php echo $utente['citta']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="user" name="user" pattern="[a-z]{2,20}" placeholder="user per accesso: <?php echo $utente['user']; ?>">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="password" id="psw" name="psw" pattern=".{8,30}" placeholder="password: <?php echo $utente['psw']; ?>">
        </div>
        <div style="margin-top: 20px">
            <input type="submit" value="Modifica dati" class="buttonform">
        </div>
        <div style="margin-top: 20px">
        <?php if (isset($_GET['msg'])){
                    if ($_GET['msg']=='KO') echo "<p style=\"color: red\">ATTENZIONE! operazione non andata a buon fine!</p>";
                    elseif ($_GET['msg']=='OK') echo "<p style=\"color: blue\">Operazione avvenuta con successo</p>";
                  }        
          ?>
        </div>
    </form>
</div>
<p>Pagina Precedente <a href="visualizza_dati.php">DATI</a></p>
</div>
<?php
include ("./templates/footer.php");
?>