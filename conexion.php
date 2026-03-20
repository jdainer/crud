<?php
// Leer variables de entorno de Render
$host = getenv('DB_HOST');
$port = getenv('DB_PORT') ?: '3306';
$db   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$charset = 'utf8mb4';

// Validación: Si no hay host, detenemos el proceso con un mensaje claro
if (!$host) {
    die("Error: La variable DB_HOST no está configurada en el panel de Render.");
}

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    // Configuración para que PDO sea estricto con los errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    // En producción es mejor no mostrar detalles sensibles, pero para debugear usamos esto:
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
