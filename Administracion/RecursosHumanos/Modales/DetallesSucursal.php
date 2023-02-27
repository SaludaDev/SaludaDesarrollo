<?
include "../Consultas/db_connection.php";
include "../Consultas/Consultas.php";
include "../Consultas/Sesion.php";
$user_id=null;
$sql1= "SELECT * FROM SucursalesCorre WHERE ID_SucursalC = ".$_POST["id"];
$query = $conn->query($sql1);
$Especialistas = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $Especialistas=$r;
  break;
}

  }
?>

<? if($Especialistas!=null):?>



<div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Nombre Sucursal </label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta"><i class="fas fa-receipt"></i></span>
  </div>
  <input type="text" class="form-control " readonly  value="<? echo $Especialistas->Nombre_Sucursal; ?>" aria-describedby="basic-addon1" maxlength="60">
    </div>
    </div>
    
    <div class="col">
      
    <label for="exampleFormControlInput1">Telefono <span class="text-danger">*</span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  
    <span class="input-group-text" id="Tarjeta"><i class="fas fa-file-signature"></i></span>
  </div>
  <input type="number" class="form-control "readonly  value="<? echo $Especialistas->Telefono; ?>" aria-describedby="basic-addon1" >            
</div></div></div>
<div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Agregado por</label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta"><i class="fas fa-receipt"></i></span>
  </div>
  <input type="text" class="form-control " readonly  value="<? echo $Especialistas->Agrego; ?>" aria-describedby="basic-addon1" maxlength="60">
    </div>
    </div>
    
    <div class="col">
      
    <label for="exampleFormControlInput1">Sistema <span class="text-danger">*</span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  
    <span class="input-group-text" id="Tarjeta"><i class="fas fa-file-signature"></i></span>
  </div>
  <input type="text" class="form-control " readonly value="<? echo $Especialistas->Sistema; ?>" aria-describedby="basic-addon1" >            
</div></div></div>
                          


<? else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<? endif;?>
