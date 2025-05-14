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
</head>
<body>

<section class="menu">
            <li><a href="../index.php" class="link">Consultar mascotas</a>
            <li><a href="../formularios/registro_nueva_mascota.php" class="link">Dar de alta mascota</a>
            <li><a href="../formularios/registro_nuevo_propietario.php" class="link">Dar de alta propietario</a>
            <li><a href="../formularios/registro_nuevo_usuario.php" class="link">Dar de alta veterinario</a>
            <li><a href="../formularios/registro_nueva_especie.php" class="link">Dar de alta especie</a></li>
            <li><a href="../formularios/registro_nueva_raza.php" class="link">Dar de alta raza</a></li>
            <li><a href="./razas_especies.php" class="link">Consultar especies y razas</a></li>
            <li><a href="./propietarios.php" class="link active">Consultar propietarios</a></li>
    </section>

<a href="../procesos/logs/logout.php"><button>Cerrar sesión</button></a>

<main>
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
                <th>Mascota</th>
                <th>Acciones</th>
            </tr>

            <?php
            if (isset($_GET['dni'])){
                $dni = $_GET['dni'];
                $sql = "SELECT * FROM dueno
                    LEFT JOIN animal ON dueno.dni_dueno = animal.dni_dueno
                    WHERE dueno.dni_dueno = '$dni'
                    ORDER BY dueno.nombre_dueno";
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
                    echo "<td><a href='../index.php?id_animal={$row['id_animal']}'>{$row['nombre_animal']}</a></td>";
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
                    LEFT JOIN animal ON dueno.dni_dueno = animal.dni_dueno
                    ORDER BY dueno.nombre_dueno";
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
                    echo "<td><a href='../index.php?id_animal={$row['id_animal']}'>{$row['nombre_animal']}</a></td>";
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