<?php
    require("./templates/header.php")

?>
<div>

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
                <p class='card-text'>".$stazione["citta"].", ".$stazione["via"]."</p>
                <p class='card-text'> Numero bici: ".$nBici."</p>
                <a href=\"'$url_googlemaps'\" class='btn btn-primary'>Vai alla stazione</a>
            </div>
            </div>";
        }

        
        
    ?>

</div>



<?php
    require("./templates/footer.php")

?>