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

    $stmt = $conn->prepare("SELECT * FROM utenti WHERE nome = ?");
    $stmt->bind_param("s", $_SESSION['nome']);
    //$stmt->bind_param    **** non ci sono parametri
    $stmt->execute();
    
    //estrazione multi-riga
	$result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    //************************************************************
    //****************STAMPO IL RISULTATO DELLA QUERY (MULTIRIGHE)
	echo "<table class=\"table\">
    <tr>
    <td><b>data_nascita</td>
    <td><b>nome</td>
    <td><b>cognome</td>
    <td><b>telefono</td>
    <td><b>mail</td>
    </tr><tbody>";

    //ciclo FOREACH che scorre tutte le righe del risultato delle query
    foreach($rows as $row){
        $date = date_create($row['data_nascita']);
        echo "<tr>
            <td>".date_format($date,'d-m-Y')."</td>
            <td>".$row['nome']."</td>
            <td>".$row['cognome']."</td>
            <td>".$row['telefono']."</td>
            <td>".$row['mail']."</td>
            </tr>";
    }
    echo "</tbody></table>";

?>

<?php
include_once("./templates/footer.php");
?>