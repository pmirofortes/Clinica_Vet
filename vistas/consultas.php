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
            <li><a href="./actualizar.php" class="link">Actualizar</a>
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
        </section>

        <section class="contenedor_de_imagenes">
            <img id="img_mascotas" class="imagenes_opccion" src="../media/mascotas.png" alt="" >
            <img id="img_razas" class="imagenes_opccion" src="../media/imagen_razas.png" alt="" >
            <img id="img_propietarios" class="imagenes_opccion" src="../media/propietarios.png" alt="" >
        </section>


    </main>
</body>
</html>