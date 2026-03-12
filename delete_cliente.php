<?php 
include_once 'conexion.php';

if(isset($_GET['documento_v'])){
    $documento_v = (int) $_GET['documento_v']; // Convierte a entero por seguridad
    $delete = $con->prepare('DELETE FROM clientes WHERE documento_v = :documento_v');
    $delete->execute(array(
        ':documento_v' => $documento_v
    ));
    header('Location: index.php');
} else {
    header('Location: index.php');
}
?>