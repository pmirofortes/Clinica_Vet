<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../vistas/login.php");
    exit();
}

include('../servicios/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especies y Razas</title>
    <link rel="stylesheet" href="../front/estilos.css">
</head>
<body>

<section class="menu">
    <!-- Menú -->
</section>

<a href="../procesos/logs/logout.php"><button>Cerrar sesion</button></a>

<main>
    <section>
        <h1>Especies y Razas</h1>
        <table>
            <tr>
                <th>Especie</th>
                <th>Nombre Científico</th>
                <th>Clasificación</th>
                <th>Raza</th>
                <th>Editar Raza</th>
                <th>Editar Especie</th>
            </tr>

            <?php
            $sql = "
                SELECT 
                    especie.id_especie, 
                    especie.nombre_especie, 
                    especie.nombre_cientifico_especie, 
                    especie.clasif_especie, 
                    raza.id_raza,
                    raza.nombre_raza 
                FROM especie
                LEFT JOIN raza ON especie.id_especie = raza.id_especie
                ORDER BY especie.id_especie, raza.nombre_raza
            ";

            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $ultima_especie_id = null;

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    // Solo mostrar datos de especie si es una nueva especie
                    if ($ultima_especie_id !== $row['id_especie']) {
                        echo "<td>{$row['nombre_especie']}</td>";
                        echo "<td>{$row['nombre_cientifico_especie']}</td>";
                        echo "<td>{$row['clasif_especie']}</td>";
                        $mostrar_editar_especie = true;
                    } else {
                        echo "<td></td><td></td><td></td>";
                        $mostrar_editar_especie = false;
                    }

                    echo "<td>" . ($row['nombre_raza'] ?? "Sin razas registradas") . "</td>";

                    // Botón editar raza
                    if (!empty($row['id_raza'])) {
                        echo "<td><a href='../formularios/editar_raza.php?id_raza={$row['id_raza']}'><button>Editar</button></a></td>";
                    } else {
                        echo "<td>-</td>";
                    }

                    // Botón editar especie solo en la primera fila de esa especie
                    if ($mostrar_editar_especie) {
                        echo "<td><a href='../formularios/editar_especie.php?id_especie={$row['id_especie']}'><button>Editar</button></a></td>";
                        $ultima_especie_id = $row['id_especie'];
                    } else {
                        echo "<td></td>";
                    }

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay especies registradas</td></tr>";
            }
            ?>
        </table>
    </section>
</main>
</body>
</html>
