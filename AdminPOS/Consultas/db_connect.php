<?php

/* Database connection start */
$servername = "localhost";
$username = "u155356178_CorpoSaluda";
$password = "ZQr6HgEJNEk6#ug1&IoeXl44f3#45aIyP6pyJlrnZD8bqkYnt&";
$dbname = "u155356178_DesarrolloSalu";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("No podemos conectar a la base de datos: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("algo salio mal, no podemos conectarnos a la base de datos %s\n", mysqli_connect_error());
    exit();
}

?>