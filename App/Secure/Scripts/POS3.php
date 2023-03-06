<?php
session_start();
include_once("db_connect.php");

if(isset($_POST['login_button'])) {
	
	
	$Correo_electronico = trim($_POST['user_email']);
	$Password = trim($_POST['password']);
	
	
	$sql ="SELECT PersonalPOS.Pos_ID,PersonalPOS.Correo_Electronico,PersonalPOS.Password,PersonalPOS.Estatus,
	PersonalPOS.Fk_Usuario,Roles_Puestos.ID_rol,Roles_Puestos.Nombre_rol from PersonalPOS,Roles_Puestos
	where PersonalPOS.Fk_Usuario = Roles_Puestos.ID_rol AND Correo_electronico='$Correo_electronico'";

	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$row = mysqli_fetch_assoc($resultset);	


	switch($row){
		case $row['Password']==$Password and $row['Nombre_rol']=="ADM Punto de venta" and $row['Estatus']=="Vigente";		
		echo "ok";
		$_SESSION['SuperAdmin'] = $row['Pos_ID'];		
		break;
	case $row['Password']==$Password and $row['Nombre_rol']=="Ventas" and $row['Estatus']=="Vigente"; 			
		echo "ok";
		$_SESSION['VentasPos'] = $row['Pos_ID'];	
		break;	
		
		case $row['Password']==$Password and $row['Nombre_rol']=="Logística y compras" and $row['Estatus']=="Vigente";			
			echo "ok";
		
			case $row['Password']==$Password and $row['Nombre_rol']=="Supervisor" and $row['Estatus']=="Vigente";				
			echo "ok";
			$_SESSION['Supervisor'] = $row['Pos_ID'];	 
			break;	
		} 	
	}

	?>
