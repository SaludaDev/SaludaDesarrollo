<?php
// Conexión a la base de datos
require_once "../Consultas/db_connect.php";

// Verificar que se haya recibido la acción a realizar
if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    switch ($accion) {
        case 1: // Obtener lista de productos
            // Consulta SQL para obtener la lista de productos
            $query = "SELECT * FROM productos";

            // Ejecutar consulta SQL
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            // Obtener resultado de la consulta
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retornar resultado como JSON
            echo json_encode($result);
            break;

        case 2: // Obtener información de un producto por su descripción
            // Verificar que se haya recibido la descripción del producto
            if (isset($_POST["descripcion_producto"])) {
                $descripcion_producto = $_POST["descripcion_producto"];

                // Consulta SQL para obtener información del producto
                $query = "SELECT p.id, p.codigo_producto, p.id_categoria, c.nombre_categoria, p.descripcion_producto, p.precio_venta_producto FROM productos p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.descripcion_producto = :descripcion_producto";

                // Ejecutar consulta SQL
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(":descripcion_producto", $descripcion_producto);
                $stmt->execute();

                // Obtener resultado de la consulta
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                // Retornar resultado como JSON
                echo json_encode($result);
            }
            break;

        default:
            // Acción no válida
            echo "Acción no válida";
            break;
    }
} else {
    // Acción no especificada
    echo "Acción no especificada";
}
?>
