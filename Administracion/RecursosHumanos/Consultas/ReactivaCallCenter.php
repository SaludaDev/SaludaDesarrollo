<?php
include "db_connection.php";

        $PersonalAgenda_ID=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['idreactiva']))));
     
        $Estatus=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['VigenciaA']))));
        $ColorEstatus=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['ColorVigenciaA']))));
        

        $sql = "UPDATE `Personal_Agenda` 
        SET 
        `Estatus`='$Estatus',
        `ColorEstatus`='$ColorEstatus'
        WHERE PersonalAgenda_ID=$PersonalAgenda_ID";
       if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>