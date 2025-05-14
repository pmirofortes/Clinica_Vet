<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}
if (isset($_GET['id_animal'])) {
    $id_animal = $_GET['id_animal'];
    include_once '../servicios/conexion.php';

    // Consulta para obtener los datos de la mascota
    $sql = "SELECT * FROM animal WHERE id_animal = $id_animal";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $mascota = mysqli_fetch_assoc($result);
    } else {
        // Redirigir si no se encuentra la mascota
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
    <title>Editar Mascota</title>
    <link rel="stylesheet" href="../front/estilos.css">
</head>
<body>
<header><h1>Editar Mascota</h1></header>
<div class="layout">
<section class="menu">
            <li><a href="../index.php" class="link">Consultar mascotas</a>
            <li><a href="../formularios/registro_nueva_mascota.php" class="link">Dar de alta mascota</a>
            <li><a href="../formularios/registro_nuevo_propietario.php" class="link">Dar de alta propietario</a>
            <li><a href="../formularios/registro_nuevo_usuario.php" class="link">Dar de alta veterinario</a>
            <li><a href="../formularios/registro_nueva_especie.php" class="link">Dar de alta especie</a></li>
            <li><a href="../formularios/registro_nueva_raza.php" class="link">Dar de alta raza</a></li>
            <li><a href="../vistas/razas_especies.php" class="link">Consultar especies y razas</a></li>
            <li><a href="../vistas/propietarios.php" class="link">Consultar propietarios</a></li>
    </section>
<section class="form">
    <form method="post" action="../procesos/update/update_mascota.php">
        <!-- Campo oculto para enviar el id_animal -->
        <input type="hidden" name="id_animal" value="<?= $id_animal ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= $mascota['nombre_animal'] ?>"><br><br>

        <label>Fecha nacimiento:</label><br>
        <input type="date" name="edad" value="<?= $mascota['edad_animal'] ?>"><br><br>

        <label>Peso:</label><br>
        <input type="number" name="peso" value="<?= $mascota['peso_animal'] ?>"> kg<br><br>

        <label>Color:</label><br>
        <input type="text" name="color" value="<?= $mascota['color_animal'] ?>"><br><br>

        <label>DNI Dueño:</label><br>
        <input type="text" name="dni_dueño" value="<?= $mascota['dni_dueno'] ?>"><br><br>

        <label>DNI Veterinario:</label><br>
        <input type="text" name="dni_vet" value="<?= $mascota['dni_veterinario'] ?>"><br><br>

        <label>Especie:</label><br>
        <select name="especie">
            <option value="">Seleccionar especie</option>
            <?php
            $sql = "SELECT id_especie, nombre_especie FROM especie";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $selected = ($mascota['id_especie'] == $row['id_especie']) ? 'selected' : '';
                echo "<option value='{$row['id_especie']}' $selected>{$row['nombre_especie']}</option>";
            }
            ?>
        </select><br><br>

        <label>Raza:</label><br>
        <select name="raza">
            <option value="">Seleccionar raza</option>
            <?php
            $sql = "SELECT id_raza, nombre_raza FROM raza";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $selected = ($mascota['id_raza'] == $row['id_raza']) ? 'selected' : '';
                echo "<option value='{$row['id_raza']}' $selected>{$row['nombre_raza']}</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="actualizar_mascota" value="Actualizar Mascota">
    </form>
</section>
</div>
</body>
</html>