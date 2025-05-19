<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}
if (isset($_GET['id_raza'])) {
    $id_raza = $_GET['id_raza'];
    include_once '../servicios/conexion.php';

    // Consulta para obtener los datos de la raza
    $sql = "SELECT * FROM raza WHERE id_raza = $id_raza";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $raza = mysqli_fetch_assoc($result);
    } else {
        // Redirigir si no se encuentra la raza
        header('Location: ../index.php');
        exit();
    }
} else {
    // Redirigir si no se pasa el id_animal
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Raza</title>
    <link rel="stylesheet" href="../front/estilos.css">
</head>
<body>
<header><h1>Editar Raza</h1></header>
<section class="form">
    <form method="post" action="../procesos/update/update_raza.php">
        <input type="hidden" name="id_raza" value="<?= $id_raza ?>">

        <label>Nombre raza:</label><br>
        <input type="text" name="nombre" value="<?= $raza['nombre_raza'] ?>"><br><br>

        <label>Especie:</label><br>
        <select name="especie">
            <option value="">Seleccionar especie</option>
            <?php
            $sql = "SELECT id_especie, nombre_especie FROM especie";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $selected = ($raza['id_especie'] == $row['id_especie']) ? 'selected' : '';
                echo "<option value='{$row['id_especie']}' $selected>{$row['nombre_especie']}</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" name="actualizar_raza" value="Actualizar Raza">
    </form>
</section>
</body>
</html>