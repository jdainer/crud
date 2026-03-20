<?php
$host = 'gateway01.us-east-1.prod.aws.tidbcloud.com';
$port = '4000';
$db   = 'test';
$user = 'WFR6zs7iTo8Mfti.root';
$pass = 'TU_CONTRASEÑA'; // La que generaste en TiDB

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    echo "¡Conectado con éxito!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
