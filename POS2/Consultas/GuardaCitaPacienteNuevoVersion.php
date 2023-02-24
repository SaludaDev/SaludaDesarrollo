<?php

include_once 'db_connection.php';
$Pago="Pendiente";
$ClavePago="";
$Cita="Confirmada";
$ClaveCita="background-color:#04B45F !important";
$Seguimiento="Sin seguimiento";
$ClaveSeguimiento="background-color:#848484 !important";
$ColorClaveCalendario="#04B45F";
$Fk_Especialidad =  $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Especialidad']))));
$Fk_Especialista	= $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Medico']))));
$Fk_Sucursal =  $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Sucursal']))));
$Fk_Fecha= $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Fecha']))));	
$Fk_Hora	= $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Hora']))));
$Fk_Costo= $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Costo']))));
$Nombre_Paciente= $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Nombres']))));
$Telefono= $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Tel']))));
$Tipo_Consulta	= $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['TipoConsulta']))));
$Estatus_pago= $conn -> real_escape_string(htmlentities(strip_tags(Trim($Pago))));	
$Color_Pago	= $conn -> real_escape_string(htmlentities(strip_tags(Trim($ClavePago))));
$Estatus_cita= $conn -> real_escape_string(htmlentities(strip_tags(Trim($Cita))));	
$Observaciones	= $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Observaciones']))));
$ColorEstatusCita =  $conn -> real_escape_string(htmlentities(strip_tags(Trim($ClaveCita))));
$Estatus_Seguimiento   =  $conn -> real_escape_string(htmlentities(strip_tags(Trim($Seguimiento))));
$Color_Seguimiento	= $conn -> real_escape_string(htmlentities(strip_tags(Trim($ClaveSeguimiento))));
$ID_H_O_D =  $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Empresa']))));
$AgendadoPor =  $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Usuario']))));
$Sistema =  $conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Sistema']))));
$Color_Calendario	= $conn -> real_escape_string(htmlentities(strip_tags(Trim($ColorClaveCalendario))));

    //include database configuration file
    
    //insert form data in the database
    $sql = "SELECT Nombre_Paciente,Fk_Fecha,Fk_Hora,Fk_Especialidad FROM AgendaCitas_EspecialistasV3 WHERE Nombre_Paciente='$Nombre_Paciente'
    AND Fk_Fecha='$Fk_Fecha' AND Fk_Hora='$Fk_Hora' AND Fk_Especialidad='$Fk_Especialidad'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset);	
    //include database configuration file
    if($row['Nombre_Paciente']==$Nombre_Paciente  AND $row['Fk_Fecha']=="$Fk_Fecha" AND $row['Fk_Hora']=="$Fk_Hora" AND $row['Fk_Especialidad']=="$Fk_Especialidad"){				
        echo json_encode(array("statusCode"=>250));
      
    } 
    else{
    
		$sql = "INSERT INTO `AgendaCitas_EspecialistasV3`(`Fk_Especialidad`, `Fk_Especialista`, `Fk_Sucursal`, `Fk_Fecha`, `Fk_Hora`, `Fk_Costo`, `Nombre_Paciente`, `Telefono`, `Tipo_Consulta`, 
        `Estatus_pago`, `Color_Pago`, `Estatus_cita`, `Observaciones`, `ColorEstatusCita`, `Estatus_Seguimiento`, `Color_Seguimiento`, `ID_H_O_D`, `AgendadoPor`, `Sistema`, `Color_Calendario`) 
		VALUES ('$Fk_Especialidad','$Fk_Especialista', '$Fk_Sucursal','$Fk_Fecha','$Fk_Hora','$Fk_Costo','$Nombre_Paciente','$Telefono','$Tipo_Consulta','$Estatus_pago','$Color_Pago','$Estatus_cita', 
        '$Observaciones','$ColorEstatusCita', '$Estatus_Seguimiento', '$Color_Seguimiento','$ID_H_O_D', '$AgendadoPor', '$Sistema', '$Color_Calendario')";
	
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
   

    mysqli_close($conn);
}

?>

