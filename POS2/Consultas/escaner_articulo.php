<?php 
// configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'u155356178_CorpoSaluda');
define('DB_PASS', 'SSalud4Dev2495#$');
define('DB_NAME', 'u155356178_DesarrolloSalu');

// conexión a la base de datos
$conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// verificar si hay errores de conexión
if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}

// preparar la consulta
$codigo = $_POST['codigoEscaneado'];
$stmt = $conexion->prepare('SELECT * FROM articulos WHERE codigo = ?');
$stmt->bind_param('s', $codigo);

// ejecutar la consulta
if (!$stmt->execute()) {
    die('Error al ejecutar la consulta: ' . $stmt->error);
}

// obtener el resultado
$resultado = $stmt->get_result();
$data = $resultado->fetch_assoc();

// cerrar la consulta y la conexión
$stmt->close();
$conexion->close();

// mostrar el resultado en formato JSON
echo json_encode($data);
?>