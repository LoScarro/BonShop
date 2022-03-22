<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Accedi</title>
    <link rel="icon" type="image/x-icon" href="img/home/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <?php
    include "menu.php";

    if (empty($_POST['pass'])) {
        die("<h1 class = 'center'>Il campo Password è vuoto </h1>");
    }

    if (empty($_POST['email'])) {
        die("<h1 class = 'center'>Il campo Email è vuoto </h1>");
    }

    include "connection.php";

    //--------------pulizia input--------------//
    $email = trim($_POST["email"]);
    $pass = trim($_POST["pass"]);
    //-----------------------------------------//

    $stmt = mysqli_prepare($con, "SELECT * FROM utenti WHERE email=?");       //preparo lo statement
    mysqli_stmt_bind_param($stmt, 's', $email);

    if (!mysqli_stmt_execute($stmt)) {       //se la query ritorna false vuol dire che non è andata a buon fine
        die("<h1 class = 'center'> Errore, riprova più tardi</h1>");
    }

    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);

    if ($row!=array() && password_verify($pass, $row["pass"])) {        //controllo che la query non mi abbia restituito un array vuoto (nessun utente registrato con quella mail) e che la password sia giusta
        $_SESSION['email'] = $row['email'];     //salvo nelle variabili di sessione i valori che mi potrebbero servire in futuro per evitare di rifare una query al DB
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['id'] = session_id();
        
        echo "<h1 class = 'center'> Benvenuto " . htmlspecialchars($row['firstname'], ENT_QUOTES, 'UTF-8') . "</h1>";
        mysqli_stmt_close($stmt);       //chiudo lo statement
        header("Refresh:2; url=index.php");

    } else {
        echo "<h1 class = 'center'> Utente o password errati </h1>";
        mysqli_stmt_close($stmt);       //chiudo lo statement
        header("Refresh:2; url=loginForm.php");

    }
    include "footer.php";
    ?>
