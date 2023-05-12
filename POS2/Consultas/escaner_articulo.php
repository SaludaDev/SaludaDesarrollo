<?php

// Verificamos si se recibió el código del artículo en la solicitud POST
if (isset($_POST['codigoArticulo'])) {

    // Conectamos con la base de datos (suponiendo que utilizas MySQL)
    $servername = "localhost";
    $username = "u155356178_CorpoSaluda";
    $password = "SSalud4Dev2495#$";
    $dbname = "u155356178_DesarrolloSalu";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Escapamos el código del artículo para evitar inyecciones SQL
    $codigoArticulo = $conn->real_escape_string($_POST['codigoArticulo']);

    // Realizamos la consulta para obtener los detalles del artículo
    $sql = "SELECT codigo_producto, descripcion_producto, cantidad FROM productos WHERE codigo_producto = '{$codigoArticulo}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Si se encontró el artículo, devolvemos los detalles en formato JSON
        $row = $result->fetch_assoc();
        $response = array(
            "codigo" => true,
            "id" => $row["codigo_producto"],
            "descripcion" => $row["descripcion_producto"],
            "cantidad" => $row["cantidad"]
        );
        echo json_encode($response);

    } else {

        // Si no se encontró el artículo, devolvemos una respuesta vacía en formato JSON
        $response = array("codigo" => false);
        echo json_encode($response);

    }

    // Cerramos la conexión con la base de datos
    $conn->close();

} else {

    // Si no se recibió el código del artículo, devolvemos un error en formato JSON
    $response = array("error" => "Código de artículo no recibido en la solicitud");
    echo json_encode($response);

}
