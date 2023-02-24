vent<?php
include "Consultas/Consultas.php";
include "Consultas/Sesion.php";
include "Consultas/ConsultaFondoCaja.php";
include "Consultas/ConsultaCaja.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Totales de servicios | <?echo $row['ID_H_O_D']?> </title>

<?include "Header.php"?>
 <style>
        .error {
  color: red;
  margin-left: 5px; 
  
}

    </style>
</head>
<?include_once ("Menu.php")?>
<div class="card text-center">
  <div class="card-header" style="background-color: #2bbbad !important;color: white;">
  Totales de servicios <?echo $row['ID_H_O_D']?> <?echo $row['Nombre_Sucursal']?>  
  </div>
  
  <div >

</div>

</div>

<div class="row">
<div class="col-md-4">
<form method="post">
<div class="row">
<div class="col-md-8">
<div class="form-group">
<label>Product Name or Number</label>
<input type="text" name="barcodeText" class="form-control" value="<?php echo @$_POST['barcodeText'];?>">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Barcode Type</label>
<select name="barcodeType" id="barcodeType" class="form-control">
<option value="codabar" <?php echo (@$_POST['barcodeType'] == 'codabar' ? 'selected="selected"' : ''); ?>>Codabar</option>
<option value="code128" <?php echo (@$_POST['barcodeType'] == 'code128' ? 'selected="selected"' : ''); ?>>Code128</option>
<option value="code39" <?php echo (@$_POST['barcodeType'] == 'code39' ? 'selected="selected"' : ''); ?>>Code39</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Barcode Display</label>
<select name="barcodeDisplay" class="form-control" required>
<option value="horizontal" <?php echo (@$_POST['barcodeDisplay'] == 'horizontal' ? 'selected="selected"' : ''); ?>>Horizontal</option>
<option value="vertical" <?php echo (@$_POST['barcodeDisplay'] == 'vertical' ? 'selected="selected"' : ''); ?>>Vertical</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-7">
<input type="hidden" name="barcodeSize" id="barcodeSize" value="150">
<input type="hidden" name="printText" id="printText" value="true">
<input type="submit" name="generateBarcode" class="btn btn-success form-control" value="Generate Barcode">
</div>
</div>
</form>
</div>
</div>

<?php
if(isset($_POST['generateBarcode'])) {
$barcodeText = trim($_POST['barcodeText']);
$barcodeType=$_POST['barcodeType'];
$barcodeDisplay=$_POST['barcodeDisplay'];
$barcodeSize=$_POST['barcodeSize'];
$printText=$_POST['printText'];
if($barcodeText != '') {
echo '<h4>Barcode:</h4>';
echo '<img class="barcode" alt="'.$barcodeText.'" src="barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.'&size='.$barcodeSize.'&print='.$printText.'"/>';
} else {
echo '<div class="alert alert-danger">Enter product name or number to generate barcode!</div>';
}
}
?>
      
      </div>
    </div>
  </div>
</div>

</div>
  </div>
</div>

  
         
</div>
</div>

     
  
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- Main Footer -->
<?
    

  include ("Modales/AdvierteDeCaja.php");
  include ("footer.php")?>

<!-- ./wrapper -->


<script src="js/TotalesServicios.js"></script>


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

<script>
  	
    $(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.post("https://controlfarmacia.com/POS2/Modales/AbreCaja.php","id="+id,function(data){
              $("#form-edit").html(data);
              $("#Titulo").html("Apertura de caja");
              $("#Di").addClass("modal-dialog modal-lg modal-notify modal-success");
  		});
  		$('#editModal').modal('show');
    });
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="editModalLabel" aria-hidden="true">
  <div id="Di"class="modal-dialog  modal-notify modal-success">
      <div class="modal-content">
      <div class="modal-header">
         <p class="heading lead" id="Titulo"></p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>
        <div id="Mensaje "class="alert alert-info alert-styled-left text-blue-800 content-group">
						                <span id="Aviso" class="text-semibold"><?echo $row['Nombre_Apellidos']?>
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