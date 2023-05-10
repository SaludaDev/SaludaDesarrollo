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



if(isset($_POST['accion']) && !empty($_POST['accion'])) {
    $accion = $_POST['accion'];
    switch($accion) {
        
        case 'aumentar_cantidad_producto':
            if(isset($_POST['codigo_producto']) && !empty($_POST['codigo_producto']) && isset($_POST['cantidad_a_comprar']) && !empty($_POST['cantidad_a_comprar'])) {
                
                //Aquí colocas tu lógica para aumentar la cantidad del producto
                //Puedes usar las variables $_POST['codigo_producto'] y $_POST['cantidad_a_comprar'] para acceder a los valores enviados desde la página
                
                //Por ejemplo, podrías hacer lo siguiente:
                $codigo_producto = $_POST['codigo_producto'];
                $cantidad_a_comprar = $_POST['cantidad_a_comprar'];
                //Aquí realizas la operación para aumentar la cantidad del producto en tu base de datos
                
                //Luego, puedes devolver la nueva cantidad del producto en formato JSON
                $response = array(
                    'success' => true,
                    'nueva_cantidad' => $nueva_cantidad //aquí debes asignar la nueva cantidad del producto
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error: Debes proporcionar el código del producto y la cantidad a comprar'
                );
            }
            break;
            
        //Aquí puedes agregar más casos para manejar otras acciones
        
        default:
            $response = array(
                'success' => false,
                'message' => 'Error: Acción desconocida'
            );
            break;
    }
} else {
    $response = array(
        'success' => false,
        'message' => 'Error: No se proporcionó ninguna acción'
    );
}

//Devolver la respuesta en formato JSON
echo json_encode($response);


$conn->close();
?>