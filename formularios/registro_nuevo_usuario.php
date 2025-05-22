<?php

include('../servicios/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Veterinario</title>
    <link rel="stylesheet" href="../front/forms.css">
    <script src="../front/validaciones.js"></script>
    <link rel="icon" href="../media/favicon.png" type="image/png">
     
</head>
<body>


    <main id="layout">
    <header>
        <h1>Registro de Veterinario</h1>
    </header>
    <div class="layout">
        <section class="form">
            <form action="../procesos/create/create_veterinario.php" method="post">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" onblur = "verificarNombre()"><br><br>
                <span id="errorNombre" class="error"></span><br>
                
                <label for="apellidos">Apellidos:</label><br>
                <input type="text" id="apellidos" name="apellidos" onblur = "verificarApellidos()"><br><br>
                <span id="errorApellidos" class="error"></span><br>
                
                <label for="DNI">DNI:</label><br>
                <input type="text" id="dni" name="DNI" onblur= "verificarDNI()"><br><br>
                <span id="dniError" class="error"></span><br>

                <label for="fecha">Fecha de nacimiento:</label><br>
                <input type="date" id="fecha" name="fecha" onblur = "verificarEdad()"><br><br>
                <span id="errorFecha" class="error"></span><br>

                <label for="telefono">Teléfono:</label><br>
                <input type="text" id="telefono" name="telefono" onblur= "verificarTelefono()"><br><br>
                <span id="errorTelefono" class="error"></span><br>

                <label for="localidad">Localidad:</label><br>
                <input type="text" id="localidad" name="localidad" onblur = "verificarLocalidad()"><br><br>
                <span id="errorLocalidad" class="error"></span><br>
                
                <label for="mail">Correo:</label><br>
                <input type="mail" id="email" name="mail" onblur="verificarEmail()"><br><br>
                <span id="errorMail" class="error"></span><br>
                

                <label for="password_veterinario">Contraseña:</label><br>
                <input type="password" id="password" name="password_veterinario" onblur= "verificarPasswd()"><br><br>
                <span id="errorPassword" class="error"></span><br>

                <label for="confirmPassword">Repite la contraseña:</label><br>
                <input type="password" id="confirmPassword" name="confirmPassword" onblur= "verificarConfirmPasswd()"><br><br>
                <span id="errorConfirmPassword" class="error"></span><br>

                <input type="submit" value="Registrar Propietario">

            </form> 

            <a href="../vistas/login.php">Quiero iniciar sesión</a>
        </section>
    </div>   
</main>   
</body>
</html>