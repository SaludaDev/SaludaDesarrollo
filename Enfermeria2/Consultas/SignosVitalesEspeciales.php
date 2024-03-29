<script type="text/javascript">
$(document).ready( function () {
    $('#SignosVitales').DataTable({
      "order": [[ 0, "desc" ]],
      "language": {
        "url": "Componentes/Spanish.json"
		}
		
	  } 
	  
	  );
} );
</script>
<?php

include("db_connection.php");
include "Consultas.php";
include "Sesion.php";

$user_id=null;
$sql1="SELECT Signos_VitalesV2.ID_SignoV,Signos_VitalesV2.Folio_Paciente,Signos_VitalesV2.Nombre_Paciente,Signos_VitalesV2.Motivo_Consulta, Signos_VitalesV2.Nombre_Doctor,
Signos_VitalesV2.Fk_Enfermero,Signos_VitalesV2.Fk_Sucursal,Signos_VitalesV2.FK_ID_H_O_D,Signos_VitalesV2.Fecha_Visita,Signos_VitalesV2.Estatus,Signos_VitalesV2.CodigoEstatus, SucursalesCorre.ID_SucursalC,SucursalesCorre.Nombre_Sucursal 
FROM Signos_VitalesV2,SucursalesCorre where Signos_VitalesV2.Fk_Enfermero='".$row['Nombre_Apellidos']."' and Signos_VitalesV2.Fk_Sucursal = SucursalesCorre.ID_SucursalC 
AND Signos_VitalesV2.FK_ID_H_O_D='".$row['ID_H_O_D']."' ORDER BY Signos_VitalesV2.ID_SignoV DESC";   
$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
	<div class="table-responsive">
	<table id="SignosVitales" class="table ">
<thead>
<th>Folio</th>
    <th>Nombre </th>
    <th>Sucursal</th>
    <th>Motivo Consulta </th>
    <th>Registrado </th>
    <th>Doctor </th>
    <th>Estatus </th>

	
	


</thead>
<?php while ($DataPacientes=$query->fetch_array()):?>
<tr>
<td><?php echo $DataPacientes["Folio_Paciente"]; ?></td>
    <td><?php echo $DataPacientes["Nombre_Paciente"]; ?></td>
    <td><?php echo $DataPacientes["Nombre_Sucursal"]; ?></td>
    <td><?php echo $DataPacientes["Motivo_Consulta"]; ?></td>
    <td><?php echo fechaCastellano($DataPacientes["Fecha_Visita"]); ?> <br>
       <?php echo date('h:i A', strtotime($DataPacientes["Fecha_Visita"])); ?></td>
    <td><?php echo $DataPacientes["Nombre_Doctor"]; ?></td>
   
    <td><button class="btn btn-default btn-sm" style="<?php echo $DataPacientes['CodigoEstatus'];?>"><?php echo $DataPacientes["Estatus"]; ?></button></td>
	
 

	
		
</tr>
<?php endwhile;?>
</table>
</div>
<?php else:?>
	<p class="alert alert-warning">Aún no hay pacientes registrados</p>
<?php endif;?>
  <!-- Modal -->
  <?php

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