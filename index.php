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
</head>
<body>

    <?php

    include('./servicios/conexion.php');

    ?>
    <div class="layout" id="layout">
        <header>
            <h1>Consulta de mascotas</h1>
        </header>


    <!-- Barra de navegación para dirigirte a las demás páginas -->
     <!-- MENÚ -->
    <nav class="menu" id="menu">
        <div class="contenido_menu">
            <img src="./media/cross.svg" alt="No se ha podido cargar la imagen" class="imagen_cruz" onclick="cerrarmenu()">

            <li><a href="../index.php" class="link active">Consultas</a>
            <li><a href="./fomularios/registro_nueva_mascota.php" class="link">Dar de alta</a>
            <li><a href="./fomularios/registro_nueva_mascota.php" class="link">Actualizar</a>
            <li><a href="./vistas/tienda.php" class="link">Tienda</a>
                
        </div>

        
    </nav>

    <div class="boton_abrir_menu" id="boton">
        <img src="./media/menu.svg" alt="No se ha podido cargar la imagen" onclick="abrirmenu()">
    </div>
    <a href="./procesos//logs/logout.php">
        <button>logout</button>
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