<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ./login.php");
    exit();
}

include('../servicios/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propietarios</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/validar.js"></script>
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
    <section>
        <h1>Consulta de Propietarios</h1>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Edad</th>
                <th>Localidad</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>

            <?php
            if (isset($_GET['dni'])){
                $dni = $_GET['dni'];
                $sql = "SELECT * FROM dueno
                    WHERE dni_dueno = '$dni'
                    ORDER BY nombre_dueno";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['nombre_dueno']}</td>";
                    echo "<td>{$row['apellidos_dueno']}</td>";
                    echo "<td>{$row['dni_dueno']}</td>";
                    echo "<td>{$row['edad_dueno']}</td>";
                    echo "<td>{$row['localidad_dueno']}</td>";
                    echo "<td>{$row['telefono_dueno']}</td>";
                    echo "<td>{$row['correo_dueno']}</td>";
                    echo "<td>
                            <a href='../formularios/editar_propietario.php?dni_dueno={$row['dni_dueno']}'><button>Editar</button></a>
                            <a href='../procesos/delete/delete_propietario.php?dni_dueno={$row['dni_dueno']}'><button>Eliminar</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay propietarios registrados</td></tr>";
            }
            }else{
                $sql = "SELECT * FROM dueno
                    ORDER BY nombre_dueno";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['nombre_dueno']}</td>";
                    echo "<td>{$row['apellidos_dueno']}</td>";
                    echo "<td>{$row['dni_dueno']}</td>";
                    echo "<td>{$row['edad_dueno']}</td>";
                    echo "<td>{$row['localidad_dueno']}</td>";
                    echo "<td>{$row['telefono_dueno']}</td>";
                    echo "<td>{$row['correo_dueno']}</td>";
                    echo "<td>
                            <a href='../formularios/editar_propietario.php?dni_dueno={$row['dni_dueno']}'><button>Editar</button></a>
                            <a href='../procesos/delete/delete_propietario.php?dni_dueno={$row['dni_dueno']}'><button>Eliminar</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay propietarios registrados</td></tr>";
            }

            }
            ?>
        </table>
    </section>
</main>
</body>
</html>