<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Ordine Effettuato</title>
    <link rel="icon" type="image/x-icon" href="img/home/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script  src="script.js"></script>
</head>

<body>
    <?php
    include "menu.php";
    if (!isset($_SESSION['email'])) {
        echo "<h1 class='center'> Per poter proseguire all'acquisto devi prima effettuare l'accesso</h1>";
        header("Refresh:2; url=cart.php");
    } else {
        if (!isset($_COOKIE['products'])) {
            echo "<h1 class = 'center'>Il carrello è vuoto</h1>";
            header("Refresh:2; url=cart.php");
        } else {
            echo "<h1 class='center'> Ordine effettuato, sarà  spedito il prima possibile.<br>
            Vorresti lasciare una recensione ai prodotti che hai acquistato?</h1>
            <div class='mydiv'>
                <div class='submit' onclick='valutazione()'>Si</div>
                <div class='submit' onclick='index()'>No</div>
            </div>
            <br>";
        }
    }
    include "footer.php";
    ?>

