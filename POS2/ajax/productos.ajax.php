<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "u155356178_CorpoSaluda";
$password = "SSalud4Dev2495#$";
$dbname = "u155356178_DesarrolloSalu";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar que se recibió la acción
if(isset($_POST['accion'])) {

    // Obtener los productos desde la base de datos
    if($_POST['accion'] == 6) {
        $items = array();

        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($items, $row['codigo_producto']);
             
            }
        }

        echo json_encode($items);
    }

}


if(isset($_POST["accion"]) && $_POST["accion"] == 8) {
    $respuesta = array();
    
    try {
        $pdo = Conexion::conectar();
        
        $stmt = $pdo->prepare("SELECT codigo_producto, descripcion_producto, precio_venta_producto FROM productos");
        $stmt->execute();
        
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $respuesta["data"] = $data;
        $respuesta["success"] = true;
    } catch(Exception $e) {
        $respuesta["mensaje"] = "Error al obtener los datos de la base de datos: " . $e->getMessage();
        $respuesta["success"] = false;
    }
    
    echo json_encode($respuesta);
    exit;
}


$conn->close();
?>