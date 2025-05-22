<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}

include_once '../servicios/conexion.php';
if (isset($_GET['id_especie'])) {
    $id_especie = $_GET['id_especie'];

    // Consulta para obtener los datos del propietario
    $sql = "SELECT * FROM especie WHERE id_especie = '$id_especie'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $especie = mysqli_fetch_assoc($result);
    } else {
        // Redirigir si no se encuentra el propietario
        header('Location: ../vistas/razas_especies.php');
        exit();
    }
} else {
    // Redirigir si no se pasa el id_propietario
    header('Location: ../vistas/razas_especies.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar especie</title>
    <link rel="stylesheet" href="../front/forms.css">
    <script src="../front/menu.js"></script>
    <script src="../front/validaciones.js"></script>
    <link rel="icon" href="../media/favicon.png" type="image/png">
    <style>
        /* Reset básico */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color:rgb(75, 0, 141);
    color: #333;
    line-height: 1.6;
    
}



    </style>
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
        <h1>Editar especie</h1>
    </header>
        <section class="form">
            <form action="../procesos/update/update_especie.php" method="post">
                <input type="hidden" name="id_especie" value="<?= $especie['id_especie'] ?>">
                <label for="nombre">Nombre especie:</label><br>
                <input type="text" id="nombre" name="nombre" value="<?= $especie['nombre_especie'] ?>" onblur="validarNombreEspecie()"><br>
                <span id="errorNombre" class="error"></span><br>

                <label for="nombre_cientifico">Nombre científicio:</label><br>
                <input type="text" id="nombre_cientifico" name="nombre_cientifico" value="<?= $especie['nombre_cientifico_especie'] ?>" onblur="validarNombreCientifico()"><br>
                <span id="errorNombreCien" class="error"></span><br>

                <label for="clas">Clasificación:</label><br>
                <select name="clas" id="opcion" onblur="clasifEspecie()">
                    <option value="" disabled>Selecciona una especie</option>
                    <option value="mamifero" <?= $especie['clasif_especie'] == 'mamifero' ? 'selected' : '' ?>>mamifero</option>
                    <option value="pez" <?= $especie['clasif_especie'] == 'pez' ? 'selected' : '' ?>>pez</option>
                    <option value="invertebrado" <?= $especie['clasif_especie'] == 'invertebrado' ? 'selected' : '' ?>>invertebrado</option>
                    <option value="ave" <?= $especie['clasif_especie'] == 'ave' ? 'selected' : '' ?>>ave</option>
                    <option value="reptil" <?= $especie['clasif_especie'] == 'reptil' ? 'selected' : '' ?>>reptil</option>
                    <option value="amfibio" <?= $especie['clasif_especie'] == 'amfibio' ? 'selected' : '' ?>>amfibio</option>
                </select><br>
                <span id="errorSelect" class="error"></span><br>
                <input type="submit" value="Registrar Especie">

            </form> 
        </section>
    </div>   
</main>   
</body>
</html>