<?php
session_start()
include_once("./templates/header_riservata.php");
include_once("./templates/menu.php");
if
?>

<div class="benvenuto" style="width: 100%;margin-left:50px">
    <h2>HOME</h2>
    <?php
    echo "<h3>Benvenut* ".$_SESSION['nome']." ".$_SESSION['cognome']."</h3>";
    ?>

<div>

<div class="central">

</div>
<p>Vuoi visualizzare le tue corse?<a href="visualizza_corse.php">CORSE</a></p>
</div>
<?php
include_once("./templates/footer.php");
?>