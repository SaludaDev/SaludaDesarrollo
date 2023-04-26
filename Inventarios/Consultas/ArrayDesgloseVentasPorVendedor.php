
<?php
header('Content-Type: application/json');
include("db_connection.php");
include "Consultas.php";
include "Sesion.php";
include "mcript.php";

$sql = "SELECT Ventas_POS.Folio_Ticket,Ventas_POS.Fk_Caja,Ventas_POS.Venta_POS_ID,Ventas_POS.Identificador_tipo,
Ventas_POS.Total_Venta,Ventas_POS.Importe,Ventas_POS.Total_VentaG,Ventas_POS.FormaDePago,Ventas_POS.Turno,
Ventas_POS.Cod_Barra,Ventas_POS.Clave_adicional, Ventas_POS.Identificador_tipo,
Ventas_POS.Nombre_Prod,Ventas_POS.Cantidad_Venta,Ventas_POS.Fk_sucursal,Ventas_POS.AgregadoPor,
Ventas_POS.AgregadoEl, Ventas_POS.Total_Venta,Ventas_POS.Lote,Ventas_POS.ID_H_O_D,SucursalesCorre.ID_SucursalC,
SucursalesCorre.Nombre_Sucursal,Servicios_POS.Servicio_ID,Servicios_POS.Nom_Serv FROM Ventas_POS,SucursalesCorre,Servicios_POS 
 WHERE  Ventas_POS.Fk_sucursal= SucursalesCorre.ID_SucursalC AND Ventas_POS.Fk_sucursal='".$row['Fk_Sucursal']."' AND Ventas_POS.AgregadoPor='".$_COOKIE[ "Vendedor"]."'
AND Ventas_POS.ID_H_O_D ='".$row['ID_H_O_D']."'  AND Ventas_POS.Identificador_tipo = Servicios_POS.Servicio_ID";
 
$result = mysqli_query($conn, $sql);
 
$c=0;
 
while($fila=$result->fetch_assoc()){
 
    $data[$c]["Cod_Barra"] = $fila["Cod_Barra"];
    $data[$c]["Nombre_Prod"] = $fila["Nombre_Prod"];
    $data[$c]["FolioTicket"] = $fila["Folio_Ticket"];
    $data[$c]["Turno"] = $fila["Turno"];
    $data[$c]["Cantidad_Venta"] = $fila["Cantidad_Venta"];
    $data[$c]["Importe"] = $fila["Importe"];
    $data[$c]["Total_Venta"] = $fila["Total_Venta"];
    $data[$c]["Descuento"] = $fila["DescuentoAplicado"];
    $data[$c]["FormaPago"] = $fila["FormaDePago"];
    $data[$c]["NomServ"] = $fila["Nom_Serv"];
    $data[$c]["AgregadoEl"] = $fila["AgregadoEl"];
    $data[$c]["AgregadoEnMomento"] = $fila["AgregadoEl"];
    $data[$c]["AgregadoPor"] = $fila["AgregadoPor"];
   
    $c++; 
 
}
 
$results = ["sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data ];
 
echo json_encode($results);
?>
