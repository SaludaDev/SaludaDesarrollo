<?
include "../Consultas/db_connection.php";
include "../Consultas/Consultas.php";
include "../Consultas/Sesion.php";
include "../Consultas/BBB.php";

$user_id=null;
$sql1= "SELECT * from Signos_VitalesV2 where ID_SignoV = ".$_POST["id"];
$query = $conn->query($sql1);
$datapacientes = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $datapacientes=$r;
  break;
}

  }
?>

<? if($datapacientes!=null):?>

<form action="javascript:void(0)" method="post" id="ConfPac" >

<div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Folio único del paciente <span class="text-danger"> * </span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" disabled class="form-control" value="<? echo $datapacientes->Folio_Paciente; ?>" name="Folio" id="folio" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Nombre del paciente <span class="text-danger"> * </span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Nombre_Paciente; ?>" readonly name="Nombres" id="nombres" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
    
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Motivo consulta <span class="text-danger"> * </span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Motivo_Consulta; ?>"  readonly name="Tel" id="tel" aria-describedby="basic-addon1">
</div>
<small>Si el usuario no tiene telefono colocar S/T</small>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Fecha de registro <span class="text-danger"> * </span></label>
    
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" readonly value="<? echo fechaCastellano($datapacientes->Fecha_Visita); ?> <? echo  date('h:i A', strtotime($datapacientes->Fecha_Visita)); ?>" name="Correo" id="correo" aria-describedby="basic-addon1">
 
</div>
<small>Si el usuario no tiene correo colocar S/C</small>
    </div>
    </div>
     <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Sexo</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Sexo; ?>" readonly name="Sexo" id="sexo" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Alergias</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" readonly value="<? echo $datapacientes->Alergias; ?>" oninput="actualizarAlergias()" name="Alergias" id="alergias" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
    <input type="hidden" name="id" id="id"value="<?php echo $datapacientes->ID_SignoV; ?>">
<button type="submit"  name="submit" id="submit"  class="btn btn-success">Generar receta <i class="fas fa-file-prescription"></i></button>
                          
</form>
   

                          
</form>

<!-- FORMULARIO FINAL -->
<form action="Recetario" method="post" id="Recetariofrm" >

<div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Folio único del paciente <span class="text-danger"> * </span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" disabled class="form-control" value="<? echo $datapacientes->Folio_Paciente; ?>" name="Folio" id="folio" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Nombre del paciente <span class="text-danger"> * </span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Nombre_Paciente; ?>" readonly name="Nombres" id="nombres" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
    
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Motivo consulta <span class="text-danger"> * </span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Motivo_Consulta; ?>"  readonly name="Tel" id="tel" aria-describedby="basic-addon1">
</div>
<small>Si el usuario no tiene telefono colocar S/T</small>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Fecha de registro <span class="text-danger"> * </span></label>
    
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" readonly value="<? echo fechaCastellano($datapacientes->Fecha_Visita); ?> <? echo  date('h:i A', strtotime($datapacientes->Fecha_Visita)); ?>" name="Correo" id="correo" aria-describedby="basic-addon1">
 
</div>
<small>Si el usuario no tiene correo colocar S/C</small>
    </div>
    </div>
     <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Sexo</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Sexo; ?>" readonly name="Sexo" id="sexo" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Alergias</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" readonly value="<? echo $datapacientes->Alergias; ?>" oninput="actualizarAlergias()" name="Alergias" id="alergias" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
    <input type="hidden" name="idpaciente" id="idpaciente"value="<?php echo $datapacientes->ID_SignoV; ?>">
<button type="submit"  name="Avanzar" id="avanzar"  class="btn btn-success">Continuar<i class="fas fa-user-check"></i></button>
                          
</form>
   

                          
</form>
<!-- FORMULARIO DE ENVIO FINAL -->
</div>
<script src="js/Confirma.js"></script>
<? else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<? endif;?>
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