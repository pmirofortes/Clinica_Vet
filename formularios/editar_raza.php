<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}
if (isset($_GET['id_raza'])) {
    $id_raza = $_GET['id_raza'];
    include_once '../servicios/conexion.php';

    // Consulta para obtener los datos de la raza
    $sql = "SELECT * FROM raza WHERE id_raza = $id_raza";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $raza = mysqli_fetch_assoc($result);
    } else {
        // Redirigir si no se encuentra la raza
        header('Location: ../index.php');
        exit();
    }
} else {
    // Redirigir si no se pasa el id_animal
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Raza</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
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

/* ENCABEZADO */
header h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 2rem;
    color: #ffffff;
}

/* FORMULARIO */
.form {
    width: 50%;
    background-color: #fff;
    padding: 30px;
    box-shadow: 0 0 10px rgb(255, 255, 255);
    border-radius: 10px;
    margin-left: 25%;
}

.form label {
    font-weight: bold;
    display: block;
    margin-bottom: 3px;
    margin-top: 3px;
}

.form input[type="text"],
.form select, .form input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem;
}



.form input[type="submit"] {
    background-color:rgb(132, 76, 175);
    color: white;
    padding: 12px 20px;
    margin-top: 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    width: 100%;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.form input[type="submit"]:hover {
        background-color:rgb(85, 28, 129);
}







/* LAYOUT */
#layout {
    margin-left: 0;
    transition: margin-left 0.3s ease;
}

.menu.open + .boton_abrir_menu + #layout {
    margin-left: 250px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .form {
        padding: 20px;
    }

    .contenido_menu li {
        text-align: center;
    }

    .imagen_cruz {
        margin-left: auto;
        margin-right: auto;
    }
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
<header><h1>Editar Raza</h1></header>
<section class="form">
    <form method="post" action="../procesos/update/update_raza.php">
        <input type="hidden" name="id_raza" value="<?= $id_raza ?>">

        <label>Nombre raza:</label><br>
        <input type="text" name="nombre_raza" value="<?= $raza['nombre_raza'] ?>"><br><br>

        <label>Especie:</label><br>
        <select name="id_especie">
            <option value="">Seleccionar especie</option>
            <?php
            $sql = "SELECT id_especie, nombre_especie FROM especie";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $selected = ($raza['id_especie'] == $row['id_especie']) ? 'selected' : '';
                echo "<option value='{$row['id_especie']}' $selected>{$row['nombre_especie']}</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" name="actualizar_raza" value="Actualizar Raza">
    </form>
</section>
</main>
</body>
</html>