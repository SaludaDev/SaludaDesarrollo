<?php




    // Conectamos con la base de datos (suponiendo que utilizas MySQL)
    $servername = "localhost";
    $username = "u155356178_CorpoSaluda";
    $password = "SSalud4Dev2495#$";
    $dbname = "u155356178_DesarrolloSalu";
 
// Se crea una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Se comprueba si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Se obtiene el código de barras del artículo enviado por el frontend
$codigo = $_POST['codigoEscaneado'];

// Se busca el artículo en la base de datos
$sql = "SELECT * FROM articulos WHERE codigo = '$codigo'";
$resultado = $conn->query($sql);

// Se comprueba si se encontró el artículo
if ($resultado->num_rows > 0) {
    // Se obtienen los datos del artículo y se los devuelve al frontend en formato JSON
    $fila = $resultado->fetch_assoc();
    $articulo = array(
        'id' => $fila['id'],
        'descripcion' => $fila['descripcion'],
        'cantidad' => $fila['cantidad'],
        'codigo' => $fila['codigo']
    );
    echo json_encode($articulo);
} else {
    // Si no se encontró el artículo, se devuelve un mensaje de error en formato JSON
    $error = array(
        'mensaje' => 'Artículo no encontrado'
    );
    echo json_encode($error);
}

// Se cierra la conexión a la base de datos
$conn->close();

?>
