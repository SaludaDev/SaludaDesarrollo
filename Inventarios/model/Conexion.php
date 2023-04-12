<?php
date_default_timezone_set("America/Monterrey");
	class Conexion {

		public static function Conectar(){

			$driver = 'mysql'; //mysql no cambiar
			$driver = 'mysqli'; //mysql no cambiar
			$host = 'localhost'; //localhost
			$dbname = 'u155356178_inventarios'; //bdd
			$username ='u155356178_inventarios'; //usuario




			$server=$driver.':host='.$host.';dbname='.$dbname;

			try {

				$conexion = new PDO($server,$username,$passwd);
				//$conexion = exec("SET CHARACTER SET utf8");
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (Exception $e) {

				$conexion = null;
            	echo '<span class="label label-danger label-block">ERROR AL CONECTARSE A LA BASE DE DATOS, PRESIONE F5</span>';
            	exit();
			}


			return $conexion;

		}

	}
