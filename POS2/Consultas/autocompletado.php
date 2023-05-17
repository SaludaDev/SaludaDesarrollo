<?php
// Conecta con la base de datos y realiza la consulta para obtener los resultados de autocompletado
$dbHost = 'localhost'; // Cambia esto por la dirección de tu servidor de base de datos
$dbUsername = 'u155356178_CorpoSaluda'; // Cambia esto por tu nombre de usuario de la base de datos
$dbPassword = 'SSalud4Dev2495#$'; // Cambia esto por tu contraseña de la base de datos
$dbName = 'u155356178_DesarrolloSalu'; // Cambia esto por el nombre de tu base de datos

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
  die('Error de conexión: ' . mysqli_connect_error());
}

$term = $_GET['term'];

// Asigna el valor de Fk_sucursal antes de la consulta
$sucursal =21;

$query = "SELECT Cod_Barra, Nombre_Prod,Fk_sucursal FROM Stock_POS WHERE  Cod_Barra LIKE '%{$term}%' OR Nombre_Prod LIKE '%{$term}%' AND Fk_sucursal ='".$sucursal."'";
$result = mysqli_query($conn, $query);

$autocompletado = array();
while ($row = mysqli_fetch_assoc($result)) {
  $autocompletado[] = array(
    'label' => $row['Cod_Barra'] . ' - ' . $row['Nombre_Prod'],
    'value' => $row['Cod_Barra']
  );
}

echo json_encode($autocompletado);

mysqli_close($conn);
?>
