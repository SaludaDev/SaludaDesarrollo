<?
include "../Consultas/db_connection.php";
include "../Consultas/Consultas.php";
include "../Consultas/Sesion.php";
$user_id=null;
$sql1= "select * from Data_Pacientes where ID_Data_Paciente = ".$_POST["id"];
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

<form action="javascript:void(0)" method="post" id="ActualizaEspecialista" >
<div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Folio único del paciente</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" disabled class="form-control" value="<? echo $datapacientes->ID_Data_Paciente; ?>" name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Nombre del paciente</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Nombre_Paciente; ?>" name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Edad</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Edad; ?>" name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Sexo</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control" value="<? echo $datapacientes->Sexo; ?>" name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
  
 
     <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Peso</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Talla</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Temperatura</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">FC</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">F.R</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">T.A</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    </div>

   

    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">IMC</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">SA02</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">DXTX</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Motivo de consulta</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <input type="text" class="form-control"  name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
</div>
    </div>
    </div>

  

    <input type="text" class="form-control" value="<? echo $datapacientes->Telefono; ?>" hidden name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
  <input type="date" class="form-control" value="<? echo $datapacientes->Fecha_Nacimiento; ?>" hidden name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
  <input type="text" class="form-control" value="<? echo $datapacientes->Correo; ?>" hidden name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
  <input type="text" class="form-control" value="<? echo $datapacientes->Alergias; ?>" hidden name="ActualizaNombre" id="Nombre" aria-describedby="basic-addon1">
<input type="hidden" name="id" value="<?php echo $datapacientes->ID_Especialista; ?>">
<button type="submit"  name="submit" id="submit"  class="btn btn-success">Confirmar datos <i class="fas fa-user-check"></i></button>
                          
</form>

<script src="js/EditaEspecialista.js"></script>

<? else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<? endif;?>