<?php
include "Consultas/Consultas.php";
include "Consultas/Sesion.php";
include "Consultas/Conexion_selects.php";
include "Consultas/ConeSelectDinamico.php";
$ElPaciente = $_POST['idpaciente'];
$sql1="SELECT * FROM Signos_VitalesV2 WHERE ID_SignoV = $ElPaciente AND FK_ID_H_O_D ='".$row['ID_H_O_D']."'";
$query = $conn->query($sql1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Recetario medico <?echo $row['Nombre_Sucursal']?></title>

  <? include "Header.php"?>
</head>
<?include_once ("Menu.php")?>



  <div class="card text-center">
  <div class="card-header" style="background-color:#0195AF !important;color: white;">
 Consulta medica por <?echo $row['Nombre_Apellidos']?>  <?php echo FechaCastellano(date('d-m-Y H:i:s')); ?>  
  </div>
 
  <div >
  
</div>
  <div >
 
</div>

</div>
<div class="col-md-12">
<table class="table">
  <thead>
    <tr>
    <?php if($query->num_rows>0):?>
      <?php while ($Sucursales=$query->fetch_array()):?>
      <th scope="col">Nombre : <?php echo $Sucursales["Nombre_Paciente"]; ?> </th>
      <th scope="col">Sexo : <?php echo $Sucursales["Sexo"]; ?></th>
      <th scope="col">Edad : <?php echo $Sucursales["Edad"]; ?> </th>
      
    </tr>
   
  </thead>
  <tbody>
    
    
  </tbody>
</table>
<div class="card text-center">
 
<div class="row">
  <div class="col-sm-3">
  <div class="card" style="width: 25rem;">

  <ul class="list-group list-group-flush">
  <li class="list-group-item" style="background-color:#0195AF !important;color: white;">Signos vitales del paciente </li>
    <li class="list-group-item">Temperatura : <br> <?php echo $Sucursales["Temp"]; ?> <small>°C</small>  </li>
    <li class="list-group-item">F.C : <?php echo $Sucursales["FC"]; ?> <small>lmp</small>   </li>
    <li class="list-group-item">F.R : <?php echo $Sucursales["FR"]; ?> <small>rpm</small> </li>
    <li class="list-group-item">T.A :<?php echo $Sucursales["TA"]; ?> / <?php echo $Sucursales["TA2"]; ?> <small>mmHg</small></li>
    <li class="list-group-item">IMC : <?php echo number_format($Sucursales["IMC"],2); ?> <small>kg/m2</small> </li>
    <li class="list-group-item">Estatus IMC : <?php echo $Sucursales["Estatus_IMC"]; ?></li>
    <li class="list-group-item">SaO2 :<?php echo $Sucursales["Sa02"]; ?> <small>%</small></li>
    <li class="list-group-item">DxTx : <?php echo $Sucursales["DxTx"]; ?> <small>mg/m2</small></li>
    <li class="list-group-item">Alergias :<?php echo $Sucursales["Alergias"]; ?></li>
    <li class="list-group-item" style="background-color:#0195AF !important;color: white;"></li>
  </ul>
  <?php endwhile;?>
    <?php endif;?>
</div>
  </div>
  <div class="col-md-6">
   

  

  <div class="card">
      <div class="text-center">
    <div class="card-header" style="background-color:#0195AF !important;color: white;">
    Datos de la receta
  </div>
  </div>
      <div class="card-body">
      
        <div class="form-group">
    <label for="exampleFormControlTextarea1">Introduzca el Dx:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Introduzca el Tx:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <b>¿Requiere ingreso?</b>
<input type="checkbox" name="check" id="ingreso" value="1" onchange="javascript:MuestraIngreso()" /> <br>
<div id="FormIngreso" style="display: none;">
<div class="form-group">
    <label for="exampleFormControlTextarea1">Introduzca el Tx:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  </div>
<b>Aplicacion de procedimientos</b>
<input type="checkbox" name="check" id="procedimientos" value="1" onchange="javascript:MuestraProcedimiento()" /> <br>
<div id="FormProcedimientos" style="display: none;">
<div class="form-group">
    <label for="exampleFormControlTextarea1">Introduzca el Tx:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  </div>
  <b>Solicitar analisis clinicos</b>
<input type="checkbox" name="check" id="analisis" value="1" onchange="javascript:MuestraAnalisis()" /> <br>
<div id="FormAnalisis" style="display: none;">
<div class="form-group">
    <label for="exampleFormControlTextarea1">Introduzca el Tx:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  </div>
  <b>¿Agendar cita con especialista?</b>
<input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
<!-- INICIA DATA DE AGENDA -->

<div id="content" style="display: none;">
<div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Sucursal</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select id = "sucursal" class = "form-control" name = "Sucursal" >
                                               <option value="">Seleccione una Sucursal:</option>
        <?
          $query = $conn -> query ("SELECT ID_SucursalC,Nombre_Sucursal,ID_H_O_D FROM Sucursales_CampañasV2 WHERE Estatus_Sucursal='Vigente' AND ID_H_O_D='".$row['ID_H_O_D']."'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[ID_SucursalC].'">'.$valores[Nombre_Sucursal].'</option>';
          }
        ?>  </select>
</div>
<label for="sucursal" class="error">
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Especialidad</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "especialidad" name = "Especialidad"  class = "form-control" disabled = "disabled" >
								<option value = "">Selecciona una especialidad</option>
							</select>
</div>
<label for="especialidad" class="error">
    </div>
    
    </div>
              
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Medico</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "medico" name = "Medico"  class = "form-control " disabled = "disabled" >
								<option value = "">Selecciona un medico</option>
							</select>
</div>
<label for="medico" class="error">
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Fecha</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "fecha" name = "Fecha"  class = "form-control " disabled = "disabled" >
								<option value = "">Selecciona una fecha</option>
							</select>
</div>
<label for="fecha" class="error">
    </div>
   
    </div>
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Hora </label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "hora" name = "Hora"  class = "form-control" disabled = "disabled" >
								<option value = "">Selecciona una hora</option>
							</select>
</div>
<label for="hora" class="error">
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Costo</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select  id = "costo" name = "Costo"  class = "form-control" disabled = "disabled" >
								<option value = "">Selecciona un costo</option>
							</select>
</div>
<label for="costo" class="error">
    </div>
    </div>
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Tipo de consulta </label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <select name="TipoConsulta" class="form-control form-control-sm" id="tipoconsulta" >
									  <option value="">Elige un tipo de consulta</option>
				
              <option  value="Primera vez">Primera vez</option>		
              <option  value="Revaloración">Revaloración</option>						  
						 </select>
</div>
<label for="tipoconsulta" class="error">
    </div>
    <div class="col">
    <label for="exampleFormControlInput1">Observaciones</label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  <span class="input-group-text" id="Tarjeta"><i class="far fa-address-card"></i></span>
  </div>
  <textarea id="observaciones" class="form-control form-control-sm"  name="Observaciones" rows="2" cols="50">
  </textarea>
</div>
    </div>
    </div>
    </div>
<!-- FINALIZA DATA DE AGENDA -->
      </div>
      <li class="list-group-item" style="background-color:#0195AF !important;color: white;"></li>
      
    </div>
 
  </div>
 
  <div class="col-md-3">
    <div class="card">
      <div class="text-center">
    <div class="card-header" style="background-color:#0195AF !important;color: white;">
    Historial del px
  </div>
  </div>
      <div class="card-body">
      
      <div id="sv"></div>
      </div>
<div class="card-footer text-muted" style="background-color:#0195AF !important;color: white;">
</div>
   
  </div>
  </div></div>
<div class="card-footer text-muted" style="background-color:#0195AF !important;color: white;">
</div>

</div>

</div>








  <!-- Main Footer -->
  <?php 
include ("Modales/AltaCitaSucursal.php");
include ("Modales/Exito.php");
  include ("footer.php");?>
<!-- ./wrapper -->

<script src="js/ComplementoRecetas.js"></script>
<script src="js/ControlSignosVitalesPacienteHistorial.js"></script>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>


</body>
</html>
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

