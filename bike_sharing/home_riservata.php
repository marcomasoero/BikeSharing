<?php
include_once("./templates/header_riservata.php");
include_once("./templates/menu.php");
?>

<div class="benvenuto" style="width: 100%;margin-left:50px">
    <h2>HOME</h2>
    <?php
    echo "<h3>Benvenut* ".$_SESSION['nome']." ".$_SESSION['cognome']."</h3>";
    ?>

<div>

<div class="central">

    <h2>OPERAZIONI</h2>
        
    <?php
    require("./conf/db_config.php");

    if($_SESSION['tipo'] == "A"){
        $stmt = $conn->prepare("SELECT b.tag, u.nome, u.cognome, o.data_ora, o.tipo, s.nomeStazione
        FROM biciclette b, operazioni o, stazioni s, utenti u
        WHERE o.id_bici = b.id_bici
        AND o.id_stazione = s.id_stazione
        AND o.id_utente = u.id_utente");
    }else{
        $stmt = $conn->prepare("SELECT b.tag, u.nome, u.cognome, o.data_ora, o.tipo, s.nomeStazione
        FROM biciclette b, operazioni o, stazioni s, utenti u
        WHERE o.id_bici = b.id_bici
        AND o.id_stazione = s.id_stazione
        AND o.id_utente = u.id_utente
        AND u.nome = ?");
        $stmt->bind_param("s", $_SESSION['nome']);
    }
    //$stmt->bind_param    **** non ci sono parametri
    $stmt->execute();
    
    //estrazione multi-riga
	$result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    //************************************************************
    //****************STAMPO IL RISULTATO DELLA QUERY (MULTIRIGHE)
	echo "<table class=\"table\">
    <tr>
    <td><b>data_ora</td>
    <td><b>nome</td>
    <td><b>cognome</td>
    <td><b>tipo</td>
    <td><b>nomeStazione</td>
    </tr><tbody>";

    //ciclo FOREACH che scorre tutte le righe del risultato delle query
    foreach($rows as $row){
        $date = date_create($row['data_ora']);
        echo "<tr>
            <td>".date_format($date,'d-m-Y')."</td>
            <td>".$row['nome']."</td>
            <td>".$row['cognome']."</td>
            <td>".$row['tipo']."</td>
            <td>".$row['nomeStazione']."</td>
            </tr>";
    }
    echo "</tbody></table>";

?>

</div>
<?php
include_once("./templates/footer.php");
?>