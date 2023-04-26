<script type="text/javascript">
$(document).ready( function () {
    var printCounter = 0;
    $('#MovimientosAreasCreditos').DataTable({
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
        dom: "B<'#colvis row'><'row'><'row'<'col-md-6'l><'col-md-6'f>r>t<'bottom'ip><'clear'>'",
          buttons:[ 
			{
				extend:    'excelHtml5',
				text:      'Exportar a Excel  <i Exportar a Excel class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                title: 'Movimientos  de áreas ',
				className: 'btn btn-success'
			},
			
		
          
            
        ],
   
	   
        	        
    });     
});
   
	  
	 
</script>
<?
include "../Consultas/db_connection.php";
include "../Consultas/Consultas.php";
include "../Consultas/Sesion.php";

$user_id=null;
$sql1= "SELECT * FROM `Areas_Credit_POS_Audita` WHERE ID_H_O_D='".$row['ID_H_O_D']."' AND ID_Area_Cred = ".$_POST["id"];
$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
  <div class="text-center">
	<div class="table-responsive">
	<table  id="MovimientosAreasCreditos" class="table table-hover">
<thead>
  
    <th>N°</th>
    <th>Folio area credito</th>
    <th>Nombre de credito</th>
    <th>Estatus</th>
    <th>Agrego|modifico</th>
    <th>Fecha | Hora</th>
    <th>Sistema</th>
    
    
	


</thead>
<?php while ($Categorias=$query->fetch_array()):?>
<tr>
<td > <?php echo $Categorias["ID_Audita_Ar_Cred"]; ?></td>
<td > <?php echo $Categorias["ID_Area_Cred"]; ?></td>
  <td > <?php echo $Categorias["Nombre_Area"]; ?> </td>
  <td > <?php echo $Categorias["Estatus"]; ?></td>
  <td > <?php echo $Categorias["Agrega"]; ?></td>
  <td > <?php echo $Categorias["Agregadoel"]; ?></td>
  <td > <?php echo $Categorias["Sistema"]; ?></td>


		
</tr>
<?php endwhile;?>
</table>
</div>
</div>
<?php else:?>
	<p class="alert alert-warning">Por el momento no se han realizado movimientos</p>
<?php endif;?>