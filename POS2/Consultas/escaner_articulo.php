<?php

    $host = 'localhost';
    $dbname = 'u155356178_DesarrolloSalu';
    $user = 'u155356178_CorpoSaluda';
    $password = 'SSalud4Dev2495#$';



    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM articulos WHERE codigo = :codigo");
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);

    } catch(PDOException $e) {
        echo "Error al conectarse a la base de datos: " . $e->getMessage();
    }


?>