<?php
$host = getenv('DB_HOST') ?: 'gateway01.us-east-1.prod.aws.tidbcloud.com';
$port = getenv('DB_PORT') ?: '4000';
$db   = getenv('DB_NAME') ?: 'test';
$user = getenv('DB_USER') ?: 'WFR6zs7iTo8Mfti.root';
$pass = getenv('DB_PASS'); // Asegúrate de que esta variable esté en Render

try {
    // ESTA ES LA PARTE CLAVE: Añadimos el array de opciones para SSL
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/certs/ca-certificates.crt",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass, $options);
    
    // Asignamos $pdo a $con para que tu index.php no falle en la línea 11
    $con = $pdo; 

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
