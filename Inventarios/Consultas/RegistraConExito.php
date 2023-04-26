<?php
include_once 'db_connection.php';
$EstadoTraspaso="Entregado";
$ID_Traspaso_Generado=  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['IDTraspaso']))));
$FK_Producto =$conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['IDProductos']))));
$Cod_Barrra =  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['CodBarra']))));
$Cantidad_Enviada =  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['CantidadEnviada']))));
$Cantidad_Recibida =  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['CantidadRecibida']))));
$Sucursal_Origen =  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['OrigenSucursal']))));
$Sucursal_Destino =  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['DestinoSucursal']))));
$Fk_SucDestino=  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['SucursalTrigger']))));
$Estado=  $conn->real_escape_string(htmlentities(strip_tags(Trim($EstadoTraspaso))));
$Comentario =  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['ComentariosObservaciones']))));
$Sistema =  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['Sistema']))));
$Registro =  $conn->real_escape_string(htmlentities(strip_tags(Trim($_POST['Agrego']))));

$sql = "SELECT ID_Traspaso_Generado,Sucursal_Origen,Sucursal_Destino FROM Registro_Traspasos WHERE  ID_Traspaso_Generado='$ID_Traspaso_Generado' AND Sucursal_Origen='$Sucursal_Origen' AND  Sucursal_Destino='$Sucursal_Destino'  ";
$resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$row = mysqli_fetch_assoc($resultset);
//include database configuration file
if ($row['ID_Traspaso_Generado'] == $ID_Traspaso_Generado and $row['Sucursal_Destino'] == $Sucursal_Destino and $row['Sucursal_Origen'] == $Sucursal_Origen) {
    echo json_encode(array("statusCode" => 250));
} else {
    $sql = "INSERT INTO `Registro_Traspasos`( `ID_Traspaso_Generado`,`FK_Producto` ,`Cod_Barrra`, `Cantidad_Enviada`, `Cantidad_Recibida`, `Sucursal_Origen`, `Sucursal_Destino`,`Fk_SucDestino`,
    `Estado`, `Comentario`, `Sistema`, `Registro`) 
            VALUES ( '$ID_Traspaso_Generado', '$FK_Producto','$Cod_Barrra', '$Cantidad_Enviada', '$Cantidad_Recibida', '$Sucursal_Origen', '$Sucursal_Destino', '$Fk_SucDestino',
    '$Estado', '$Comentario', '$Sistema', '$Registro')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo json_encode(array("statusCode" => 201));
    }
    mysqli_close($conn);
}
