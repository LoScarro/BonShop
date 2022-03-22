<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Carrello</title>
    <link rel="icon" type="image/x-icon" href="img/home/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <?php
    include "menu.php";
    echo '<div class="mydiv">';
    
    if (empty($_GET['ricerca'])) {      //controllo se il campo è vuoto
        echo "<h1 class ='center'>Il campo di Ricerca è vuoto!</h1>";
        header("Refresh:2; url=index.php");
    } else {
        include "connection.php";

        $search = trim($_GET["ricerca"]);

        $stmt = mysqli_prepare($con, "SELECT items.immagine as immagine,
                    items.nome as nome,
                    items.descrizione as descrizione,
                    items.prezzo as prezzo,
                    items.esposizione as esposizione,
                    AVG(valutazione.voto) as voto
                    FROM items LEFT OUTER JOIN valutazione ON items.nome = valutazione.nome
                    GROUP BY items.immagine, items.nome, items.descrizione, items.prezzo, items.esposizione
                    HAVING nome LIKE ?");
        $search = '%'.$search.'%';      //concateno per usare la wildcard %
        mysqli_stmt_bind_param($stmt, 's', $search);

        if (!mysqli_stmt_execute($stmt)) {       //se la query ritorna false vuol dire che non è andata a buon fine
            die("<h1 class = 'center'> Errore, riprova più tardi</h1>");
        }

        $res = mysqli_stmt_get_result($stmt);

        include "products.php";
    }
    mysqli_close($con);

    echo '</div>';

    include "footer.php";
    ?>
