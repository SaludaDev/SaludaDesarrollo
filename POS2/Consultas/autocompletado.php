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

// Obtén el término de búsqueda enviado desde el campo de autocompletado
$term = $_GET['term'];

// Realiza la consulta utilizando el término de búsqueda
$query = "SELECT codigo, descripcion FROM articulos WHERE codigo LIKE '%{$term}%' OR descripcion LIKE '%{$term}%'";
$result = mysqli_query($conn, $query);

// Genera un array con los resultados de autocompletado
$autocompletado = array();
while ($row = mysqli_fetch_assoc($result)) {
  $autocompletado[] = array(
    'label' => $row['codigo'] . ' - ' . $row['descripcion'], // Texto que se muestra en el autocompletado
    'value' => $row['codigo'] // Valor que se selecciona al elegir un resultado del autocompletado
  );
}

// Devuelve los resultados de autocompletado como JSON
echo json_encode($autocompletado);

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>