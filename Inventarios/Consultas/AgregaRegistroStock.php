<?php
include_once 'db_connection.php';
$ID_Prod_POS=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['ACT_ID_Prod']))));
       
$Lote=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Loteee']))));
$Fecha_Caducidad=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['fechacad']))));
$AgregadoPor=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['AgregaProductosBy']))));
$Sistema=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['SistemaProductos']))));
$Existencias_R=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['NuevaExistencia']))));
$ExistenciaPrev=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['ExistenciaPrev']))));
$Recibido=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['Recibio']))));
$Fk_sucursal=$conn -> real_escape_string(htmlentities(strip_tags(Trim($_POST['StockActualiza']))));
$ID_H_O_D=$conn -> real_escape_string(htmlentities(strip_tags(Trim("Doctor Consulta"))));

    $sql = "INSERT INTO `Stock_registrosNuevos`( `ID_Prod_POS`, `Fk_sucursal`, `Existencias_R`, `ExistenciaPrev`, `Recibido`, `Lote`, `Fecha_Caducidad`, `AgregadoPor`,`ID_H_O_D`) VALUES
     ('$ID_Prod_POS', '$Fk_sucursal', '$Existencias_R', '$ExistenciaPrev', '$Recibido','$Lote','$Fecha_Caducidad', '$AgregadoPor','$ID_H_O_D')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo json_encode(array("statusCode" => 201));
    }
    mysqli_close($conn);

