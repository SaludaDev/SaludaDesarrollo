<?php
session_start();


if($_SESSION["SuperAdmin"])	//Condicion admin
{
	header("location:https://saludaclinicas.com/AdminPOS");	

}
if($_SESSION["VentasPos"])	//Condicion personal
{
	header("location: https://saludaclinicas.com/POS2"); 
}

	// if($_SESSION["Supervisor"])	//Condicion personal
	// {	header("location: https://saludaclinicas.com/CEDISMOVIL");
	// }
?>