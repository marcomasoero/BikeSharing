<?php
include_once("./header_riservata.php");
include_once("./menu.php");

if (!isset($_SESSION['login']) || ($_SESSION['tipo'] != "A")) {
    header("Location: ../templates/header_riservata.php");
    exit();
}
?>

<div>
    <form action="../php/aggiungi_tessera.php" method="POST">
        <label>N° tessera</label>
        <input type="text" id="n_tessera" name="n_tessera" required>
        <label>Nome Utente</label>
        <input type="text" id="nome_utente" name="nome_utente" required>
        <label>Cognome Utente</label>
        <input type="text" id="cognome_utente" name="cognome_utente" required>
        <label>Stazione</label>
        <?php
        require("../conf/db_config.php");
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
        <button type="submit">Aggiungi</button>
</form>
</div>