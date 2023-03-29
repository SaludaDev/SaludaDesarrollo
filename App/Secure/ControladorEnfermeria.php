<?php

session_start();

include ("Scripts/Enfermeria2.php");

if($_SESSION["Enfermeria"])	//Condicion personal
{

	header("location: https://saludaclinicas.com/Enfermeria2/"); 
}
if($_SESSION["AdminEnfermeria"])	//Condicion personal
{

	header("location: https://saludaclinicas.com/CEnfermeria/"); 
}


?>