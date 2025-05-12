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
        <h1>Registro de Especie</h1>
    </header>
    <div class="layout">
        <section class="menu">
            <li><a href="../index.php" class="link">Consultar mascotas</a></li>
            <li><a href="../fomularios/registro_nueva_mascota.php" class="link">Dar de alta mascota</a></li>
            <li><a href="../fomularios/registro_nuevo_propietario.php" class="link">Dar de alta propietario</a></li>
            <li><a href="../fomularios/registro_nuevo_usuario.php" class="link">Dar de alta veterinario</a></li>
            <li><a href="../fomularios/registro_nueva_especie.php" class="link active">Dar de alta especie</a></li>
            <li><a href="../fomularios/registro_nueva_raza.php" class="link">Dar de alta raza</a></li>
        </section>
        <section class="form">
            <form action="../procesos/create/create_especie.php" method="post">
                <label for="nombre">Nombre especie:</label><br>
                <input type="text" id="nombre" name="nombre"><br><br>
                
                <label for="nombre_cientifico">Nombre científicio:</label><br>
                <input type="text" id="nombre_cientifico" name="nombre_cientifico"><br><br>
                
                <label for="clas">Clasificación:</label><br>
                <select name="clas">
                    <option value="" disabled>Selecciona una especie</option>
                    <option value="mamifero">mamifero</option>
                    <option value="pez">pez</option>
                    <option value="invertebrado">invertebrado</option>
                    <option value="ave">ave</option>
                    <option value="reptil">reptil</option>
                    <option value="amfibio">amfibio</option>
                </select><br><br>

                <input type="submit" value="Registrar Especie">

            </form> 
        </section>
    </div>      
</body>
</html>