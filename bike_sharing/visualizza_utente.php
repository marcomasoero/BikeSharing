<?php
include_once("./templates/header_riservata.php");
include_once("./templates/menu.php");


if (($_SESSION['tipo'] != 'A')) {
    header("Location: ../templates/header_riservata.php");
    exit();
}

    require("./conf/db_config.php");
    $stmt = $conn->prepare("SELECT * FROM utenti WHERE id_utente = ?");
    $stmt->bind_param("i", $_GET["id_utente"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $utente = $result->fetch_assoc();

    $stmt = $conn->prepare("SELECT * FROM operazioni WHERE id_utente = ?");
    $stmt->bind_param("i", $_GET["id_utente"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $operazioni = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
?>

<div id="central" style="width: 100%; text-align: center;">
   <div class="container_dati_utente">
        <div class="card-body">
            <h5 class='card-title'><?php echo "user: ".$utente['user'].""?></h5>
            <p class='card-text'> Nome: <?php echo $utente["nome"]?></p>
            <p class='card-text'> Cognome: <?php echo $utente["cognome"]?></p>
            <p class='card-text'> Tessera: <?php echo $utente["tessera"]?></p>
            <p class='card-text'> Stato: <?php if ($utente["statoUtente"] == "A"){echo "Attivo";}else{echo "Disattivo";}?></p>
            <?php echo "<form action='../php/cambia_stato_utente.php?id_utente=".$_GET['id_utente']."' method='POST'>";?>
                <select id="statoUtente" name="statoUtente">
                    <option value="A">Attivo</option>
                    <option value="D">Disattivo</option>
                </select>
                <button type="a" class='btn btn-primary'>Cambia Stato</a>
            </form>
        </div>
    </div>
    <div class="container_operazioni">
        
        <?php
            if($operazioni != null){
                foreach($operazioni as $operazione){
                    echo "<div class='card' style='width: 18rem;'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Operazione</h5>";
                            echo "<p class='card-text'> Operazione: ".$operazione["tipo"]."</p>";
                            echo "<p class='card-text'> Data: ".$operazione["data_ora"]."</p>";
                            echo "<p class='card-text'> ID Bici: ".$operazione["id_bici"]."</p>";
                            echo "<p class='card-text'> ID Stazione: ".$operazione["id_stazione"]."</p>";
                        echo "</div>";
                    echo "</div>";
                }
            }else{
                echo "<div class='card-body'>";
                echo "<p class='card-text'> Non sono state effettuate operazioni</p>";
                echo "</div>";
            }
        ?>
    </div>
</div>
<?php
include_once("./templates/footer.php");
?>