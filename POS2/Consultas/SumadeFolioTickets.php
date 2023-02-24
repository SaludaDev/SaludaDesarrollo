<?php
    include_once("../db_connect.php");
    include "../Consultas.php";
include "../Sesion.php";
    $sql ="SELECT * FROM Ventas_POS  where Fk_sucursal='".$row['Fk_Sucursal']."'  order by Venta_POS_ID desc limit 1";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$Ticketss = mysqli_fetch_assoc($resultset);
 

$monto1 = $Ticketss['Folio_Ticket'];; 
$monto2 = 1; 
$totalmonto = $monto1 + $monto2; 
 
    
  
?>