
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
  background-color: #2bbbad !important;
  color: white;
}
    </style>
 
  
</head>
<?php include_once ("Menu.php")?>


  



 

   <div class="text-center">
<button data-toggle="modal" data-target="#ConsultaProductos" class="btn btn-primary btn-sm"  >Consulta productos <i class="fas fa-search"></i></button>
<button data-id="<?php echo $ValorCaja["ID_Caja"];?>" class="btn-arqui btn btn-warning btn-sm " type="submit"  >Arqueo de caja <i class="fa-solid fa-money-bill-transfer"></i> </button> 
<button data-id="<?php echo $ValorCaja["ID_Caja"];?>" class="btn-edit btn btn-warning btn-sm " type="submit"  >Corte de caja <i class="fas fa-cut"></i> <i class="fas fa-money-bill"></i></button> 

     <button  data-toggle="modal" data-target="#ReimprimeVentas"   class="btn-reimpresion btn btn-info btn-sm  " type="submit"  >Reimpresión de tickets de venta <i class="fas fa-print"></i></button>
     <button data-toggle="modal" data-target="#CapturaFacturacion" class="btn btn-success btn-sm" style="
    background: #6610f2 !important;"type="submit" name="guardar" >Datos para facturación <i class="far fa-bell"></i></button>
      <div class="input-group mb-3">
        
  
      <div class="content">

<div class="container-fluid">

    <div class="row mb-3">

        <div class="col-md-9">

            <div class="card card-gray shadow">

                <div class="card-body p-3">

                    <div class="row">
                        <!-- INPUT PARA INGRESO DEL CODIGO DE BARRAS O DESCRIPCION DEL PRODUCTO -->
                        <div class="col-md-12 mb-3">

                            <div class="form-group mb-2">

                                <label class="col-form-label" for="iptCodigoVenta">
                                    <i class="fas fa-barcode fs-6"></i>
                                    <span class="small">Productos</span>
                                </label>

                                <input type="text" class="form-control form-control-sm" id="iptCodigoVenta" placeholder="Ingrese el código de barras o el nombre del producto">
                            </div>

                        </div>

                        <!-- ETIQUETA QUE MUESTRA LA SUMA TOTAL DE LOS PRODUCTOS AGREGADOS AL LISTADO -->
                        <div class="col-md-7 mb-3 rounded-3" style="background-color: gray;color: white;text-align:center;border:1px solid gray;">
                            <h2 class="fw-bold m-0">S/ <span class="fw-bold" id="totalVenta">0.00</span></h2>
                        </div>

                        <!-- BOTONES PARA VACIAR LISTADO Y COMPLETAR LA VENTA -->
                        <div class="col-md-5 text-right">
                            <button class="btn btn-primary" id="btnIniciarVenta">
                                <i class="fas fa-shopping-cart"></i> Realizar Venta
                            </button>
                            <button class="btn btn-danger" id="btnVaciarListado">
                                <i class="far fa-trash-alt"></i> Vaciar Listado
                            </button>
                        </div>

                        <!-- LISTADO QUE CONTIENE LOS PRODUCTOS QUE SE VAN AGREGANDO PARA LA COMPRA -->
                        <div class="col-md-12">

                            <table id="lstProductosVenta" class="display nowrap table-striped w-100 shadow ">
                                <thead class="bg-gray text-left fs-6">
                                    <tr>
                                        <th>Item</th>
                                        <th>Codigo</th>
                                        <th>Id Categoria</th>
                                        <th>Categoria</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th class="text-center">Opciones</th>
                                        <th>Aplica Peso</th>
                                        <th>Precio Por Mayor</th>
                                        <th>Precio Oferta</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-left fs-6">
                                </tbody>
                            </table>
                            <!-- / table -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div> <!-- ./ end card-body -->
            </div>

        </div>

        <div class="col-md-3">

            <div class="card card-gray shadow">

                <!-- <h5 class="card-header py-1 bg-primary text-white text-center">
                    Total Venta: S./ <span id="totalVentaRegistrar">0.00</span>
                </h5> -->

                <div class="card-body p-2">

                    <!-- SELECCIONAR TIPO DE DOCUMENTO -->
                    <div class="form-group mb-2">

                        <label class="col-form-label p-0" for="selCategoriaReg">
                            <i class="fas fa-file-alt fs-6"></i>
                            <span class="small">Documento</span><span class="text-danger">*</span>
                        </label>

                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selDocumentoVenta" disabled>
                            <option value="0">Seleccione Documento</option>
                            <option value="1" selected="true">Boleta</option>
                            <option value="2">Factura</option>
                            <option value="3">Ticket</option>
                        </select>

                        <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                            Debe Seleccione documento
                        </span>

                    </div>

                    <!-- SELECCIONAR TIPO DE PAGO -->
                    <div class="form-group mb-2">

                        <label class="col-form-label p-0" for="selCategoriaReg">
                            <i class="fas fa-money-bill-alt fs-6"></i>
                            <span class="small">Tipo Pago</span><span class="text-danger">*</span>
                        </label>

                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selTipoPago">
                            <option value="0">Seleccione Tipo Pago</option>
                            <option value="1" selected="true">Efectivo</option>
                            <option value="2">Yape</option>
                            <option value="3">Plin</option>
                            <option value="4">Transferencia</option>
                        </select>

                        <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                            Debe Ingresar tipo de pago
                        </span>

                    </div>

                    <!-- SERIE Y NRO DE BOLETA -->
                    <div class="form-group">

                        <div class="row">

                            <div class="col-md-4">

                                <label for="iptNroSerie" class="p-0 m-0">Serie</label>

                                <input type="text" min="0" name="iptEfectivo" id="iptNroSerie" class="form-control form-control-sm" placeholder="nro Serie" disabled>
                            </div>

                            <div class="col-md-8">

                                <label for="iptNroVenta" class="p-0 m-0">Correlativo</label>

                                <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm" placeholder="Nro Venta" disabled>

                            </div>

                        </div>

                    </div>

                    <!-- INPUT DE EFECTIVO ENTREGADO -->
                    <div class="form-group">
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
                            <h6 class="text-start fw-bold">Monto Efectivo: S./ <span id="EfectivoEntregado">0.00</span></h6>
                        </div>

                        <div class="col-12">
                            <h6 class="text-start text-danger fw-bold">Vuelto: S./ <span id="Vuelto">0.00</span>
                            </h6>
                        </div>

                    </div>

                    <!-- MOSTRAR EL SUBTOTAL, IGV Y TOTAL DE LA VENTA -->
                    <div class="row fw-bold">

                        <div class="col-md-7">
                            <span>OPE. GRAVADAS</span>
                        </div>
                        <div class="col-md-5 text-right">
                            S./ <span class="" id="">0.00</span>
                        </div>

                        <div class="col-md-7">
                            <span>OPE. INAFECTAS</span>
                        </div>
                        <div class="col-md-5 text-right">
                            S./ <span class="" id="">0.00</span>
                        </div>

                        <div class="col-md-7">
                            <span>OPE. EXONERADAS</span>
                        </div>
                        <div class="col-md-5 text-right">
                            S./ <span class="" id="">0.00</span>
                        </div>

                        <div class="col-md-7">
                            <span>IGV (18%)</span>
                        </div>
                        <div class="col-md-5 text-right">
                            S./ <span class="" id="boleta_igv">0.00</span>
                        </div>

                        <div class="col-md-7">
                            <span>SUBTOTAL</span>
                        </div>
                        <div class="col-md-5 text-right">
                            S./ <span class="" id="boleta_subtotal">0.00</span>
                        </div>

                        <div class="col-md-7">
                            <span>TOTAL</span>
                        </div>
                        <div class="col-md-5 text-right">
                            S./ <span class="" id="boleta_total">0.00</span>
                        </div>
                    </div>

                </div><!-- ./ CARD BODY -->

            </div><!-- ./ CARD -->
        </div>

    </div>
</div>

  
 
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
   
   <script src="js/ControladorFormVentas.js"></script>

  <!--  <script src="js/VentasControlador.js"></script> -->
     <script src="js/BusquedaVentasV.js"></script>
     <script src="js/BusquedaVentasV2.js"></script>
     <script src="js/BusquedaVentasV23.js"></script>
     <script src="js/BusquedaVentasV24.js"></script>
     <script src="js/BusquedaVentasV25.js"></script>
     <script src="js/BusquedaVentasV26.js"></script>
     <script src="js/BusquedaVentasV27.js"></script>
     <script src="js/BusquedaVentasV28.js"></script>
     <script src="js/BusquedaVentasV29.js"></script>
     <script src="js/BusquedaVentasV210.js"></script>

  
      
   
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

 