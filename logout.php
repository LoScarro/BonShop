<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Esci</title>
    <link rel="icon" type="image/x-icon" href="img/home/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script  src="script.js"></script>
</head>

<body>
    <?php
    include 'menu.php';
    if (!isset($_SESSION['email'])) {       //se l'utente non è loggato non ha senso che possa accedere
        die("<h1 class = 'center' > Non puoi accedere! </h1>");
    }
    echo "<h1 class = 'center'> Grazie per aver visitato Bonshop </h1>";
    include 'footer.php';
    unset($_SESSION['id']);
    $_SESSION = array();
    session_destroy();
    header("Refresh:2; url=index.php");
    ?>
