<?php
session_start();
if (!isset($_SESSION['email'])) {       //menu per utenti non loggati
    echo '
    <nav>
        <div id="logo">
            <a href="index.php"><img src="img/home/logo.jpg" alt="logo"></a>
        </div>

        <form class= "mydiv" id="ricerca" action="search.php" method="GET">
            <input type="text" name="ricerca" placeholder="Cerca per nome" required><br>
            <input type="submit" id="tastoRicerca" value="Cerca">
        </form>

    <div class="buttons">
        <a href="index.php">Home</a>
        <a href="cart.php"">Carrello</a>
        <a href="loginForm.php">Accedi</a>
        <a href="registrationForm.php">Registrati</a>
    </div>
    </nav>
    ';
} else {       //menu per utenti loggati        
    echo '
    <nav>
        <div id="logo">
            <a href="index.php"><img src="img/home/logo.jpg" alt="logo"></a>
        </div>

        <form class= "mydiv" id="ricerca" action="search.php" method="GET">
            <input type="text" name="ricerca" placeholder="Cerca per nome" required><br>
            <input type="submit" id="tastoRicerca" value="Cerca">
        </form>

        <div class="buttons">
            <a href="index.php">Home</a>
            <a href="cart.php">Carrello</a>
            <a href="show_profile.php">Profilo</a>
            <a href="logout.php">Esci</a>
        </div>
    </nav>
    ';
}
?>