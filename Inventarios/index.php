<<<<<<< HEAD
<?php 
include("Mensaje.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | Control de inventarios </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  
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
        <b><?php echo $mensaje?></b> 
      </div><!-- /.login-logo -->
     

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
=======
<?php
	// session_start();
	 require_once("config/app.conf.php");

	  
	  spl_autoload_register(function($className) {
	            $model = "model/". $className ."_model.php";
	            $controller = "controller/". $className ."_controller.php";

	           require_once($model);
	           require_once($controller);
	    });

		$Login = new Login();


		#Si NO EXISTE SESION LO MANDO A LOGIN
	    if(!isset($_SESSION['user_id'])){

	    	 $view = DEFAULT_VIEW;

	    } elseif (!empty($_GET["View"]) && isset($_SESSION['user_id'])){
		  //Si  existe vista pone la que viene en GET - ?view=Algo
			$view = $_GET["View"];

			$usuario = $_SESSION['user_name'];
			$tipo_usuario = $_SESSION['user_tipo'];
			$nombre_empleado =  $_SESSION['user_empleado'];

		}  else if(empty($_GET["View"]) && isset($_SESSION['user_id'])) {
		   //poner por defecto Home
		    $view = "Inicio";
			$usuario = $_SESSION['user_name'];
			$tipo_usuario = $_SESSION['user_tipo'];
			$nombre_empleado =  $_SESSION['user_empleado'];
		}



		if (empty($conf[$view]))
		{
		  //Si es vacia poner error no existe hacela en la vista y no existe hacela en la vista y agrega a config
		  $view = "error_404"; //asi debes configurarlo en el app.conf.php error_404== nombre en el conf

		}

		if (empty($conf[$view]["layout"]))
		{
		  //Si no tiene layout agregar el por defecto
			$conf[$view]["layout"] = DEFAULT_LAYOUT;
		}

		 $pathLayout = PATH_LAYOUT."/".$conf[$view]["layout"];// cargo el layou
  		 $pathView = PATH_VIEW."/".$conf[$view]["file"]; // busco la vista almacenada en conf

		require_once($pathLayout); // agrego el layout encontrado y dentro del el busco la vista correspondiente en
		//este proceso

 ?>
>>>>>>> parent of 729e629 (AjustesInventarios)
