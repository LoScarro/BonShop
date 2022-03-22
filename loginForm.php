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
    <script  src="script.js"></script>
</head>

<body>
  <?php
  include 'menu.php'
  ?>

    <div class="mydiv">
        <div>
            <h1 class = "center">Accedi</h1>
            <form id="myform" method="POST" onsubmit="return loginCheck()">
                <i class="fa fa-envelope" style="font-size:9px;color:rgba(65, 65, 65, 1.0)"></i>
                <input type="email" class="inputHover" name="email" id="email" onchange="verifica()" placeholder="E-mail" required><br>
                <i class="fa fa-unlock-alt" style="font-size:14px;color:rgba(65, 65, 65, 1.0)"></i>
                <input type="password" class="inputHover" id="pass" name="pass" placeholder="Password" required><br>
                <p id="emailControl" style="color:red"></p>
                <input class="submit" type="submit" value="Invia">
            </form>
        </div>
    </div>

  <?php
  include 'footer.php'
  ?>
