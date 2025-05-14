            <input type="text" id="cvv_carta" name="cvv_carta" pattern="[0-9]{3}" maxlength="3" placeholder="CVV">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="via" name="via" pattern=".{2,30}" placeholder="via">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="citta" name="citta" pattern="[A-Za-z\s]{2,30}" placeholder="città">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="user" name="user" pattern="[a-z]{2,20}" required placeholder="user per accesso">
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <input type="password" id="psw" name="psw" pattern=".{8,30}" placeholder="password">
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
<p>Pagina Precedente <a href="visualizza_dati.php">DATI</a></p>
</div>
<?php
include ("./templates/footer.php");
?>