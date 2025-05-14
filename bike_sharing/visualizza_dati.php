<?php
include_once("./templates/header_riservata.php");
?>

<?php
    include_once("./templates/menu.php");
?>

<div class="benvenuto" style="width: 100%;margin-left:50px">
    <h2>DATI UTENTE</h2>
    
    <?php
    //print_r($_GET);

    //STAMPO i dati che ricevo dall'URL creata in logincheck.php riga 20
    echo "<h3>Benvenut* ".$_SESSION['nome']." ".$_SESSION['cognome']."</h3>";
    require("./conf/db_config.php");

    if($_SESSION['tipo'] == "A"){
        $stmt = $conn->prepare("SELECT * FROM utenti");
    }else{
        $stmt = $conn->prepare("SELECT * FROM utenti WHERE nome = ?");
        $stmt->bind_param("s", $_SESSION['nome']);
    }
    //$stmt->bind_param    **** non ci sono parametri
    $stmt->execute();
    echo "</tbody></table>";

?>

<p>Vuoi vedere lo stato della tua tessera? <a href="visualizza_tessera.php">TESSERA</a></p>
</div>
<p>Vuoi modificare i tuoi dati personali? <a href="modifica_dati_form.php">MODIFICA</a></p>
</div>
<?php
include_once("./templates/footer.php");
?>