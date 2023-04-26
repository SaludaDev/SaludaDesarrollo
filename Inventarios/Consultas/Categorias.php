<script type="text/javascript">
$(document).ready( function () {
    $('#IngresoEmpleados').DataTable({
      "order": [[ 0, "desc" ]],
      "lengthMenu": [[25,50, 150, 200, -1], [25,50, 150, 200, "Todos"]],   
        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
          
        //para usar los botones   
        responsive: "true",
          dom: "<'#colvis row'><'row'><'row'<'col-md-6'l><'col-md-6'f>r>t<'bottom'ip><'clear'>'",
       
   
	   
        	        
    });     
});
   
	  
	 
</script>
<?php

include("db_connection.php");
include "Consultas.php";
include "Sesion.php";

$user_id=null;
$sql1="SELECT * FROM `Categorias_POS` WHERE ID_H_O_D='".$row['ID_H_O_D']."'";
$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
  <div class="text-center">
	<div class="table-responsive">
	<table  id="IngresoEmpleados" class="table table-hover">
<thead>
  
    <th>N°</th>
    <th>Categoria</th>
    <th>Estatus</th>
    <th>Agregado el</th>
    <th>Acciones</th>
    
	


</thead>
<?php while ($Categorias=$query->fetch_array()):?>
<tr>
<td > <?php echo $Categorias["Cat_ID"]; ?></td>
  <td > <?php echo $Categorias["Nom_Cat"]; ?></td>
  <td> <button style="<?echo $Categorias['Cod_Estado'];?>" class="btn btn-default btn-sm" > <?php echo $Categorias["Estado"]; ?></button></td>
  <td > <?php echo fechaCastellano($Categorias["Agregadoel"]); ?></td> 
  <td>
		 <!-- Basic dropdown -->
<button class="btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ul"></i></button>

<div class="dropdown-menu">
<a data-id="<?php echo $Categorias["Cat_ID"];?>" class="btn-edit dropdown-item" >Editar datos <i class="fas fa-pencil-alt"></i></a>
  <a data-id="<?php echo $Categorias["Cat_ID"];?>" class="btn-edit2 dropdown-item" >Detalles <i class="fas fa-info-circle"></i></a>
  <a data-id="<?php echo $Categorias["Cat_ID"];?>" class="btn-historial dropdown-item" >Movimientos <i class="fas fa-history"></i></a>
 
 
 
</div>
<!-- Basic dropdown -->
	 </td>
     
		
</tr>
<?php endwhile;?>
</table>
</div>
</div>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>

<script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.post("https://saludaclinicas.com/AdminPOS/Modales/EditaCategoria.php","id="+id,function(data){
  			$("#form-edit").html(data);
          $("#Titulo").html("Editar datos de categoría");
              $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-info");
              $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-danger");
              $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-primary");
              $("#Di").removeClass("modal-dialog modal-xl modal-notify modal-primary");
              $("#Di").addClass("modal-dialog  modal-notify modal-info");
  		});
  		$('#editModal').modal('show');
  	});
    $(".btn-edit2").click(function(){
  		id = $(this).data("id");
  		$.post("https://saludaclinicas.com/AdminPOS/Modales/DetallesCategoria.php","id="+id,function(data){
              $("#form-edit").html(data);
              $("#Titulo").html("Detalles de categoría ");
              $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-info");
              $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-danger");
              $("#Di").removeClass("modal-dialog modal-xl modal-notify modal-primary");
              $("#Di").addClass("modal-dialog modal-notify modal-primary");
  		});
  		$('#editModal').modal('show');
    });
    $(".btn-historial").click(function(){
  		id = $(this).data("id");
  		$.post("https://saludaclinicas.com/AdminPOS/Modales/HistorialCategorias.php","id="+id,function(data){
              $("#form-edit").html(data);
              $("#Titulo").html("Actualizaciones y ediciones realizadas");
              $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-info");
              $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-danger");
              $("#Di").addClass("modal-dialog modal-xl modal-notify modal-primary");
  		});
  		$('#editModal').modal('show');
    });
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="editModalLabel" aria-hidden="true">
  <div id="Di"class="modal-dialog modal-lg modal-notify modal-info">
      <div class="modal-content">
      <div class="modal-header">
         <p class="heading lead" id="Titulo"></p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>
        <div id="Mensaje "class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span id="Aviso" class="text-semibold"> <i class="fas fa-info-circle"></i> <?php echo $row['Nombre_Apellidos']?>, 
                            Verifique los campos antes de realizar alguna accion</span>
						                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
	        <div class="modal-body">
          <div class="text-center">
        <div id="form-edit"></div>
        
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
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