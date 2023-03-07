<script type="text/javascript">
$(document).ready( function () {
    $('#SalidaEmpleados').DataTable({
      "order": [[ 3, "asc" ]],
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
          dom: "B<'#colvis row'><'row'><'row'<'col-md-6'l><'col-md-6'f>r>t<'bottom'ip><'clear'>'",
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      'Exportar a Excel  <i Exportar a Excel class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
                title: 'Entradas del personal ',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      'Exportar a PDF <i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
                title: 'Entradas del personal ',
				className: 'btn btn-danger '
			},
		
        ],
       
   
	   
        	        
    });     
});
   
	  
	 
</script>
<?php
include("db_connection.php");
include "Consultas.php";
include "Sesion.php";

$user_id=null;
$sql1="SELECT * FROM Reloj_ChecadorV2 WHERE DATE(Fecha_Registro) = DATE_FORMAT(CURDATE(),'%Y-%m-%d')  UNION ALL SELECT * FROM Reloj_ChecadorV2_Salidas WHERE DATE(Fecha_Registro) = DATE_FORMAT(CURDATE(),'%Y-%m-%d') ORDER BY Nombre";
$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
  <div class="text-center">
	<div class="table-responsive">
	<table  id="SalidaEmpleados" class="table table-hover">
<thead>
  
    <th>Usuario</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Sucursal</th>
    <th>Turno</th>
    <th>Área</th>
    <th>Tipo registro</th>
    <th>Retardo</th>


</thead>
<?php while ($Usuarios=$query->fetch_array()):?>
<tr>
  <td > <?php echo $Usuarios["Nombre"]; ?></td>
  <td><?php echo FechaCastellano($Usuarios["Fecha_Registro"]); ?></td>
    <td><?php echo date('h:i A', strtotime(($Usuarios["Hora_Registro"]))); ?></td>
    <td><?php echo $Usuarios["Sucursal"]; ?></td>
    <td>Matutino</td>
    <td><?php echo $Usuarios["Area"]; ?></td>
    <td><?php echo $Usuarios["TipoMovimiento"]; ?></td>
    <td>SI</td>
		
</tr>
<?php endwhile;?>
</table>
</div>
</div>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
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