<?php
session_start();
if (!isset($_SESSION['login']))
   header("location: ./index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport">
    <title>Area Riservata Bikesharing</title>
    <link rel="stylesheet" href="/bike_sharing/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    
</head>
<body>
    <header>
        <h1>Area Riservata Bikesharing</h1>    
        <!--<div id="header_top">
            <div class="titolo_bianco">Area Riservata Bikesharing</div>
            <div class="bottoni_header">
                <input type='button' id='stazioni' class='stazioni' value='stazioni' onClick="location.href='../index.php'">
            </div>
        </div>-->

        <!--<div id="header_down">
            <?php
                if (isset($_SESSION['login'])){
                    echo "Area riservata Bikesharing: <b>".$_SESSION['nome']." ".$_SESSION['cognome'];
                }
            ?>
        </div>-->
    </header>
<section>