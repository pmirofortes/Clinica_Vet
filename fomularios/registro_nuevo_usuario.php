<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
</head>
<body>
    <header>
        <h1>Registro de Veterinario</h1>
    </header>
    <div class="layout">
        <section class="menu">
            <li><a href="../index.php" class="link"><img src="../media/lupa.png" class= "icono">Consultar mascotas</a></li>
            <li><a href="../fomularios/registro_nueva_mascota.php" class="link">Dar de alta mascota</a></li>
            <li><a href="../fomularios/registro_nuevo_propietario.php" class="link">Dar de alta propietario</a></li>
            <li><a href="../fomularios/registro_nuevo_usuario.php" class="link active"><img src="../media/veterinario.png" class="icono">Dar de alta veterinario</a></li>
        </section>
        <section class="form">
            <form action="../procesos/create_usuario.php" method="post">
                <label for="nombre">Nombre de usuario:</label><br>
                <input type="text" id="nombre" name="nombre"><br><br>
                
                <label for="mail">Correo electronico:</label><br>
                <input type="mail" id="mail" name="mail"><br><br>
                
                <label for="pass">Contraseña:</label><br>
                <input type="password" id="pass" name="pass"><br><br>
                
                <label for="confirmPass">Confirmar Contraseña:</label><br>
                <input type="password" id="confirmPass" name="confirmPass"><br><br>
                <input type="submit" value="Registrar Usuario">
            </form> 
        </section>
    </div>
</body>
</html>