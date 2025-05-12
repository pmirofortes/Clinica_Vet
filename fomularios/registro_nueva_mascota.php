<?php
session_start();
include_once '../servicios/conexion.php';

$mensajeDueño = "";
$mensajeVet = "";
$claseInputDueño = "";
$claseInputVet = "";

if (!isset($_SESSION['dni_dueno_valido'])) $_SESSION['dni_dueno_valido'] = false;
if (!isset($_SESSION['dni_vet_valido'])) $_SESSION['dni_vet_valido'] = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Buscar DNI dueño
    if (isset($_POST['buscar_dni_dueño'])) {
        $dni_dueño = mysqli_real_escape_string($conn, $_POST['dni_dueño']);
        $_SESSION['dni_dueño'] = $dni_dueño;

        $sql = "SELECT nombre_dueno, apellidos_dueno FROM dueno WHERE dni_dueno = '$dni_dueño'";
        $resultado = mysqli_query($conn, $sql);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $mensajeDueño = "Dueño encontrado: " . $row['nombre_dueno'] . " " . $row['apellidos_dueno'];
            $claseInputDueño = "input-verde";
            $_SESSION['dni_dueno_valido'] = true;
        } else {
            $mensajeDueño = "No se encontró ningún dueño con ese DNI.";
            $claseInputDueño = "input-rojo";
            $_SESSION['dni_dueno_valido'] = false;
        }
    }

    // Buscar DNI veterinario
    if (isset($_POST['buscar_dni_vet'])) {
        $dni_vet = mysqli_real_escape_string($conn, $_POST['dni_vet']);
        $_SESSION['dni_vet'] = $dni_vet;

        $sql = "SELECT nombre_veterinario, apellidos_veterinario FROM veterinario WHERE dni_veterinario = '$dni_vet'";
        $resultado = mysqli_query($conn, $sql);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $mensajeVet = "Veterinario encontrado: " . $row['nombre_veterinario'] . " " . $row['apellidos_veterinario'];
            $claseInputVet = "input-verde";
            $_SESSION['dni_vet_valido'] = true;
        } else {
            $mensajeVet = "No se encontró ningún veterinario con ese DNI.";
            $claseInputVet = "input-rojo";
            $_SESSION['dni_vet_valido'] = false;
        }
    }

    // Registrar mascota
    if (isset($_POST['registrar_mascota']) && $_SESSION['dni_dueno_valido'] && $_SESSION['dni_vet_valido']) {
        $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
        $edad = mysqli_real_escape_string($conn, $_POST['edad']);
        $peso = mysqli_real_escape_string($conn, $_POST['peso']);
        $color = mysqli_real_escape_string($conn, $_POST['color']);
        $especie = $_POST['especie'];
        $raza = $_POST['raza'];

        $sql = "INSERT INTO mascota (nombre_mascota, fecha_nacimiento, peso, color, id_especie, id_raza, dni_dueno, dni_veterinario)
                VALUES ('$nombre', '$edad', '$peso', '$color', '$especie', '$raza', '{$_SESSION['dni_dueño']}', '{$_SESSION['dni_vet']}')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Mascota registrada correctamente.');</script>";
            $_SESSION['dni_dueno_valido'] = false;
            $_SESSION['dni_vet_valido'] = false;
            $_SESSION['dni_dueño'] = "";
            $_SESSION['dni_vet'] = "";
        } else {
            echo "<script>alert('Error al registrar mascota.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Mascota</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <style>
        .input-verde { border: 2px solid green; }
        .input-rojo { border: 2px solid red; }
        .mensaje { font-weight: bold; margin-top: 10px; }
        .mensaje-verde { color: green; }
        .mensaje-rojo { color: red; }
    </style>
</head>
<body>
<header><h1>Registro de Mascota</h1></header>
<div class="layout">
<section class="menu">
    <li><a href="../index.php" class="link">Consultar mascotas</a></li>
    <li><a href="registro_nueva_mascota.php" class="link active">Dar de alta mascota</a></li>
    <li><a href="registro_nuevo_propietario.php" class="link">Dar de alta propietario</a></li>
    <li><a href="registro_nuevo_usuario.php" class="link">Dar de alta veterinario</a></li>
    <li><a href="registro_nueva_especie.php" class="link">Dar de alta especie</a></li>
    <li><a href="registro_nueva_raza.php" class="link">Dar de alta raza</a></li>
</section>

<section class="form">
    <form method="post" action="">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>"><br><br>

        <label>Fecha nacimiento:</label><br>
        <input type="date" name="edad" value="<?= htmlspecialchars($_POST['edad'] ?? '') ?>"><br><br>

        <label>Peso:</label><br>
        <input type="number" name="peso" step="0.1" value="<?= htmlspecialchars($_POST['peso'] ?? '') ?>"> kg<br><br>

        <label>Color:</label><br>
        <input type="text" name="color" value="<?= htmlspecialchars($_POST['color'] ?? '') ?>"><br><br>

        <label>DNI Dueño:</label><br>
        <input type="text" name="dni_dueño" class="<?= $claseInputDueño ?>" value="<?= htmlspecialchars($_SESSION['dni_dueño'] ?? '') ?>">
        <button type="submit" name="buscar_dni_dueño">Buscar</button>
        <?php if ($mensajeDueño): ?>
            <p class="mensaje <?= $claseInputDueño === 'input-verde' ? 'mensaje-verde' : 'mensaje-rojo' ?>"><?= $mensajeDueño ?></p>
        <?php endif; ?>
        <br>

        <label>DNI Veterinario:</label><br>
        <input type="text" name="dni_vet" class="<?= $claseInputVet ?>" value="<?= htmlspecialchars($_SESSION['dni_vet'] ?? '') ?>">
        <button type="submit" name="buscar_dni_vet">Buscar</button>
        <?php if ($mensajeVet): ?>
            <p class="mensaje <?= $claseInputVet === 'input-verde' ? 'mensaje-verde' : 'mensaje-rojo' ?>"><?= $mensajeVet ?></p>
        <?php endif; ?>
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

        <input type="submit" name="registrar_mascota" value="Registrar Mascota" <?= ($_SESSION['dni_dueno_valido'] && $_SESSION['dni_vet_valido']) ? '' : 'disabled' ?>>
    </form>
</section>
</div>
</body>
</html>
