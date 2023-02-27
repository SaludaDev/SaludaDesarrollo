<?

include("db_connection.php");
include "Consultas.php";
include "Sesion.php";


$sql ="SELECT Estatus,ID_H_O_D,COUNT(*) as Farmaceuticos FROM `PersonalPOS` WHERE Fk_Usuario = 7 AND Estatus='Vigente' AND ID_H_O_D='".$row['ID_H_O_D']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$TotalFarmaceuticos = mysqli_fetch_assoc($resultset);

$sql ="SELECT Estatus,ID_H_O_D,COUNT(*) as Enfermeros FROM Personal_Enfermeria WHERE Fk_Usuario = 4 AND Estatus='Vigente' AND  ID_H_O_D='".$row['ID_H_O_D']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$TotalEnfermeros = mysqli_fetch_assoc($resultset);

$sql ="SELECT Estatus,ID_H_O_D,COUNT(*) as Medicos FROM Personal_Medico WHERE Estatus='Vigente' AND ID_H_O_D='".$row['ID_H_O_D']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$TotalMedicos = mysqli_fetch_assoc($resultset);
$sql ="SELECT Estatus,ID_H_O_D,COUNT(*) as Intendentes FROM Personal_Intendecia WHERE Estatus='Vigente' AND ID_H_O_D='".$row['ID_H_O_D']."'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$TotalLimpieza = mysqli_fetch_assoc($resultset);
?>