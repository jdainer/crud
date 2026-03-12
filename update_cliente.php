<?php
include_once 'conexion.php';

// 1. Recuperar los datos del cliente y su ubicación actual
if(isset($_GET['documento_v'])){
    $documento_v = $_GET['documento_v'];

    // Traemos al cliente y unimos con ciudad para saber su departamento actual
    $buscar_id = $con->prepare('
        SELECT c.*, ciu.id_departamento 
        FROM clientes c 
        INNER JOIN ciudad ciu ON c.id_ciudad = ciu.id_ciudad 
        WHERE c.documento_v = :doc LIMIT 1
    ');
    $buscar_id->execute(array(':doc' => $documento_v));
    $resultado = $buscar_id->fetch();

    if(!$resultado) { header('Location: index.php'); exit; }
} else {
    header('Location: index.php'); exit;
}

// 2. Lógica para los Selects (Departamentos y Ciudades filtradas)
$stmt_dep = $con->prepare("SELECT id_departamento, nombre FROM departamento ORDER BY nombre ASC");
$stmt_dep->execute();
$departamentos = $stmt_dep->fetchAll(PDO::FETCH_ASSOC);

// Si el usuario cambió el departamento en el select, usamos ese. 
// Si no, usamos el que ya tenía el cliente guardado.
$dep_seleccionado = $_POST['id_departamento_filtro'] ?? $resultado['id_departamento'];

$ciudades = [];
if ($dep_seleccionado) {
    $stmt_ciu = $con->prepare("SELECT id_ciudad, nombre FROM ciudad WHERE id_departamento = ? ORDER BY nombre ASC");
    $stmt_ciu->execute([$dep_seleccionado]);
    $ciudades = $stmt_ciu->fetchAll(PDO::FETCH_ASSOC);
}

// 3. Procesar la actualización
if(isset($_POST['actualizar'])){
    $documento = $_POST['documento_v'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_ciudad = $_POST['id_ciudad'];

    if(!empty($nombre) && !empty($id_ciudad)){
        try {
            $sql_upd = "UPDATE clientes SET nombre = ?, apellido = ?, id_ciudad = ? WHERE documento_v = ?";
            $con->prepare($sql_upd)->execute([$nombre, $apellido, $id_ciudad, $documento]);
            header('Location: index.php');
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente | Ariasoftware</title>
    <link rel="stylesheet" href="css/stylo.css">
    <style>
        body { background-color: #f4f7f6; font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
        .contenedor { background: white; padding: 25px; border-radius: 8px; width: 400px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .input__text { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { padding: 12px 20px; border: none; border-radius: 4px; color: white; font-weight: bold; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn__nuevo { background-color: #27ae60; }
        .btn__delete { background-color: #e74c3c; }
        label { font-weight: bold; display: block; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="contenedor">
        <h2 style="text-align:center">EDITAR CLIENTE</h2>
        
        <form method="post" id="updateForm">
            <label>Documento (No editable)</label>
            <input type="text" name="documento_v" value="<?php echo $resultado['documento_v']; ?>" readonly class="input__text" style="background: #eee;">

            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $_POST['nombre'] ?? $resultado['nombre']; ?>" class="input__text" required>

            <label>Apellido</label>
            <input type="text" name="apellido" value="<?php echo $_POST['apellido'] ?? $resultado['apellido']; ?>" class="input__text" required>

            <label>Departamento</label>
            <select name="id_departamento_filtro" class="input__text" onchange="this.form.submit()">
                <?php foreach($departamentos as $d): ?>
                    <option value="<?php echo $d['id_departamento']; ?>" <?php echo ($dep_seleccionado == $d['id_departamento']) ? 'selected' : ''; ?>>
                        <?php echo $d['nombre']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Ciudad</label>
            <select name="id_ciudad" class="input__text" required>
                <?php foreach($ciudades as $c): ?>
                    <option value="<?php echo $c['id_ciudad']; ?>" <?php echo ($resultado['id_ciudad'] == $c['id_ciudad']) ? 'selected' : ''; ?>>
                        <?php echo $c['nombre']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div style="margin-top: 20px; display: flex; justify-content: space-between;">
                <a href="index.php" class="btn btn__delete">Cancelar</a>
                <button type="submit" name="actualizar" class="btn btn__nuevo">Actualizar Datos</button>
            </div>
        </form>
    </div>
</body>
</html>