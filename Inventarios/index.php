
<?php
  # Iniciando la variable de control que permitirá mostrar o no el modal
  $exibirModal = false;
  # Verificando si existe o no la cookie
  if(!isset($_COOKIE["mostrarModal"]))
  {
    # Caso no exista la cookie entra aqui
    # Creamos la cookie con la duración que queramos
     
    //$expirar = 3600; // muestra cada 1 hora
    //$expirar = 10800; // muestra cada 3 horas
    //$expirar = 21600; //muestra cada 6 horas
    $expirar = 43200; //muestra cada 12 horas
    //$expirar = 86400;  // muestra cada 24 horas
    setcookie('mostrarModal', 'SI', (time() + $expirar)); // mostrará cada 12 horas.
    # Ahora nuestra variable de control pasará a tener el valor TRUE (Verdadero)
    $exibirModal = true;
  }
include "Consultas/Consultas.php";
include "Consultas/Sesion.php";
include "Consultas/ContadorIndex.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Panel administrativo <?php echo $row['ID_H_O_D']?> </title>

  <!-- Font Awesome Icons -->
  <?php include "Header.php"?>
</head>
<?php include_once ("Menu.php")?>

<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $CajasAbiertas['CajasAbiertas']?></h3>

                <p>Cajas abiertas</p>
              </div>
              <div class="icon">
              <i class="fas fa-cash-register"></i>
              </div>
              <a data-toggle="modal" data-target="#ConsultaCajas" class="small-box-footer">Consultar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $Tickets['Folio_Ticket']?></h3>

                <p>Productos vendidos</p>
              </div>
              <div class="icon">
              <i class="fas fa-barcode"></i>
              </div>
                <a  data-toggle="modal" data-target="#VentasProd" class="small-box-footer">Consultar Ventas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <h3><?php echo $TraspasosPendientes['TraspasosPendientes']?></h3>
                <p>Traspasos</p>

               
              </div>
              <div class="icon">
              <i class="fas fa-boxes"></i>
              </div>
              <a data-toggle="modal" data-target="#ConsultaTraspasos" class="small-box-footer">Ver traspasos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <h3><?php echo $TotalGanancia['totaldia']?></h3>
              <p>Ganancia global</p>
               
              </div>
              <div class="icon">
              <i class="fas fa-hand-holding-usd"></i>
              </div>
              <a data-toggle="modal" data-target="#TotalesporSucursalesindex" class="small-box-footer">Ver totales <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $TotalFarmaceuticos['Farmaceuticos']?></h3>

                <p>Farmacéuticos <br> vigentes</p>
              </div>
              <div class="icon">
              <i class="fas fa-pills"></i>
              </div>
              <a data-toggle="modal" data-target="#FarmasVigentes" class="small-box-footer">Consultar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $TotalEnfermeros['Enfermeros']?></h3>

                <p>Enfermeros <br> vigentes</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-nurse"></i>
              </div>
                <a  data-toggle="modal" data-target="#EnferVigentes" class="small-box-footer">Consultar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>  
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $TotalMedicos['Medicos']?></h3>

                <p>Medicos <br> vigentes</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-md"></i>
              </div>
                <a  data-toggle="modal" data-target="#MedVigentes" class="small-box-footer">Consultar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
       
  <!-- ./col -->
  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <h3><?php echo $TotalLimpieza['Intendentes']?></h3>
              <p>Intendencia/Limpieza <br> Vigentes</p>
               
              </div>
              <div class="icon">
              <i class="fas fa-hand-sparkles"></i>
              </div>
              <a data-toggle="modal" data-target="#LimpiezaVigente" class="small-box-footer">Consultar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      
  <!-- Content Wrapper. Contains page content -->
  
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  
  
  <li class="nav-item">
    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="color:black !important;">Entradas Personal</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-MoreVentas" role="tab" aria-controls="pills-contact" aria-selected="false" style="color:black !important;">Mas vendidos</a>
  </li>
</ul>

<div class="tab-content" id="pills-tabContent">

<!-- PRESENTACIONES -->
<div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="card text-center">
  <div class="card-header" style="background-color:#2b73bb !important;color: white;">
Registros del reloj checador de <?echo $row['ID_H_O_D']?> al <?php echo FechaCastellano(date('d-m-Y H:i:s')); ?>  
  </div>
 
  <div >
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#FiltroEspecificoFecha" class="btn btn-default">
  Filtrar por fechas <i class="fas fa-calendar-week"></i>
</button>
</div>

</div>
<div id="RegistrosEntradas"></div>
  </div>
  <!-- <div class="tab-pane fade" id="pills-MoreVentas" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="card text-center">
  <div class="card-header" style="background-color:#2b73bb !important;color: white;">
Productos mas vendidos  <?php echo $row['ID_H_O_D']?> al <?php echo FechaCastellano(date('d-m-Y H:i:s')); ?>  
  </div>
  
  <div >
  
</div>

</div>
<div id="RegistrosMasVendidosDias"></div>
  </div>
</div> -->

    
</div></div>

</div></div>

</div></div>

            
         

     
  
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include ("Modales/Ingreso.php");
  include ("Modales/ConsultaCajasAbiertas.php");
  include ("Modales/ModalConsultaVentas.php");
  include ("Modales/ModalTraspasos.php");
  include ("Modales/ModalTotalesSincortes.php");
  include ("Modales/ModalFarmaceuticosVigentes.php");
  include ("Modales/ModalEnfermerosVigentes.php");
  include ("Modales/ModalMedicosVigentes.php");
  include ("Modales/ModalLimpiezaVigentes.php");
  include("Modales/FiltraEspecificamenteEntradas.php");
  include("Modales/FiltraEspecificamenteSalidas.php");
  include ("footer.php");?>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="js/Logs.js"></script>

<script src="js/RegistroDiasEntradas.js"></script>
<!-- <script src="js/RegistroMasVendidosDelDia.js"></script> -->
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
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->

</body>
</html>
<?php if($exibirModal === true) : // Si nuestra variable de control "$exibirModal" es igual a TRUE activa nuestro modal y será visible a nuestro usuario. ?>
<script>
$(document).ready(function()
{
  // id de nuestro modal
  $("#Ingreso").modal("show");
});
</script>
<?php endif; ?>
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
=======

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | Inventario de Medicamentos</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Aplikasi Persediaan Obat pada Apotek">
    <meta name="author" content="Indra Styawantoro" />

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" />

    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="login-page bg-login">
    <div class="login-box">
      <div style="color:#3c8dbc" class="login-logo">
        <img style="margin-top:-12px" src="assets/img/logo-blue.png" alt="Logo" height="50"> <b>MEDISYS</b>
      </div><!-- /.login-logo -->
      <?php  
 
      if (empty($_GET['alert'])) {
        echo "";
      } 

      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Error al entrar!</h4>
               Usuario o la contraseña es incorrecta, vuelva a verificar su nombre de usuario y contraseña.
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
              Has salido con éxito.
              </div>";
      }
      ?>

      <div class="login-box-body">
        <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Por favor Inicie Sesión</p>
        <br/>
        <form action="login-check.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <br/>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Ingresar" />
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

  </body>
</html>

