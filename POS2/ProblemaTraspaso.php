<?php
 $IdBusqueda=base64_decode($_GET['traspasoid']);
include "Consultas/Consultas.php";
include "Consultas/Sesion.php";
include "Consultas/AnalisisIndex.php";
$fcha = date("Y-m-d");
$user_id=null;
$sql1= "SELECT Traspasos_generados.ID_Traspaso_Generado,Traspasos_generados.Folio_Prod_Stock,Traspasos_generados.Fk_SucDestino,Traspasos_generados.ID_Prod_POS,
Traspasos_generados.Cod_Barra, Traspasos_generados.Nombre_Prod,Traspasos_generados.Fk_sucursal,Traspasos_generados.Fk_Sucursal_Destino, 
Traspasos_generados.Precio_Venta,Traspasos_generados.Precio_Compra, Traspasos_generados.Total_traspaso,Traspasos_generados.TotalVenta,Traspasos_generados.Existencias_R,
 Traspasos_generados.Cantidad_Enviada,Traspasos_generados.Existencias_D_envio,Traspasos_generados.FechaEntrega,Traspasos_generados.Estatus,Traspasos_generados.ID_H_O_D,
 SucursalesCorre.ID_SucursalC,SucursalesCorre.Nombre_Sucursal FROM Traspasos_generados,SucursalesCorre WHERE Traspasos_generados.Fk_sucursal = SucursalesCorre.ID_SucursalC AND 
 Traspasos_generados.ID_Traspaso_Generado = $IdBusqueda";
$query = $conn->query($sql1);
$Especialistas = null;
if($query->num_rows>0){ 
while ($r=$query->fetch_object()){
  $Especialistas=$r;
  break;
}
  }
?>
<!DOCTYPE html>
<html lang="es">
<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Reportar problema con traspaso</title>

<?include "Header.php"?>
 <style>
        .error {
  color: red;
  margin-left: 5px; 
  
}

    </style>
</head>
<?include_once ("Menu.php")?>
<? if($Especialistas!=null):?>
  <div class="card text-center">
  <div class="card-header" style="background-color:#2b73bb !important;color: white;">
  Marcando observación para el traspaso número  <? echo $Especialistas->ID_Traspaso_Generado; ?> con el nombre de producto <? echo $Especialistas->Nombre_Prod; ?>
 
  </div>
  <div >
  <a type="button" class="btn btn-outline-info btn-sm" href='https://controlfarmacia.com/POS2/ListadoDeTraspasos' class="btn btn-default">
  <i class="fas fa-long-arrow-alt-left fa-lg"></i> Regresar a traspasos 
</a>

</div> 
<div class="col-md-12">
  <div class="card-body">
  <div class="" id="Ok" role="alert">
 
  </div>
    <form  id="ProblemaConTraspasoRealizado">
         <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Codigo de barra <span class="text-danger">*</span> </label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta"><i class="fas fa-barcode"></i></span>
  </div>
  <input type="text" class="form-control" name="CodBarra" id="codbarra" readonly  value="<? echo $Especialistas->Cod_Barra; ?>" >
    </div>
    </div>
    
   
<div class="col">
    <label for="exampleFormControlInput1">Nombre / Descripcion<span class="text-danger">*</span></label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta"><i class="fas fa-pen-square"></i></span>
  </div>
  <input type="text" class="form-control " readonly   value="<? echo $Especialistas->Nombre_Prod; ?>" >
    </div><label for="nombreprod" class="error">
    </div>
</div>

   
    <!-- DATA IMPORTANTE -->
    <div class="row">
    <div class="col">
      
    <label for="exampleFormControlInput1">Cantidad enviada <span class="text-danger">*</span></label>
     <div class="input-group mb-3">
  <div class="input-group-prepend">
  
    <span class="input-group-text" id="Tarjeta"><i class="fas fa-mobile"></i></span>
  </div>
  <input type="text" class="form-control " readonly name="CantidadEnviada" id="enviado" value="<? echo $Especialistas->Cantidad_Enviada; ?>" >
</div><label for="pv" class="error"></div>


    <div class="col">
    <label for="exampleFormControlInput1">Cantidad recibida <span class="text-danger">*</span></label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta"><i class="fas fa-at"></i></span>
  </div>
  <input type="number" class="form-control " name="CantidadRecibida" id="recibido" onchange="habilitar()"name="recibido" >

  <input type="text" class="form-control " readonly hidden name="IDTraspaso" id="idtraspaso" value="<? echo $Especialistas->ID_Traspaso_Generado ?>" >
  <input type="text" class="form-control " readonly hidden name="SucursalTrigger" id="" value="<? echo $Especialistas->Fk_SucDestino ?>" >
  <input type="text" class="form-control " readonly hidden name="IDProductos" id="" value="<? echo $Especialistas->ID_Prod_POS ?>" >



    </div><label for="pc" class="error">
    </div>
   
    <script>
      function habilitar()

{

    var camp1= document.getElementById('recibido');
    var camp2= document.getElementById('enviado');
    var boton= document.getElementById('EnviarDatos');

    if (camp1.value == camp2.value) {
     
      document.getElementById("Ok").className = "alert alert-danger";
        document.getElementById("Ok").innerHTML="Los valores recepcionados coinciden con el valor enviado, por favor regrese a su listado de traspasos y seleccione la opcion de aceptar traspaso";
       
        boton.disabled = true;
    }else {
        boton.disabled = false;
     
       
    }
}
    </script>
    </div>
  
    <div class="row">
    <div class="col">
    <label for="exampleFormControlInput1">Origen <span class="text-danger">*</span> </label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta"><i class="fas fa-map-marked-alt"></i></span>
  </div>
  <input type="text" class="form-control "   readonly  value="<? echo $Especialistas->Nombre_Sucursal; ?>" >
  <input type="text" class="form-control "  readonly  hidden name="OrigenSucursal" readonly  value="<? echo $Especialistas->Fk_sucursal; ?>" >
    </div>
    </div>
    
   
<div class="col">
    <label for="exampleFormControlInput1">Destino<span class="text-danger">*</span></label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta"><i class="fas fa-map-marked"></i></span>
  </div>
  <input type="text" class="form-control " readonly name="DestinoSucursal" value="<? echo $Especialistas->Fk_Sucursal_Destino; ?>" >
    </div><label for="nombreprod" class="error">
    </div>
</div>
  
   
<div class="form-group">
    <label for="exampleFormControlTextarea1">Comentarios / Observaciones</label>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta"><i class="fas fa-comments"></i></span>
  </div>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="ComentariosObservaciones" rows="3"></textarea>
  </div>  </div>
 

       
     
    <input type="text" class="form-control"  hidden name="Agrego" id="agrega" readonly value=" <?echo $row['Nombre_Apellidos']?>">
    <input type="text" class="form-control"  hidden name="Sistema" id="sistema" readonly value=" POS <?echo $row['Nombre_rol']?>">
    
   

  

       </div>
       <!--Footer-->
       
       <button type="submit"  value="Guardar"class="btn btn-info">Confirmar <i class="fas fa-check"></i></button>
       </form>
      
       <form  id="ActualizaEstadoTraspaso" style="display: none;">

                                       
  <input type="text" class="form-control " readonly hidden name="IDTraspasoActualiza" id="idtraspasoactualiza" value="<? echo $Especialistas->ID_Traspaso_Generado ?>" >
  <input type="text" class="form-control " readonly hidden name="NombreRecibio" id="nombrerecibio" value="<?echo $row['Nombre_Apellidos']?>" >

  <button type="submit" style="display: none;"  id="EnviarActualizacion" value="Guardar" class="btn btn-info">Confirmar <i class="fas fa-check"></i></button>


                                        </form>
                                        </div></div> </div></div> </div></div>
 <? else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<? endif;?>


<script src="js/RegistraConDetalle.js"></script>
<script src="js/ActualizaDetalleTraspaso.js"></script>
<?
 
  include ("Modales/Error.php");
  include ("Modales/Exito.php");
  include ("Modales/ExitoActualiza.php");

  include ("footer.php")?>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>


<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->

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