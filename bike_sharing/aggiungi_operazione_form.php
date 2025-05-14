<?php
include_once("./templates/header_riservata.php");
include_once("./templates/menu.php");

if (!isset($_SESSION['login']) || ($_SESSION['tipo'] != 'A')) {
    header("Location: ./templates/home_riservata.php");
    exit();
}
?>

<div id="central" style="width: 100%; text-align: center;">
    <form action="./php/aggiungi_operazione.php" method="POST">
        <p class="titolo_dark">Aggiungi operazione</p>
        <div style="margin-top: 20px" class="divlogin">
            <label>N° tessera</label>
            <input type="text" id="n_tessera" name="n_tessera" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <label>Tag bici</label>
            <input type="text" id="tag" name="tag" required>
        </div>
        <div style="margin-top: 20px" class="divlogin">
            <label>Stazione</label>
            <?php
            require("./conf/db_config.php");
                $stmt = $conn->prepare("SELECT id_stazione, nomeStazione FROM stazioni");
                $stmt->execute();
                $result = $stmt->get_result();
                $rows = $result->fetch_all(MYSQLI_ASSOC);

            
                echo "<select name='id_stazione' required>";
                foreach ($rows as $row) {
                    echo "<option value='".$row["id_stazione"]."'>".$row["nomeStazione"]."</option>";
                }
                echo "</select>";
                $conn->close();
            ?>
        </div>
        <div style="margin-top: 20px">
            <button type="submit" name="operazione" value="N">Noleggio</button>
            <button type="submit" name="operazione" value="R">Riconsegna</button>
        </div>
        <div style="margin-top: 20px">
            <?php if (isset($_GET['msg'])){
                        if ($_GET['msg']=='ERROR_UTENTE') echo "<p style=\"color: red\">ATTENZIONE! utente non presente o disattivato!</p>";
                        elseif ($_GET['msg']=='ERROR_BICI') echo "<p style=\"color: red\">ATTENZIONE! bicicletta non presente o in uso!</p>";
                        elseif ($_GET['msg']=='OK') echo "<p style=\"color: blue\">Operazione avvenuta con successo</p>";
                        elseif ($_GET['msg']=='ERRORE') echo "<p style=\"color: red\">ATTENZIONE! operazione non andata a buon fine!</p>";
                        elseif ($_GET['msg']=='STAZIONE_PIENA') echo "<p style=\"color: red\">ATTENZIONE! stazione piena!</p>";
                    }        
            ?>
        </div>
</form>
</div>