<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}
include('../servicios/conexion.php');
$dni_vet = $_SESSION['dni'];


// Cargar especies
$especies = mysqli_query($conn, "SELECT id_especie, nombre_especie FROM especie");

// Cargar razas
$razasQuery = mysqli_query($conn, "SELECT id_raza, nombre_raza, id_especie FROM raza");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Mascota</title>
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
<header><h1>Registro de Mascota</h1></header>
<div class="layout">
<section class="menu">
    <li><a href="../index.php" class="link active">Consultar mascotas</a></li>
    <li><a href="registro_nueva_mascota.php" class="link">Dar de alta mascota</a></li>
    <li><a href="registro_nuevo_propietario.php" class="link">Dar de alta propietario</a></li>
    <li><a href="registro_nuevo_usuario.php" class="link">Dar de alta veterinario</a></li>
    <li><a href="registro_nueva_especie.php" class="link">Dar de alta especie</a></li>
    <li><a href="registro_nueva_raza.php" class="link">Dar de alta raza</a></li>
    <li><a href="../vistas/razas_especies.php" class="link">Consultar especies y razas</a></li>
    <li><a href="../vistas/propietarios.php" class="link">Consultar propietarios</a></li>
</section>

<section class="form">
    <form method="post" action="../procesos/create/create_mascota.php">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br><br>

        <label>Fecha nacimiento:</label><br>
        <input type="date" name="edad"><br><br>

        <label>Peso:</label><br>
        <input type="number" name="peso"> kg<br><br>

        <label>Color:</label><br>
        <input type="text" name="color"><br><br>

        <label>DNI Dueño:</label><br>
        <input type="text" name="dni_dueño"><br><br>

        <label>DNI Veterinario:</label><br>
        <input type="text" name="dni_vet" value="<?php echo $dni_vet; ?>"><br><br>

        <label>Especie:</label><br>
        <select name="especie" id="especie">
            <option value="">Seleccionar especie</option>
            <?php while ($esp = mysqli_fetch_assoc($especies)) : ?>
                <option value="<?= $esp['id_especie'] ?>"><?= $esp['nombre_especie'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <label>Raza:</label><br>
        <select name="raza" id="raza">
            <option value="">Seleccionar raza</option>
            <?php while ($r = mysqli_fetch_assoc($razasQuery)) : ?>
                <option value="<?= $r['id_raza'] ?>" data-especie="<?= $r['id_especie'] ?>">
                    <?= $r['nombre_raza'] ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <input type="submit" name="registrar_mascota" value="Registrar Mascota">
    </form>
</section>
</div>

<script>

    var especieSelect = document.getElementById('especie');
    var razaSelect = document.getElementById('raza');

    // Guardamos todas las razas al inicio
    var todasLasRazas = [];
    for (var i = 0; i < razaSelect.options.length; i++) {
        todasLasRazas.push(razaSelect.options[i]);
    }

    especieSelect.addEventListener('change', function () {
        var especieId = especieSelect.value;

        // Limpiar el select de razas
        razaSelect.innerHTML = '<option value="">Seleccionar raza</option>';

        // Recorrer todas las opciones y añadir solo las que coinciden
        for (var i = 0; i < todasLasRazas.length; i++) {
            var opt = todasLasRazas[i];
            if (opt.getAttribute('data-especie') === especieId) {
                razaSelect.appendChild(opt);
            }
        }
    });


</script>
</main>
</body>
</html>
