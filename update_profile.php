<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Modifica Profilo</title>
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

    if ($_POST['firstname'] == "" || $_POST['lastname'] == "" || $_POST['email'] == "") {
        die("<h1>I campi da aggiornare non possono essere vuoti</h1>");
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("<h1 class = 'center'>La mail inserita non è valida</h1>");
    }
    //--------------pulizia input--------------//
    $fname = trim($_POST["firstname"]);
    $lname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $tel = trim($_POST["tel"]);
    $ind = trim($_POST["ind"]);
    //----------------------------------------//
    include "connection.php";
    $stmt = mysqli_prepare($con, "UPDATE utenti SET firstname=?, lastname=?, email=?, telefono=?, indirizzo=? WHERE email=?");       //preparo lo statement
    mysqli_stmt_bind_param($stmt, 'ssssss', $fname, $lname, $email, $tel, $ind, $_SESSION['email']);

    if (mysqli_stmt_execute($stmt)) { //se l'update è andato a buon fine
        echo "<h1 class='center'> Cambiamenti effettuati</h1>";
        $_SESSION['email'] = $_POST['email'];       //bisogna aggiornare la variabile di sessione per evitare inconsistenze
        mysqli_stmt_close($stmt);       //chiudo lo statement
        header("Refresh:2; url=show_profile.php");
    } else {        //se l'update è andato a buon fine (probabilmente è perchè si cerca di mettere una mail già presente nel db)
        echo "<h1 class='center'> Impossibile effettuare i cambiamenti </h1>";
        mysqli_stmt_close($stmt);       //chiudo lo statement
        header("Refresh:2; url=show_profile.php");
    }
    include "footer.php";
    ?>
