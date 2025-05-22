<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validaciones.js"></script>
</head>
<body>
    <div class="login wrap">
        <div class="h1">Login</div>
        <form class="form" action="../procesos/logs/login.php" method="POST">
            <input placeholder="DNI" id="dni" name="DNI" type="text" onblur="verificarDNI()" required>
            <span id="dniError" class="error"></span>
            <input placeholder="Contraseña" id="password" name="password_veterinario" type="password" onblur="verificarPasswd()" required>
            <span id="errorPassword" class="error"></span>
            <button class="login-btn" type="submit">Iniciar Sesión<div class="arrow-wrapper"><div class="arrow"></div></div></button>
        </form> 
        <a class="crear_cuenta" href="../formularios/registro_nuevo_usuario.php">Crear cuenta</a>
    </div>

    <?php
        if (isset($_GET['error'])) {
            $mensaje = '';
            switch ($_GET['error']) {
                case 1: $mensaje = "La contraseña no es correcta."; break;
                case 2: $mensaje = "No se encontró ningún usuario con ese DNI."; break;
                case 3: $mensaje = "El formato del DNI es incorrecto."; break;
                case 4: $mensaje = "La contraseña es demasiado corta."; break;
                default: $mensaje = "Ha ocurrido un error inesperado."; break;
            }
            echo "<script>alert('$mensaje');</script>";
        }
    ?>
</body>
</html>