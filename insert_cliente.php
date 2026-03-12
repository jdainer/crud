<?php 
include_once 'conexion.php';

// 1. Consultar todos los departamentos
$stmt_dep = $con->prepare("SELECT id_departamento, nombre FROM departamento ORDER BY nombre ASC");
$stmt_dep->execute();
$departamentos = $stmt_dep->fetchAll(PDO::FETCH_ASSOC);

// 2. Detectar departamento seleccionado (para filtrar ciudades)
$dep_seleccionado = isset($_POST['id_departamento_filtro']) ? $_POST['id_departamento_filtro'] : null;
$ciudades = [];

if ($dep_seleccionado) {
    $stmt_ciu = $con->prepare("SELECT id_ciudad, nombre FROM ciudad WHERE id_departamento = ? ORDER BY nombre ASC");
    $stmt_ciu->execute([$dep_seleccionado]);
    $ciudades = $stmt_ciu->fetchAll(PDO::FETCH_ASSOC);
}

// 3. Lógica de Guardado (Solo una vez)
if(isset($_POST['guardar'])){
    $documento = $_POST['documento_v'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $id_ciudad = $_POST['id_ciudad']; 

    if(!empty($documento) && !empty($nombre) && !empty($id_ciudad)){
        try {
            // Asegúrate de que la tabla se llame 'cliente' o 'clientes' según tu DB
            $sql_ins = "INSERT INTO clientes(documento_v, nombre, apellido, id_ciudad) VALUES(?,?,?,?)";
            $consulta = $con->prepare($sql_ins);
            $resultado = $consulta->execute([$documento, $nombre, $apellido, $id_ciudad]);

            if($resultado){
                header('Location: index.php');
                exit;
            }
        } catch (PDOException $e) {
            echo "<script>alert('Error en la base de datos: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor llene todos los campos, incluyendo la ciudad');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Cliente | Ariasoftware</title>
    <style>
        body { background-color: #f4f7f6; font-family: sans-serif; display: flex; justify-content: center; padding: 20px; }
        .contenedor { background: white; padding: 25px; border-radius: 8px; width: 400px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .input__text { width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { width: 100%; padding: 12px; border: none; border-radius: 4px; color: white; font-weight: bold; cursor: pointer; background-color: #27ae60; margin-top: 10px; }
        label { font-weight: bold; display: block; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="contenedor">
    <a href="index.php" <button class="btn">volber</a>

            

        <h2 style="text-align:center">NUEVO CLIENTE</h2>
        
        <form method="post" id="mainForm">
            <label>Datos Personales</label>
            <input type="text" name="documento_v" placeholder="Documento" class="input__text" value="<?php echo $_POST['documento_v'] ?? ''; ?>" required>
            <input type="text" name="nombre" placeholder="Nombre" class="input__text" value="<?php echo $_POST['nombre'] ?? ''; ?>" required>
            <input type="text" name="apellido" placeholder="Apellido" class="input__text" value="<?php echo $_POST['apellido'] ?? ''; ?>" required>

            <label>Departamento</label>
            <select name="id_departamento_filtro" class="input__text" onchange="cambiarDepartamento()">
                <option value="">Seleccione Departamento...</option>
                <?php foreach($departamentos as $d): ?>
                    <option value="<?php echo $d['id_departamento']; ?>" <?php echo ($dep_seleccionado == $d['id_departamento']) ? 'selected' : ''; ?>>
                        <?php echo $d['nombre']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Ciudad</label>
            <select name="id_ciudad" class="input__text" required>
                <option value="">Seleccione Ciudad...</option>
                <?php foreach($ciudades as $c): ?>
                    <option value="<?php echo $c['id_ciudad']; ?>"><?php echo $c['nombre']; ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" name="guardar" class="btn">GUARDAR CLIENTE</button> <br>
            
        </form>
        
    </div>

    <script>
    function cambiarDepartamento() {
        // Esta función envía el formulario pero sin el "name=guardar" 
        // para que PHP sepa que solo estamos filtrando ciudades.
        const form = document.getElementById('mainForm');
        form.submit();
    }
    </script>
          

</body>
</html>