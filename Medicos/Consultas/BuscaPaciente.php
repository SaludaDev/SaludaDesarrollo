<?
date_default_timezone_set("America/Monterrey");

include_once("../db_connect.php");
$sql = "SELECT * FROM Signos_VitalesV2 where ID_SignoV='".$ElPaciente"'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$Data = mysqli_fetch_assoc($resultset);

   ?>


   

