<?
date_default_timezone_set("America/Monterrey");
session_start();
if(!isset($_SESSION['RHAdmin'])){
	header("Location: Expiro.php");
}
include_once("db_connect.php");
$sql = "SELECT Administracion_Sistema.Admin_ID,Administracion_Sistema.Nombre_Apellidos,Administracion_Sistema.file_name,Administracion_Sistema.Fk_Usuario,
Administracion_Sistema.Correo_Electronico,Administracion_Sistema.Estatus,Administracion_Sistema.ID_H_O_D,Roles_Puestos.ID_rol,Roles_Puestos.Nombre_rol from Administracion_Sistema,Roles_Puestos WHERE
Administracion_Sistema.Fk_Usuario = Roles_Puestos.ID_rol AND Administracion_Sistema.Admin_ID='".$_SESSION['RHAdmin']."'";
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

