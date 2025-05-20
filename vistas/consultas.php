<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

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
    <title>Consultas</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
</head>
<body id="opciones">
    <nav class="menu" id="menu">
        <div class="contenido_menu">
            <img src="../media/cross.svg" alt="No se ha podido cargar la imagen" class="imagen_cruz" onclick="cerrarmenu()">

            <li><a href="./consultas.php" class="link">Consultar</a>
            <li><a href="./dar_de_alta.php" class="link">Dar de alta</a>
            <li><a href="./tienda.php" class="link">Tienda</a>
                
        </div>

        
    </nav>

    <div class="boton_abrir_menu" id="boton">
        <img src="../media/menu.svg" alt="No se ha podido cargar la imagen" onclick="abrirmenu()">
    </div>

    <main class="layout" id="layout">
        <section class="contenido_de_botones">
            <a href="../index.php" class="boton_eleccion" onmouseover="imagenmascotas()" onmouseleave="cerrar_imagenmascotas()"><span>Consultar mascotas</span></a>
            <a href="./razas_especies.php" class="boton_eleccion" onmouseover="imagenrazas()" onmouseleave="cerrar_imagenrazas()"><span>Consultar razas</span></a>
            <a href="./propietarios.php" class="boton_eleccion" onmouseover="imagenpropietarios()" onmouseleave="cerrar_imagenpropietarios()"><span>Consultar propietarios</span></a>
            <a href="./veterinarios.php" class="boton_eleccion"><span>Consultar veterinarios</span></a>
        </section>

        <section class="contenedor_de_imagenes">
            <img id="img_mascotas" class="imagenes_opccion" src="../media/mascotas.png" alt="" >
            <img id="img_razas" class="imagenes_opccion" src="../media/imagen_razas.png" alt="" >
            <img id="img_propietarios" class="imagenes_opccion" src="../media/propietarios.png" alt="" >
        </section>

    <a class="Btn" href="../procesos/logs/logout.php">
    
        <div class="sign"><svg viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"></path></svg></div>
        
        <div class="text">Logout</div>
    </a>

    </main>
</body>
</html>