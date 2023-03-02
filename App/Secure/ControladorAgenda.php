<?php
session_start();

$_SESSION['nombre'] = 'Goku';
$_SESSION['raza'] = 'Saiyan';

echo $_SESSION['nombre'];
include ("Scripts/PersonalAgenda.php");
if($_SESSION["AdminAgenda"])	//Condicion admin
{
	

	header("location:https://saludaclinicas.com/AgendaDeCitas");	

}

?>