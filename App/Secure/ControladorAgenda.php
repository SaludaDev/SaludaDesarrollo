<?php

session_start();
include ("Scripts/PersonalAgenda.php");
if($_SESSION["AdminAgenda"])	//Condicion admin
{
	

	header("location:https://saludaclinicas.com/AgendaDeCitas");	

}
if($_SESSION["AgendaDePavel"])	//Condicion personal
{

	header("location: https://saludaclinicas.com/AgendaPavel"); 
}


?>