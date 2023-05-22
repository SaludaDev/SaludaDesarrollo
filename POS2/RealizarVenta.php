
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

  <title>VENTAS | <?php echo $row['ID_H_O_D']?> </title>

<?php include "Header.php"?>
 <style>
        .error {
  color: red;
  margin-left: 5px; 
  
}
#Tarjeta2{
  background-color: #e83e8c  !important;
  color: white;
}
    </style>
 
  
</head>
<?php include_once ("Menu.php")?>

   <!-- <div class="text-center">
<button data-toggle="modal" data-target="#ConsultaProductos" class="btn btn-primary btn-sm"  >Consulta productos <i class="fas fa-search"></i></button>
<button data-id="<?php echo $ValorCaja["ID_Caja"];?>" class="btn-arqui btn btn-warning btn-sm " type="submit"  >Arqueo de caja <i class="fa-solid fa-money-bill-transfer"></i> </button> 
<button data-id="<?php echo $ValorCaja["ID_Caja"];?>" class="btn-edit btn btn-warning btn-sm " type="submit"  >Corte de caja <i class="fas fa-cut"></i> <i class="fas fa-money-bill"></i></button> 

     <button  data-toggle="modal" data-target="#ReimprimeVentas"   class="btn-reimpresion btn btn-info btn-sm  " type="submit"  >Reimpresión de tickets de venta <i class="fas fa-print"></i></button>
     <button data-toggle="modal" data-target="#CapturaFacturacion" class="btn btn-success btn-sm" style="
    background: #6610f2 !important;"type="submit" name="guardar" >Datos para facturación <i class="far fa-bell"></i></button>
      
        
  

  </div> -->
 
<!-- Main content -->
<div class="content">
    

<div class="container-fluid">

    <div class="row mb-3">

        <div class="col-md-9">

            <div class="card card-gray shadow">

                <div class="card-body p-3">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="font-weight: 600;">Ventas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="font-weight: 600" >Corte de caja</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"style="font-weight: 600" >Reimpresion de tickets </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-contact2" aria-selected="false" style="font-weight: 600">Consulta de productos</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  <div class="row">
                        <!-- INPUT PARA INGRESO DEL CODIGO DE BARRAS O DESCRIPCION DEL PRODUCTO -->
                        <div class="col-md-12 mb-3">

                            <div class="form-group mb-2">
                            <div class="row">
<input hidden type="text" class="form-control "  readonly value="<?php echo $row['Nombre_Apellidos']?>" >
    
    <div class="col">
      
    <label for="exampleFormControlInput1">Caja</label> <br>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta2"><i class="fas fa-barcode"></i></span>
  </div>
  <input type="text" class="form-control "  readonly value="<?php echo $ValorCaja['Valor_Total_Caja']?>" >
  <input type="text" class="form-control " hidden id="valcaja" name="CajaSucursal[]" readonly value="<?php echo $ValorCaja["ID_Caja"];?>" >
    </div>  </div>
      
    <div class="col">
      
    <label for="exampleFormControlInput1">Turno</label> <br>
    <div class="input-group mb-3">
  <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta2"><i class="fas fa-clock"></i></span>
  </div>
  <input type="text" class="form-control "  readonly value="<?php echo $ValorCaja['Turno']?>" >
  
    </div>  </div>



  
</div>

                                <label class="col-form-label" for="iptCodigoVenta">
                                    <i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Productos</span>
                                </label>

                                <div class="input-group">
						
						<input type="text" class="form-control producto"  name="codigoEscaneado" id="codigoEscaneado" style="position: relative;" onchange="buscarArticulo();">
					</div>
                            </div>

                        </div>

                        <!-- ETIQUETA QUE MUESTRA LA SUMA TOTAL DE LOS PRODUCTOS AGREGADOS AL LISTADO -->
                        <div class="col-md-7 mb-3 rounded-3" style="background-color:#C80096;color: white;text-align:center;border:1px solid #C80096;">
                            <h2 class="fw-bold m-0">MXN <span class="fw-bold" id="totalVenta">0.00</span></h2>
                        </div>

                        <!-- BOTONES PARA VACIAR LISTADO Y COMPLETAR LA VENTA -->
                        <div class="col-md-5 text-right">
                            
                            <button class="btn btn-danger btn-sm" id="btnVaciarListado">
                                <i class="far fa-trash-alt"></i> Vaciar Listado
                            </button>
                        </div>

                        <!-- LISTADO QUE CONTIENE LOS PRODUCTOS QUE SE VAN AGREGANDO PARA LA COMPRA -->
                             <div class="table-responsive">
                        <div class="col-md-12">
                          <style>
                            #tablaAgregarArticulos {
  width: 100%;
  table-layout: fixed;
}

#tablaAgregarArticulos td, #tablaAgregarArticulos th {
  white-space: nowrap;
  overflow: hidden;
  text-overflow:visible;
}

                          </style>
                  
                        <table class="table table-striped" id="tablaAgregarArticulos" class="display">
						<thead>	
							<tr>
              <th>Codigo</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Importe</th>
            <th>importe_Sin_Iva</th>
            <th>Iva</th>
            <th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
                            <!-- / table -->
                        </div>    </div>
                        <!-- /.col -->
                    </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
Aqui va el corte de caja

  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">  

<!-- aqui va el div que llama a la tabla por medio de ajax para la consulta de los tickets y poder reimprimir -->

<div id="TableVentasDelDia"></div>

<!-- Aqui finaliza el div que llama a la tabla por ajax para la consulta de los tickets y poder reimprimir -->

  </div>

  <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab">  

<!-- aqui va el div que llama a la tabla por medio de ajax para la consulta de los productos  -->

<div id="TablaConsultaDeProductos"></div>

<!-- aqui va el div que llama a la tabla por medio de ajax para la consulta de los productos  -->

  </div>

</div>
                    
                </div> <!-- ./ end card-body -->
            </div>

        </div>

        <div class="col-md-3">

            <div class="card card-gray shadow">

                <!-- <h5 class="card-header py-1 bg-primary text-white text-center">
                    Total Venta: MXN <span id="totalVentaRegistrar">0.00</span>
                </h5> -->

                <div class="card-body p-2">

                    <!-- SELECCIONAR TIPO DE DOCUMENTO -->
                    
                    <!-- SELECCIONAR TIPO DE PAGO -->
                    <div class="form-group mb-2">

                        <label class="col-form-label p-0" for="selCategoriaReg">
                           
                            <span class="small">Tipo Pago</span><span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-3">
          <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta2"><i class="fas fa-receipt"></i></span>
          </div>
          <select class="form-control form-select form-select-sm" aria-label=".form-select-sm example" id="selTipoPago">
                            <option value="0">Seleccione el Tipo de Pago</option>
                            <option value="1" selected="true">Efectivo</option>
                            <option value="2">Tarjeta de crédito</option>
                            <option value="2">Tarjeta de debito</option>
                            <option value="4">Transferencia</option>
                            
                        </select>
            </div>
                        

                        <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                            Debe Ingresar tipo de pago
                        </span>

                    </div>

                    <!-- SERIE Y NRO DE BOLETA -->
                    <div class="form-group mb-2">
                        
                  
                    <label class="col-form-label p-0" for="selCategoriaReg">
                            
                            <span class="small">Numero de ticket</span><span class="text-danger">*</span>
                        </label>
      
            <div class="input-group mb-3">
          <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta2"><i class="fas fa-receipt"></i></span>
          </div>
          <input type="number" class="form-control "  value="<?php echo $totalmonto;?>"readonly  >
            </div>
      </div>
    
      <div class="form-group mb-2">
      <label for="exampleFormControlInput1">Cliente</label> <br>
            <div class="input-group mb-3">
          <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta2"><i class="fas fa-receipt"></i></span>
          </div>
          <input type="text" class="form-control "    >
            </div>
      
        </div>
      
        <div class="form-group mb-2">
      <label for="exampleFormControlInput1">Folio de signo vital</label> <br>
            <div class="input-group mb-3">
          <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta2"><i class="fas fa-receipt"></i></span>
          </div>
          <input type="text" class="form-control "    >
            </div>
      
        </div>
        
        <div class="form-group mb-2">
      <label for="exampleFormControlInput1"># de ticket anterior</label> <br>
            <div class="input-group mb-3">
          <div class="input-group-prepend">  <span class="input-group-text" id="Tarjeta2"><i class="fas fa-receipt"></i></span>
          </div>
          <input type="text" class="form-control "    >
            </div>
      
        </div>
                       

                   
                    <!-- INPUT DE EFECTIVO ENTREGADO -->
                    <div class="form-group mb-2">
                        <label for="iptEfectivoRecibido" class="p-0 m-0">Efectivo recibido</label>
                        <input type="number" min="0" name="iptEfectivo" id="iptEfectivoRecibido" class="form-control form-control-sm" placeholder="Cantidad de efectivo recibida">
                    </div>

                    <!-- INPUT CHECK DE EFECTIVO EXACTO -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chkEfectivoExacto">
                        <label class="form-check-label" for="chkEfectivoExacto">
                            Efectivo Exacto
                        </label>
                    </div>

                    <!-- MOSTRAR MONTO EFECTIVO ENTREGADO Y EL VUELTO -->
                    <div class="row mt-2">

                        <div class="col-12">
                            <h6 class="text-start fw-bold">Monto Efectivo: MXN <span id="EfectivoEntregado">0.00</span></h6>
                        </div>

                        <div class="col-12">
                            <h6 class="text-start text-danger fw-bold">Cambio: MXN <span id="Vuelto">0.00</span>
                            </h6>
                        </div>

                    </div>

                    <!-- MOSTRAR EL SUBTOTAL, IGV Y TOTAL DE LA VENTA -->
                    <div class="row fw-bold">

                        <div class="col-md-7">
                            <span>IVA</span>
                        </div>
                        <div class="col-md-5 text-right">
                            MXN <span class="" id="">0.00</span>
                        </div>
<!-- 
                        <div class="col-md-7">
                            <span>OPE. INAFECTAS</span>
                        </div>
                        <div class="col-md-5 text-right">
                            MXN <span class="" id="">0.00</span>
                        </div> -->

                        <!-- <div class="col-md-7">
                            <span>OPE. EXONERADAS</span>
                        </div>
                        <div class="col-md-5 text-right">
                            MXN <span class="" id="">0.00</span>
                        </div> -->

                        <!-- <div class="col-md-7">
                            <span>IGV (18%)</span>
                        </div> -->
                        <!-- <div class="col-md-5 text-right">
                            MXN <span class="" id="boleta_igv">0.00</span>
                        </div> -->

                        <div class="col-md-7">
                            <span>SUBTOTAL</span>
                        </div>
                        <div class="col-md-5 text-right">
                            MXN <span class="" id="boleta_subtotal">0.00</span>
                        </div>

                        <div class="col-md-7">
                            <span>TOTAL</span>
                        </div>
                        <div class="col-md-5 text-right">
                            MXN <span class="" id="boleta_total">0.00</span>
                        </div>
                        <div class="col-md-5 text-center">                    
                            <button class="btn btn-primary" id="btnIniciarVenta">
                                <i class="fas fa-shopping-cart"></i> Realizar Venta
                            </button>
                            </div>

                    </div>

                </div><!-- ./ CARD BODY -->

            </div><!-- ./ CARD -->
        </div>

    </div>
</div>

</div>

<script>
 table = $('#tablaAgregarArticulos').DataTable({
        "columns": [{
                "data": "id"
            },
            {
                "data": "codigo"
            },
          {
                "data": "descripcion"
            },
            {
                "data": "cantidad"
            },
        
            {
                "data": "precio"
            },
            {
                "data": "importesiniva"
            },
            {
                "data": "ivatotal"
            },
           
            {
                "data": "eliminar"
            },
            {
                "data": "descuentos"
            },
        ],
       
        "order": [
            [0, 'desc']
            
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
         //para usar los botones   
         responsive: "true",
       
    });

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
    success: function (data) {
      if (data.length === 0) {
        msjError('No Encontrado');

        $('#codigoEscaneado').val('');
        $('#codigoEscaneado').focus();
      } else if (data.codigo) {
        agregarArticulo(data);
      }
    },
    error: function (data) {
      msjError('Se ha producido un error al intentar buscar el Artículo.');
    }
  });
}

// Agrega el autocompletado al campo de búsqueda
$('#codigoEscaneado').autocomplete({
  source: function (request, response) {
    // Realiza una solicitud AJAX para obtener los resultados de autocompletado
    $.ajax({
      url: 'Consultas/autocompletado.php',
      type: 'GET',
      dataType: 'json',
      data: {
        term: request.term
      },
      success: function (data) {
        response(data);
      }
    });
  },
  minLength: 3, // Especifica la cantidad mínima de caracteres para activar el autocompletado
  select: function (event, ui) {
    // Cuando se selecciona un resultado del autocompletado, llamar a la función buscarArticulo() con el código seleccionado
    $('#codigoEscaneado').val(ui.item.value);
    buscarArticulo();
  }
});



// Variable para almacenar el total del IVA
var totalIVA = 0;

// Función para agregar un artículo
function agregarArticulo(articulo) {
  if (!articulo || !articulo.id) {
    mostrarMensaje('El artículo no es válido');
  } else if ($('#detIdModal' + articulo.id).length) {
    mostrarMensaje('El artículo ya se encuentra incluido');
  } else {
    var row = $('#tablaAgregarArticulos tbody').find('tr[data-id="' + articulo.id + '"]');
    if (row.length) {
      var cantidadActual = parseInt(row.find('.cantidad input').val());
      var nuevaCantidad = cantidadActual + parseInt(articulo.cantidad);
      if (nuevaCantidad < 0) {
        mostrarMensaje('La cantidad no puede ser negativa');
        return;
      }
      row.find('.cantidad input').val(nuevaCantidad);
      actualizarImporte(row);
      calcularIVA();
      actualizarSuma();
    } else {
      var tr = '';
      var btnEliminar = '<button type="button" class="btn btn-xs btn-danger" onclick="$(this).parent().parent().remove();"><i class="fas fa-minus-circle fa-xs"></i></button>';
      var inputId = '<input type="hidden" name="detIdModal[' + articulo.id + ']" value="' + articulo.id + '" />';
      var inputCantidad = '<input class="form-control" type="hidden" name="detCantidadModal[' + articulo.id + ']" value="' + articulo.cantidad + '" />';
      
      tr += '<tr data-id="' + articulo.id + '">';
      tr += '<td class="codigo"><input class="form-control" type="text" value="' + articulo.codigo + '"  /></td>';
      tr += '<td class="descripcion"><input class="form-control" type="text" value="' + articulo.descripcion + '"  /></td>';
      tr += '<td class="cantidad"><input class="form-control" type="number" value="' + articulo.cantidad + '" onchange="actualizarImporte($(this).parent().parent());" /></td>';
      tr += '<td class="precio"><input class="form-control" type="number" value="' + articulo.precio + '" onchange="actualizarImporte($(this).parent().parent());" /></td>';
      tr += '<td><input id="importe_' + articulo.id + '" class="form-control importe" type="number" readonly /></td>';
      tr += '<td><input id="importe_siniva_' + articulo.id + '" class="form-control importe_siniva" type="number" readonly /></td>';
      tr += '<td><input id="valordelniva_' + articulo.id + '" class="form-control valordelniva" type="number" readonly /></td>';
      tr += '<td>' + btnEliminar + inputId + inputCantidad + '</td>';
      tr += '</tr>';
      
      $('#tablaAgregarArticulos tbody').append(tr);
      actualizarImporte($('#tablaAgregarArticulos tbody tr:last-child'));
      calcularIVA();
      actualizarSuma();
    }
  }
  
  $('#codigoEscaneado').val('');
  $('#codigoEscaneado').focus();
}
// Función para actualizar el importe
function actualizarImporte(row) {
  var cantidad = parseInt(row.find('.cantidad input').val());
  var precio = parseFloat(row.find('.precio input').val());
  if (cantidad < 0) {
    mostrarMensaje('La cantidad no puede ser negativa');
    return;
  }
  if (precio < 0) {
    mostrarMensaje('El precio no puede ser negativo');
    return;
  }
  var importe = cantidad * precio;
  var iva = importe * 0.16;
  var importeSinIVA = importe - iva;
  row.find('input.importe').val(importe.toFixed(2));
  row.find('input.importe_siniva').val(importeSinIVA.toFixed(2));
  row.find('input.valordelniva').val(iva.toFixed(2));
}


// Función para calcular el IVA
function calcularIVA() {
  totalIVA = 0;

  $('#tablaAgregarArticulos tbody tr').each(function() {
    var iva = parseFloat($(this).find('.valordelniva input').val());
    totalIVA += iva;
  });

  $('#totalIVA').text(totalIVA.toFixed(2));
}

// Función para actualizar la suma de importe sin IVA y diferencia de IVA
function actualizarSuma() {
  var sumaImporteSinIVA = 0;

  $('#tablaAgregarArticulos tbody tr').each(function() {
    var importeSinIVA = parseFloat($(this).find('.importe_siniva input').val());
    sumaImporteSinIVA += importeSinIVA;
  });

  $('#sumaImporteSinIVA').text(sumaImporteSinIVA.toFixed(2));
}

// Función para mostrar un mensaje
function mostrarMensaje(mensaje) {
  // Mostrar el mensaje en una ventana emergente de alerta
  alert(mensaje);
}

</script>
     <!-- Control Sidebar -->
    
     <!-- Main Footer -->
   <?php 
    include ("Modales/ModalConsultaProductos.php");
     include ("Modales/Error.php");
     include ("Modales/Exito.php");
     include ("Modales/Cambio.php");
     include ("Modales/Descuentos.php");
     include ("Modales/AdvierteDeCaja.php");
     include ("Modales/DataFacturacion.php");
     include ("Modales/ReimpresionTicketsVistaVentas.php");
     include ("Modales/ExitoActualiza.php");
    
     include ("footer.php")?>
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" style="overflow-y: scroll;" aria-labelledby="editModalLabel" aria-hidden="true">
<div id="Di"class="modal-dialog modal-lg  modal-notify modal-warning">
    <div class="modal-content">
    <div class="modal-header">
       <p class="heading lead" id="Titulo"></p>

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true" class="white-text">&times;</span>
       </button>
     </div>
      
        <div class="modal-body">
        <div class="text-center">
      <div id="form-edit"></div>
      
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


  <script>

$(".btn-edit").click(function() {
    id = $(this).data("id");
    $.post("https://saludaclinicas.com/POS2/Modales/CortesDeCajaNuevo.php", "id=" + id, function(data) {
        $("#form-edit").html(data);
        $("#Titulo").html("Corte de caja");
        $("#Di").addClass("modal-dialog modal-lg modal-notify modal-warning");
    });
    $('#editModal').modal('show');
});

$(".btn-arqui").click(function() {
    id = $(this).data("id");
    $.post("https://saludaclinicas.com/POS2/Modales/ArqueoDeCaja.php", "id=" + id, function(data) {
        $("#form-edit").html(data);
        $("#Titulo").html("Arqueo De Caja");
        $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-warning");
        $("#Di").addClass("modal-dialog modal-lg modal-notify modal-info");
    });
    $('#editModal').modal('show');
});

$(".btn-aperturacaja").click(function() {
    id = $(this).data("id");
    $.post("https://saludaclinicas.com/POS2/Modales/AbreCajaEnVentas.php", "id=" + id, function(data) {
        $("#form-edit").html(data);
        $("#Titulo").text("Apertura De caja");
        $("#Di").removeClass("modal-dialog modal-lg modal-notify modal-warning");
        $("#Di").addClass("modal-dialog modal-lg modal-notify modal-success");
    });
    $('#editModal').modal('show');
});
  </script>

   <!-- ./wrapper -->
   <script src="js/ControlDeTicketsVentas.js"></script>
   <script src="js/ControladorFormVentas.js"></script>

  <!--  <script src="js/VentasControlador.js"></script> -->
     <script src="js/BusquedaVentasV.js"></script>
     <script src="js/RealizaVentas.js"></script>
     <script src="js/CapturaDataFacturacion.js"></script>
     <script src="js/BuscaDataPacientes.js"></script>

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
<?php

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
						                <span id="Aviso" class="text-semibold"><?php echo $row['Nombre_Apellidos']?>
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

 