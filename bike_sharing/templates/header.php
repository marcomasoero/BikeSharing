<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <header>
        <h1>BIKE-SHARING</h1>
        <?php
            session_start();
            if (isset($_SESSION['login'])) {
                echo "<input type='button' id='profilo' name='profilo' value='profilo' onClick=\"location.href='./visualizza_profilo.php'\">";
                //modificare href con il path correto
            }else{
                echo "<input type='button' id='login' name='login' value='login' onClick=\"location.href='./templates/login.php'\">";
            }
        
        ?>
        
    </header>

<section>
