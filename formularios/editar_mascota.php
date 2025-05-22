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
    <link rel="stylesheet" href="../front/forms.css">
    <script src="../front/menu.js"></script>

</head>
<body>
    <nav class="menu" id="menu">
        <div class="contenido_menu">
            <img src="../media/cross.svg" alt="No se ha podido cargar la imagen" class="imagen_cruz" onclick="cerrarmenu()">

            <li><a href="../vistas/consultas.php" class="link active">Consultas</a>
            <li><a href="../vistas/dar_de_alta.php" class="link">Dar de alta</a>
            <li><a href="../vistas/tienda.php" class="link">Tienda</a>
                
        </div>

        
    </nav>

    <div class="boton_abrir_menu" id="boton">
        <img src="../media/menu.svg" alt="No se ha podido cargar la imagen" onclick="abrirmenu()">
    </div>
    <main id="layout">
        <a class="Btn" href="../procesos/logs/logout.php">
    
        <div class="sign"><svg viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"></path></svg></div>
        
        <div class="text">Logout</div>
    </a>
<header><h1>Editar Mascota</h1></header>
<div class="layout">
<section class="form">
    <form method="post" action="../procesos/update/update_mascota.php">
        <!-- Campo oculto para enviar el id_animal -->
        <input type="hidden" name="id_animal" value="<?= $id_animal ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= $mascota['nombre_animal'] ?>"><br><br>

        <label>Fecha nacimiento:</label>
        <input type="date" name="edad" value="<?= $mascota['edad_animal'] ?>"><br><br>

        <label>Peso:</label>
        <input type="text" name="peso" value="<?= $mascota['peso_animal'] ?>"><br><br>

        <label>Color:</label>
        <input type="text" name="color" value="<?= $mascota['color_animal'] ?>"><br><br>

        <label>DNI Dueño:</label>
        <input type="text" name="dni_dueno" value="<?= $mascota['dni_dueno'] ?>"><br><br>

        <label>DNI Veterinario:</label>
        <input type="text" name="dni_vet" value="<?= $mascota['dni_veterinario'] ?>"><br><br>

        <label>Especie:</label>
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

        <label>Raza:</label>
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
</main>
</body>
</html>