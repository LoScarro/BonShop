<?php
include "connection.php"; //Mi connetto al DB
$email = $_POST["email"];       //prendo la mail dall'api fetch
$select_query = "SELECT * FROM utenti WHERE email='" . $email . "'";        //query per vedere gli utenti con una determinata mail
$res = mysqli_query($con, $select_query);
if (mysqli_num_rows($res) == 0) {       //se non c'è nessun utente con quella mail restitusco ok 
    echo "mailDisp";
} else {        //altrimenti ko
    echo "mailNonDisp";
}
?>