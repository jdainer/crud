<?php
// Esto lee lo que pusiste en el panel de Render
$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

try {
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/certs/ca-certificates.crt",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // Si $host está vacío, dará el error que te sale ahora. 
    // Por eso es vital el paso de "Link Environment Group" arriba.
    $con = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass, $options);
    
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
