<script type="text/javascript">
$(document).ready( function () {
    $('#PacientesData').DataTable({
      "order": [[ 0, "desc" ]],
      "lengthMenu": [[15,30,100 -1], [15,30,100]],   
      "language": {
        "url": "Componentes/Spanish.json"
		}
		
	  } 
	  
	  );
} );
</script>
<?php

include ("db_connection.php");
include "Consultas.php";
include "Sesion.php";

$user_id=null;
$sql1="SELECT ID_Data_Paciente,Nombre_Paciente,Edad,Sexo,FK_ID_H_O_D,Telefono,Correo
FROM Data_Pacientes WHERE FK_ID_H_O_D ='".$row['ID_H_O_D']."' ORDER BY ID_Data_Paciente DESC";
$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
	<div class="table-responsive">
	<table id="PacientesData" class="table ">
<thead>
    <th>Folio</th>
    <th>Nombre </th>
    <th>Edad </th>
    <th>Sexo </th>
    <th>Telefono </th>
    
	  <th>Acciones </th>
	


</thead>
<?php while ($DataPacientes=$query->fetch_array()):?>
<tr>
    <td><?php echo $DataPacientes["ID_Data_Paciente"]; ?></td>
    <td><?php echo $DataPacientes["Nombre_Paciente"]; ?></td>
    <td><?php echo $DataPacientes["Edad"]; ?></td>
    <td><?php echo $DataPacientes["Sexo"]; ?></td>
    <td><?php echo $DataPacientes["Telefono"]; ?></td>

  <td><button data-id="<?php echo  $DataPacientes["ID_Data_Paciente"];?>" type="button" class=" btn-edit btn btn-success"   class="btn btn-default">
  Toma de signos vitales <i class="fas fa-file-medical"></i>  
  </button></td>
  
	
		
</tr>
<?php endwhile;?>
</table>
</div>
<?php else:?>
	<p class="alert alert-warning">Aún no hay pacientes registrados</p>
<?php endif;?>
  <!-- Modal -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.post("https://controlconsulta.com/Enfermeria2/Modales/SignosVitalesAlta.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-notify modal-success">
      <div class="modal-content">
      <div class="modal-header">
         <p class="heading lead">Captura de signos vitales de paciente</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>
        <div class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span class="text-semibold">Estimado usuario, </span>
                            Antes iniciar el proceso de captura de datos de signos vitales del paciente, se requiere una previa confirmación de sus datos, por favor verifica los campos antes de continuar.
						                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
	        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->