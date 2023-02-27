<?php
include "db_connection.php";

        $PersonalAgenda_ID=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['iddestruye']))));
     
    
        

        $sql = "DELETE FROM  `Personal_Agenda` 
    
        WHERE PersonalAgenda_ID=$PersonalAgenda_ID";
       if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>