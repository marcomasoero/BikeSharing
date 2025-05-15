<?php
include_once("./templates/header.php");
?>

<?php
    include_once("./templates/menu.php");
?>

<div id="central" style="width: 100%; text-align: center;">
    <form method="POST" action="./php/aggiungi_bici.php" class="formlogin">
        <p class="titolo_dark">Inserisci i tuoi dati</p>
        <div style="margin-top: 20px" class="divlogin">
            <input type="text" id="tag" name="tag" pattern="TAG[0-9]{7}" placeholder="TAG bici ES:TAG0000000" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <?php
                include_once("./conf/db_config.php");
                $stmt = $conn->prepare("SELECT id_stazione, nomeStazione FROM stazioni");
                $stmt->execute();
                $result = $stmt->get_result();
                $stazioni = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close();
                echo "<select id='idStazione' name='idStazione'>";
                foreach($stazioni as $stazione){
                    echo "
                            <option value='".$stazione['id_stazione']."'>".$stazione['nomeStazione']."</option>";
                }
                echo "</select>";
            ?>
        </div>
        <div style="margin-top: 20px">
            <input type="submit" value="Crea" class="buttonform">
        </div>
        <div style="margin-top: 20px">
        <?php if (isset($_GET['msg'])){
                    if ($_GET['msg']=='KO') echo "<p style=\"color: red\">ATTENZIONE! operazione non andata a buon fine!</p>";
                    elseif ($_GET['msg']=='OK') echo "<p style=\"color: blue\">Operazione avvenuta con successo</p>";
                    elseif ($_GET['msg']=='BICI_PRESENTE') echo "<p style=\"color: red\">Bici già inserita</p>";
                    elseif ($_GET['msg']=='STAZIONE_PIENA') echo "<p style=\"color: red\">Stazione Piena</p>";
                  }        
          ?>
        </div>
    </form>
</div>

<?php
include ("./templates/footer.php");
?>