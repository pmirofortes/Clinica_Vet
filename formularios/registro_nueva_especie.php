<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de propietario</title>
    <link rel="stylesheet" href="../front/forms.css">
    <script src="../front/menu.js"></script>
    <script src="../front/validaciones.js"></script>
    <link rel="icon" href="../media/favicon.png" type="image/png">
    
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
    <header>
        <h1>Registro de Especie</h1>
    </header>
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
          
<form action="../procesos/create/create_especie.php" method="post">
    <label for="nombre">Nombre especie:</label><br>
    <input type="text" id="nombre" name="nombre" onblur="validarNombreEspecie()">
    <span id="errorNombre" class="error"></span><br><br>
    
    <label for="nombre_cientifico">Nombre científicio:</label><br>
    <input type="text" id="nombre_cientifico" name="nombre_cientifico" onblur="validarNombreCientifico()">
    <span id="errorNombreCien" class="error"></span><br><br>
    
    <label for="clas">Clasificación:</label><br>
    <select name="clas" id="opcion" onblur="clasifEspecie()">
        <option value="" disabled selected>Selecciona una especie</option>
        <option value="mamifero">mamifero</option>
        <option value="pez">pez</option>
        <option value="invertebrado">invertebrado</option>
        <option value="ave">ave</option>
        <option value="reptil">reptil</option>
        <option value="amfibio">amfibio</option>
    </select>
    <span id="errorSelect" class="error"></span><br><br>

    <input type="submit" value="Registrar Especie">
</form>
        </section>
    </div>
</main>      
</body>
</html>