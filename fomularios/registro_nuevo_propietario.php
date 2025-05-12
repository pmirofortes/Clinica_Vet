<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de propietario</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
    <link rel="icon" href="../media/favicon.png" type="image/png">
</head>
<body>
    <header>
        <h1>Registro de Propietario</h1>
    </header>
    <div class="layout">
        <section class="menu">
            <li><a href="../index.php" class="link">Consultar mascotas</a></li>
            <li><a href="../fomularios/registro_nueva_mascota.php" class="link">Dar de alta mascota</a></li>
            <li><a href="../fomularios/registro_nuevo_propietario.php" class="link active">Dar de alta propietario</a></li>
            <li><a href="../fomularios/registro_nuevo_usuario.php" class="link">Dar de alta veterinario</a></li>
            <li><a href="../fomularios/registro_nueva_especie.php" class="link">Dar de alta especie</a></li>
            <li><a href="../fomularios/registro_nueva_raza.php" class="link">Dar de alta raza</a></li>
        </section>
        <section class="form">
            <form action="../procesos/create/create_propietario.php" method="post">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre"><br><br>
                
                <label for="apellidos">Apellidos:</label><br>
                <input type="text" id="apellidos" name="apellidos"><br><br>
                
                <label for="DNI">DNI:</label><br>
                <input type="text" id="DNI" name="DNI"><br><br>

                <label for="fecha">Fecha de nacimiento:</label><br>
                <input type="date" id="fecha" name="fecha"><br><br>

                <label for="telefono">Teléfono:</label><br>
                <input type="text" id="telefono" name="telefono"><br><br>

                <label for="localidad">Localidad:</label><br>
                <input type="text" id="localidad" name="localidad"><br><br>
                
                <label for="mail">Correo:</label><br>
                <input type="mail" id="mail" name="mail"><br><br>

                <input type="submit" value="Registrar Propietario">

            </form> 
        </section>
    </div>      
</body>
</html>