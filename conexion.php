<?php
$database = "crud";
$user = 'root';
$password = '';

try {
    // Creamos una nueva instancia de PDO para la conexión
    $con = new PDO('mysql:host=localhost;dbname=' . $database, $user, $password);
    
    // Opcional: Mensaje para confirmar que funcionó
    // echo "Conexión exitosa";

} catch (PDOException $e) {
    // Si algo falla, atrapamos el error y lo mostramos
    echo "Error: " . $e->getMessage();
}
?>