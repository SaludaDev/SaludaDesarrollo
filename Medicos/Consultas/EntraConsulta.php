<?php
include "db_connection.php";
$ClaveEstatus="En consulta";
$Clavecolor="background-color:#0489B1 !important";
        $ID_SignoV=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['id']))));
       $Estatus =$conn ->real_escape_string(htmlentities(strip_tags(Trim( $ClaveEstatus))));
       $CodigoEstatus = $conn -> real_escape_string(htmlentities(strip_tags(Trim($Clavecolor))));

        $sql = "UPDATE `Signos_VitalesV2` 
        SET `Estatus`='$Estatus',
        `CodigoEstatus`='$CodigoEstatus'
        WHERE ID_SignoV=$ID_SignoV";
       if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>