<?php

include_once("./header_riservata.php");
include_once("./menu.php");
?>

<div id="central" style="width: 100%;margin-left:50px">
    <h2>HOME</h2>
    
<?php
    echo "<h3>Benvenut* ".$_SESSION['nome']." ".$_SESSION['cognome']."</h3>";

include_once("./footer.php");
?>
    