<?php

    $host = 'nombre_del_servidor';
    $dbname = 'nombre_de_la_base_de_datos';
    $user = 'nombre_de_usuario';
    $password = 'contraseña';

    $codigo = $_POST['codigoEscaneado'];

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