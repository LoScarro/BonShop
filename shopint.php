<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Bonsai da Interno</title>
    <link rel="icon" type="image/x-icon" href="img/home/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="mydiv">
        <?php
        include "menu.php";
        include "connection.php";
        $select_query = "SELECT items.immagine as immagine,
                        items.nome as nome,
                        items.descrizione as descrizione,
                        items.prezzo as prezzo,
                        items.esposizione as esposizione,
                        AVG(valutazione.voto) as voto
                        FROM items LEFT OUTER JOIN valutazione ON items.nome = valutazione.nome
                        GROUP BY items.immagine, items.nome, items.descrizione, items.prezzo, items.esposizione
                        HAVING esposizione = 0";
        $res = mysqli_query($con, $select_query);
        include "products.php";
        ?>
    </div>
    <?php
    include "footer.php";
?>
