<?php
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
    <script src="../front/menu.js"></script>
    <style>
        h1 { margin-left: 15%; }
        form {
            max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9;
            border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
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
<nav class="menu" id="menu">
    <div class="contenido_menu">
        <img src="../media/cross.svg" alt="Cerrar menú" class="imagen_cruz" onclick="cerrarmenu()">
        <li><a href="../vistas/consultas.php" class="link active">Consultas</a>
        <li><a href="../vistas/dar_de_alta.php" class="link">Dar de alta</a>
        <li><a href="../vistas/tienda.php" class="link">Tienda</a>
    </div>
</nav>

<div class="boton_abrir_menu" id="boton">
    <img src="../media/menu.svg" alt="Abrir menú" onclick="abrirmenu()">
</div>

<main id="layout">
    <a class="Btn" href="../procesos/logs/logout.php">
        <div class="sign">
            <svg viewBox="0 0 512 512"><path d="..."></path></svg>
        </div>
        <div class="text">Logout</div>
    </a>

    <section>
        <h1>Consulta de Propietarios</h1>

        <!-- FILTROS -->
        <form method="get">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '' ?>">
            <input type="text" name="apellidos" placeholder="Apellidos" value="<?= isset($_GET['apellidos']) ? htmlspecialchars($_GET['apellidos']) : '' ?>">
            <input type="text" name="dni" placeholder="DNI" value="<?= isset($_GET['dni']) ? htmlspecialchars($_GET['dni']) : '' ?>">
            <input type="text" name="localidad" placeholder="Localidad" value="<?= isset($_GET['localidad']) ? htmlspecialchars($_GET['localidad']) : '' ?>">
            <input type="text" name="telefono" placeholder="Teléfono" value="<?= isset($_GET['telefono']) ? htmlspecialchars($_GET['telefono']) : '' ?>">
            <input type="text" name="correo" placeholder="Correo" value="<?= isset($_GET['correo']) ? htmlspecialchars($_GET['correo']) : '' ?>">
            <button type="submit">Filtrar</button>
            <a href="propietarios.php"><button type="button">Quitar filtros</button></a>
        </form>

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
            $where = [];
            if (isset($_GET['nombre'])) {
                $nombre = $_GET['nombre'];
                $where[] = "nombre_dueno LIKE '%$nombre%'";
            }
            if (isset($_GET['apellidos'])) {
                $apellidos = $_GET['apellidos'];
                $where[] = "apellidos_dueno LIKE '%$apellidos%'";
            }
            if (isset($_GET['dni'])) {
                $dni = $_GET['dni'];
                $where[] = "dni_dueno LIKE '%$dni%'";
            }
            if (isset($_GET['localidad'])) {
                $localidad = $_GET['localidad'];
                $where[] = "localidad_dueno LIKE '%$localidad%'";
            }
            if (isset($_GET['telefono'])) {
                $telefono = $_GET['telefono'];
                $where[] = "telefono_dueno LIKE '%$telefono%'";
            }
            if (isset($_GET['correo'])) {
                $correo = $_GET['correo'];
                $where[] = "correo_dueno LIKE '%$correo%'";
            }

            $where_sql = $where ? "WHERE " . implode(' AND ', $where) : "";

            $sql = "SELECT * FROM dueno $where_sql ORDER BY nombre_dueno";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Calcular la edad a partir de la fecha de nacimiento
                    $edad = '';
                    if (!empty($row['fecha_nacimiento'])) {
                        $fecha_nac = new DateTime($row['fecha_nacimiento']);
                        $hoy = new DateTime();
                        $edad = $fecha_nac->diff($hoy)->y;
                    } else {
                        $edad = 'Desconocida';
                    }

                    echo "<tr>";
                    echo "<td>{$row['nombre_dueno']}</td>";
                    echo "<td>{$row['apellidos_dueno']}</td>";
                    echo "<td>{$row['dni_dueno']}</td>";
                    echo "<td>$edad</td>";
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
            ?>
        </table>
    </section>
</main>
</body>
</html>
