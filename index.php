<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas</title>
    <link rel="stylesheet" href="./front/estilos.css">
    <script src="../front/validar.js"></script>
</head>
<body>

    <?php

    include('./servicios/conexion.php');

    ?>

    <!-- Barra de navegación para dirigirte a las demás páginas -->
    <section class="menu">
            <a href="../index.php" class="link active"><img src="./media/lupa.png" class= "icono">Consultar mascotas</a>
            <a href="./fomularios/registro_nueva_mascota.php" class="link">Dar de alta mascota</a>
            <a href="./fomularios/registro_nuevo_propietario.php" class="link">Dar de alta propietario</a>
            <a href="./fomularios/registro_nuevo_usuario.php" class="link"><img src="./media/veterinario.png" class="icono">Dar de alta veterinario</a>
    </section>

    <main>

        <section>
        <!-- aqui se muestra la tabla de las mascotas -->

        <table>

            <!-- He puesto el encabezado de lo que queremos enseñar de cada animal -->
            <tr> 
                <th>Mascota</th>
                <th>Raza</th>
                <th>Edad</th>
                <th>Dueño</th>
                <th>Tamaño</th>
                <th>Acciones</th>
            </tr>

            <?php
                
                // Preparamos la consulta, queremos toda la información de la tabla animal
                $sql = "SELECT * FROM animal";

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
                        echo "<td>{$animal['raza_animal']}</td>";
                        echo "<td>{$animal['edad_animal']}</td>";
                        echo "<td>{$animal['dni_dueno']}</td>";
                        echo "<td>{$animal['tamano_animal']}</td>";
                        echo "boton";
                        echo "</tr>";

                    }

                } else {
                    echo "<tr>";
                    echo "<td colspan='6'>No hay animales registrados</td>";
                    echo "</tr>";

                    ?>

                    </table>
                        <section>

                            <h2>Estamos mejorando la base de datos, la web y otras configuraciones.</h2>
                            <h3>MANTENIMIENTO</h3>

                            <p>Regarga la página si se ha completado el mantenimiento.</p>
                        
                        </section>

                    <?php

                }

                

            ?>

        </table>

        </section>  

    </main>
</body>
</html>