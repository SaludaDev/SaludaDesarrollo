<?php
	
        include_once 'db_connection.php';
		$contador = count($_POST["AsignaSucursal"]);
		$ProContador=0;
		$query = "INSERT INTO Stock_Enfermeria(ID_Prod_POS, Clave_adicional, Cod_Barra, Cod_Enfermeria,Nombre_Prod,Fk_sucursal,Precio_Venta, Precio_C, Min_Existencia, Max_Existencia, 
		Existencias_R, Lote, Fecha_Caducidad, Tipo_Servicio,Estatus,CodigoEstatus,Sistema,AgregadoPor,ID_H_O_D) VALUES ";
		$queryValue = "";
		for($i=0;$i<$contador;$i++) {
			if(!empty($_POST["ID_Prod"]) || !empty($_POST["ASignaClav"]) || !empty($_POST["AsignaSucursal"][$i])) {
				$ProContador++;
				if($queryValue!="") {
					$queryValue .= ",";
				}
				$queryValue .= "('" . $_POST["ID_Prod"] . "','" . $_POST["ASignaClav"] . "','" . $_POST["AsignaCodBarra"] . "','" . $_POST["CodEnfermeria"] . "','" . $_POST["AsignaNombreProd"] . "','" .$_POST["AsignaSucursal"][$i] ."',
                '" . $_POST["ASPV"] . "','" . $_POST["ASPC"] . "','" . $_POST["AsMaximo"] . "','" . $_POST["ASMinimo"] . "','" . $_POST["CanAsigna"] . "',
				'" . $_POST["AsLote"] . "','" . $_POST["AsFecha"] . "','" . $_POST["TipoServicio"] . "','" . $_POST["Vigencia"] . "','" . $_POST["CodVigencia"] . "','" . $_POST["SistemaProductos"] . "','" . $_POST["AgregaProductosBy"] . "','" . $_POST["EmpresaProductos"] . "')";
			}
		}
		$sql = $query.$queryValue;
		if($ProContador!=0) {
		    $resultadocon = mysqli_query($conn, $sql);
			if(!empty($resultadocon)) $resultado = " <br><ul class='list-group' style='margin-top:15px;'>
   <li class='list-group-item'>Registro(s) Agregado Correctamente.</li></ul>";
		}
	
?>

