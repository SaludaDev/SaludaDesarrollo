<script type="text/javascript">
$(document).ready( function () {
    $('#Traspasoss').DataTable({
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
$sql1="SELECT Traspasos_generados.ID_Traspaso_Generado,Traspasos_generados.Folio_Prod_Stock,Traspasos_generados.TraspasoRecibidoPor,	Traspasos_generados.TraspasoGeneradoPor,Traspasos_generados.Num_Orden,
Traspasos_generados.Cod_Barra, Traspasos_generados.Nombre_Prod,Traspasos_generados.Fk_sucursal,Traspasos_generados.Fk_Sucursal_Destino, Traspasos_generados.Proveedor1,	Traspasos_generados.Proveedor2,
Traspasos_generados.Precio_Venta,Traspasos_generados.Precio_Compra, Traspasos_generados.Total_traspaso,Traspasos_generados.TotalVenta,Traspasos_generados.Existencias_R,Traspasos_generados.ProveedorFijo,
 Traspasos_generados.Cantidad_Enviada,Traspasos_generados.Existencias_D_envio,Traspasos_generados.FechaEntrega,Traspasos_generados.Estatus,Traspasos_generados.ID_H_O_D,
 SucursalesCorre.ID_SucursalC,SucursalesCorre.Nombre_Sucursal FROM Traspasos_generados,SucursalesCorre WHERE Traspasos_generados.Fk_sucursal = SucursalesCorre.ID_SucursalC AND 
 MONTH(Traspasos_generados.FechaEntrega) = MONTH(CURDATE())";
$query = $conn->query($sql1);
?>

<!-- Central Modal Medium Info -->
<div class="modal fade" id="ConsultaTraspasos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-="true" style="overflow-y: scroll;">
   <div class="modal-dialog modal-xl modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">Consulta de producto</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-="true" class="white-text">&times;</span>
         </button>
       </div>
     
       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
       
         <?php if($query->num_rows>0):?>
  <div class="text-center">
	<div class="table-responsive">
	<table  id="Traspasoss" class="table table-hover">
<thead>

<th>Clave</th>
<th>Codigo de barras</th>
<th>Nombre producto</th>

<th>Sucursal origen</th>
    <th>Sucursal destino</th>
    <th>Estatus</th>
    

    


</thead>
<?php while ($Usuarios=$query->fetch_array()):?>
<tr>

<td > <?php echo $Usuarios['ID_Traspaso_Generado']; ?></td>
<td > <?php echo $Usuarios['Cod_Barra']; ?></td>
<td > <?php echo $Usuarios['Nombre_Prod']; ?></td>
  <td > <?php echo $Usuarios['Nombre_Sucursal']; ?></td>
  <td > <?php echo $Usuarios['Fk_Sucursal_Destino']; ?>
  </td>
  <td >  <button class="btn btn-default btn-sm" style=<?php if($Usuarios["Estatus"] =="Generado"){
   echo "background-color:#00c851!important";
} else {
   echo "background-color:#fd7e14!important";
}?>><?php if($Usuarios["Estatus"] =="Autorizado"){
    echo "Autorizado";
 } else {
    echo "Error";
 }?></button> </td>

	
		
</tr>
<?php endwhile;?>
</table>
</div>
</div>
<?php else:?>
	<p class="alert alert-warning">Aún no hay traspasos registrados para <?echo $row['ID_H_O_D']?></p>
<?php endif;?>
 
                                      
         
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 </div>


 