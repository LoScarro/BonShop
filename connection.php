<?php
$con = mysqli_connect('localhost', 'S4798949', 'cacciabombardiere', 'S4798949');        //mi connetto al DB
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error($con);
}
?>