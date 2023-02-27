<?
date_default_timezone_set("America/Monterrey");
session_start();
if(!isset($_SESSION['Medico'])){
	header("Location: Expiro.php");
}
include_once("../db_connect.php");
$sql = "SELECT Personal_Medico.Medico_ID,Personal_Medico.Nombre_Apellidos,Personal_Medico.file_name,Personal_Medico.Fk_Sucursal,
Personal_Medico.ID_H_O_D,Personal_Medico.Fk_Usuario, Roles_Puestos.ID_rol, Roles_Puestos.Nombre_rol,SucursalesCorre.ID_SucursalC,SucursalesCorre.Nombre_Sucursal FROM Personal_Medico,Roles_Puestos,SucursalesCorre where Personal_Medico.Fk_Usuario = Roles_Puestos.ID_rol AND Personal_Medico.Fk_Sucursal = SucursalesCorre.ID_SucursalC 
  and Personal_Medico.Medico_ID='".$_SESSION['Medico']."'";
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

