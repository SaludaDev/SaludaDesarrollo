<?php
session_start();
$_SESSION['nombre'] = 'Goku';
$_SESSION['raza'] = 'Saiyan';
echo $_SESSION['nombre'];
if($_SESSION["SuperAdmin"])	//Condicion admin
{
	header("location:https://saludaclinicas.com/AdminPOS");	

}
if($_SESSION["VentasPos"])	//Condicion personal
{
	header("location: https://saludaclinicas.com/POS2"); 
}


if($_SESSION["LogisticaPOS"])	//Condicion personal
{

	header("location: https://saludaclinicas.com/POSLogistica"); 
}

if($_SESSION["ResponsableCedis"])	//Condicion personal
{

	header("location: https://saludaclinicas.com/CEDIS"); 
}

if($_SESSION["ResponsableInventarios"])	//Condicion personal
{

	header("location: https://saludaclinicas.com/Inventarios"); 
}

if($_SESSION["ResponsableDeFarmacias"])	//Condicion personal
	{	header("location: https://saludaclinicas.com/ResponsableDeFarmacias");
	}
	if($_SESSION["CoordinadorDental"])	//Condicion personal
	{	header("location: https://saludaclinicas.com/JefeDental");
	}
	if($_SESSION["Supervisor"])	//Condicion personal
	{	header("location: https://saludaclinicas.com/CEDISMOVIL");
	}
?>