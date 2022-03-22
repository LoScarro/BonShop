<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Valutazione Prodotti</title>
    <link rel="icon" type="image/x-icon" href="img/home/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script  src="script.js"></script>
</head>

<body>
    <?php
    include "menu.php";
    if (!isset($_SESSION['email'])) {
        die("<h1 class = 'center'>Non puoi accedere!</h1>");
    }
    include "connection.php";
    if (isset($_COOKIE['toEval'])) {
        $pieces = $_COOKIE['toEval'];
        $elem = explode("|", $pieces);

        $stmt = mysqli_prepare($con, "INSERT INTO valutazione (nome,voto) VALUES (?, ?)");       //preparo lo statement
        mysqli_stmt_bind_param($stmt, 'ss', $elem[0], $elem[1]);
    
        if (mysqli_stmt_execute($stmt)) {       //se la query ritorna true vuol dire che è andata a buon fine
            echo "<h1 class='center' >Valutazione inviata</h1>";
            mysqli_stmt_close($stmt);       //chiudo lo statement
        } else {
            echo "<h1 class='center'>Impossibile aggiungere la valutazione</h1>";
            mysqli_stmt_close($stmt);       //chiudo lo statement
            header("Refresh:2; url=valutation.php");
        }

        setcookie("toEval", "", time() - 3600);     //facciamo scadere il cookie
        if (isset($_COOKIE['products'])) {
            header("Refresh:2; url=valutation.php");
        } else {
            header("Refresh:2; url=index.php");
        }
    }
    include "footer.php";
    ?>