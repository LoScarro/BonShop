<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonshop: Registrazione</title>
    <link rel="icon" type="image/x-icon" href="img/home/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script  src="script.js"></script>
</head>

<body>
    <?php
    include 'menu.php'
    ?>

    <div class="mydiv">
        <div>

            <h1 class = "center">Registrati</h1>
            <form id="myform" method="POST" name="registrazione" action="registration.php">

                <i class="fa fa-user" style="font-size:13px;color:rgba(65, 65, 65, 1.0)"></i>
                <input type="text" class="inputHover" name="firstname" id="firstname" placeholder="Nome" required><br>

                <i class="fa fa-user" style="font-size:13px;color:rgba(65, 65, 65, 1.0)"></i>
                <input type="text" class="inputHover" name="lastname" id="lastname" placeholder="Cognome" required><br>

                <i class="fa fa-envelope" style="font-size:9px;color:rgba(65, 65, 65, 1.0)"></i>
                <input type="email" class="inputHover" name="email" id="email" placeholder="E-mail" onchange="verifica()" required><br>

                <i class="fa fa-unlock-alt" style="font-size:14px;color:rgba(65, 65, 65, 1.0)"></i>
                <input type="password" class="inputHover" name="pass" id="pass" placeholder="Password" required><br>

                <i class="fa fa-unlock-alt" style="font-size:14px;color:rgba(65, 65, 65, 1.0)"></i>
                <input type="password" class="inputHover" name="confirm" id="confirm" placeholder="Conferma password" required><br>
                <p id="control" style="color:red"></p>
                <p id="emailControl" style="color:red"></p>
                <input type="button" id="BNEsubmit" name="BNEsubmit" class="submit" value="Invia" onclick="controllo()">

            </form>
        </div>
    </div>

    <?php
    include 'footer.php'
    ?>
