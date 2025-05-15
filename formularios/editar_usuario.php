<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}

if (isset($_SESSION['dni'])) {
    $dni = $_SESSION['dni'];
    include('../servicios/conexion.php');
    $sql = "SELECT * FROM veterinario WHERE dni_veterinario='$dni'";
    $resultado = mysqli_query($conn, $sql);
    $propietario = mysqli_fetch_assoc($resultado);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
</head>
<body>
    <form action="../procesos/update/update_usuario.php" method="POST">
        <div class="inputGroup">
            <input type="text" required="" name="DNI" id="DNI" value="<?php echo $propietario['dni_veterinario']; ?>">
            <label for="DNI">DNI</label>
        </div>
        <div class="inputGroup">
            <input type="text" required="" name="nombre" id="nombre" value="<?php echo $propietario['nombre_veterinario']; ?>">
            <label for="nombre">Nombre</label>
        </div>
        <div class="inputGroup">
            <input type="text" required="" name="apellidos" id="apellidos" value="<?php echo $propietario['apellidos_veterinario']; ?>">
            <label for="apellidos">Apellidos</label>
        </div>
        <div class="inputGroup">
            <input type="text" required="" name="edad" id="edad" value="<?php echo $propietario['edad_veterinario']; ?>">
            <label for="edad">Edad</label>
        </div>
        <div class="inputGroup">
            <input type="text" required="" name="Localidad" id="localidad" value="<?php echo $propietario['localidad_veterinario']; ?>">
            <label for="Localidad">Localidad</label>
        </div>
        <div class="inputGroup">
            <input type="telf" required="" name="telefono" id="telefono" value="<?php echo $propietario['telefono_veterinario']; ?>">
            <label for="telefono">Teléfono</label>
        </div>
        <div class="inputGroup">
            <input type="mail" required="" name="mail" id="mail" value="<?php echo $propietario['correo_veterinario']; ?>">
            <label for="mail">Correo</label>
        </div>
        <div class="inputGroup">
            <input type="password" name="password" id="password" placeholder="Nueva contraseña">
            <label for="password">Nueva Contraseña</label>
        </div>
        <button type="submit" class="form_button">
            <span class="button__text">Actualizar</span>
            <span class="button__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                    <line y2="19" y1="5" x2="12" x1="12"></line>
                    <line y2="12" y1="12" x2="19" x1="5"></line>
                </svg>
            </span>
        </button>
    </form>
</body>
</html>