<?php
include "db_connection.php";

        $Intendencia_ID=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['idbajaa']))));
     
        $Estatus=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['VigenciaA']))));
        $ColorEstatus=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['ColorVigenciaA']))));
        

        $sql = "UPDATE `Personal_Intendecia` 
        SET 
        `Estatus`='$Estatus',
        `ColorEstatus`='$ColorEstatus'
        WHERE Intendencia_ID=$Intendencia_ID";
       if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>