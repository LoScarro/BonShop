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
    include 'menu.php';

    if (!isset($_SESSION['email'])) {
        die("<h1 class = 'center'>Non puoi accedere!</h1>");
    }

    include "connection.php";

    $select_query = "SELECT * FROM utenti WHERE email='" . $_SESSION['email'] . "'";
    $result = mysqli_query($con, $select_query);

    $res = mysqli_fetch_assoc($result);

    $firstname = $res['firstname'];
    $lastname = $res['lastname'];
    $email = $res['email'];
    $tel = $res['telefono'];
    $ind = $res['indirizzo'];

    ?>
    <div class='mydiv'>
    <div>
        <h1 class = 'center'>Profilo</h1>
        <form id='myform' action='update_profile.php' method='POST'>

            <i class='fa fa-user' style='font-size:13px;color:rgba(65, 65, 65, 1.0)'></i>
            <input type='text' class='no-outline' id='firstname' name='firstname' value='<?php echo $firstname ?>'  required><br>

            <i class='fa fa-user' style='font-size:13px;color:rgba(65, 65, 65, 1.0)'></i>
            <input type='text' class='no-outline' id='lastname' name='lastname' value="<?php echo $lastname ?>" required><br>

            <i class='fa fa-envelope' style='font-size:9px;color:rgba(65, 65, 65, 1.0)'></i>
            <input type='email' id='email' class='no-outline'  name='email' value='<?php echo $email ?>'  required><br>

            <i class='fa fa-phone' style='font-size:12px;color:rgba(65, 65, 65, 1.0)'></i>
            <input type='tel' class='no-outline' id='tel' name='tel' placeholder="Telefono" value='<?php echo $tel ?>'><br>

            <i class='fa fa-home' style='font-size:12px;color:rgba(65, 65, 65, 1.0)'></i>
            <input type='text' class='no-outline' id='ind' name='ind' placeholder="Indirizzo" value='<?php echo $ind ?>'><br>

            <p style=' color:red' id='emailControl'></p>
            <div id='updateButtons'>
                <div class='submit'><a href="passwordUpdate.php" class="no_decoration">Modifica Password</a></div>
                <input type='submit' class='submit' value='Applica'>
            </div>

        </form>
        </div>
    </div>
    <?php

    mysqli_close($con);

    include 'footer.php';

    ?>
