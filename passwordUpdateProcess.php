<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Modifica Password</title>
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

    //-----------------controlli sull'input-----------------//
    if ($_POST['pass'] != $_POST['confirm']) {
        die("<h1 class='center'>Le password non coincidono</h1>");
    }

    if (strlen($_POST['pass']) < 6) {
        die("<h1 class='center'>La password non può essere minore di 6 caratteri</h1>");
    }
    //------------------------------------------------------//
    include "connection.php";

    $pass = trim($_POST["pass"]);
    $pass = password_hash($pass, PASSWORD_DEFAULT);     //hashing password

    $stmt = mysqli_prepare($con, "UPDATE utenti SET pass=? WHERE email=?");       //preparo lo statement
    mysqli_stmt_bind_param($stmt, 'ss', $pass, $_SESSION['email']);

    if (mysqli_stmt_execute($stmt)) {       //se l'update è andato a buon fine ritorna true
        echo "<h1 class='center'>Cambiamenti effettuati</h1>";
        mysqli_stmt_close($stmt);       //chiudo lo statement
        header("Refresh:2; url=show_profile.php");
    } else {
        echo "<h1 class='center'>Impossibile effettuare i cambiamenti</h1>";
        mysqli_stmt_close($stmt);       //chiudo lo statement
        header("Refresh:2; url=passwordUpdate.php");
    }
    include "footer.php";
    ?>