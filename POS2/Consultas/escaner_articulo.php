<?php
   
$dbHost = 'localhost';
$dbUser = 'u155356178_CorpoSaluda';
$dbPass = 'SSalud4Dev2495#$';
$dbName = 'u155356178_DesarrolloSalu';

$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($db->connect_errno) {
    echo "Error en la conexión a la base de datos: " . $db->connect_error;
    exit();
}

// Obtención del código de barras enviado por AJAX
$codigoEscaneado = isset($_POST['codigoEscaneado']) ? trim($_POST['codigoEscaneado']) : '';

if (empty($codigoEscaneado)) {
    echo json_encode(array('error' => 'Código de barras vacío'));
    exit();
}

// Consulta a la base de datos para obtener los datos del artículo
$query = "SELECT id, descripcion, cantidad FROM articulos WHERE codigo_barras = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('s', $codigoEscaneado);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo json_encode(array('error' => 'No se encontró ningún artículo con el código de barras especificado'));
    exit();
}

// Si se encontró el artículo, se devuelve su información en formato JSON
$articulo = $resultado->fetch_assoc();
echo json_encode($articulo);

$stmt->close();
$db->close();