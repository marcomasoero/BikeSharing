<?php
include_once("./templates/header.php");
?>

<?php
include_once("./templates/menu.php");
?>

<div id="central" style="width: 100%; text-align: center;">
    <form method="POST" action="./php/crea_stazione.php" class="formlogin">
        <p class="titolo_dark">Inserisci i tuoi dati</p>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="nomeStazione" name="nomeStazione" pattern=".{2,20}" placeholder="nome stazione" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="via" name="via" pattern=".{3,30}" placeholder="via"required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="citta" name="citta" pattern=".{3,30}" required placeholder="città">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="latitudine" name="latitudine" pattern="[0-9]{0,2}+\.[0-9]{0,8}" placeholder="latitudine" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="longitudine" name="longitudine" pattern="[0-9]{0,2}+\.[0-9]{0,8}" placeholder="longitudine" required>
        </div>
        <div style="margin-top: 20px">
            <input type="submit" value="Crea" class="buttonform">
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