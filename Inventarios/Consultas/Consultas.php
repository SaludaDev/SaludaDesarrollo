<?php 
date_default_timezone_set("America/Monterrey");
session_start();
if(!isset($_SESSION['SuperAdmin'])){
	header("Location: Expiro.php");
}
include_once("db_connect.php");
$sql = "SELECT PersonalPOS.Pos_ID,PersonalPOS.Nombre_Apellidos,PersonalPOS.file_name,PersonalPOS.Fk_Usuario,PersonalPOS.Fk_Sucursal,PersonalPOS.ID_H_O_D,PersonalPOS.Permisos,
Roles_Puestos.ID_rol,Roles_Puestos.Nombre_rol, SucursalesCorre.ID_SucursalC,SucursalesCorre.Nombre_Sucursal from PersonalPOS,Roles_Puestos,SucursalesCorre 
where PersonalPOS.Fk_Usuario = Roles_Puestos.ID_rol and PersonalPOS.Fk_Sucursal = SucursalesCorre.ID_SucursalC and PersonalPOS.Pos_ID='".$_SESSION['SuperAdmin']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset);
$hora = date('G'); if (($hora >= 0) AND ($hora < 6)) 
  { 
    
    $mensaje = "Hola, que tengas una excelente madrugada."; 
  } 
  else if (($hora >= 6) AND ($hora < 12)) 
  { 
    $mensaje = "Buenos días"; 
  } 
  else if (($hora >= 12) AND ($hora < 18)) 
  { 
    $mensaje = "Buenas tardes"; 
  } 
  else
  { 
  $mensaje = "Buenas noches"; 
  } 

   ?>

