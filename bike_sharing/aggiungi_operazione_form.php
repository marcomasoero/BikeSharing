<?php
include_once("./templates/header_riservata.php");
include_once("./templates/menu.php");

if (!isset($_SESSION['login']) || ($_SESSION['tipo'] != 'A')) {
    header("Location: ./templates/home_riservata.php");
    exit();
}
?>

<div>
    <form action="./php/aggiungi_operazione.php" method="POST">
        <label>N° tessera</label>
        <input type="text" id="n_tessera" name="n_tessera" required>
        <label>Tag bici</label>
        <input type="text" id="tag" name="tag" required>
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
        <button type="submit" name="operazione" value="N">Noleggio</button>
        <button type="submit" name="operazione" value="R">Riconsegna</button>
</form>
</div>