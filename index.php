<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Home</title>
    <link rel="icon" type="image/x-icon" href="img/home/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <?php
    include "menu.php";
    ?>
    <div class="mydiv">

        <img id="image" src="img/home/home.jpg" alt="bonsai in fila">

        <div id="descrizione">
            <h1>Benvenuti su Bonshop</h1>
            <p>
                Siete sul primo sito in Italia come numero di vendite di bonsai.<br>
                La nostra direttiva è fornirvi un ottimo servizio con l'assicurazione di essere soddisfatti o rimborsati.<br>
                Tutti i nostri prodotti sono stati coltivati e curati dai migliori esperti in Italia.<br>
                Vi auguriamo un felice shopping.
            </p>
        </div>
        <div class="menu">

            <div id="interno" onclick="int()">
                <h1>Bonsai da interno</h1>
            </div>

            <div id="esterno" onclick="est()">
                <h1>Bonsai da esterno</h1>
            </div>

            <div id="guida" onclick="guid()">
                <h1>Guida</h1>
            </div>

        </div>
    </div>

    <?php
    include "footer.php";
    ?>
