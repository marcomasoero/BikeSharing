<?php
include_once("./header_riservata.php");
?>

<?php
    include_once("./menu.php");
?>

<div class="benvenuto" style="width: 100%;margin-left:50px">
    <h2>HOME</h2>
    <?php
    echo "<h3>Benvenut* ".$_SESSION['nome']." ".$_SESSION['cognome']."</h3>";
    ?>

</div>

<div id="central_home">
    <?php
        if($_SESSION["tipo"] == "A"){
            /*echo "<h3>UTENTI</h3>";*/
            require("../conf/db_config.php");
            $stmt = $conn->prepare("SELECT id_utente, nome, cognome, user, tessera, statoUtente FROM utenti WHERE tipo = 'U'");
            $stmt->execute();
            $result = $stmt->get_result();
            $utenti = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            echo "<div class='container_index'>";
            foreach($utenti as $utente){
                echo "<div class='card-body' style='width: 18rem;'>
                <h5 class='card-title'>".$utente["user"]."</h5>
                <p class='card-text'>".$utente["nome"]." ".$utente["cognome"]."</p>
                <p class='card-text'>".$utente["statoUtente"]."</p>
                <a href='./visualizza_utente.php?id_utente=".$utente["id_utente"]."' class='btn btn-primary'>Visualizza Utente</a>
                </div>";
            }
            echo "</div>";
        }elseif($_SESSION["tipo"] == "usr"){
            echo "";
        }
    ?>

</div>
    
<?php
include_once("./footer.php");
?>