<?php
include "Consultas/Consultas.php";
include "Consultas/Sesion.php";
include "Consultas/ConsultaCaja.php";
include "Consultas/SumadeFolioTickets.php";
include ("db_connection.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>VENTAS | <?echo $row['ID_H_O_D']?> </title>

<?php include "Header.php"?>
 <style>
        .error {
  color: red;
  margin-left: 5px; 
  
}

    </style>
   
  
</head>
<?php include_once ("Menu.php")?>


  
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="row">
<script>
  $('#modalBultos').on('shown.bs.modal', function () {
    $('#codigoEscaneado').focus();
});
</script>

<button class="btn btn-success" type="button" id="btnNuevo" data-toggle="modal" data-target="#modalArticulos" data-keyboard="false" data-backdrop="static"><i class="fa fa-plus"></i>Iniciar captura</button>
<!-- Modal -->
<div class="modal fade" id="modalArticulos" tabindex="-1" role="dialog" aria-labelledby="modalArticulosLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
		<!-- Código HTML -->

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="codigoEscaneado">Código de barras</label>
      <input type="text" id="codigoEscaneado" name="codigoEscaneado" class="form-control" autofocus>
    </div>
    <button type="button" class="btn btn-primary" onclick="buscarArticulo()">Buscar</button>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table class="table table-striped" id="tablaAgregarArticulos">
      <thead>
        <tr>
          <th>Descripción</th>
          <th>Cantidad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>

<script>
  function buscarArticulo() {
    var codigoEscaneado = $('#codigoEscaneado').val();
    var formData = new FormData();
    formData.append('codigoEscaneado', codigoEscaneado);

    $.ajax({
      url: "Consultas/escaner_articulo.php",
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function(data) {
        if (data.length === 0) {
          msjError('No encontrado');
        } else if (data.codigo) {
          msj('Artículo encontrado');
          agregarArticulo(data);
        }
      },
      error: function(data) {
        msjError('Se ha producido un error al intentar buscar el Artículo.');
      }
    });
  }

  function agregarArticulo(articulo) {
    if ($('#detIdModal' + articulo.id).length) {
      msjError('El artículo ya se encuentra incluido');
      return;
    }

    var tr = $('<tr>');
    var btnEliminar = $('<button>', {
      'type': 'button',
      'class': 'btn btn-xs btn-danger',
      'html': '<i class="glyphicon glyphicon-minus"></i>'
    });
    btnEliminar.on('click', function() {
      $(this).parent().parent().remove();
    });

    var inputId = $('<input>', {
      'type': 'hidden',
      'name': 'detIdModal[' + articulo.id + ']',
      'value': articulo.id
    });

    var inputCantidad = $('<input>', {
      'type': 'hidden',
      'name': 'detCantidadModal[' + articulo.id + ']',
      'value': articulo.cantidad
    });

    tr.append($('<td>', {
      'text': articulo.descripcion
    }));
    tr.append($('<td>', {
      'text': articulo.cantidad
    }));
    tr.append($('<td>').append(btnEliminar, inputId, inputCantidad));

    $('#tablaAgregarArticulos tbody').append(tr);
    $('#codigoEscaneado').val('');
    $('#codigoEscaneado').focus();
  }
</script>

     <!-- /.content-wrapper -->
   
     <!-- Control Sidebar -->
    
     <!-- Main Footer -->
   <?
     include ("Modales/AltaProductos.php");
     include ("Modales/AltaTipoProductos.php");
     include ("Modales/Error.php");
     include ("Modales/Exito.php");
     include ("Modales/AdvierteDeCaja.php");
     include ("Modales/DataFacturacion.php");
     include ("Modales/ExitoActualiza.php");
     include ("footer.php")?>
   
   <!-- ./wrapper -->
   
   

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
<script>
function sumar()
{
  const $total = document.getElementById('totalventa');
  let subtotal = 0;
  [ ...document.getElementsByClassName( "Precio" ) ].forEach( function ( element ) {
    if(element.value !== '') {
      subtotal += parseFloat(element.value);
    }
  });
  $total.value = subtotal;
}



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