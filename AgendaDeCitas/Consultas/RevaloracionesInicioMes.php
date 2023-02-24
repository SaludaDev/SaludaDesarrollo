
<?php
header('Content-Type: application/json');
include("db_connection.php");
include "Consultas.php";
include "Sesion.php";


$sql = "SELECT Agenda_revaloraciones.Id_genda,Agenda_revaloraciones.Nombres_Apellidos,Agenda_revaloraciones.Telefono,Agenda_revaloraciones.Fk_sucursal,
Agenda_revaloraciones.Medico,Agenda_revaloraciones.Fecha,Agenda_revaloraciones.Turno,Agenda_revaloraciones.Motivo_Consulta,Agenda_revaloraciones.Agrego,
Agenda_revaloraciones.AgregadoEl, SucursalesCorre.ID_SucursalC,SucursalesCorre.Nombre_Sucursal FROM
Agenda_revaloraciones, SucursalesCorre WHERE SucursalesCorre.ID_SucursalC = Agenda_revaloraciones.Fk_sucursal";
 
$result = mysqli_query($conn, $sql);
 
$c=0;
 
while($fila=$result->fetch_assoc()){
    $data[$c]["Folio"] = $fila["Id_genda"];
    $data[$c]["Paciente"] = $fila["Nombres_Apellidos"];
    $data[$c]["Telefono"] = $fila["Telefono"];
    $data[$c]["Fecha"] = $fila["Fecha"];
    $data[$c]["Sucursal"] = $fila["Nombre_Sucursal"];
    $data[$c]["Medico"] = $fila["Medico"];
    $data[$c]["Turno"] = $fila["Turno"];
    $data[$c]["MotivoConsulta"] = $fila["Motivo_Consulta"];
    $data[$c]["ConWhatsaap"] = $fila["Nom_Serv"];
    $data[$c]["Agendo"] = $fila["Agrego"];
    $data[$c]["RegistradoEl"] = $fila["AgregadoEl"];
    

    
    $c++; 
 
}
 
$results = ["sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data ];
 
echo json_encode($results);
?>
 