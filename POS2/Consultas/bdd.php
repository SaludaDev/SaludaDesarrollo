<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=u155356178_DesarrolloSalu;charset=utf8', 'u155356178_CorpoSaluda', 'SSalud4Dev2495#$');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
