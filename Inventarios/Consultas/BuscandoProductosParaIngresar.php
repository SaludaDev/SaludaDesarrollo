<?php
if (isset($_GET['term'])){
	# conectare la base de datos
    include ("db_connection.php");
    include "Consultas.php";
    include "Sesion.php";
    
	
$return_arr = array();
/* Si la conexión a la base de datos , ejecuta instrucción SQL. */
if ($conn)
{
	$fetch = mysqli_query($conn,"SELECT Stock_POS.ID_Prod_POS,Stock_POS.Nombre_Prod,Stock_POS.Folio_Prod_Stock,Stock_POS.Cod_Barra,Stock_POS.Existencias_R,
    Stock_POS.Lote,Stock_POS.Fk_sucursal,Stock_POS.Fecha_Caducidad,Stock_POS.Precio_Venta,Stock_POS.Precio_C, SucursalesCorre.ID_SucursalC,SucursalesCorre.Nombre_Sucursal FROM Stock_POS,SucursalesCorre where Stock_POS.Fk_sucursal= SucursalesCorre.ID_SucursalC AND Cod_Barra like '%" .mysqli_real_escape_string($conn,($_GET['term'])) . "%' OR Nombre_Prod like '%" .mysqli_real_escape_string($conn,($_GET['term'])) . "%'  LIMIT 0 ,100"); 
	
	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
        $ID_Prod_POS=$row['ID_Prod_POS'];
        $Nombre_Sucursal=$row['Nombre_Sucursal'];
        $Nombre_Prod=$row['Nombre_Prod'];
        $Folio_Prod_Stock=$row['Folio_Prod_Stock'];
        $Cod_Barra=$row['Cod_Barra'];
        $Existencias_R=$row['Existencias_R'];
        $Lote=$row['Lote'];
        $Fecha_Caducidad =$row['Fecha_Caducidad'];
        $Precio_Venta=$row['Precio_Venta'];
        $Precio_C=$row['Precio_C'];
       
                
        
        // AQUI VAN LOS ID DE LOS INPUTS
        $row_array['value'] = $row['Cod_Barra']." | ".$row['Nombre_Prod']." | ".$row['Nombre_Sucursal'];
        $row_array['clavebusqueda']=$row['Cod_Barra']." | ".$row['Nombre_Prod'];
        
      
            $row_array['nameprod']=$row['Nombre_Prod'];
            $row_array['codbarrap']=$row['Cod_Barra'];
            $row_array['existencias']=$row['Existencias_R'];
            $row_array['Folioporact']=$row['Folio_Prod_Stock'];
            $row_array['lote']=$row['Lote'];
		array_push($return_arr,$row_array);
    }
}

/* Cierra la conexión. */
mysqli_close($conn);

/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);

}
?>