<?php
ini_set('error_reporting', E_ALL);
if($_SESSION["SuperAdmin"])	//Condicion admin
{
	header("location:https://controlfarmacia.com/AdminPOS");	

}
if($_SESSION["VentasPos"])	//Condicion personal
{
	header("location: https://controlfarmacia.com/POS2"); 
}


if($_SESSION["LogisticaPOS"])	//Condicion personal
{

	header("location: https://controlfarmacia.com/POSLogistica"); 
}

if($_SESSION["ResponsableCedis"])	//Condicion personal
{

	header("location: https://controlfarmacia.com/CEDIS"); 
}

if($_SESSION["ResponsableInventarios"])	//Condicion personal
{

	header("location: https://controlfarmacia.com/Inventarios"); 
}

if($_SESSION["ResponsableDeFarmacias"])	//Condicion personal
	{	header("location: https://controlfarmacia.com/ResponsableDeFarmacias");
	}
	if($_SESSION["CoordinadorDental"])	//Condicion personal
	{	header("location: https://controlfarmacia.com/JefeDental");
	}
	if($_SESSION["Supervisor"])	//Condicion personal
	{	header("location: https://controlfarmacia.com/CEDISMOVIL");
	}
?>