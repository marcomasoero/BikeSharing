<?php
session_start();
if (!isset($_SESSION['login']))
   header("location: ./index.php");
include_once("./menu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport">
    <title>Area Riservata Bikesharing</title>
    <link rel="stylesheet" href="./css/style.css">
    
</head>
<body>
<header>    
    <div id="header_top">
        <div class="titolo_bianco">Area Riservata Bikesharing</div>
    </div>
    <div id="header_down">
        <?php
            if (isset($_SESSION['login'])){
                echo "Area riservata Bikesharing: <b>".$_SESSION['nome']." ".$_SESSION['cognome'];
            }
        ?>
    </div>
</header>
<section>