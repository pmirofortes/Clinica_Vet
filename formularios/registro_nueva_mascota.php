<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}
include('../servicios/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Mascota</title>
    <link rel="stylesheet" href="../front/estilos.css">
</head>
<body>
<header><h1>Registro de Mascota</h1></header>
<div class="layout">
<section class="menu">
            <li><a href="../index.php" class="link active">Consultar mascotas</a>
            <li><a href="../formularios/registro_nueva_mascota.php" class="link">Dar de alta mascota</a>
            <li><a href="../formularios/registro_nuevo_propietario.php" class="link">Dar de alta propietario</a>
            <li><a href="../formularios/registro_nuevo_usuario.php" class="link">Dar de alta veterinario</a>
            <li><a href="../formularios/registro_nueva_especie.php" class="link">Dar de alta especie</a></li>
            <li><a href="../formularios/registro_nueva_raza.php" class="link">Dar de alta raza</a></li>
            <li><a href="../vistas/razas_especies.php" class="link">Consultar especies y razas</a></li>
            <li><a href="../vistas/propietarios.php" class="link">Consultar propietarios</a></li>
    </section>

<section class="form">
    <form method="post" action="../procesos/create/create_mascota.php">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($_SESSION['nombre'] ?? '') ?>"><br><br>

        <label>Fecha nacimiento:</label><br>
        <input type="date" name="edad" value="<?= htmlspecialchars($_SESSION['edad'] ?? '') ?>"><br><br>

        <label>Peso:</label><br>
        <input type="number" name="peso" value="<?= htmlspecialchars($_SESSION['peso'] ?? '') ?>"> kg<br><br>

        <label>Color:</label><br>
        <input type="text" name="color" value="<?= htmlspecialchars($_SESSION['color'] ?? '') ?>"><br><br>

        <label>DNI Dueño:</label><br>
        <input type="text" name="dni_dueño" value="<?= htmlspecialchars($_SESSION['dni_dueño'] ?? '') ?>"><br><br>

        <label>DNI Veterinario:</label><br>
        <input type="text" name="dni_vet" value="<?= htmlspecialchars($_SESSION['dni_vet'] ?? '') ?>">
        <br><br>

        <label>Especie:</label><br>
        <select name="especie">
            <option value="">Seleccionar especie</option>
            <?php
            $sql = "SELECT id_especie, nombre_especie FROM especie";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $selected = (isset($_POST['especie']) && $_POST['especie'] == $row['id_especie']) ? 'selected' : '';
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
                $selected = (isset($_POST['raza']) && $_POST['raza'] == $row['id_raza']) ? 'selected' : '';
                echo "<option value='{$row['id_raza']}' $selected>{$row['nombre_raza']}</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="registrar_mascota" value="Registrar Mascota" >
    </form>
</section>
</div>
</body>
</html>
