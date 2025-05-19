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
            <a href="../formularios/editar_mascota.php" class="boton_eleccion" onmouseover="registroEM()" onmouseleave="cerrar_registroEM()"><span>Editar mascota</span></a>
            <a href="../formularios/editar_especie.php" class="boton_eleccion" onmouseover="registroEE()" onmouseleave="cerrar_registroEE()"><span>Editar especie</span></a>
            <a href="../formularios/editar_raza.php" class="boton_eleccion" onmouseover="registroER()" onmouseleave="cerrar_registroER()"><span>Editar raza</span></a>
            <a href="../formularios/editar_propietario.php" class="boton_eleccion" onmouseover="registroEP()" onmouseleave="cerrar_registroEP()"><span>Editar propietario</span></a>
            <a href="../formularios/editar_usuario.php" class="boton_eleccion" onmouseover="registroEU()" onmouseleave="cerrar_registroEU()"><span>Editar usuario</span></a>


        </section>

        <img id="registroEM" class="imagenes_opccion" src="../media/registroEM.png" alt="" >
        <img id="registroEE" class="imagenes_opccion" src="../media/registroEE.png" alt="" >
        <img id="registroER" class="imagenes_opccion" src="../media/registroER.png" alt="" >
        <img id="registroEP" class="imagenes_opccion" src="../media/registroEP.png" alt="" >
        <img id="registroEU" class="imagenes_opccion" src="../media/registroEU.png" alt="" >


    </main>
</body>
</html>