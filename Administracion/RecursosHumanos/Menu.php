
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light" style="background-color: #2b73bb !important;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: white;"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments" style="color: white;" ></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell" style="color: white;"></i>
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link"><i
        class="fas fa-sign-out-alt" style="color: white;" data-toggle="modal" data-target="#Salida"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link" style="background-color: #2b73bb !important;">
   
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://www.somosgrupoe.com/Administracion/Perfiles/<?echo $row['file_name']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  id="DatosGenerales" class="d-block"><?echo $row['Nombre_Apellidos']?></a>
          <a  id="DatosGenerales" class="d-block"><small><?echo $row['Nombre_rol']?></small></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index" class="nav-link ">
            <i class="fas fa-home"></i>
              <p>
                Inicio
           
              </p>
            </a>
           
         
            <li class="nav-header">Control de personal</li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
            Personal
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/Enfermeros" class="nav-link">
            <i class="fas fa-user-nurse"></i>
              <p>
              Enfermeros
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/Farmaceuticos" class="nav-link">
            <i class="fas fa-pills"></i>
              <p>
              Farmac??uticos
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/Medicos" class="nav-link">
            <i class="fas fa-user-md"></i>
              <p>
              Medicos
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/PersonalLimpieza" class="nav-link">
            <i class="fas fa-air-freshener"></i>
              <p>
              Intendencia / Limpieza
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/PersonalCallCenter" class="nav-link">
            <i class="fas fa-headset"></i>
              <p>
              Call Center
              
              </p>
            </a>
          </li>
          
            </ul>
              
         
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fas fa-users-cog"></i>
              <p>
            Administrativos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/JefesEnfermeros" class="nav-link">
            <i class="fas fa-user-nurse"></i>
              <p>
             Jefes(as) Enfermeria
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/PuntoVenta" class="nav-link">
            <i class="fas fa-pills"></i>
              <p>
              Punto de venta
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/Medicos" class="nav-link">
            <i class="fas fa-user-md"></i>
              <p>
              Jefes(as) Medicos
              
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/AdminGenerales" class="nav-link">
            <i class="fas fa-user-cog"></i>
              <p>
              Administracion general
              
              </p>
            </a>
          </li>
          
            </ul>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fas fa-clock"></i>
              <p>
            Reloj Checador
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/RegistroPersonalDia" class="nav-link">
            
            <i class="fas fa-calendar-day"></i>
              <p>
              Registro por d??a
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/RegistroPersonalLibre" class="nav-link">
            <i class="far fa-calendar-check"></i>
              <p>
              Registro general
              
              </p>
            </a>
          </li> 
          <li class="nav-item">
        
            </ul>
          </li>
          </li>
          <li class="nav-header">Configuraciones</li>
          <li class="nav-item has-treeview">
           
           
            <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/Roles" class="nav-link">
            <i class="fas fa-user-tag"></i>
              <p>
              Roles / Puestos
              
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/Sucursales" class="nav-link">
            <i class="fas fa-clinic-medical"></i>
              <p>
            Sucursales
              
              </p>
            </a>
          </li>
       
          </li>

          <!-- <li class="nav-header">Integraciones</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
            Personal
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="https://www.somosgrupoe.com/Administracion/RecursosHumanos/Enfermeros" class="nav-link">
            <i class="fas fa-user-nurse"></i>
              <p>
              Enfermeros
              
              </p>
            </a>
          </li> -->
       
            </ul>
          </li>
            </ul>
          </li>
      
        
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
          <div class="col">
          <div id="clockdate">
          <div class="clockdate-wrapper">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active" id="date"></li>
              <li class="breadcrumb-item" id="clock"></li>
            </ol>
          </div><!-- /.col -->
          </div><!-- /.col -->
          </div><!-- /.col -->
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="modal fade" id="Cierre" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">??Cerrar la sesi??n?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <button type="button" onclick="salir()"class="btn btn-danger btn-lg btn-block">Si, Cerrar sesi??n</button>
      <br>
   

      </div>
      <div class="modal-footer">
   
      <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar ventana</button>

      </div>
    </div>
  </div>
</div>
<script src="js/clock.js"></script>
    <!-- Main content -->
    <script>
      function inicio()
{
    $('#inicio').modal('show'); // abrir
}
function cierre()
{
    $('#Cierre').modal('show'); // abrir
}

function salir()
{
    
window.location.replace('https://www.somosgrupoe.com/AdminPOS/Cierre'); 

}
$( document ).ready(function() {
  startTime();
});

    </script>

    <style>
      #date{
        color:#007bff;
      }
    </style>