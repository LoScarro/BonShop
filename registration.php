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
    <script  src="script.js"></script>
</head>

<body>
    <?php
    include "menu.php";
    include "connection.php";
    //--------------controlli sull'input--------------//
    if (empty($_POST['firstname'])) {
        die("<h1 class = 'center'>Il campo \"Nome\" è vuoto!</h1>");
    }
    if (empty($_POST['lastname'])) {
        die("<h1 class = 'center'>Il campo \"Cognome\" è vuoto!</h1>");
    }
    if (empty($_POST['pass'])) {
        die("<h1 class = 'center'>Il campo \"Password\" è vuoto!</h1>");
    }
    if (empty($_POST['confirm'])) {
        die("<h1 class = 'center'>Il campo \"Conferma Password\" è vuoto!</h1>");
    }
    if (empty($_POST['email'])) {
        die("<h1 class = 'center'>Il campo \"Email\" è vuoto!</h1>");
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {      //controllo la validità della mail
        die("<h1 class = 'center'>La mail inserita non è valida</h1>");
    }
    if ($_POST['pass'] != $_POST['confirm']) {
        die("<h1 class='center'>Le password non coincidono</h1>");
    }
    if (strlen($_POST['pass']) < 6) {
        die("<h1 class='center'>La password non può essere minore di 6 caratteri</h1>");
    }
    //-----------------------------------------//
    
    //--------------pulizia input--------------//
    $fname = trim($_POST["firstname"]);
    $lname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $pass = trim($_POST["pass"]);
    $confirm = trim($_POST["confirm"]);
    //-----------------------------------------//
    
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($con, "INSERT INTO utenti (firstname,lastname,email,pass) VALUES (?, ?, ?, ?)");       //preparo lo statement
    mysqli_stmt_bind_param($stmt, 'ssss', $fname, $lname, $email, $pass);
    
    if (mysqli_stmt_execute($stmt)) {       //se la query ritorna true vuol dire che è andata a buon fine
        echo "<h1 class='center' >Benvenuto nel club " . htmlspecialchars($fname, ENT_QUOTES, 'UTF-8') . "</h1>";
        mysqli_stmt_close($stmt);       //chiudo lo statement
    } else {
        echo "<h1 class='center'>Impossibile portare a termine la registrazione: mail già presente</h1>";
        mysqli_stmt_close($stmt);       //chiudo lo statement
        header("Refresh:2; url=registrationForm.php");
    }
    header("Refresh:2; url=loginForm.php");
    include "footer.php";
    ?>
