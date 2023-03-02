<?php
session_start();

if($_SESSION["AdminAgenda"])	//Condicion admin
{
	

	header("location:https://saludaclinicas.com/AgendaDeCitas");	

}

?>