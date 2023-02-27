<script type="text/javascript">
$(document).ready( function () {
    $('#SignosVitales').DataTable({
        "sort": true, 
 "order" : [[0,"desc"]],
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
FROM Signos_VitalesV2,SucursalesCorre where Signos_VitalesV2.Nombre_Doctor='".$row['Nombre_Apellidos']."' and Signos_VitalesV2.Fk_Sucursal = SucursalesCorre.ID_SucursalC 
AND Signos_VitalesV2.FK_ID_H_O_D='".$row['ID_H_O_D']."' ORDER BY `Signos_VitalesV2`.`ID_SignoV` DESC";  
$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
  <div class="text-center">
	<div class="table-responsive">
	<table id="SignosVitales" class="table ">
<thead>
<th>Cita </th>
    <th>Nombre </th>
    
    <th>Motivo consulta </th>
    <th>Registrado </th>
  
    <th>Estatus </th>
      <th>Atender paciente </th>
	
	


</thead>
<?php while ($DataPacientes=$query->fetch_array()):?>
<tr>
<td><?php echo $DataPacientes["ID_SignoV"]; ?></td>
    <td><?php echo $DataPacientes["Nombre_Paciente"]; ?></td>
    
    <td><?php echo $DataPacientes["Motivo_Consulta"]; ?></td>
    <td><?php echo fechaCastellano($DataPacientes["Fecha_Visita"]); ?> <br>
       <?php echo date('h:i A', strtotime($DataPacientes["Fecha_Visita"])); ?></td>
   
   
    <td><button class="btn btn-default btn-sm" style="<?echo $DataPacientes['CodigoEstatus'];?>"><?php echo $DataPacientes["Estatus"]; ?></button></td>
	 
    <td><button data-id="<?php echo  $DataPacientes["ID_SignoV"];?>" type="button" class=" btn-edit btn btn-success"   class="btn btn-default">
    <i class="fas fa-diagnoses"></i>
  </button></td>
 

	
		
</tr>
<?php endwhile;?>
</table>
</div></div></div></div>
<?php else:?>
	<p class="alert alert-warning">Aún no hay pacientes registrados</p>
<?php endif;?>
  <!-- Modal -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.post("https://controlconsulta.com/Medicos/Modales/AsignaPaciente.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true"  style="overflow-y: scroll;">
  <div class="modal-dialog modal-lg modal-notify modal-success" >
      <div class="modal-content">
      <div class="modal-header">
         <p class="heading lead" id="TituloModal">Datos de paciente</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>
        <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold"><?echo $row['Nombre_Apellidos']?>, </span>
                            Verifique que el paciente sea el correcto
                            
						                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                           
	        <div class="modal-body">
          <div class="text-center">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
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