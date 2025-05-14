<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport">
    <title>Document</title>
    <link rel="stylesheet" href="/bike_sharing/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

    <header>
        <h1>BIKE-SHARING</h1>
        <div class="bottoni_header">
            <?php
                session_start();
                if (isset($_SESSION['login'])) {
                    echo "<input type='button' id='profilo' class='area_personale' value='area personale' onClick=\"location.href='./home_riservata.php'\">";
                }elseif (($_SERVER['PHP_SELF'] == '/bike_sharing/login.php') || ($_SERVER['PHP_SELF'] == '/bike_sharing/templates/registra_utente_form.php')){
                    echo "<input type='button' id='stazioni' class='stazioni' value='stazioni' onClick=\"location.href='../index.php'\">";
                }else{
                    echo "<input type='button' id='login' class='login' value='login' onClick=\"location.href='./login.php'\">";
                }
        
            ?>
        </div>
        
        
    </header>

<section>
