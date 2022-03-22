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
    include 'menu.php';

    if (!isset($_SESSION['email'])) {
        die("<h1 class = 'center'>Non puoi accedere!</h1>");
    }

    include "connection.php";
    //form per la modifica della password
    echo "
    <div class='mydiv'>
        <div>
            <h1 class = 'center'>Modifica Password</h1>
            <form id='myform' method='POST' action='passwordUpdateProcess.php'>

                <i class='fa fa-unlock-alt' style='font-size:14px;color:rgba(65, 65, 65, 1.0)'></i>
                <input type='password' class='no-outline' id='pass' name='pass' placeholder='Password' required><br>

                <i class='fa fa-unlock-alt' style='font-size:14px;color:rgba(65, 65, 65, 1.0)'></i>
                <input type='password' class='no-outline' id='confirm' name='confirm' placeholder='Conferma password' required><br>
                
                <p id='control' style='color:red'></p>

                <input type='submit' class='submit' value='Submit' onclick='pwd_check_update()'>

            </form>
        </div>
    </div>"
    ;
    include 'footer.php';
    ?>