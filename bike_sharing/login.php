<?php
session_start();
session_unset();
session_destroy();

include_once("./templates/header.php");
?>

<div id="central">
    <form action="./php/login_check.php" method="POST" class="formlogin">
      
       <p class="titolo_dark">Accedi al tuo account<p>
    
        <div class="divlogin">
            <!--<label for="Utente">Utente</label><br>-->
            <input type="text" id="user" name="user" placeholder="inserisci username" required>
        </div>
        <div class="divlogin">
            <!--<label for="psw">Password</label><br>-->
            <input type="password" id="psw" name="psw" placeholder="inserisci password" required>
        </div>
        <div>
          <input type="submit" id="registra" value="accedi" class="buttonform">
        </div>
        <div class="divlogin">

        <p class="signup-link">Non hai il tuo account? <a href="./registra_utente_form.php">Registrati</a></p>
        <p class="signup-link"><a href="./index.php">HOME</a></p> 
          
          <?php 
          if (isset($_GET['msg'])){
                    if ($_GET['msg']=='ERR_ACCESSO') echo "<p style=\"color: red\">Dati di accesso errati</p>";
                  }        
          ?>
        </div>
    </form>
</div>

<?php
include_once("./templates/footer.php");
?>


