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
            <a href="../formularios/registro_nueva_mascota.php" class="boton_eleccion" onmouseover="registroM()" onmouseleave="cerrar_registroM()"><span>Registrar mascota</span></a>
            <a href="../formularios/registro_nueva_especie.php" class="boton_eleccion" onmouseover="registroE()" onmouseleave="cerrar_registroE()"><span>Registrar especie</span></a>
            <a href="../formularios/registro_nueva_raza.php" class="boton_eleccion" onmouseover="registroR()" onmouseleave="cerrar_registroR()"><span>Registrar raza</span></a>
            <a href="../formularios/registro_nuevo_propietario.php" class="boton_eleccion" onmouseover="registroP()" onmouseleave="cerrar_registroP()"><span>Registrar propietario</span></a>
            <a href="../formularios/registro_nuevo_usuario.php" class="boton_eleccion" onmouseover="registroU()" onmouseleave="cerrar_registroU()"><span>Registrar usuario</span></a>


        </section>

        <img id="registroM" class="imagenes_opccion" src="../media/registroM.png" alt="" >
        <img id="registroE" class="imagenes_opccion" src="../media/registroE.png" alt="" >
        <img id="registroR" class="imagenes_opccion" src="../media/registroR.png" alt="" >
        <img id="registroP" class="imagenes_opccion" src="../media/registroP.png" alt="" >
        <img id="registroU" class="imagenes_opccion" src="../media/registroU.png" alt="" >


    </main>
</body>
</html>