<?php
    include_once("./templates/header.php")

?>
<div class="container_index">

    <?php
        require("./conf/db_config.php");

        $stmt = $conn->prepare("SELECT * FROM stazioni");
        $stmt->execute();
        $result = $stmt->get_result();
        $stazioni = $result->fetch_all(MYSQLI_ASSOC);

        $stmt = $conn->prepare("SELECT stazioni.nomeStazione, COUNT(*) AS nBici FROM stazioni, biciclette WHERE stazioni.id_stazione = biciclette.idStazione GROUP BY stazioni.nomeStazione, stazioni.id_stazione");
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();
        
        foreach($stazioni as $stazione){
            $nBici = 0;
            $nSlot = 50;
            foreach($rows as $row){
                if($row["nomeStazione"] == $stazione["nomeStazione"]){                                
                    $nBici = $row["nBici"];
                    break;
                }
            }
            $url_googlemaps = "https://www.google.com/maps?q=".$stazione["latitudine"].",".$stazione["longitudine"]."";
            
            echo "<div class='card' style='width: 18rem;'>
            <div class='card-body'>
                <h5 class='card-title'>".$stazione["nomeStazione"]."</h5>
                <p class='card-text'>".$stazione["via"].", ".$stazione["citta"]."</p>
                <p class='card-text'> Bici disponibili: ".$nBici."</p>
                <p class='card-text'> Slot liberi: ".($nSlot-$nBici)."</p>
                <a href='$url_googlemaps' target='_blank' class='btn btn-primary'>Mostra su maps</a>
            </div>
            </div>";
        }
    ?>

</div>

<?php
    include_once("./templates/footer.php")

?>