<?php
include_once 'conexion.php';

// 1. Consulta con JOIN para traer nombres de ciudad y departamento
$sql_base = "SELECT c.*, ciu.nombre AS ciudad, dep.nombre AS departamento 
             FROM clientes c
             INNER JOIN ciudad ciu ON c.id_ciudad = ciu.id_ciudad
             INNER JOIN departamento dep ON ciu.id_departamento = dep.id_departamento";

// Consulta inicial
$sentencia_select = $con->prepare($sql_base . " ORDER BY c.documento_v DESC");
$sentencia_select->execute();
$resultado = $sentencia_select->fetchAll();

// Metodo buscar
if(isset($_POST['btn_buscar'])){
    $buscar_text = $_POST['buscar'];
    // Usamos el mismo JOIN para que la búsqueda también traiga los nombres
    $select_buscar = $con->prepare($sql_base . " WHERE c.nombre LIKE :campo OR c.documento_v LIKE :campo");
    $select_buscar->execute(array(':campo' => "%" . $buscar_text . "%"));
    $resultado = $select_buscar->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes | ariaSoftware</title>
    <link rel="stylesheet" href="css/stylo.css">
</head>
<body>
    <div class="contenedor">
        <h2>CLIENTES</h2>
        <div class="barra__buscador">
            <form action="" class="formulario" method="post">
                <input type="text" name="buscar" placeholder="Buscar Cliente o Documento" 
                value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                <a href="insert_cliente.php" class="btn btn__nuevo">Nuevo</a>
            </form>
        </div>
        <table>
            <tr class="head">
                <td>Documento</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Ciudad</td>
                <td>Departamento</td>
                <td colspan="2">Acción</td>
            </tr>
            <?php foreach($resultado as $fila):?>
                <tr>
                    <td><?php echo $fila['documento_v']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['apellido']; ?></td>
                    <td><?php echo $fila['ciudad']; ?></td>
                    <td><?php echo $fila['departamento']; ?></td>

                    <td><a href="update_cliente.php?documento_v=<?php echo $fila['documento_v']; ?>" class="btn__update">Editar</a></td>
                    <td><a href="delete_cliente.php?documento_v=<?php echo $fila['documento_v']; ?>" class="btn__delete" onclick="return confirm('¿Estás seguro?')">Eliminar</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>