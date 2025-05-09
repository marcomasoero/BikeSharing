<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

    <header>
        <h1>BIKE-SHARING</h1>
        <?php
            session_start();
            if (isset($_SESSION['login'])) {
                echo "<input type='button' id='profilo' name='profilo' value='profilo' onClick=\"location.href='./visualizza_profilo.php'\">";
                //modificare href con il path correto
            }elseif ($_SERVER['PHP_SELF'] == '/bike_sharing/templates/login.php'){
                echo "<input type='button' id='back' name='back' value='back' onClick=\"location.href='../index.php'\">";
            }else{
                echo "<input type='button' id='login' name='login' value='login' onClick=\"location.href='./templates/login.php'\">";
            }
        
        ?>
        
    </header>

<section>
