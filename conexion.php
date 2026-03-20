<?php
// Datos directos para no pelear más con el panel de Render
$host = 'gateway01.us-east-1.prod.aws.tidbcloud.com';
$port = '4000';
$db   = 'test';
$user = 'WFR6zs7jTo8Mf1j.root';
$pass = 'HcliKJ3wcAPOznXu'; // <--- PEGA TU CLAVE AQUÍ

try {
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => "/etc/ssl/certs/ca-certificates.crt",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    $con = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4", $user, $pass, $options);
    
    // Si llega aquí, es que por fin entró
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
