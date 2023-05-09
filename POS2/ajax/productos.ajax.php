<?php

// Verificar si se recibió la acción adecuada
if (isset($_POST['accion']) && $_POST['accion'] == 6) {

    // Aquí iría tu lógica para obtener los productos y devolverlos en formato JSON
    $productos = array(
        array('descripcion_producto' => 'Producto 1'),
        array('descripcion_producto' => 'Producto 2'),
        array('descripcion_producto' => 'Producto 3')
    );

    // Devolver los datos en formato JSON
    echo json_encode($productos);
}