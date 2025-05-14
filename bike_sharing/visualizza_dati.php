<?php
include_once("./templates/header_riservata.php");
?>

<?php
    include_once("./templates/menu.php");
?>

<div class="benvenuto" style="width: 100%;margin-left:50px">
    <h2>DATI UTENTE</h2>
    
    <?php

        require("./conf/db_config.php");

        $stmt = $conn->prepare("SELECT * FROM utenti WHERE id_utente = ?");
        $stmt->bind_param("i", $_SESSION['id_utente']);
        $stmt->execute();
        $result = $stmt->get_result();
        $utente = $result->fetch_assoc();
        $conn->close();
        
        echo "<div class='card-profilo' style='width: 18rem;'>
                <div class='card-body'>
                    <h5 class='card-title'> Dati profilo</h5>
                    <p class='card-text'> user: ".$utente["user"]."</p>
                    <p class='card-text'> Nome: ".$utente["nome"]."</p>
                    <p class='card-text'> Cognome: ".$utente["cognome"]."</p>
                    <p class='card-text'> telefono: ".$utente["telefono"]."</p>
                    <p class='card-text'> mail: ".$utente["mail"]."</p>
                    <p class='card-text'> telefono: ".$utente["telefono"]."</p>
                    <p class='card-text'> telefono: ".$utente["telefono"]."</p>
                    <p class='card-text'> data di nascita: ".$utente["data_nascita"]."</p>
                    <p class='card-text'> codice carta: ".$utente["codice_carta"]."</p>
                    <p class='card-text'> scadenza carta: ".$utente["scadenza_carta"]."</p>
                    <p class='card-text'> cvv carta: ".$utente["cvv_carta"]."</p>
                    <p class='card-text'> via: ".$utente["via"]."</p>
                    <p class='card-text'> città: ".$utente["citta"]."</p>
                    <p class='card-text'> tessera: ".$utente["tessera"]."</p>
                    <a href='modifica_dati_form.php' class='btn btn-primary'>Modifica dati</a>
                </div>
            </div>";
    ?>

</div>
<?php
include_once("./templates/footer.php");
?>