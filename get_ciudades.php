<?php
include_once 'conexion.php';

$id = $_GET['id_dep'] ?? null;

if ($id) {
    $stmt = $con->prepare('SELECT id_ciudad, nombre FROM ciudad WHERE id_departamento = :id ORDER BY nombre ASC');
    $stmt->execute([':id' => $id]);
    $ciudades = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<option value="">Seleccione Ciudad...</option>';
    foreach ($ciudades as $c) {
        echo '<option value="'.$c['id_ciudad'].'">'.$c['nombre'].'</option>';
    }
}
?>