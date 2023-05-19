<?php
$servername = "localhost";
$username = "u155356178_CorpoSaluda";
$password = "SSalud4Dev2495#$";
$dbname = "u155356178_DesarrolloSalu";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el código de barras enviado por AJAX
$codigo = $_POST['codigoEscaneado'];

// Consultar la base de datos para obtener el artículo correspondiente al código de barras
$sql = "SELECT * FROM Stock_POS WHERE Cod_Barra = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $codigo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si se encontró el artículo, devolver sus datos en formato JSON
    $row = $result->fetch_assoc();
    $data = array(
        "id" => $row["ID_Prod_POS"],
        "codigo" => $row["Cod_Barra"],
        "descripcion" => $row["Nombre_Prod"],
        "cantidad" => [1],
        "precio" => $row["Precio_Venta"],
      "eliminar" => ""
    );
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // Si no se encontró el artículo, devolver un array vacío en formato JSON
    $data = array();
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Cerrar la conexión a la base de datos
$stmt->close();
$conn->close();
?>
