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
    <title>Especies y Razas</title>
    <link rel="stylesheet" href="../front/estilos.css">
    <script src="../front/menu.js"></script>

    <style>

    h1{
        margin-left: 15%;
    }

        /* Estilos generales del formulario */
form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9; /* Fondo gris claro */
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
}

/* Estilos para los campos de texto */
input[type="text"] {
    border: 2px solid purple; /* Borde morado */
    padding: 10px;
    margin: 10px 0;
    width: 100%; /* Asegura que los campos llenen el ancho del formulario */
    border-radius: 5px; /* Bordes redondeados */
    font-size: 14px;
    transition: border-color 0.3s ease; /* Transición suave */
}

/* Cambiar el borde a morado más oscuro al hacer focus en los campos */
input[type="text"]:focus {
    border-color: #800080; /* Color morado más oscuro */
    outline: none; /* Quitar el borde de enfoque por defecto */
}

/* Estilos para el botón "Filtrar" */
button[type="submit"] {
    background-color: purple; /* Fondo morado */
    color: white; /* Texto blanco */
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

/* Efecto hover en el botón "Filtrar" */
button[type="submit"]:hover {
    background-color: #800080; /* Fondo morado más oscuro cuando pasa el mouse */
}

/* Estilos para el botón "Quitar filtros" */
button[type="button"] {
    background-color: #E0B0FF; /* Morado claro */
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

/* Efecto hover en el botón "Quitar filtros" */
button[type="button"]:hover {
    background-color: #D8A7FF; /* Tono morado más oscuro al hacer hover */
}

/* Estilos para los placeholders */
input[type="text"]::placeholder {
    color: purple; /* Color morado para el texto del placeholder */
    opacity: 0.7; /* Hacer que el placeholder sea un poco más tenue */
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
    <section>
        <h1>Especies y Razas</h1>

        <!-- FILTROS POR ESPECIE Y CLASIFICACIÓN -->
        <form method="get" style="margin-bottom:20px; display:flex; gap:1rem; align-items:center;">
            <label for="filtro_especie">Filtrar por especie:</label>
            <select name="filtro_especie" id="filtro_especie">
                <option value="">Todas</option>
                <?php
                $sqlEspecies = "SELECT id_especie, nombre_especie FROM especie";
                $resEspecies = mysqli_query($conn, $sqlEspecies);
                while ($esp = mysqli_fetch_assoc($resEspecies)) {
                    $selected = (isset($_GET['filtro_especie']) && $_GET['filtro_especie'] == $esp['id_especie']) ? 'selected' : '';
                    echo "<option value='{$esp['id_especie']}' $selected>{$esp['nombre_especie']}</option>";
                }
                ?>
            </select>

            <label for="filtro_clasificacion">Clasificación:</label>
            <select name="filtro_clasificacion" id="filtro_clasificacion">
                <option value="">Todas</option>
                <?php
                $clasificaciones = ['mamifero', 'pez', 'invertebrado', 'ave', 'reptil', 'amfibio'];
                foreach ($clasificaciones as $clasif) {
                    $selected = (isset($_GET['filtro_clasificacion']) && $_GET['filtro_clasificacion'] == $clasif) ? 'selected' : '';
                    echo "<option value='$clasif' $selected>$clasif</option>";
                }
                ?>
            </select>

            <button type="submit">Filtrar</button>
            <a href="razas_especies.php"><button type="button">Quitar filtro</button></a>
        </form>

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
            // Filtros dinámicos
            $where = [];
            if (!empty($_GET['filtro_especie'])) {
                $id_filtro = intval($_GET['filtro_especie']);
                $where[] = "especie.id_especie = $id_filtro";
            }
            if (!empty($_GET['filtro_clasificacion'])) {
                $clasif = mysqli_real_escape_string($conn, $_GET['filtro_clasificacion']);
                $where[] = "especie.clasif_especie = '$clasif'";
            }
            $where_sql = '';
            if ($where) {
                $where_sql = "WHERE " . implode(' AND ', $where);
            }

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
                $where_sql
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
                        echo "<td><a href='../procesos/delete/delete_raza.php?id_raza={$row['id_raza']}'><button>Eliminar</button></a></td>";
                    } else {
                        echo "<td>-</td>";
                    }

                    // Botón editar especie solo en la primera fila de esa especie
                    if ($mostrar_editar_especie) {
                        echo "<td><a href='../formularios/editar_especie.php?id_especie={$row['id_especie']}'><button>Editar</button></a></td>";
                        echo "<td><a href='../procesos/delete/delete_especie.php?id_especie={$row['id_especie']}'><button>Eliminar</button></a></td>";
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