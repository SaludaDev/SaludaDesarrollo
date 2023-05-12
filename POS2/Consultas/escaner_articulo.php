<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigoEscaneado'];

    $conexion = new mysqli("localhost", "u155356178_CorpoSaluda", "SSalud4Dev2495#$","u155356178_DesarrolloSalu");

    if ($conexion->connect_error) {
        die('Error de conexión a la base de datos: ' . $conexion->connect_error);
    }

   
    $stmt = $conexion->prepare('SELECT * FROM productos WHERE codigo_producto = ?');
    $stmt->bind_param('s', $codigo);

    if (!$stmt->execute()) {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    }

    $resultado = $stmt->get_result();
    $data = $resultado->fetch_assoc();
    echo json_encode($data);

    $stmt->close();
    $conexion->close();
}
?>
