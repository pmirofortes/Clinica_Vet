<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ./vistas/login.php");
    exit();
}
include('./servicios/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
    <link rel="stylesheet" href="./front/estilos.css">
    <script src="./front/menu.js"></script>
    <link rel="icon" href="./front/media/favicon.png" type="image/png">
    <style>
        h1 { margin-left: 15%; }
        form {
            max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9;
            border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], select {
            border: 2px solid purple; padding: 10px; margin: 10px 0;
            width: 100%; border-radius: 5px; font-size: 14px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus {
            border-color: #800080; outline: none;
        }
        button[type="submit"] {
            background-color: purple; color: white; padding: 12px 20px;
            border: none; border-radius: 5px; cursor: pointer;
            font-size: 16px; transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #800080;
        }
        button[type="button"] {
            background-color: #E0B0FF; color: white; padding: 12px 20px;
            border: none; border-radius: 5px; cursor: pointer;
            font-size: 16px; transition: background-color 0.3s ease;
        }
        button[type="button"]:hover {
            background-color: #D8A7FF;
        }
        input[type="text"]::placeholder {
            color: purple; opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="layout" id="layout">
        <header>
            <h1>Consulta de mascotas</h1>
            <form action="index.php" method="get" style="margin-bottom:20px;">
                <label for="region">Raza:</label>
                <select name="region" id="region">
                    <option value="">Seleccionar raza</option>
                    <?php
                    $sqlRaza = "SELECT id_raza, nombre_raza FROM raza";
                    $resultRaza = mysqli_query($conn, $sqlRaza);
                    while ($raza = mysqli_fetch_assoc($resultRaza)) {
                        $selected = (isset($_GET['region']) && $_GET['region'] == $raza['id_raza']) ? 'selected' : '';
                        echo "<option value='{$raza['id_raza']}' $selected>{$raza['nombre_raza']}</option>";
                    }
                    ?>
                </select>
                <label for="especie">Especie:</label>
                <select name="especie" id="especie">
                    <option value="">Seleccionar especie</option>
                    <?php
                    $sqlEspecie = "SELECT id_especie, nombre_especie FROM especie";
                    $resultEspecie = mysqli_query($conn, $sqlEspecie);
                    while ($especie = mysqli_fetch_assoc($resultEspecie)) {
                        $selected = (isset($_GET['especie']) && $_GET['especie'] == $especie['id_especie']) ? 'selected' : '';
                        echo "<option value='{$especie['id_especie']}' $selected>{$especie['nombre_especie']}</option>";
                    }
                    ?>
                </select>
                <label for="dueno">Dueño (DNI):</label>
                <input type="text" name="dueno" id="dueno" placeholder="DNI dueño" value="<?= isset($_GET['dueno']) ? htmlspecialchars($_GET['dueno']) : '' ?>">
                <button type="submit">Filtrar</button>
                <a href="index.php"><button type="button">Quitar filtros</button></a>
            </form>
        </header>
        <nav class="menu" id="menu">
            <div class="contenido_menu">
                <img src="./media/cross.svg" alt="No se ha podido cargar la imagen" class="imagen_cruz" onclick="cerrarmenu()">
                <li><a href="./vistas/consultas.php" class="link active">Consultas</a>
                <li><a href="./vistas/dar_de_alta.php" class="link">Dar de alta</a>
                <li><a href="./vistas/tienda.php" class="link">Tienda</a>
            </div>
        </nav>
        <div class="boton_abrir_menu" id="boton">
            <img src="./media/menu.svg" alt="No se ha podido cargar la imagen" onclick="abrirmenu()">
        </div>
        <a class="Btn" href="./procesos/logs/logout.php">
            <div class="sign"><svg viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"></path></svg></div>
            <div class="text">Logout</div>
        </a>
        <main>
            <section>
                <table>
                    <tr> 
                        <th>Mascota</th>
                        <th>Edad</th>
                        <th>Color</th>
                        <th>Peso</th>
                        <th>Dueño</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Acciones</th>
                    </tr>
<?php
// Filtros dinámicos
$where = [];
if (!empty($_GET['region'])) {
    $region = intval($_GET['region']);
    $where[] = "animal.id_raza = $region";
}
if (!empty($_GET['especie'])) {
    $especie = intval($_GET['especie']);
    $where[] = "animal.id_especie = $especie";
}
if (!empty($_GET['dueno'])) {
    $dueno = addslashes($_GET['dueno']);
    $where[] = "animal.dni_dueno LIKE '%$dueno%'";
}
$where_sql = '';
if ($where) {
    $where_sql = " WHERE " . implode(' AND ', $where);
}
$sql = "SELECT animal.*, raza.nombre_raza, especie.nombre_especie, dueno.dni_dueno 
        FROM animal 
        LEFT JOIN raza ON animal.id_raza = raza.id_raza 
        LEFT JOIN especie ON animal.id_especie = especie.id_especie 
        LEFT JOIN dueno ON animal.dni_dueno = dueno.dni_dueno
        $where_sql";
$result = mysqli_query($conn, $sql);

if($result && mysqli_num_rows($result) > 0){
    while($animal = mysqli_fetch_assoc($result)){
        // Calcular edad si tienes fecha de nacimiento
        $edad = '';
        if (isset($animal['edad_animal'])) {
            // Convertir la fecha de nacimiento y la fecha actual a timestamps
            $fecha_nacimiento = strtotime($animal['edad_animal']);
            $hoy = time();
            // Calcular la diferencia en años
            $edad_anios = date('Y', $hoy) - date('Y', $fecha_nacimiento);
            $edad = $edad_anios . ' años';
        } else {
            $edad = '';
        }
        echo "<tr>";
        echo "<td>{$animal['nombre_animal']}</td>";
        echo "<td>{$edad}</td>";
        echo "<td>{$animal['color_animal']}</td>";
        echo "<td>{$animal['peso_animal']}</td>";
        echo "<td><a href='./vistas/propietarios.php?dni={$animal['dni_dueno']}'>{$animal['dni_dueno']}</a></td>";
        echo "<td>{$animal['nombre_especie']}</td>";
        echo "<td>{$animal['nombre_raza']}</td>";
        echo "<td>
                <a href='./formularios/editar_mascota.php?id_animal=" . $animal['id_animal'] . "'> Editar </a>
                <a href='./procesos/delete/delete_mascota.php?id_animal=" . $animal['id_animal'] . "'> Eliminar </a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='8'>No hay animales registrados</td>";
    echo "</tr>";
}
?>
                </table>
            </section> 
        </main>
    </div> 
</body>
</html>