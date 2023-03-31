<?php

session_start();


if($_SESSION["Enfermeria"])	//Condicion personal
{

	header("location: https://saludaclinicas.com/Enfermeria2/"); 
}
if($_SESSION["AdminEnfermeria"])	//Condicion personal
{

	header("location: https://saludaclinicas.com/CEnfermeria/"); 
}


?>