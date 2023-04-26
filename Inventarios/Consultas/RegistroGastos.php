<script type="text/javascript">
$(document).ready( function () {
    $('#GastosSucursales').DataTable({
      "order": [[ 0, "desc" ]],
      "lengthMenu": [[50,100,500, -1], [50,100,500, "Todos"]],   
      "language": {
        "url": "Componentes/Spanish.json"
		},
 
 
		
	  } 
	  
	  );
} );
</script>
<?php

include("db_connection.php");
include "Consultas.php";
include "Sesion.php";

$user_id=null;
$sql1="SELECT Otros_Gastos_POS.ID_Gastos,Otros_Gastos_POS.Concepto_Categoria,Otros_Gastos_POS.Importe_Total,Otros_Gastos_POS.Empleado,
Otros_Gastos_POS.Fk_sucursal,Otros_Gastos_POS.Descripcion,Otros_Gastos_POS.ID_H_O_D,Otros_Gastos_POS.AgregadoEl,
Categorias_Gastos_POS.Cat_Gasto_ID,Categorias_Gastos_POS.Nom_Cat_Gasto,SucursalesCorre.ID_SucursalC,
SucursalesCorre.Nombre_Sucursal FROM Otros_Gastos_POS,Categorias_Gastos_POS,SucursalesCorre 
where Otros_Gastos_POS.Concepto_Categoria = Categorias_Gastos_POS.Cat_Gasto_ID AND Otros_Gastos_POS.Fk_sucursal = SucursalesCorre.ID_SucursalC 
AND Otros_Gastos_POS.ID_H_O_D ='".$row['ID_H_O_D']."'";


$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
  <div class="text-center">
	<div class="table-responsive">
	<table  id="GastosSucursales" class="table table-hover">
<thead>
<th>Folio</th>
<th>Concepto</th>
<th>Descripcion</th>
    <th>Importe</th>
    <th>Empleado</th>
    <th>Sucursal</th>
    <th>Fecha y hora</th>


</thead>
<?php while ($Usuarios=$query->fetch_array()):?>
<tr>


<td > <?php echo $Usuarios['ID_Gastos']; ?></td>
<td > <?php echo $Usuarios['Nom_Cat_Gasto']; ?></td>
<td > <?php echo $Usuarios['Descripcion']; ?></td>
  <td > <?php echo $Usuarios['Importe_Total']; ?></td>
  <td > <?php echo $Usuarios['Empleado']; ?></td>
  
  
  <td > <?php echo $Usuarios['Nombre_Sucursal']; ?></td>
  <td > <?php echo fechaCastellano($Usuarios['AgregadoEl']); ?> <br>
  <?php echo date('g:i a', strtotime($Usuarios['AgregadoEl'])); ?>  </td>
  
	
		
</tr>
<?php endwhile;?>
</table>
</div>
</div>
<?php else:?>
	<p class="alert alert-warning">Aún no hay Gastos registrados para <?echo $row['ID_H_O_D']?></p>
<?php endif;?>
  <!-- Modal -->
  <?

function fechaCastellano ($fecha) {
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
}
?>