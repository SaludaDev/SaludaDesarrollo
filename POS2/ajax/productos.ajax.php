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
    if($_POST['accion'] == 7) {
        $items = array();

        $sql = "SELECT descripcion_producto FROM productos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($items, $row['descripcion_producto']);
                
            }
        }

        echo json_encode($items);
    }

}

$conn->close();
?>