<?
include "../Consultas/db_connection.php";
include "../Consultas/Consultas.php";
include "../Consultas/Sesion.php";
$user_id=null;
$sql1= "SELECT Fechas_EspecialistasV2.ID_Fecha_Esp,Fechas_EspecialistasV2.Fecha_Disponibilidad,Fechas_EspecialistasV2.ID_H_O_D, 
Fechas_EspecialistasV2.FK_Especialista,Fechas_EspecialistasV2.Estatus_fecha,Fechas_EspecialistasV2.CodigoColorFe,EspecialistasV2.ID_Especialista,EspecialistasV2.Nombre_Apellidos 
FROM Fechas_EspecialistasV2,EspecialistasV2 WHERE 
Fechas_EspecialistasV2.FK_Especialista = EspecialistasV2.ID_Especialista AND ID_Fecha_Esp = ".$_POST["id"];
$query = $conn->query($sql1);
$Fechas = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $Fechas=$r;
  break;
}

  }
?>

<? if($Fechas!=null):?>

<form action="javascript:void(0)" method="post" id="ActualizaFecha" >
<label for="exampleFormControlInput1">Nombre Especialista</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  
    <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $Fechas->Nombre_Apellidos; ?>" readonly  aria-describedby="basic-addon1">
</div>

<label for="exampleFormControlInput1">Fecha</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  
    <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="date" class="form-control" value="<? echo $Fechas->Fecha_Disponibilidad; ?>" aria-describedby="basic-addon1">
</div>
<label for="exampleFormControlInput1">Estatus actual</label>
  
<div>
  <button class="btn btn-default btn-sm" style="<?php echo $Fechas->CodigoColorFe; ?>"><? echo $Fechas->Estatus_fecha; ?></button>
  
</div>
<label for="exampleFormControlInput1">Estatus despues de cambio</label>
  
<div>
  <button class="btn btn-default btn-sm" style="background-color:#80391e !important">Vencido</button>
  
</div>

<input type="hidden" class="form-control" id="estatus"   name="Estatus"  value="<? echo $Fechas->Estatus_fecha; ?>">
<input type="hidden" name="id" id="id" value="<?php echo $Fechas->ID_Fecha_Esp; ?>">
<button type="submit"  name="submit" id="submit"  class="btn btn-primary">Aplicar cambios <i class="fas fa-save"></i></button>
                          
</form>

<script src="js/EditaFecha.js"></script>

<? else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<? endif;?>