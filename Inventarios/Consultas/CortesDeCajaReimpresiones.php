<script type="text/javascript">
$(document).ready( function () {
    $('#CajasSucursales').DataTable({
      "order": [[ 0, "desc" ]],
     
      "info": true,
      "lengthMenu": [[10,50,200, -1], [10,50,200, "Todos"]],   
      "language": {
        "url": "Componentes/Spanish.json"
		},
 
    
		
	  } 
	  
	  );
} );
</script>
<?php
include ("db_connection.php");
include "Consultas.php";
include "Sesion.php";

$user_id=null;
$sql1="SELECT Cajas_POS.ID_Caja,Cajas_POS.Cantidad_Fondo,Cajas_POS.Empleado,Cajas_POS.Sucursal,Cajas_POS.Estatus,Cajas_POS.CodigoEstatus,Cajas_POS.Turno,Cajas_POS.Asignacion,
Cajas_POS.Fecha_Apertura,Cajas_POS.Valor_Total_Caja,Cajas_POS.ID_H_O_D, SucursalesCorre.ID_SucursalC, SucursalesCorre.Nombre_Sucursal 
FROM Cajas_POS,SucursalesCorre where Cajas_POS.Sucursal = SucursalesCorre.ID_SucursalC AND Cajas_POS.Estatus='Cerrada'    AND Cajas_POS.Sucursal='".$row['Fk_Sucursal']."' ";
$query = $conn->query($sql1);
?>

<?php if($query->num_rows>0):?>
  <div class="text-center">
	<div class="table-responsive">
	<table  id="CajasSucursales" class="table table-hover">
<thead>
<th>Empleado</th>
<th>Cantidad inicial</th>
<th>Fecha</th>
<th>Estatus</th>
<th>Turno</th>
<th>Estado</th>
    <th >Valor en caja</th>
    <th >Acciones</th>
    
	


</thead>
<?php while ($Usuarios=$query->fetch_array()):?>
<tr>

    <td> <?php echo $Usuarios["Empleado"]; ?></td>
    <td> <?php echo $Usuarios["Cantidad_Fondo"]; ?></td>
    <td> <?php echo FechaCastellano($Usuarios["Fecha_Apertura"]); ?></td>
    <td> <button style="<?php echo $Usuarios['CodigoEstatus'];?>" class="btn btn-default btn-sm" > <?php echo $Usuarios["Estatus"]; ?></button></td>
    <td> <?php echo $Usuarios["Turno"]; ?></td>
    <td><button class="btn btn-default btn-sm" style=<?php if($Usuarios['Asignacion'] ==1){
   echo "background-color:#007bff!important";
} if($Usuarios['Asignacion'] ==2) {
  echo "background-color:#001f3f!important";
}else {
   echo "background-color:#fd7e14!important";
}
?>><?php if($Usuarios['Asignacion'] ==1){
  echo "Asignado";
} if($Usuarios['Asignacion'] ==2) {
 echo "Finalizado";
}else {
  echo "Sin asignar";
}
?></button></td>
    <td> <?php echo $Usuarios["Valor_Total_Caja"]; ?></td>

    <td>
		 <!-- Basic dropdown -->
<button   class="btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown"
  aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-list fa-1x"></i></button>

<div class="dropdown-menu">
<a data-id="<?php echo $Usuarios["ID_Caja"];?>"   class="btn-edit dropdown-item" >Reimprimir Corte <i class="fas fa-print"></i></a>


 
 
 
</div>
<!-- Basic dropdown -->
	 </td>
	
		
</tr>
<?php endwhile;?>
</table>
</div>
</div>
<?php else:?>
	<p class="alert alert-warning">No hay caja abierta</p>
<?php endif;?>
  <!-- Modal -->
  <script>
  	
      $(".btn-edit").click(function(){
    id = $(this).data("id");
    $.post("https://saludaclinicas.com/AdminPOS/Modales/CortesDeCajaReimpresion.php","id="+id,function(data){
        $("#form-edit").html(data);
        $("#Titulo").html("Corte de caja");
        $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-info");
        $("#Di").addClass("modal-dialog modal-lg modal-notify modal-warning");
    });
    $('#editModal').modal('show');
});

</script>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="editModalLabel" aria-hidden="true">
  <div id="Di"class="modal-dialog  modal-notify modal-warning">
      <div class="modal-content">
      <div class="modal-header">
         <p class="heading lead" id="Titulo"></p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>
        <div id="Mensaje "class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span id="Aviso" class="text-semibold"><?php echo $row['Nombre_Apellidos']?>
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