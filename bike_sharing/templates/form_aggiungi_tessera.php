<?php
session_start();
include_once("./header.php");
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
        <label>Id Utente</label>
        <label>Stazione</label>
        <input type="text" id="id_utente" name="id_utente" required>
        <?php
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
        <button type="submit">Cancella</button>
</form>
</div>