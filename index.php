<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ./vistas/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
    <link rel="stylesheet" href="./front/estilos.css">
    <script src="./front/validar.js"></script>
    <link rel="icon" href="./front/media/favicon.png" type="image/png">
    <style>
        /* front/estilos.css */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f9f9;
            color: #333;
            min-height: 100vh;
        }

        /* Layout principal */
        .layout {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        /* Tabla de mascotas */
        table {
            width: 95%;
            margin: 2rem auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #e0f2f1;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        tr:hover {
            background-color: #f1f8e9;
            transition: background-color 0.3s ease;
        }

        a {
            color: #2e7d32;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }







        /* Responsive */
        @media (max-width: 768px) {
            table, th, td {
                font-size: 0.85rem;
            }

            .Btn {
                padding: 0.5rem;
                font-size: 0.8rem;
            }
        }

    </style>
</head>
<body>

    <?php

    include('./servicios/conexion.php');

    ?>
    <div class="layout" id="layout">
        <header>
            <h1>Consulta de mascotas</h1>
            <div class="filters-container">
        <form action="vista.php" method="get" class="caja_form">
            <!-- Filtro de regiones -->
            <label for="region">Región:</label>
            <select name="region" id="region">
                <option value="">Seleccionar región</option>
                <?php
                $sql = "SELECT id, nombre_region FROM regiones";
                $result = mysqli_query($conn, $sql);
                $listaRegiones = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($listaRegiones as $region) {
                    $selected = (isset($_GET['region']) && $_GET['region'] == $region['id']) ? 'selected' : '';
                    echo "<option value='{$region['id']}' $selected>{$region['nombre_region']}</option>";
                }
                ?>
            </select>

            <!-- Filtro de tipos -->
            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="">Seleccionar tipo</option>
                <?php
                $sql = "SELECT id, nombre_tipo FROM tipos";
                $result = mysqli_query($conn, $sql);
                $listaTipos = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($listaTipos as $tipo) {
                    $selected = (isset($_GET['tipo']) && $_GET['tipo'] == $tipo['id']) ? 'selected' : '';
                    echo "<option value='{$tipo['id']}' $selected>{$tipo['nombre_tipo']}</option>";
                }
                ?>
            </select>

            <!-- Filtro de ataques -->
            <label for="ataque">Ataque:</label>
            <select name="ataque" id="ataque">
                <option value="">Seleccionar ataque</option>
                <?php
                $sql = "SELECT id, nombre_ataque FROM ataques";
                $result = mysqli_query($conn, $sql);
                $listaAtaques = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($listaAtaques as $ataque) {
                    $selected = (isset($_GET['ataque']) && $_GET['ataque'] == $ataque['id']) ? 'selected' : '';
                    echo "<option value='{$ataque['id']}' $selected>{$ataque['nombre_ataque']}</option>";
                }
                ?>
            </select>

            <!-- Botón para aplicar filtros -->
            <button type="submit">Filtrar</button>
            <a href="vista.php"><button type="button">Quitar filtros</button></a>
        </form>
    </div>

    <div class="filter-info">
        <?php
        $where = [];
        $join = [];

        if (!empty($_GET['region'])) {
            $region = intval($_GET['region']); // Sanitización
            $where[] = "p.id_region = $region";
            echo "<b>Filtrado por región</b> ";
        }

        if (!empty($_GET['tipo'])) {
            $tipo = intval($_GET['tipo']); // Sanitización
            $join[] = "INNER JOIN pokemon_tipos pt ON p.id = pt.id_pokemon";
            $where[] = "pt.id_tipo = $tipo";
            echo "<b>Filtrado por tipo</b> ";
        }

        if (!empty($_GET['ataque'])) {
            $ataque = intval($_GET['ataque']); // Sanitización
            $join[] = "INNER JOIN pokemon_ataques pa ON p.id = pa.id_pokemon";
            $where[] = "pa.id_ataque = $ataque";
            echo "<b>Filtrado por ataque</b> ";
        }
        ?>
    </div>

    <div class="container">
        <?php
        // Construcción de la consulta dinámica
        $sql = "SELECT DISTINCT p.* FROM pokemons p";

        // JOINs
        if (!empty($join)) {
            $sql .= " " . implode(" ", $join);
        }

        // WHERE
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        // Ordenar por ID para mantener el orden original
        $sql .= " ORDER BY p.id";

        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $listaPokemons = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($listaPokemons as $pokemon) {
                echo "<div class='three-column'>
                <h1>{$pokemon['nombre']}</h1>
                <h4>{$pokemon['id']}</h4>
                <img src='{$pokemon['img']}' alt='{$pokemon['nombre']}'>
                <br>
                <a href='../processes/eliminar.php?id={$pokemon['id']}' class='btnpokemon' onclick='confirmacion()'>Eliminar</a>
                <a href='../processes/modificar.php?id={$pokemon['id']}' class='btnpokemon'>Modificar</a>
                </div>";
            }
        }
        ?>
    </div>
        </header>


    <!-- Barra de navegación para dirigirte a las demás páginas -->
     <!-- MENÚ -->
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
        <!-- aqui se muestra la tabla de las mascotas -->
        <table>

            <!-- He puesto el encabezado de lo que queremos enseñar de cada animal -->
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
            if (isset($_GET['id_animal'])){
                $id_animal = $_GET['id_animal'];
                // Preparamos la consulta, queremos toda la información de la tabla animal
                $sql = "SELECT * FROM animal INNER JOIN raza ON animal.id_raza = raza.id_raza INNER JOIN especie ON animal.id_especie = especie.id_especie INNER JOIN dueno ON animal.dni_dueno = dueno.dni_dueno WHERE id_animal = '$id_animal'";


                // Guardamos los resultados
                $result = mysqli_query($conn, $sql);

                // Convertimos los resultados en un array
                $listaAnimales = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Comprobamos si se ha conectado bien a la base de datos o los datos no se pueden acceder
                if(mysqli_num_rows($result) > 0){

                    // Recorremos todo el array con sus respectivos elementos para mostrarlos en la página
                    foreach( $listaAnimales as $animal){

                        echo "<tr>";
                        echo "<td>{$animal['nombre_animal']}</td>";
                        echo "<td>{$animal['edad_animal']}</td>";
                        echo "<td>{$animal['color_animal']}</td>";
                        echo "<td>{$animal['peso_animal']}</td>";
                        echo "<td><a href='./vistas/propietarios.php?dni={$animal['dni_dueno']}'>{$animal['dni_dueno']}</a></td>";
                        echo "<td>{$animal['nombre_especie']}</td>";
                        echo "<td>{$animal['nombre_raza']}</td>";
                        echo "<td>";
                        echo "<a href='./formularios/editar_mascota.php?id_animal=" . $animal['id_animal'] . "'> Editar </a>";
                        echo "<a href='./procesos/delete/delete_mascota.php?id_animal=" . $animal['id_animal'] . "'> Eliminar </a>";
                        echo "</td>";
                        echo "</tr>";

                    }

                } else {
                    echo "<tr>";
                    echo "<td colspan='6'>No hay animales registrados</td>";
                    echo "</tr>";
                }
            }
            else {
                
                // Preparamos la consulta, queremos toda la información de la tabla animal
                $sql = "SELECT * FROM animal INNER JOIN raza ON animal.id_raza = raza.id_raza INNER JOIN especie ON animal.id_especie = especie.id_especie INNER JOIN dueno ON animal.dni_dueno = dueno.dni_dueno";

                // Guardamos los resultados
                $result = mysqli_query($conn, $sql);

                // Convertimos los resultados en un array
                $listaAnimales = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Comprobamos si se ha conectado bien a la base de datos o los datos no se pueden acceder
                if(mysqli_num_rows($result) > 0){

                    // Recorremos todo el array con sus respectivos elementos para mostrarlos en la página
                    foreach( $listaAnimales as $animal){

                        echo "<tr>";
                        echo "<td>{$animal['nombre_animal']}</td>";
                        echo "<td>{$animal['edad_animal']}</td>";
                        echo "<td>{$animal['color_animal']}</td>";
                        echo "<td>{$animal['peso_animal']}</td>";
                        echo "<td><a href='./vistas/propietarios.php?dni={$animal['dni_dueno']}'>{$animal['dni_dueno']}</a></td>";
                        echo "<td>{$animal['nombre_especie']}</td>";
                        echo "<td>{$animal['nombre_raza']}</td>";
                        echo "<td><a href='./formularios/editar_mascota.php?id_animal=" . $animal['id_animal'] . "'> Editar </a></td>";
                        echo "<td><a href='./procesos/delete/delete_mascota.php?id_animal=" . $animal['id_animal'] . "'> Eliminar </a></td>";
                        echo "</tr>";

                    }

                } else {
                    echo "<tr>";
                    echo "<td colspan='6'>No hay animales registrados</td>";
                    echo "</tr>";
                }
            }
                    ?>
            </table>
        </table>
        </section> 
    </main>
    </div> 
    
</body>
</html>