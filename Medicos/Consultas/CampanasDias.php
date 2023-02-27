<script type="text/javascript">
$(document).ready( function () {
    $('#Campanas').DataTable({
		
      "language": {
        "url": "Componentes/Spanish.json"
        }
      } );
} );
</script>
<?php

include("db_connection.php");
include "Consultas.php";
include "Sesion.php";
include "../js/Fecha.php";

$user_id=null;
$sql1="SELECT AgendaCitas_Especialistas.ID_Agenda_Especialista,AgendaCitas_Especialistas.Fk_Especialidad,
AgendaCitas_Especialistas.Fk_Especialista,AgendaCitas_Especialistas.Fk_Sucursal,
AgendaCitas_Especialistas.Fk_Fecha,AgendaCitas_Especialistas.Fk_Hora,AgendaCitas_Especialistas.Nombre_Paciente,
AgendaCitas_Especialistas.Telefono,AgendaCitas_Especialistas.Tipo_Consulta,
AgendaCitas_Especialistas.Estatus_pago,AgendaCitas_Especialistas.Color_Pago,AgendaCitas_Especialistas.Estatus_cita,
AgendaCitas_Especialistas.Observaciones,AgendaCitas_Especialistas.ColorEstatusCita,AgendaCitas_Especialistas.Estatus_Seguimiento,
AgendaCitas_Especialistas.Color_Seguimiento,AgendaCitas_Especialistas.ID_H_O_D,AgendaCitas_Especialistas.AgendadoPor,AgendaCitas_Especialistas.Sistema,
Especialidades.ID_Especialidad,Especialidades.Nombre_Especialidad,Especialistas.ID_Especialista,Especialistas.Nombre_Apellidos,
Sucursales_Campañas.ID_SucursalC ,Sucursales_Campañas.Nombre_Sucursal,Fechas_Especialistas.ID_Fecha_Esp,Fechas_Especialistas.Fecha_Disponibilidad,
Horarios_Citas_especialistas.ID_Horario,Horarios_Citas_especialistas.Horario_Disponibilidad, Costos_Especialistas.ID_Costo_Esp,Costos_Especialistas.Costo_Especialista
FROM AgendaCitas_Especialistas,Especialidades,Especialistas,Sucursales_Campañas,Fechas_Especialistas,Horarios_Citas_especialistas,
Costos_Especialistas WHERE
AgendaCitas_Especialistas.Fk_Especialidad = Especialidades.ID_Especialidad AND AgendaCitas_Especialistas.Fk_Especialista =Especialistas.ID_Especialista AND
AgendaCitas_Especialistas.Fk_Sucursal =Sucursales_Campañas.ID_SucursalC AND
AgendaCitas_Especialistas.Fk_Fecha = Fechas_Especialistas.ID_Fecha_Esp AND
AgendaCitas_Especialistas.Fk_Hora = Horarios_Citas_especialistas.ID_Horario AND
AgendaCitas_Especialistas.Fk_Costo =  Costos_Especialistas.ID_Costo_Esp AND
 Fechas_Especialistas.Fecha_Disponibilidad = CURDATE() AND
 AgendaCitas_Especialistas.Fk_Sucursal ='".$row['Fk_Sucursal']."'  AND
AgendaCitas_Especialistas.ID_H_O_D='".$row['ID_H_O_D']."' order by Horarios_Citas_especialistas.Horario_Disponibilidad ASC";

$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
	<div class="table-responsive">
	<table id="Campanas" class="table table-hover">
<thead>
   
    <th>Especialidad</th>
	<th>Paciente</th>
	<th>Telefono</th>
	<th>Sucursal</th>
    <th>Fecha | Hora</th>
	<th>Pago</th>
	<th>Estatus cita</th>
	<th>Seguimiento</th>
	

	



</thead>
<?php while ($Especialista=$query->fetch_array()):?>
<tr>
    <td><?php echo $Especialista["Nombre_Especialidad"]; ?></td>
	<td><?php echo $Especialista["Nombre_Paciente"]; ?></td>
	<td><?php echo $Especialista["Telefono"]; ?></td>
	<td><?php echo $Especialista["Nombre_Sucursal"]; ?></td>

	<td><?php echo fechaCastellano($Especialista["Fecha_Disponibilidad"]); ?><br>
	<?php echo date('h:i A', strtotime($Especialista["Horario_Disponibilidad"])); ?>
</td>
	
	<td><button class="<?echo $Especialista['Color_Pago'];?>"><?php echo $Especialista["Estatus_pago"]; ?></button></td>
	<td><button class="<?echo $Especialista['ColorEstatusCita'];?>"><?php echo $Especialista["Estatus_cita"]; ?></button></td>
	<td><button class="<?echo $Especialista['Color_Seguimiento'];?>"><?php echo $Especialista["Estatus_Seguimiento"]; ?></button>
</td>

	

	
</tr>
<?php endwhile;?>
</table>
</div>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
  <!-- Modal -->
 