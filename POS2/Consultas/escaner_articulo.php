<?php
    $servername = "localhost";
    $username = "u155356178_CorpoSaluda";
    $password = "SSalud4Dev2495#$";
    $dbname = "u155356178_DearrolloSalu";
 
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // Obtener el código de barras enviado por AJAX
    $codigo = $_POST['codigoEscaneado'];
    
    // Consultar la base de datos para obtener el artículo correspondiente al código de barras
    $sql = "SELECT * FROM articulos WHERE codigo = '$codigo'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Si se encontró el artículo, devolver sus datos en formato JSON
        $row = $result->fetch_assoc();
        $data = array(
            "id" => $row["id"],
            "descripcion" => $row["descripcion"],
            "cantidad" => $row["cantidad"],
            "codigo" => $row["codigo"]
        );
        echo json_encode($data);
    } else {
        // Si no se encontró el artículo, devolver un array vacío en formato JSON
        $data = array();
        echo json_encode($data);
    }
    
    // Cerrar la conexión a la base de datos
    $conn->close();
    
    ?>
    