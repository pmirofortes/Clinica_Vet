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
    <title>Dar de alta</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/menu.js"></script>
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

    <a class="Btn" href="../procesos/logs/logout.php">
    
        <div class="sign"><svg viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"></path></svg></div>
        
        <div class="text">Logout</div>
    </a>

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