<?php
session_start();
session_unset();
session_destroy();

include_once("./header.php");
//require_once ("./conf/db_config.php");
?>

<div id="central" style="width: 100%;">
    <form action="../php/login_check.php" method="POST"  style="text-align: center;">
      
       <p class="titolo_dark">ACCEDI ALLA TUA AREA PERSONALE<p>
    
        <div class="formlogin">
            <label for="Utente">Utente</label><br>
            <input type="text" id="user" name="user" placeholder="inserisci utente" required>
        </div>
        <div class="formlogin">
            <label for="psw">Password</label><br>
            <input type="password" id="psw" name="psw" placeholder="inserisci password" required>
        </div>
        <div class="formlogin">
          <input type="submit" id="registra" value="accedi" class="buttonform">
        </div>
        <div class="formlogin">

        <p>Non hai il tuo account? <a href="registra_utente_form.php">Registrati</a></p> 
          
          <?php 

          if (isset($_GET['msg'])){
                    if ($_GET['msg']=='ERR_ACCESSO') echo "<p style=\"color: red\">Dati di accesso errati</p>";
                  }        
          ?>
        </div>
    </form>
</div>

<?php
include_once("./footer.php");
?>


