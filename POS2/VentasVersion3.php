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

<button class="btn btn-success" type="button" id="btnNuevo" data-toggle="modal" data-target="#modalArticulos" data-keyboard="false" data-backdrop="static"><i class="fa fa-plus"></i> Nuevo Bulto</button>
<!-- Modal -->
<div class="modal fade" id="modalArticulos" tabindex="-1" role="dialog" aria-labelledby="modalArticulosLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalArticulosLabel">Ingreso de Artículos</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Escanear Código de Barras</label>
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-barcode"></i></div>
						<input type="text" class="form-control producto" name="codigoEscaneado" id="codigoEscaneado" autocomplete="off" onchange="buscarArticulo();">
					</div>
				</div>
				<div>
					<table class="table table-striped" id="tablaAgregarArticulos">
						<thead>	
							<tr>
								<th>Producto</th>
								<th>Cantidad</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-primary" id="btnAgregar" onclick="agregar();">Agregar</button>
			</div>
		</div>
	</div>
</div>
<!-- FINALIZA DATA DE AGENDA -->
      </div>
      </div>
      </div>
      </div>
   
<script>

function buscarArticulo(formulario) {	
    $.post("Consultas/escaner_articulo.php", formulario.serialize())
    .done(function(data) {
        if (data.length === 0) {
            msjError('No Encontrado');
            formulario.find('#codigoEscaneado').val('');
            formulario.find('#codigoEscaneado').focus();
        } else if (data.codigo) {
            msj('Artículo encontrado');
            agregarArticulo(data);
        }
    })
    .fail(function(data) {
        msjError('Se ha producido un error al intentar buscar el Artículo.');
    });
}

function agregarArticulo(articulo, formulario){	
    if (formulario.find('#detIdModal' + articulo.id).length) { // si ya esta agregado advierto
        msjError('El artículo ya se encuentra incluido');
    } else { // si es nuevo agrego
        let tr = ''; 
        const btnEliminar = '<button type="button" class="btn btn-xs btn-danger" onclick="$(this).parent().parent().remove();"><i class="glyphicon glyphicon-minus"></i></button>';
        const inputId = '<input type="hidden" name="detIdModal[' + articulo.id + ']" value="' + articulo.id + '" />';
        const inputCantidad = '<input type="hidden" name="detCantidadModal[' + articulo.id + ']" value="' + articulo.cantidad + '" />';
        
        tr += '<tr>';
        tr += '<td>' + articulo.descripcion + '</td>';
        tr += '<td>' + articulo.cantidad + '</td>';
        tr += '<td>' + btnEliminar + inputId + inputCantidad + '</td>';
        tr += '</tr>';
        
        formulario.find('#tablaAgregarArticulos tbody').append(tr);
    }
    
    formulario.find('#codigoEscaneado').val('');

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